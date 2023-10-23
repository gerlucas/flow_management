<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebDev - Autenticação</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        header {
            background-color: #3498db;
            color: white;
            text-align: center;
            padding: 20px;
        }

        header h1 {
            margin: 0;
            font-size: 36px;
        }

        main {
            text-align: center;
            padding: 50px;
        }

        main p {
            font-size: 18px;
            color: #333;
        }

        footer {
            background-color: #3498db;
            color: white;
            text-align: center;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        footer p {
            margin: 0;
        }

        main ul {
            list-style: none;
            padding: 0;
        }

        main li {
            margin: 10px 0;
        }

        main a {
            text-decoration: none;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        main a:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <?php include '../prt/header.prt.php' ?>

    <main>

        <p>Cadastro de Usuarios</p>

        <?php
        require_once '../classes/usuarioservices.class.php';
        ?>

        <form method="get" action="">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome"><br><br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email"><br><br>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha"><br><br>
            <label for="adm">Administrador</label>
            <input type="checkbox" name="adm" id="adm"><br><br>
            <input type="submit" value="Enviar">
        </form>

        <?php
        if (isset($_GET['nome']) && isset($_GET['email']) && isset($_GET['senha'])) {
            UsuarioServices::salvarUsuario($_GET['nome'], $_GET['email'], $_GET['senha'], isset($_GET['adm']));
        }
        ?>
    </main>
    <?php include '../prt/footer.prt.php' ?>
</body>

</html>