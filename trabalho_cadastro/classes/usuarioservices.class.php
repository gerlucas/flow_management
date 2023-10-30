<?php
class UsuarioServices
{
    public static function salvarUsuario($nome, $email, $senha, $role)
    {
        require_once '../classes/r.class.php';
        require_once '../classes/autoloader.class.php';

        R::setup('mysql:host=127.0.0.1;dbname=testesusuarios', 'root', '');

        $u = R::dispense('usuarios');
        $u->nome = $nome;
        $u->email = $email;
        $u->senha = md5($senha . '___');
        $u->role = $role;

        R::store($u);
        R::close();
    }

    public static function salvarProduto($nome, $preco)
    {
        require_once '../classes/r.class.php';
        require_once '../classes/autoloader.class.php';

        R::setup('mysql:host=127.0.0.1;dbname=testesusuarios', 'root', '');

        $p = R::dispense('produtos');
        $p->nome = $nome;
        $p->preco = $preco;

        R::store($p);
        R::close();
    }

    public static function salvarNoticia($nome, $desc, $img)
    {
        require_once '../classes/r.class.php'; 
        require_once '../classes/autoloader.class.php'; 
        R::setup('mysql:host=127.0.0.1;dbname=testesusuarios', 'root', '');

        $n = R::dispense('noticias');
        $n->nome = $nome;
        $n->desc = $desc;
        $n->caminho_imagem = $img;

        R::store($n);
        R::close();
    }

    public static function localizarTodos()
    {
        require_once '../classes/r.class.php';
        R::setup('mysql:host=127.0.0.1;dbname=testesusuarios', 'root', '');
        $usuarios = R::findAll('usuarios');
        R::close();
        return $usuarios;
    }
}
