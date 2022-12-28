<?php

$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
global $wpdb;



CapturarVariacion();



function CapturarVariacion(){
    $id_producto = $_POST['id_producto'];
    $color = $_POST['color'];

    $product = new WC_Product_Variable( $id_producto );
    $variations = $product->get_available_variations();

    foreach ( $variations as $variation ) {
        $variacion_color = $variation['attributes']['attribute_pa_colores'];
        if($variacion_color === $color){
            $src =  $variation['image']['url'];
        }
    }
    $datos = [
        'url_imagen' => $src,
        'color_escogido' => $color
    ];

    echo json_encode($datos);

}
add_action('wp_ajax_capturar_color_seleccionado', 'CapturarVariacion');