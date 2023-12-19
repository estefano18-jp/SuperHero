<?php

require_once '../models/Publisher.php';

if(isset($_GET['operacion'])){
  $publisher = new Publisher();

  if($_GET['operacion'] == 'listarPublishers'){
    $resultado = $publisher->getAll();
    echo json_encode($resultado);
  }
}

if (isset($_POST['operacion'])){
  $publisher = new Publisher();

  if($_POST['operacion'] == 'contarSuperHeroes'){
    $publisher_id = [
      "publisher_id" => $_POST["publisher_id"]
    ];
    $resultado = $publisher->getAllSuperHeroes($publisher_id);
    echo json_encode($resultado);
  }
}