<?php

include('../../../../admin/conn.php');

$region_id = $_POST['id_region'];
$estado_id = $_POST['id_estado'];
$municipio_id = $_POST['id_municipio'];
$parroquia_id = $_POST['id_parroquia'];
$sede_id = $_POST['sede_id'];

if(isset($region_id) && isset($estado_id) && isset($municipio_id) && isset($parroquia_id) && isset($sede_id)){

$actualizar_sede = "UPDATE sede SET region_id = '$region_id', estado_id = '$estado_id', municipio_id = '$municipio_id', parroquia_id ='$parroquia_id' WHERE id_sede = '$sede_id'";
if($conn->query($actualizar_sede)){
    echo "Operacion Exitosa!";
}

}else{echo "Llene todos los campos";}



$conn->close();
