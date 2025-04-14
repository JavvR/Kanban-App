<?php 

include('../../../../admin/conn.php');
session_start();

$empresa_id = $_SESSION['empresa_id'];

$area = $_POST['name'];
$dpto = $_POST['dpto'];

if(isset($area) && isset($dpto) && isset($empresa_id)){

$query = "INSERT INTO area VALUES (NULL, '$area', '$dpto', '$empresa_id')";

if($conn->query($query)){
    echo "Operacion Exitosa!";
}

}else{echo "Llene todos los campos!";}

$conn->close();