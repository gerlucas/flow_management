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

        $u = R::dispense('produtos');
        $u->nome = $nome;
        $u->preco = $preco;

        R::store($u);
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
