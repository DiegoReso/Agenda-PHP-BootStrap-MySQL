<?php 
include_once("templates/header.php")
?>

<div class="container">
  <?php include_once("templates/backbtn.html");?>
  <h1 id="main-title">Criar Contato</h1>
  <form id="create-form" action="<?=$BASE_URL?>config/process.php" method="POST">
    <input type="hidden" name="type" value="create">
    <div class="form-group">
      <label for="name">Nome do contato:</label>
      <input type="text" id="name" name="name" class="form-control" placeholder="Preencha o nome do contato" required>
    </div>
    <div class="form-group">
      <label for="phone">Telefone do contato:</label>
      <input type="text" id="phone" name="phone" class="form-control" placeholder="Preencha o tel do contato" required>
    </div>
    <div class="form-group">
      <label for="observation">Observações</label>
      <textarea type="text" id="observations" name="observations" class="form-control"
        placeholder="Insira as observações"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>
</div>
<?php 

include_once("templates/footer.php")

?>