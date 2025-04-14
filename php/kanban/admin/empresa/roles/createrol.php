<?php

include('../../../../admin/conn.php');
session_start();

$rol_name = $_POST['rol_name'];
$permiso_id = $_POST['permiso_id'];
$id_empresa  = $_SESSION['empresa_id'];

$query = "INSERT INTO roles VALUES (NULL, '$rol_name', '$id_empresa', '$permiso_id', 1)";

if($conn->query($query)){
    echo "Operacion Exitosa";
}else{ echo $conn->error; }

$conn ->close();