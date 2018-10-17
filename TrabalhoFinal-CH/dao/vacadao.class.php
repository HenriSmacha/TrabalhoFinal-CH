<?php
require 'conexaobanco.class.php';
class vacaDAO{

  private $conexao = null;

  public function __construct(){
    $this->conexao = ConexaoBanco::getInstance();
  }

  public function __destruct(){}

  public  function cadastrarVaca($vac){
    try{
      $stat=$this->conexao->prepare("insert into vaca(ndeferro,nanimal,raca,pelagem,idade)values(null,?,?,?,?)");

      $stat->bindValue(1, $vac->nAnimal);
      $stat->bindValue(2, $vac->raca);
      $stat->bindValue(3, $vac->pelagem);
      $stat->bindValue(4, $vac->idade);
      $stat->execute();
    }catch(PDOException $e){
      echo "Erro ao cadastrar vaca! ".$e;
    }
  }

}
