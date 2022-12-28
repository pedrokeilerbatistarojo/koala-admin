<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
global $wpdb;


cant_serigrafias_por_partes($wpdb);

function cant_serigrafias_por_partes($wpdb){
    $id_parte_padre= $_POST['id_parte'];

    $query = "SELECT * FROM {$wpdb->prefix}koala_personalizado_parte_serigrafia";
    $listado_serigrafias = $wpdb->get_results($query, ARRAY_A);

    $cant_serigrafias_de_la_misma_parte = 0;
    $success = false;

    foreach ($listado_serigrafias as $serigrafia_){
        if($serigrafia_['PersonalizadoParteId'] == $id_parte_padre){
            $cant_serigrafias_de_la_misma_parte ++;
        }
    }
    $can_serig_a_crear = 10 - $cant_serigrafias_de_la_misma_parte;
    if($can_serig_a_crear != 0){
        $success = true;
    }

    $datos = [
        'cant_serig_a_crear' => $can_serig_a_crear,
        'success_serig' => $success
    ];

    echo json_encode($datos);

}

add_action('wp_ajax_validar_nueva_serigrafia', 'cant_serigrafias_por_partes');