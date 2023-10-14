<?php session_start() ?>
<?php
    if (isset($_SESSION['nao_autenticado'])) {
      echo "<script language='javascript'> alert ('Usuario ou senha invalida!');</script>";
      unset($_SESSION['nao_autenticado']);
       }
       if (isset($_SESSION['branco'])) {
        echo "<script language='javascript'> alert ('Campo usuario ou senha nao pode ficar em branco');</script>";
        unset($_SESSION['branco']);
      }
    ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

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
            <form id="login-form" class="form" method="post" action="login.php">
              <h3 class="text-center text-info">Login</h3>
              <div class="form-group">
                <label for="usuario" class="text-info">Usuario:</label><br>
                <input type="text" name="usuario" id="usuario" class="form-control">
              </div>
              <div class="form-group">
                <label for="senha" class="text-info">Senha:</label><br>
                <input type="password" name="senha" id="senha" class="form-control">
              </div>
              <div class="form-group">
                <input type="submit" name="entrar" class="btn btn-info btn-md" value="Entrar">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>