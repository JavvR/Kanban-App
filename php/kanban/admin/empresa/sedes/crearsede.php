<?php

include('../../../../admin/conn.php');
session_start();

$name_sede = $_POST['nombre_sede'];
$empresa_id = $_SESSION['empresa_id'];
$parroquia_id = $_POST['id_parroquia'];
$municipio_id = $_POST['id_municipio'];
$estado_id = $_POST['id_estado'];
$region_id = $_POST['id_region'];

if(isset($name_sede) && isset($empresa_id) && isset($parroquia_id) && isset($municipio_id) && isset($estado_id) && isset($region_id)){

$query = "INSERT INTO sede VALUES (NULL, '$name_sede', '$empresa_id', '$parroquia_id', '$municipio_id', '$estado_id', '$region_id')";

if($conn->query($query)){
    echo "Sede Agregada Exitosamente";
}

}else{echo "Llene todos los campos";}

$conn->close();