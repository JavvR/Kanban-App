<?php

include('../../..//../admin/conn.php');
session_start();

$id = $_POST['id'];
$area = $_POST['name'];
$dpto = $_POST['dpto'];

if(isset($id) && isset($area) && isset($dpto)){

$query = "UPDATE area SET name_area = '$area', departamento_id = '$dpto' WHERE id_area = '$id'";

if($conn->query($query)){
    echo "Operacion Exitosa!";
}

}else{echo "Llene todos los campos";}

$conn->close();