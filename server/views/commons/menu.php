
<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #e3f2fd">
    <a class="navbar-brand" href="#">
        <img src="<?= URL ?>views/commons/logo.png" alt='logo seor' width='100px' class="rounded"/>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php if(!Securite::verifAccessSession()) :?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>back/login">Login</a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>back/admin">Accueil</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Statuts
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= URL ?>back/statuts/visualisation">Visualisation</a>
                        <a class="dropdown-item" href="<?= URL ?>back/statuts/creation">Création</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Oiseaux
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= URL ?>back/oiseaux/visualisation">Visualisation</a>
                        <a class="dropdown-item" href="<?= URL ?>back/oiseaux/creation">Création</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>back/deconnexion">Deconnexion</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>