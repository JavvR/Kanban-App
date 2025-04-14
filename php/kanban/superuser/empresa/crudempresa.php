<?php

    include('../../../admin/conn.php');
    session_start();

    $query = "SELECT * FROM empresa";
    $result = $conn->query($query);

    $rows = $result->fetch_all();

    $query_usuarios = "SELECT empresa_id FROM colaboradores";
    $usuarios = $conn->query($query_usuarios);
    $usrs = $usuarios->fetch_all();

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <meta http-equiv="x-ua-compatible" content="ie=edge">
       <title>Usuarios</title>
       <!-- Font Awesome -->
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
       <!-- Google Fonts Roboto -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
       <!-- Bootstrap core CSS -->
       <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
       <!-- Material Design Bootstrap -->
       <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
       <!-- Your custom styles (optional) -->
       <link rel="stylesheet" href="../../../../addons/datatables.min.css">
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
                       <li class="breadcrumb-item active">Empresas</li>
                   </ol>
            </nav>

            <div class="d-flex justify-content-start mb-5">
            <a href="print.php" class="btn btn-default" target="_blank">Imprimir</a>
            </div>

            <!-- table -->
            <div>
             <table class="table" id="departamentos">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Usuarios Registrados</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php $num = 1; foreach ($rows as $row){
                               

                        $num2 = 0;
                        
                        foreach($usrs as $usr){
                            if($row[0] == $usr[0]){
                                $num2++;
                            }
                        }

                    ?>
                    <tr>
                        <th scope="row"><?php echo $num++; ?></th>
                        <td><?php echo $row[1];?></td>
                        <td><?php echo $num2 ;?></td>
                        <td>
                            <?php if($row[2] ==1) {?>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_eliminar_<?php echo $row[0]; ?>">Desactivar</button>
                            <?php }else{?>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_activar_<?php echo $row[0]; ?>">Activar</button>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
             </table>
            </div>
        </div>


       </div>
       <!-- End your project here-->
        
        
        <!-- Modal Eliminar -->
        <?php foreach($rows as $row){ ?>
                <div class="modal fade" id="modal_eliminar_<?php echo $row[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Desactivar Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Esta seguro de desactivar este usuario?
                            Una vez desactivado esta empresa ninguno de sus usuarios podra iniciar sesion en el sistema!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-danger botoneliminar" id="" onclick="eliminar(<?php $row[0]; ?>)">Desactivar</button>
                        </div>
                    </div>
                </div>
                </div>
        <?php } ?>

        <!-- Modal Activar -->
        <?php foreach($rows as $row){ ?>
                <div class="modal fade" id="modal_activar_<?php echo $row[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Activar Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Esta seguro de activar este usuario?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-success botoneliminar" id="" onclick="activar(<?php echo base64_encode($row[0]); ?>)">Activar</button>
                        </div>
                    </div>
                </div>
                </div>
        <?php } ?>


       <!-- jQuery -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <!-- Bootstrap tooltips -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
       <!-- Bootstrap core JavaScript -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
       <!-- MDB core JavaScript -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
       <script type="text/javascript" src="../../../../addons/datatables.min.js"></script>
       <!-- Your custom scripts (optional) -->
    
       <!-- Jquery for Editar -->

       <script type="text/javascript">

            $(function(){
                $('#departamentos').DataTable();
                $('.dataTables_length').addClass('bs-select');
            });
        
       </script>

       <!-- Jquery for Desactivar -->
       <script type="text/javascript">
            function eliminar(id){
                $.ajax({
                    type: "POST",
                    url: "desactivar.php",
                    data: {
                        id: id
                    },
                    success: function(data){
                        alert(data);
                        location.reload();
                    }
                });
            }
       </script>

       <!-- Jquery for Activar-->
       <script type="text/javascript">
            function activar(id){
                $.ajax({
                    type: "POST",
                    url: "activar.php",
                    data: {
                        id: id
                    },
                    success: function(data){
                        alert(data);
                        location.reload();
                    }
                });
            }
       </script>
   </body>
</html>