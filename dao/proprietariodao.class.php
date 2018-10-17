<?php
require 'conexaobanco.class.php';
class proprietarioDAO{

  private $conexao = null;

  public function __construct(){
    $this->conexao = ConexaoBanco::getInstance();
  }

  public function __destruct(){}

  public function cadastrarProprietario($prop){
    try{
      $stat=$this->conexao->prepare("insert into proprietario (idproprietario,nome,propriedade,localizacao,municipio,ncontato)values(null,?,?,?,?,?)");

      $stat->bindValue(1, $prop->nome);
      $stat->bindValue(2, $prop->propriedade);
      $stat->bindValue(3, $prop->localizacao);
      $stat->bindValue(4, $prop->municipio);
      $stat->bindValue(5, $prop->nContato);
      $stat->execute();
    }catch(PDOException $e){
      echo "Erro ao cadastrar! ".$e;
    }//fecha catch
  }//fecha cadastrar
}
