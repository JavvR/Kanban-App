<?php

include('../../../../admin/conn.php');

$id = $_POST['id'];

$query = "UPDATE roles SET status_id = 1 WHERE id_rol = '$id'";

if($conn->query($query)){
    echo "Operacion Exitosa!";
}

$conn->close();