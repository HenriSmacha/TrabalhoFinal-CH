<?php
require 'conexaobanco.class.php';
class ProprietarioDAO{

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

  public function buscarProprietario(){
    try{
      $stat = $this->conexao->query("select * from proprietario");
      $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Proprietario');
      return $array;
    }catch(PDOException $e){
      echo "Erro ao buscar proprietario! ".$e;
    }//fecha catch
  }//fecha buscarProprietario

  public function filtrar($pesquisa, $filtro){
    $query="";
    switch ($filtro) {
      case 'codigo': $query = "where idproprietario=".$pesquisa;
      break;
      case 'login': $query = "where login like '%".$pesquisa."%'";
      break;
      case 'nome': $query = "where nome like '%".$pesquisa."%'";
      break;
      case 'propriedade': $query = "where propriedade like '%".$pesquisa."%'";
      break;
      case 'localizacao': $query = "where localizacao like '%".$pesquisa."%'";
      break;
      case 'municipio': $query = "where municipio like '%".$pesquisa."%'";
      break;
      case 'ncontato': $query = "where ncontato=".$pesquisa;
      break;
      default:
      $query="";
      break;
    }//fecha switch

     if(empty($pesquisa)){
       $query = "";
     }

     $stat = $this->conexao->query("select * from proprietario {$query}");
     $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Proprietario');
     return $array;
  }//fecha filtrar

  public function alterarProp($p){
      try{
        $stat = $this->conexao->prepare("update proprietario set nome=?, propriedade=?, localizacao=?, municipio=?, ncontato=? where idproprietario=?");

        $stat->bindValue(1, $p->nome);
        $stat->bindValue(2, $p->propriedade);
        $stat->bindValue(3, $p->localizacao);
        $stat->bindValue(4, $p->municipio);
        $stat->bindValue(5, $p->nContato);
        $stat->bindValue(6, $p->idProprietario);

        $stat->execute();

      }catch(PDOException $e){
        echo "Erro ao alterar proprietário! ".$e;
      }//fecha catch
    }//fecha método alterar


  public function deletarProprietario($id){
      try{
        $stat = $this->conexao->prepare("delete from proprietario where idproprietario = ?");
        $stat->bindValue(1, $id);
        $stat->execute();
      }catch(PDOException $e){
        echo "Erro ao deletar proprietário! ".$e;
      }//fecha catch
    }//fecha deletarProprietario

}
