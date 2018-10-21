<?php session_start();
ob_start();
include_once 'util/helper.class.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Index</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="vendor/components/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <h1 class="jumbotron bg-info">Seja bem vindo!</h1>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Sistema</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastro-proprietario.php">Cadastrar Propietário</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastro-vaca.php">Cadastrar Vaca</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="consultar-vaca.php">Consultar Vacas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="consultar-proprietario.php">Consultar Proprietários</span></a>
          </li>
        </ul>
      </div>
    </nav>

    <h2>Cadastro de Proprietários para administrar cruza e lactase de gado leiteiro!</h2>

    <?php
    echo isset($_SESSION['msg']) ? Helper::alert($_SESSION['msg']) : "";
    unset($_SESSION['msg']);
    ?>

    <?php
    if(!isset($_SESSION['privateUser'])){
    ?>
    <form name="login" method="post" action="">
      <div class="form-group">
        <input type="text" name="txtlogin" placeholder="Login" class="form-control">
      </div>

      <div class="form-group">
        <input type="password" name="txtsenha" placeholder="Senha" class="form-control">
      </div>

      <div class="form-group">
        <select name="seltipo" class="form-control">
          <option value="adm">Adm</option>
          <option value="visitante">Visitante</option>
        </select>
      </div>
      <div class="form-group">
        <input type="submit" name="entrar" value="Entrar" class="btn btn-primary btn-block">
      </div>
      <div class="form-group">
        <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-success btn-block">
      </div>
      <?php
      if(isset($_POST['cadastrar'])){
        header("location:cadastro-proprietario.php");
      }
      ?>
    </form>
    <?php
    }else{
      include_once 'modelo/user.class.php';

      $user = unserialize($_SESSION['privateUser']);
      echo "<h3>Olá ".$user->login.", seja bem vindo!</h3>";
      ?>
      <form name="deslogar" method="post" action="">
        <div class="form-group">
          <input type="submit" name="deslogar" value="Sair" class="btn btn-primary">
        </div>
      </form>
    <?php
      if(isset($_POST['deslogar'])){
        unset($_SESSION['privateUser']);
        header("location:index.php");
      }
    }
    ?>
    <?php
    if(isset($_POST['entrar'])){
      include_once 'modelo/user.class.php';
      include_once 'dao/userdao.class.php';
      include_once 'util/seguranca.class.php';

      $user = new User();
      $user->login = $_POST['txtlogin'];
      $user->senha = Seguranca::criptografarMD5($_POST['txtsenha']);
      $user->tipo = $_POST['seltipo'];

      //echo $u;

      $userDAO = new UserDAO();
      $usuario = $userDAO->verificarUsuario($user);

      if($usuario == null){
        echo "usuário/senha inválido!";
      }else{
        $_SESSION['privateUser'] = serialize($usuario);
        header("location:index.php");
        //echo $usuario;
      }
    }
    ?>
  </div>
</body>
</html>
