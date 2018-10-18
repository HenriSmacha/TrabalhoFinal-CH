<?php
session_start();
ob_start();
include_once 'util/helper.class.php';

if(isset($_GET['id'])){
  include_once "dao/proprietariodao.class.php";
  include_once "modelo/proprietario.class.php";
  $p = new proprietarioDAO();
  $array = $p->filtrar($_GET['id'],"codigo");
  //var_dump($array); //só teste
  $p = $array[0];
  //echo $p; //toString
}else{
  header("location:consultar-proprietario.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Edição de Proprietários</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="vendor/components/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
  <body>
      <div class="container">
        <h1 class="jumbotron bg-info">Edição de Proprietarios</h1>

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
            <input type="text" name="txtnome" placeholder="Nome do Proprietário" class="form-control" value="<?php if(isset($p)){ echo $p->nome; } ?>">
          </div>
          <div class="form-group">
            <input type="text" name="txtpropriedade" placeholder="Nome da propriedade" class="form-control" value="<?php if(isset($p)){ echo $p->propriedade; } ?>">
          </div>
          <div class="form-group">
            <input type="text" name="txtlocalizacao" placeholder="Localização" class="form-control" value="<?php if(isset($p)){ echo $p->localizacao; } ?>">
          </div>
          <div class="form-group">
            <input type="text" name="txtmunicipio" placeholder="Município" class="form-control" value="<?php if(isset($p)){ echo $p->municipio; } ?>">
          </div>
          <div class="form-group">
            <input type="text" name="txtcontato" placeholder="N° de contato" class="form-control" value="<?php if(isset($p)){ echo $p->nContato; } ?>">
          </div>
          <div class="form-group">
            <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
            <input type="reset" name="Limpar" value="Limpar" class="btn btn-danger">
          </div>
        </form>
        <?php
          //falta código
          if(isset($_POST['alterar'])){
            include_once 'modelo/proprietario.class.php';
            include_once 'dao/proprietariodao.class.php';
            include 'util/padronizacao.class.php';

            $p = new Proprietario();
            $p->idProprietario = $_GET['id'];
            $p->nome = Padronizacao::padronizarMaiMin($_POST['txtnome']);
            $p->propriedade = Padronizacao::padronizarMaiMin($_POST['txtpropriedade']);
            $p->localizacao = Padronizacao::padronizarMaiMin($_POST['txtlocalizacao']);
            $p->municipio = Padronizacao::padronizarMaiMin($_POST['txtmunicipio']);
            $p->nContato = $_POST['txtcontato'];

            $propDAO = new ProprietarioDAO();
            $propDAO->alterarProp($p);

            $_SESSION['msg'] = "Proprietário alterado com sucesso!";
            header("location:consultar-proprietario.php");

            //echo "<h2>Livro cadastrado com sucesso!</h2>";
            //Helper::alert("Livro cadastrado com sucesso!");
            //echo $liv;
            ob_end_flush();
          }
        ?>
      </div>
  </body>
</html>
