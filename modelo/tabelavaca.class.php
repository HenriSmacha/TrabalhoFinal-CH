<?php
class TabelaVaca{

  private $idControle;
  private $cio;
  private $cobIns;
  private $diagDia;
  private $diagResul;
  private $provavelD;
  private $pariDia;
  private $pariSex;
  private $pariTouro;
  private $pariNun;
  private $pariDTotal;
  private $controle;
  private $meses;
  private $secagem;
  private $lactacao;
  private $prodT;
  private $prodD;

  public function __construct(){}
  public function __destruct(){}

  public function __get($a){return $this->$a;}
  public function __set($a, $v){$this->$a = $v;}


  public function __toString(){
      return nl2br("Cio data/hora: $this->cio
                    Cobertura/Inseminação data/hora: $this->cobIns
                    Diag. gestão dia: $this->diagDia
                    Diag. gestão resultado: $this->diagResul
                    Dia provavel de parto: $this->provavelD
                    Parição dia: $this->pariDia
                    Parição sexo: $this->pariSex
                    N° de ferro: $this->pariNun
                    Parição touro: $this->pariTouro
                    Parição dias: $this->pariDTotal
                    Início controle: $this->controle
                    Total de leite coletado: $this->meses
                    data secagem: $this->secagem
                    idControle: $this->idControle
                    Lactação: $this->lactacao
                    Prod. total: $this->prodT
                    Prod. dias: $this->prodD");
  }
}
