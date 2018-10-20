<?php
class Calculos{

  public function lactacaoDias($d1,$d2){
    $data1 = new DateTime($d1);
    $data2 = new DateTime($d2);

    $valor = $data1->diff( $data2 );
    $ano = $valor->y*365;
    $mes = $valor->m*30;
    $dia = $valor->d;
    $total = $dia+$mes+$ano;
    return $total;
  }

  public function prodTotal($jan,$fev,$mar,$abr,$mai,$jun,$jul,$ago,$set,$out,$nov,$dez){
    $soma = $jan+$fev+$mar+$abr+$mai+$jun+$jul+$ago+$set+$out+$nov+$dez;
    return $soma;
  }

  public function prodDia($jan,$fev,$mar,$abr,$mai,$jun,$jul,$ago,$set,$out,$nov,$dez){
    $soma = $jan+$fev+$mar+$abr+$mai+$jun+$jul+$ago+$set+$out+$nov+$dez;
    $divisao = $soma/12;
    return $divisao;
  }
}
