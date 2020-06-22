<?php
	$nome = @$_REQUEST["nome_medico"];
	$sobrenome = @$_REQUEST["sobrenome_medico"];
	$crm = @$_REQUEST["crm"];
	$hospital  = @$_REQUEST["hospital"];
	$especialidade  = @$_REQUEST["especialidade"];
	$hr_entrada = @$_REQUEST["hr_entrada"];
	$hr_saida = @$_REQUEST["hr_saida"];

	include("conexao.php");

	switch ($_REQUEST["acao"]) {
		case 'cadastrar':

			$sql = "SELECT * FROM medico WHERE crm = '$crm'";

			$res = $conn->query($sql) or die($conn->error);
		
			$qtd = mysqli_fetch_assoc($res);

			if($qtd >= 1){
				echo "<script>alert('CRM já está cadastrado!')</script>";
				echo "<script>javascript:history.go(-1)</script>";
			}else{
				$sql = "INSERT INTO medico (nome_medico, sobrenome_medico, crm, hospital, especialidade, hr_entrada, hr_saida) VALUES ('{$nome}', '{$sobrenome}', '{$crm}', '{$email}', '{$hospital}', '{$tipo}', '{$especialidade}', '{$hr_entrada}', '{$hr_saida}')";

				$res = $conn->query($sql) or die($conn->error);

				if($res==true){
					print "<br><div class='alert alert-success'>Cadastrou com sucesso!</div>";
					echo "<script>location.href='index.php';</script>";
				}else{
					print "<br><div class='alert alert-danger'>Não foi possível cadastrar.</div>";
				}
			}

			break;

			case 'cadastrar-medico':

				$sql = "SELECT * FROM cadastro_medico WHERE crm = '$crm'";

				$res = $conn->query($sql) or die($conn->error);
			
				$qtd = mysqli_fetch_assoc($res);

				if($qtd >= 1){
					echo "<script>alert('CRM já está cadastrado!')</script>";
					echo "<script>javascript:history.go(-1)</script>";
				}else{
					$sql = "INSERT INTO cadastro_medico (nome_medico, sobrenome_medico, crm, hospital, especialidade, hr_entrada, hr_saida) VALUES ('{$nome}', '{$sobrenome}', '{$crm}', '{$hospital}', '{$especialidade}', '{$hr_entrada}', '{$hr_saida}')";

					$res = $conn->query($sql) or die($conn->error);

					if($res==true){
						print "<script>alert('Dados inserido para análise!')</script>";
						echo "<script>location.href='index.php';</script>";
					}else{
						print "<br><div class='alert alert-danger'>Não foi possível cadastrar.</div>";
					}
				}

			break;	

		case 'editar':
			$sql = "UPDATE medico SET nome_medico ='{$nome}', sobrenome_medico ='{$sobrenome}', especialidade ='{$especialidade}', hospital ='{$hospital}', hr_entrada ='{$hr_entrada}', hr_saida = '{$hr_saida}' WHERE id_medico =".$_REQUEST["id_medico"];

			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<script>alert('Editou com sucesso!');</script>";
				print "<script>location.href='listar-medico.php';</script>";
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível cadastrar.</div>";
			}
			break;

		case 'excluir':
			$sql = "DELETE FROM medico WHERE id_medico=".$_REQUEST["id_medico"];

			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>location.href='listar-medico.php';</script>";
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível cadastrar.</div>";
			}
			break;
		}
?>