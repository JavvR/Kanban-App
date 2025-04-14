<?php

    include('../../../../admin/conn.php');
    session_start();

    $empresa_id = $_SESSION['empresa_id'];
    $query = "SELECT * FROM roles WHERE id_empresa = '$empresa_id'";
    $result = $conn->query($query);

    $rows = $result->fetch_all();

    $query_permiso = "SELECT * FROM permisos WHERE id_permiso > 1";
    $permisos = $conn->query($query_permiso);
    $resultado_permisos = $permisos->fetch_all();

    $query_empresa = "SELECT * FROM empresa";
    $empresas = $conn->query($query_empresa);
    $resultado_empresa = $empresas->fetch_all();

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <meta http-equiv="x-ua-compatible" content="ie=edge">
       <title>Roles</title>
       <!-- Font Awesome -->
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
       <!-- Google Fonts Roboto -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
       <!-- Bootstrap core CSS -->
       <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
       <!-- Material Design Bootstrap -->
       <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
       <!-- Your custom styles (optional) -->
       <link rel="stylesheet" href="../../../../../addons/datatables.min.css">
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
                            <a class="nav-link" href="../../../myaccount.php">Mi Cuenta
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../../../../logout.php">Cerrar Sesion
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
                       <li class="breadcrumb-item"><a href="../../../dashboard.php">Dashboard</a></li>
                       <li class="breadcrumb-item"><a href="../options.php">Mi Empresa</a></li>
                       <li class="breadcrumb-item active">Roles</li>
                   </ol>
            </nav>

            <div class="d-flex justify-content-between mb-5">

            <a href="print.php" class="btn btn-default" target="_blank">Imprimir</a>

            <button class="btn btn-primary" data-toggle="modal" data-target="#modal_agregarSede">Agergar Rol</button>

            </div>

            <!-- table -->
            <div>
             <table class="table" id="roles">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Permisos</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php $num = 1; foreach ($rows as $row){

                        $permisos_id = $row[3];
                        $empresa_id = $row[2];

                        foreach($resultado_permisos as $permiso){
                            if($permiso[0] == $row[3]){
                                $row[3] = $permiso[1];
                            }
                        }

                        foreach($resultado_empresa as $empresa){
                            if($empresa[0] == $row[2]){
                                $row[2] = $empresa[1];
                            }
                        }

                    ?>
                    <tr>
                        <th scope="row"><?php echo $num++; ?></th>
                        <td><?php echo $row[1] ;?></td>
                        <td><?php echo $row[2] ;?></td>
                        <td><?php echo $row[3] ;?></td>
                        <td>
                            <?php if($row[4] == 1) { ?>
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_<?php echo $row[0]; ?>">Editar</button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_eliminar_<?php echo $row[0]; ?>">Desactivar</button>
                            <?php }else{ ?>
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
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Rol</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <select class="browser-default custom-select" name="permiso" id="rol_id<?php echo $row[0]; ?>" hidden>
                                <option id="" value="<?php echo $row[0]; ?>"></option>
                            </select>

                            <div class="md-form">
                               <input type="text" id="rolname<?php echo $row[0]; ?>" class="form-control" value="<?php echo $row[1]; ?>" required>
                               <label for="rolname">Nombre del Rol</label>
                            </div>

                            <label for="region">Permisos:</label>
                            <select class="browser-default custom-select" name="permiso" id="permiso<?php echo $row[0]; ?>">
                            <?php foreach($resultado_permisos as $permiso){ ?>
                                <option value="<?php echo $permiso[0]; ?>"><?php echo $permiso[1]; ?></option>
                            <?php } ?>
                            </select>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light cerrarboton" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="editarbtn<?php echo $row[0]; ?>">Actualizar</button>
                        </div>
                    </div>
                </div>
                </div>
        <?php } ?>

        <!-- Modal agregar roles -->
        <div class="modal fade" id="modal_agregarSede" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Rol</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="md-form">
                               <input type="text" id="rolnameagregar" class="form-control" required>
                               <label for="rolname">Nombre del Rol</label>
                            </div>

                            <label for="permiso">Permisos:</label>
                            <select class="browser-default custom-select" name="permiso" id="agregarpermiso">
                            <?php foreach($resultado_permisos as $permiso){ ?>
                                <option value="<?php echo $permiso[0]; ?>"><?php echo $permiso[1]; ?></option>
                            <?php } ?>
                            </select>

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
                            <h5 class="modal-title text-white" id="exampleModalLabel">Desactivar Registro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Esta seguro de desactivar este registro? Al desactivar el rol todos los usuarios que lo posean seran desactivados!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-danger botoneliminar" id="" onclick="eliminar(<?php echo $row[0]; ?>)">Desactivar</button>
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
                            <h5 class="modal-title text-white" id="exampleModalLabel">Activar Rol</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Esta seguro de activar este rol?
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
       <script type="text/javascript" src="../../../../../addons/datatables.min.js"></script>
       <!-- Your custom scripts (optional) -->
    
       <!-- Jquery for Editar -->

       <script type="text/javascript">

            $(function(){
                $('#roles').DataTable();
                $('.dataTables_length').addClass('bs-select');
            });
        
       </script>

       <!-- Editar -->
       <?php foreach($rows as $row) { ?>
            <script type="text/javascript">
                $('#editarbtn<?php echo $row[0]; ?>').click(function(){
                    var rol_id = $('#rol_id<?php echo $row[0]; ?>').val();
                    var rol_name = $('#rolname<?php echo $row[0]; ?>').val();
                    var permiso_id = $('#permiso<?php echo $row[0]; ?>').val();

                    $.ajax({
                        type: "POST",
                        url: "updaterol.php",
                        data: {
                            rol_id: rol_id,
                            rol_name: rol_name,
                            permiso_id: permiso_id
                        },
                        success: function(data){
                            alert(data);
                            location.reload();
                        }
                    }); 
                });
                </script>
       <?php } ?>

       <!-- Jquery for Crear -->
       <script type="text/javascript">
            $(function(){
                $('#agregarboton').click(function(){
                    var rol_name = $('#rolnameagregar').val();
                    var permiso = $('#agregarpermiso').val();

                    console.log(rol_name);

                    $.ajax({
                        type: "POST",
                        url: "createrol.php",
                        data: {
                            rol_name: rol_name,
                            permiso_id: permiso
                        },
                        success: function(data){
                            alert(data);
                            location.reload();
                        }
                    });
                });
            });
       </script>

       <!-- Jquery for Eliminar -->
       <script type="text/javascript">
            function eliminar(id){
                $.ajax({
                    type: "POST",
                    url: "eliminarrol.php",
                    data: {
                        id_eliminar: id
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