<?php
	$nome = @$_REQUEST["nome_usuario"];
	$sobrenome = @$_REQUEST["sobrenome_usuario"];
	$email  = @$_REQUEST["email_usuario"];
	$senha  = @md5($_REQUEST["senha_usuario"]);

	include("conexao.php");

	session_start();

	switch ($_REQUEST["acao"]) {
		case 'cadastrar':

		$sql = "SELECT * FROM usuario WHERE email_usuario = '$email'";

		$res = $conn->query($sql) or die($conn->error);
	
		$qtd = mysqli_fetch_assoc($res);

			if($qtd >= 1){
				echo "<script>alert('E-mail já esta cadastrado!')</script>";
				echo "<script>javascript:history.go(-1)</script>";
			}else{
				$sql = "INSERT INTO usuario (nome_usuario, sobrenome_usuario, email_usuario, senha_usuario) VALUES ('{$nome}', '{$sobrenome}', '{$email}', '{$senha}')";

				$res = $conn->query($sql) or die($conn->error);
					
				if($res==true){
					echo "<script>alert('Cadastrado com Sucesso!')</script>";
					print "<script>location.href='login.php';</script>";
				}else{
					print "<br><div class='alert alert-danger'>Não foi possível cadastrar.</div>";
				}  
			  }

			break;

		case 'editar':
			$sql = "UPDATE usuario SET nome_usuario ='{$nome}', sobrenome_usuario='{$sobrenome}', email_usuario='{$email}' WHERE id_usuario =".$_REQUEST["id_usuario"];

			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<script>alert('Editou com sucesso!');</script>";
				print "<script>location.href='listar-usuario.php';</script>";
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível cadastrar.</div>";
			}
			break;

		case 'excluir':
			$sql = "DELETE FROM usuario WHERE id_usuario=".$_REQUEST["id_usuario"];

			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<script>alert('Excluido com sucesso!');</script>";
				print "<script>location.href='listar-usuario.php';</script>";
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível cadastrar.</div>";
			}
			break;

		case 'logar':
	        
	    if((empty($_POST['email_usuario'])) || (empty($_POST['senha_usuario']))){
	        $_SESSION['campo_vazio'] = "Preencha todos os campos";
	        echo "<script>location.href='login.php';</script>";
	    }else{
	        $usuario = mysqli_real_escape_string($conn, $_POST['email_usuario']);
	        $senha = mysqli_real_escape_string($conn, $_POST['senha_usuario']);
	        $senha = md5($senha);

	        $result_usuario = "SELECT * FROM usuario WHERE email_usuario = '$usuario' && senha_usuario = '$senha'";
	        $resultado_usuario = mysqli_query($conn, $result_usuario)  or die("Erro no banco de dados!");
	        
	        $resultado = mysqli_fetch_assoc($resultado_usuario);
	        
	        $res = $conn->query($result_usuario) or die($conn->error);

	        if(isset($resultado)){
	            $_SESSION['usuarioId'] = $resultado['id_usuario'];
	            $_SESSION['usuarioNome'] = $resultado['nome_usuario'];
	            $_SESSION['usuarioNiveisAcessoId'] = $resultado['niveis_acesso'];
	            $_SESSION['usuarioEmail'] = $resultado['email_usuario'];
	            if($_SESSION['usuarioNiveisAcessoId'] == "2"){
	                header("Location: administrador.php");
	            }else{
	                header("Location: index.php");
	            }
	        }else{
	            echo "<script>alert('Usuário ou Senha Inválidos!')</script>";
	            echo "<script>location.href='login.php';</script>";
	        }
	    }
	    break;

	    case 'cadastrar-administrador':
	    	$sql = "SELECT * FROM usuario WHERE email_usuario = '$email'";

			$res = $conn->query($sql) or die($conn->error);
		
			$qtd = mysqli_fetch_assoc($res);

				if($qtd >= 1){
					echo "<script>alert('E-mail já esta cadastrado!')</script>";
					echo "<script>javascript:history.go(-1)</script>";
				}else{
					$sql = "INSERT INTO usuario (nome_usuario, sobrenome_usuario, email_usuario, senha_usuario) VALUES ('{$nome}', '{$sobrenome}', '{$email}', '{$senha}')";

					$res = $conn->query($sql) or die($conn->error);
						
					if($res==true){
						echo "<script>alert('Cadastrado com Sucesso!')</script>";
						print "<script>location.href='listar-usuario.php';</script>";
					}else{
						print "<br><div class='alert alert-danger'>Não foi possível cadastrar.</div>";
					}  
				  }

	    	break;

    	case 'sair':
			unset(
				$_SESSION['usuarioId'],
				$_SESSION['usuarioNome'],
				$_SESSION['usuarioNiveisAcessoId'],
				$_SESSION['usuarioEmail'],
				$_SESSION['usuarioSenha']
			);
			header("Location: index.php");
		break;
	}
?>