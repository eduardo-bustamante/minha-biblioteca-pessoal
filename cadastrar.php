<?php
include('verifica_login.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Livros</title>

  <title>Cadastro Associação</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link href="fonts/css/all.css" rel="stylesheet">

  <!-- Estilo Customizado -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="js/script.js" defer></script>
</head>

<body>
  <?php
  if (isset($_POST['titulo'])) {
    if (isset($_GET['id_up'])) {
      $id_update = $_GET['id_up'];
      $titulo = $_POST['titulo'];
      $autor = $_POST['autor'];
      $colecao = $_POST['colecao'];
      $edicao = $_POST['edicao'];
      $volume = $_POST['volume'];
      $paginas = $_POST['paginas'];
      $idioma = $_POST['idioma'];
      $ano = $_POST['ano'];
      $editora = $_POST['editora'];
      $tema = $_POST['tema'];
      $quantidade = $_POST['quantidade'];
      $capa = $_FILES['capa']['name'];

      $p->atualizarDados($id_update, $titulo, $autor, $colecao, $edicao, $volume, $paginas, $idioma, $ano, $editora, $tema, $quantidade, $capa);

      echo "<script language='javascript'> alert ('Atualizado com Sucesso!');</script>";
      echo "<script language='javascript'>window.location.href='livros.php';</script>";

    }else{
      $titulo = $_POST['titulo'];
      $autor = $_POST['autor'];
      $colecao = $_POST['colecao'];
      $edicao = $_POST['edicao'];
      $volume = $_POST['volume'];
      $paginas = $_POST['paginas'];
      $idioma = $_POST['idioma'];
      $ano = $_POST['ano'];
      $editora = $_POST['editora'];
      $tema = $_POST['tema'];
      $quantidade = $_POST['quantidade'];
      $capa = $_FILES['capa']['name'];
    
  
  
      $p->cadastrarLivros($titulo, $autor, $colecao, $edicao, $volume, $paginas, $idioma, $ano, $editora, $tema, $quantidade, $capa);
      echo "<script language='javascript'> alert ('Cadastrado com Sucesso!');</script>";

    }
  }
  if (isset($_GET['id_up'])) {
    $id_update = $_GET['id_up'];
    $res = $p->buscarDadosLivro($id_update);
  }

  ?>

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

  <section class="container cadastro">
    <div class="row">
  <div class="col-md-9">
    <div class="row justify-content-center">
      <div class="col-md-6 d-flex">
        <div class="align-self-center">
          <h2 class="display-6" id="cabecalho" ><? if (isset($res)) {echo "ATUALIZAR DADOS";} else {echo "CADASTRO DE LIVRO";} ?></h2>
        </div>
      </div>
    </div>
    <form action="<? if (isset($res)) {echo "cadastrar.php?id_up=" . $id_update;} else {echo "cadastrar.php";} ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titulo">Titulo</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="<? if (isset($res)) {echo $res['titulo'];}?>" required>
      </div>
      <div class="form-row">
        <div class="form-group col-md-8">
          <label for="Autor">Autor</label>
          <input type="text" class="form-control" id="autor" name="autor" value="<? if (isset($res)) {echo $res['autor'];}?>" required>
        </div>
        <div class="form-group col-md-4">
          <label for="">Coleção</label>
          <input type="text" class="form-control" id="colecao" name="colecao"value="<? if (isset($res)) {echo $res['coleção'];}?>">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="">Edição</label>
          <input type="text" class="form-control" id="edicao" name="edicao" value="<? if (isset($res)) {echo $res['edição'];}?>">
        </div>
        <div class="form-group col-md-3">
          <label for="">Volume</label>
          <input type="text" class="form-control" id="volume" name="volume" value="<? if (isset($res)) {echo $res['volume'];}?>">
        </div>
        <div class="form-group col-md-3">
          <label for="">Páginas</label>
          <input type="text" class="form-control" id="paginas" name="paginas" value="<? if (isset($res)) {echo $res['paginas'];}?>" required>
        </div>
        <div class="form-group col-md-3">
          <label for="">Idioma</label>
          <select class="custom-select mr-sm-2" id="idioma" name="idioma" required>
            <option selected >Escolher...</option>
            <option value="1" <?php if (isset($res)) {if ($res['idioma'] == "Português") {echo "selected";}} ?>>Português</option>
            <option value="2" <?php if (isset($res)) {if ($res['idioma'] == "Espanhol") {echo "selected";}} ?>>Español</option>
            <option value="3" <?php if (isset($res)) {if ($res['idioma'] == "Inglês") {echo "selected";}} ?>>Inglês</option>
          </select>

        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-2">
          <label for="">Ano</label>
          <input type="text" class="form-control" id="ano" name="ano" value="<? if (isset($res)) {echo $res['ano'];}?>" required>
        </div>
        <div class="form-group col-md-4">
          <label for="">Editora</label>
          <input type="text" class="form-control" id="editora" name="editora" value="<? if (isset($res)) {echo $res['editora'];}?>" required>
        </div>
        <div class="form-group col-md-4">
          <label for="">Tema</label>
          <input type="text" class="form-control" id="tema" name="tema" value="<? if (isset($res)) {echo $res['tema'];}?>">
        </div>
        <div class="form-group col-md-2">
          <label for="">Quantidade</label>
          <input type="text" class="form-control" id="quantidade" name="quantidade" value="<? if (isset($res)) {echo $res['quantidade'];}?>" required>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Salvar</button>

    
    </div>
    <div class="col-md-3">
      <!-- <div class="imagem">
        <img src="capas/<? //if (isset($res)) {echo $res['capa'];} else{echo 'noimagem.png';};?>" alt="">
      </div> -->

      
      <div class="form-group">
      <label class="picture" for="capa" tabIndex="0">
        <span class="picture__image">
          <?if (isset($res)&& $res['capa']!="") {?>
            <img class="picture__img" src="capas/<? if (isset($res)) {echo $res['capa'];}else{echo 'noimagem.png';}?>">
            <?
          }
?>
        </span>
      </label>

      <input type="file" name="capa" id="capa">
      </div>
    </div>
    </div>
    </form>
  </section>

</body>

</html>

<?

if(isset($_FILES['capa']))
{
   $ext = strtolower(substr($_FILES['capa']['name'],-4)); //Pegando extensão do arquivo
   $new_name = $_FILES['capa']['name']; //Definindo um novo nome para o arquivo
   $dir = 'capas/'; //Diretório para uploads 
   move_uploaded_file($_FILES['capa']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
} 
