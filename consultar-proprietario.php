<?php
session_start();
ob_start();

include_once 'dao/proprietariodao.class.php';
include_once 'modelo/proprietario.class.php';
include_once 'util/helper.class.php';

$propDAO = new ProprietarioDAO();
$array = $propDAO->buscarProprietario();
//var_dump($array); //TESTAR...
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Consulta</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="vendor/components/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
  <style>
    .x{
      font-size: 50px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="jumbotron bg-info">Consulta de Vacas!</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Sistema</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home<span class="sr-only"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastro-proprietario.php">Cadastrar Propietário</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastro-vaca.php">Cadastrar Vaca</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tabela-vaca.php">Controle Vaca</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="consultar-vaca.php">Consultar Vacas</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="consultar-proprietario.php">Consultar Proprietário<span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>

    <h2>Consulta de Proprietário!</h2>

    <?php
    if(isset($_SESSION['msg'])){
        Helper::alert($_SESSION['msg']);
        unset($_SESSION['msg']);
    }

    if(count($array) == 0){
      echo "<h2 class='x'>Não há proprietários cadastrados!</h2>";
      return; //die();
    }
    ?>
    <form name="formfiltro" method="post" action="">
      <div class="row">
        <div class="form-group col-md-6">
          <input type="text" name="txtfiltro" class="form-control" placeholder="Digite sua pesquisa">
        </div>
      <div class="form-group col-md-6">
        <select name="selfiltro" class="form-control">
          <option value="todos">Todos</option>
          <option value="codigo">Código</option>
          <option value="login">login</option>
          <option value="nome">Nome</option>
          <option value="propriedade">Propriedade</option>
          <option value="localizacao">Localização</option>
          <option value="municipio">Município</option>
          <option value="ncontato">N° de Contato</option>
        </select>
      </div>
      </div><!-- fecha row -->
      <div class="form-group">
        <input type="submit" name="filtrar" value="Filtrar" class="btn btn-primary btn-block">
      </div>
    </form>
    <?php
    if(isset($_POST['filtrar'])){
      $pesquisa = $_POST['txtfiltro'];
      $filtro = $_POST['selfiltro'];

      $array = $propDAO->filtrar($pesquisa, $filtro);

      if(count($array)==0){
        echo "<h2>Sua pesquisa não retornou nenhum proprietário(s)!</h2>";
        return;
      }
    }
    ?>
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
          <tr>
            <th>Código</th>
            <th>login</th>
            <th>Nome</th>
            <th>Propriedade</th>
            <th>Localização</th>
            <th>Município</th>
            <th>N° de Contato</th>
            <th>Alterar</th>
            <th>Excluir</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Código</th>
            <th>login</th>
            <th>Nome</th>
            <th>Propriedade</th>
            <th>Localização</th>
            <th>Município</th>
            <th>N° de Contato</th>
            <th>Alterar</th>
            <th>Excluir</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
          foreach($array as $p){ // é L de livro
            echo "<tr>";
              echo "<td>$p->idProprietario</td>";
              echo "<td>$p->login</td>";
              echo "<td>$p->nome</td>";
              echo "<td>$p->propriedade</td>";
              echo "<td>$p->localizacao</td>";
              echo "<td>$p->municipio</td>";
              echo "<td>$p->nContato</td>";
              echo "<td><a href='alterar-proprietario.php?id=$p->idProprietario' class='btn btn-warning'>Alterar</a></td>";
              echo "<td><a href='consultar-proprietario.php?id=$p->idProprietario' class='btn btn-danger'>Excluir</a></td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div><!-- table-responsive -->
  </div>
  <?php
  if(isset($_GET['id'])){
    $propDAO->deletarProprietario($_GET['id']);
    $_SESSION['msg'] = "Proprietario excluído com sucesso!";
    header("location:consultar-proprietario.php");
    unset($_GET['id']);
    ob_end_flush();
  }
  ?>
</body>
</html>
