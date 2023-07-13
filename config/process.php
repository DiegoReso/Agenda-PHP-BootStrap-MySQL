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
  
  else if($data["type"] === "edit"){
    
    $name = $data['name'];
    $phone = $data['phone'];
    $obs = $data['observation'];
    $id = $data['id'];

    $query = "UPDATE contacts
              SET name = :name, phone = :phone, observation = :observation WHERE id = :id";

    $stmt = $conn->prepare($query);
    
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":observation", $obs);
    $stmt->bindParam(":id", $id);
    
    try {
      $stmt->execute();
      $_SESSION["msg"] = "Contato atualizado com sucesso!";
    } catch (PDOException $e) {
      //erro conexao
      $error = $e->getMessage();
      echo "Error: $error";
    }
  }else if($data['type'] === "delete"){

    $id = $data['id'];

    $query = "DELETE FROM contacts WHERE id = :id";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":id", $id);
    
    try {
      $stmt->execute();
      $_SESSION["msg"] = "Contato removido com sucesso!";
    } catch (PDOException $e) {
      //erro conexao
      $error = $e->getMessage();
      echo "Error: $error";
    }
    
    

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