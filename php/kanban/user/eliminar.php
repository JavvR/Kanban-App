<?php

include('../../admin/conn.php');

$id = $_POST["id"];



$sql = "DELETE FROM tareas WHERE id_tarea = '$id'";

if($conn->query($sql)){
    echo "Operacion Exitosa!";
}