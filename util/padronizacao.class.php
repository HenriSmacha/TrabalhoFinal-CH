<?php
class Padronizacao {

  public static function padronizarMaiMin($v){
    return ucwords(strtolower($v));
  }

  public static function nomeSobrenome($n,$s){
    $array = array($n,$s);
    $nome = implode(" ",$array);
    return $nome;
  }

  public static function padronizardataHora($d,$h){
    $array = array($d,$h);
    $padDH = implode(" ",$array);
    return $padDH;
  }

  public static function arrayMeses($jan,$fev,$mar,$abr,$mai,$jun,$jul,$ago,$set,$out,$nov,$dez){
    $arrayM = array($jan,$fev,$mar,$abr,$mai,$jun,$jul,$ago,$set,$out,$nov,$dez);
    $meses = implode(" ",$arrayM);
    return $meses;
  }
}
