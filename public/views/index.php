<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Label Bulle</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
        <link rel="stylesheet" href="<?= PROJECT_LINK ?>/public/assets/css/style.css" />
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
                            <a class="nav-link" data-toggle="modal" data-target="#compteModal"><i class="fas fa-user-alt fa-2x"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Modal pour le compte -->
            <div class="modal fade" id="compteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="<?= $router->getFullUrl('pLogin') ?>">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="col-12">
                                                <label for="loginModal">Login :</label>
                                                <input id="loginModal" name="loginModal" />
                                            </div>
                                            <div class="col-12">
                                                <label for="pwdModal">Mot de passe :</label>
                                                <input id="pwdModal" name="pwdModal"/>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="col-12">
                                                <a href="<?= $router->getFullUrl('register') ?>">Inscription.</a>
                                            </div>
                                            <div class="col-12">
                                                <a>Mot de passe oublié?</a>
                                            </div>
                                        </div>

                                    </div>            
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Connexion</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
        <main>
            <!-- Carrousel -->
            <div class="container-fluid">

            </div>
            <!-- News -->
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-8 ">
                        <div class="card text-center">
                            <!-- <div class="card-header">
                            Featured
                          </div> -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="public/assets/image/logo_label-bulles.jpg" alt="Image logo">
                                    </div>
                                    <div class="col-lg-8">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                2 days ago
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-8 ">
                        <div class="card text-center">
                            <!-- <div class="card-header">
                            Featured
                          </div> -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="public/assets/image/logo_label-bulles.jpg" alt="Image logo">
                                    </div>
                                    <div class="col-lg-8">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                2 days ago
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-8 ">
                        <div class="card text-center">
                            <!-- <div class="card-header">
                            Featured
                          </div> -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="public/assets/image/logo_label-bulles.jpg" alt="Image logo">
                                    </div>
                                    <div class="col-lg-8">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                2 days ago
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-8 ">
                        <div class="card text-center">
                            <!-- <div class="card-header">
                              Featured
                            </div> -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="public/assets/image/logo_label-bulles.jpg" alt="Image logo">
                                    </div>
                                    <div class="col-lg-8">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                2 days ago
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <div class="container-fluid" id="footerStyle">
            </div>
        </footer>        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    </body>
</html>
