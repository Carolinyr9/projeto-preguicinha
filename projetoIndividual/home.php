<?php
include_once 'cabecalho.php';
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Preguicinha</title>
    <style>
        img {
            width: 30vw;
            margin: auto;
        }

        .imagem-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
        }
    </style>
<body>

    <div class="imagem-container">
        <img src="imagens/Preguicinha.png" alt="Imagem de Preguiça">
    </div>


    <?php include_once "footer.php"; ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>