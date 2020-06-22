<?php
session_start();
include("conexao.php");

$busca = $_POST['buscar_medico'];

$sql = "select m.id_medico, m.nome_medico, h.nome_hospital, e.nome_especialidade, m.hr_entrada, m.hr_saida from medico m
join hospital h
on m.hospital = h.id_hospital
join especialidade e
on m.especialidade = e.id_especialidade where nome_especialidade = '$busca'";

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

      <?php
      if ($_SESSION['usuarioNiveisAcessoId'] == "1") {
      ?>
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <span>Buscar Médico</span></a>
        </li>
      <?php
      }
      ?>

      <?php
      if ($_SESSION['usuarioNiveisAcessoId'] == "1") {
      ?>
        <li class="nav-item active">
          <a class="nav-link" href="#exampleModal" data-toggle="modal">
            <span>Cadastrar Médico</span></a>
        </li>
      <?php
      }
      ?>


      <?php
      if ($_SESSION['usuarioNiveisAcessoId'] == "2") {
      ?>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="administrador.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
      <?php
      }
      ?>

      <!-- Nav Item - Pages Collapse Menu -->
      <?php
      if ($_SESSION['usuarioNiveisAcessoId'] == "2") {
      ?>
        <!-- Heading -->
        <div class="sidebar-heading">
          Interface
        </div>

        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <span>Médicos</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="listar-medico.php">Listar</a>
              <a class="collapse-item" href="cadastrar-medico.php">Cadastrar</a>
            </div>
          </div>
        </li>
      <?php
      }
      ?>

      <!-- Nav Item - Utilities Collapse Menu -->
      <?php
      if ($_SESSION['usuarioNiveisAcessoId'] == "2") {
      ?>
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
      <?php
      }
      ?>

      <!-- Nav Item - Pages Collapse Menu -->
      <?php
      if ($_SESSION['usuarioNiveisAcessoId'] == "2") {
      ?>
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
      <?php
      }
      ?>

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
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Digite a especialidade desejada" aria-label="Search" aria-describedby="basic-addon2">
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
            if (!empty($_SESSION["usuarioNome"])) {
            ?>
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["usuarioNome"] ?></span>
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
            if (empty($_SESSION['usuarioNome'])) {
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

          <h3>
            <center><b>Resultado da Pesquisa</b></center>
          </h3>

          <?php
          if ($qtd > 0) {
            while ($dados = $res->fetch_assoc()) {
          ?>
              <div class="card">
                <h5 class="card-header"><?php echo $dados['nome_hospital']; ?></h5>
                <div class="card-body">
                  <h6 class="card-subtitle mb-2 text-muted"><b>Médico</b>: <?php echo $dados['nome_medico']; ?></h6>
                  <h6 class="card-subtitle mb-2 text-muted"><b>Epecialidade</b>: <?php echo $dados['nome_especialidade'] ?></h6>
                  <h6 class="card-subtitle mb-2 text-muted"><b>Horário de Entrada</b>: <?php echo $dados['hr_entrada'] ?></h6>
                  <h6 class="card-subtitle mb-2 text-muted"><b>Horário de Saída</b>: <?php echo $dados['hr_saida'] ?></h6>

                  <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal<?php echo $dados['id_medico']; ?>">
                    Comentários
                  </button>

                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalComentar<?php echo $dados['id_medico']; ?>">
                    Comentar
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="myModal<?php echo $dados['id_medico']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Comentários</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <?php
                          $sql = "select m.id_medico, u.nome_usuario, c.situacao_atendimento, c.motivo_atendimento, c.obs_nao_atendido, c.obs_atendido, c.created from usuario u
                        join comentario c
                        on c.id_usuario = u.id_usuario
                        join medico m
                        on c.id_medico = m.id_medico
                        where c.id_medico = '$dados[id_medico]'";

                          $result = $conn->query($sql);
                          $qtd = $result->num_rows;
                          ?>

                          <?php
                          if ($qtd > 0) {
                            while ($dados = mysqli_fetch_array($result)) {
                              if ($dados['situacao_atendimento'] = "Não") {
                          ?>
                                <div class="row">
                                  <div class="col-md-6">
                                    <h6><b><?php echo $dados['nome_usuario']; ?></b></h6>
                                  </div>
                                  <div class="col-md-6" style="text-align: right;">
                                    <h6><b><?php echo $dados['created']; ?></b></h6>
                                  </div>
                                  <div class="col-md-12">
                                    <label><?php echo $dados['situacao_atendimento']; ?> foi atendido.</label><br>
                                    <label><b>Motivo:</b> <?php echo $dados['motivo_atendimento']; ?></label><br>
                                    <label><b>Observações:</b> <?php echo $dados['obs_nao_atendido']; ?></label>
                                  </div>
                                </div>
                              <?php } ?>
                            <?php } ?>
                          <?php } else {
                            echo "Nenhum comentário encontrado!";
                          } ?>


                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Modal -->
                  <div class="modal fade" id="myModalComentar<?php echo $dados['id_medico']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><b>Comentar</b></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="manter-comentario.php" method="POST">
                            <input type="hidden" name="acao" value="cadastrar">
                            <input type="hidden" name="id_medico" value="<?php echo $dados['id_medico']; ?>">
                            <div class="form-group">
                              <h6><b>O atendimento foi realizado?</b></h6>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="situacao" id="inlineRadio1" value="Sim">
                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="situacao" id="inlineRadio2" value="Não">
                                <label class="form-check-label" for="inlineRadio2">Não</label>
                              </div>
                            </div>
                            <div class="form-group" id="palco">
                              <div class="form-group" id="Não">
                                <label for="inputState"><b>Qual o motivo do não atendimento?</b></label>
                                <select id="inputState" class="form-control" name="motivo_atendimento">
                                  <option selected>--- Escolha ---</option>
                                  <option>Falta de Recurso</option>
                                  <option>Não Disponibilidade de Médico</option>
                                  <option>Superlotação</option>
                                  <option>Outros</option>
                                </select>

                                <label><b>Deixe sua opinião sobre o não atendimento</b></label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="obs_nao_atendido"></textarea>

                              </div>
                              <div class="form-group" id="Sim">
                                <label><b>Deixe sua opinião sobre o atendimento</b></label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="obs_atendido"></textarea>
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                          <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <center>Fonte: Portal da Transparência</center>
                </div>
              </div><br>
            <?php } ?>
          <?php } elseif($_SESSION['usuarioNiveisAcessoId'] == "1") {
            echo 'Nenhum médico encontrado, deseja <a href="#exampleModal" data-toggle="modal">cadastrar</a> um novo médico ?';
          }elseif(($_SESSION['usuarioNiveisAcessoId'] == "2") || (empty($_SESSION['usuarioNome']))) {
            echo 'Nenhum médico encontrado!!';
          }?>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><b>Cadastrar Médico</b></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="manter-medico.php" method="POST" name="formuser">
                    <input type="hidden" name="acao" value="cadastrar-medico">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Nome</label>
                        <input type="text" name="nome_medico" class="form-control" placeholder="Digite o nome">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Sobrenome</label>
                        <input type="text" name="sobrenome_medico" class="form-control" placeholder="Digite o sobrenome">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>CRM</label>
                        <input type="text" name="crm" class="form-control" placeholder="Digite o CRM">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="inputState">Hospital</label>
                          <select id="inputState" class="form-control" name="hospital">
                            <option selected>--- Escolha ---</option>
                            <?php
                              $result_hospital = "SELECT * FROM hospital";
                              $resultado_hospital = mysqli_query($conn, $result_hospital);
                              while ($row_hospital = mysqli_fetch_assoc($resultado_hospital)){ ?>
                                <option value="<?php echo $row_hospital['id_hospital']?>"><?php echo $row_hospital['nome_hospital']; ?></option><?php
                              }
                            ?>
                          </select>
                      </div>
                        <div class="form-group col-md-6">
                          <label for="inputState">Especialidade</label>
                          <select id="inputState" class="form-control" name="especialidade">
                            <option selected>--- Escolha ---</option>
                            <?php
                              $result_especialidade = "SELECT * FROM especialidade";
                              $resultado_especialidade = mysqli_query($conn, $result_especialidade);
                              while ($row_especialidade = mysqli_fetch_assoc($resultado_especialidade)){ ?>
                                <option value="<?php echo $row_especialidade['id_especialidade']?>"><?php echo $row_especialidade['nome_especialidade']; ?></option><?php
                              }
                            ?>
                          </select>
                        </div>
                      </div>  
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Horário de Entrada</label>
                        <input type="time" name="hr_entrada" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Horário de Saída</label>
                        <input type="time" name="hr_saida" class="form-control">
                      </div>
                    </div>    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
                </form>
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

    <script type="text/javascript">
      function id(el) {
        return document.getElementById(el);
      }

      function mostra(element) {
        if (element) {
          id(element.value).style.display = 'block';
        }
      }

      function esconde_todos($element, tagName) {
        var $elements = $element.getElementsByTagName(tagName),
          i = $elements.length;
        while (i--) {
          $elements[i].style.display = 'none';
        }
      }
      window.addEventListener('load', function() {
        var $Não = id('Não'),
          $Sim = id('Sim'),
          $sexo = id('sel-sexo');

        //mostrando no onload da página
        esconde_todos(id('palco'), 'div');
        mostra(document.querySelector('input[name="situacao"]:checked'));


        //mostrando ao clicar no radio
        var $radios = document.querySelectorAll('input[name="situacao"]');
        $radios = [].slice.call($radios);

        $radios.forEach(function($each) {
          $each.addEventListener('click', function() {
            esconde_todos(id('palco'), 'div');
            mostra(this);
          });
        });
      });
    </script>

</body>

</html>