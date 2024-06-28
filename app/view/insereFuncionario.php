<?php
session_start();
require_once '../controller/funcionarioController.php';

if((isset($_SESSION['funcLogged']) && $_SESSION['funcLogged'] != TRUE) || !isset($_SESSION['funcLogged'])){
    echo '<script>alert("Você não tem permissão para acessar essa página!"); window.location.href = "produtos.php";</script>';
}

$registro = new FuncionarioController();

if(isset($_POST['btnCadastrar'])){
    if(!empty($_POST['email']) && !empty($_POST['nome']) && !empty($_POST['cargo']) && !empty($_POST['usuario']) && !empty($_FILES["foto"]) && !empty($_POST['senha'])){
        $email = $_POST['email'];
        $nome = $_POST[ 'nome'];
        $cargo = $_POST[ 'cargo'];
        $usuario = $_POST[ 'usuario'];
        $foto = $_FILES["foto"]; 
        $senha = $_POST[ 'senha'];
        
        $largura = 1500;
        $altura = 1800; 
        $tamanho = 2048000;
        $error = array();

        if(!preg_match("/^image\/(jpg|jpeg|png|bmp)$/", $foto["type"])){ // Verifica se o tipo de arquivo enviado é uma imagem válida (JPEG, PNG, ou BMP).
            $error[0] = "Isso não é uma imagem."; 
        } 
    
        $dimensoes = getimagesize($foto["tmp_name"]); // Obtém as dimensões (largura e altura) da imagem enviada.
    
        if($dimensoes[0] > $largura) { // Verifica se a largura da imagem excede a largura máxima permitida.
            $error[1] = "A largura da imagem não deve ultrapassar ".$largura." pixels"; 
        }

        if($dimensoes[1] > $altura) {
            $error[2] = "Altura da imagem não deve ultrapassar ".$altura." pixels"; 
        }
        
        if($foto["size"] > $tamanho) {

            $error[3] = "A imagem deve ter no máximo ".$tamanho." bytes";
        }

        if (count($error) == 0) {
        // Verifica se não houve erros durante a validação da imagem.

            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext); // Extrai a extensão do nome do arquivo usando uma expressão regular e armazena-a na variável $ext.

            $nome_imagem = md5(uniqid(time())) . "." . $ext[1]; // Gera um nome único para a imagem usando o tempo atual e a extensão extraída, e o armazena na variável $nome_imagem.

            $caminho_imagem = "../imagens/" . $nome_imagem; // Define o caminho onde a imagem será salva, concatenando o diretório "fotos/" com o nome da imagem.

            move_uploaded_file($foto["tmp_name"], $caminho_imagem); // Move o arquivo enviado para o caminho especificado.        
            
            $registro->registerEmployee($nome,$senha,$email,$cargo,$usuario,$nome_imagem);

            //Variável session atribuida com true caso queira checar nas outras páginas 
            //se o funcionario se logou antes de acessar elas.
            $_SESSION['funcLogged'] = TRUE;
            header('Location:produtos.php');
        
        }

        $totalerro = ""; // Cria uma variável vazia para armazenar mensagens de erro.

        if (count($error) != 0) {
            // Verifica se houve algum erro durante a validação da imagem.
            $totalerro = "";
        
            for ($cont = 0; $cont < sizeof($error); $cont++) {
                // Inicia um loop para percorrer o array de erros.
                if (!empty($error[$cont])) {
                    $totalerro .= $error[$cont] . "\n";
                }
            }
        
            echo '<script>window.alert("' . $totalerro . '"); window.location="insereFuncionario.php";</script>';
        }
        
        
    }else{
        echo '<script>alert("Preencha todos os campos!");</script>';
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
    <link rel="stylesheet" href="./css/insereFunc.css">
    <title>Cadastro de Funcionários</title>
</head>

<body>
    <?php
        include_once '../view/header.php';
    ?>
    <h1>Se registre - Funcionários</h1>
    <form action="insereFuncionario.php" method="post" enctype="multipart/form-data" >
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="cargo" class="form-label">Cargo</label>
            <input type="text" class="form-control" id="cargo" name="cargo" required>
        </div>
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuário</label>
            <input type="text" class="form-control" id="usuario" name="usuario" required>
        </div>
        <div class="mb-3">
            <span>A foto deve ter no máximo 1500px de largura e 1800px de altura</span>
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
        </div>
        
        <input type="submit" value="Cadastrar" class="btn btn-primary" name="btnCadastrar">
        <a href="loginFunc.php" class="redirect">Login</a>
    </form>

    <?php
        include_once './footer.php';
    ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>