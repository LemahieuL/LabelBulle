<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" >
        <link rel="stylesheet" href="<?= PROJECT_LINK ?>/public/assets/css/style.css" />
        <title>Label Bulles projet</title>
    </head>
    <body>
        <header id="header">
            <!-- Image de la boutique
            <img src="" alt=""> -->
            <!-- NavBar -->
            <!--Début de la navBar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top mx-auto" id="navBar">
                <a class="navbar-brand" href="index.php">Label Bulles</a>
                <!--Bouton en mode responsive-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="./shonen">Shōnen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Shōjo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Seinen</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <ul class="navbar-nav align-items-end">

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" data-target="#panierModal"><i class="fas fa-shopping-cart fa-2x"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $router->getFullUrl('connection') ?>"><i class="fas fa-user-alt fa-2x"></i></a>
                        </li>
                    </ul>
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
        <form method="post" action="<?= $router->getFullUrl('pLogin') ?>">
            <div class="container">
                <div class="row">
                        <div class="col-6">
                            <label for="loginUserName">Login :</label>
                            <input id="loginUserName" name="loginUserName" />
                        </div>
                        <div class="col-6">
                            <label for="loginPassword">Mot de passe :</label>
                            <input id="loginPassword" name="loginPassword"/>
                        </div>
                        <div class="col-6">
                            <a href="<?= $router->getFullUrl('register') ?>">Inscription.</a>
                        </div>
                        <div class="col-6">
                            <a>Mot de passe oublié?</a>
                        </div>
                </div>            
            </div>
            <button type="submit" class="btn btn-primary">Connexion</button>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>
