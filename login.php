<?php
session_start();
require_once 'conexao.php';
$p = new Cadastro("biblioteca", "localhost", "root", "");

$dados = $p->login();

if (count($dados) == 0) {
	$_SESSION['primeiro'] = true;
	header('Location: primeiro_cadastro.php');
} else {
	if (empty($_POST['usuario']) || empty($_POST['senha'])) {
		$_SESSION['branco'] = true;
		header('Location: index.php');
		exit();
	} else {
		if (count($dados) > 0) {
			for ($i = 0; $i < count($dados); $i++) {
				if ($_POST['usuario'] == $dados[$i]['usuario']  && md5($_POST['senha']) == $dados[$i]['senha']) {
					$_SESSION['usuario'] = $_POST['usuario'];
					header('Location: home.php');
					exit();
				}
			}
			$_SESSION['nao_autenticado'] = true;
			header('Location: index.php');
			exit();
		}
	}
}
