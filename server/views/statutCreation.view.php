<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>back/statuts/creationValidation">
    <div class="form-group">
        <label for="statut">Libelle</label>
        <input type="text" class="form-control" id="statut" name="statut">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php 
$content = ob_get_clean();
$titre = "Page de création d'un statut";
require "views/commons/template.php";