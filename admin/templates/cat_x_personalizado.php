<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
global $wpdb;


$orderby = 'name';
$order = 'asc';
$hide_empty = false ;
$cat_args = array(
    'orderby'    => $orderby,
    'order'      => $order,
    'hide_empty' => $hide_empty,
);
$product_categories = get_terms( 'product_cat', $cat_args );



EncontrarCategoriasPersonalizado($product_categories);




//  categorias asignadas a un envio
function EncontrarCategoriasPersonalizado($product_categories){

    $list_cat_asignadas = $_POST['lis_cat_asignadas_personalizado'];
    $lista_categorias_del_personalizado = array();
    $cant_cate_asig = count($list_cat_asignadas);

    foreach ( $product_categories as $key => $category ) {
        $category_id = $category->term_id;

        for ($i = 0; $i<= $cant_cate_asig; $i++){
            $cate_asignada = $list_cat_asignadas[$i];
            if($category_id == $cate_asignada){
                $lista_categorias_del_personalizado[] = $category->name;
            }
        }
    }
    echo json_encode($lista_categorias_del_personalizado);
//    return $lista_categorias_del_personalizado;
}
add_action('wp_ajax_encontrar_cat_personalizado', 'EncontrarCategoriasPersonalizado');


?>