<?php
/*
  Plugin Name: Calculadora Koala
  Plugin URI: https://www.facebook.com/ernestoramses
  Description: Administración de Koala
  Version: 1.0.0
 */


function Activar_KoalaAdmin(){

    global $wpdb;

    $sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}koala_personalizado  (
                `PersonalizadoId` int(0) NOT NULL AUTO_INCREMENT,
                `PersonalizadoNombre` varchar(45) NULL,
                `PersonalizadoCategorias` varchar(100) NULL,
                PRIMARY KEY (`PersonalizadoId`));";
    $wpdb->query($sql);

    $sql2 = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}koala_personalizado_parte  (
                `PersonalizadoParteId` int(0) NOT NULL AUTO_INCREMENT,
                `PersonalizadoId` INT NULL,
                `Parte` varchar(45) NULL,
                `ImgNombreParte` varchar(100) NULL,
                `ImgRutaParte` varchar(200) NULL,
                PRIMARY KEY (`PersonalizadoParteId`));";
    $wpdb->query($sql2);

    $sql3 = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}koala_personalizado_parte_serigrafia  (
                `PersonalizadoParteSerigrafiaId` int(0) NOT NULL AUTO_INCREMENT,
                `PersonalizadoParteId` INT NULL,
                `Serigrafia` varchar(100) NULL,
                `PrecioSerigrafia` float(100, 2) NULL,
                `activo` char(2) NULL,
                PRIMARY KEY (`PersonalizadoParteSerigrafiaId`));";
    $wpdb->query($sql3);

    $sql4 = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}koala_envios (
                `KoalaEnviosId` int(0) NOT NULL AUTO_INCREMENT,
                `KoalaEnviosNombre` VARCHAR(45) NULL,
                `KoalaEnviosDias` INT(45) NULL,
                `KoalaEnviosPrecio` float(100, 2) NULL,
                `KoalaEnviosDescripcion` varchar(150) NULL,
                `KoalaEnviosCategorias` varchar(100) NULL,
                PRIMARY KEY (`KoalaEnviosId`));";
    $wpdb->query($sql4);





    $title = 'Pedir presupuesto';
    $preorder_page = get_page_by_title( $title );

    $post_content = '
            <div id="container_form" class="container">
            <div class="row" id="contenedor_pedir_presup">
                <div class="col-12">
                    <h2>Presupuesto</h2>
                    <p>No estás haciendo la compra, estás pidiendo un presupuesto que te enviaremos por correo electrónico.</p>
                    <hr>  
                </div>
                <div class="col-12 col-sm-6" id="content_form_presup">
                    <div id="checkout-data-form" class="row" data-action="https://garrampa.es/checkout/save/order/">
                    <div class="col-12 shipping-address">
                        <div class="form-content"  data-form="shipping">
               
                            <h2 class="form-title">Datos de contacto</h2>
                           
                                <div class="form-input required">
                                    <input type="email" data-required="1" class="address-field input_formulario" name="email" placeholder="Correo electrónico" value="">
                                </div>
                                <div class="form-input required">
                                    <input type="text" data-required="1" class="address-field input_formulario" name="firstname" placeholder="Nombre" value="">
                                </div> 
                                <div class="form-input required">
                                    <input type="text" data-required="1" class="address-field input_formulario" name="lastname" placeholder="Apellidos" value="">
                                </div>
                                <div class="form-input">
                                    <input type="text" data-required="0" class="address-field input_formulario" name="company" placeholder="Empresa" value="">
                                </div>
                                <div class="form-input required">
                                    <input type="text" data-required="1" class="address-field input_formulario" name="street" placeholder="Dirección" value="">
                                </div>
                                <div class="form-input required">
                                    <input type="text" data-required="1" class="address-field input_formulario" name="city" placeholder="Ciudad" value="">
                                </div>
                                <div class="form-input required">
                                    <input type="text" data-required="1" class="address-field input_formulario" name="postcode" placeholder="Código Postal" value="">
                                </div>
                                <div class="form-input required"> 
                                    <select data-required="1" class="address-field select_input_formulario" name="region_id">
                                        <option value="">Provincia</option>
                                        <option value="130">A Coruña</option> 
                                        <option value="131">Alava</option> 
                                        <option value="132">Albacete</option> 
                                        <option value="133">Alicante</option> 
                                        <option value="134">Almeria</option> 
                                        <option value="135">Asturias</option> 
                                        <option value="136">Avila</option> 
                                        <option value="137">Badajoz</option> 
                                        <option value="138">Baleares</option> 
                                        <option value="139">Barcelona</option> 
                                        <option value="140">Burgos</option> 
                                        <option value="141">Caceres</option> 
                                        <option value="142">Cadiz</option> 
                                        <option value="143">Cantabria</option> 
                                        <option value="144">Castellon</option> 
                                        <option value="145">Ceuta</option> 
                                        <option value="146">Ciudad Real</option> 
                                        <option value="147">Cordoba</option> 
                                        <option value="148">Cuenca</option> 
                                        <option value="149">Girona</option> 
                                        <option value="150">Granada</option> 
                                        <option value="151">Guadalajara</option> 
                                        <option value="152">Guipuzcoa</option> 
                                        <option value="153">Huelva</option> 
                                        <option value="154">Huesca</option> 
                                        <option value="155">Jaen</option> 
                                        <option value="156">La Rioja</option> 
                                        <option value="157">Las Palmas</option> 
                                        <option value="158">Leon</option> 
                                        <option value="159">Lleida</option> 
                                        <option value="160">Lugo</option> 
                                        <option value="161">Madrid</option> 
                                        <option value="162">Malaga</option> 
                                        <option value="163">Melilla</option> 
                                        <option value="164">Murcia</option> 
                                        <option value="165">Navarra</option> 
                                        <option value="166">Ourense</option> 
                                        <option value="167">Palencia</option> 
                                        <option value="168">Pontevedra</option> 
                                        <option value="169">Salamanca</option> 
                                        <option value="170">Santa Cruz de Tenerife</option> 
                                        <option value="171">Segovia</option> 
                                        <option value="172">Sevilla</option> 
                                        <option value="173">Soria</option> 
                                        <option value="174">Tarragona</option> 
                                        <option value="175">Teruel</option> 
                                        <option value="176">Toledo</option> 
                                        <option value="177">Valencia</option> 
                                        <option value="178">Valladolid</option> 
                                        <option value="179">Vizcaya</option> 
                                        <option value="180">Zamora</option> 
                                        <option value="181">Zaragoza</option>
                                    </select> 
                                </div>
                                <div class="form-input required">
                                    <select data-required="0" class="address-field select_input_formulario" name="country_id">
                                        <option value="">País</option> 
                                        <option value="ES">España</option>
                                    </select>
                                </div>
                                <div class="form-input required">
                                    <input type="text" data-required="0" class="address-field input_formulario" name="telephone" placeholder="Número de teléfono" value="">
                                </div> 
                                <div class="form-input">
                                    <input type="text" data-required="0" class="address-field input_formulario" name="vat_id" placeholder="NIF / CIF" value="">
                                </div>
                              
                                <input type="button" class="place-order-button boton_pedir_presupuesto my-3" id="obtener_presupuesto" value="Obtener Presupuesto" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h2 class="h2_contenedor_tabla">Resumen del pedido</h2>
                    <div class="contenedor_tabla card shadow-sm p-4">
                        <div id="crear_tarjeta_tabla">
                            
                        </div> 
                        <table class="mb-0">
                            <tr>
                                <td><span class="span_label_tabla_subtotal"><strong> Subtotal </strong></span></td>
                                <td><span class="span_value_tabla_subtotal" id="total_pedido_sin_impuestos"> imp </span></td>
                            </tr>
                            <tr>
                                <td><span class="span_label_tabla_subtotal">IVA 21%</span></td>
                                <td><span class="span_value_tabla_subtotal" id="total_iva"> importe </span></td>
                            </tr>
                            <tr>
                                <td><span class="span_label_tabla_subtotal total_final"><strong> Total del pedido </strong></span></td>
                                <td><span class="span_value_tabla_subtotal total_final" id="total_pedido"> imp </span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    ';

    if( $preorder_page == null ) {
        $wordpress_post = array(
            'post_title' => 'Pedir presupuesto',
            'post_content' => $post_content,
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page'
        );

        wp_insert_post( $wordpress_post );
    }


}

function Desactivar_KoalaAdmin(){
    flush_rewrite_rules();
}


register_activation_hook(__FILE__,'Activar_KoalaAdmin');
register_deactivation_hook(__FILE__,'Desactivar_KoalaAdmin');


add_action('admin_menu', 'MenuKoalaAdmin');

function MenuKoalaAdmin(){
    add_menu_page(
        'Inicio',
        'Calculadora Koala',
        'manage_options',
        'koala_admin_menu',
        'Mostrar_Contenido',
        '',
        '30'
    );
    add_submenu_page(
        'koala_admin_menu',
        'Personalizado',
        'Personalizado',
        'manage_options',
        plugin_dir_path(__FILE__).'admin/templates/personalizado.php',
        null
    );
    add_submenu_page(
      'koala_admin_menu',
      'Envíos',
      'Envíos',
      'manage_options',
      plugin_dir_path(__FILE__).'admin/templates/envios.php',
      null
    );


}
function Mostrar_Contenido(){
    echo "<h1>Calculadora Koala</h1>
         ";
}


        //  --------------------------------------------------------- //
//      cambiarle nombre al boton de añadir
//add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_shop_page_add_to_cart_callback' );
//function woocommerce_shop_page_add_to_cart_callback() {
//    return __( 'Add to Bag', 'text-domain' );
//}

//add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_single_page_add_to_cart_callback' );
//function woocommerce_single_page_add_to_cart_callback() {
//
//    return __( 'Calcular Precio', 'text-domain' );
//
//}

        //  --------------------------------------------------------- //


//  ---------------------------------------------   //
//      eliminar el noton a;adir


//add_filter( 'woocommerce_is_purchasable', '__return_false' );

//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

//  ---------------------------------------------   //

add_filter( 'woocommerce_review_order_before_payment', 'wp_koala_woocommerce_review_order_before_payment_action' );
function wp_koala_woocommerce_review_order_before_payment_action()
{
    $cart_data = WC()->cart->get_cart();
    $alertVisibility = true;

    foreach ($cart_data as $cart_item_key => $cart_item) {
        if (isset($cart_item['img_ruta1'])){
            $alertVisibility = false;
        }else if (isset($cart_item['img_ruta2'])){
            $alertVisibility = false;
        }else if (isset($cart_item['img_ruta3'])){
            $alertVisibility = false;
        }else if (isset($cart_item['img_ruta4'])){
            $alertVisibility = false;
        }
    }

    if ($alertVisibility){
        echo "<div class='row align-items-center mb-5'>
                <div class='col-12'>
                    <div class='alert alert-warning shadow-sm' role='alert'>
                      <span><strong>No has subido ningún archivo </strong> para las personalizaciones, si quieres, puedes enviarla más tarde al correo a: <a href='mailto:soporte@hola.com'>soporte@hola.com</a></span>
                    </div>
                </div>
           </div>";
    }
}

//      ---------------------------------------------       //
//      mostrar boton calcular precio   //

//woocommerce_product_meta_start
add_filter('woocommerce_before_add_to_cart_button', 'show_button_Conseguir_Ebook');
function show_button_Conseguir_Ebook() {
    $boton = "<div class='row justify-content-center align-items-center'>";
    $boton .= "    <div class='col-8 col-sm-5 col-md-6 col-lg-5 col-xl-5'>";
    $boton .= "        <input name='calcula_tu_precio' id='calcula_tu_precio' type='button' class='button-calcula_tu_precio flat' value='Calcular precio'>";
    $boton .= "    </div>";
    $boton .= "</div>";

    echo $boton;
}
//      ---------------------------------------------       //


