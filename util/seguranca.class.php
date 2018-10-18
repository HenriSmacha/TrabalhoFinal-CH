<?php
class Seguranca {

  public static function criptografarMD5($v){
    return md5("fazenda".$v);
  }
}
