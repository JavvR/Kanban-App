<?php
    ob_start();
    session_start();

    $empresa = $_SESSION['empresa_id'];
    
    // include autoloader
    require_once '../../../../../dompdf/autoload.inc.php';
    
    include('../../../../admin/conn.php');
    $query  = "SELECT * FROM tipo_tarea WHERE empresa_id = '$empresa'";

    $result = $conn->query($query);
    $rows   = $result->fetch_all();

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos de Tareas</title>

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
            <h2>Tipos de Tareas</h2>
        </div>

        <br>
        
        <table border="1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Rol<th>
                </tr>
            </thead>
            <tbody>
                <?php $num = 1; foreach ($rows as $row) { ?>
                                
                    <tr>
                        <td class="cell"><?php echo $num++; ?></td>
                        <td class="cell"><?php echo $row[1];?></td>
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