<?php
class Vaca{

  private $nAnimal;
  private $nDeFerro;
  private $raca;
  private $pelagem;
  private $idade;

  public function __construct(){}
  public function __destruct(){}

  public function __get($a){return $this->$a;}
  public function __set($a,$v){$this->$a=$v;}

  public function __toString(){
    return nl2br("
                Nome do animal: $this->nAnimal
                N° do ferro: $this->nDeFerro
                Raça: $this->raca
                Pelagem: $this->pelagem
                Idade: $this->idade");
  }
}
