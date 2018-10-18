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
    <h1 class="jumbotron bg-info">Contrle vaca</h1>

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
            <a class="nav-link" href="controle-vaca.php">Controle da Vaca<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="consultar-proprietario.php">Consultar Proprietário</a>
          </li>
        </ul>
      </div>
    </nav>
      <!-- // echo isset($_SESSION['msg'])? Helper::alert($_SESSION['msg']) : "";
      // unset($_SESSION['msg']); -->

      <h2>Dados reprodutivos</h2>
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover table-condensed">
          <thead>
            <tr>
              <th colspan="2">Cio</th>
              <th colspan="2">Cobertura/Inseminação</th>
              <th colspan="2">Diag. gestação</th>
              <th colspan="1">Data prox. parto</th>
              <th colspan="5">Parição</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="text" name="txtnome" placeholder="Data" class="form-control"></td>
              <td><input type="text" name="txtnome" placeholder="Hora" class="form-control"></td>
              <td><input type="text" name="txtnome" placeholder="Data" class="form-control"></td>
              <td><input type="text" name="txtnome" placeholder="Hora" class="form-control"></td>
              <td><input type="text" name="txtnome" placeholder="Data" class="form-control"></td>
              <td><input type="text" name="txtnome" placeholder="Resultado" class="form-control"></td>
              <td><input type="text" name="txtnome" placeholder="Data" class="form-control"></td>
              <td><input type="text" name="txtnome" placeholder="Data" class="form-control"></td>
              <td><input type="text" name="txtnome" placeholder="Sexo" class="form-control"></td>
              <td><input type="text" name="txtnome" placeholder="N°" class="form-control"></td>
              <td><input type="text" name="txtnome" placeholder="Touro" class="form-control"></td>
              <td><input type="text" name="txtnome" placeholder="int. de pasrto(dias)" class="form-control"></td>
            </tr>
            <tr>

            </tr>
          <tbody>
        </div>
        <form name="cadpropr" method="post" action="">
          <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary">
          <input type="reset" name="Limpar" value="Limpar" class="btn btn-danger">
      </form>
    <h2>Dados leiteiro</h2>
  </div>
</body>
</html>
