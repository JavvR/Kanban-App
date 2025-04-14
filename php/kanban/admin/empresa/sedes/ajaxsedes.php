<?php

include('../../../../admin/conn.php');


if(isset($_POST['id_region'])){

    

    $id_region = $_POST['id_region'];
    $query_estados = "SELECT * FROM estado WHERE region_id = '$id_region'";
    $resultado = $conn->query($query_estados);
    $estados = $resultado->fetch_all();

    foreach($estados as $estado){
        $html = "<option value='".$estado[0]."'>".$estado[1]."</option>";
        echo $html;
    }
}

if(isset($_POST['id_estado'])){

    

    $id_estado = $_POST['id_estado'];
    $query_municipios = "SELECT * FROM municipio WHERE estado_id = '$id_estado'";
    $resultado = $conn->query($query_municipios);
    $municipios = $resultado->fetch_all();

    foreach($municipios as $municipio){
        $html = "<option value='".$municipio[0]."'>".$municipio[1]."</option>";
        echo $html;
    }
}

if(isset($_POST['id_municipio'])){

    

    $id_municipio = $_POST['id_municipio'];
    $query_parroquias = "SELECT * FROM parroquia WHERE municipio_id = '$id_municipio'";
    $resultado = $conn->query($query_parroquias);
    $parroquias = $resultado->fetch_all();

    foreach($parroquias as $parroquia){
        $html = "<option value='".$parroquia[0]."'>".$parroquia[1]."</option>";
        echo $html;
    }
}

$conn->close();
