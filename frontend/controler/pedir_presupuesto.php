<?php

$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
global $wpdb;

define("HTML_EMAIL_HEADERS", array('Content-Type: text/html; charset=UTF-8'));





//  invocaciones
CapturarDatosParaPresupuesto();


send_email_woocommerce_style($email = null, $subject = null, $heading, $message);


ObtenerCarritoCompras();









//  funciones

//  capturar datos del formulario
function CapturarDatosParaPresupuesto(){
    $email = $_POST['input_email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $company = $_POST['company'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    $region_id = $_POST['region_id'];
    $country_id = $_POST['country_id'];
    $telephone = $_POST['telephone'];
    $vat_id = $_POST['vat_id'];

    $cart_datos = ObtenerCarritoCompras();

    $subject = 'Pedir Presupuesto';

    $heading = 'Solicitud de presupuesto.';

    $message = '
                <h2> Datos del cliente </h2>
                <table>   
                    <tr>
                        <td><strong> E-mail: </strong></td>
                        <td>'.$email.'</td>
                    </tr>
                    <tr>
                       <td><strong> Nombre: </strong></td>
                       <td>'.$firstname.'</td>
                    </tr>
                    <tr>
                       <td><strong> Apellidos: </strong></td>
                       <td>'.$lastname.'</td>
                    </tr>
                    <tr>
                        <td> <strong> Compañía: </strong></td>
                        <td>'.$company.'</td>
                    </tr>
                    <tr>
                        <td><strong> Dirección: </strong></td>
                        <td>'.$street.'</td>
                    </tr>
                    <tr>
                        <td> <strong> Ciudad: </strong></td>
                        <td>'.$city.'</td>
                    </tr>
                    <tr>
                        <td><strong> Código Postal: </strong></td>
                        <td>'.$postcode.'</td>
                    </tr>
                    <tr>
                        <td> <strong> Región: </strong></td>
                        <td>'.$region_id.'</td>
                    </tr>
                    <tr>
                        <td> <strong> País: </strong></td>
                        <td>'.$country_id.'</td>
                    </tr>
                    <tr>
                        <td><strong> Teléfono: </strong></td>
                        <td>'.$telephone.'</td>
                    </tr>
                    <tr>
                        <td><strong> NIF / CIF: </strong></td>
                        <td>'.$vat_id.'</td>
                    </tr>
                </table>
                
                
    ';

    $datos_del_carro = "<hr>";
    $datos_del_carro .= "<h2>Datos de la orden</h2>";
    $datos_del_carro .= "<table>";

    foreach ( $cart_datos as $cart_item_key => $cart_item ) {
        $nombre_producto = $cart_item['data']->get_Name();

        $posiciones = $cart_item['input_posiciones_seleccionadas'];

        $cantidad = $cart_item['input_cantidad_seleccionada'];
        $precio = $cart_item['input_precio_producto_final'];
        $subtotal = round($cart_item['line_subtotal'], 2);
        $array_subtotal[] = $subtotal;
        $datos_del_carro .= "
                            <tr>
                                <td><strong>Nombre del Producto:</strong></td>
                                <td colspan='5'>$nombre_producto</td>
                             </tr>
                             <tr>
                                <td><strong>Posiciones Seleccionadas:</strong></td>
                                <td colspan='5'>$posiciones</td>
                             </tr>
                            
                            <th></th>
                            <th>Cantidad</th>
                            <th></th>
                            <th>Precio</th>
                            <th></th>
                            <th>Importe</th>
                            
                            <tr>
                                <td><strong>Subtotal con descuento:</strong></td>
                                <td>$cantidad</td>
                                <td>x</td>
                                <td>$precio</td>
                                <td>=</td>
                                <td>$subtotal</td>
                            </tr>
                            <hr style='width: 200%; margin-left: 30px !important;'>
        ";
    }


    $total_carrito = array_sum($array_subtotal);

    $datos_del_carro .= "
                            <tr> 
                                <td><strong> Total: </strong></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>$total_carrito</td> 
                            </tr>
    ";
    $datos_del_carro .= "</table>";







    $message = $message.$datos_del_carro;
    send_email_woocommerce_style($email, $subject, $heading, $message);
	
	global $woocommerce;
    $woocommerce->cart->empty_cart();

}
add_action('wp_ajax_capturar_datos_presupuesto', 'CapturarDatosParaPresupuesto');



//  enviar email
function send_email_woocommerce_style($email, $subject, $heading, $message) {

    // Get woocommerce mailer from instance
    $mailer = WC()->mailer();

    // Wrap message using woocommerce html email template
    $wrapped_message = $mailer->wrap_message($heading, $message);

    // Create new WC_Email instance
    $wc_email = new WC_Email;

    // Style the wrapped message with woocommerce inline styles
    $html_message = $wc_email->style_inline($wrapped_message);

    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: Camisetas Koala <webmaster@kevinhrivera.com>'
    );

    wp_mail( $email, $subject, $html_message, $headers );


    // Send the email using wordpress mail function
//    $mailer->send( $email, $subject, $html_message, HTML_EMAIL_HEADERS );

}



//  obtener carrito
function ObtenerCarritoCompras(){
    $cart_contents = WC()->cart->get_cart_contents();

    return $cart_contents;
}