<?php

$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');
global $wpdb;


$usuario_autent = $user_login;
$id_producto = $_POST['id_prod'];
$hora_compra = date('dmY-his');

$ruta_carpeta = plugin_dir_path( __DIR__ ).'logos_temporal/'.$id_producto.$usuario_autent.$hora_compra;

$url_plugin = plugin_dir_url(__DIR__).'logos_temporal/'.$id_producto.$usuario_autent.$hora_compra;


$f1 = $_FILES['file1'];
$f2 = $_FILES['file2'];
$f3 = $_FILES['file3'];
$f4 = $_FILES['file4'];

$carpeta1 = false;
$carpeta2 = false;
$carpeta3 = false;
$carpeta4 = false;

$response = [
    'success' => true,
    'url_1' => '',
    'url_2' => '',
    'url_3' => '',
    'url_4' => ''
];

if($f1){
    if( ($f1["type"] == "image/jpeg") || ($f1["type"] == "image/png") ){
        $ruta_parte1 = $ruta_carpeta."/parte1";
        $url_plugin1 = $url_plugin."/parte1";
        if(!file_exists($ruta_parte1)){
            $carpeta1 = mkdir("$ruta_parte1", 0777, true);
            if($carpeta1 != false) {
                $ruta_parte1_final = $ruta_parte1."/".$f1['name'];
                $url_plugin1_final = $url_plugin1."/".$f1['name'];
                if (move_uploaded_file($f1["tmp_name"], $ruta_parte1_final)) {
                    $response['url_1'] = $url_plugin1_final;
                    $response_encode = json_encode($response);
                }else {
                    $response['success'] = false;
                    $response_encode = json_encode($response);
                }
            }else {
                $response['success'] = false;
                $response_encode = json_encode($response);
            }
        }else {
            $response['success'] = false;
            $response_encode = json_encode($response);
        }
    }
}
if($f2){
    if( ($f2["type"] == "image/jpeg") || ($f2["type"] == "image/png") ){
        $ruta_parte2 = $ruta_carpeta."/parte2";
        $url_plugin2 = $url_plugin."/parte2";
        if(!file_exists($ruta_parte2)){
            $carpeta2 = mkdir("$ruta_parte2", 0777, true);
            if($carpeta2 != false) {
                $ruta_parte2_final = $ruta_parte2."/".$f2['name'];
                $url_plugin2_final = $url_plugin2."/".$f2['name'];
                if (move_uploaded_file($f2["tmp_name"], $ruta_parte2_final)) {
                    $response['url_2'] = $url_plugin2_final;
                    $response_encode = json_encode($response);
                }
                else {
                    $response['success'] = false;
                    $response_encode = json_encode($response);
                }
            }else {
                $response['success'] = false;
                $response_encode = json_encode($response);
            }
        }else {
            $response['success'] = false;
            $response_encode = json_encode($response);
        }
    }
}
if($f3){
    if( ($f3["type"] == "image/jpeg") || ($f3["type"] == "image/png") ){
        $ruta_parte3 = $ruta_carpeta."/parte3";
        $url_plugin3 = $url_plugin."/parte3";
        if(!file_exists($ruta_parte3)){
            $carpeta3 = mkdir("$ruta_parte3", 0777, true);
            if($carpeta3 != false) {
                $ruta_parte3_final = $ruta_parte3."/".$f3['name'];
                $url_plugin3_final = $url_plugin3."/".$f3['name'];
                if (move_uploaded_file($f3["tmp_name"], $ruta_parte3_final)) {
                    $response['url_3'] = $url_plugin3_final;
                    $response_encode = json_encode($response);
                }else {
                    $response['success'] = false;
                    $response_encode = json_encode($response);
                }
            }else {
                $response['success'] = false;
                $response_encode = json_encode($response);
            }
        }else {
            $response['success'] = false;
            $response_encode = json_encode($response);
        }
    }
}
if($f4){
    if( ($f4["type"] == "image/jpeg") || ($f4["type"] == "image/png") ){
        $ruta_parte4 = $ruta_carpeta."/parte4";
        $url_plugin4 = $url_plugin."/parte4";
        if(!file_exists($ruta_parte4)){
            $carpeta4 = mkdir("$ruta_parte4", 0777, true);
            if($carpeta4 != false) {
                $ruta_parte4_final = $ruta_parte4."/".$f4['name'];
                $url_plugin4_final = $url_plugin4."/".$f4['name'];
                if (move_uploaded_file($f4["tmp_name"], $ruta_parte4_final)) {
                    $response_encode = json_encode($response);
                }
                else {
                    $response['success'] = false;
                    $response_encode = json_encode($response);
                }
            }
            else {
                $response['success'] = false;
                $response_encode = json_encode($response);
            }
        }else {
            $response['success'] = false;
            $response_encode = json_encode($response);
        }
    }
}

echo $response_encode;