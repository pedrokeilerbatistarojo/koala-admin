<?php

$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
global $wpdb;


EditarPersonalizado($wpdb);


//  editar personalizado
function EditarPersonalizado($wpdb)
{
    $id_personalizado = $_POST['id_personalizado'];

    //      de esta manera es mas rapido
    $query = "SELECT * FROM {$wpdb->prefix}koala_personalizado";
    $personalizados = $wpdb->get_results($query, ARRAY_A);


    foreach ($personalizados as $key => $value){
        $id = $value['PersonalizadoId'];
        if($id == $id_personalizado){
            $personalizado = $value;
            break;
        }
    }
    $cat_del_personalizado = json_decode($personalizado['PersonalizadoCategorias']);

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
    $result_array = array_diff($category_prod_id_list, $cat_del_personalizado);

    $cant_cat_select = count($result_array);

    foreach ($result_array as $cat){
        $cate_asignada = $cat;
        foreach ($product_categories as $key => $category ){
            if($cate_asignada == $category->term_id){
                $lista_categorias_de_personalizado[] = [
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
        'personalizado' => $personalizado,
        'categorias_select' => $lista_categorias_de_personalizado,
        'categorias_de_productos' => $product_categories
    ];


    echo json_encode($datos_a_enviar);
}

add_action('wp_ajax_editar_personalizado', 'EditarPersonalizado');