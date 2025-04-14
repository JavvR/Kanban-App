<?php

include('../../../../admin/conn.php');
session_start();

$id = $_POST['id_eliminar'];

$query = "DELETE FROM area WHERE id_area = '$id'";

if($conn->query($query)){
    echo "Operacion Exitosa!";
}

$conn->close();