<?php

include('../../../../admin/conn.php');
session_start();

$id = $_POST['id'];
$name = $_POST['name'];

$query = "UPDATE tipo_tarea SET name_tipo_tarea = '$name' WHERE id_tipo_tarea = '$id'";

if($conn->query($query)){
    echo "Operacion Exitosa!";
}

$conn->close();