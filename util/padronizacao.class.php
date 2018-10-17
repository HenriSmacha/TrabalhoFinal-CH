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
}
