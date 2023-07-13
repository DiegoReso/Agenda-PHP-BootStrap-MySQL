<?php 
include_once("templates/header.php");

?>

<div class="container">
  <?php include_once("templates/backbtn.html");?>
  <h1 id="main-title">Editar Contato</h1>
  <form id="edit-form" action="<?=$BASE_URL?>config/process.php" method="POST">
    <input type="hidden" name="type" value="edit">
    <input type="hidden" name="id" value="<?= $contact['id']?>">
    <div class="form-group">
      <label for="name">Nome do contato:</label>
      <input type="text" id="name" name="name" class="form-control" placeholder="Preencha o nome do contato"
        value="<?= $contact['name']?>" required>
    </div>
    <div class="form-group">
      <label for="phone">Telefone do contato:</label>
      <input type="text" id="phone" name="phone" class="form-control" placeholder="Preencha o tel do contato"
        value="<?= $contact['phone']?>" required>
    </div>
    <div class="form-group">
      <label for="observations">Observações</label>
      <textarea type="text" id="observation" name="observation" class="form-control"
        placeholder="Insira as observações"><?= $contact['observation']?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
  </form>
</div>
<?php 

include_once("templates/footer.php")

?>