<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <meta http-equiv="x-ua-compatible" content="ie=edge">
       <title>Mi Empresa - Opciones</title>
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
                            <a class="nav-link" href="../../dashboard.php">Dashboard
                            <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../myaccount.php">Mi Cuenta
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../../../logout.php">Cerrar Sesion
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Collapsible content -->
            </nav>
            <!--/.Navbar-->

            <div class="container mt-1">
                <!-- breadcrumb -->
                <nav aria-label="breadcrumb">
                   <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="../../dashboard.php">Dashboard</a></li>
                       <li class="breadcrumb-item active">Mi Empresa</li>
                   </ol>
                </nav>

                <!-- Options -->

                <div class="mt-5" style="height:70vh;">
                
                <div class="row justify-content-center">

                

                <a href="sedes/crudsedes.php">
                    <div class="btn btn-indigo" style="width: 15rem;">
                        <h5 class="h5">Sedes</h5>
                        <hr>
                        <img src="../../../../img/mapa.svg" alt="" style="width: 5rem; color: white;">
                    </div>
                </a>
                
                <a href="departamentos/cruddepartamentos.php">
                    <div class="btn btn-default" style="width: 15rem;">
                        <h5 class="h5">Departamentos</h5>
                        <hr>
                        <img src="../../../../img/departamento.svg" alt="" style="width: 5rem; color: white;">
                    </div>
                </a>

                <a href="areas/crudareas.php">
                    <div class="btn btn-info" style="width: 15rem;">
                        <h5 class="h5">Areas</h5>
                        <hr>
                        <img src="../../../../img/area.svg" alt="" style="width: 5rem; color: white;">
                    </div>
                </a>

                <a href="roles/crudroles.php">
                    <div class="btn btn-light-blue" style="width: 15rem;">
                        <h5 class="h5">Roles</h5>
                        <hr>
                        <img src="../../../../img/circulo-de-usuario.svg" alt="" style="width: 5rem; color: white;">
                    </div>
                </a>

                <a href="tipos_tareas/crudtt.php">
                    <div class="btn btn-blue-grey" style="width: 15rem;">
                        <h5 class="h5">Tipos de Tarea</h5>
                        <hr>
                        <img src="../../../../img/tareas.svg" alt="" style="width: 5rem; color: white;">
                    </div>
                </a>

                </div>

            </div>
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