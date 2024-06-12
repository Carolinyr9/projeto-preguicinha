<?php
include_once 'config.php';
include_once 'cabecalho.html';
$consulta = $conexao->prepare('Select * from tabclientes');
$consulta->execute();
?>
<title>Lista de clientes</title>
</head>

<body>
   <h2>Listagem de clientes</h2>
   <table>
      <tr>
         <th>Código</th>
         <th>Nome</th>
         <th>Telefone</th>
         <th>Data Nasc.</th>
         <th colspan="2">Ações</th>
      </tr>
      <?php
      while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
         echo "<tr><td>{$linha['cliId']}</td>";
         echo "<td>{$linha['cliNome']}</td>";
         echo "<td>{$linha['cliTelefone']}</td>";
         echo "<td>{$linha['cliDataNasc']}</td>";
         echo "<td><a href='alterar_cliente.php?id={$linha['cliId']}' class='btn-floating orange'><i class='material-icons'>edit</i></a></td>";
         echo "<td><a href='excluir_cliente_action.php?id={$linha['cliId']}' class='btn-floating blue'><i class='material-icons'>delete</i></a></td></tr>";

      }
      echo "</table>";
      echo "<a href='form_cad_clientes.php' class='btn'>Adicionar cliente</a>";
      //include_once 'rodape.php';
      ?>