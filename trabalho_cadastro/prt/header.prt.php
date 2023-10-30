<header>
    <h1>WebDev - Autenticação</h1>
    <?php
    require_once dirname(__DIR__) . '/classes/util.class.php';

    if (Util::isLogado()) { 
        echo "<br><a href='/flow_management/trabalho_cadastro/logout.php'>Logout</a>";
    } else {
    ?>
        <form method="get" action="/flow_management/trabalho_cadastro/autenticar.php">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha">
            <input type="submit" value="Enviar">
        </form>

    <?php
    }
    ?>
</header>