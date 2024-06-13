<?php

$env = file_get_contents(__DIR__."/../.env");
$lines = explode("\n",$env);

foreach($lines as $line){
  preg_match("/([^#]+)\=(.*)/",$line,$matches);
  if(isset($matches[2])){
    putenv(trim($line));
  }
} 

// Retrive env variable
$host = getenv('CONN_HOST');
$db = getenv('CONN_DB');
$userName = getenv('CONN_USER_NAME');
$pass = getenv('CONN_PASSWORD');

try {
    $conn = new PDO ("mysql:host=localhost;dbname=db_pelucias","root", "Fthyy*83u");
} catch(PDOException $e){
    echo "Erro com banco de dados: " . $e->getMessage();
} catch(Exception $e){
    echo "Erro generico: " . $e->getMessage();
}
?>