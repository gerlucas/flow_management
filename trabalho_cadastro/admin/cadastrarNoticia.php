<?php
require_once '../classes/usuarioservices.class.php';
if (isset($_POST['nome']) && isset($_POST['desc'])) {
    $nome = $_POST['nome'];
    $desc = $_POST['desc'];

    if (isset($_FILES['imagem'])) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["imagem"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if ($uploadOk) {
            if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $targetFile)) {
                $caminhoImagem = $targetFile;
                UsuarioServices::salvarNoticia($nome, $desc, $caminhoImagem);

                echo "Imagem salva no banco de dados com sucesso.";

                R::close();
            } else {
                echo "Houve um erro ao enviar seu arquivo.";
            }
        } else {
            echo "Desculpe, seu arquivo não foi enviado.";
        }
    }
}
