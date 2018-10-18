<?php
require 'conexaobanco.class.php';
 class UsuarioDAO { //DATA ACCESS OBJECT


   public function __construct(){
     $this->conexao = ConexaoBanco::getInstance();
   }

   public function __destruct(){}

     public function verificarUsuario($u){
      try{
        $stat = $this->conexao->prepare("select * from usuario where login=? and senha=? and tipo=?");
        $stat->bindValue(1, $u->login);
        $stat->bindValue(2, $u->senha);
        $stat->bindValue(3, $u->tipo);
        $stat->execute();
        $user = null;
        $user = $stat->fetchObject('User');
        return $user;
      }catch(PDOException $e){
        echo "Erro ao verificar usuário! ".$e;
      }
   }
}//fecha classe
