<?php
   require_once 'config.php';

   if(isset($_POST['btncadastrar'])){
      $nome = filter_input(INPUT_POST,'txtnome');
      $fone = filter_input(INPUT_POST, 'txtfone');
      $data = filter_input(INPUT_POST, 'txtdatanasc');
    
      $sql = $conexao->prepare("INSERT into tabclientes (cliNome, cliTelefone, cliDataNasc) VALUES (:nome,:fone,:date)");
      $sql->bindValue(':nome',$nome);
      $sql->bindValue(':fone', $fone);
      $sql->bindValue(':date', $data);
      $sql->execute();
      header('Location:listar_clientes.php');
      
      // Move echo statement inside the if block
      echo "$nome $data $fone";
   }
?>