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

if(isset($name) && isset($lastname) && isset($cedula) && isset($email) && isset($pass) && isset($cpass)){

if(strcmp($pass, $cpass)==0){
    $passhash = password_hash($pass, PASSWORD_DEFAULT);

    $query = "INSERT INTO colaboradores (id_colaborador, cedula_colaborador, name_colaborador, lastname_colaborador, email_colaborador, password_colaborador, empresa_id, roles_id, status_id) 
    VALUES(NULL, '$cedula', '$name', '$lastname', '$email', '$passhash', 5, 9, 1)";
    if($conn->query($query)){
        echo "Operacion Exitosa!";
    }else{
        echo $conn->error;
    }
}else{
    echo "Passwords no coinciden";
}

}else{echo "Llena todos los campos!";}

$conn->close();