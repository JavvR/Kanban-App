<?php
    include('../admin/conn.php');
    session_start();

    $id_rol = $_SESSION['roles_id'];

    $sql_query = "SELECT id_permiso FROM roles WHERE id_rol = '$id_rol'";
    $result = $conn->query($sql_query);

    $row = $result->fetch_assoc();
    $_SESSION['id_permiso'] = $row['id_permiso'];

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <meta http-equiv="x-ua-compatible" content="ie=edge">
       <title>Dashboard</title>
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
                  <li class="nav-item active">
                      <a class="nav-link" href="#">Dashboard
                          <span class="sr-only">(current)</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="myaccount.php">Mi Cuenta
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

       <div class="container">

        <br>
        <h4 class="h4">Hola, <?php echo $_SESSION['name_colaborador']?></h4>           

        <?php if($row['id_permiso'] == 1){?>
            
            <div class="row justify-content-center mt-5" style="height:70vh;">
            <!-- Super Usuario -->
                <a href="superuser/empresa/crudempresa.php">
                    <div class="btn btn-primary" style="width: 15rem;">
                        <h5 class="h5">Empresas</h5>
                        <hr>
                        <img src="../../img/edificio.svg" alt="" style="width: 5rem; color: white;">
                    </div>
                </a>
                
                <a href="superuser/usuarios/crudusuarios.php">
                    <div class="btn btn-success" style="width: 15rem;">
                        <h5 class="h5">Usuarios</h5>
                        <hr>
                        <img src="../../img/circulo-de-usuario.svg" alt="" style="width: 5rem; color: white;">
                    </div>
                </a>

            </div>
        <?php } ?>

        <?php if($row['id_permiso'] == 2){?>
            <!-- Admistrador -->
            <div class="row justify-content-center mt-5" style="height:70vh;">
                
                <a href="admin/empresa/options.php">
                    <div class="btn btn-primary" style="width: 15rem;">
                        <h5 class="h5">Mi Empresa</h5>
                        <hr>
                        <img src="../../img/edificio.svg" alt="" style="width: 5rem; color: white;">
                    </div>
                </a>
                
                <a href="admin/usuarios/crudusuarios.php">
                    <div class="btn btn-success" style="width: 15rem;">
                        <h5 class="h5">Usuarios</h5>
                        <hr>
                        <img src="../../img/circulo-de-usuario.svg" alt="" style="width: 5rem; color: white;">
                    </div>
                </a>

            </div>

            
        <?php } ?>

        <?php if($row['id_permiso'] == 3 || $row['id_permiso'] == 4 || $row['id_permiso'] == 5 || $row['id_permiso'] == 6){?>
            <!-- Usuario Nivel 1 al 4 -->
            <div class="row justify-content-center mt-5" style="height:70vh;">
                
                <a href="user/kanban.php">
                    <div class="btn btn-primary" style="width: 15rem;">
                        <h5 class="h5">Mis Tareas</h5>
                        <hr>
                        <img src="../../img/tareas.svg" alt="" style="width: 5rem; color: white;">
                    </div>
                </a>

            </div>

        <?php } ?>

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