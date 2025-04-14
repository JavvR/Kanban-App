<?php

include('../../../../admin/conn.php');
session_start();

$rol_name = $_POST['rol_name'];
$permiso_id = $_POST['permiso_id'];
$rol_id = $_POST['rol_id'];

$rol_actual = $_SESSION['roles_id'];

$query = "UPDATE roles SET name_rol = '$rol_name', id_permiso = '$permiso_id' WHERE id_rol = '$rol_id'";

if($rol_actual <> $rol_id){

    if($conn->query($query)){
        echo "Operacion Exitosa!";
    }

}else { echo "No puedes editar tu rol actual!";}

$conn->close();