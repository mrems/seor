<?php ob_start(); ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Statut</th>
            <th scope="col">Description</th>
            <th scope="col" colspan="2">actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($statuts as $statut) : ?>
            <?php if(empty($_POST['statut_id']) || $_POST['statut_id'] != $statut['statut_id']) : ?>
                <tr>
                    <td><?= $statut['statut_id'] ?></td>
                    <td><?= $statut['statut'] ?></td>
                    <td><?= $statut['description'] ?></td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name="statut_id" value="<?= $statut['statut_id'] ?>" />
                            <button class="btn btn-warning" type="submit">Modifier</button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="<?= URL ?>back/statuts/validationSuppression" onSubmit="return confirm('Voulez-vous vraiment supprimer ?');">
                            <input type="hidden" name="statut_id" value="<?= $statut['statut_id'] ?>" />
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php else : ?> 
                <form method="post" action="<?= URL ?>back/statuts/validationModification">
                    <tr>
                        <td><?= $statut['statut_id'] ?></td>
                        <td><input type="text" name="statut" class="form-control" value="<?= $statut['statut'] ?>" /></td>
                        <td><textarea name='description' class="form-control" rows="3"><?= $statut['description'] ?></textarea></td>
                        <td colspan="2">
                            <input type="hidden" name="statut_id" value="<?= $statut['statut_id'] ?>" />
                            <button class="btn btn-primary" type="submit">Valider</button>
                        </td>
                    </tr>
                </form>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>

<?php 
$content = ob_get_clean();
$titre = "Les statuts";
require "views/commons/template.php";