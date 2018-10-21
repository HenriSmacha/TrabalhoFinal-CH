<?php
require_once 'conexaobanco.class.php';
 class UserDAO { //DATA ACCESS OBJECT


   public function __construct(){
     $this->conexao = ConexaoBanco::getInstance();
   }

   public function __destruct(){}

     public function cadastrarUser($user){
       try{
         $stat = $this->conexao->prepare("insert into user(idusuario, login, senha, tipo)values(null,?,?,?)");
         $stat->bindValue(1,$user->login);
         $stat->bindValue(2,$user->senha);
         $stat->bindValue(3,$user->tipo);
         $stat->execute();
       }catch(PDOException $e){
         echo "Erro ao cadastrar usuário! ".$e;
       }
     }//fecaha cadUser

     public function verificarUsuario($u){
      try{
        $stat = $this->conexao->prepare("select * from user where login=? and senha=? and tipo=?");
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
