<?php
    ob_start();
    session_start();

    $empresa = $_SESSION['empresa_id'];
    
    // include autoloader
    require_once '../../../dompdf/autoload.inc.php';
    
    include('../../admin/conn.php');
    $empresa_id = $_SESSION['empresa_id'];
    $sarea = $_SESSION['area_id'];
    $departamento = $_SESSION['departamento_id'];
    $sede = $_SESSION['sede_id'];
    $permiso = $_SESSION['id_permiso'];

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

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>

    <style>
        .container{
            display: flex;
            font-family: Verdana, Tahoma, sans-serif;
        }

        .titulo{
            padding: 5px;
            text-align: center;
        }

        .titulo > h3{
            width: 100%;
        }

        .container > table{
            width: 100%;
            text-align: center;
            border-collapse: collapse;
        }

        .cell{
            padding: 10px;
        }

    </style>

</head>
<body>
    <div class="container">

        <div class="titulo">
            <h2>Tareas</h2>
        </div>

        <br>
        
        <table border="1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tarea</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php $num = 1; foreach ($rows as $row) { ?>
                                
                    <tr>
                        <td class="cell"><?php echo $num++; ?></td>
                        <td class="cell"><?php echo $row[1];?></td>
                        <td class="cell"><?php if($row[11] == 1){
                            echo "Asignada";
                        }
                        if($row[11] == 2){
                            echo "En Curso";
                        }
                        if($row[11] == 3){
                            echo "Finalizada";
                        }?></td> 
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php 
    $html = ob_get_clean();

    use Dompdf\Dompdf;
    use Dompdf\Options;

    $opciones = new Options;
    $opciones->set('defaultfont','Courier');

    $dompdf = new Dompdf;

    $dompdf->loadHtml($html);
    $dompdf->setPaper('letter');
    $dompdf->render();

    $dompdf->stream('Lista.pdf', array('Attachment' => false));
?>