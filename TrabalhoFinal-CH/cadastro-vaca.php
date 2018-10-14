<?php
session_start();
ob_start();
include_once 'util/helper.class.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Cadastro vaca</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="vendor/components/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
  <body>
    <div class="container">
      <h1 class="jumbotron bg-info">Cadastro vaca</h1>

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
              <a class="nav-link" href="cadastro-proprietario.php">Cadastrar Propietário</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cadastro-vaca.php">Cadastrar de Vaca<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="controle-vaca.php">Controle de Vaca</a>
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
          <input type="text" name="txtnvaca" placeholder="Nome do animal" class="form-control">
        </div>
        <div class="form-group">
          <input type="text" name="txtndeferro" placeholder="N° do ferro" class="form-control">
        </div>
        <div class="form-group">
          <input type="text" name="txtraca" placeholder="Raça" class="form-control">
        </div>
        <div class="form-group">
          <input type="text" name="txtpelagem" placeholder="Pelagem" class="form-control">
        </div>
        <div class="form-group">
          <input type="number" name="numidade" placeholder="Idade" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary">
          <input type="reset" name="Limpar" value="Limpar" class="btn btn-danger">
        </div>
      </form>
      <?php
        if(isset($_POST['cadastrar'])){
          include 'modelo/vaca.class.php';
          // include 'dao/vacadao.class.php';
          // include 'util/padronizacao.class.php';

          $vac = new Vaca();
          $vac->nAnimal = $_POST['txtnvaca'];
          $vac->nDeFerra = $_POST['txtndeferro'];
          $vac->raca = $_POST['txtraca'];
          $vac->pelagem = $_POST['txtpelagem'];
          $vac->idade = $_POST['numidade'];

          // echo "<br>".$vac;
          $_SESSION['msg'] = "Vaca cadastrada com sucesso!";
          header("location:cadastro-vaca.php");
          ob_end_flush();
        }
      ?>
    </div>
  </body>
</html>