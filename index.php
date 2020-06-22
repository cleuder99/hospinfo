<?php 
  session_start(); 
  include("conexao.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HOSPINFO</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/home/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/home/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/home/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">HOSPINFO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php
        if(empty($_SESSION['usuarioNome'])){
        ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Cadastre-se</a>
        </li>
        <?php  
          };
        ?>
        <?php
        if(!empty($_SESSION['usuarioNome'])){
        ?>   
        <div class="dropdown nav-item" style="text-align: right;">
          <a class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION["usuarioNome"]?>
          </a>
          <form action="manter-usuario.php" method="POST">
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <input type="hidden" name="acao" value="sair">
              <button type="submit" class="dropdown-item" href="manter-usuario.php">Sair</button>
            </div>
          </form>
        </div>
        <?php          
          }
        ?>
      </ul>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Seja Bem-Vindo ao Hospinfo</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form action="resultado-busca.php" method="POST" name="formuser">
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <input type="text" class="form-control form-control-lg" name="buscar_medico" id="buscar_medico" placeholder="Digite a especialidade desejada">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary" value="Pesquisar" onclick="return validar()">Buscar</button>
              </div>  
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <p class="text-muted small mb-4 mb-lg-0">Copyright &copy; HOSPINFO 2020</p>
        </div>
        
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/home/jquery/jquery.min.js"></script>
  <script src="vendor/home/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript">

    function validar(){
      var buscar_medico = formuser.buscar_medico.value;

      if(buscar_medico == ""){
        alert('Digite a especialidade desejada para realizar a busca!');
        formuser.buscar_medico.focus();
        return false;
      }
    }

  </script>

</body>

</html>
