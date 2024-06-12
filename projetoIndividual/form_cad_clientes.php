<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <!-- Compiled and minified CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <link rel="stylesheet" href="css/estilos.css">
   <!--Import Google Icon Font-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

   <title>Sysexemplo - Cadastro de Clientes</title>
</head>

<body>
   <div class="row">
      <div class="col s12 m6 push-m3">
         <h3 class="light">Cadastro de clientes</h3>
         <form action="cadastrar_clientes.php" method="post">
            <div class="input-field col s12">
               <label for="nome">Nome: </label><br>
               <input type="text" name="txtnome" id="nome">

            </div>
            <div class="input-field col s12">
               <label for="fone">Telefone: </label><br>
               <input type="text" name="txtfone" id="fone">
            </div>
            <div class="input-field col s12">
               <label for="data">Data Nascimento: </label><br>
               <input type="date" name="txtdatanasc" id="data">

            </div>
            <button type="submit" class="btn" name="btncadastrar">Cadastrar </button>
            <a href="listar_clientes.php" class="btn green">Listar clientes</a>
         </form>

      </div>
</body>

</html>