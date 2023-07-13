<?php



session_start();

include_once("connection.php");
include_once("url.php");

$id;

if(!empty($_GET)){
  $id = $_GET['id'];
}

//retorna o dado de um contato
if(!empty($id)){

$query = "SELECT * FROM contacts WHERE id = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam(":id", $id);

$stmt->execute();
//recebe um unico contato atraves do parametro id passado na url
$contact = $stmt->fetch();
  

}else{
//retorna todos os contatos
$query = "SELECT * FROM contacts";

$stmt = $conn->prepare($query);

$stmt->execute();
//recebe todos os contatos
$contacts = $stmt->fetchAll();

}

?>