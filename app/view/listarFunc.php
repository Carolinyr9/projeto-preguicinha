<?php
session_start();
require_once '../controller/funcionarioController.php';

$consulta = new FuncionarioController();
$dados = $consulta->getAllEmployeeData();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./css/listarFunc.css">
    <title>Funcionários</title>
</head>

<body>
    <?php
        include_once '../view/header.php';
    ?>
    <main>
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
                        while ($linha = $dados->fetch(PDO::FETCH_ASSOC)) { 
                    ?>
                        <tr>
                            <td><?php echo $linha['id']?></td>
                            <td><?php echo $linha['nome']?></td>
                            <td><?php echo $linha['usuario']?></td>
                            <td><?php echo $linha['email']?></td>
                            <td><?php echo $linha['senha']?></td>
                            <td><?php echo $linha['cargo']?></td>
                            <td><img src="../imagens/<?php echo $linha['foto'] ?>" alt="Imagem"></td>
                        </tr>
                    <?php    
                        }
                    ?>
            </tbody>
        </table>
        <a href='insereFuncionario.php' class='btn'>Adicionar Funcionario</a>
    </main>
        

    <?php
        include_once './footer.php';
    ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>
