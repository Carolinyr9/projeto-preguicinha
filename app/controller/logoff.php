<?php
session_start(); // Inicia a sessão antes de destruí-la
session_unset();
session_destroy();
header('Location: ../view/produtos.php');
exit; // Adicione exit após o redirecionamento
?>