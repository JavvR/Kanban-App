<?php

include('../../admin/conn.php');

if(isset($_POST['dpto'])){
    $dpto = $_POST['dpto'];

    $query = "SELECT * FROM area WHERE departamento_id = '$dpto'";
    $resutado = $conn->query($query);
    $areas = $resutado->fetch_all();

    foreach($areas as $area){
        $html = "<option value='".$area[0]."'>".$area[1]."</option>";
        echo $html;
    }
}