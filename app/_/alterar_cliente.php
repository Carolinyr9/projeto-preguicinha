<?php
require_once "config.php"; //incluindo o arquivo de conexão com o banco de dados
include_once "cabecalho.html"; //incluindo o arquivo de cabeçalho com acesso ao materializze
$codigo = $_GET['id']; //obtendo o código do cliente selecionado, a partir da lista de clientes,
$consulta = $conexao->prepare('SELECT * FROM tabclientes WHERE cliId = :code');

$consulta->bindValue(':code', $codigo);
$consulta->execute();
$linha = $consulta->fetch (PDO::FETCH_ASSOC); //armazenando o registro selecionado
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Cliente</title>
</head>
<body>
<div class="row">
   <div class="col s12 m6 push-m3">
      <h3 class="light">Alterando clientes</h3>
      <?php echo "Cliente: {$linha['cliId']}"; ?>
      <form action="altera_cliente_action.php" method="post">
         <!--código do cliente-->
         <input type="hidden" name="txtid" value="<?php echo "{$linha['cliId']}"; ?>">
         <!--nome do cliente-->
         <div class="input-field col s12">
            <label for="nome">Nome: </label><br>
            <input type="text" name="txtnome" id="nome" value="<?php echo "{$linha['cliNome']}"; ?>">
         </div>
         <!--telefone do cliente-->
         <div class=" input-field col s12">
            <label for="fone">Telefone: </label><br>
            <input type="text" name="txtfone" id="fone" value="<?php echo "{$linha['cliTelefone']}"; ?>">
         </div>
         <!--data de nascimento do cliente-->
         <div class=" input-field col s12">
            <label for="data">Data Nascimento: </label><br>
            <input type="date" name="txtdatanasc" id="data" value="<?php echo "{$linha['cliDataNasc']}"; ?>">
         </div>
         <!--botões de controle -->
         <button type="submit" class="btn" name="btnalterar">Alterar </button>
         <a href="listar_clientes.php" class="btn green">Listar clientes</a>
      </form>


   </div>

</body>
</html>