<?php
include("conexao.php");

$hospital = @$_REQUEST['nome_hospital'];
$endereco = @$_REQUEST['endereco_hospital'];
$telefone = @$_REQUEST['telefone_hospital'];

switch ($_REQUEST['acao']) {
		case 'cadastrar':

			$sql = "INSERT INTO hospital (nome_hospital, endereco_hospital, telefone_hospital) values ('$hospital', '$endereco', '$telefone')";

			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				echo "<script>alert('Cadastrou com Sucesso!')</script>";
				echo" <script>document.location.href='listar-hospital.php'</script>";
			}else{
				echo "<br><div class='alert'>Não foi possível cadastrar.</div>";
			}
			
			break;

		case 'editar':
			$sql = "UPDATE hospital SET nome_hospital ='{$hospital}', endereco_hospital='{$endereco}', telefone_hospital='{$telefone}' WHERE id_hospital =".$_REQUEST["id_hospital"];

			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<script>alert('Editou com sucesso!');</script>";
				print "<script>location.href='listar-hospital.php';</script>";
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível cadastrar.</div>";
			}
			break;

		case 'excluir':
			$sql = "DELETE FROM hospital WHERE id_hospital=".$_REQUEST["id_hospital"];

			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>location.href='listar-hospital.php';</script>";
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível cadastrar.</div>";
			}
			break;

	}


?>