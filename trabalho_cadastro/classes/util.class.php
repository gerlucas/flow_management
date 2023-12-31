<?php

class Util
{
    public static function isLogado()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        return isset($_SESSION['usuario']);
    }

    public static function logout()
    {
        if (!isset($_SESSION)) session_start();
        session_destroy();
        header('Location:/flow_management/trabalho_cadastro/index.php');
        die();
    }

    public static function validarAcesso()
    {
        session_start();
        if (isset($_SESSION['usuario'])) {
            $nome = $_SESSION['usuario'];
        } else {
            header('refresh:5;url=index?acessonaoautorizado.php');
            echo '<h1>Você não está logado. Tente novamente em 5 segundos.</h1>';
            die();
        }
    }

    public static function autenticarUsuario($email, $senha)
    {
        require_once 'classes/autoloader.class.php';

        R::setup('mysql:host=127.0.0.1;dbname=testesusuarios', 'root', '');

        $usuario = R::findOne('usuarios', 'email = ? and senha = ?', [$email, md5($senha . '___')]);
        if (isset($usuario)) {
            session_start();
            $_SESSION['usuario'] = $usuario->nome; 
            $_SESSION['email'] = $usuario->email;

            if ($usuario->role === 'gerente') { 
                header('Location:/flow_management/trabalho_cadastro/admin/index.php');
            } else if($usuario->role === 'caixa') {
                header('Location:/flow_management/trabalho_cadastro/caixa/index.php');
            }  else if($usuario->role === 'cliente') {
            header('Location:/flow_management/trabalho_cadastro/usuarios/index.php');
        }
        } else {
            header('refresh:5;url=/flow_management/trabalho_cadastro/index.php');
            echo '<h1>Dados incorretos. Tente novamente em 5 segundos.</h1>';
        }

        R::close();
    }
}
