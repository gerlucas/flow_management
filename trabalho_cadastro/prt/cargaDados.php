<?php

require_once '../classes/autoloader.class.php';
require_once '../classes/r.class.php';

R::setup('mysql:host=127.0.0.1;dbname=testesusuarios', 'root', '');

$u = R::dispense('usuarios');
$u->nome = 'Lucas';
$u->email = 'lucas@gmail.com';
$u->senha = md5('456' . '___');
$u->role = 'administrador';

R::store($u);
?>