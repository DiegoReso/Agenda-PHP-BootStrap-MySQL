<?php


$host = "localhost";
$user= "root";
$pass="";
$dbname="agenda";

try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $user,$pass);

  //ativar o modo de erros

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch (PDOException $e) {
  //erro conexao
  $error = $e->getMessage();
  echo "Error: $error";
}