<?php

$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
global $wpdb;


EditarSerigrafia($wpdb);

//      Editar serigrafia
function EditarSerigrafia($wpdb){
    $id_serigrafia = $_POST['id_serigrafia'];

    //      de esta manera es mas rapido
    $query = "SELECT * FROM {$wpdb->prefix}koala_personalizado_parte_serigrafia";
    $serigrafias = $wpdb->get_results($query, ARRAY_A);

    foreach ($serigrafias as $key => $value){
        $id = $value['PersonalizadoParteSerigrafiaId'];
        if($id == $id_serigrafia){
            $serigrafia = $value;
            break;
        }
    }
    $parte_padre_serigrafia = json_decode($serigrafia['PersonalizadoParteId']);

    $query2 = "SELECT * FROM {$wpdb->prefix}koala_personalizado_parte";
    $partes = $wpdb->get_results($query2, ARRAY_A);

    foreach ($partes as $key => $value){
        $id = $value['PersonalizadoParteId'];
        if($id == $parte_padre_serigrafia){
            $parte = $value;
            break;
        }
    }
    $personalizado_padre_serigrafia = json_decode($parte['PersonalizadoId']);


    $query3 = "SELECT * FROM {$wpdb->prefix}koala_personalizado";
    $personalizados = $wpdb->get_results($query3, ARRAY_A);

    foreach ($personalizados as $key => $value){
        $id = $value['PersonalizadoId'];
        if($id == $personalizado_padre_serigrafia){
            $personalizado = $value;
            break;
        }
    }


    $datos_a_enviar = [
        'serigrafia' => $serigrafia,
        'parte_padre' => $parte,
        'personalizado_padre' => $personalizado
    ];

    echo json_encode($datos_a_enviar);
}
add_action('wp_ajax_editar_serigrafia', 'EditarSerigrafia');