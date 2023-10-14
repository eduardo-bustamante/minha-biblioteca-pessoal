<?php

class Cadastro
{
    private $pdo;
    public function __construct($dbname, $host, $user, $senha)
    {
        try {
            $this->pdo = new PDO("mysql:dbname=" . $dbname . ";host=" . $host, $user, $senha);
            // echo "FUNCIANDO";
        } catch (PDOexception $e) {
            echo "Erro com Banco de Dados " . $e->getMessage();
            exit();
        } catch (exception $e) {
            echo "Erro Genérico " . $e->getMessage();
            exit();
        }
    }

    public function cadastrarLivros($titulo, $autor, $colecao, $edicao, $volume, $paginas, $idioma, $ano, $editora, $tema, $quantidade, $capa)
    {

        $cmd = $this->pdo->prepare("INSERT INTO livros (titulo, autor, coleção, edição, volume, paginas, idioma, ano, editora, tema, quantidade, capa) VALUES (:titulo, :autor, :colecao, :edicao, :volume, :paginas, :idioma, :ano, :editora, :tema, :quantidade, :capa);");

        $cmd->bindValue(":titulo", $titulo);
        $cmd->bindValue(":autor", $autor);
        $cmd->bindValue(":colecao", $colecao);
        $cmd->bindValue(":edicao", $edicao);
        $cmd->bindValue(":volume", $volume);
        $cmd->bindValue(":paginas", $paginas);
        $cmd->bindValue(":idioma", $idioma);
        $cmd->bindValue(":ano", $ano);
        $cmd->bindValue(":editora", $editora);
        $cmd->bindValue(":tema", $tema);
        $cmd->bindValue(":quantidade", $quantidade);
        $cmd->bindValue(":capa", $capa);
        $cmd->execute();

        return true;
    }

    public function buscarDados()
    {
        $res = array();
        $cmd = $this->pdo->query("SELECT id, titulo, autor FROM livros ORDER BY id");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function buscarDadosLivro($id_up)
    {
        $res = array();
        $cmd = $this->pdo->prepare("SELECT livros.id, titulo, autor, coleção, edição, volume, paginas, idiomas.idioma, ano, editora, tema, quantidade, capa FROM livros JOIN idiomas on idiomas.id_idiomas = livros.idioma WHERE livros.id = :id");
        $cmd->bindValue(":id", $id_up);
        $cmd->execute();
        $res = $cmd->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function excluirLivro($id)
    {
        $cmd = $this->pdo->prepare("DELETE from livros WHERE id = :id");
        $cmd->bindValue(":id", $id);
        $cmd->execute();
    }

    public function atualizarDados($id_update, $titulo, $autor, $colecao, $edicao, $volume, $paginas, $idioma, $ano, $editora, $tema, $quantidade, $capa)
    {
        $cmd = $this->pdo->prepare("UPDATE livros SET titulo = :titulo, autor = :autor, coleção = :colecao, edição = :edicao, volume = :volume, paginas = :paginas, idioma = :idioma, ano = :ano, editora = :editora, tema = :tema, quantidade = :quantidade, capa = :capa WHERE id = :id");

        $cmd->bindValue(":titulo", $titulo);
        $cmd->bindValue(":autor", $autor);
        $cmd->bindValue(":colecao", $colecao);
        $cmd->bindValue(":edicao", $edicao);
        $cmd->bindValue(":volume", $volume);
        $cmd->bindValue(":paginas", $paginas);
        $cmd->bindValue(":idioma", $idioma);
        $cmd->bindValue(":ano", $ano);
        $cmd->bindValue(":editora", $editora);
        $cmd->bindValue(":tema", $tema);
        $cmd->bindValue(":quantidade", $quantidade);
        $cmd->bindValue(":id", $id_update);
        $cmd->bindValue(":capa", $capa);
        $cmd->execute();

        return true;
    }

    public function login()
    {
        $res = array();
        $cmd = $this->pdo->query("SELECT idUser, usuario, senha FROM login ORDER BY idUser");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function cadastrarLogin($usuario, $senha)  {

        $cmd = $this->pdo->prepare("INSERT INTO login (usuario, senha) VALUES (:usuario, :senha);");

        $cmd->bindValue(":usuario", $usuario);
        $cmd->bindValue(":senha", $senha);
        $cmd->execute();

        return true;
        
    }
}
