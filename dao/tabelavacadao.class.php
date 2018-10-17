<?php
require 'conexaobanco.class.php';
class TabelaVacaDAO{

private $conexao = null;

public function __construct(){
  $this->conexao = ConexaoBanco::getInstance():
}

public function __destruct(){}

public function cadastrarContrVac($contV){
  try{
    $stat=$this->conexao->prepare("insert intotabelavaca (ciod, cioh, cobinsd, cobinsh, diagd, diagr, parid, paris, parit, parii, controle, meses, secagem)values(?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $stat->bindValue(1, $contV->cioD);
    $stat->bindValue(2, $contV->cioH);
    $stat->bindValue(3, $contV->obInsD);
    $stat->bindValue(4, $contV->cobInsH);
    $stat->bindValue(5, $contV->diagD);
    $stat->bindValue(6, $contV->diagR);
    $stat->bindValue(7, $contV->pariD);
    $stat->bindValue(8, $contV->pariS);
    $stat->bindValue(9, $contV->pariT);
    $stat->bindValue(10, $contV->$pariI);
    $stat->bindValue(11, $contV->controle);
    $stat->bindValue(12, $contV->meses);
    $stat->bindValue(13, $contV->secagem);
  }catch(PDOException $e){
    echo "Erro ao cadastrar tabela"
  }
}

}
