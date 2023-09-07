<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>back/oiseaux/modificationValidation" enctype="multipart/form-data">
    <input type="hidden" name="oiseau_id" value="<?= $oiseau['oiseau_id']; ?>" />
    <div class="form-group">
        <label for="oiseau_nom">Nom de l'oiseau :</label>
        <input type="text" class="form-control" id="oiseau_nom" name="oiseau_nom" value="<?= $oiseau['oiseau_nom'] ?>">
    </div>
    <div class="form-group">
        <label for="oiseau_description">Description</label>
        <textarea class="form-control" id="oiseau_description" name="oiseau_description" rows="3"><?= $oiseau['oiseau_description'] ?></textarea>
    </div>
    <div class="form-group">
        <img src="<?= URL ?>public/images/<?= $oiseau['oiseau_image'] ?>" style="width:50px;" />
        <label for="image">Image :</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <div class="form-group">
        <label for="image">Statut :</label>
        <select class="form-control" name="statut_id">
            <option></option>
            <?php foreach ($statuts as $statut) : ?>
                <option value="<?= $statut['statut_id'] ?>"
                    <?php if($statut['statut_id'] === $oiseau['statut_id']) echo "selected"; ?>
                    >
                    <?= $statut['statut_id'] ?> - <?= $statut['statut'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class='row no-gutters'>
        <div class="col-1"></div>
        <?php foreach($alimentations as $alimentation) : ?>
            <div class="form-group form-check col-2">
                <input type="checkbox" class="form-check-input" name="alimentation-<?= $alimentation['alimentation_id'] ?>"
                    <?php if(in_array($alimentation['alimentation_id'],$tabAlimentations)) 
                        echo "checked";
                    ?>
                >
                <label class="form-check-label" for="exampleCheck1"><?= $alimentation['alimentation'] ?></label>
            </div>
        <?php endforeach; ?>
        <div class="col-1"></div>
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

<?php 
$content = ob_get_clean();
$titre = "Page de modification de l'oiseau : ". $oiseau['oiseau_nom'];
require "views/commons/template.php";