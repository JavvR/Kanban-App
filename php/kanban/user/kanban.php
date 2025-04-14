<?php

    include('../../admin/conn.php');
    session_start();

    $empresa_id = $_SESSION['empresa_id'];
    $sarea = $_SESSION['area_id'];
    $departamento = $_SESSION['departamento_id'];
    $sede = $_SESSION['sede_id'];
    $permiso = $_SESSION['id_permiso'];

    $user = $_SESSION['id_colaborador'];

    if($permiso == 3){
        $query = "SELECT * FROM tareas WHERE empresa_id = '$empresa_id' AND area_id = '$sarea' AND departamento_id ='$departamento' AND sede_id = '$sede' ORDER BY f_f_estimado";
    }
    if($permiso == 4){
        $query = "SELECT * FROM tareas WHERE empresa_id = '$empresa_id'  AND departamento_id ='$departamento' AND sede_id = '$sede'  ORDER BY f_f_estimado" ;
    }
    if($permiso == 5){  
        $query = "SELECT * FROM tareas WHERE empresa_id = '$empresa_id' AND sede_id = '$sede' ORDER BY f_f_estimado ";
    }
    if($permiso == 6){
        $query = "SELECT * FROM tareas WHERE empresa_id = '$empresa_id' ORDER BY f_f_estimado";
    }
    $result = $conn->query($query);
    $rows = $result->fetch_all();

    $qTipoTarea = "SELECT * FROM tipo_tarea WHERE empresa_id = '$empresa_id'";
    $tipo_tarea = $conn->query($qTipoTarea);
    $ttareas = $tipo_tarea->fetch_all();

    $qdpto = "SELECT * FROM departamento WHERE empresa_id = '$empresa_id'";
    $rdpto = $conn->query($qdpto);
    $arraydptos = $rdpto->fetch_all();

    $qsede = "SELECT * FROM sede WHERE empresa_id = '$empresa_id'";
    $rsede = $conn->query($qsede);
    $sedes = $rsede->fetch_all();

    $qArea = "SELECT * FROM area WHERE empresa_id = '$empresa_id'";
    $area = $conn->query($qArea);
    $areas = $area->fetch_all();

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <meta http-equiv="x-ua-compatible" content="ie=edge">
       <title>Mis Tareas</title>
       <!-- Font Awesome -->
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
       <!-- Google Fonts Roboto -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
       <!-- Bootstrap core CSS -->
       <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
       <!-- Material Design Bootstrap -->
       <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
       <!-- Your custom styles (optional) -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
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
                            <a class="nav-link" href="../dashboard.php">Dashboard
                            <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../myaccount.php">Mi Cuenta
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../../logout.php">Cerrar Sesion
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
                       <li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
                       <li class="breadcrumb-item active">Mis Tareas</li>
                   </ol>
            </nav>

            <div class="d-flex justify-content-between aling-items-center mb-5">
            <a href="print.php" class="btn btn-default" target="_blank">Imprimir</a>
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal_agregarSede">Agergar Tarea</button>

            </div>

            <!-- kanban -->
            <div>
                <div class="row">
                    <div class="col" style="height: 70vh; overflow: auto;">
                        <h5 class="h5">Pendiente</h5>
                        <?php foreach($rows as $row) {
                            
                            foreach($ttareas as $ttarea){
                                if($ttarea[0] == $row[10]){
                                    $row[10] = $ttarea[1];
                                }
                            }

                            foreach($arraydptos as $dpto){
                                if($dpto[0] == $row[8]){
                                    $row[8] = $dpto[1];
                                }
                            }

                            foreach($sedes as $sede){
                                if($sede[0] == $row[12]){
                                    $row[12] = $sede[1];
                                }
                            }

                            foreach($areas as $area){
                                if($area[0] == $row[7]){
                                    $row[7] = $area[1];
                                }
                            }



                            if($row[11] == 1 ){
                            
                            ?>


                            <div class="card">
                               <div class="card-body">
                                   <h6 class="card-title d-flex justify-content-between"><a><?php echo $row[10]  ?></a><a href="" onclick="eliminar(<?php echo  $row[0] ;  ?>)"><img src="../../../img/x.svg" alt="" style="width: 2rem;"></a></h6>
                                   <p class="card-text"><?php echo $row[1];  ?></p>
                                   <p class="card-text">Sede: <?php echo $row[12];  ?></p>
                                   <p class="card-text">Departamento: <?php echo $row[8];  ?></p>
                                   <p class="card-text">Area: <?php echo $row[7];  ?></p>
                                   <p class="card-text">Asignada el: <?php echo $row[2] ?></p>
                                   <p class="card-text">Fin estimado el: <?php echo $row[4] ?></p>
                                   <div class="d-flex justify-content-between">
                                   <a href="#" class="btn btn-light" data-toggle="modal" data-target="#modal_<?php echo $row[0]; ?>">Editar</a>
                                   <a href="#" class="btn btn-primary" onclick="iniciar(<?php echo $row[0]; ?>, <?php echo $row[11]; ?>)">Iiniciar</a>
                                   </div>
                               </div>
                            </div>

                            <br>

                        <?php }} ?>
                    </div>
                    <div class="col" style="height: 70vh; overflow: auto;">
                    <h5 class="h5">En Curso</h5>
                    <?php foreach($rows as $row) {
                            
                            foreach($ttareas as $ttarea){
                                if($ttarea[0] == $row[10]){
                                    $row[10] = $ttarea[1];
                                }
                            }

                            foreach($arraydptos as $dpto){
                                if($dpto[0] == $row[8]){
                                    $row[8] = $dpto[1];
                                }
                            }

                            foreach($sedes as $sede){
                                if($sede[0] == $row[12]){
                                    $row[12] = $sede[1];
                                }
                            }

                            foreach($areas as $area){
                                if($area[0] == $row[7]){
                                    $row[7] = $area[1];
                                }
                            }

                            if($row[11] == 2 && $row[6] == $user){
                            
                            ?>


                            <div class="card">
                               <div class="card-body">
                                   <h6 class="card-title"><a><?php echo $row[10]  ?></a></h6>
                                   <p class="card-text"><?php echo $row[1];  ?></p>
                                   <p class="card-text">Sede: <?php echo $row[12];  ?></p>
                                   <p class="card-text">Departamento: <?php echo $row[8];  ?></p>
                                   <p class="card-text">Area: <?php echo $row[7];  ?></p>
                                   <p class="card-text">Iniciada el: <?php echo $row[3] ?></p>
                                   <p class="card-text">Fin estimado el: <?php echo $row[4] ?></p>
                                   <div class="d-flex justify-content-between">
                                   <a href="#" class="btn btn-light" onclick="regresar(<?php echo $row[0]; ?>, <?php echo $row[11]; ?>)">Regresar</a>
                                   <a href="#" class="btn btn-primary" onclick="iniciar(<?php echo $row[0]; ?>, <?php echo $row[11]; ?>)">Finalizar</a>
                                   </div>
                               </div>
                            </div>

                            <br>

                        <?php }} ?>
                    </div>
                    <div class="col">
                    <h5 class="h5">Finalizado</h5>

                    <?php foreach($rows as $row) {
                            
                            foreach($ttareas as $ttarea){
                                if($ttarea[0] == $row[10]){
                                    $row[10] = $ttarea[1];
                                }
                            }

                            foreach($arraydptos as $dpto){
                                if($dptos[0] == $row[8]){
                                    $row[8] = $dpto[1];
                                }
                            }

                            foreach($sedes as $sede){
                                if($sede[0] == $row[12]){
                                    $row[12] = $sede[1];
                                }
                            }

                            foreach($areas as $area){
                                if($area[0] == $row[7]){
                                    $row[7] = $area[1];
                                }
                            }

                            if(($row[11] == 3 )&& ($row[6] == $user)){
                            
                            ?>


                            <div class="card">
                               <div class="card-body">
                                   <h6 class="card-title"><a><?php echo $row[10]  ?></a></h6>
                                   <p class="card-text"><?php echo $row[1];  ?></p>
                                   <p class="card-text">Sede: <?php echo $row[12];  ?></p>
                                   <p class="card-text">Departamento: <?php echo $row[8];  ?></p>
                                   <p class="card-text">Area: <?php echo $row[7];  ?></p>
                                   <p class="card-text">Finalizada el: <?php echo $row[5] ?></p>
                               </div>
                            </div>

                            <br>

                        <?php }} ?>
                    </div>
                </div>
            </div>

        </div>


       </div>
       <!-- End your project here-->
        
        <!-- Modal editar tarea -->
        <?php foreach($rows as $row) {?>
                <div class="modal fade" id="modal_<?php echo $row[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Tarea</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        <div class="md-form">
                           <textarea name="" id="desctarea<?php echo $row[0]; ?>" class="md-textarea form-control"></textarea>
                           <label for="desctarea">Descripcion:</label>
                        </div>

                        <label for="region">Tipo de Tarea:</label>
                            <select class="browser-default custom-select" name="region" id="tipoTarea<?php echo $row[0]; ?>">
                            <?php foreach($ttareas as $ttarea) { ?>
                                <option value="<?php echo $ttarea[0]; ?>"><?php echo $ttarea[1]; ?></option>
                            <?php } ?>
                        </select>

                        <?php if($permiso == 4) {?>
                            <label for="region">Area:</label>
                            <select class="browser-default custom-select" name="region" id="area<?php echo $row[0]; ?>">
                                <?php foreach($areas as $area) { ?>
                                    <option value="<?php echo $area[0]; ?>"><?php echo $area[1]; ?></option>
                                <?php } ?>
                            </select>
                        <?php } ?>

                        <?php if($permiso == 5) {?>

                            <label for="region">Departamento:</label>
                            <select class="browser-default custom-select" name="region" id="dpto<?php echo $row[0]; ?>">
                                <?php foreach($dptos as $dpto) { ?>
                                    <option value="<?php echo $dpto[0]; ?>"><?php echo $dpto[1]; ?></option>
                                <?php } ?>
                            </select>

                            <label for="region">Area:</label>
                            <select class="browser-default custom-select" name="region" id="area<?php echo $row[0]; ?>">
                            </select>
    
                        <?php } ?>

                        <?php if($permiso == 6) {?>

                            <label for="region">Sede:</label>
                            <select class="browser-default custom-select" name="region" id="sede<?php echo $row[0]; ?>">
                                <?php foreach($sedes as $sede) { ?>
                                    <option value="<?php echo $sede[0]; ?>"><?php echo $sede[1]; ?></option>
                                <?php } ?>
                            </select>


                            <label for="region">Departamento:</label>
                            <select class="browser-default custom-select" name="region" id="dpto<?php echo $row[0]; ?>">
                                <?php foreach($dptos as $dpto) { ?>
                                    <option value="<?php echo $dpto[0]; ?>"><?php echo $dpto[1]; ?></option>
                                <?php } ?>
                            </select>


                            <label for="region">Area:</label>
                            <select class="browser-default custom-select" name="region" id="area<?php echo $row[0]; ?>">
                            </select>
                            
                        <?php } ?>

                        <div id="date" class="md-form md-outline input-with-post-icon datepicker" inline="true" id="datepicker">
                            <input placeholder="Final estimado:" type="text" id="datei<?php echo $row[0]; ?>" class="form-control" >
                            <label for="datei">Fecha:</label>
                            <i class="fas fa-calendar input-prefix"></i>
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

        <!-- Modal agregar tarea -->
        <div class="modal fade" id="modal_agregarSede" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Tarea</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        <div class="md-form">
                           <textarea name="" id="desctarea" class="md-textarea form-control"></textarea>
                           <label for="desctarea">Descripcion:</label>
                        </div>

                        <label for="region">Tipo de Tarea:</label>
                            <select class="browser-default custom-select" name="region" id="tipoTarea">
                            <?php foreach($ttareas as $ttarea) { ?>
                                <option value="<?php echo $ttarea[0]; ?>"><?php echo $ttarea[1]; ?></option>
                            <?php } ?>
                        </select>

                        <?php if($permiso == 4) {?>
                            <label for="region">Area:</label>
                            <select class="browser-default custom-select" name="region" id="area">
                                <?php foreach($areas as $area) { ?>
                                    <option value="<?php echo $area[0]; ?>"><?php echo $area[1]; ?></option>
                                <?php } ?>
                            </select>
                        <?php } ?>

                        <?php if($permiso == 5) {?>

                            <label for="region">Departamento:</label>
                            <select class="browser-default custom-select" name="region" id="dpto">
                                <?php foreach($dptos as $dpto) { ?>
                                    <option value="<?php echo $dpto[0]; ?>"><?php echo $dpto[1]; ?></option>
                                <?php } ?>
                            </select>

                            <label for="region">Area:</label>
                            <select class="browser-default custom-select" name="region" id="area">
                            </select>
    
                        <?php } ?>

                        <?php if($permiso == 6) {?>

                            <label for="region">Sede:</label>
                            <select class="browser-default custom-select" name="region" id="sede">
                                <?php foreach($sedes as $sede) { ?>
                                    <option value="<?php echo $sede[0]; ?>"><?php echo $sede[1]; ?></option>
                                <?php } ?>
                            </select>


                            <label for="region">Departamento:</label>
                            <select class="browser-default custom-select" name="region" id="dpto">
                                <?php foreach($dptos as $dpto) { ?>
                                    <option value="<?php echo $dpto[0]; ?>"><?php echo $dpto[1]; ?></option>
                                <?php } ?>
                            </select>


                            <label for="region">Area:</label>
                            <select class="browser-default custom-select" name="region" id="area">
                            </select>
                            
                        <?php } ?>

                        <div id="date" class="md-form md-outline input-with-post-icon datepicker" inline="true" id="datepicker">
                            <input placeholder="Final estimado:" type="text" id="datei" class="form-control" >
                            <label for="datei">Fecha:</label>
                            <i class="fas fa-calendar input-prefix"></i>
                        </div>

                        

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="agregarboton">Agregar</button>
                        </div>
                    </div>
                </div>
        </div>
        
       <!-- jQuery -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <!-- Bootstrap tooltips -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
       <!-- Bootstrap core JavaScript -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
       <!-- MDB core JavaScript -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
       <!-- Your custom scripts (optional) -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    
       <!-- Jquery  -->

       <!-- ajax form -->

       <script type="text/javascript">
            

            $(function(){
                // Data Picker Initialization

                $('#datei').datepicker({
                    inline: true,
                    format: "yyyy-mm-dd",
                    formatSubmit: "yyyy-mm-yy"
                });

                    
                var dpto = $('#dpto').val();

                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: {
                        dpto: dpto
                    },
                    success: function(data){
                        $('#area').html(data);
                    }
                });

                $('#dpto').change(function(){
                    var dpto = $('#dpto').val();

                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: {
                        dpto: dpto
                    },
                    success: function(data){
                        $('#area').html(data);
                    }
                });

                });

            });

            
       </script>


       <!-- Editar -->
       <?php foreach($rows as $row) { ?>
            <script type="text/javascript">

                $(function(){

                $('#datei<?php echo $row[0]; ?>').datepicker({
                    inline: true,
                    format: "yyyy-mm-dd",
                    formatSubmit: "yyyy-mm-yy"
                });

                var dpto = $('#dpto<?php echo $row[0]; ?>').val();

                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: {
                        dpto: dpto
                    },
                    success: function(data){
                        $('#area<?php echo $row[0]; ?>').html(data);
                    }
                });

                $('#dpto<?php echo $row[0]; ?>').change(function(){
                    var dpto = $('#dpto<?php echo $row[0]; ?>').val();

                    $.ajax({
                        type: "POST",
                        url: "ajax.php",
                        data: {
                            dpto: dpto
                        },
                        success: function(data){
                            $('#area<?php echo $row[0]; ?>').html(data);
                        }
                    });

                });
                
                $('#editarbtn<?php echo $row[0]; ?>').click(function(){

                    var id = <?php echo $row[0]; ?>;
                    var desc = $('#desctarea<?php echo $row[0]; ?>').val();
                    var ttarea = $('#tipoTarea<?php echo $row[0]; ?>').val();
                    var sede = $('#sede<?php echo $row[0]; ?>').val();
                    var dpto = $('#dpto<?php echo $row[0]; ?>').val();
                    var area = $('#area<?php echo $row[0]; ?>').val();

                    var permiso = <?php echo $permiso; ?>;
                    var fin = $('#datei<?php echo $row[0]; ?>').val();

                    $.ajax({
                        type: "POST",
                        url: "editartarea.php",
                        data: {
                            id: id,
                            desc: desc,
                            ttarea: ttarea,
                            sede: sede,
                            dpto: dpto,
                            area: area,
                            fin: fin,
                            permiso: permiso
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
                
                $('#agregarboton').click(function(){
                    var desc = $('#desctarea').val();
                    var ttarea = $('#tipoTarea').val();
                    var sede = $('#sede').val();
                    var dpto = $('#dpto').val();
                    var area = $('#area').val();

                    var permiso = <?php echo $permiso; ?>
                    
                    var dasig = new Date();
                    var asig  = dasig.toISOString().split('T')[0];

                    var fin = $('#datei').val();

                    $.ajax({
                        type: "POST",
                        url: "agregartarea.php",
                        data: {
                            desc: desc,
                            ttarea: ttarea,
                            sede: sede,
                            dpto: dpto,
                            area: area,
                            asig: asig,
                            fin: fin,
                            permiso: permiso
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
                    url: "eliminar.php",
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

       <!-- Jquery for regresar -->
       <script type="text/javascript">
            function regresar(id, status){
                $.ajax({
                    type: "POST",
                    url: "regresartarea.php",
                    data: {
                        id: id,
                        status: status
                    },
                    success: function(data){
                        alert(data);
                        location.reload();
                    }
                });
            }
       </script>

       <!-- Jquery for iniciar/finalizar -->
       <script type="text/javascript">
            function iniciar(id, status){

                var dasig = new Date();
                var fecha  = dasig.toISOString().split('T')[0];

                $.ajax({
                    type: "POST",
                    url: "iniciar.php",
                    data: {
                        id: id,
                        status: status,
                        fecha: fecha
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