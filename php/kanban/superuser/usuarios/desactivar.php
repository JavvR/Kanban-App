<?php

include('../../../admin/conn.php');
session_start();

$id = $_POST['id'];

if($_SESSION['id_colaborador'] <> $id){

$query = "UPDATE colaboradores SET status_id = 2 WHERE id_colaborador = '$id'";

if($conn->query($query)){
    echo "Operacion Exitosa!";
}

}else{ echo "No puedes desactivar tu usuario!"; }
$conn->close();