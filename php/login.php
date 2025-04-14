<?php
    include('admin/conn.php');
    session_start();

    if(!isset($_SESSION['id_colaborador'])){

        $user = $_POST['user'];
        $password = $_POST['password'];
        
        if(($user != "") && ($password != "" )){


        $sql_query = "SELECT * FROM colaboradores WHERE email_colaborador = '$user'";
        $result = $conn->query($sql_query);


        if($conn){
            $row = $result->fetch_assoc();
            if($result->num_rows == 1){
                if($row['status_id'] == 1){
                    if(password_verify($password, $row['password_colaborador'])){
                    
                        $_SESSION['id_colaborador']         = $row['id_colaborador'];
                        $_SESSION['name_colaborador']       = $row['name_colaborador'];
                        $_SESSION['lastname_colaborador']   = $row['lastname_colaborador'];
                        $_SESSION['area_id']                = $row['area_id'];
                        $_SESSION['departamento_id']        = $row['departamento_id'];
                        $_SESSION['empresa_id']             = $row['empresa_id'];
                        $_SESSION['sede_id']                = $row['sede_id'];
                        $_SESSION['roles_id']               = $row['roles_id'];
                        $_SESSION['status_id']              = $row['status_id'];

                        echo 1;

                    }else{
                        echo 2;
                    }
                }else{
                    echo 3;
                }
            }else{
                echo 4;
            }
        }

        }else{ echo 5; }
    
    }else{

        $user = $_SESSION['id_colaborador'];

        $sql_query = "SELECT * FROM colaboradores WHERE id_colaborador = '$user'";
        $result = $conn->query($sql_query);

        if($conn){
            $row = $result->fetch_assoc();
            if($result->num_rows == 1){
                
                    $_SESSION['id_colaborador']         = $row['id_colaborador'];
                    $_SESSION['name_colaborador']       = $row['name_colaborador'];
                    $_SESSION['lastname_colaborador']   = $row['lastname_colaborador'];
                    $_SESSION['area_id']                = $row['area_id'];
                    $_SESSION['departamento_id']        = $row['departamento_id'];
                    $_SESSION['empresa_id']             = $row['empresa_id'];
                    $_SESSION['sede_id']                = $row['sede_id'];
                    $_SESSION['roles_id']               = $row['roles_id'];
                    $_SESSION['status_id']              = $row['status_id'];

                    header('location: kanban/dashboard.php');
                    exit();

            }
        }
    }

    $conn->close();
?>