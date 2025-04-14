<?php 

include('../../admin/conn.php');

$id = $_POST['id'];
$status = $_POST['status'];

if(isset($id) && isset($status)){

if($status == 2){
    $newstatus = 1;
}
if($status == 3){
    $newstatus = 2;
}

$sql = "UPDATE tareas SET estado_tarea_id = '$newstatus' WHERE id_tarea = '$id'";

if($conn->query($sql)){
    echo "Operacion Exitosa!";
}

}else{ echo "Llena todos los campos!";}