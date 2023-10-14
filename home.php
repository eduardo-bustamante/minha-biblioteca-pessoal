<?php
include('verifica_login.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biblioteca</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link href="fonts/css/all.css" rel="stylesheet">

  <!-- Estilo Customizado -->
  <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>
  <header>
    <!-- INICIO DO CABEÇALHO -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
      <a class="navbar-brand" href="index.php">Biblioteca Pessoal</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item ">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="cadastrar.php">Cadastro</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="livros.php">Livros</a>
          </li>
        </ul>
      </div>
      <ul class="navbar-nav mr-5">
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Sair</a>
        </li>
      </ul>
    </nav>
  </header> <!-- FIM DO CABEÇALHO -->

  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-5 mt-5">
        <h3>Biblioteca Particular</h3>

      </div>
    </div>

    <div class="row">
      <div class="col-md-6 offset-md-5 mt-3">

        <a href="cadastrar.php"> <button type="button" class="btn btn-primary">Cadastrar Livros</button></a>
        <a href="livros.php"> <button type="button" class="btn btn-primary">Ver Livros</button></a>
      </div>
    </div>



  </div>

</body>

</html>