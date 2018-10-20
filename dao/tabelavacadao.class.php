<?php
require_once 'conexaobanco.class.php';
class TabelaVacaDAO{

private $conexao = null;

public function __construct(){
  $this->conexao = ConexaoBanco::getInstance();
}

public function __destruct(){}

public function cadastrarContrVac($cvaca){
  try{
    $stat=$this->conexao->prepare("insert into tabelavaca (idcontrole, cio, cobins, diagdia, diagresul, paridia, parisex, paritouro, paridtotal, controle, meses, secagem, lactacao, prodt, prodd)values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $stat->bindValue(1, $cvaca->idControle);
    $stat->bindValue(2, $cvaca->cio);
    $stat->bindValue(3, $cvaca->cobIns);
    $stat->bindValue(4, $cvaca->diagDia);
    $stat->bindValue(5, $cvaca->diagResul);
    $stat->bindValue(6, $cvaca->pariDia);
    $stat->bindValue(7, $cvaca->pariSex);
    $stat->bindValue(8, $cvaca->pariTouro);
    $stat->bindValue(9, $cvaca->pariDTotal);
    $stat->bindValue(10, $cvaca->controle);
    $stat->bindValue(11, $cvaca->meses);
    $stat->bindValue(12, $cvaca->secagem);
    $stat->bindValue(13, $cvaca->lactacao);
    $stat->bindValue(14, $cvaca->prodT);
    $stat->bindValue(15, $cvaca->prodD);
    $stat->execute();
  }catch(PDOException $e){
      echo "Erro ao cadastrar tabela";
  }
}//fecah cadastrarcontrolevaca

public function filtrar($pesquisa, $filtro){
  $query="";
  switch ($filtro) {
    case 'codigo': $query = "where idcontrole=".$pesquisa;
    break;
    default:
    $query="";
    break;
  }

    if(empty($pesquisa)){
      $query = "";
    }

    $stat = $this->conexao->query("select * from tabelavaca {$query}");
    $array = $stat->fetchAll(PDO::FETCH_CLASS, 'TabelaVaca');
    return $array;
 }//fecha filtrar
}
