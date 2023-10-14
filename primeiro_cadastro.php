<?php session_start();
require_once 'conexao.php';
$p = new Cadastro("biblioteca", "localhost", "root", "");

if (isset($_POST['usuario'])) {

  $usuario = $_POST['usuario'];
  $senha = md5($_POST['senha']);

  $p->cadastrarLogin($usuario, $senha);
  echo "<script language='javascript'> alert ('Usuario Cadastrado com Sucesso!');</script>";
  echo "<script language='javascript'>window.location.href='index.php';</script>";
  unset($_SESSION['primeiro']);
}

if (isset($_SESSION['primeiro'])) {
  echo "<script language='javascript'> alert ('Bem-vindo ao primeiro cadastro!');</script>";
} else {
  header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Primeiro Cadastro</title>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div id="login">
    <p class="text-center text-primary pt-5 h1 ">Biblioteca Pessoal</p>
    <div class="container">
      <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
          <div id="login-box" class="col-md-12">
            <form id="login-form" class="form" method="post">
              <h3 class="text-center text-info">Primeiro Cadastro</h3>
              <div class="form-group">
                <label for="usuario" class="text-info">Usuario:</label><br>
                <input type="text" name="usuario" id="usuario" class="form-control">
              </div>
              <div class="form-group">
                <label for="senha" class="text-info">Senha:</label><br>
                <input type="password" name="senha" id="senha" class="form-control">
              </div>
              <div class="form-group">
                <input type="submit" name="entrar" class="btn btn-info btn-md" value="Cadastrar">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>