<?php

include('../../../../admin/conn.php');
session_start();

$dpto = $_POST['name'];
$empresa = $_SESSION['empresa_id'];

if(isset($dpto) && isset($empresa)){

$query = "INSERT INTO tipo_tarea VALUES (NULL, '$dpto', '$empresa')";

if($conn->query($query)){
    echo "Operacion Exitosa!";
}

}else{echo "Llene todos los campos";}

$conn->close();