<?php 

include('../../../../admin/conn.php');
session_start();

$id_rol = $_POST['id_eliminar'];

if($_SESSION['roles_id'] != $id_rol){

    $query2 = "UPDATE colaboradores SET status_id = 2 WHERE roles_id = '$id_rol'";

    if($conn->query($query2)){

        $query = "UPDATE roles SET status_id = 2 WHERE id_rol = '$id_rol'";

        if($conn->query($query)){
            echo "Operacion Exitosa!";
        }else{
            echo $conn->error;
        }

    }

}else{ echo "No puedes eliminar tu rol actual!"; }

$conn->close();