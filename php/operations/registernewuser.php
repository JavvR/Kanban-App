<?php

include('../admin/conn.php');
session_start();

$colaboradorName = $_POST['name'];
$colaboradorLastName = $_POST['lastname'];
$colaboradorCedula = $_POST['cedula'];
$colaboradorEmail = $_POST['email'];
$colaboradorPass = $_POST['password'];
$colaboradorCPass = $_POST['c_password'];

$empresa = $_POST['empresa'];

if(isset($colaboradorName) && isset($colaboradorLastName) && isset($colaboradorCedula) &&   isset($colaboradorEmail) && isset($empresa) && isset($colaboradorPass) && isset($colaboradorCedula) && isset($empresa) && isset($colaboradorCPass)){

$sql_empresa_query = "INSERT INTO empresa VALUES (NULL, '$empresa', 1)";

if(strcmp($colaboradorPass, $colaboradorCPass)==0){
    $password_hash = password_hash($colaboradorPass, PASSWORD_DEFAULT);
    
    if($conn->query($sql_empresa_query)){
        $id_empresa = mysqli_insert_id($conn);

        $sql_query_rol = "INSERT INTO roles VALUES (NULL, 'Administrador', '$id_empresa', 2, 1)";
        
        if($conn->query($sql_query_rol)){
            $id_rol = mysqli_insert_id($conn);

            $validacion = "SELECT * FROM colaboradores WHERE email_colaborador = '$colaboradorEmail' OR cedula_colaborador = '$$colaboradorCedula'";
            $resultadoVal = $conn->query($validacion);

            if($resultadoVal->num_rows == 0){

                $sql_query_colaborador = "INSERT INTO colaboradores (id_colaborador, cedula_colaborador, name_colaborador, lastname_colaborador, email_colaborador, password_colaborador, empresa_id, roles_id, status_id) 
                                    VALUES (NULL, '$colaboradorCedula', '$colaboradorName', '$colaboradorLastName', '$colaboradorEmail', '$password_hash', '$id_empresa', '$id_rol', 1)";
                                    
                if($conn->query($sql_query_colaborador)){
                    $_SESSION['id_colaborador'] = mysqli_insert_id($conn);
                    header('location: ../login.php');
                }else{
                    echo $conn->error;
                }

            }else{echo 1;}
        }else{echo $conn->error;}
    }else{echo $conn->error;}

}else{echo "Los password no coinciden";}

}else{echo "<script>alert('Llene todos los datos')</script>"; header('location: ../login.php');}

$conn->close();

