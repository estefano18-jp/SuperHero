<?php

require_once '../models/Superheroes.php';

if(isset($_POST['operacion'])){
  $superherores = new Superheroes();

  if($_POST['operacion'] == 'listarSuperHeroes'){
    $publisher_id = [
      "publisher_id" => $_POST["publisher_id"]
    ];
    $resultado = $superherores->getAll($publisher_id);
    echo json_encode($resultado);
  }
}