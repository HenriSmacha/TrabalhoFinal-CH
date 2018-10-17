<?php
class TabelaVaca{

  private $cioD;
  private $cioH;
  private $cobInsD;
  private $cobInsH;
  private $diagD;
  private $diagR;
  private $pariD;
  private $pariS;
  private $pariT;
  private $pariI;
  private $controle;
  private $meses;
  private $secagem;

  public function __construct(){}
  public function __destruct(){}

  public function __get($a){return $this->$a;}
  public function __set($a, $v){$this->$a = $v;}

  public function toString(){
      return nl2br("Cio data: $this->cioD
                    Cio hora $this->cioH
                    Cobertura/Inseminação data: $this->cobInsD
                    Cobertura/Inseminação hora: $this->cobInsH
                    Diag. gestão dia: $this->diagD
                    Diag. gestão resultado: $this->diagR
                    Parição dia: $this->pariD
                    Parição sexo: $this->pariS
                    Parição touro: $this->pariT
                    Parição dias: $this->pariI
                    Início controle: $this->controle
                    Total de leite coletado: $this->meses
                    data secagem: $this->secagem");
  }
}
