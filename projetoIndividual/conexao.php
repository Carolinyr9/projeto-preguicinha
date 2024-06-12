

<?php

try {
    $conn = new PDO ("mysql:host=localhost;dbname=db_pelucias","root", "");
} catch(PDOException $e){
    echo "Erro com banco de dados: " . $e->getMessage();
} catch(Exception $e){
    echo "Erro generico: " . $e->getMessage();
}
?>