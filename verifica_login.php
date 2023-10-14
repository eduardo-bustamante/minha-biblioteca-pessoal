<?php
session_start();
if(!$_SESSION['usuario']) {
	header('Location: index.php');
	exit();
}

require_once 'conexao.php';
$p = new Cadastro("biblioteca", "localhost", "root", "");