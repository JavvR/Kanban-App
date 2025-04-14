<?php 

include('../../admin/conn.php');
session_start();

$user = $_SESSION['id_colaborador'];

$id = $_POST['id'];
$status = $_POST['status'];
$fecha = $_POST['fecha'];

if(isset($id) && isset($status)){

if($status == 1){
    $newstatus = 2;
    $sql = "UPDATE tareas SET estado_tarea_id = '$newstatus', f_inic = '$fecha', id_colaborador = '$user' WHERE id_tarea = '$id'";
}
if($status == 2){
    $newstatus = 3;
    $sql = "UPDATE tareas SET estado_tarea_id = '$newstatus', f_fin = '$fecha' WHERE id_tarea = '$id'";
}



if($conn->query($sql)){
    echo "Operacion Exitosa!";
}

}else{ echo "Llena todos los campos!";}