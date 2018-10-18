<?php
require 'conexaobanco.class.php';
class VacaDAO{

  private $conexao = null;

  public function __construct(){
    $this->conexao = ConexaoBanco::getInstance();
  }

  public function __destruct(){}

  public function cadastrarVaca($vac){
    try{
      $stat=$this->conexao->prepare("insert into vaca (idvaca, nanimal, ndeferro, raca, pelagem, idade)values(null,?,?,?,?,?)");

      $stat->bindValue(1, $vac->nAnimal);
      $stat->bindValue(2, $vac->nDeFerro);
      $stat->bindValue(3, $vac->raca);
      $stat->bindValue(4, $vac->pelagem);
      $stat->bindValue(5, $vac->idade);
      $stat->execute();
    }catch(PDOException $e){
      echo "Erro ao cadastrar! ".$e;
    }//fecha catch
  }//fecha cadastrar

  public function buscarVacas(){
   try{
     $stat = $this->conexao->query("select * from vaca");
     $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Vaca');
     return $array;
   }catch(PDOException $e){
     echo "Erro ao buscar vacas! ".$e;
   }//fecha catch
  }//fecha buscarVaca

  public function filtrar($pesquisa, $filtro){
    $query="";
    switch ($filtro) {
      case 'codigo': $query = "where idvaca=".$pesquisa;
      break;
      case 'nome': $query = "where nanimal like '%".$pesquisa."%'";
      break;
      case 'ndeferro': $query = "where ndeferro=".$pesquisa;
      break;
      case 'raca': $query = "where raca like '%".$pesquisa."%'";
      break;
      case 'pelagem': $query = "where pelagem like '%".$pesquisa."%'";
      break;
      case 'idade': $query = "where idade=".$pesquisa;
      break;
      default:
      $query="";
      break;
    }//fecha switch

     if(empty($pesquisa)){
       $query = "";
     }

     $stat = $this->conexao->query("select * from vaca {$query}");
     $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Vaca');
     return $array;
  }//fecha filtrar

  public function alterarVaca($v){
      try{
        $stat = $this->conexao->prepare("update vaca set nanimal=?, ndeferro=?, raca=?, pelagem=?, idade=? where idvaca=?");

        $stat->bindValue(1, $v->nAnimal);
        $stat->bindValue(2, $v->nDeFerro);
        $stat->bindValue(3, $v->raca);
        $stat->bindValue(4, $v->pelagem);
        $stat->bindValue(5, $v->idade);
        $stat->bindValue(6, $v->idVaca);

        $stat->execute();

      }catch(PDOException $e){
        echo "Erro ao alterar vaca! ".$e;
      }//fecha catch
    }//fecha método alterar


  public function deletarVaca($id){
    try{
      $stat = $this->conexao->prepare("delete from vaca where idvaca = ?");
      $stat->bindValue(1, $id);
      $stat->execute();
    }catch(PDOException $e){
      echo "Erro ao deletar vaca! ".$e;
    }//fecha catch
  }//fecha deletarVaca
}//fecha class
