<?php
include('../admin/conn.php');
session_start();

$id_colaborador = $_SESSION['id_colaborador'];

$password_actual = $_POST['password_actual'];
$nueva_password  = $_POST['nueva_password'];
$confirm_password = $_POST['confirm_password'];
$password = $_POST['password'];

$password_cambiada = false;

if(password_verify($password_actual, $password)){
    if(strcmp($nueva_password, $confirm_password) == 0){

        $password_hash = password_hash($nueva_password, PASSWORD_DEFAULT);
        $update_password_query = "UPDATE colaboradores SET password_colaborador = '$password_hash' WHERE id_colaborador = '$id_colaborador'";
        if($conn->query($update_password_query)){
            $password_cambiada = true;
        };

    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <meta http-equiv="x-ua-compatible" content="ie=edge">
       <title>Cambiar Password</title>
       <!-- Font Awesome -->
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
       <!-- Google Fonts Roboto -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
       <!-- Bootstrap core CSS -->
       <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
       <!-- Material Design Bootstrap -->
       <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
       <!-- Your custom styles (optional) -->
       <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
       <!-- Start your project here-->
       <div style="height: 100vh">
           
        <!--Navbar-->
       <nav class="navbar navbar-expand-lg navbar-dark primary-color">
          <!-- Navbar brand -->
          <a class="navbar-brand" href="#">Kanban</a>
          <!-- Collapse button -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <!-- Collapsible content -->
          <div class="collapse navbar-collapse" id="basicExampleNav">
              <!-- Links -->
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="../kanban/dashboard.php">Dashboard
                      </a>
                  </li>
                  <li class="nav-item active">
                      <a class="nav-link" href="#">Mi Cuenta
                      <span class="sr-only">(current)</span>
                      </a>
                  </li>
              </ul>
              <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Cerrar Sesion
                    </a>
                </li>
              </ul>
          </div>
          <!-- Collapsible content -->
       </nav>
       <!--/.Navbar-->

        <div class="container d-flex flex-column justify-content-center align-items-center">
        <br>
        <?php if($password_cambiada == true){?>
            <img src="../../img/verificado.svg" alt="" style="width: 10rem;" class="animated zoomInUp mt-5">
            <br>

            <h3 class="h3 mt-5">Operacion Exitosa!</h3>
        <?php }else{?>

            <img src="../../img/error.svg" alt="" style="width: 10rem;" class="animated zoomInUp mt-5">
            <br>

            <h3 class="h3 mt-5">Operacion Fallida!</h3>
        <?php } ?>
            
            <a href="../kanban/dashboard.php" class="btn btn-light">Volver</a>

        </div>

       </div>
       <!-- End your project here-->
       
       
       
       <!-- jQuery -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <!-- Bootstrap tooltips -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
       <!-- Bootstrap core JavaScript -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
       <!-- MDB core JavaScript -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
       <!-- Your custom scripts (optional) -->
       <script type="text/javascript">
       </script>
   </body>
</html>