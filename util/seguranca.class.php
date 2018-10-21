<?php
class Seguranca {

  public static function criptografarMD5($v){
    return md5("fazenda".$v);
  }

  public static function anttiEspSQLInjection($v){
    $exp = addslashes(trim($v));
    return preg_match($exp,$v);
  }
}
