<?php
include('verifica_login.php');

if (isset($_GET['id_view'])) {
  $id_view = $_GET['id_view'];
  $res = $p->buscarDadosLivro($id_view);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Livros</title>
  <!-- Bootstrap CSS -->
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
    <div class="row justify-content-center">
      <div class="col-md-6 d-flex">
        <div class="align-self-center">
          <h2>Livros</h2>
        </div>
      </div>
    </div>

    <table class="table table-info table-striped">
      <thead>
        <tr>
          <th>Código</th>
          <th>Título</th>
          <th colspan="2">Autor</th>
        </tr>
      </thead>
      <tr>
        <?php
        $dados = $p->buscarDados();
        if (count($dados) > 0) {
          for ($i = 0; $i < count($dados); $i++) {
            echo "<tr>";
            foreach ($dados[$i] as $key => $value) {
              echo "<td><p>" . $value . "</p>";
            }
        ?><td>
              <a href="livros.php?id_view=<? echo $dados[$i]['id']; ?>"><i class="fa-regular fa-eye fa-lg icone"></i></a>
              <a href="cadastrar.php?id_up=<? echo $dados[$i]['id']; ?>"><i class="fa-solid fa-pen-to-square fa-lg icone"></i></a>
              <a href="#"><i class="fa-solid fa-trash fa-lg icone" onclick="javascript: if (confirm('Você realmente deseja excluir esta mensagem?'))location.href='livros.php?id=<? echo $dados[$i]['id']; ?>'"></i></a>
            </td> 
            <?
                  echo "</tr>";
                }
              } else { //banco vazio
                echo "<script language='javascript'> alert ('Não há livros cadastrados!');</script>";
                echo "<script language='javascript'>window.location.href='cadastrar.php';</script>";
              }
                  ?>
      </tr>
    </table>
  </div>

  <? if (isset($_GET['id_up'])) {

    echo "<script language='javascript'>window.location.href='cadastrar.php';</script>";
  }
  ?>
  <? if (isset($_GET['id_view'])) {

    require 'visualizar.php';
  }
  ?>


</body>

</html>
<?php
if (isset($_GET['id'])) {
  $id_livro = $_GET['id'];
  $p->excluirLivro($id_livro);

  echo "<script language='javascript'> alert ('Excluido com Sucesso!');</script>";
  echo "<script language='javascript'>window.location.href='livros.php';</script>";
}
?>