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
createPersonalizado($wpdb);

createPartePersonalizado($wpdb);

createSerigrafia($wpdb);

$listaPersonalizados = listPersonalizado($wpdb);

$listPartesPersonalizado = listPartesPersonalizado($wpdb);

$listaSerigrafias = listarSerigrafias($wpdb);

ListaPartesSegunIdPersonalizado($wpdb, $id);

EncontrarPersonalizado($wpdb, $id);

EncontrarParte($wpdb, $id);

EncontrarSerigrafiasDadoIdParte($wpdb, $id);

EditarSerigrafia($wpdb);

EditarParte($wpdb);

EditarPersonalizado($wpdb, $product_categories);




//  ------------    Terminan las invocaciones   ----------  //




//  -------------   Funciones php   --------------      //

//  -------------   Funciones Personalizados    -----------     //

//  guardar personalizado nuevo
function createPersonalizado($wpdb){
    $tabla_personalizado = "{$wpdb->prefix}koala_personalizado";

    if(isset($_POST['guardarPersonalizado'])){
        $nombre_personalizado = $_POST['txtnombre'];
        $categorias_personalizado = $_POST['event-dropdown'];
//        $categorias_personalizado_encode = json_encode($categorias_personalizado);


        $categorias_personalizado_encode = getSubCategoryLowLevel($categorias_personalizado);

        $categorias_personalizado_encode = json_encode($categorias_personalizado_encode);

        $datos = [
            'PersonalizadoId' => null,
            'PersonalizadoNombre' => $nombre_personalizado,
            'PersonalizadoCategorias' => $categorias_personalizado_encode
        ];

        $wpdb->insert($tabla_personalizado, $datos);
    }
}

//encontrar subcategoria del nivel mas bajo
function getSubCategoryLowLevel(array $categorias_personalizado): array
{
    $categories = [];
    $deleteCategories = [];

    foreach ($categorias_personalizado as $category_dropdown) {

        $category = get_term($category_dropdown);

        if (!empty($category)){

            $categoryItem = $category;

            while($category->parent !== 0){

                if (in_array($category->parent, $categorias_personalizado)){
                    $deleteCategories[] = $category->parent;
                }

                $category = get_term($category->parent);
            }

            $categories[] = $categoryItem->term_id;
        }
    }

    $iterableCategories = $categories;

    foreach ($deleteCategories as $deleteCategory) {
        foreach ($iterableCategories as $key => $category) {
            if ($deleteCategory === $category){
                unset($categories[$key]);
            }
        }
    }

    $categorias_personalizado_encode = [];

    foreach ($categories as $item) {
        $categorias_personalizado_encode[] = strval($item);
    }

    return $categorias_personalizado_encode;
}


//  listar personalizados
function listPersonalizado($wpdb){
    $query = "SELECT * FROM {$wpdb->prefix}koala_personalizado";
    $lista_peronaliados = $wpdb->get_results($query, ARRAY_A);
    return $lista_peronaliados;
}

//  Buscar personalizado dado id
function EncontrarPersonalizado($wpdb, $id){
    $query = "SELECT PersonalizadoNombre FROM {$wpdb->prefix}koala_personalizado WHERE PersonalizadoId = $id";
    $personalizado_nombre = $wpdb->get_results($query, ARRAY_A);
    return $personalizado_nombre[0]['PersonalizadoNombre'];
}


//  editar personalizado
function EditarPersonalizado($wpdb, $product_categories){
    $tabla_koala_personalizado = "{$wpdb->prefix}koala_personalizado";
    if(isset($_POST['guardarEditarPersonalizado'])){

        $nombre_personalizado = $_POST['personalizado_nombre'];
        $list_categorias = $_POST['event-dropdown_edit_personalizado'];
        $descategorizar = $_POST['descategorizar_personalizado'];
//        $list_categorias = json_encode($list_categorias);


        $datos_import = $_POST['datos_importantes_personalizado'];
        $base64_decode = base64_decode($datos_import);
        $datos_importantes_a_json = json_decode($base64_decode);

        $id_personalizado = $datos_importantes_a_json->id_personalizado;
        $categorias_del_personalizado_encode = $datos_importantes_a_json->categorias;

        if($list_categorias == null){
            $list_categorias = $categorias_del_personalizado_encode;
        }
        else{
            $categorias_del_personalizado_decode = json_decode($categorias_del_personalizado_encode);
            foreach ($list_categorias as $cat_new){
                array_push($categorias_del_personalizado_decode, $cat_new);
            }
            $list_categorias = json_encode($categorias_del_personalizado_decode);
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
            'PersonalizadoNombre'=>$nombre_personalizado,
            'PersonalizadoCategorias'=>$list_categorias
        ];
        $where = ['PersonalizadoId'=>$id_personalizado];

        $wpdb->update($tabla_koala_personalizado, $datos_envios_a_guardar, $where);

        header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        exit;

    }
}


