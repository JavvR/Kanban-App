<?php

include('../../../../admin/conn.php');
session_start();

$id = $_POST['id_eliminar'];

$query = "DELETE FROM tipo_tarea WHERE id_tipo_tarea = '$id'";

if($conn->query($query)){
    echo "Operacion Exitosa!";
}

$conn->close();