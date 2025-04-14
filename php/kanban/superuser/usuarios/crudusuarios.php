<?php

    include('../../../admin/conn.php');
    session_start();

    $query = "SELECT * FROM colaboradores WHERE roles_id = 9";
    $result = $conn->query($query);

    $rows = $result->fetch_all();

    $query_rol = "SELECT * FROM roles WHERE id_permiso = 1";
    $roles = $conn->query($query_rol);
    $resultado_roles = $roles->fetch_all();

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
                       <li class="breadcrumb-item active">Usuarios</li>
                   </ol>
            </nav>

            <div class="d-flex justify-content-between mb-5">

            <a href="print.php" class="btn btn-default" target="_blank">Imprimir</a>

            <button class="btn btn-primary" data-toggle="modal" data-target="#modal_agregarSede">Agergar Usuario</button>

            </div>

            <!-- table -->
            <div>
             <table class="table" id="departamentos">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre y Apellido</th>
                        <th scope="col">Cedula</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php $num = 1; foreach ($rows as $row){           

                        foreach($resultado_roles as $rol){
                            if($rol[0] == $row[10]){
                                $row[10] = $rol[1];
                            }
                        }

                    ?>
                    <tr>
                        <th scope="row"><?php echo $num++; ?></th>
                        <td><?php echo $row[2]. " " . $row[3]  ;?></td>
                        <td><?php echo $row[1] ;?></td>
                        <td><?php echo $row[4] ;?></td>
                        <td><?php echo $row[10] ;?></td>
                        <td>
                            <?php if($row[11] ==1) {?>
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
        
        <!-- Modal editar roles -->
        <?php foreach($rows as $row) {?>
                <div class="modal fade" id="modal_<?php echo $row[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        <div class="row">
                            <div class="col">
                                <h6 class="h6">Datos Personales:</h6>
                                <div class="md-form">
                                   <input type="text" id="name<?php echo $row[0]; ?>" class="form-control" value="<?php echo $row[2]; ?>" required>
                                   <label for="name">Nombre</label>
                                </div>
                                <div class="md-form">
                                   <input type="text" id="lastname<?php echo $row[0]; ?>" class="form-control"value="<?php echo $row[3]; ?>"required>
                                   <label for="lastname">Apellido</label>
                                </div>
                            </div>
                            <div class="col">
                                <h6 class="h6">Datos Laborales:</h6>

                                <label for="aggrol">Rol:</label>
                                <select class="browser-default custom-select" name="rol" id="rol<?php echo $row[0]; ?>">
                                <?php foreach($resultado_roles as $rol){ ?>
                                    <option value="<?php echo $rol[0]; ?>"><?php echo $rol[1]; ?></option>
                                <?php } ?>
                                </select>

                                <label for="aggsede">Sede:</label>
                                <select class="browser-default custom-select" name="sede" id="sede<?php echo $row[0]; ?>">
                                <?php foreach($resultado_sede as $sede){ ?>
                                    <option value="<?php echo $sede[0]; ?>"><?php echo $sede[1]; ?></option>
                                <?php } ?>
                                </select>
                                
                                <label for="aggdpto">Departamento:</label>
                                <select class="browser-default custom-select" name="" id="dpto<?php echo $row[0]; ?>">
                                <?php foreach($resultado_dpto as $dpto){ ?>
                                    <option value="<?php echo $dpto[0]; ?>"><?php echo $dpto[1]; ?></option>
                                <?php } ?>
                                </select>

                                <label for="aggarea">Area:</label>
                                <select class="browser-default custom-select" name="aggarea" id="area<?php echo $row[0]; ?>"></select>

                                
                            </div>
                           </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light cerrarboton" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="editarbtn<?php echo $row[0]; ?>">Actualizar</button>
                        </div>
                    </div>
                </div>
                </div>
        <?php } ?>

        <!-- Modal agregar usuarios -->
        <div class="modal fade" id="modal_agregarSede" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                           <div class="row">
                            <div class="col">
                                <h6 class="h6">Datos Personales:</h6>
                                <div class="md-form">
                                   <input type="text" id="aggname" class="form-control" required>
                                   <label for="name">Nombre</label>
                                </div>
                                <div class="md-form">
                                   <input type="text" id="agglastname" class="form-control"required>
                                   <label for="lastname">Apellido</label>
                                </div>
                                <div class="md-form">
                                   <input type="text" id="aggcedula" class="form-control" required>
                                   <label for="cedula">Cedula</label>
                                </div>
                                <div class="md-form">
                                   <input type="email" id="aggemail" class="form-control" required>
                                   <label for="email">E-mail</label>
                                </div>
                                <div class="md-form">
                                   <input type="password" id="aggpassword" class="form-control" required>
                                   <label for="aggpassword">Password</label>
                                </div>
                                <div class="md-form">
                                   <input type="password" id="caggpassword" class="form-control" required>
                                   <label for="caggpassword">Confirmar Password</label>
                                </div>
                            </div>
                           </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="agregarboton">Agregar</button>
                        </div>
                    </div>
                </div>
        </div>
        
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
                            Una vez desactivado este usuario no podra iniciar sesion en el sistema!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-danger botoneliminar" id="" onclick="eliminar(<?php echo$row[0]; ?>)">Desactivar</button>
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
                            <button type="button" class="btn btn-success botoneliminar" id="" onclick="activar(<?php echo $row[0]; ?>)">Activar</button>
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

       <!-- Jquery for Crear -->
       <script type="text/javascript">
            $(function(){
                
                $('#agregarboton').click(function(){
                    var name = $('#aggname').val();
                    var lastname = $('#agglastname').val();
                    var cedula = $('#aggcedula').val();
                    var email = $('#aggemail').val();
                    var pass = $('#aggpassword').val();
                    var cpass = $('#caggpassword').val();

                    $.ajax({
                        type: "POST",
                        url: "agregarusuario.php",
                        data: {
                            name: name,
                            lastname: lastname,
                            cedula: cedula,
                            email: email,
                            pass: pass,
                            cpass: cpass,
                        },
                        success: function(data){
                            alert(data);
                            location.reload();
                        }

                    });

                });
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