<?php ob_start(); ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Espèce</th>
            <th scope="col">Description</th>
            <th scope="col" colspan="2">actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($oiseaux as $oiseau) : ?>
            <tr>
                <td class="align-middle"><?= $oiseau['oiseau_id'] ?></td>
                <td class="align-middle">
                    <img src="<?= URL ?>public/images/<?= $oiseau['oiseau_image'] ?>" style="width:50px" />
                </td>
                <td class="align-middle"><?= $oiseau['oiseau_nom'] ?></td>
                <td class="align-middle"><?= $oiseau['oiseau_description'] ?></td>
                <td class="align-middle">
                    <a href="<?= URL ?>back/oiseaux/modification/<?= $oiseau['oiseau_id'] ?>" class="btn btn-warning">Modifier </a>
                </td>
                <td class="align-middle">
                    <form method="post" action="<?= URL ?>back/oiseaux/validationSuppression" onSubmit="return confirm('Voulez-vous vraiment supprimer ?');">
                        <input type="hidden" name="oiseau_id" value="<?= $oiseau['oiseau_id'] ?>" />
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php 
$content = ob_get_clean();
$titre = "Les oiseaux";
require "views/commons/template.php";