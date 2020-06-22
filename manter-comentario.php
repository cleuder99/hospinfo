<?php
session_start();
include("conexao.php");

$situacao = @$_REQUEST['situacao'];
$motivo = @$_REQUEST['motivo_atendimento'];
$obs_nao_atendido = @$_REQUEST['obs_nao_atendido'];
$obs_atendido = @$_REQUEST['obs_atendido'];
$usuario = @$_SESSION['usuarioId'];
$medico = @$_REQUEST['id_medico'];

switch ($_REQUEST['acao']) {
	case 'cadastrar':

		$sql = "INSERT INTO comentario (situacao_atendimento, motivo_atendimento, obs_nao_atendido, obs_atendido, id_usuario, id_medico, created) values ('$situacao', '$motivo', '$obs_nao_atendido', '$obs_atendido', '$usuario', '$medico', NOW())";

		$res = $conn->query($sql) or die($conn->error);

		$link = 'index.php';

		if ($res == true) {
			echo "<script>alert('Cadastrou com Sucesso!')</script>";
			echo " <script>document.location.href='$link'</script>";
		} else {
			echo "<br><div class='alert'>Não foi possível cadastrar.</div>";
		}


		break;
}
