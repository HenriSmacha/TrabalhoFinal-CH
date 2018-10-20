<?php
session_start();
ob_start();

include_once 'dao/vacadao.class.php';
include_once 'modelo/vaca.class.php';
include_once 'util/helper.class.php';

$vacDAO = new VacaDAO();
unserialize($_GET['idVaca']);
// echo $_GET['idVaca'];
$array = $vacDAO->filtrar($_GET['idVaca'],'codigo');
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
            <a class="nav-link" href="consultar-vaca.php">Consultar Vacas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="constabela-vaca.php">Controle da Vaca</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="consultar-proprietario.php">Consultar Proprietários</a>
          </li>
        </ul>
      </div>
    </nav>
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
            foreach($array as $v){ // é L de livro
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
    </div>
        <!-- PRIMEIRA TABELA -->
        <h2>Dados reprodutivos</h2>
      <div class="row">
        <form name="cadpropr" method="post" action="">
          <h5>Cio</h5>
          <div class="form-group">
            <input type="date" name="txtciodia" class="form-control">
            <input type="time" name="txtciohora" class="form-control">
        </div>
          <h5>Cobertura/Inseminação</h5>
          <div class="form-group">
            <input type="date" name="txtcoindia" class="form-control">
            <input type="time" name="txtcoinhora" class="form-control">
          </div>
          <h5>Diag. gestação</h5>
          <div class="form-group">
            <input type="date" name="txtdiagdia" class="form-control">
            <input type="text" name="txtdiagresul" placeholder="Positivo/Negativo" class="form-control">
          </div>
          <h5>Data prov. do parto</h5>
          <div class="form-group">
            <input type="date" name="txtprovalD" placeholder="Dia" class="form-control">
          </div>
          <h5>Parição</h5>
          <div class="form-group">
            <input type="date" name="txtparidia" placeholder="Dia" class="form-control">
            <input type="text" name="txtparisex" placeholder="Sexo" class="form-control">
            <input type="text" name="txtparinferro" placeholder="N° de ferro" class="form-control">
            <input type="text" name="txtparitouro" placeholder="Touro" class="form-control">
            <input type="text" name="txtparidtotal" placeholder="Total dias em gestação" class="form-control">
          </div>
      <!-- SEGUNDA TABELA -->
        <h2>Dados reprodutivos</h2>
        <h5>Início do controle</h5>
        <div class="form-group">
          <input type="date" name="txtcontr" placeholder="Data" class="form-control">
        </div>
        <h5>Litos/Mes</h5>
        <div class="form-group">
          <input type="text" name="jan" placeholder="Jan" class="form-control">
          <input type="text" name="fev" placeholder="Fev" class="form-control">
          <input type="text" name="mar" placeholder="Mar" class="form-control">
          <input type="text" name="abr" placeholder="Abr" class="form-control">
          <input type="text" name="mai" placeholder="Mai" class="form-control">
          <input type="text" name="jun" placeholder="Jun" class="form-control">
          <input type="text" name="jul" placeholder="Jul" class="form-control">
          <input type="text" name="ago" placeholder="Ago" class="form-control">
          <input type="text" name="set" placeholder="Set" class="form-control">
          <input type="text" name="out" placeholder="Out" class="form-control">
          <input type="text" name="nov" placeholder="Nov" class="form-control">
          <input type="text" name="dez" placeholder="Dez" class="form-control">
        </div>
        <h5>Data de secagem</h5>
        <div class="form-group">
          <input type="date" name="txtsecag" placeholder="Data" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary">
          <input type="reset" name="Limpar" value="Limpar" class="btn btn-danger">
        </div>
      </form>
    </div>
        <?php
          if(isset($_POST['cadastrar'])){
            include 'dao/tabelavacadao.class.php';
            include 'modelo/tabelavaca.class.php';
            include 'util/padronizacao.class.php';
            include 'util/calculos.class.php';

            $cvaca=new TabelaVaca();
            $cvaca->idControle = $_GET['idVaca'];
            $cvaca->cio = padronizacao::dataHora($_POST['txtciodia'],$_POST['txtciohora']);
            $cvaca->cobIns = padronizacao::dataHora($_POST['txtcoindia'],$_POST['txtcoinhora']);
            $cvaca->diagDia = $_POST['txtdiagdia'];
            $cvaca->diagResul = $_POST['txtdiagresul'];
            $cvaca->provavelD = $_POST['txtprovalD'];
            $cvaca->pariDia = $_POST['txtparidia'];
            $cvaca->pariSex = $_POST['txtparisex'];
            $cvaca->pariNun = $_POST['txtparinferro'];
            $cvaca->pariTouro = $_POST['txtparitouro'];
            $cvaca->pariDTotal = $_POST['txtparidtotal'];
            $cvaca->controle = $_POST['txtcontr'];
            $cvaca->meses = Padronizacao::arrayMeses($_POST['jan'],$_POST['fev'],$_POST['mar'],$_POST['abr'],$_POST['mai'],$_POST['jun'],$_POST['jul'],$_POST['ago'],$_POST['set'],$_POST['out'],$_POST['nov'],
            $_POST['dez']);
            $cvaca->secagem = $_POST['txtsecag'];
            $cvaca->lactacao = Calculos::lactacaoDias($_POST['txtsecag'],$_POST['txtcontr']);
            $cvaca->prodT = Calculos::prodTotal($_POST['jan'],$_POST['fev'],$_POST['mar'],$_POST['abr'],$_POST['mai'],$_POST['jun'],$_POST['jul'],$_POST['ago'],$_POST['set'],$_POST['out'],$_POST['nov'],
            $_POST['dez']);
            $cvaca->prodD = Calculos::prodDia($_POST['jan'],$_POST['fev'],$_POST['mar'],$_POST['abr'],$_POST['mai'],$_POST['jun'],$_POST['jul'],$_POST['ago'],$_POST['set'],$_POST['out'],$_POST['nov'],
            $_POST['dez']);

            $cvacaDAO=new TabelaVacaDAO();
            $cvacaDAO->cadastrarContrVac($cvaca);

            $_SESSION['msg'] = "Tabela cadastrada!";
            echo "<br>".$cvaca;
            ob_end_flush();
            // header("location:index.php");
          }
        ?>
    </div>
  </body>
</html>
