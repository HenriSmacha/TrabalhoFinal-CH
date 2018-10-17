<?php
class Proprietario{

  // private $login;
  // private $password;
  private $idProprietario;
  private $nome;
  private $propriedade;
  private $localizacao;
  private $municipio;
  private $nContato;

  public function __construct(){}
  public function __destruct(){}

  public function __get($a){return $this->$a;}
  public function __set($a,$v){$this->$a=$v;}

  public function __toString(){
    return nl2br("
                Nome do proprietário: $this->nome
                Nome da propreidade: $this->propriedade
                Localização: $this->localizacao
                Município: $this->municipio
                Contato: $this->nContato");
  }

}
