<?php

require 'data.php';

if(isset($_GET['id'])){
    require 'data.php';
    $cliente = new Data();
    $id = intval($_GET['id']);
    $res = $cliente->delete($id);

    session_start();
    if($res){
        $_SESSION['mensaje'] = "Elminado correctamente";
    }else{
        $_SESSION['mensaje'] = "no existe cliente";
    }

    header(location:index.php);
}