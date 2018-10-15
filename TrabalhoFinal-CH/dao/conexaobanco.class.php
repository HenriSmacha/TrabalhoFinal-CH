<?php
class ConexaoBanco extends PDO {

  private static $instance = null;

  public function __construct($dsn, $user, $pass){
    parent::__construct($dsn, $user, $pass);
  }

  public static function getInstance(){
    try{
      if(!isset(self::$instance)){
        self::$instance = new
        ConexaoBanco("mysql:dbname=fazenda;host=localhost","root","");
      }
      return self::$instance;
    }catch(PDOException $e){
      echo "Erro ao cadastrar no banco! ".$e;
    }//fecha catch
  }//fecha getInstance
}//fecha classe
