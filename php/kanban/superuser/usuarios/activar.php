<?php

include('../../../admin/conn.php');

$id = $_POST['id'];

$query = "UPDATE colaboradores SET status_id = 1 WHERE id_colaborador = '$id'";

if($conn->query($query)){
    echo "Operacion Exitosa!";
}

$conn->close();