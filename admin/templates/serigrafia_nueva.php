<?php

$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
global $wpdb;


try{
    if ($_POST['personalizado']!= null) {
        $id_personalizado = $_POST['personalizado'];

        $query = "SELECT * FROM {$wpdb->prefix}koala_personalizado_parte WHERE PersonalizadoId = $id_personalizado";
        $partes_x_personaliado = $wpdb->get_results($query, ARRAY_A);

        echo json_encode($partes_x_personaliado);

    }
} catch (Exception $e){
    $personalizado= array('error'=>$e->getMessage());
}
?>