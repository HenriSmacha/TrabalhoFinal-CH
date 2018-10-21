<?php
class Validacao{

  public static function validarFrase($v){
  $exp = '/^[A-zÁ-ù ]{2,30}$/';
  return preg_match($exp,$v);
  }

  public static function validarNumTelefone($n){
    $exp = '/^[0-9]{8,15}$/';
    return preg_match($exp,$v);
  }

  public static function validarNum($n){
    $exp = '/^[0-9]{1,4}$/';
    return preg_match($exp,$v);
  }

  public static function validarPN($v){
    $exp = '/^(positivo|negativo|p|n|P|N|POSITOVO|NEGATIVO)$/';
    return preg_match($exp,$v);
  }

  public static function validarSex($v){
    $exp = '/^(macho|femea|m|f|M|F|MACHO|FEMEA)$/';
    return preg_match($exp,$v);
  }
}
