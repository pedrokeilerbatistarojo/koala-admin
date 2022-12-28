<?php
global $wpdb;

$orderby = 'name';
$order = 'asc';
$hide_empty = false ;
$cat_args = array(
    'orderby'    => $orderby,
    'order'      => $order,
    'hide_empty' => $hide_empty,
);

$product_categories = get_terms( 'product_cat', $cat_args );





//  ------------    Invocaciones de Funciones php   ----------      //
createEnvio($wpdb);

EditarEnvio($wpdb, $product_categories);

$lista_envios = ListarEnvios($wpdb);




//  -------------   Funciones php   --------------      //

//  guardar envio nuevo
function createEnvio($wpdb){
    $tabla_envio = "{$wpdb->prefix}koala_envios";

    if(isset($_POST['guardarEnvio'])){
        $envio_nombre = $_POST['envionombre'];
        $envio_dias = $_POST['enviodias'];
        $envio_precio = $_POST['envioprecio'];
        $envio_descripcion = $_POST['enviodescripcion'];
        $categorias = $_POST['event-dropdown'];
        $categorias_personalizado_encode = json_encode($categorias);


        $datos = [
            'KoalaEnviosId' => null,
            'KoalaEnviosNombre' => $envio_nombre,
            'KoalaEnviosDias' => $envio_dias,
            'KoalaEnviosPrecio' => $envio_precio,
            'KoalaEnviosDescripcion' => $envio_descripcion,
            'KoalaEnviosCategorias' => $categorias_personalizado_encode

        ];

        $wpdb->insert($tabla_envio, $datos);
    }
}

//  Listar envios
function ListarEnvios($wpdb){
    $query = "SELECT * FROM {$wpdb->prefix}koala_envios ORDER BY KoalaEnviosDias ASC ";
    $lista_envios = $wpdb->get_results($query, ARRAY_A);
    return $lista_envios;
}

//  Editar envios
function EditarEnvio($wpdb, $product_categories){
    $tabla_koala_envio = "{$wpdb->prefix}koala_envios";
    if(isset($_POST['guardarEditarEnvio'])){
        $nombre_envio = $_POST['editarenvionombre'];
        $dias_envio = $_POST['editarenviodias'];
        $precio_envio = $_POST['editarenvioprecio'];
        $descripcion_envio = $_POST['editarenviodescripcion'];
        $list_categorias = $_POST['event-dropdown_edit_envio'];
        $descategorizar = $_POST['descategorizar'];
//        $list_categorias = json_encode($list_categorias);


        $datos_import = $_POST['datos_importantes'];
        $base64_decode = base64_decode($datos_import);
        $datos_importantes_a_json = json_decode($base64_decode);

        $id_envio = $datos_importantes_a_json->id_envio;
        $categorias_del_envio_encode = $datos_importantes_a_json->categorias;

        if($list_categorias == null){
            $list_categorias = $categorias_del_envio_encode;
        }
        else{
            $categorias_del_envio_decode = json_decode($categorias_del_envio_encode);
            foreach ($list_categorias as $cat_new){
                array_push($categorias_del_envio_decode, $cat_new);
            }
            $list_categorias = json_encode($categorias_del_envio_decode);
        }

        if($descategorizar != null){
            $list_id_cat_a_eliminar = EncontrarCategoriasPorNombre($descategorizar, $product_categories);

            $list_categorias = json_decode($list_categorias);

            $lista_resultante = array_diff($list_categorias, $list_id_cat_a_eliminar);

            $list_categorias = [];

            foreach ($lista_resultante as $result){
                $list_categorias[] = $result;
            }
            $list_categorias = json_encode($list_categorias);

        }

        $datos_envios_a_guardar = [
            'KoalaEnviosNombre'=>$nombre_envio,
            'KoalaEnviosDias'=>$dias_envio,
            'KoalaEnviosPrecio'=>$precio_envio,
            'KoalaEnviosDescripcion'=>$descripcion_envio,
            'KoalaEnviosCategorias'=>$list_categorias
        ];
        $where = ['KoalaEnviosId'=>$id_envio];

        $wpdb->update($tabla_koala_envio, $datos_envios_a_guardar, $where);

    }
}


//  --------    Funciones de Categorias --------------      //

//  Buscar categorias dado id's
function EncontrarCategorias($categorias_array_a, $product_categories){

    $lista_categorias_del_envio = array();

    if($categorias_array_a != null){
        $cant_cate_asig = count($categorias_array_a);

        foreach ( $product_categories as $key => $category ) {
            $category_id = $category->term_id;

            for ($i = 0; $i<= $cant_cate_asig; $i++){
                $cate_asignada = $categorias_array_a[$i];
                if($category_id == $cate_asignada){
                    $lista_categorias_del_envio[] = $category->name;
                }
            }
        }
    }

    return $lista_categorias_del_envio;
}

//  Buscar categorias segun nombre
function EncontrarCategoriasPorNombre($lista_nomb_categ, $product_categories){

    $lista_id_descategorizar = array();

    $cant_nomb = count($lista_nomb_categ);
    foreach ($product_categories as $key => $category){
        $category_name = $category->name;

        for ($i = 0; $i<= $cant_nomb; $i++){
            $nom_cat = $lista_nomb_categ[$i];
            if($category_name == $nom_cat){
                $lista_id_descategorizar[] = $category->term_id;
            }
        }
    }

    return $lista_id_descategorizar;
}

















?>

