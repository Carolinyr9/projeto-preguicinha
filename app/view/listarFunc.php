<?php
session_start();
require_once '../controller/funcionarioController.php';

if((isset($_SESSION['funcLogged']) && $_SESSION['funcLogged'] != TRUE) || !isset($_SESSION['funcLogged'])){
    echo '<script>alert("Você não tem permissão para acessar essa página!"); window.location.href = "produtos.php";</script>';
}

$consulta = new FuncionarioController();
$dados = $consulta->getAllEmployeeData();

if(isset($_POST['btnDelete'])){
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $resultado = $consulta->deleteEmployeeDatas($id);

        if($resultado == TRUE){
            echo '<script>alert("Funcionario excluido com sucesso!"); window.location.href = "listarFunc.php";</script>';
        }
    }

}
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
                    <th colspan="2"></th>
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
                            <td><a href='alterarFunc.php?id=<?php echo $linha['id']?>' class='btn-floating orange'><i class='material-icons'>edit</i></a></td>
                            <td>
                                <form action="listarFunc.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $linha['id']?>"></input>
                                    <button type="submit" class='btn-floating blue' name="btnDelete"><i class="material-icons">delete</i></button>
                                </form>
                            </td>
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
