<?php
require_once 'conexao.php';
$p = new Cadastro("biblioteca", "localhost", "root", "");

if (isset($_GET['id_view'])) {
    $id_view = $_GET['id_view'];
    $res = $p->buscarDadosLivro($id_view);
  }
  
  ?>
  <section>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-1 d-flex">
        <div class="align-self-center">
          <p class="h4" >Visualizar</p>
        </div>
      </div>
    </div>
    <div class="row">
    <div class="col-md-9">
    <div class="row justify-content-center">
      <div class="col-md-6 d-flex">
        <div class="align-self-center">
        <table class="table table-sm table-info table-striped">
        <tbody>
          <tr>
            <th scope="row">Código</th>
            <td><? if (isset($res)) {echo $res['id'];} ?></td>
          </tr>
          <tr>
            <th scope="row">Titulo</th>
            <td><? if (isset($res)) {echo $res['titulo'];} ?></td>
          </tr>
          <tr>
            <th scope="row">Autor</th>
            <td><? if (isset($res)) {echo $res['autor'];} ?></td>
          </tr>
          <tr>
            <th scope="row">Coleção</th>
            <td><? if (isset($res)) {echo $res['coleção'];} ?></td>
          </tr>
          <tr>
            <th scope="row">Edição</th>
            <td><? if (isset($res)) {echo $res['edição'];} ?></td>
          </tr>
          <tr>
            <th scope="row">Volume</th>
            <td><? if (isset($res)) {echo $res['volume'];} ?></td>
          </tr>
          <tr>
            <th scope="row">Páginas</th>
            <td><? if (isset($res)) {echo $res['paginas'];} ?></td>
          </tr>
          <tr>
            <th scope="row">idioma</th>
            <td><? if (isset($res)) {echo $res['idioma'];} ?></td>
          </tr>
          <tr>
            <th scope="row">Ano</th>
            <td><? if (isset($res)) {echo $res['ano'];} ?></td>
          </tr>
          <tr>
            <th scope="row">Editora</th>
            <td><? if (isset($res)) {echo $res['editora'];} ?></td>
          </tr>
          <tr>
            <th scope="row">Tema</th> 
            <td><? if (isset($res)) {echo $res['tema'];} ?></td>
          </tr>
          <tr>
            <th scope="row">Quantidade</th>
            <td><? if (isset($res)) {echo $res['quantidade'];} ?></td>
          </tr>
        </tbody>
        </table>
        </div>
      </div>
    </div>
      

      </div>
      <div class="row col-md-3"> 
      <img src="capas/<? if (isset($res)) {echo $res['capa'];} else{echo 'noimagem.png';};?>" alt="" class="imgvisu" >
      </div>
    </div>
      </div>
  </div>

</section>
