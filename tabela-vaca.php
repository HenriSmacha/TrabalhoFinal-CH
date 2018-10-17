<?php session_start(); ob_start();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Controle vaca</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="vendor/components/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <h1 class="jumbotron bg-info">Controle vaca</h1>

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
            <a class="nav-link" href="cadastro-vaca.php">Cadastrar Vaca</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tabela-vaca.php">Controle da Vaca<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="consultar-vaca.php">Consultar Vacas</a>
          </li>
        </ul>
      </div>
    </nav>
      <!-- // echo isset($_SESSION['msg'])? Helper::alert($_SESSION['msg']) : "";
      // unset($_SESSION['msg']); -->
    <form name="cadpropr" method="post" action="">
      <h2>Dados reprodutivos</h2>
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover table-condensed">
          <thead>
            <tr>
              <th colspan="2">Cio</th>
              <th colspan="2">Cobertura/Inseminação</th>
              <th colspan="2">Diag. gestação</th>
              <th colspan="5">Parição</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="text" name="txtciod" placeholder="Data" class="form-control"></td>
              <td><input type="text" name="txtcioh" placeholder="Hora" class="form-control"></td>
              <td><input type="text" name="txtcoind" placeholder="Data" class="form-control"></td>
              <td><input type="text" name="txtcoinh" placeholder="Hora" class="form-control"></td>
              <td><input type="text" name="txtdiagd" placeholder="Data" class="form-control"></td>
              <td><input type="text" name="txtdiagr" placeholder="Resultado" class="form-control"></td>
              <td><input type="text" name="txtparid" placeholder="Data" class="form-control"></td>
              <td><input type="text" name="txtparis" placeholder="Sexo" class="form-control"></td>
              <td><input type="text" name="txtparin" placeholder="N°" class="form-control"></td>
              <td><input type="text" name="txtparit" placeholder="Touro" class="form-control"></td>
              <td><input type="text" name="txtparids" placeholder="int. de pasrto(dias)" class="form-control"></td>
            </tr>
            <tr>
              <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary">
              <input type="reset" name="Limpar" value="Limpar" class="btn btn-danger">
            </tr>
          <tbody>
        </div>
        <h2>Dados leiteiro</h2>
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover table-condensed">
          <thead>
            <tr>
              <th colspan="1">Data do parto</th>
              <th colspan="1">Data início controle</th>
              <th colspan="12">Litros/Mês</th>
              <th colspan="1">Data secagem</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="text" name="txtpartod" placeholder="Data" class="form-control"></td>
              <td><input type="text" name="txtcontd" placeholder="Data" class="form-control"></td>
              <td><input type="text" name="txtjan" placeholder="Jan" class="form-control"></td>
              <td><input type="text" name="txtfev" placeholder="Fev" class="form-control"></td>
              <td><input type="text" name="txtmar" placeholder="Mar" class="form-control"></td>
              <td><input type="text" name="txtabr" placeholder="Abr" class="form-control"></td>
              <td><input type="text" name="txtmai" placeholder="Mai" class="form-control"></td>
              <td><input type="text" name="txtjun" placeholder="Jun" class="form-control"></td>
              <td><input type="text" name="txtjul" placeholder="Jul" class="form-control"></td>
              <td><input type="text" name="txtago" placeholder="Ago" class="form-control"></td>
              <td><input type="text" name="txtset" placeholder="Set" class="form-control"></td>
              <td><input type="text" name="txtout" placeholder="Out" class="form-control"></td>
              <td><input type="text" name="txtnov" placeholder="Nov" class="form-control"></td>
              <td><input type="text" name="txtdez" placeholder="Dez" class="form-control"></td>
              <td><input type="text" name="txtsecad" placeholder="Data" class="form-control"></td>
            </tr>
            <tr>
              <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary">
              <input type="reset" name="Limpar" value="Limpar" class="btn btn-danger">
            </tr>
          <tbody>
      </form>
      <?php
        // if(isset($_POST['cadastrar'])){
        //   include 'dao/tabelavacadao.class.php';
        //   include 'modelo/tabelavaca.class.php';
        //
        //   $contV=new TabelaVacaDAO();
        //   $contV->$cioD = $_POST['txt'];
        //   $contV->$cioH = $_POST['txt'];
        //   $contV->$cobInsD = $_POST['txt'];
        //   $contV->$cobInsH = $_POST[''];
        //   $contV->$diagD = $_POST[''];
        //   $contV->$diagR = $_POST[''];
        //   $contV->$pariD = $_POST[''];
        //   $contV->$pariS = $_POST[''];
        //   $contV->$pariT = $_POST[''];
        //   $contV->$pariI = $_POST[''];
        //   $contV->$controle = $_POST[''];
        //   $contV->$meses = $_POST[''];
        //   $contV->$secagem = $_POST[''];
        // }
      ?>
    </div>
  </body>
</html>
