<?php

require_once '../models/Bandos.php';

if(isset($_GET['operacion'])){
  $bandos = new Bandos();

  if($_GET['operacion'] == 'listarBandos'){
    $resultado = $bandos->getAll();
    echo json_encode($resultado);
  }
}