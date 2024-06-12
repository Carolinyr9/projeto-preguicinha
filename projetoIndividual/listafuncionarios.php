<?php
include_once 'cabecalho.php';
include_once 'conexao.php';

echo "<h1 class='center-align'>Consultando Funcionários</h1>";

$dado = '%a%';

$sql = "SELECT * FROM tabfuncionarios WHERE funNome LIKE '$dado' ORDER BY funNome";

$consulta = $conn->prepare($sql);
$consulta->execute();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Funcionários</title>
    <style>
        h1 {
            margin: 20px 0;
            color: #EE6E73; /* Cor do título rosa mais escuro */
        }

        img {
            width: 100%;
            max-width: 150px; /* Ajuste conforme necessário */
            height: auto;
        }

        body,
        table,
        form {
            width: 100%;
            text-align: center;
            margin: auto;
            background-color: #fce4ec; /* Cor de fundo rosa claro */
            padding: 20px;
            border-radius: 10px;
        }

        table {
            margin-top: 20px;
            background-color: #FFA5AA; /* Cor da tabela rosa claro */
        }

        table th,
        table td {
            color: #DF696E; /* Cor do texto rosa mais escuro */
        }

        form button {
            background-color: #DF696E; /* Cor do botão rosa mais escuro */
            color: white; /* Cor do texto branco */
        }

        form button:hover {
            background-color: #D6656B; /* Cor do botão rosa mais escura ao passar o mouse */
        }
    </style>
</head>

<body>
    <div class="container">
        <table class="striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Senha</th>
                    <th>Email</th>
                    <th>Cargo</th>
                    <th>Usuário</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    foreach ($registro as $key => $value) {
                        if ($key == "funFoto") {
                            echo "<td>";
                            echo "<img src='imagens/" . $value . ".webp' alt='Imagem'>";
                            echo "</td>";
                        } else {
                            echo "<td>";
                            echo $value;
                            echo "</td>";
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <form action="inserefuncionario.php" method="post">
            <button type="submit" class="btn">Voltar</button>
        </form>
    </div>

    <?php include_once "footer.php"; ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>
