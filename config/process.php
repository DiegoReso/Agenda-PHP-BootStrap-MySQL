<?php


session_start();

include_once("connection.php");
include_once("url.php");


$data = $_POST;

if(!empty($data)){


  if($data['type'] === "create"){
    
    $name = $data['name'];
    $phone = $data['phone'];
    $obs = $data['observation'];

    $query = "INSERT INTO contacts (name,phone,observation) VALUES (:name,:phone,:observation)";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":observation", $obs);
    

    try {
      $stmt->execute();
      $_SESSION["msg"] = "Contato criado com sucesso!";
    } catch (PDOException $e) {
      //erro conexao
      $error = $e->getMessage();
      echo "Error: $error";
    }
  }
  
  if($data["type"] === "edit"){
    
    
  }
  
  //redirect Home
  header("Location:" .$BASE_URL . "../index.php" );
  

}else{

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
  
}

//Fechar conexao
$conn = null;

?>