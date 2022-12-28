<?php

$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
global $wpdb;


EditarEnvio($wpdb);




//      Editar envio
function EditarEnvio($wpdb){
    $id_envio = $_POST['id_envio'];

    //      de esta manera es mas rapido
    $query = "SELECT * FROM {$wpdb->prefix}koala_envios";
    $envios = $wpdb->get_results($query, ARRAY_A);

    foreach ($envios as $key => $value){
        $id = $value['KoalaEnviosId'];
        if($id == $id_envio){
            $envio = $value;
            break;
        }
    }
    $cat_del_envio = json_decode($envio['KoalaEnviosCategorias']);


    $orderby = 'name';
    $order = 'asc';
    $hide_empty = false ;
    $cat_args = array(
        'orderby'    => $orderby,
        'order'      => $order,
        'hide_empty' => $hide_empty,
    );

    $product_categories = get_terms( 'product_cat', $cat_args );

    foreach ( $product_categories as $key => $category ) {
        $category_prod_id_list[] = $category->term_id;
    }
    $result_array = array_diff($category_prod_id_list, $cat_del_envio);

    $cant_cat_select = count($result_array);

    foreach ($result_array as $cat){
        $cate_asignada = $cat;
        foreach ($product_categories as $key => $category ){
            if($cate_asignada == $category->term_id){
                $lista_categorias_del_envio[] = [
                    'id_cat' => $category->term_id,
                    'nomb_cat' => $category->name
                ];
            }
        }

        if($cant_cat_select == 0 ){
           break;
        }
        $cant_cat_select = $cant_cat_select -1;
    }


    $datos_a_enviar = [
        'envio' => $value,
        'categorias_select' => $lista_categorias_del_envio,
        'categorias_de_productos' => $product_categories
    ];


    echo json_encode($datos_a_enviar);

}
add_action('wp_ajax_editar_envio', 'EditarEnvio');







?>