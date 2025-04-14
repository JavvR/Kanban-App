<?php

include('../../../admin/conn.php');

if(isset($_POST['id_dpto'])){
    $id_dpto = $_POST['id_dpto'];

    $query = "SELECT * FROM area WHERE departamento_id = '$id_dpto'";
    $result = $conn->query($query);
    $areas = $result->fetch_all();

    foreach($areas as $area){
        $html = "<option value='". $area[0] ."'>". $area[1] ."</option>";
        echo $html;
    }
}

$conn->close();