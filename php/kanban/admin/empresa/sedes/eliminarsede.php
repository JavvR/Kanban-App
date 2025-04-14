<?php 

include('../../../../admin/conn.php');

$id_sede = $_POST['id_eliminar'];

$query = "DELETE FROM sede WHERE id_sede = '$id_sede'";

if($conn->query($query)){
    echo "Operacion Exitosa!";
}else{
    echo "Algo ha salido mal!";
}

$conn->close();