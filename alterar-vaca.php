<?php
session_start();
ob_start();
include_once 'util/helper.class.php';

if(isset($_GET['id'])){
  include_once "dao/vacadao.class.php";
  include_once "modelo/vaca.class.php";
  $v = new vacaDAO();
  $array = $v->filtrar($_GET['id'],"codigo");
  //var_dump($array); //só teste
  $v = $array[0];
  //echo $v; //toString
}else{
  header("location:consultar-vaca.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Edição de Vacas</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="vendor/components/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
  <body>
      <div class="container">
        <h1 class="jumbotron bg-info">Edição de Vacas</h1>

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
                <a class="nav-link" href="cadastro-proprietario.php">Cad. Proprietário <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cadastro-vaca.php">Cadastrar Vaca</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="tabela-vaca.php">Controle de Vaca</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="consultar-vaca.php">Consultar Vacas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="consultar-proprietario.php">Consultar Proprietário</a>
              </li>
            </ul>
          </div>
        </nav>
        <?php
        echo isset($_SESSION['msg']) ? Helper::alert($_SESSION['msg']) : "";
        unset($_SESSION['msg']);
        ?>
        <form name="cadvaca" method="post" action="">
          <div class="form-group">
            <input type="text" name="txtnanimal" placeholder="Nome do animal" class="form-control" value="<?php if(isset($v)){ echo $v->nAnimal; } ?>">
          </div>
          <div class="form-group">
            <input type="text" name="txtndeferro" placeholder="N° do ferro" class="form-control" value="<?php if(isset($v)){ echo $v->nDeFerro; } ?>">
          </div>
          <div class="form-group">
            <input type="text" name="txtraca" placeholder="Raça" class="form-control" value="<?php if(isset($v)){ echo $v->raca; } ?>">
          </div>
          <div class="form-group">
            <input type="text" name="txtpelagem" placeholder="Pelagem" class="form-control" value="<?php if(isset($v)){ echo $v->pelagem; } ?>">
          </div>
          <div class="form-group">
            <input type="number" name="txtidade" placeholder="Idade" class="form-control" value="<?php if(isset($v)){ echo $v->idade; } ?>">
          </div>
          <div class="form-group">
            <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
            <input type="reset" name="Limpar" value="Limpar" class="btn btn-danger">
          </div>
        </form>
        <?php
          //falta código
          if(isset($_POST['alterar'])){
            include_once 'modelo/vaca.class.php';
            include_once 'dao/vacadao.class.php';
            include 'util/padronizacao.class.php';

            $v = new Vaca();
            $v->idVaca = $_GET['id'];
            $v->nAnimal = Padronizacao::padronizarMaiMin($_POST['txtnanimal']);
            $v->nDeFerro = $_POST['txtndeferro'];
            $v->raca = Padronizacao::padronizarMaiMin($_POST['txtraca']);
            $v->pelagem = Padronizacao::padronizarMaiMin($_POST['txtpelagem']);
            $v->idade = $_POST['txtidade'];

            $vacaDAO = new VacaDAO();
            $vacaDAO->alterarVaca($v);

            $_SESSION['msg'] = "Vaca alterada com sucesso!";
            header("location:consultar-vaca.php");

            //echo "<h2>Livro cadastrado com sucesso!</h2>";
            //Helper::alert("Livro cadastrado com sucesso!");
            //echo $liv;
            ob_end_flush();
          }
        ?>
      </div>
  </body>
</html>
