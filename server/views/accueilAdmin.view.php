<?php ob_start(); ?>

<?php 
$content = ob_get_clean();
$titre = "Page d'administration du site";
require "views/commons/template.php";
echo '<img src="'.URL.'views/commons/oiseau.jpg" alt="logo seor" width="800px" class="rounded mt-5 d-block mx-auto"/>';