<?php

include('../../../../admin/conn.php');
session_start();

$id = $_POST['id'];
$name = $_POST['name'];

if(isset($id) && isset($name)){

$query = "UPDATE departamento SET name_departamento = '$name' WHERE id_departamento = '$id'";

if($conn->query($query)){
    echo "Operacion Exitosa!";
}
}else{echo "Llene todos los campos";}

$conn->close();