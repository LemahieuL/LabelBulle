<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://bootswatch.com/4/sketchy/bootstrap.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" >
        <link rel="stylesheet" href="<?= PROJECT_LINK ?>/public/assets/css/style.css" />
        <title>Label Bulles projet</title>
    </head>
    <body id="backgroud">
        <header id="header">
            <!-- Image de la boutique
            <img src="" alt=""> -->
            <!-- NavBar -->
            <!--Début de la navBar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top mx-auto" id="navBar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?= $router->getFullUrl('index') ?>">Label Bulles</a>
                    <!--Bouton en mode responsive-->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $router->getFullUrl('showShonen') ?>" title="Manga pour garçon">Shōnen</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $router->getFullUrl('showShojo') ?>" title="Manga pour fille">Shōjo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $router->getFullUrl('showSeinen') ?>" title="manga pour jeune homme">Seinen</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <?php if (!isset($_SESSION['auth'])) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= $router->getFullUrl('connection') ?>">Connexion</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= $router->getFullUrl('register') ?>">Inscription</a>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= $router->getFullUrl('profil') ?>">Profil</a>
                                </li>
                                <?php if ($user->hasRank(3)) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= $router->getFullUrl('management') ?>">Gestion</a>
                                    </li>
                                <?php } ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= $router->getFullUrl('disconect') ?>">Déconnexion</a>
                                </li>
                            <?php } ?>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="modal" data-target="#panierModal"><i class="fas fa-shopping-cart fa-2x"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Modal pour le Panier -->
            <div class="modal fade" id="panierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Panier</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Continuer mes achats</button>
                            <button type="button" class="btn btn-primary">Voir mon panier</button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
