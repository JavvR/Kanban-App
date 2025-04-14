<?php

    include('../../../../admin/conn.php');
    session_start();

    $empresa_id = $_SESSION['empresa_id'];
    $query = "SELECT * FROM sede WHERE empresa_id = '$empresa_id'";
    $result = $conn->query($query);

    $rows = $result->fetch_all();

    $query_regiones = "SELECT * FROM region";
    $regiones = $conn->query($query_regiones);
    $resultado_regiones = $regiones->fetch_all();

    $query_estado = "SELECT * FROM estado";
    $estados = $conn->query($query_estado);
    $resultado_estado = $estados->fetch_all();

    $query_municipio = "SELECT * FROM municipio";
    $municipios = $conn->query($query_municipio);
    $resultado_municipio = $municipios->fetch_all();

    $query_parroquia = "SELECT * FROM parroquia";
    $parroquias = $conn->query($query_parroquia);
    $resultado_parroquia = $parroquias->fetch_all();

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
       <title>Sedes</title>
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
                       <li class="breadcrumb-item active">Sedes</li>
                   </ol>
            </nav>

            <div class="d-flex justify-content-between mb-5">

            <a href="print.php" class="btn btn-default" target="_blank">Imprimir</a>

            <button class="btn btn-primary" id="agregarsedebtn" data-toggle="modal" data-target="#modal_agregarSede">Agergar Sede</button>

            </div>

            <!-- table -->
            <div>
             <table class="table" id="sedes">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Parroquia</th>
                        <th scope="col">Municipio</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Region</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $num = 1; foreach ($rows as $row){

                        $region_id = $row[6];
                        $estado_id = $row[5];
                        $municipio_id = $row[4];
                        $parroquia_id = $row[3];

                        foreach($resultado_regiones as $region){
                            if($region[0] == $row[6]){
                                $row[6] = $region[1];
                            }
                        }

                        foreach($resultado_estado as $estado){
                            if($estado[0] == $row[5]){
                                $row[5] = $estado[1];
                            }
                        }

                        foreach($resultado_municipio as $municipio){
                            if($municipio[0] == $row[4]){
                                $row[4] = $municipio[1];    
                            }
                        }

                        foreach($resultado_parroquia as $parroquia){
                            if($parroquia[0] == $row[3]){
                                $row[3] = $parroquia[1];
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
                        <td><?php echo $row[4] ;?></td>
                        <td><?php echo $row[5] ;?></td>
                        <td><?php echo $row[6] ;?></td>
                        <td>
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_<?php echo $row[0]; ?>">Editar</button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_eliminar_<?php echo $row[0]; ?>">Eliminar</button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
             </table>
            </div>
        </div>


       </div>
       <!-- End your project here-->
        
        <!-- Modal editar sedes -->
        <?php foreach($rows as $row) {?>
                <div class="modal fade" id="modal_<?php echo $row[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Sede</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <label for="region">Region:</label>
                            <select class="browser-default custom-select" name="region" id="region<?php echo $row[0]; ?>">
                            <?php foreach($resultado_regiones as $regiones) { ?>
                                <option value="<?php echo $regiones[0]; ?>"><?php echo $regiones[1]; ?></option>
                            <?php } ?>
                            </select>

                            <label for="estado" class="mt-2">Estado:</label>
                            <select class="browser-default custom-select" name="estado" id="estado<?php echo $row[0]; ?>"></select>
                            
                            <label for="municipio" class="mt-2">Municipio</label>
                            <select class="browser-default custom-select" name="municipio" id="municipio<?php echo $row[0]; ?>"></select>

                            <label for="parroquia" class="mt-2">Parroquia:</label>
                            <select class="browser-default custom-select" name="parroquia" id="parroquia<?php echo $row[0]; ?>"></select>

                            <select name="" id="id_sede<?php echo $row[0]; ?>" hidden>
                                <option value="<?php echo $row[0]; ?>"></option>
                            </select>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="updateboton<?php echo $row[0]; ?>">Actualizar</button>
                        </div>
                    </div>
                </div>
                </div>
        <?php } ?>

        <!-- Modal agregar sedes -->
        <div class="modal fade" id="modal_agregarSede" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Sede</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="md-form">
                               <input type="text" id="nombreSede" class="form-control" required>
                               <label for="nombreSede">Nombre de la Sede</label>
                            </div>

                            <label for="region">Region:</label>
                            <select class="browser-default custom-select" name="region" id="regionagregar">
                            <?php foreach($resultado_regiones as $regiones) { ?>
                                <option value="<?php echo $regiones[0]; ?>"><?php echo $regiones[1]; ?></option>
                            <?php } ?>
                            </select>

                            <label for="estado" class="mt-2">Estado:</label>
                            <select class="browser-default custom-select" name="estado" id="estadoagregar"></select>
                            
                            <label for="municipio" class="mt-2">Municipio</label>
                            <select class="browser-default custom-select" name="municipio" id="municipioagregar"></select>

                            <label for="parroquia" class="mt-2">Parroquia:</label>
                            <select class="browser-default custom-select" name="parroquia" id="parroquiaagregar"></select>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="agregarboton">Agregar</button>
                        </div>
                    </div>
                </div>
        </div>

        <!-- Button trigger modal -->
        
        <!-- Modal Eliminar -->
        <?php foreach($rows as $row){ ?>
                <div class="modal fade" id="modal_eliminar_<?php echo $row[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Eliminar Registro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Esta seguro de eliminar este registro?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger botoneliminar" id="" onclick="eliminar(<?php echo $row[0]; ?>)">Eliminar</button>
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
                //data table
                $('#sedes').DataTable();
                $('.dataTables_length').addClass('bs-select');
            });

       </script>

       <?php foreach($rows as $row) {?>
            <script type="text/javascript">

                $(function(){
                    var id_region = $('#region<?php echo $row[0]; ?>').val();
                    $.ajax({
                       type: "POST",
                       url: "ajaxsedes.php",
                       data: {
                            id_region: id_region
                       },
                       success: function(data){
                            $('#estado<?php echo $row[0]; ?>').html(data);
                       }
                    });

                //form options for update
                $('#region<?php echo $row[0]; ?>').change(function(){
                    var id_region = $('#region<?php echo $row[0]; ?>').val();
                    $.ajax({
                       type: "POST",
                       url: "ajaxsedes.php",
                       data: {
                            id_region: id_region
                       },
                       success: function(data){
                            $('#estado<?php echo $row[0]; ?>').html(data);
                       }
                    });
                });

                $('#estado<?php echo $row[0]; ?>').change(function(){
                    var id_estado = $('#estado<?php echo $row[0]; ?>').val();
                    $.ajax({
                       type: "POST",
                       url: "ajaxsedes.php",
                       data: {
                            id_estado: id_estado
                       },
                       success: function(data){
                            $('#municipio<?php echo $row[0]; ?>').html(data);
                       }
                    });
                });

                $('#municipio<?php echo $row[0]; ?>').change(function(){
                    var id_municipio = $('#municipio<?php echo $row[0]; ?>').val();
                    $.ajax({
                       type: "POST",
                       url: "ajaxsedes.php",
                       data: {
                            id_municipio: id_municipio
                       },
                       success: function(data){
                            $('#parroquia<?php echo $row[0]; ?>').html(data);
                       }
                    });
                });

                $('#updateboton<?php echo $row[0]; ?>').click(function(){
                    var id_region = $('#region<?php echo $row[0]; ?>').val();
                    var id_estado = $('#estado<?php echo $row[0]; ?>').val();
                    var id_municipio = $('#municipio<?php echo $row[0]; ?>').val();
                    var id_parroquia = $('#parroquia<?php echo $row[0]; ?>').val();
                    var sede_id = $('#id_sede<?php echo $row[0]; ?>').val();

                        $.ajax({
                            type: "POST",
                            url: "editarsede.php",
                            data: {
                                id_region: id_region,
                                id_estado: id_estado,
                                id_municipio: id_municipio,
                                id_parroquia: id_parroquia,
                                sede_id: sede_id
                            },
                            success: function(data){
                                alert(data);
                                location.reload();
                            }
                        });
                    });
                });

            </script>
        <?php } ?>

       <!-- Jquery for Crear -->
       <script type="text/javascript">
        $(function(){
                var id_region = $('#regionagregar').val();
                    $.ajax({
                       type: "POST",
                       url: "ajaxsedes.php",
                       data: {
                            id_region: id_region
                       },
                       success: function(data){
                            $('#estadoagregar').html(data);
                       }
                    });

                $('#regionagregar').change(function(){
                    var id_region = $('#regionagregar').val();
                    $.ajax({
                       type: "POST",
                       url: "ajaxsedes.php",
                       data: {
                            id_region: id_region
                       },
                       success: function(data){
                            $('#estadoagregar').html(data);
                       }
                    });
                });

                $('#estadoagregar').change(function(){
                    var id_estado = $('#estadoagregar').val();
                    $.ajax({
                       type: "POST",
                       url: "ajaxsedes.php",
                       data: {
                            id_estado: id_estado
                       },
                       success: function(data){
                            $('#municipioagregar').html(data);
                       }
                    });
                });

                $('#municipioagregar').change(function(){
                    var id_municipio = $('#municipioagregar').val();
                    $.ajax({
                       type: "POST",
                       url: "ajaxsedes.php",
                       data: {
                            id_municipio: id_municipio
                       },
                       success: function(data){
                            $('#parroquiaagregar').html(data);
                       }
                    });
                });

                $('#agregarboton').click(function(){
                    var nombre_sede = $('#nombreSede').val();
                    var id_region = $('#regionagregar').val();
                    var id_estado = $('#estadoagregar').val();
                    var id_municipio = $('#municipioagregar').val();
                    var id_parroquia = $('#parroquiaagregar').val();

                    $.ajax({
                        type: "POST",
                        url: "crearsede.php",
                        data: {
                            nombre_sede: nombre_sede,
                            id_region: id_region,
                            id_estado: id_estado,
                            id_municipio: id_municipio,
                            id_parroquia: id_parroquia
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
                    url: "eliminarsede.php",
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
   </body>
</html>