<div class="wrap">
    <?php
        echo "<h1 class='wp-heading-inline'>".get_admin_page_title()."</h1>";
    ?>

    <!--    lista de envios     -->

    <a id="btnenvionuevo" class="page-title-action" data-toggle="modal" data-target="#CrearEnvio">Agregar envío</a>
    <br><br>

    <table class="wp-list-table widefat fixed striped pages" style="width: 100%">
        <thead>
        <th>Nombre del envío</th>
        <th>Cantidad de días</th>
        <th>Precio del envío</th>
        <th>Descripcción</th>
        <th>Categorías a enviar</th>
        <th></th>
        </thead>
        <tbody>
        <?php
            foreach ($lista_envios as $key=> $value ){
                $id_envio = $value['KoalaEnviosId'];
                $nombre_envio = $value['KoalaEnviosNombre'];
                $cant_dias_envio = $value['KoalaEnviosDias'];
                $precio_envio = $value['KoalaEnviosPrecio'];
                $descrip_envio = $value['KoalaEnviosDescripcion'];
                $categorias_envios = $value['KoalaEnviosCategorias'];
                $categorias_envios_decode = json_decode($categorias_envios, ARRAY_A);

                $lista_categorias_del_envio = EncontrarCategorias($categorias_envios_decode, $product_categories);

                echo "
                        <tr>
                            <td>$nombre_envio</td>
                            <td>$cant_dias_envio</td>
                            <td>$precio_envio</td>
                            <td>$descrip_envio</td>
                            <td>
                ";
                                foreach ($lista_categorias_del_envio as $categoria_asig){
                                    echo $categoria_asig. ' | ';
                                }
                echo "
                            </td>
                            <td style='padding-top: 15px !important;'>
                                <a id='$id_envio' class='page-title-action btn_editar_envio' data-toggle='modal' data-target='#EditarEnvio'>Editar</a>
                                <a id='$id_envio' class='page-title-action btn_borrar_envio'>Borrar</a>
                            </td>
                        </tr>
                ";
            }
        ?>
        </tbody>
    </table>
</div>


<!--        MODALES HTML        -->

<!--        Modal de creacion de envio      -->
<div class="modal fade" id="CrearEnvio" tabindex="-1" role="dialog" aria-labelledby="CrearEnvioTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="envionombre" class="col-sm-4 col-form-label">Nombre del envío</label>
                        <div class="col-sm-8">
                            <input type="text" id="envionombre" name="envionombre" style="width: 100%; margin-top: -5px;">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="enviodias" class="col-sm-4 col-form-label">Cantidad de días</label>
                        <div class="col-sm-8">
                            <input type="number" id="enviodias" name="enviodias" min="1" style="width: 100%; margin-top: -5px;">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="envioprecio" class="col-sm-4 col-form-label">Precio del envío</label>
                        <div class="col-sm-8">
                            <input type="number" id="envioprecio" name="envioprecio" min="0" step="0.01" style="width: 100%; margin-top: -5px;">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="enviodescripcion" class="col-sm-4 col-form-label">Descripción del envío</label>
                        <div class="col-sm-8">
                            <textarea id="enviodescripcion" name="enviodescripcion" style="width: 100%; height: 80px; margin-top: -5px;" ></textarea>
                        </div>
                    </div>

                    <br><br>
                    <hr>
                    <table>
                        <tr>
                            <td >
                                <label for="select" class="col-form-label col-sm-6">Categorías</label>
                            </td>
                            <td >
                                <select class="form-control type-list col-sm-6" name="event-dropdown[]" multiple style="margin-left: 105px">
                                    <?php
                                    $product_categories = get_terms( 'product_cat', $cat_args );
                                    foreach ( $product_categories as $key => $category ) {
                                        echo '<option value="'.$category->term_id.'">'.$category->name.'</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button id="guardarEnvio" name="guardarEnvio" type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--        Modal de edicion de envio      -->
<div class="modal fade" id="EditarEnvio" tabindex="-1" role="dialog" aria-labelledby="EditarEnvioTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div id="datosimportantes">

                    </div>
                    <div class="form-group">
                        <label for="editarenvionombre" class="col-sm-4 col-form-label">Nombre del envío</label>
                        <div class="col-sm-8" id="crearinputeditarenvionombre">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="editarenviodias" class="col-sm-4 col-form-label">Cantidad de días</label>
                        <div class="col-sm-8" id="crearinputeditarenviodias">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="editarenvioprecio" class="col-sm-4 col-form-label">Precio del envío</label>
                        <div class="col-sm-8" id="crearinputeditarenvioprecio">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="editarenviodescripcion" class="col-sm-4 col-form-label">Descripción del envío</label>
                        <div class="col-sm-8" id="crearinputeditarenviodescripcion">
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label for="editarenviocategoria" class="col-sm-4 col-form-label">Quitar Categorías</label>
                        <div class="col-sm-8" >
                            <table id="crearinputeditarenviocategoria" class="wp-list-table widefat fixed striped pages" style="width: 100%">
                            </table>
                        </div>
                    </div>

                    <table >
                        <tr>
                            <td>
                                <label for="select" class="col-form-label col-sm-4" style="margin-top: 50px!important;">Asignar Categorías</label>
                            </td>
                            <td >
                                <select class="form-control type-list col-sm-8" name="event-dropdown_edit_envio[]" id="event-dropdown_edit_envio" multiple style="margin-left: 45px; margin-top: 50px!important; width: 100% !important;">
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button id="guardarEditarEnvio" name="guardarEditarEnvio" type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>