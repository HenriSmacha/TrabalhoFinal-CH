<?php
class User {

  private $idUsuario;
  private $login;
  private $senha;
  private $tipo;

  public function __construct(){}
  public function __destruct(){}

  public function __get($a){return $this->$a;}
  public function __set($a, $v){$this->$a = $v;}

  public function __toString(){
    return nl2br("login: $this->login senha: $this->senha tipo: $this->tipo");
  }//fecha toString

  /*
  senha: mimozinha
  insert into user(idusuario,login,senha,tipo,nivel)
  values(1,"mimozinha","996d836b15da4dd9f945a802a77de03c", "adm",1)
  */
}//fecha classe
