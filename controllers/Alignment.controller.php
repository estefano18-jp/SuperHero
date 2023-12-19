<?php

require_once '../models/Alignment.php';

if(isset($_POST['operacion'])){
  $alignment = new Alignment();

  if($_POST['operacion'] == 'listarBandosPorPublisher'){
    $publisher_id = [
      "id" => $_POST["id"]
    ];
    $resultado = $alignment->getAll($publisher_id);
    echo json_encode($resultado);
  }
}