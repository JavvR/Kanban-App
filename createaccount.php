<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <meta http-equiv="x-ua-compatible" content="ie=edge">
       <title>Crear Cuenta</title>
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
                            <a class="nav-link" href="#">Registro
                            <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Ya tienes Cuenta? Iniciar Sesion
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Collapsible content -->
            </nav>
            <!--/.Navbar-->

            <div class="container mt-5 d-flex flex-column justify-content-center align-items-center">
                <form action="php/operations/registernewuser.php" method="post">

                    <div class="animated fadeInLeft" id="step1">
                        <h3 class="h3">Paso 1</h3>
                        <h5 class="h5">Ingrese sus datos:</h5>

                        <div class="row">
                            <div class="col">
                            <div class="md-form">
                               <input type="text" id="name" class="form-control" name="name" required>
                               <label for="name">Nombre</label>
                            </div>
                            </div>

                            <div class="col">
                            <div class="md-form">
                               <input type="text" id="lastname" class="form-control" name="lastname" required>
                               <label for="lastname">Apellido</label>
                            </div>
                            </div>
                        </div>

                        <div class="md-form">
                           <input type="text" id="cedula" class="form-control" name="cedula" required>
                           <label for="cedula">Cedula de Identidad</label>
                        </div>

                        <div class="md-form">
                           <input type="text" id="email" class="form-control" name="email" required>
                           <label for="email">E-mail</label>
                        </div>

                        <div class="md-form">
                           <input type="password" id="password" class="form-control" name="password" required>
                           <label for="password">Password</label>
                        </div>

                        <div class="md-form">
                           <input type="password" id="c_password" class="form-control" name="c_password" required>
                           <label for="c_password">Confirmar Password</label>
                        </div>

                        <div class="d-flex justify-content-end">

                        <button class="btn btn-primary" id="nxt1">Siguiente</button>

                        </div>

                        
                    </div>

                    <div class="animated fadeInLeft" id="step2">
                        <h3 class="h3">Paso 2</h3>
                        <h5 class="h5">Mi Empresa:</h5>

                        <div class="md-form">
                           <input type="text" id="empresa" class="form-control" name="empresa" required>
                           <label for="empresa">Nombre de Empresa</label>
                        </div>

                        <div class="d-flex justify-content-between">
                        
                        <button class="btn btn-light" id="bck1">Volver</button>
                        <input type="submit" value="Registrarme" class="btn btn-primary">

                        </div>

                        
                    </div>

                </form>
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
            $(function(){
                $('#step2').toggle();
            });

            $('#nxt1').click(function(){
                $('#step1').toggle();
                $('#step2').toggle();
            });


            $('#bck1').click(function(){
                $('#step1').toggle();
                $('#step2').toggle();
            });


       </script>
   </body>
</html>