<?php

include('../../../admin/conn.php');
session_start();

$id = $_POST['id'];

if($_SESSION['empresa_id'] != $id){

$query = "UPDATE colaboradores SET status_id = 2 WHERE empresa_id = '$id'";
$query2 = "UPDATE empresa SET status_id = 2 WHERE id_empresa = '$id'";

if($conn->query($query)){
    if($conn->query($query2)){
        echo "Operacion Exitosa!";
    }
}

}else{ echo "No puedes desactivar la empresa donde estas registrado!";}

$conn->close();