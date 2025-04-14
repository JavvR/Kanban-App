<?php
    include('../admin/conn.php');
    session_start();

    $id_colaborador = $_SESSION['id_colaborador'];

    $sql_query = "SELECT password_colaborador FROM colaboradores WHERE id_colaborador = '$id_colaborador'";
    $result = $conn->query($sql_query);

    $row = $result->fetch_assoc();

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <meta http-equiv="x-ua-compatible" content="ie=edge">
       <title>Mi Cuenta</title>
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
                            <a class="nav-link" href="dashboard.php">Dashboard
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="myaccount.php">Mi Cuenta
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

                <h3 class="h3">Cambiar Password</h3>

                <form action="../operations/changepassword.php" method="post" style="width: 30rem">
                    
                    <div class="md-form">
                    <input type="password" id="password-actual" class="form-control" name="password_actual">
                    <label for="password-actual">Password Actual</label>
                    </div>

                    <div class="md-form">
                    <input type="password" id="nueva-password" class="form-control" name="nueva_password">
                    <label for="nueva-password">Nueva Password</label>
                    </div>

                    <div class="md-form">
                    <input type="password" id="confirm-password" class="form-control" name="confirm_password">
                    <label for="confirm-password">Confirmar Nueva Password</label>
                    </div>

                    <input type="hidden" name="password" value="<?php echo $row['password_colaborador'] ?>">

                    <input type="submit" value="Cambiar Password" class="btn btn-primary">
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
       </script>
   </body>
</html>