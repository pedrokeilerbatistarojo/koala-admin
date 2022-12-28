<?php

$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
global $wpdb;

RetornarDatosAMostrar();
ObtenerCarritoCompras();


//  obtener carrito
function ObtenerCarritoCompras(){
    $cart_contents = WC()->cart->get_cart_contents();
    return $cart_contents;
}

function RetornarDatosAMostrar(){
    $cart_datos = ObtenerCarritoCompras();
    foreach ( $cart_datos as $cart_item_key => $cart_item ) {
        $product_id =  $cart_item['product_id'];
        $producto_en_carrito = wc_get_product( $product_id );


        $nombre_producto[] = $cart_item['data']->get_Name();


        if($producto_en_carrito->is_type('variable')){
            $sku_producto[] = $cart_item['data']->get_Parent_Data()['sku'];
            $color_producto[] = $cart_item['variation']['attribute_pa_colores'];
        }
        else{
            $sku_producto[] = $cart_item['data']->get_Sku();
            $color_producto[] = '';
        }

        $cantidad[] = $cart_item['input_cantidad_seleccionada'];

        $precio[] = $cart_item['input_precio_producto_final'];

        $subtotal[] = round($cart_item['line_subtotal'], 2);

        $iva[] = ($cart_item['line_subtotal'] * 21) / 100;

    }

    $subtotal_antes_impuestos = array_sum($subtotal);
    $total_iva = array_sum($iva);
    $total_carrito = array_sum($subtotal) + $total_iva;


    $datos_enviar = [
        'array_nombre' => $nombre_producto,
        'array_sku' => $sku_producto,
        'array_color' => $color_producto,
        'array_cantidad' => $cantidad,
        'array_precio' => $precio,
        'array_subtotal' => $subtotal,
        'subtotal_antes_impuestos' =>$subtotal_antes_impuestos,
        'total_iva' => $total_iva,
        'total' => $total_carrito
    ];
    $encode_datos_enviar = json_encode($datos_enviar);
    echo $encode_datos_enviar;
}

add_action('wp_ajax_llenar_tarjeta', 'RetornarDatosAMostrar');