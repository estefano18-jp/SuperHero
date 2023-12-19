<?php

require_once 'Conexion.php';

class Publisher extends Conexion{
  private $pdo;

  public function __CONSTRUCT(){
    $this->pdo = parent::getConexion();
  }

  public function getAll(){
    try {
      $consulta = $this->pdo->prepare("CALL spu_listar_publisher");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function getAllSuperHeroes($data = []){
    try {
      $consulta = $this->pdo->prepare("CALL spu_contar_superheroes_por_publishers(?)");
      $consulta->execute(
        array(
          $data['publisher_id']
        )
      );
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}