<?php 
  session_start(); 
  include("conexao.php");

  $sql = "select cm.id_medico, cm.nome_medico, cm.crm, h.nome_hospital, e.nome_especialidade, 
  cm.hr_entrada, cm.hr_saida from cadastro_medico cm
  join hospital h
  on cm.hospital = h.id_hospital
  join especialidade e
  on cm.especialidade = e.id_especialidade";

  $res = $conn->query($sql);

  $qtd = $res->num_rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HOSPINFO</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">HOSPINFO</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="administrador.php">
          <span>Painel do Administrador</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <span>Médicos</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="listar-medico.php">Listar</a>
            <a class="collapse-item" href="cadastrar-medico.php">Cadastrar</a>
            <a class="collapse-item" href="validar-medico.php">Validar</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <span>Usuários</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="listar-usuario.php">Listar</a>
            <a class="collapse-item" href="cadastrar-usuario.php">Cadastrar</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <span>Hospital</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="listar-hospital.php">Listar</a>
            <a class="collapse-item" href="cadastrar-hospital.php">Cadastrar</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" form action="resultado-busca.php" method="POST" name="formuser">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Digite a Especialidade" aria-label="Search" aria-describedby="basic-addon2" name="buscar_medico" id="buscar_medico">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit" value="Pesquisar">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - User Information -->
            <?php
              if (!empty($_SESSION["usuarioNome"])){
            ?>
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["usuarioNome"]?></span>
                  <img src="img/user.png" style="height: 30px; width: 30px">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Sair
                  </a>
                </div>
              </li>
            <?php
              }
            ?>

            <?php
              if(empty($_SESSION['usuarioNome'])){
            ?>
              <li class="nav-item active">
                <a class="nav-link" href="login.php">Login</a>
              </li>
            <?php  
              };
            ?>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <h1><center>Validar Cadastro dos Médicos</center></h3>

            <div class="row">
              <div class="col-md-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Médico</th>
                      <th>Hospital</th>
                      <th>Especialidade</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while($row = $res->fetch_assoc()){ ?>
                      <tr>
                        <td><?php echo $row['id_medico']; ?></td>
                        <td><?php echo $row['nome_medico']; ?></td>
                        <td><?php echo $row['nome_hospital']; ?></td>
                        <td><?php echo $row['nome_especialidade']; ?></td>
                        <td>
                          <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $row['id_medico']; ?>">Visualizar</button>
                          <button type="button" class="btn btn-xs btn-success">Validar</button>
                          <button type="button" class="btn btn-xs btn-danger">Apagar</button>
                        </td>
                      </tr>
                      <!-- Inicio Modal -->
                      <div class="modal fade" id="myModal<?php echo $row['id_medico']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header bg-primary">
                              <h4 class="modal-title text-center text-light" id="myModalLabel"><b>Dados do Médico</b></h4>
                              <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                  <label for="staticEmail" class="col-sm-3 col-form-label text-dark">Nome</label>
                                  <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $row['nome_medico']; ?>">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="staticEmail" class="col-sm-3 col-form-label text-dark">CRM</label>
                                  <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $row['crm']; ?>">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputPassword" class="col-sm-3 col-form-label text-dark">Hospital</label>
                                  <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $row['nome_hospital']; ?>">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputPassword" class="col-sm-3 col-form-label text-dark">Especialidade</label>
                                  <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $row['nome_especialidade']; ?>">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputPassword" class="col-sm-3 col-form-label text-dark">Entrada</label>
                                  <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $row['hr_entrada']; ?>">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputPassword" class="col-sm-3 col-form-label text-dark">Saída</label>
                                  <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $row['hr_saida']; ?>">
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Fim Modal -->
                    <?php } ?>
                  </tbody>
                 </table>
              </div>
            </div>    
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; HOSPINFO 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pronto para sair?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione "Sair" abaixo se você estiver pronto para encerrar sua sessão atual.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <form action="manter-usuario.php" method="POST">
            <input type="hidden" name="acao" value="sair">
            <button type="submit" class="btn btn-primary">Sair</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
