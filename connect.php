<?php

function conectar(){
    $serv="127.0.0.1";
    $usr="root";
    $pss="calle325";
    $bd="alejoVilchesGuia2";
    $c=mysqli_connect($serv, $usr, $pss, $bd);
    if(!$c){
        echo "Error de conexión";
    }
    return $c;
}