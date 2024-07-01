<?php 
session_unset();
session_destroy();
header('Location: ../view/produtos.php');
?>