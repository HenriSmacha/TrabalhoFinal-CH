<?php
session_start();
ob_start();
include_once 'dao/vacadao.class.php';
include_once 'modelo/vaca.class.php';
include_once 'dao/tabelavacadao.class.php';
include_once 'modelo/tabelavaca.class.php';
include_once 'util/helper.class.php';

$vacDAO = new VacaDAO();
$tabDAO = new TabelaVacaDAO();
unserialize($_GET['id']);
$arrayV = $vacDAO->filtrar($_GET['id'],'codigo');
$arrayT = $tabDAO->filtrar($_GET['id'],'codigo');

//var_dump($array); //TESTAR...
?>
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
            <a class="nav-link" href="consultar-vaca.php">Consultar Vacas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="constabela-vaca.php">Controle da Vaca<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="consultar-proprietario.php">Consultar Proprietários</a>
          </li>
        </ul>
      </div>
    </nav>
    <h2>Dados do bovino</h2>
    <?php
    echo isset($_SESSION['msg'])? Helper::alert($_SESSION['msg']) : "";
    unset($_SESSION['msg']);
    ?>
      <div class="row">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed">
          <thead>
            <tr>
              <th>Código</th>
              <th>Nome</th>
              <th>N° de ferro</th>
              <th>Raça</th>
              <th>Pelagem</th>
              <th>Idade</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Código</th>
              <th>Nome</th>
              <th>N° de ferro</th>
              <th>Raça</th>
              <th>Pelagem</th>
              <th>Idade</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            foreach($arrayV as $v){ // é L de livro
              echo "<tr>";
                echo "<td>$v->idVaca</td>";
                echo "<td>$v->nAnimal</td>";
                echo "<td>$v->nDeFerro</td>";
                echo "<td>$v->raca</td>";
                echo "<td>$v->pelagem</td>";
                echo "<td>$v->idade</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div><!-- table-responsive -->
    </div><!-- table-responsive -->
    </div>
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover table-condensed">
          <thead>
            <tr>
              <th colspan="1">Cio</th>
              <th colspan="1">Cobertura/Inseminação</th>
              <th colspan="2">Diag. gestação</th>
              <th colspan="1">Data prox. parto</th>
              <th colspan="5">Parição</th>
              <th colspan="1">Inicio controle</th>
              <th colspan="1">Litros/Mês</th>
              <th colspan="1">Data Secagem</th>
              <th colspan="1">Duração lactação</th>
              <th colspan="1">Produção total/th>
              <th colspan="1">Prod. Litros/Dia</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach($arrayT as $t){ // é L de livro
              echo "<tr>";
                echo "<td>$t->cio</td>";
                echo "<td>$t->cobIns</td>";
                echo "<td>$t->diagDia</td>";
                echo "<td>$t->diagResul</td>";
                echo "<td>$t->provavelD</td>";
                echo "<td>$t->pariDia</td>";
                echo "<td>$t->pariSex</td>";
                echo "<td>$t->pariNun</td>";
                echo "<td>$t->pariTouro</td>";
                echo "<td>$t->pariDTotal</td>";
                echo "<td>$t->controle</td>";
                echo "<td>$t->meses</td>";
                echo "<td>$t->secagem</td>";
                echo "<td>$t->lactacao</td>";
                echo "<td>$t->prodT</td>";
                echo "<td>$t->prodD</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <form name="cadpropr" method="post" action="">
      <div class="form-group">
        <input type="submit" name="excluir" value="Excluir Dados" class="btn btn-danger">
      </div>
    </form>
    <?php
    if(isset($_GET['excluir'])){
      $vacaDAO->deletarVaca($_GET['id']);
      $tabelaDAO->deletarTabela($_GET['id']);
      $_SESSION['msg'] = "Tabela excluído com sucesso!";
      header("location:index.php");
      unset($_GET['excluir']);
      ob_end_flush();
    }
    ?>
  </body>
</html>
