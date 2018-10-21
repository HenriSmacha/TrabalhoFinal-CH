<?php
session_start();
ob_start();
include_once 'util/helper.class.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Cadastro de Proprietário</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="vendor/components/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
  <body>
      <div class="container">
        <h1 class="jumbotron bg-info">Cadastro de proprietário</h1>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">Sistema</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cadastro-proprietario.php">Cadastrar Proprietário <span class="sr-only">(current)</span></a>
              </li>
            </ul>
          </div>
        </nav>
        <?php
          echo isset($_SESSION['msg'])? Helper::alert($_SESSION['msg']) : "";
          unset($_SESSION['msg']);
        ?>
        <form name="cadpropr" method="post" action="">
          <div class="form-group">
            <input type="text" name="txtnome" placeholder="Nome do proprietário" class="form-control" pattern="^[A-zÁ-ù ]{2,30}$">
          </div>
          <div class="form-group">
            <input type="text" name="txtsobrenome" placeholder="Sobrenome do proprietário" class="form-control" pattern="^[A-zÁ-ù ]{2,30}$">
          </div>
          <div class="form-group">
            <input type="text" name="txtpropriedade" placeholder="Nome da propriedade" class="form-control" pattern="^[A-zÁ-ù ]{2,30}$">
          </div>
          <div class="form-group">
            <input type="text" name="txtlocalizacao" placeholder="Localização" class="form-control" pattern="^[A-zÁ-ù ]{2,30}$">
          </div>
          <div class="form-group">
            <input type="text" name="txtmunicipio" placeholder="Município" class="form-control" pattern="^[A-zÁ-ù ]{2,30}$">
          </div>
          <div class="form-group">
            <input type="text" name="txtncontato" placeholder="N° de Contato" class="form-control" pattern="^[0-9]{8,15}$">
          </div>
          <div class="form-group">
            <input type="text" name="txtlogin" placeholder="Insira seu login" class="form-control">
          </div>
          <div class="form-group">
            <input type="password" name="txtsenha" placeholder="Insira sua senha" class="form-control">
          </div>
          <div class="form-group">
            <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary">
            <input type="reset" name="Limpar" value="Limpar" class="btn btn-danger">
          </div>
        </form>
        <?php
          if(isset($_POST['cadastrar'])){
            include 'modelo/proprietario.class.php';
            include 'dao/proprietariodao.class.php';
            include 'util/padronizacao.class.php';
            include 'util/seguranca.class.php';
            include 'util/validacao.class.php';
            include 'modelo/user.class.php';
            include 'dao/userdao.class.php';

            $user = new User();
            $user->login = Seguranca::anttiEspSQLInjection($_POST['txtlogin']);
            $user->senha = Seguranca::anttiEspSQLInjection(Seguranca::criptografarMD5($_POST['txtsenha']));
            $user->tipo = "visitante";

            $userDAO = new UserDAO();
            $userDAO->cadastrarUser($user);

            $prop = new Proprietario();
            $prop->nome = Seguranca::anttiEspSQLInjection(Padronizacao::nomeSobrenome($_POST['txtnome'],$_POST['txtsobrenome']));
            $prop->propriedade = Seguranca::anttiEspSQLInjection(Padronizacao::padronizarMaiMin($_POST['txtpropriedade']));
            $prop->localizacao = Seguranca::anttiEspSQLInjection(Padronizacao::padronizarMaiMin(Validacao::validarFrase($_POST['txtlocalizacao'])));
            $prop->municipio = Seguranca::anttiEspSQLInjection(Padronizacao::padronizarMaiMin(Validacao::validarFrase($_POST['txtmunicipio'])));
            $prop->nContato = Validacao::validarNumTelefone($_POST['txtncontato']);

            $propDAO = new ProprietarioDAO();
            $propDAO->cadastrarProprietario($prop);

            // echo "<br>".$prop;
            $_SESSION['msg'] = "Proprietário cadastrado com sucesso!";
            ob_end_flush();
            header("location:index.php");
         }
        ?>
    </div>
  </body>
</html>
