<?php
session_start();
require_once '../controller/produtoController.php';

$registro = new ProdutoController();

if(isset($_POST['btncadastrar'])){
    if(!empty($_POST['txtdescricao']) && !empty($_POST['txtpreco']) && !empty($_FILES['fileimagem'])){
        $descricao = $_POST['txtdescricao'];
        $preco = $_POST['txtpreco'];
        $foto = $_FILES['fileimagem'];

        $largura = 1500;
        $altura = 1800; 
        $tamanho = 2048000;
        $error = array();

        if(!preg_match("/^image\/(jpg|jpeg|png|bmp|webp)$/", $foto["type"])){ // Verifica se o tipo de arquivo enviado é uma imagem válida (JPEG, PNG, ou BMP).
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

            preg_match("/\.(gif|bmp|png|jpg|jpeg|webp){1}$/i", $foto["name"], $ext); // Extrai a extensão do nome do arquivo usando uma expressão regular e armazena-a na variável $ext.

            $nome_imagem = md5(uniqid(time())) . "." . $ext[1]; // Gera um nome único para a imagem usando o tempo atual e a extensão extraída, e o armazena na variável $nome_imagem.

            $caminho_imagem = "../imagens/" . $nome_imagem; // Define o caminho onde a imagem será salva, concatenando o diretório "fotos/" com o nome da imagem.

            move_uploaded_file($foto["tmp_name"], $caminho_imagem); // Move o arquivo enviado para o caminho especificado.        
            
            $registro->registerProduct($descricao,$nome_imagem,$preco);
            header('Location:listarProdutos.php');
        
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="./css/formCli.css">
</head>
<body>
    <?php
    include_once './header.php';
    ?>
    <div class="container">
         <h3 class="light">Cadastro de Produtos</h3>
         <form action="form_cad_produtos.php" method="POST" enctype="multipart/form-data">
            <label>Descrição: 
                <input type="text" name="txtdescricao">
            </label>

            <label>Preço: 
                <input type="text" name="txtpreco">
            </label>

            <label>Imagem:
                <input type="file" class="form-control" id="fileimagem" name="fileimagem" required>
            </label>
            

            <button type="submit" name="btncadastrar" class="btn">Cadastrar</button>
         </form>
    </div>
    <?php include_once './footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>