<?php

require_once '../models/publisher.php';

//1. Recibe solicitud
//2. Realiza el proceso
//3. Entrega resultado
if(isset($_GET['operacion'])){

  $publisher_name = new publisher();

  if ($_GET['operacion'] == 'listar'){
    $resultado = $marca->getAll();
    echo json_encode($resultado);
  }

}