//  --------    Funciones de Categorias --------------      //

//  Buscar categorias dado id's
function EncontrarCategorias($categorias_array_a, $product_categories){

    $lista_categorias_del_personalizado = array();
    $cant_cate_asig = count($categorias_array_a);

    foreach ( $product_categories as $key => $category ) {
        $category_id = $category->term_id;

        for ($i = 0; $i<= $cant_cate_asig; $i++){
            $cate_asignada = $categorias_array_a[$i];
            if($category_id == $cate_asignada){
                $lista_categorias_del_personalizado[] = $category->name;
            }
        }
    }
    return $lista_categorias_del_personalizado;
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




//     -----------  Funciones Partes   ---------------     //

//  guardar parte de personalizado nuevo
function createPartePersonalizado($wpdb){
    $tabla_personalizado_parte = "{$wpdb->prefix}koala_personalizado_parte";
    if(isset($_POST['guardarPartePersonalizado'])){
        $id_personalizado = $_POST['event-dropdown-parte'];
        $lista_partes_personalizado = $_POST['partepersonalizado'];


        $query = "SELECT * FROM {$wpdb->prefix}koala_personalizado_parte";
        $listado_partes = $wpdb->get_results($query, ARRAY_A);

        $cant_partes_del_mismo_personalizado = 0;

        foreach ($listado_partes as $parte){
            if($parte['PersonalizadoId'] == $id_personalizado){
                $cant_partes_del_mismo_personalizado ++;
            }
        }
        $can_a_crear = 4 - $cant_partes_del_mismo_personalizado;

        foreach ($lista_partes_personalizado as $key=> $value){
            $datos = [
                'PersonalizadoParteId' => null,
                'PersonalizadoId' => $id_personalizado,
                'Parte' => $value
            ];
            if($can_a_crear == 0){
                break;
            }
            $wpdb->insert($tabla_personalizado_parte, $datos);
            $can_a_crear --;
        }

    }

}

//      listar partes de personalizados
function listPartesPersonalizado($wpdb){
    $query = "SELECT * FROM {$wpdb->prefix}koala_personalizado_parte ORDER BY PersonalizadoId";
    $lista_peronaliados_partes = $wpdb->get_results($query, ARRAY_A);
    return $lista_peronaliados_partes;
}

//      Encontrar parte segun id de la parte
function EncontrarParte($wpdb, $id){
    $query = "SELECT * FROM {$wpdb->prefix}koala_personalizado_parte WHERE PersonalizadoParteId = $id";
    $parte = $wpdb->get_results($query, ARRAY_A);
    return $parte[0];
}

//      Encontrar lista de partes que pertenezcan a un personalizado segun el id del personalizado
function ListaPartesSegunIdPersonalizado($wpdb, $id){
    $query = "SELECT * FROM {$wpdb->prefix}koala_personalizado_parte WHERE PersonalizadoId = $id";
    $lista_partes = $wpdb->get_results($query, ARRAY_A);
    return $lista_partes;
}


//  Editar Partes
function EditarParte($wpdb){
    $tabla_koala_parte = "{$wpdb->prefix}koala_personalizado_parte";
    if(isset($_POST['guardarEditarParte'])){

        $datos_import = $_POST['datos_importantes_parte'];
        $base64_decode = base64_decode($datos_import);
        $datos_importantes_a_json = json_decode($base64_decode);

        $id_parte = $datos_importantes_a_json->id_parte;

        $nombre_parte = $_POST['editarpartenombre'];
        $img_url = $_POST['elegir_img'];

        $datos_envios_a_guardar = [
            'Parte'=>$nombre_parte,
            'ImgRutaParte' => $img_url
        ];
        $where = ['PersonalizadoParteId'=>$id_parte];

        $wpdb->update($tabla_koala_parte, $datos_envios_a_guardar, $where);


    }
}





// -------------     Funciones de Serigrafia   -----------------  //

//      Guardar Serigrafia
function createSerigrafia($wpdb){
    $tabla_serigrafia = "{$wpdb->prefix}koala_personalizado_parte_serigrafia";
    if(isset($_POST['guardarSerigrafia'])){
        $id_personalizado = $_POST['event-dropdown-personalizado'];
        $personalizado_parte_id = $_POST['event-dropdown-parte_serigrafia'];
        $lista_serigrafias = $_POST['serigrafia_dinamica'];
        $lista_serigrafias_precio = $_POST['serigrafia_dinamica_precio'];
        $largo_arreglo = count($lista_serigrafias_precio);

        $query = "SELECT * FROM {$wpdb->prefix}koala_personalizado_parte_serigrafia";
        $listado_serigrafias = $wpdb->get_results($query, ARRAY_A);

        $cant_serigrafia_de_la_misma_parte = 0;

        foreach ($listado_serigrafias as $serigrafia_){
            if($serigrafia_['PersonalizadoParteId'] == $personalizado_parte_id){
                $cant_serigrafia_de_la_misma_parte ++;
            }
        }
        $can_a_crear = 10 - $cant_serigrafia_de_la_misma_parte;


        for ($i=0; $i < $largo_arreglo; $i++){

            $serigrafia = $lista_serigrafias[$i];
            $precio = $lista_serigrafias_precio[$i];

            $datos_insertar = [
                'PersonalizadoParteSerigrafiaId' => null,
                'PersonalizadoParteId' => $personalizado_parte_id,
                'Serigrafia' => $serigrafia,
                'PrecioSerigrafia' => $precio,
                'activo' => 's'
            ];
            if($can_a_crear == 0){
                break;
            }
            $wpdb->insert($tabla_serigrafia, $datos_insertar);
            $can_a_crear --;
        }
    }
}

//      Listar Serigrafias
function listarSerigrafias($wpdb){
    $query = "SELECT * FROM {$wpdb->prefix}koala_personalizado_parte_serigrafia ORDER BY PersonalizadoParteId";
    $lista_serigrafias = $wpdb->get_results($query, ARRAY_A);
    return $lista_serigrafias;
}

//      Encontrar serigrafias por partes
function EncontrarSerigrafiasDadoIdParte($wpdb, $id){
    $query = "SELECT * FROM {$wpdb->prefix}koala_personalizado_parte_serigrafia WHERE PersonalizadoParteId = $id";
    $lista_serigrafias = $wpdb->get_results($query, ARRAY_A);
    return $lista_serigrafias;
}

//      Editar Serigrafia
function EditarSerigrafia($wpdb){
    $tabla_koala_serigrafia = "{$wpdb->prefix}koala_personalizado_parte_serigrafia";

    if(isset($_POST['guardarEditarSerigrafia'])){

        $datos_import = $_POST['datos_importantes_serigrafia'];
        $base64_decode = base64_decode($datos_import);
        $datos_importantes_a_json = json_decode($base64_decode);

        $id_serigrafia = $datos_importantes_a_json->id_serigrafia;

        $serigrafia_nombre = $_POST['editarserigrafianombre'];
        $serigrafia_precio = $_POST['editarserigrafiaprecio'];
        $activo = $_POST['activa_a_editar'];




        $datos_envios_a_guardar = [
            'Serigrafia'=>$serigrafia_nombre,
            'PrecioSerigrafia'=>$serigrafia_precio,
            'activo'=>$activo,
        ];
        $where = ['PersonalizadoParteSerigrafiaId'=>$id_serigrafia];

        $wpdb->update($tabla_koala_serigrafia, $datos_envios_a_guardar, $where);

    }

}


                    //  ----------  Funciones de Galeria de wordpress   ----------- //



?>
<div class="wrap">

<?php
    echo "<h1 class='wp-heading-inline'>".get_admin_page_title()."</h1>";
?>

    <a class='page-title-action' data-toggle='modal' data-target='#modalPersonalizadoNuevo'>Crear Personalizado</a>
    <a id="btnpartenueva" class="page-title-action" data-toggle="modal" data-target="#modalParteNuevo">Crear Parte</a>
    <a class='page-title-action' data-toggle='modal' data-target='#modalSerigrafiaNuevo'>Crear Serigrafia</a>



    <div class="card col-8" style="margin-left: 15% !important; margin-top: 60px !important;">
        <div class="card-header">
            <h2 class="card-title" style="font-size: 18px !important;"><strong> Personalizados</strong></h2>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover" id="campos_a_activar">
                <tbody >
                <?php
                foreach ($listaPersonalizados as $personalizado){
                    $id_personalizado = $personalizado['PersonalizadoId'];
                    $nombre_personalizado = $personalizado['PersonalizadoNombre'];

                    echo "
                            <tr data-widget='expandable-table' aria-expanded='false' id='tr_perso' >
                                <td class='expandable-minybody'>
                                    <a id='$id_personalizado' style='margin-left: 10px !important; font-size: 12px !important;' class='page-title-action btn_editar_personalizado' data-toggle='modal' data-target='#EditarPersonalizado'>Editar</a>
                                    <a id='$id_personalizado' style='margin-right: 10px !important; font-size: 12px !important;' class='page-title-action btn_borrar_personalizado'>Eliminar</a>
                                    
                                    <span style='font-size: 18px !important;'>$nombre_personalizado</span>
                                </td>
                            </tr>
                            <tr class='expandable-body'>
                                <td >
                                    <p style='margin-left: 45px !important; margin-top: 5px !important; font-size: 18px !important;'><strong>Partes</strong></p>
                                    <hr>
                    ";
                    $listaPartesDeUnPersonalizado = ListaPartesSegunIdPersonalizado($wpdb, $id_personalizado);
                    foreach ($listaPartesDeUnPersonalizado as $parte){
                        $id_parte = $parte['PersonalizadoParteId'];
                        $padre_parte_id = $parte['PersonalizadoId'];
                        $parte_nombre = $parte['Parte'];
                        $parte_img_url = $parte['ImgRutaParte'];
                        if($padre_parte_id == $id_personalizado){
                            echo "
                                    <div class='p-0' >
                                        <table class='table table-hover'>                                                               
                                            <tbody>
                                                <tr data-widget='expandable-table' aria-expanded='false'>
                                                    <td>
                                                        <img src='$parte_img_url' width='40' height='40'>
                                                        <a id='$id_parte' style='margin-left: 30px !important; font-size: 12px !important;' class='page-title-action btn_editar_parte' data-toggle='modal' data-target='#EditarParte'>Editar</a>
                                                        <a id='$id_parte' style='margin-left: 5px !important; margin-right: -5px !important; font-size: 12px !important;' class='page-title-action btn_borrar_parte'>Eliminar</a>
                                                        <span style='font-size: 16px !important; margin-left: 30px !important'>$parte_nombre</span>
                                                    </td>
                                                </tr>
                                                <tr class='expandable-body'>
                                                    <td>
                                                        <p style='margin-left: 135px !important; margin-top: 5px!important; font-size: 18px !important;'><strong>Serigrafías</strong></p>
                                                        <hr style='width: 100% !important;'>
                            ";
                            $id_parte = $parte['PersonalizadoParteId'];
                            $listaSerigrafiasXPartes = EncontrarSerigrafiasDadoIdParte($wpdb, $id_parte);

                            foreach ($listaSerigrafiasXPartes as $serigrafia){
                                $id_serigrafia = $serigrafia['PersonalizadoParteSerigrafiaId'];
                                $id_padre_serigrafia = $serigrafia['PersonalizadoParteId'];
                                $nombre_serigrafia = $serigrafia['Serigrafia'];
                                $precio_serigrafia = $serigrafia['PrecioSerigrafia'];
                                $serigrafia_activa = $serigrafia['activo'];

                                    if($id_parte == $id_padre_serigrafia & $padre_parte_id == $id_personalizado){
                                        echo "
                                                <div class='p-0'>
                                                     <table class='table table-hover'>
                                                        <tbody>
                                                            <tr>
                                                                <td>  
<!--                                                                     <a id='$id_serigrafia' style='margin-left: 120px !important;  font-size: 12px !important;' class='page-title-action '>Activar</a>    -->
                                                                     <a id='$id_serigrafia' style='margin-left: 5px !important; font-size: 12px !important;' class='page-title-action btn_editar_serigrafia' data-toggle='modal' data-target='#EditarSerigrafia'>Editar</a>
                                                                     <a id='$id_serigrafia' style='margin-left: 5px !important; margin-right: -5px !important; font-size: 12px !important;' class='page-title-action btn_borrar_serigrafia'>Eliminar</a>              
                                                                     <span style='font-size: 16px !important; margin-left: 30px !important; ' >$nombre_serigrafia</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                     </table>
                                                </div>
                                        ";
                                    }
                            }
                            echo "
                                                    </td>
                                                </tr>
                                        </tbody>
                                        </table>
                                    </div>
                            ";
                        }
                    }
                    echo "   
                                </td>
                            </tr>
                    ";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>



</div>








                    <!--    seccion de personalizado    -->

<!--         modal personalizado nuevo     -->
<div class="modal fade" id="modalPersonalizadoNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Agregar Personalizado</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="container">
                    </div>
                    <div class="form-group">
                        <label for="txtnombre" class="col-sm-4 col-form-label" style="font-size: 14px !important; margin-top: 5px">Nombre</label>
                        <div class="col-sm-8">
                            <input type="text" id="txtnombre" name="txtnombre" style="width: 75%; margin-top: 5px">
                        </div>
                    </div>
                    <br><br>
                    <hr>
                    <table>
                        <tr>
                            <td >
                                <label for="select" class="col-form-label col-sm-6" style="font-size: 14px !important;">Categorías</label>
                            </td>
                            <td >
                                <select class="form-control type-list col-sm-6" name="event-dropdown[]" multiple style="margin-left: 85px">
                                    <?php

                                    $spaceNumb = 0;
                                    $staticPxValue = 15;

                                    $cat_args_parent = [
                                        'orderby'    => $orderby,
                                        'order'      => $order,
                                        'hide_empty' => false,
                                        'parent' => 0,
                                    ];

                                    $product_categories = get_terms( 'product_cat', $cat_args_parent);

                                    foreach ( $product_categories as $key => $category ) {

                                        echo '<option value="'.$category->term_id.'">'.$category->name.'</option>';

                                        $cat_args_child = [
                                            'orderby'    => $orderby,
                                            'order'      => $order,
                                            'hide_empty' => false,
                                            'parent' => $category->term_id,
                                        ];

                                        $product_categories_childs = get_terms( 'product_cat', $cat_args_child);

                                        foreach ($product_categories_childs as $key => $category) {
                                            $spaceNumb += $staticPxValue;
                                            echo '<option style="margin-left:'.$spaceNumb.'px" value="'.$category->term_id.'">'.$category->name.'</option>';

                                            $cat_args_child['parent'] = $category->term_id;

                                            $product_categories_childs = get_terms( 'product_cat', $cat_args_child);

                                            foreach ($product_categories_childs as $key => $category) {
                                                $spaceNumb += $staticPxValue;
                                                echo '<option style="margin-left:'.$spaceNumb.'px" value="'.$category->term_id.'">'.$category->name.'</option>';

                                                $cat_args_child['parent'] = $category->term_id;

                                                $product_categories_childs = get_terms( 'product_cat', $cat_args_child);

                                                foreach ($product_categories_childs as $key => $category) {
                                                    $spaceNumb += $staticPxValue;
                                                    echo '<option style="margin-left:'.$spaceNumb.'px" value="'.$category->term_id.'">'.$category->name.'</option>';

                                                }
                                            }
                                        }
                                    }

                                    ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn_cancel" data-dismiss="modal" style="font-size: 12px">Cerrar</button>
                    <button id="guardarPersonalizado" name="guardarPersonalizado" type="submit" class="btn btn-success" style="font-size: 12px">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--    editar personalizado    -->
<div class="modal fade" id="EditarPersonalizado" tabindex="-1" role="dialog" aria-labelledby="EditarPersonalizadoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Editar Personalizado</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div id="datos_importantes_personalizado">
                        </div>
                        <table>
                            <tr>
                                <td >
                                    <label for="select" class="col-form-label " style="font-size: 14px; margin-left: 10px">Personalizado</label>
                                </td>
                                <td id="editarpersonalizadonombre">
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <table>
                            <tr>
                                <td >
                                    <label for="select" class="col-form-label " style="font-size: 14px; margin-left: 10px !important;">Quitar Categorías</label>
                                </td>
                                <td>
                                    <table id="quitar_categorias_editar_personalizado" class="wp-list-table widefat fixed striped pages" style="width: 50%; margin-left: 75px!important;">
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <table>
                            <tr>
                                <td >
                                    <label for="select" class="col-form-label col-sm-4" style="font-size: 14px!important;">Asignar Categorías</label>
                                </td>
                                <td>
                                    <select class="form-control type-list col-sm-8" name="event-dropdown_edit_personalizado[]" id="event-dropdown_edit_personalizado" multiple style="margin-left: 18px; width: 100% !important;">
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn_cancel" data-dismiss="modal" style="font-size: 12px">Cerrar</button>
                    <button id="guardarEditarPersonalizado" name="guardarEditarPersonalizado" type="submit" class="btn btn-success" style="font-size: 12px">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>



            <!--        termina la seccion de personalizado     -->




            <!--------    Seccion Partes      --------->

<!--        modal parte nuevo centrada  -->
<div class="modal fade" id="modalParteNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Nueva Parte</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="crear_parte_form">
                <div class="modal-body">
                    <div class="form-group">
                        <table>
                            <tr>
                                <td >
                                    <label for="select" class="col-form-label " style="font-size: 14px; margin-left: 10px; margin-top: 20px">Escoge el Personalizado</label>
                                </td>
                                <td >
                                    <select class="form-control type-list col-sm-6" name="event-dropdown-parte" id="personalizado_padre_de_parte" style="margin-left: 35px; margin-top: 20px">
                                        <?php
                                        foreach ( $listaPersonalizados as $personalizado ) {
                                            $id_perso = $personalizado['PersonalizadoId'];
                                            $nombre_perso = $personalizado['PersonalizadoNombre'];

                                            echo '<option value="'.$id_perso.'">'.$nombre_perso.'</option>';

                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br><br>
                    <hr style="margin-top: -15px">
                    <table id="campospersonalizados" >
                        <tr>
                            <td>
                                <label for="partepersonalizado" class="col-form-label" style="font-size: 14px">Parte 1</label>
                            </td>
                            <td>
                                <input type="text" name="partepersonalizado[]" id="partepersonalizado" class="form-control" style="margin-left: 5px; width: 100%; font-size: 12px !important;">
                            </td>
                            <td>
                                <button name="add" id="add" class="btn btn-primary" style="margin-left: 10px; font-size: 14px !important;">+</button>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn_cancel" data-dismiss="modal" style="font-size: 12px">Cerrar</button>
                    <button id="guardarPartePersonalizado" name="guardarPartePersonalizado" type="submit" class="btn btn-success" onclick=" return validar_parte_nueva();" style="font-size: 12px; ">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--        modal parte editar  -->

<div class="modal fade" id="EditarParte" tabindex="-1" role="dialog" aria-labelledby="EditarParteTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Editar Parte</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div id="datos_importantes_parte">

                        </div>
                        <table>
                            <tr>
                                <td >
                                    <label for="select" class="col-form-label " style="font-size: 14px; margin-left: 10px">Personalizado Padre</label>
                                </td>
                                <td>
                                    <select  id="personalizado_padre_parte" class="form-control type-list " name="event-dropdown-personalizado_padre_parte" style="margin-left: 45px" disabled>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <table>
                            <tr>
                                <td >
                                    <label for="select" class="col-form-label " style="font-size: 14px; margin-left: 10px">Parte</label>
                                </td>
                                <td id="parte_a_editar">
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <div class="row" id="parte_img" style="overflow-y: scroll; height: 150px !important;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn_cancel" data-dismiss="modal" style="font-size: 12px">Cerrar</button>
                    <button id="guardarEditarParte" name="guardarEditarParte" type="submit" class="btn btn-success" style="font-size: 12px">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>








                            <!--------    Seccion Serigrafia      --------->

<!--        crear serigrafia nueva centrada-->

<div class="modal fade" id="modalSerigrafiaNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Nueva Serigrafía</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="crear_serigrafia_form">
                <div class="modal-body">
                    <div class="form-group">
                        <table>
                            <tr>
                                <td >
                                    <label for="select" class="col-form-label " style="font-size: 14px; margin-left: 10px">Escoge el Personalizado</label>
                                </td>
                                <td>
                                    <select  id="personalizado" class="form-control type-list " name="event-dropdown-personalizado" style="margin-left: 85px" onchange="CapturarPersonalizado(this.value )" >
                                        <option value="vacio" selected></option>
                                        <?php
                                            foreach ( $listaPersonalizados as $personalizado ) {
                                                $id_perso = $personalizado['PersonalizadoId'];
                                                $nombre_perso = $personalizado['PersonalizadoNombre'];
                                                echo '<option value="'.$id_perso.'">'.$nombre_perso.'</option>';
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <table>
                            <tr>
                                <td >
                                    <label for="select" class="col-form-label" style="font-size: 14px; margin-left: 10px">Escoge la parte del personalizado</label>
                                </td>
                                <td >
                                    <select class="form-control type-list " name="event-dropdown-parte_serigrafia" id="select_partes" style="margin-left: 20px">
                                        <option value="vacio"></option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <hr>
                    <table id="serigrafias_campospersonalizados">
                        <tr>
                            <td>
                                <label for="serigrafia_dinamica" class="col-form-label" style="font-size: 14px; margin-left: 10px">Serigrafia 1</label>
                            </td>
                            <td>
                                <input type="text" name="serigrafia_dinamica[]" id="serigrafia_dinamica" class="form-control" style="width: 150px !important; margin-left: 10px !important; margin-right: 10px !important;">
                            </td>
                            <td>
                                <label for="serigrafia_dinamica_precio" class="col-form-label" style="font-size: 14px">Precio</label>
                            </td>
                            <td>
                                <input type="number" name="serigrafia_dinamica_precio[]" id="serigrafia_dinamica_precio" class="form-control" style="width: 120px !important; margin-left: 10px !important; margin-right: 10px !important;">
                            </td>
                            <td>
                                <button name="add_seri_dinamica" id="add_seri_dinamica" class="btn btn-primary" style="font-size: 14px">+</button>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn_cancel" data-dismiss="modal" style="font-size: 12px">Cerrar</button>
                    <button id="guardarSerigrafia" name="guardarSerigrafia" type="submit" class="btn btn-success" onclick=" return validar_serigrafia_nueva();" style="font-size: 12px">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--        editar serigrafia  centrada     -->

<div class="modal fade" id="EditarSerigrafia" tabindex="-1" role="dialog" aria-labelledby="EditarSerigrafiaTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Editar Serigrafía</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div id="datos_importantes_serigrafia">
                        </div>
                        <table>
                            <tr>
                                <td >
                                    <label for="select" class="col-form-label " style="font-size: 14px; margin-left: 10px">Personalizado Padre</label>
                                </td>
                                <td>
                                    <select  id="personalizado_padre_serigrafia" class="form-control type-list " name="event-dropdown-personalizado_padre_serigrafia" style="margin-left: 45px" disabled>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <table>
                            <tr>
                                <td >
                                    <label for="select" class="col-form-label" style="font-size: 14px; margin-left: 10px">Parte Padre</label>
                                </td>
                                <td >
                                    <select class="form-control type-list " name="event-dropdown-parte_padre_serigrafia" id="parte_padre_serigrafia" style="margin-left: 100px; width: 85% !important;" disabled>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <label for="serigrafia_editar_nombre" class="col-form-label" style="font-size: 14px; margin-left: 10px!important;">Serigrafia</label>
                                </div>
                                <div class="col-6" id="serigrafia_a_editar">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <label for="serigrafia_editar_precio" class="col-form-label" style="font-size: 14px; margin-left: 20px;">Precio</label>
                                </div>
                                <div class="col-6" id="precio_a_editar">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <label for="serigrafia_editar_activa" class="col-form-label" style="font-size: 14px; margin-left: 10px !important;">Activa</label>
                                </div>
                                <div class="col-6">
                                    <select class="form-control type-list " name="activa_a_editar" id="activa_a_editar" style="; margin-left: -10px !important;">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn_cancel" data-dismiss="modal" style="font-size: 12px">Cerrar</button>
                    <button id="guardarEditarSerigrafia" name="guardarEditarSerigrafia" type="submit" class="btn btn-success" style="font-size: 12px">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>