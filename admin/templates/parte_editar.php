<?php

$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
global $wpdb;


EditarParte($wpdb);


//function get_images_from_media_library() {
//    $args = array(
//        'post_type' => 'attachment',
//        'post_mime_type' =>'image',
//        'post_status' => 'inherit',
//        'posts_per_page' => '',
//        'orderby' => 'id'
//    );
//    $query_images = new WP_Query( $args );
//    $images = array();
//    foreach ( $query_images->posts as $image) {
//        $images[]= $image->guid;
//    }
//    return $images;
//}

function get_images_from_media_library() {
    $args = array(
        'post_type' => 'attachment',
        'post_mime_type' =>'image',
        'post_status' => 'inherit',
        'posts_per_page' => '1000',
        'orderby' => 'id'
    );
    $query_images = new WP_Query( $args );

    foreach ( $query_images->posts as $image) {
        $images['meta'][]= [
            'id' => $image->ID,
            'nombre' => $image->post_name,
            'url' => $image->guid
        ];

    }
    return $images;
}




//      Editar serigrafia
function EditarParte($wpdb){

    $id_parte = $_POST['id_parte'];

    $imgs = get_images_from_media_library();

    $query = "SELECT * FROM {$wpdb->prefix}koala_personalizado_parte";
    $partes = $wpdb->get_results($query, ARRAY_A);

    foreach ($partes as $key => $value){
        $id = $value['PersonalizadoParteId'];
        if($id == $id_parte){
            $parte = $value;
            break;
        }
    }
    $personalizado_padre_parte = json_decode($parte['PersonalizadoId']);


    $query2 = "SELECT * FROM {$wpdb->prefix}koala_personalizado";
    $personalizados = $wpdb->get_results($query2, ARRAY_A);

    foreach ($personalizados as $key => $value){
        $id = $value['PersonalizadoId'];
        if($id == $personalizado_padre_parte){
            $personalizado = $value;
            break;
        }
    }

    $datos_a_enviar = [
        'parte' => $parte,
        'personalizado_padre' => $personalizado,
        'imagenes' => $imgs
    ];

    echo json_encode($datos_a_enviar);

}

add_action('wp_ajax_editar_parte', 'EditarParte');