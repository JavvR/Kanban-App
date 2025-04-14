<?php

include("../../../admin/conn.php");
session_start();

$empresa = $_SESSION['empresa_id'];

$name = $_POST["name"];
$lastname = $_POST["lastname"];
$cedula = $_POST["cedula"];
$email = $_POST["email"];
$pass = $_POST["pass"];
$cpass = $_POST["cpass"];
$rol = $_POST["rol"];
$dpto = $_POST["dpto"];
$area = $_POST["area"];
$sede = $_POST["sede"];

if(isset($name) && isset($lastname) && isset($cedula) && isset($email) && isset($pass) && isset($cpass) && isset($rol) && isset($dpto) && isset($area) && isset($sede)){

if(strcmp($pass, $cpass)==0){
    $passhash = password_hash($pass, PASSWORD_DEFAULT);

    $query = "INSERT INTO colaboradores VALUES(NULL, '$cedula', '$name', '$lastname', '$email', '$passhash', '$area', '$dpto', '$empresa', '$sede', '$rol', 1)";
    if($conn->query($query)){
        echo "Operacion Exitosa!";
    }else{
        echo $conn->error;
    }
}else{
    echo "Passwords no coinciden";
}

}else{ echo "Llene todos los campos!";}

$conn->close();