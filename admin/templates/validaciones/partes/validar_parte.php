<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
global $wpdb;


cant_partes_por_personalizados($wpdb);



function cant_partes_por_personalizados($wpdb){
    $id_personalizado = $_POST['id_personalizado'];

    $query = "SELECT * FROM {$wpdb->prefix}koala_personalizado_parte";
    $listado_partes = $wpdb->get_results($query, ARRAY_A);

    $cant_partes_del_mismo_personalizado = 0;
    $success = false;

    foreach ($listado_partes as $parte){
        if($parte['PersonalizadoId'] == $id_personalizado)
        {
            $cant_partes_del_mismo_personalizado ++;
        }
    }
    $can_a_crear = 4 - $cant_partes_del_mismo_personalizado;
    if($can_a_crear != 0){
        $success = true;
    }

    $datos = [
        'cant_a_crear' => $can_a_crear,
        'success' => $success
    ];

    echo json_encode($datos);

}
add_action('wp_ajax_validar_nueva_parte', 'cant_partes_por_personalizados');