function dcms_display_field() {

    echo "<div class='clearer'></div>";
    global $product;
    $id_del_producto = $product->get_id();

    $variaciones_del_producto_encode = '';

    if($product->is_type('variable') && is_product()){
        $variaciones_del_producto = $product->get_available_variations();
        $variaciones_del_producto_encode = json_encode($variaciones_del_producto);
    }

    //  validacion para mostrar
    $nonbre_del_producto = $product->get_name();
    $categorias_del_producto = $product->get_category_ids();

    $personalizado_id = '';
    $bandera_mostrar = false;

    $list_personalizados = PersonalizadosLista();

    foreach ($list_personalizados as $perso){
        $personalizado_id_ = $perso['PersonalizadoId'];
        $personalizado_nombre = $perso['PersonalizadoNombre'];
        $personalizado_categorias = $perso['PersonalizadoCategorias'];
        $personalizado_categorias_decode = json_decode($personalizado_categorias, ARRAY_A);

//        if($personalizado_nombre === $nonbre_del_producto ){

            $lista_resultante1 = array_diff($categorias_del_producto, $personalizado_categorias_decode);
            $lista_resultante2 = array_diff($personalizado_categorias_decode, $categorias_del_producto );

            if(!$lista_resultante1 & !$lista_resultante2){
                $personalizado_id = $personalizado_id_;
                $bandera_mostrar = true;
            }
//        }
    }

    $product_url = get_permalink($id_del_producto);

    if($bandera_mostrar){

    echo "
        <div id='contenedor_general' style=' display: none !important;'>
            <form id='formulario_koala' class='variations_form cart' action='$product_url' method='post' enctype='multipart/form-data' 
            data-product_id='$id_del_producto' data-product-variations='$variaciones_del_producto_encode' >

    ";

//    cuantos

        echo "
           <button type='button' class='collapsible' id='seccion_cuantos'>Cuántos?<label id='label_cuantos' > - Cantidad Seleccionada: </label><label id='cant_escog'></label><input type='text' id='input_cantidad_seleccionada' name='input_cantidad_seleccionada' value='' hidden></button>
           <div class='content' id='content_cuantos'>
           
              <p id='mostrar_color'></p>
                  
              <div class='row align-items-center justify-content-md-between justify-content-lg-between justify-content-xl-between justify-content-center'>
              
                  <div class='col-sm-3 col-md-3 col-lg-1 col-xl-1 mt-3'>
                    <input name='cant_a_escoger' id='cant_a_escoger_5' type='button' class='btn_cuantos cant_a_escoger_5 w-100' value='5'>
                  </div>
                  <div class='col-sm-3 col-md-3 col-lg-1 col-xl-1 mt-3'>
                    <input name='cant_a_escoger' id='cant_a_escoger_10' type='button' class='btn_cuantos cant_a_escoger_10 w-100' value='10'>
                  </div>
                  <div class='col-sm-3 col-md-3 col-lg-1 col-xl-1 mt-3'>
                    <input name='cant_a_escoger' id='cant_a_escoger_25' type='button' class='btn_cuantos cant_a_escoger_25 w-100' value='25'>
                  </div>
                  <div class='col-sm-3 col-md-3 col-lg-1 col-xl-1 mt-3'>
                    <input name='cant_a_escoger' id='cant_a_escoger_50' type='button' class='btn_cuantos cant_a_escoger_50 w-100' value='50'>
                  </div>
                  <div class='col-sm-3 col-md-3 col-lg-1 col-xl-1 mt-3'>
                    <input name='cant_a_escoger' id='cant_a_escoger_100' type='button' class='btn_cuantos cant_a_escoger_100 w-100' value='100'>
                  </div>
                  <div class='col-sm-3 col-md-3 col-lg-1 col-xl-1 mt-3'>
                    <input name='cant_a_escoger' id='cant_a_escoger_250' type='button' class='btn_cuantos cant_a_escoger_250 w-100' value='250'>
                  </div>
                  <div class='col-sm-3 col-md-3 col-lg-1 col-xl-1 mt-3'>
                    <input name='cant_a_escoger' id='cant_a_escoger_500' type='button' class='btn_cuantos cant_a_escoger_500 w-100' value='500'>
                  </div>
       
                  <div class='col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-3'>
                    <input type='number' style='max-width: 100%' id='otra_cantidad' name='otra_cantidad' class='otra_cantidad w-100' placeholder='Otra Cantidad' >
                  </div>
            
              </div>
              <div class='row'>
                <div class='col p-0 m-0'>
                    <input type='button' class='confirmar_cantidad btn btn-primary my-4' id='confirmar_cantidad' name='confirmar_cantidad' value='Confirmar Cantidad' style='display: none'>
                </div>
              </div>
           
           </div>
    ";

//    ---------------------------------------------------------     //

//    Partes

    //    seccion 2
    $parted_del_personalizado = PartexId($personalizado_id);

    $seccion2 = "         <button type='button' class='collapsible' id='seccion_personalizalo'>Personalízalo!<label id='label_cuantos' > - Posiciones Seleccionadas:</label> <label id='partes_escog' style='margin-left: 5px;'></label> <input type='text' id='input_posiciones_seleccionadas' name='input_posiciones_seleccionadas' value='' hidden><input type='text' id='input_serigrafias' name='input_serigrafias' value='' hidden><input type='text' id='precios_serigrafias' name='precios_serigrafias' value='' hidden></button>";
    $seccion2 .= "            <div class='content' id='content_personalizalo'>";
    $seccion2 .= "                <div class='row' id='contenedor_partes'>";



    for ($i = 0; $i < count($parted_del_personalizado); $i++){
        //  boton 1 //
        $id_btn_parte1 = $parted_del_personalizado[0]['PersonalizadoParteId'];
        $nombre_btn_parte1 = $parted_del_personalizado[0]['Parte'];
        $img1 = $parted_del_personalizado[0]['ImgRutaParte'];
        //  boton 2 //
        $id_btn_parte2 = $parted_del_personalizado[1]['PersonalizadoParteId'];
        $nombre_btn_parte2 = $parted_del_personalizado[1]['Parte'];
        $img2 = $parted_del_personalizado[1]['ImgRutaParte'];
        //  boton 3 //
        $id_btn_parte3 = $parted_del_personalizado[2]['PersonalizadoParteId'];
        $nombre_btn_parte3 = $parted_del_personalizado[2]['Parte'];
        $img3 = $parted_del_personalizado[2]['ImgRutaParte'];
        //  boton 4 //
        $id_btn_parte4 = $parted_del_personalizado[3]['PersonalizadoParteId'];
        $nombre_btn_parte4 = $parted_del_personalizado[3]['Parte'];
        $img4 = $parted_del_personalizado[3]['ImgRutaParte'];
    }

    $serigrafias_de_parte1 = SerigrafiaxId($id_btn_parte1);

    if($serigrafias_de_parte1){
        $seccion2 .= "                <div class='col-lg-3 col-sm-6 mt-4'>";
        if(!empty($img1)){
            $seccion2 .= "                <img src='$img1' class='img_partes mb-3' width='60' height='60' >";
        }
        $seccion2 .= "                    <input name='parte1' id='btn_parte1' type='button' class='btn_partes w-100' value='$nombre_btn_parte1' data-id='$id_btn_parte1'>";
        $seccion2 .= "                      <div class='cont_ser_resp'>";
        for ($i = 0; $i < count($serigrafias_de_parte1); $i++){
            //  serigrafia 1 //
            $id_serigrafia1 = $serigrafias_de_parte1[0]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia1 = $serigrafias_de_parte1[0]['Serigrafia'];
            $precio_serigrafia1 = $serigrafias_de_parte1[0]['PrecioSerigrafia'];
            //  serigrafia 2 //
            $id_serigrafia2 = $serigrafias_de_parte1[1]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia2 = $serigrafias_de_parte1[1]['Serigrafia'];
            $precio_serigrafia2 = $serigrafias_de_parte1[1]['PrecioSerigrafia'];
            //  serigrafia 3 //
            $id_serigrafia3 = $serigrafias_de_parte1[2]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia3 = $serigrafias_de_parte1[2]['Serigrafia'];
            $precio_serigrafia3 = $serigrafias_de_parte1[2]['PrecioSerigrafia'];
            //  serigrafia 4 //
            $id_serigrafia4 = $serigrafias_de_parte1[3]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia4 = $serigrafias_de_parte1[3]['Serigrafia'];
            $precio_serigrafia4 = $serigrafias_de_parte1[3]['PrecioSerigrafia'];
            //  serigrafia 5 //
            $id_serigrafia5 = $serigrafias_de_parte1[4]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia5 = $serigrafias_de_parte1[4]['Serigrafia'];
            $precio_serigrafia5 = $serigrafias_de_parte1[4]['PrecioSerigrafia'];
            //  serigrafia 6 //
            $id_serigrafia6 = $serigrafias_de_parte1[5]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia6 = $serigrafias_de_parte1[5]['Serigrafia'];
            $precio_serigrafia6 = $serigrafias_de_parte1[5]['PrecioSerigrafia'];
            //  serigrafia 7 //
            $id_serigrafia7 = $serigrafias_de_parte1[6]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia7 = $serigrafias_de_parte1[6]['Serigrafia'];
            $precio_serigrafia7 = $serigrafias_de_parte1[6]['PrecioSerigrafia'];
            //  serigrafia 8 //
            $id_serigrafia8 = $serigrafias_de_parte1[7]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia8 = $serigrafias_de_parte1[7]['Serigrafia'];
            $precio_serigrafia8 = $serigrafias_de_parte1[7]['PrecioSerigrafia'];
            //  serigrafia 9 //
            $id_serigrafia9 = $serigrafias_de_parte1[8]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia9 = $serigrafias_de_parte1[8]['Serigrafia'];
            $precio_serigrafia9 = $serigrafias_de_parte1[8]['PrecioSerigrafia'];
            //  serigrafia 10 //
            $id_serigrafia10 = $serigrafias_de_parte1[9]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia10 = $serigrafias_de_parte1[9]['Serigrafia'];
            $precio_serigrafia10 = $serigrafias_de_parte1[9]['PrecioSerigrafia'];
        }
        if($nombre_serigrafia1){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_izq' type='radio' id='parte1_serigrafia_radio1' name='$nombre_btn_parte1' value='$id_serigrafia1' data-precio='$precio_serigrafia1' data-id-padre='btn_parte1'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_izq'>$nombre_serigrafia1</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia2){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_derecha' type='radio' id='parte1_serigrafia_radio2' name='$nombre_btn_parte1' value='$id_serigrafia2' data-precio='$precio_serigrafia2' data-id-padre='btn_parte1'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_derecha' >$nombre_serigrafia2</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia3){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_izq' type='radio' id='parte1_serigrafia_radio3' name='$nombre_btn_parte1' value='$id_serigrafia3' data-precio='$precio_serigrafia3' data-id-padre='btn_parte1'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_izq'>$nombre_serigrafia3</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia4){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_derecha' type='radio' id='parte1_serigrafia_radio4' name='$nombre_btn_parte1' value='$id_serigrafia4' data-precio='$precio_serigrafia4' data-id-padre='btn_parte1'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_derecha'>$nombre_serigrafia4</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia5){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_izq' type='radio' id='parte1_serigrafia_radio5' name='$nombre_btn_parte1' value='$id_serigrafia5' data-precio='$precio_serigrafia5' data-id-padre='btn_parte1'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_izq'>$nombre_serigrafia5</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia6){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_derecha' type='radio' id='parte1_serigrafia_radio6' name='$nombre_btn_parte1' value='$id_serigrafia6' data-precio='$precio_serigrafia6' data-id-padre='btn_parte1'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_derecha'>$nombre_serigrafia6</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia7){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_izq' type='radio' id='parte1_serigrafia_radio7' name='$nombre_btn_parte1' value='$id_serigrafia7' data-precio='$precio_serigrafia7' data-id-padre='btn_parte1'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_izq'>$nombre_serigrafia7</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia8){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_derecha' type='radio' id='parte1_serigrafia_radio8' name='$nombre_btn_parte1' value='$id_serigrafia8' data-precio='$precio_serigrafia8' data-id-padre='btn_parte1'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_derecha'>$nombre_serigrafia8</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia9){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_izq' type='radio' id='parte1_serigrafia_radio9' name='$nombre_btn_parte1' value='$id_serigrafia9' data-precio='$precio_serigrafia9' data-id-padre='btn_parte1'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_izq'>$nombre_serigrafia9</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia10){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_derecha' type='radio' id='parte1_serigrafia_radio10' name='$nombre_btn_parte1' value='$id_serigrafia10' data-precio='$precio_serigrafia10' data-id-padre='btn_parte1'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_derecha'>$nombre_serigrafia10</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        $seccion2 .= "                    </div>";
        $seccion2 .= "                </div>";
    }

    $serigrafias_de_parte2 = SerigrafiaxId($id_btn_parte2);
    if($serigrafias_de_parte2){
        $seccion2 .= "                <div class='col-lg-3 col-sm-6 mt-4'>";
        if (!empty($img2)){
            $seccion2 .= "                <img src='$img2' class='img_partes mb-3' width='60' height='60' >";
        }
        $seccion2 .= "                    <input name='parte2' id='btn_parte2' type='button' class='btn_partes w-100' value='$nombre_btn_parte2' data-id='$id_btn_parte2' >";
        $seccion2 .= "                      <div class='cont_ser_resp'>";
        for ($i = 0; $i < count($serigrafias_de_parte2); $i++){
            //  serigrafia 11 //
            $id_serigrafia11 = $serigrafias_de_parte2[0]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia11 = $serigrafias_de_parte2[0]['Serigrafia'];
            $precio_serigrafia11 = $serigrafias_de_parte2[0]['PrecioSerigrafia'];
            //  serigrafia 12 //
            $id_serigrafia12 = $serigrafias_de_parte2[1]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia12 = $serigrafias_de_parte2[1]['Serigrafia'];
            $precio_serigrafia12 = $serigrafias_de_parte2[1]['PrecioSerigrafia'];
            //  serigrafia 13 //
            $id_serigrafia13 = $serigrafias_de_parte2[2]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia13 = $serigrafias_de_parte2[2]['Serigrafia'];
            $precio_serigrafia13 = $serigrafias_de_parte2[2]['PrecioSerigrafia'];
            //  serigrafia 4 //
            $id_serigrafia14 = $serigrafias_de_parte2[3]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia14 = $serigrafias_de_parte2[3]['Serigrafia'];
            $precio_serigrafia14 = $serigrafias_de_parte2[3]['PrecioSerigrafia'];
            //  serigrafia 15 //
            $id_serigrafia15 = $serigrafias_de_parte2[4]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia15 = $serigrafias_de_parte2[4]['Serigrafia'];
            $precio_serigrafia15 = $serigrafias_de_parte2[4]['PrecioSerigrafia'];
            //  serigrafia 16 //
            $id_serigrafia16 = $serigrafias_de_parte2[5]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia16 = $serigrafias_de_parte2[5]['Serigrafia'];
            $precio_serigrafia16 = $serigrafias_de_parte2[5]['PrecioSerigrafia'];
            //  serigrafia 17 //
            $id_serigrafia17 = $serigrafias_de_parte2[6]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia17 = $serigrafias_de_parte2[6]['Serigrafia'];
            $precio_serigrafia17 = $serigrafias_de_parte2[6]['PrecioSerigrafia'];
            //  serigrafia 18 //
            $id_serigrafia18 = $serigrafias_de_parte2[7]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia18 = $serigrafias_de_parte2[7]['Serigrafia'];
            $precio_serigrafia18 = $serigrafias_de_parte2[7]['PrecioSerigrafia'];
            //  serigrafia 19 //
            $id_serigrafia19 = $serigrafias_de_parte2[8]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia19 = $serigrafias_de_parte2[8]['Serigrafia'];
            $precio_serigrafia19 = $serigrafias_de_parte2[8]['PrecioSerigrafia'];
            //  serigrafia 20 //
            $id_serigrafia20 = $serigrafias_de_parte2[9]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia20 = $serigrafias_de_parte2[9]['Serigrafia'];
            $precio_serigrafia20 = $serigrafias_de_parte2[9]['PrecioSerigrafia'];
        }
        if($nombre_serigrafia11){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_izq' type='radio' id='parte2_serigrafia_radio1' name='$nombre_btn_parte2' value='$id_serigrafia11' data-precio='$precio_serigrafia11' data-id-padre='btn_parte2'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_izq'>$nombre_serigrafia11</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia12){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_derecha' type='radio' id='parte2_serigrafia_radio2' name='$nombre_btn_parte2' value='$id_serigrafia12' data-precio='$precio_serigrafia12' data-id-padre='btn_parte2'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_derecha'>$nombre_serigrafia12</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia13){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_izq' type='radio' id='parte2_serigrafia_radio3' name='$nombre_btn_parte2' value='$id_serigrafia13' data-precio='$precio_serigrafia13' data-id-padre='btn_parte2'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_izq'>$nombre_serigrafia13</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia14){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_derecha' type='radio' id='parte2_serigrafia_radio4' name='$nombre_btn_parte2' value='$id_serigrafia14' data-precio='$precio_serigrafia14' data-id-padre='btn_parte2'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_derecha'>$nombre_serigrafia14</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia15){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_izq' type='radio' id='parte2_serigrafia_radio5' name='$nombre_btn_parte2' value='$id_serigrafia15'  data-precio='$precio_serigrafia15' data-id-padre='btn_parte2'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_izq'>$nombre_serigrafia15</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia16){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_derecha' type='radio' id='parte2_serigrafia_radio6' name='$nombre_btn_parte2' value='$id_serigrafia16' data-precio='$precio_serigrafia16' data-id-padre='btn_parte2'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_derecha'>$nombre_serigrafia16</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia17){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_izq' type='radio' id='parte2_serigrafia_radio7' name='$nombre_btn_parte2' value='$id_serigrafia17' data-precio='$precio_serigrafia17' data-id-padre='btn_parte2'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_izq'>$nombre_serigrafia17</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia18){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_derecha' type='radio' id='parte2_serigrafia_radio8' name='$nombre_btn_parte2' value='$id_serigrafia18' data-precio='$precio_serigrafia18' data-id-padre='btn_parte2'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_derecha'>$nombre_serigrafia18</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia19){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_izq' type='radio' id='parte2_serigrafia_radio9' name='$nombre_btn_parte2' value='$id_serigrafia19' data-precio='$precio_serigrafia19' data-id-padre='btn_parte2'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_izq'>$nombre_serigrafia19</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia20){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_derecha' type='radio' id='parte2_serigrafia_radio10' name='$nombre_btn_parte2' value='$id_serigrafia20' data-precio='$precio_serigrafia20' data-id-padre='btn_parte2'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_derecha'>$nombre_serigrafia20</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        $seccion2 .= "                    </div>";
        $seccion2 .= "                </div>";
    }

    $serigrafias_de_parte3 = SerigrafiaxId($id_btn_parte3);
    if($serigrafias_de_parte3){
        $seccion2 .= "                <div class='col-lg-3 col-sm-6 mt-4'>";
        if (!empty($img3)){
            $seccion2 .= "                <img src='$img3' class='img_partes mb-3' width='60' height='60' >";
        }
        $seccion2 .= "                    <input name='parte3' id='btn_parte3' type='button' class='btn_partes w-100' value='$nombre_btn_parte3' data-id='$id_btn_parte3'>";
        $seccion2 .= "                      <div class='cont_ser_resp'>";
        for ($i = 0; $i < count($serigrafias_de_parte3); $i++){
            //  serigrafia 21 //
            $id_serigrafia21 = $serigrafias_de_parte3[0]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia21 = $serigrafias_de_parte3[0]['Serigrafia'];
            $precio_serigrafia21 = $serigrafias_de_parte3[0]['PrecioSerigrafia'];
            //  serigrafia 22 //
            $id_serigrafia22 = $serigrafias_de_parte3[1]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia22 = $serigrafias_de_parte3[1]['Serigrafia'];
            $precio_serigrafia22 = $serigrafias_de_parte3[1]['PrecioSerigrafia'];
            //  serigrafia 23 //
            $id_serigrafia23 = $serigrafias_de_parte3[2]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia23 = $serigrafias_de_parte3[2]['Serigrafia'];
            $precio_serigrafia23 = $serigrafias_de_parte3[2]['PrecioSerigrafia'];
            //  serigrafia 24 //
            $id_serigrafia24 = $serigrafias_de_parte3[3]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia24 = $serigrafias_de_parte3[3]['Serigrafia'];
            $precio_serigrafia24 = $serigrafias_de_parte3[3]['PrecioSerigrafia'];
            //  serigrafia 25 //
            $id_serigrafia25 = $serigrafias_de_parte3[4]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia25 = $serigrafias_de_parte3[4]['Serigrafia'];
            $precio_serigrafia25 = $serigrafias_de_parte3[4]['PrecioSerigrafia'];
            //  serigrafia 26 //
            $id_serigrafia26 = $serigrafias_de_parte3[5]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia26 = $serigrafias_de_parte3[5]['Serigrafia'];
            $precio_serigrafia26 = $serigrafias_de_parte3[5]['PrecioSerigrafia'];
            //  serigrafia 27 //
            $id_serigrafia27 = $serigrafias_de_parte3[6]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia27 = $serigrafias_de_parte3[6]['Serigrafia'];
            $precio_serigrafia27 = $serigrafias_de_parte3[6]['PrecioSerigrafia'];
            //  serigrafia 28 //
            $id_serigrafia28 = $serigrafias_de_parte3[7]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia28 = $serigrafias_de_parte3[7]['Serigrafia'];
            $precio_serigrafia28 = $serigrafias_de_parte3[7]['PrecioSerigrafia'];
            //  serigrafia 29 //
            $id_serigrafia29 = $serigrafias_de_parte3[8]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia29 = $serigrafias_de_parte3[8]['Serigrafia'];
            $precio_serigrafia29 = $serigrafias_de_parte3[8]['PrecioSerigrafia'];
            //  serigrafia 30 //
            $id_serigrafia30 = $serigrafias_de_parte3[9]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia30 = $serigrafias_de_parte3[9]['Serigrafia'];
            $precio_serigrafia30 = $serigrafias_de_parte3[9]['PrecioSerigrafia'];
        }

        if($nombre_serigrafia21){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_izq' type='radio' id='parte3_serigrafia_radio1' name='$nombre_btn_parte3' value='$id_serigrafia21' data-precio='$precio_serigrafia21' data-id-padre='btn_parte3'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_izq'>$nombre_serigrafia21</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia22){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_derecha' type='radio' id='parte3_serigrafia_radio2' name='$nombre_btn_parte3' value='$id_serigrafia22' data-precio='$precio_serigrafia22' data-id-padre='btn_parte3'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_derecha'>$nombre_serigrafia22</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia23){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_izq' type='radio' id='parte3_serigrafia_radio3' name='$nombre_btn_parte3' value='$id_serigrafia23' data-precio='$precio_serigrafia23' data-id-padre='btn_parte3'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_izq'>$nombre_serigrafia23</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia24){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_derecha' type='radio' id='parte3_serigrafia_radio4' name='$nombre_btn_parte3' value='$id_serigrafia24' data-precio='$precio_serigrafia24' data-id-padre='btn_parte3'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_derecha'>$nombre_serigrafia24</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia25){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_izq' type='radio' id='parte3_serigrafia_radio5' name='$nombre_btn_parte3' value='$id_serigrafia25' data-precio='$precio_serigrafia25' data-id-padre='btn_parte3'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_izq'>$nombre_serigrafia25</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia26){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_derecha' type='radio' id='parte3_serigrafia_radio6' name='$nombre_btn_parte3' value='$id_serigrafia26' data-precio='$precio_serigrafia26' data-id-padre='btn_parte3'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_derecha'>$nombre_serigrafia26</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia27){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_izq' type='radio' id='parte3_serigrafia_radio7' name='$nombre_btn_parte3' value='$id_serigrafia27' data-precio='$precio_serigrafia27' data-id-padre='btn_parte3'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_izq'>$nombre_serigrafia27</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia28){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_derecha' type='radio' id='parte3_serigrafia_radio8' name='$nombre_btn_parte3' value='$id_serigrafia28' data-precio='$precio_serigrafia28' data-id-padre='btn_parte3'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_derecha'>$nombre_serigrafia28</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia29){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_izq' type='radio' id='parte3_serigrafia_radio9' name='$nombre_btn_parte3' value='$id_serigrafia29' data-precio='$precio_serigrafia29' data-id-padre='btn_parte3'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_izq'>$nombre_serigrafia29</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia30){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input input_seri_derecha' type='radio' id='parte3_serigrafia_radio10' name='$nombre_btn_parte3' value='$id_serigrafia30' data-precio='$precio_serigrafia30' data-id-padre='btn_parte3'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label label_seri_derecha'>$nombre_serigrafia30</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }

        $seccion2 .= "                    </div>";
        $seccion2 .= "                </div>";
    }

    $serigrafias_de_parte4 = SerigrafiaxId($id_btn_parte4);
    if($serigrafias_de_parte4){
        $seccion2 .= "                <div class='col-lg-3 col-sm-6 mt-4'>";
        if(!empty($img4)){
            $seccion2 .= "                <img src='$img4' class='img_partes mb-3' width='60' height='60' >";
        }
        $seccion2 .= "                    <input name='parte4' id='btn_parte4' type='button' class='btn_partes w-100' value='$nombre_btn_parte4' data-id='$id_btn_parte4'>";
        $seccion2 .= "                      <div class='cont_ser_resp'>";

        for ($i = 0; $i < count($serigrafias_de_parte4); $i++){
            //  serigrafia 31 //
            $id_serigrafia31 = $serigrafias_de_parte4[0]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia31 = $serigrafias_de_parte4[0]['Serigrafia'];
            $precio_serigrafia31 = $serigrafias_de_parte4[0]['PrecioSerigrafia'];
            //  serigrafia 32 //
            $id_serigrafia32 = $serigrafias_de_parte4[1]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia32 = $serigrafias_de_parte4[1]['Serigrafia'];
            $precio_serigrafia32 = $serigrafias_de_parte4[1]['PrecioSerigrafia'];
            //  serigrafia 33 //
            $id_serigrafia33 = $serigrafias_de_parte4[2]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia33 = $serigrafias_de_parte4[2]['Serigrafia'];
            $precio_serigrafia33 = $serigrafias_de_parte4[2]['PrecioSerigrafia'];
            //  serigrafia 34 //
            $id_serigrafia34 = $serigrafias_de_parte4[3]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia34 = $serigrafias_de_parte4[3]['Serigrafia'];
            $precio_serigrafia34 = $serigrafias_de_parte4[3]['PrecioSerigrafia'];
            //  serigrafia 35 //
            $id_serigrafia35 = $serigrafias_de_parte4[4]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia35 = $serigrafias_de_parte4[4]['Serigrafia'];
            $precio_serigrafia35 = $serigrafias_de_parte4[4]['PrecioSerigrafia'];
            //  serigrafia 36 //
            $id_serigrafia36 = $serigrafias_de_parte4[5]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia36 = $serigrafias_de_parte4[5]['Serigrafia'];
            $precio_serigrafia36 = $serigrafias_de_parte4[5]['PrecioSerigrafia'];
            //  serigrafia 37 //
            $id_serigrafia37 = $serigrafias_de_parte4[6]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia37 = $serigrafias_de_parte4[6]['Serigrafia'];
            $precio_serigrafia37 = $serigrafias_de_parte4[6]['PrecioSerigrafia'];
            //  serigrafia 38 //
            $id_serigrafia38 = $serigrafias_de_parte4[7]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia38 = $serigrafias_de_parte4[7]['Serigrafia'];
            $precio_serigrafia38 = $serigrafias_de_parte4[7]['PrecioSerigrafia'];
            //  serigrafia 39 //
            $id_serigrafia39 = $serigrafias_de_parte4[8]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia39 = $serigrafias_de_parte4[8]['Serigrafia'];
            $precio_serigrafia39 = $serigrafias_de_parte4[8]['PrecioSerigrafia'];
            //  serigrafia 40 //
            $id_serigrafia40 = $serigrafias_de_parte4[9]['PersonalizadoParteSerigrafiaId'];
            $nombre_serigrafia40 = $serigrafias_de_parte4[9]['Serigrafia'];
            $precio_serigrafia40 = $serigrafias_de_parte4[9]['PrecioSerigrafia'];
        }

        if($nombre_serigrafia31){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input' type='radio' id='parte4_serigrafia_radio1' name='$nombre_btn_parte4' value='$id_serigrafia31' data-precio='$precio_serigrafia31' data-id-padre='btn_parte4'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label'>$nombre_serigrafia31</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia32){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input' type='radio' id='parte4_serigrafia_radio2' name='$nombre_btn_parte4' value='$id_serigrafia32' data-precio='$precio_serigrafia32' data-id-padre='btn_parte4'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label'>$nombre_serigrafia32</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia33){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input' type='radio' id='parte4_serigrafia_radio3' name='$nombre_btn_parte4' value='$id_serigrafia33' data-precio='$precio_serigrafia33' data-id-padre='btn_parte4'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label'>$nombre_serigrafia33</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia34){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input' type='radio' id='parte4_serigrafia_radio4' name='$nombre_btn_parte4' value='$id_serigrafia34' data-precio='$precio_serigrafia34' data-id-padre='btn_parte4'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label'>$nombre_serigrafia34</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia35){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input' type='radio' id='parte4_serigrafia_radio5' name='$nombre_btn_parte4' value='$id_serigrafia35' data-precio='$precio_serigrafia35' data-id-padre='btn_parte4'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label'>$nombre_serigrafia35</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia36){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input' type='radio' id='parte4_serigrafia_radio6' name='$nombre_btn_parte4' value='$id_serigrafia36' data-precio='$precio_serigrafia36' data-id-padre='btn_parte4'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label'>$nombre_serigrafia36</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia37){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input' type='radio' id='parte4_serigrafia_radio7' name='$nombre_btn_parte4' value='$id_serigrafia37' data-precio='$precio_serigrafia37' data-id-padre='btn_parte4'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label'>$nombre_serigrafia37</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia38){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input' type='radio' id='parte4_serigrafia_radio8' name='$nombre_btn_parte4' value='$id_serigrafia38' data-precio='$precio_serigrafia38' data-id-padre='btn_parte4'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label'>$nombre_serigrafia38</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia39){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input' type='radio' id='parte4_serigrafia_radio9' name='$nombre_btn_parte4' value='$id_serigrafia39' data-precio='$precio_serigrafia39' data-id-padre='btn_parte4'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label'>$nombre_serigrafia39</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }
        if($nombre_serigrafia40){
            $seccion2 .= "                    <div class='div_serigrafia'>";
            $seccion2 .= "                        <div class='radio'>";
            $seccion2 .= "                            <input class='radio_input' type='radio' id='parte4_serigrafia_radio10' name='$nombre_btn_parte4' value='$id_serigrafia40' data-precio='$precio_serigrafia40' data-id-padre='btn_parte4'>";
            $seccion2 .= "                            <label for='serigrafia_radio' class='radio_label'>$nombre_serigrafia40</label>";
            $seccion2 .= "                        </div>";
            $seccion2 .= "                    </div>";
        }

        $seccion2 .= "                    </div>";
        $seccion2 .= "                </div>";
    }

        $seccion2 .= "            <div class='row my-4'>";
        $seccion2 .= "            <div class='col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 offset-xl-6 offset-lg-4 offset-md-0 offset-sm-0 offset-xs-0'>";
        $seccion2 .=    "            <input type='button' class='sin_estampado w-100' id='sin_estampado' name='sin_estampado' value='Producto sin Estampado'>";
        $seccion2 .= "            </div>";
        $seccion2 .= "            <div class='col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6'>";
        $seccion2 .=    "            <input type='button' class='confirmar_estampado w-100' id='confirmar_estampado' value='Confirmar Estampado'>";
        $seccion2 .= "            </div>";
        $seccion2 .= "            </div>";

    $seccion2 .=    "            </div>";
    $seccion2 .= "            </div>";

    echo $seccion2;


    //  ----------------------------------------------------------------------------------------------------------  //
//    seccion 3
    $envios_x_categ = EnviosXcategorias($categorias_del_producto);

    $arrFechas = array();
    $arrFecha = array();

    $hoy = date("d-m-Y");
    $manana = strtolower(date("j\/M", mktime(0, 0, 0, date("m")  , date("d") + 1, date("Y"))));

    //Arreglo de ejemplo hasta leer la info real de la BD
    $arrFechas[0] = array("shipping" => "shipping_today", "clase" => "fechaToday", "fecha" => $hoy, "data_code" => "STD", "texto" => "<b>Realizas pedido</b> online y haces pago online.", "seleccionado" => "");
    $arrFechas[1] = array("shipping" => "shipping_sample", "clase" => "fechaSample", "fecha" => $manana, "data_code" => "", "texto" => "<b>Recibes muestra virtual</b> en menos de 1 día laborable", "seleccionado" => "");
    $arrFechas[2] = array("shipping" => "shipping_production", "clase" => "fechaProduction", "fecha" => "29/08/2022", "data_code" => "", "texto" => "<b>¡Empieza la producción!</b>", "seleccionado" => "");

    $seccion3 = "         <button type='button' class='collapsible' id='button_seccion_cuando'>Cuándo?<label id='label_cuando'> - Fecha Seleccionada:</label><label id='fecha_entrega' style='margin-left: 5px;'></label> <input type='text' id='input_fecha_seleccionada' name='input_fecha_seleccionada' value='' hidden></button>";
    $seccion3 .= "        <div class='content' id='seccion_cuando'>";
    $seccion3 .= "        <div class='row'>";
    $seccion3 .= "        <div class='col'>";
    $seccion3  .="        <div class='timeline-container'>";
    $seccion3 .="            <ul class='timeline' data-shipping='{$arrFechas[0]["data_code"]}' data-date='$hoy'>";
    $seccion3 .="                <li id='{$arrFechas[0]["shipping"]}'>";
    $seccion3 .="                    <div class='contenttop'>Hoy</div>";
    $seccion3 .="                    <div class='contentbottom ajustar_texto'><div class='texto'>{$arrFechas[0]["texto"]}</div></div>";
    $seccion3 .="                </li>";
    $seccion3 .="                <li id='{$arrFechas[1]["shipping"]}'>";
    $seccion3 .="                    <div class='contenttop' id='diaLaborable'>$manana</div>";
    $seccion3 .="                    <div class='contentbottom ajustar_texto'><div class='texto'>{$arrFechas[1]["texto"]}</div></div>";
    $seccion3 .="                </li>";
    $seccion3 .="                <li id='{$arrFechas[2]["shipping"]}'>";
    $seccion3 .="                    <div class='contenttop'><i class='fa fa-bolt fa-2x'></i></div>";
    $seccion3 .="                    <div class='contentbottom ajustar_texto' id='ultimo_contentbottom'><div class='texto'>{$arrFechas[2]["texto"]}</div></div>";
    $seccion3 .="                </li>";
//ultimo_contentbottom
    foreach ($envios_x_categ as $envio){
        $envio_nombre = $envio['KoalaEnviosNombre'];
        $envio_cant_dias = $envio['KoalaEnviosDias'];
        $envio_descrip = $envio['KoalaEnviosDescripcion'];
        $envio_precio = $envio['KoalaEnviosPrecio'];

        switch ($envio_nombre) {
            case 'Super Expres':
                $icon = "fa-rocket";
                $id = "calendar_premium";
                $class = "fecha-premium";
                break;

            case 'Expres':
                $icon = "fa-paper-plane";
                $id = "calendar_express";
                $class = "fecha-express";
                break;

            case 'Rapido':
                $icon = "fa-truck";
                $id = "calendar_standard";
                $class = "fecha-standard";
                $seleccionado = "";
                break;

            default:
                $icon = "fa-car";
                $id = "calendar_normal";
                $class = "fecha-normal";
                $seleccionado = "";
                break;
        }

        $fecha_entrega = CalcularFecha($envio_cant_dias, $hoy);

        $arrFecha = explode("-", $fecha_entrega);
        $fecha_corta = date2Spanish(strtolower(date("j\/M", mktime(0,0,0,$arrFecha[1], $arrFecha[0], $arrFecha[2]))));

        $seccion3 .=" <li class='shipping-select' id='$envio_nombre' style=''>";
        $seccion3 .="   <div class='contenttop'>";
        $seccion3 .="      <span class='$class'>$fecha_corta</span>";
        $seccion3 .="      <i class='show_calendar fa fa-calendar'></i>";
        $seccion3 .="      <input type='text' class='input_calendar' id='$id' value='$envio_precio'>";
        $seccion3 .="   </div>";
        $seccion3 .="   <div class='contentbottom'>";
        $seccion3 .="      <div class='texto'>Recíbelo el <span class='$class'>$fecha_entrega</span> con <strong>$envio_descrip</strong> <i class='fa $icon'></i></div>";
        $seccion3 .="   </div>";
        $seccion3 .="   <div class='check'><i data-code='' class='fa fa-check $seleccionado' data-fecha='$fecha_entrega'></i></div>";
        $seccion3 .=" </li>";

    }


    $seccion3 .= "            </ul>";
    $seccion3 .= "        </div>";
    $seccion3 .= "        </div>";
    $seccion3 .= "        </div>";
    $seccion3 .= "        </div>";

    echo $seccion3;

$atrib_tallas = $product->get_Data()['attributes']['pa_tallas'];




    // seccion de asignar las tallas
    echo "
        <div id='seccion_opcionales' style='display: none'>
            <button type='button' class='collapsible' id='seccion_repartir_unidades'>Reparte unidades (OPCIONAL)</button>
            <div class='content' id='seccion_asignar_tallas'>
                <div id='scrol_horizontal' class='horizontal-scroll' style=''>
                <span id='cantidades'>Debe asignar un total de:</span> <strong><span id='cant_a_asignar'></span> <span>ud</span> </strong>
                    <table class='table' style='min-width: 20px !important;' id='tabla-tallas'>
                        <tr>
    ";
        if($atrib_tallas != null) {
            foreach ($variaciones_del_producto as $atrib) {
                $arreglo_variaciones[] = $atrib['attributes']['attribute_pa_tallas'];
            }
            $arreglo_variaciones_unico = array_unique($arreglo_variaciones);


            if ($product->is_type('variable') && is_product()) {
                echo "
                            <th class='oculto-movil th_tabla_tallas'></th>
                            <th class='oculto-movil th_tabla_tallas'>Color</th>
        ";
            }
            foreach ($arreglo_variaciones_unico as $talla) {
                echo "
                      <th class='th_tabla_tallas'>Talla " . $talla . "</th>  
            ";
            }

            echo "
                        </tr>
                        <tr>
    ";
            if ($product->is_type('variable') && is_product()) {


                echo "
                            <td class='oculto-movil td_tabla_tallas'>
                                <p id='mostrar_img_reparto'></p>
                            </td>
                            <td class='oculto-movil td_tabla_tallas'>
                                <span id='color_es' class='color_es'>no asignado</span>
                            </td>  
        ";
            }

            foreach ($arreglo_variaciones_unico as $talla) {
                echo "
                                  <td class='td_tabla_tallas'>
                                        <input type='number' min='0' id='input_talla' name='input_talla[]' class='size_input' value='0'>
                                  </td>
                            ";
            }
        }

            echo "
                        </tr>
                    </table>
	<!-- 				<button type='button' id='decide-sizes-later' class='sin_estampado'>
                        <span>Diré mis tallas más tarde</span>
                    </button>    -->
					<div class='row'>
					    <div class='col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 offset-xl-6 offset-lg-4 offset-md-0 offset-sm-0 offset-xs-0'>
					        <input type='button' class='sin_estampado w-100' id='decide-sizes-later' value='Diré mis tallas más tarde' > 
                        </div>
                        <div class='col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6'>
					        <input type='button' class='confirmar_estampado w-100' id='confirmar-tallas' value='Confirmar tallas'>
                        </div>
                    </div>
       <!--             <button type='button' title='Confirmar tallas' class='action primary tocart botones_secciones_calc_succ' id='confirmar-tallas'>
                        <span> <i class='fa fa-check'></i> &nbsp;&nbsp; Confirmar tallas</span>
                    </button> -->
                </div>
            </div>
    ";

    //    seccion de subir el logo
    echo "
            <button type='button' class='collapsible' id='seccion_logo'>Sube tu logo (OPCIONAL)</button>
            <div class='content' id='seccion_subir_logo'>
                    <input type='text' id='id_producto' value='$id_del_producto' hidden style='display: none'>
                    <div id='seccion_logo_1' class='row align-items-center my-2' style='display: none' >
                        <div class='col-lg-2 col-md-3 col-sm-4 col-6'>
                            <p id='text_img1' style='' class='p_text_logo'>Imagen no disponible</p>
                            <img id='uploadPreview1' width='80' height='80' src='' style='display: none;'/> 
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-4 col-6'>
                            <label for='uploadImage1' class='custom-file-upload' style=''>
                                <i class='fa fa-upload' style='margin-right: 10px'></i> Logo 1
                            </label>
                            <input style='display: none' id='uploadImage1' type='file' name='images[1]' onchange='previewImage(1);'>
                        </div>
                        <div>
                            <input type='text' id='input_img_ruta1' name='input_img_ruta1' value='' style='display: none !important;'>
                        </div>
                    </div>
                    <div id='seccion_logo_2' class='row align-items-center my-2' style='display: none' >
                        <div class='col-lg-2 col-md-3 col-sm-4 col-6'>
                            <p id='text_img2' style='' class='p_text_logo'>Imagen no disponible</p>
                            <img id='uploadPreview2' width='80' height='80' src='' style='display: none;'/> 
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-4 col-6'>
                            <label for='uploadImage2' class='custom-file-upload' style=''>
                                <i class='fa fa-upload' style='margin-right: 10px'></i> Logo 2
                            </label>
                            <input style='display: none' id='uploadImage2' type='file' name='images[2]' onchange='previewImage(2);'>
                        </div>
                           <div>
                            <input type='text' id='input_img_ruta2' name='input_img_ruta2' value=''  style='display: none !important;'>
                        </div>
                    </div>
                    <div id='seccion_logo_3' class='row align-items-center my-2' style='display: none' >
                        <div class='col-lg-2 col-md-3 col-sm-4 col-6'>
                            <p id='text_img3' style='' class='p_text_logo'>Imagen no disponible</p>
                            <img id='uploadPreview3' width='80' height='80' src='' style='display: none;'/> 
                        </div>
                         <div class='col-lg-3 col-md-3 col-sm-4 col-6'>
                            <label for='uploadImage3' class='custom-file-upload' style=''>
                                <i class='fa fa-upload' style='margin-right: 10px'></i> Logo 3
                            </label>
                            <input style='display: none' id='uploadImage3' type='file' name='images[3]' onchange='previewImage(3);'>
                        </div>
                        <div>
                            <input type='text' id='input_img_ruta3' name='input_img_ruta3' value=''  style='display: none !important;'>
                        </div>
                    </div>
                    <div id='seccion_logo_4' class='row align-items-center my-2' style='display: none' >
                         <div class='col-lg-2 col-md-3 col-sm-4 col-6'>
                            <p id='text_img4' style='' class='p_text_logo'>Imagen no disponible</p>
                            <img id='uploadPreview4' width='80' height='80' src='' style='display: none;'/> 
                        </div>   
                        <div class='col-lg-3 col-md-3 col-sm-4 col-6'>
                            <label for='uploadImage4' class='custom-file-upload' style=''>
                                <i class='fa fa-upload' style='margin-right: 10px'></i> Logo 4
                            </label>
                            <input style='display: none' id='uploadImage4' type='file' name='images[4]' onchange='previewImage(4);'>
                        </div>
                        <div>
                            <input type='text' id='input_img_ruta4' name='input_img_ruta4' value=''  style='display: none !important;'>
                        </div>
                    </div>
                <div class='clearfix'>
<!--                    <button type='button' class='botones_secciones_calc_canc btn btn-secondary boton-formulario-details-2 calculo-final' style='margin-bottom: 10px;' id='decide-colors-later'>
                        Subiré o enviaré mis archivos más tarde
                    </button>      -->
<!--                    <button type='button' title='Confirmar personalizaciones' class='action primary tocart botones_secciones_calc_succ' id='confirmar-logo'>
                        <span> <i class='fa fa-check'></i> &nbsp;&nbsp; Confirmar personalizaciones</span>
                    </button>     -->
					<div class='row'>
					    <div class='col-xl-4 col-lg-5 col-md-6 col-sm-12 offset-xl-4 offset-lg-2 offset-md-0 offset-sm-0 offset-xs-0 mt-2'>
					        <input type='button' id='decide-colors-later' class='sin_estampado w-100' value='Subiré mis archivos más tarde'>
                        </div>
					    <div class='col-xl-4 col-lg-5 col-md-6 col-sm-12 mt-2'>
					        <input type='button' id='confirmar-logo' class='confirmar_estampado w-100' value='Confirmar personalizaciones'>
                        </div>
                    </div>
				</div>
            </div>
            <script>
                function previewImage(nb) {        
                    var reader = new FileReader();         
                    reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);         
                    reader.onload = function (e) {   
                        var img =  document.getElementById('uploadPreview'+nb);
                        img.style.setProperty('display', 'block');
                        
                        var text1 = document.getElementById('text_img1');
                        text1.style.setProperty('display', 'none');
                        
                        var text2 = document.getElementById('text_img2');
                        text2.style.setProperty('display', 'none');
                        
                        var text3 = document.getElementById('text_img3');
                        text3.style.setProperty('display', 'none');
                        
                        var text4 = document.getElementById('text_img4');
                        text4.style.setProperty('display', 'none');
                        
                        document.getElementById('uploadPreview'+nb).src = e.target.result;         
                    };     
                }
            </script>
    ";

    //  Seccion extras
    echo "
            <button type='button' class='collapsible' id='seccion_extras'>Extras (OPCIONAL)</button>  
            <div class='content' id='content_extras'>
                <div class='form-check'>
                    <input style='float: none' class='form-check-input calculo-final' type='checkbox' value='1' id='extra1' name='extra1_embolsado'>
                    
                    <label class='form-check-label' for='extra1'>Quiero el producto embolsado (
                        <span class='unit-embolsado' id='precio_embolsado'>0.20</span> 
                        €)
                    </label> 
                    <p>
                        Si quieres, podemos poner una bolsa de plástico a cada producto para que sea más personal. 
                        El coste de embolsado es de 0.20 €, es decir, se aplicaría un total de 
                        <span class='precio-embolsado' id='importe_embolsado'></span> 
                        €
                    </p>
                </div>
            </div>
        </div>
    ";

    $precio_unitario = $product->get_price();

    $seccion_calculadora = "         
                                <div class='row align-items-center justify-content-center' id='tablero-marcador1' style='margin-bottom: 15px'>
                                        <div class='col-md-3 col-sm-4 cajas_sec_calc mt-3'>
                                            <div class='marcador'>
                                                <p id='precio_base' hidden>$precio_unitario</p>
                                                <p id='price_marcador'><span class='price-marcador' id='preciounitario_pre'>$precio_unitario </span> € <span></span></p>
                                                <p id='p_txt_preciounitario_pre'>Precio por unidad</p>
                                                <input type='number' step='any' id='input_precio_producto_final' name='input_precio_producto_final' value='' >
                                            </div>
                                        </div>
                                        <div class='col-md-1 col-sm-1 mt-3' id='caja_x_sec_calc'>
                                            <div class='marcador' style='text-align: center; background-color: transparent; border: none; display: flex; justify-content: center; align-items: center'>
                                                <span class='simb-operador' style='font-size: 1.6rem; font-weight: bold;'>X</span>
                                            </div>
                                        </div>
                                        <div class='col-md-3 col-sm-2 cajas_sec_calc mt-3'>
                                            <div class='marcador'>
                                                <p id='p_unidades_pre' style=''><span class='price-marcador'><span id='unidades_pre'>1</span> ud</span></p>
                                            </div>
                                        </div>
                                        <div class='col-md-1 col-sm-1 mt-3' id='div_sec_calc_igual'>
                                            <div class='marca-igual' style='text-align: center; background-color: transparent; border: none;display: flex; justify-content: center; align-items: center'>
                                                <span class='simb-operador' >=</span>
                                            </div>
                                        </div>
                                        <div class='col-md-3 col-sm-4 mt-3' id='div_sec_calc_imp_mas_boton' style=''>
                                            <div class='row' id='calcu_boton_row'>
                                                <div class='col-md-12' id='calcu_boton_col_6'>
                                                    <div class='marcador' style='margin-bottom: 15px; '>
                                                        <p class='mb-0' style='position: relative;'>
                                                            <span class='finalpricelabel'>Base</span>
                                                            <span class='price-marcador' id='preciototalfinal_pre'></span>
                                                            <span>€</span>
                                                        </p>
                                                        <p id='p_txt_iva' style='float:right'>(Impuestos no incluidos: <span id='iva_pre'></span> €)</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-md-12 col-sm-12 mt-3' id='calcu_boton_col_6'>
                                             <div class='d-flex justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end align-items-center'>
                                                  <button type='button' title='¡Quiero este producto!' class='action primary tocart' id='preconfirmar' onclick='ValidarCamposvacios()' style='display: inline; border-radius: 0.75em !important;'>
                                                      <span class='quiero-producto'><i class='fa fa-thumbs-up'></i>&nbsp;&nbsp; ¡Quiero este producto!</span>
                                                  </button>
                                                  <button  type='submit' id='confirmar_pedido_koala' style='display: none'>
                                                    <span class='quiero-producto'><i class='fa fa-gift' id='icono_agregar_a_la_cesta'></i>&nbsp;&nbsp; Añadir a la cesta</span>
                                                  </button>
                                             </div>
                                        </div>
                                </div>
                                
                                <script>
                                        function ValidarCamposvacios(){
                                            let button_preconfirmar = document.getElementById('preconfirmar');
                                            let button_preconfirmar_elementStyle = window.getComputedStyle(button_preconfirmar);
                                            let button_preconfirmar_elementDisplay = button_preconfirmar_elementStyle.getPropertyValue('display');
                                            
                                            let button_confirmar_pedido_koala = document.getElementById('confirmar_pedido_koala');
                                            let confirmar_pedido_koala_elementStyle = window.getComputedStyle(button_confirmar_pedido_koala);
                                            let confirmar_pedido_koala_elementDisplay = confirmar_pedido_koala_elementStyle.getPropertyValue('display');
                                            
                                            let seccion_opcionales = document.getElementById('seccion_opcionales');
                                            let seccion_opcionales_elementStyle = window.getComputedStyle(seccion_opcionales);
                                            let seccion_opcionales_koala_elementDisplay = seccion_opcionales_elementStyle.getPropertyValue('display');
                                     
                                            let seccion_cuando = document.getElementById('seccion_cuando');
                                            let seccion_cuando_elementStyle = window.getComputedStyle(seccion_cuando);
                                            let seccion_cuando_koala_elementDisplay = seccion_cuando_elementStyle.getPropertyValue('display');
                                     
                                            let seccion_asignar_tallas = document.getElementById('seccion_asignar_tallas');
                                            let seccion_asignar_tallas_elementStyle = window.getComputedStyle(seccion_asignar_tallas);
                                            let seccion_asignar_tallas_koala_elementDisplay = seccion_asignar_tallas_elementStyle.getPropertyValue('display');
                                            
                                            let input_cuantos = document.getElementById('input_cantidad_seleccionada');
                                            let value_input_cuantos = input_cuantos.getAttribute('value');
                                            
                                            let input_posiciones_seleccionadas = document.getElementById('input_posiciones_seleccionadas');
                                            let value_input_posiciones_seleccionadas = input_posiciones_seleccionadas.getAttribute('value');
                                            
                                            let input_fecha_seleccionada = document.getElementById('input_fecha_seleccionada');
                                            let value_input_fecha_seleccionada = input_fecha_seleccionada.value;
                                            
                                            if(value_input_cuantos === ''){
                                                window.alert('Debe escoger una cantidad.');
                                            }
                                            else if(value_input_posiciones_seleccionadas === ''){
                                                window.alert('Debe escoger un estampado.');
                                            }
                                            else if(value_input_fecha_seleccionada === ''){
                                                window.alert('Debe escoger un tiempo de entrega.');
                                            }
                                            else{
                                                   if(button_preconfirmar_elementDisplay !== 'none'){
                                                        button_preconfirmar.style.setProperty('display', 'none');
                                                   }
                                                   if(confirmar_pedido_koala_elementDisplay === 'none'){
                                                        button_confirmar_pedido_koala.style.setProperty('display', 'inline');
                                                   }
                                                   if(seccion_opcionales_koala_elementDisplay === 'none'){
                                                       seccion_opcionales.style.setProperty('display', 'block');
                                                   }
                                                   if(seccion_cuando_koala_elementDisplay === 'block'){
                                                       seccion_cuando.style.setProperty('display', 'none');
                                                   }
                                                   if(seccion_asignar_tallas_koala_elementDisplay){
                                                        seccion_asignar_tallas.style.setProperty('display', 'block');
                                                   }
                                            }
                                        }
                                </script>
    ";

    echo $seccion_calculadora;


    echo        "<input type='hidden' name='add-to-cart' value='$id_del_producto'>";
    echo        "<input type='hidden' name='product_id' value='$id_del_producto'>";
    echo        "<input type='hidden' id='variation_id' name='variation_id' class='variation_id' value=''>";
    echo    "</form>";
    echo "</div>";

        //    scripts   //
    echo "
    <!-- script colapsable solo me funciona aqui  -->
    <!--    <script type='text/javascript'>
            var coll = document.getElementsByClassName('collapsible');
            var i;

            for (i = 0; i < coll.length; i++) {
                coll[i].addEventListener('click', function() {
                    this.classList.toggle('active');
                    var content = this.nextElementSibling;
                    if (content.style.display === 'block') {
                        content.style.display = 'none';
                    } else {
                        content.style.display = 'block';
                    }
                });
            }
        </script> -->
        
        <!-- shipping funciona perfecto  -->
        <script type='text/javascript'>
            jQuery(document).ready(function($) {
                var li = $('li.shipping-select');
                
                li.click(function(){
                    //checking the clicked element
                    var iCheck = $(this).find('.check > i');
                    var isSelected = iCheck.hasClass('selected');
                    if (!isSelected) {
                        $('.check > i').removeClass('selected');
                        iCheck.addClass('selected');
                    }
                    
                    // include the new selected date in the panel title
                    var fecha = $(this).find('.contenttop > span').text();
                    //get panel 3
                    
                    var label_fecha_entrega = $('#fecha_entrega');
                    label_fecha_entrega.text(fecha);
                    
                    var input_input_fecha_seleccionada = $('#input_fecha_seleccionada');
                    input_input_fecha_seleccionada.val(fecha);
                });
            });
        </script>
        
    ";
    }
}
add_action( 'woocommerce_after_single_product', 'dcms_display_field', 10, 0 );
//woocommerce_after_single_product      ----- este es el que estaba usando
//woocommerce_before_add_to_cart_button     ------- este lo pone dentro del formulario nativo
//woocommerce_product_meta_end      ---------   este lo pone justo debajo, pero es muy chiquita la seccion



// Add field data to the cart   -------- FUNCIONA BIEN
function dcms_add_field_to_cart( $cart_item_data, $product_id, $variation_id )
{
    $c = WC()->cart->get_cart();
    $product_cart_id  = WC()->cart->generate_cart_id( $product_id );

    if( ! empty( $_REQUEST['input_cantidad_seleccionada'] ) )
    {
        $cart_item_data['input_cantidad_seleccionada'] = sanitize_text_field($_REQUEST['input_cantidad_seleccionada']);
    }
    if( ! empty( $_REQUEST['input_posiciones_seleccionadas'] ) )
    {
        $cart_item_data['input_posiciones_seleccionadas'] = sanitize_text_field($_REQUEST['input_posiciones_seleccionadas']);
    }
    if( ! empty( $_REQUEST['input_serigrafias'] ) )
    {
        $cart_item_data['input_serigrafias'] = sanitize_text_field($_REQUEST['input_serigrafias']);
    }
    if( ! empty( $_REQUEST['input_fecha_seleccionada'] ) )
    {
        $cart_item_data['input_fecha_seleccionada'] = sanitize_text_field($_REQUEST['input_fecha_seleccionada']);
    }
    if( ! empty( $_REQUEST['input_precio_producto_final'] ) )
    {
        $cart_item_data['input_precio_producto_final'] = sanitize_text_field($_REQUEST['input_precio_producto_final']);
    }
        //  seccion de asignar tallas
	
     if( ! empty( $_REQUEST['input_talla'] ) ){
        $tallas = $_REQUEST['input_talla'];
        for ($i=0; $i < count($tallas); $i++){
            $cart_item_data['asignar_cant_talla_s'] = sanitize_text_field($tallas[0]);
            $cart_item_data['asignar_cant_talla_m'] = sanitize_text_field($tallas[1]);
            $cart_item_data['asignar_cant_talla_l'] = sanitize_text_field($tallas[2]);
            $cart_item_data['asignar_cant_talla_xl'] = sanitize_text_field($tallas[3]);
            $cart_item_data['asignar_cant_talla_2xl'] = sanitize_text_field($tallas[4]);
            $cart_item_data['asignar_cant_talla_3xl'] = sanitize_text_field($tallas[5]);
        }
    }
        //  termina la seccion de asignar tallas

        //  seccion de logos
    if( ! empty( $_REQUEST['input_img_ruta1'] ) ){
        $cart_item_data['img_ruta1'] = sanitize_text_field($_REQUEST['input_img_ruta1']);
    }
    if( ! empty( $_REQUEST['input_img_ruta2'] ) ){
        $cart_item_data['img_ruta2'] = sanitize_text_field($_REQUEST['input_img_ruta2']);
    }
    if( ! empty( $_REQUEST['input_img_ruta3'] ) ){
        $cart_item_data['img_ruta3'] = sanitize_text_field($_REQUEST['input_img_ruta3']);
    }
    if( ! empty( $_REQUEST['input_img_ruta4'] ) ){
        $cart_item_data['img_ruta4'] = sanitize_text_field($_REQUEST['input_img_ruta4']);
    }
        //  termina la seccion de logos

        //  seccion de embolsado
    if( ! empty( $_REQUEST['extra1_embolsado'] ) ){
        $cart_item_data['embolsado'] = sanitize_text_field($_REQUEST['extra1_embolsado']);
    }

    //  termina la seccion de embolsado
    return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data', 'dcms_add_field_to_cart', 10, 3 );


// Add custom field to order
function dcms_add_field_to_order( $item, $cart_item_key, $values, $order ) {
    global $wpdb;


    if ( isset( $values['input_cantidad_seleccionada'] )){
        $item->add_meta_data( 'Cantidad a enviar', $values['input_cantidad_seleccionada'], true );
    }

    if ( isset( $values['asignar_cant_talla_s'] ) && ($values['asignar_cant_talla_s'] != 0) && ( $values['asignar_cant_talla_s'] != '') ){
        $item->add_meta_data( 'Talla S', $values['asignar_cant_talla_s'], true );
    }
    if ( isset( $values['asignar_cant_talla_m'] ) && ($values['asignar_cant_talla_m'] != 0) && ( $values['asignar_cant_talla_m'] != '')){
        $item->add_meta_data( 'Talla M', $values['asignar_cant_talla_m'], true );
    }
    if ( isset( $values['asignar_cant_talla_l'] ) && ($values['asignar_cant_talla_l'] != 0) && ( $values['asignar_cant_talla_l'] != '')){
        $item->add_meta_data( 'Talla L', $values['asignar_cant_talla_l'], true );
    }
    if ( isset( $values['asignar_cant_talla_xl'] ) && ($values['asignar_cant_talla_xl'] != 0) && ( $values['asignar_cant_talla_xl'] != '')){
        $item->add_meta_data( 'Talla XL', $values['asignar_cant_talla_xl'], true );
    }
    if ( isset( $values['asignar_cant_talla_2xl'] ) && ($values['asignar_cant_talla_2xl'] != 0) && ( $values['asignar_cant_talla_2xl'] != '')){
        $item->add_meta_data( 'Talla 2XL', $values['asignar_cant_talla_2xl'], true );
    }
    if ( isset( $values['asignar_cant_talla_3xl'] ) && ($values['asignar_cant_talla_3xl'] != 0) && ( $values['asignar_cant_talla_3xl'] != '')){
        $item->add_meta_data( 'Talla 3XL', $values['asignar_cant_talla_3xl'], true );
    }


    if ( isset( $values['input_posiciones_seleccionadas'] )){
        $string_partes = $values['input_posiciones_seleccionadas'];
        $array_partes = explode(",", $string_partes);

        if ( isset( $values['input_serigrafias'] )){
            $string_serigrafias = $values['input_serigrafias'];
            $array_serigrafias = explode(",", $string_serigrafias);

            for ($i = 0; $i < count($array_serigrafias); $i++) {
                if ($array_serigrafias[$i] != 0){
                    //  encontar el nombre de la serigrafia a mostrar
                    $id_serig = $array_serigrafias[$i];
                    $query = "SELECT * FROM {$wpdb->prefix}koala_personalizado_parte_serigrafia WHERE PersonalizadoParteSerigrafiaId = $id_serig";
                    $serigrafia = $wpdb->get_results($query, ARRAY_A);
                    $serigrafia_nombre = $serigrafia[0]['Serigrafia'];

                    foreach ($array_partes as $parte){
                        if($parte != ""){
                            $query2 = "SELECT * FROM {$wpdb->prefix}koala_personalizado_parte WHERE Parte = '$parte'";
                            $parte_encontrada = $wpdb->get_results($query2, ARRAY_A);
                            $parte_id = $parte_encontrada[0]['PersonalizadoParteId'];
                            if($parte_id == $serigrafia[0]['PersonalizadoParteId']){
                                $personalizacion[] = $parte. ' -> ' .$serigrafia_nombre;

                            }
                        }
                    }
                }
            }
        }
        for($j = 0; $j<count($personalizacion); $j++){
            switch ($j){
                case 0:
                    $item->add_meta_data( 'Personalizacion1', $personalizacion[$j], true );
                    break;
                case 1:
                    $item->add_meta_data( 'Personalizacion2', $personalizacion[$j], true );
                    break;
                case 2:
                    $item->add_meta_data( 'Personalizacion3', $personalizacion[$j], true );
                    break;
                default:
                    $item->add_meta_data( 'Personalizacion4', $personalizacion[$j], true );
            }
        }
    }

    if ( isset($values['embolsado']) && $values['embolsado'] == 1){
        $item->add_meta_data( 'Embolsado', 'Si', true );

    } else{
        $item->add_meta_data( 'Embolsado', 'No', true );
    }

    if ( isset($values['img_ruta1']) && $values['img_ruta1'] != '' ){
        $src_img_1 = $values['img_ruta1'];
        $item->add_meta_data( 'Logo Parte 1', '<img height="50" width="50" src= "'.$src_img_1.'" />', true );
    }
    if ( isset($values['img_ruta2']) && $values['img_ruta2'] != '' ){
        $src_img_2 = $values['img_ruta2'];
        $item->add_meta_data( 'Logo Parte 2', '<img height="50" width="50" src= "'.$src_img_2.'" />', true );
    }
    if ( isset($values['img_ruta3']) && $values['img_ruta3'] != '' ){
        $src_img_3 = $values['img_ruta3'];
        $item->add_meta_data( 'Logo Parte 3', '<img height="50" width="50" src= "'.$src_img_3.'" />', true );
    }
    if ( isset($values['img_ruta4']) && $values['img_ruta4'] != '' ){
        $src_img_4 = $values['img_ruta4'];
        $item->add_meta_data( 'Logo Parte 4', '<img height="50" width="50" src= "'.$src_img_4.'" />', true );
    }

    if ( isset( $values['input_fecha_seleccionada'] )){
        $item->add_meta_data( 'Fecha de Entrega', $values['input_fecha_seleccionada'], true );
    }
}

add_action( 'woocommerce_checkout_create_order_line_item', 'dcms_add_field_to_order', 10, 4 );


//  modificar el precio del carrito ---------- *FUNCIONA PERFECTA*
function bbloomer_alter_price_cart( $cart ) {

    foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
        $precio_producto_final = $cart_item['input_precio_producto_final'];
        $cart_item['data']->set_price( $precio_producto_final );

        if($cart_item['embolsado'] == 1){
            $cargo_embolsado = 0.2;
            $precio_mas_cargo_embosado = $precio_producto_final + $cargo_embolsado;
            $cart_item['data']->set_price( $precio_mas_cargo_embosado );
        }
    }

}
add_action( 'woocommerce_before_calculate_totals', 'bbloomer_alter_price_cart', 9999 );


//  guarda la cantidad seleccionada en Cuantos en el carrito segun el producto
function action_before_cart() {
    global $woocommerce;
    $cart_contents = WC()->cart->get_cart_contents();

        foreach ( $cart_contents as $cart_item_key => $cart_item ) {
        $qty = $cart_item['input_cantidad_seleccionada'];
        if ( $woocommerce->cart->get_cart_item( $cart_item_key ) ) {
            $woocommerce->cart->set_quantity( $cart_item_key, $qty );

        }
    }
}
add_action('woocommerce_before_cart', 'action_before_cart');

// Display field in the cart
function dcms_display_field_to_cart( $item_name, $cart_item, $cart_item_key ) {

    global $wpdb;

    $id_prod = $cart_item['product_id'];
    $producto_en_carrito = wc_get_product( $id_prod );

    $content1 = "
                <div>
                    <div>
                        <span><strong>Cantidad a Enviar:</strong> %s</span>
                    </div>
                    <div>
                        <span><strong>Personalización:</strong></span>
                    </div>
    ";

    if ( isset($cart_item['input_cantidad_seleccionada']) ){
        $item_name .= sprintf($content1, $cart_item['input_cantidad_seleccionada']);
    }

    if ( isset($cart_item['input_posiciones_seleccionadas']) ){

        $string_partes = $cart_item['input_posiciones_seleccionadas'];
        $array_partes = explode(",", $string_partes);

        if ( isset($cart_item['input_serigrafias']) ){
            $string_serigrafias = $cart_item['input_serigrafias'];
            $array_serigrafias = explode(",", $string_serigrafias);

            for ($i = 0; $i < count($array_serigrafias); $i++){
                if($array_serigrafias[$i] != 0){

                    //  encontar el nombre de la serigrafia a mostrar
                    $id_serig = $array_serigrafias[$i];
                    $query = "SELECT * FROM {$wpdb->prefix}koala_personalizado_parte_serigrafia WHERE PersonalizadoParteSerigrafiaId = $id_serig";
                    $serigrafia = $wpdb->get_results($query, ARRAY_A);
                    $serigrafia_nombre = $serigrafia[0]['Serigrafia'];

                    foreach ($array_partes as $parte){
                        if($parte != ""){
                            $query2 = "SELECT * FROM {$wpdb->prefix}koala_personalizado_parte WHERE Parte = '$parte'";
                            $parte_encontrada = $wpdb->get_results($query2, ARRAY_A);
                            $parte_id = $parte_encontrada[0]['PersonalizadoParteId'];
                            if($parte_id == $serigrafia[0]['PersonalizadoParteId']){
                                $item_name .= sprintf("<div><span style='margin-left: 20px !important;'><strong>- %s: </strong></span><span> %s</span></div>", $parte, $serigrafia_nombre);
                            }
                        }
                    }
                }
            }

            ?>

            </div>
            <?php
        }
    }


    if($producto_en_carrito->is_type('variable')){
        $color = $cart_item['variation']['attribute_pa_colores'];
        $item_name .= sprintf("<div><span ><strong> Color: </strong></span><span>  %s</span></div>", $color);
    }


    $content3 = "
        <div>
            <div>
                <span><strong>Tallas:</strong></span>
            </div>
        
    ";
        //  mostrar las cantidades por tallas
     if( isset($cart_item['asignar_cant_talla_s']) && ($cart_item['asignar_cant_talla_s'] != 0) && ( $cart_item['asignar_cant_talla_s'] != '') ){
        $item_name .= sprintf("$content3<div><span style='margin-left: 20px !important;'><strong>- S:</strong></span><span>  %s</span></div>", $cart_item['asignar_cant_talla_s']);
    }
    if( isset($cart_item['asignar_cant_talla_m']) && ($cart_item['asignar_cant_talla_m'] != 0) && ( $cart_item['asignar_cant_talla_m'] != '') ){
        $item_name .= sprintf("<div><span style='margin-left: 20px !important;'><strong>- M:</strong></span><span>  %s</span></div>", $cart_item['asignar_cant_talla_m']);
    }
    if( isset($cart_item['asignar_cant_talla_l']) && ($cart_item['asignar_cant_talla_l'] != 0) && ( $cart_item['asignar_cant_talla_l'] != '') ){
        $item_name .= sprintf("<div><span style='margin-left: 20px !important;'><strong>- L:</strong></span><span>  %s</span></div>", $cart_item['asignar_cant_talla_l']);
    }
    if( isset($cart_item['asignar_cant_talla_xl']) && ($cart_item['asignar_cant_talla_xl'] != 0) && ( $cart_item['asignar_cant_talla_xl'] != '') ){
        $item_name .= sprintf("<div><span style='margin-left: 20px !important;'><strong>- XL:</strong></span><span>  %s</span></div>", $cart_item['asignar_cant_talla_xl']);
    }
    if( isset($cart_item['asignar_cant_talla_2xl']) && ($cart_item['asignar_cant_talla_2xl'] != 0) && ( $cart_item['asignar_cant_talla_2xl'] != '') ){
        $item_name .= sprintf("<div><span style='margin-left: 20px !important;'><strong>- 2XL:</strong></span><span>  %s</span></div>", $cart_item['asignar_cant_talla_2xl']);
    }
    if( isset($cart_item['asignar_cant_talla_3xl']) && ($cart_item['asignar_cant_talla_3xl'] != 0) && ( $cart_item['asignar_cant_talla_3xl'] != '') ){
        $item_name .= sprintf("<div><span style='margin-left: 20px !important;'><strong>- 3XL:</strong></span><span>  %s</span></div>", $cart_item['asignar_cant_talla_3xl']);
    }
    ?>
        </div>
    <?php
    //  termina las cantidades por tallas
    //
    //  mostrar embolsado
    if ( isset($cart_item['embolsado']) && $cart_item['embolsado'] == 1){
            $item_name .= sprintf("<div><span><strong>Embolsado:</strong> Si </span></div>");

    } else{
            $item_name .= sprintf("<div><span><strong>Embolsado:</strong> No </span></div>");
    }
    //  termina embolsado
    if ( isset($cart_item['input_fecha_seleccionada']) ){
        $item_name .= sprintf("<div><span><strong>Fecha de entrega:</strong> %s </span></div>", $cart_item['input_fecha_seleccionada']);
    }
    return $item_name;
}
add_filter( 'woocommerce_cart_item_name', 'dcms_display_field_to_cart', 10, 3 );




function mostrar_boton_pedir_presupuesto() {

    $title = 'Pedir presupuesto';
    $preorder_page = get_page_by_title( $title );

    $preorder_page_url = $preorder_page->guid;

    $boton_pedir_presupuesto = "
            <a id='pedir_presupuesto' href='$preorder_page_url' class='checkout-button button alt' style='width: 100%'>
                <i class='fa fa-file'></i> 
                <span>Pedir Presupuesto</span>
            </a>
    ";

    echo $boton_pedir_presupuesto;
}
add_filter( 'woocommerce_proceed_to_checkout', 'mostrar_boton_pedir_presupuesto', 10, 3 );



// encolar bootstrap

//  encolar js
function EncolarBootstrapJSKoalaAdmin($hook){
    if($hook != "koala-admin/admin/templates/personalizado.php" & $hook != "koala-admin/admin/templates/envios.php"){
        return;
    }
    wp_enqueue_script('bootstrapjs',plugins_url('admin/bootstrap/js/bootstrap.min.js',__FILE__),array('jquery'));
}
add_action('admin_enqueue_scripts','EncolarBootstrapJSKoalaAdmin');

//  encolar css
function EncolarBootstrapCSSKoalaAdmin($hook){
    if($hook != "koala-admin/admin/templates/personalizado.php" & $hook != "koala-admin/admin/templates/envios.php"){
        return;
    }
    wp_enqueue_style('bootstrapcss',plugins_url('admin/bootstrap/css/bootstrap.min.css',__FILE__));
}
add_action('admin_enqueue_scripts','EncolarBootstrapCSSKoalaAdmin');





        //          table tree de AdminLTE          //

function EncolarCSSTableTreeAdminLTEKoalaAdmin($hook){
    if($hook != "koala-admin/admin/templates/personalizado.php" ){
        return;
    }
    wp_enqueue_style('treeAdminLTEcss',plugins_url('admin/bootstrap/treeAdminLTE/css/adminlte.min.css',__FILE__));
}
add_action('admin_enqueue_scripts','EncolarCSSTableTreeAdminLTEKoalaAdmin');

function EncolarJSTableTreeAdminLTEKoalaAdmin($hook){
    if($hook != "koala-admin/admin/templates/personalizado.php" ){
        return;
    }
    wp_enqueue_script('treeAdminLTEjquery',plugins_url('admin/bootstrap/treeAdminLTE/js/jquery/jquery.min.js',__FILE__),array('jquery'));
    wp_enqueue_script('treeAdminLTEbootstrap',plugins_url('admin/bootstrap/treeAdminLTE/js/bootstrap/js/bootstrap.bundle.min.js',__FILE__),array('jquery'));
    wp_enqueue_script('treeAdminLTEadminlte',plugins_url('admin/bootstrap/treeAdminLTE/js/dist/js/adminlte.min.js',__FILE__),array('jquery'));
//    wp_enqueue_script('treeAdminLTEdemo',plugins_url('admin/bootstrap/treeAdminLTE/js/dist/js/demo.js',__FILE__),array('jquery'));
}
add_action('admin_enqueue_scripts','EncolarJSTableTreeAdminLTEKoalaAdmin');







//  Encolar Js Propio

function EncolarJSExternoKoalaAdmin($hook){
    if($hook != "koala-admin/admin/templates/personalizado.php" & $hook != "koala-admin/admin/templates/envios.php"){
        return;
    }
    wp_enqueue_script('JSExternoKoalaAdmin',plugins_url('admin/js/personalizado.js',__FILE__),array('jquery'));

    wp_enqueue_script('ValidacionesKoalaAdmin',plugins_url('admin/js/validaciones.js',__FILE__),array('jquery'));


    wp_localize_script('JSExternoKoalaAdmin','BuscarPartesAjax',[
        'url' => plugin_dir_url( __DIR__ ).'koala-admin/admin/templates/serigrafia_nueva.php',
        'seguridad' => wp_create_nonce('seg')
    ]);

    wp_localize_script('JSExternoKoalaAdmin', 'BorrarEnvioAjax',[
        'url' => admin_url('admin-ajax.php'),
        'seguridad_borrar' => wp_create_nonce('seg')
    ]);

    wp_localize_script('JSExternoKoalaAdmin','EditarEnvioAjax',[
        'url' => plugin_dir_url( __DIR__ ).'koala-admin/admin/templates/envios_editar.php',
        'seguridad_editar' => wp_create_nonce('seg')
    ]);

    wp_localize_script('JSExternoKoalaAdmin','EncontrarCatAsignadas',[
        'url' => plugin_dir_url( __DIR__ ).'koala-admin/admin/templates/cat_x_envios.php',
        'seguridad' => wp_create_nonce('seg')
    ]);

    //  ----------  Serigrafias
    wp_localize_script('JSExternoKoalaAdmin', 'BorrarSerigrafiaAjax',[
        'url' => admin_url('admin-ajax.php'),
        'seguridad_serigrafia' => wp_create_nonce('seg')
    ]);

    wp_localize_script('JSExternoKoalaAdmin','EditarSerigrafiaAjax',[
        'url' => plugin_dir_url( __DIR__ ).'koala-admin/admin/templates/serigrafia_editar.php',
        'seguridad_editar_serigrafia' => wp_create_nonce('seg')
    ]);

    wp_localize_script('ValidacionesKoalaAdmin','ValidarNuevaSerigrafiaAjax',[
        'url' => plugin_dir_url( __DIR__ ).'koala-admin/admin/templates/validaciones/serigrafias/validar_serigrafia.php',
        'seguridad_validar_nueva_serigrafia' => wp_create_nonce('seg')
    ]);

    //  -----------     Partes
    wp_localize_script('JSExternoKoalaAdmin', 'BorrarParteAjax',[
        'url' => admin_url('admin-ajax.php'),
        'seguridad_parte' => wp_create_nonce('seg')
    ]);
    wp_localize_script('JSExternoKoalaAdmin','EditarParteAjax',[
        'url' => plugin_dir_url( __DIR__ ).'koala-admin/admin/templates/parte_editar.php',
        'seguridad_editar_parte' => wp_create_nonce('seg')
    ]);

    wp_localize_script('ValidacionesKoalaAdmin','ValidarNuevaParteAjax',[
        'url' => plugin_dir_url( __DIR__ ).'koala-admin/admin/templates/validaciones/partes/validar_parte.php',
        'seguridad_validar_nueva_parte' => wp_create_nonce('seg')
    ]);


    //  --------   Personalizados
    wp_localize_script('JSExternoKoalaAdmin', 'BorrarPersonalizadoAjax',[
        'url' => admin_url('admin-ajax.php'),
        'seguridad_personalizado' => wp_create_nonce('seg')
    ]);
    wp_localize_script('JSExternoKoalaAdmin','EditarPersonalizadoAjax',[
        'url' => plugin_dir_url( __DIR__ ).'koala-admin/admin/templates/personalizado_editar.php',
        'seguridad_editar_personalizado' => wp_create_nonce('seg')
    ]);
    wp_localize_script('JSExternoKoalaAdmin','EncontrarCatPersonalizados',[
        'url' => plugin_dir_url( __DIR__ ).'koala-admin/admin/templates/cat_x_personalizado.php',
        'seguridad' => wp_create_nonce('seg')
    ]);
}
add_action('admin_enqueue_scripts','EncolarJSExternoKoalaAdmin');

function EncolarAjaxFrontend(){

    wp_enqueue_script('AjaxFrontKoalaAdmin',plugins_url('koala-admin/frontend/js/ajax.js'),array('jquery'));
    wp_enqueue_script('SerigrafFrontKoalaAdmin',plugins_url('koala-admin/frontend/js/serigrafias.js'),array('jquery'));
    wp_enqueue_script('CollapseFrontKoalaAdmin',plugins_url('koala-admin/frontend/js/collapse.js'),array('jquery'));
    wp_enqueue_script('CalculadoraFrontKoalaAdmin',plugins_url('koala-admin/frontend/js/calculadora.js'),array('jquery'));
    wp_enqueue_script('ValidacionesFrontKoalaAdmin',plugins_url('koala-admin/frontend/js/validaciones.js'),array('jquery'));
    wp_enqueue_script('ExtrasFrontKoalaAdmin',plugins_url('koala-admin/frontend/js/seccion_extras.js'),array('jquery'));
	wp_enqueue_script('PresupuestoFrontKoalaAdmin',plugins_url('koala-admin/frontend/js/pedir_presupuesto.js'),array('jquery'));
	wp_enqueue_script('TarjetaDatos',plugins_url('koala-admin/frontend/js/tarjeta_dato.js'),array('jquery'));
	
    wp_enqueue_script('SubirLogoAjaxFrontKoalaAdmin',plugins_url('koala-admin/frontend/js/ajax.js'),array('jquery'));

    wp_localize_script('ExtrasFrontKoalaAdmin','SubirLogoAjax',[
        'url' => plugin_dir_url( __DIR__ ).'koala-admin/frontend/controler/upload.php',
        'seguridad_subir_logo' => wp_create_nonce('seg')
    ]);
//    wp_localize_script('AjaxFrontKoalaAdmin','AjaxBtn_5',[
//        'url' => plugin_dir_url( __DIR__ ).'koala-admin/frontend/controllers/cuantos.php',
//        'seguridad_ajax_cuantos' => wp_create_nonce('seg')
//    ]);
	wp_localize_script('ExtrasFrontKoalaAdmin','AjaxColoresSelect',[
        'url' => plugin_dir_url( __DIR__ ).'koala-admin/frontend/controler/coloresSelect.php',
        'seguridad_ajax_colores_select' => wp_create_nonce('seg')
    ]);
	wp_localize_script('PresupuestoFrontKoalaAdmin','AjaxPedirPresupuesto',[
        'url' => plugin_dir_url( __DIR__ ).'koala-admin/frontend/controler/pedir_presupuesto.php',
        'seguridad_ajax_pedir_presupuesto' => wp_create_nonce('seg')
    ]);
	    wp_localize_script('TarjetaDatos','LlenarTarjeta',[
        'url' => plugin_dir_url( __DIR__ ).'koala-admin/frontend/controler/llenar_tarjeta_presupuesto.php',
        'seguridad_ajax_llenar_tarjeta' => wp_create_nonce('seg')
    ]);


}
add_action('wp_enqueue_scripts','EncolarAjaxFrontend');

function EncolarJsFrontent(){
    wp_enqueue_script('JSFrontKoalaAdmin',plugins_url('koala-admin/frontend/js/collapse.js'),array('jquery'));
}
add_action('wp_enqueue_scripts','EncolarJsFrontent');



//  Encolar CSS Propio

function EncolarCSSExternoKoalaAdmin($hook){

    if($hook != "koala-admin/admin/templates/personalizado.php" & $hook != "koala-admin/admin/templates/envios.php"){
        return;
    }
    wp_enqueue_style('CSSExternoKoalaAdmin',plugins_url('admin/css/personalizado.css',
        __FILE__));
}
add_action('admin_enqueue_scripts','EncolarCSSExternoKoalaAdmin');

function EncolarCSSCollapse_(){
    wp_enqueue_style('functioncss', plugins_url('koala-admin/frontend/css/collapse.css'));
    wp_enqueue_style('bootstrap', plugins_url('koala-admin/frontend/css/bootstrap.min.css'));
}
add_action('wp_enqueue_scripts','EncolarCSSCollapse_');






//      funciones       //
function EliminarEnvio(){
    $nonce = $_POST['nonce_envio_borrar'];
    if(!wp_verify_nonce($nonce, 'seg')){
        die('No tiene permisos');
    }
    $id_envio = $_POST['id_envio'];
    global $wpdb;
    $tabla_envios = "{$wpdb->prefix}koala_envios";
    $wpdb->delete($tabla_envios, array('KoalaEnviosId' => $id_envio));
    return true;
}
add_action('wp_ajax_eliminar_envio', 'EliminarEnvio');


function EliminarSerigrafia(){
    $nonce = $_POST['nonce_serigrafia_borrar'];
    if(!wp_verify_nonce($nonce, 'seg')){
        die('No tiene permisos');
    }
    $id_serigrafia = $_POST['id_serigrafia'];
    global $wpdb;
    $tabla_serigrafia = "{$wpdb->prefix}koala_personalizado_parte_serigrafia";
    $wpdb->delete($tabla_serigrafia, array('PersonalizadoParteSerigrafiaId' => $id_serigrafia));
    return true;
}
add_action('wp_ajax_eliminar_serigrafia', 'EliminarSerigrafia');


function EliminarParte(){
    $nonce = $_POST['nonce_parte_borrar'];
    if(!wp_verify_nonce($nonce, 'seg')){
        die('No tiene permisos');
    }
    $id_parte = $_POST['id_parte'];
    global $wpdb;
    $tabla_parte = "{$wpdb->prefix}koala_personalizado_parte";
    $tabla_serigrafia = "{$wpdb->prefix}koala_personalizado_parte_serigrafia";

    $query = "SELECT * FROM $tabla_serigrafia WHERE PersonalizadoParteId = $id_parte";
    $serigrafias_a_eliminar = $wpdb->get_results($query, ARRAY_A);

    foreach ($serigrafias_a_eliminar as $key => $value){
        $serigrafia_id = $value['PersonalizadoParteSerigrafiaId'];
        $wpdb->delete($tabla_serigrafia, array('PersonalizadoParteSerigrafiaId' => $serigrafia_id));
    }

    $wpdb->delete($tabla_parte, array('PersonalizadoParteId' => $id_parte));
    return true;
}
add_action('wp_ajax_eliminar_parte', 'EliminarParte');




function EliminarPersonalizado(){
    $nonce = $_POST['nonce_personalizado_borrar'];
    if(!wp_verify_nonce($nonce, 'seg')){
        die('No tiene permisos');
    }
    $id_personalizado = $_POST['id_personalizado'];
    global $wpdb;
    $tabla_personalizado = "{$wpdb->prefix}koala_personalizado";
    $tabla_parte = "{$wpdb->prefix}koala_personalizado_parte";
    $tabla_serigrafia = "{$wpdb->prefix}koala_personalizado_parte_serigrafia";


    $query = "SELECT * FROM $tabla_parte WHERE PersonalizadoId = $id_personalizado";
    $partes_a_eliminar = $wpdb->get_results($query, ARRAY_A);

    foreach ($partes_a_eliminar as $key => $value){

        $parte_id = $value['PersonalizadoParteId'];

        $query2 = "SELECT * FROM $tabla_serigrafia WHERE PersonalizadoParteId = $parte_id";
        $serigrafias_a_eliminar = $wpdb->get_results($query2, ARRAY_A);

        foreach ($serigrafias_a_eliminar as $serigrafia){
            $serigrafia_id = $serigrafia['PersonalizadoParteSerigrafiaId'];
            $wpdb->delete($tabla_serigrafia, array('PersonalizadoParteSerigrafiaId' => $serigrafia_id));
        }

        $wpdb->delete($tabla_parte, array('PersonalizadoParteId' => $parte_id));
    }


    $wpdb->delete($tabla_personalizado, array('PersonalizadoId' => $id_personalizado));
    return true;
}

add_action('wp_ajax_eliminar_personalizado', 'EliminarPersonalizado');




//  involucradas en el collapse //
function PersonalizadosLista(){
    global $wpdb;
    $tabla_personalizado = "{$wpdb->prefix}koala_personalizado";
    $query =  "SELECT * FROM $tabla_personalizado";
    $lista_de_personalizados = $wpdb->get_results($query, ARRAY_A);
    return $lista_de_personalizados;
}


function PartexId($id_personalizado){
    global $wpdb;
    $tabla_parte = "{$wpdb->prefix}koala_personalizado_parte";
    $query =  "SELECT * FROM $tabla_parte WHERE PersonalizadoId = $id_personalizado";
    $lista_de_la_partes = $wpdb->get_results($query, ARRAY_A);
    return $lista_de_la_partes;
}


function SerigrafiaxId($id_parte){
    global $wpdb;
    $tabla_serigrafias = "{$wpdb->prefix}koala_personalizado_parte_serigrafia";
    $query =  "SELECT * FROM $tabla_serigrafias WHERE PersonalizadoParteId = $id_parte";
    $lista_serigrafias_de_la_parte = $wpdb->get_results($query, ARRAY_A);
    return $lista_serigrafias_de_la_parte;

}


function CantEnviosPorPersonalizado(){
    $cant_envios_lista = [5, 10, 25, 50, 100, 250, 500];
    return $cant_envios_lista;
}


function EnviosXcategorias($categorias_del_producto){
    global $wpdb;
    $tabla_envios = "{$wpdb->prefix}koala_envios";

    $query =  "SELECT * FROM $tabla_envios ORDER BY KoalaEnviosDias ASC";
    $lista_de_envios = $wpdb->get_results($query, ARRAY_A);

    $envios_a_mostrar = [];

    foreach ($lista_de_envios as $envio){
        $categorias_del_envio = $envio['KoalaEnviosCategorias'];
        $categorias_del_envio_decode = json_decode($categorias_del_envio);

        $array_result = array_intersect($categorias_del_envio_decode, $categorias_del_producto);

        if($array_result){
            $envios_a_mostrar[] = $envio;
        }
    }

    return $envios_a_mostrar;

}



function MostrarSeccionesKoala($personalizado_id, $categorias_del_producto){


//    $estilos = estilosFront();

//    $card_header_position = $estilos['card_header']['position'];
//
//
//    $h3_header_background_color = $estilos['h3_header']['background_color'];
//    $h3_header_font_size = $estilos['h3_header']['font_size'];
//    $h3_header_border_radius = $estilos['h3_header']['border_radius'];
//    $h3_header_padding = $estilos['h3_header']['padding'];
//    $h3_header_border = $estilos['h3_header']['border'];
//    $h3_header_color = $estilos['h3_header']['color'];
//
//
//    $btn_tool_background_color = $estilos['btn_tool']['background_color'];
//    $btn_tool_color = $estilos['btn_tool']['color'];
//    $btn_tool_font_size = $estilos['btn_tool']['font_size'];
//    $btn_tool_margin = $estilos['btn_tool']['margin'];
//    $btn_tool_padding = $estilos['btn_tool']['padding'];

    $colapsable_master = ColapseMaster($personalizado_id, $categorias_del_producto);


    return $colapsable_master;
}



function ColapseMaster($personalizado_id, $categorias_del_producto){







//      cerrar contenedor general
//    $contenedor2 = "</form></div>";

        //    scrips        //
//    $script_collapse = "
//        <script type='text/javascript'>
//            var coll = document.getElementsByClassName('collapsible');
//            var i;
//
//            for (i = 0; i < coll.length; i++) {
//                coll[i].addEventListener('click', function() {
//                    this.classList.toggle('active');
//                    var content = this.nextElementSibling;
//                    if (content.style.display === 'block') {
//                        content.style.display = 'none';
//                    } else {
//                        content.style.display = 'block';
//                    }
//                });
//            }
//        </script>
//    ";




//    $script_boton_conf_estampado = "
//        <script type='text/javascript'>
//            let boton_conf_estampado = document.getElementById('confirmar_estampado');
//
//            boton_conf_estampado.addEventListener('click', function(evento){
//
//                let seccion_personalizalo = document.getElementById('content_personalizalo');
//                let seccion_personalizalo_elementStyle = window.getComputedStyle(seccion_personalizalo);
//                let seccion_personalizalo_elementDisplay = seccion_personalizalo_elementStyle.getPropertyValue('display');
//
//
//                let seccion_cuando = document.getElementById('seccion_cuando');
//                let seccion_cuando_elementStyle = window.getComputedStyle(seccion_cuando);
//                let seccion_cuando_elementDisplay = seccion_cuando_elementStyle.getPropertyValue('display');
//
//
//                let serigrafia1_parte_1 = document.getElementById('serigrafia_radio1');
//                let id_serigrafia1 = serigrafia1_parte_1.getAttribute('value');
//                let nombre_serigrafia_padre = serigrafia1_parte_1.getAttribute('name');
//
//                let serigrafia2_parte_1 = document.getElementById('serigrafia_radio2');
//                let id_serigrafia2 = serigrafia2_parte_1.getAttribute('value');
//
//                //  Capturar el boton donde se pondra lo seleccionado   //
//                let input_posiciones_seleccionadas = document.getElementById('input_posiciones_seleccionadas');
//
//
//
//                if(serigrafia1_parte_1.checked){
//                    input_posiciones_seleccionadas.setAttribute('value', nombre_serigrafia_padre);
//                }
//
//                if(serigrafia2_parte_1.checked){
//                    input_posiciones_seleccionadas.setAttribute('value', nombre_serigrafia_padre);
//                }
//
//
//
//
//
//                 if(seccion_cuando_elementDisplay === 'none'){
//                    seccion_cuando.style.setProperty('display', 'block');
//                }
//
//                if(seccion_personalizalo_elementDisplay === 'block'){
//                    seccion_personalizalo.style.setProperty('display', 'none');
//                }
//            });
//        </script>
//    ";

    $script_boton_partes = "
        <script type='text/javascript'>
            let boton_serigrafia_parte = document.getElementById('serigrafia_radio');
            
            boton_serigrafia_parte.addEventListener('click', function(evento){
                
              let btn_parte = document.getElementById('btn_parte');
             
              let btn_parte_id = btn_parte.getAttribute('value');
              
              alert(btn_parte_id);
            });
        
        </script>
    ";



//
//    $script_shipping_select = "
//        <script type='text/javascript'>
//            jQuery(document).ready(function($) {
//                var li = $('li.shipping-select');
//
//                li.click(function(){
//                    //checking the clicked element
//                    var iCheck = $(this).find('.check > i');
//                    var isSelected = iCheck.hasClass('selected');
//                    if (!isSelected) {
//                        $('.check > i').removeClass('selected');
//                        iCheck.addClass('selected');
//                    }
//
//                    // include the new selected date in the panel title
//                    var fecha = $(this).find('.contenttop > span').text();
//                    //get panel 3
//
//                    panel3 = $('#input_fecha_seleccionada');
//                    panel3.val(fecha);
//                });
//            });
//
//        </script>
//    ";



//    $content = $clearer;
//    $content .= $contenedor1;
//    $content .= $seccion1;
//    $content .= $seccion2;
//    $content .= $seccion3;
//    $content .= $seccion_calculadora;
//    $content .= $contenedor2;
//    $content .= $script_collapse;
//    $content .= $script_boton_confirmar_cantidad;
//    $content .= $script_boton_calcular_precio;
//    $content .= $script_boton_conf_estampado;
//    $content .= $script_boton_partes;
//    $content .= $script_btn_cuantos_estaticos1;
//    $content .= $script_btn_cuantos_estaticos2;
//    $content .= $script_shipping_select;


//    return $content;
}


function CalcularFecha($envio_cant_dias, $hoy){

    $dias = date("d-m-Y",strtotime($hoy."+" .$envio_cant_dias. "days"));

    return $dias;
}

function date2Spanish ($fecha)
{
    $en = array("jan", "apr", "aug", "dec");
    $es = array("ene", "abr", "ago", "dic");

    $mes = substr($fecha, -3);

    if (!in_array($mes, $en)) return $fecha;

    $translated = str_replace($en, $es, $fecha);

    return $translated;
}


//  funciones que no estoy usando por el momento    //

function estilosFront(){
    $estilos = [];


    $card_header = [
        'border_bottom' => "1px solid #000000",
        'padding' => "0.75rem 1.25rem",
        'position' => "relative",
        'border_top_left_radius' => "0.25rem",
        'border_top_right_radius' => "0.25rem"
    ];

    $h3_header = [
        'background_color' => "#00c3b282",
        'font_size' => "1.2rem",
        'border_radius' => "15px",
        'padding' => "10px",
        'border' => "4px solid #fff",
        'color' => "#444349"
    ];


    $btn_tool = [
        'background_color' => "transparent",
        'color' => "#adb5bd",
        'font_size' => ".875rem",
        'margin' => "-50.75rem 0",
        'padding' => "30rem 36rem 30rem 45rem"
    ];

    $btn = [
        'display' => "inline-block",
        'font-weight' => "400",
        'color' => "#212529",
        'text-align' => "center",
        'vertical-align' => "middle",
        '-webkit-user-select' => "none",
        '-moz-user-select' => "none",
        '-ms-user-select' => "none",
        'user-select' => "none",
        'background-color' => "transparent",
        'border' => "1px solid transparent",
        'padding' => "0.375rem 0.75rem",
        'font-size' => "1rem",
        'line-height' => "1.5",
        'border-radius' => " 0.25rem"
    ];





    $estilos['card_header'] = $card_header;
    $estilos['h3_header'] = $h3_header;
    $estilos['btn_tool'] = $btn_tool;

    return $estilos;

}



