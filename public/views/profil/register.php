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
        <main>
            <!-- Début du formulaire -->
            <div class="container" id="containerForm">
                <div class="row">
                    <div class="col-md-10">
                        <form method="post" action="<?= $router->getFullUrl('createUser') ?>">
                            <h1 class="d-flex justify-content-center pb-2">Inscription</h1>
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-6">
                                    <label for="firstName">*Nom : <?php if (isset($errors['firstName'])) { ?><span class="red-text"><?= $errors['firstName']; ?></span><?php } ?></label>
                                    <input type="text" class="form-control" name="firstName" id="firstName" value="<?= isset($firstName) ? $firstName : ''; ?>" placeholder="Votre Nom" />
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label for="lastName">*Prénom : <?php if (isset($errors['lastName'])) { ?><span class="red-text"><?= $errors['lastName']; ?></span><?php } ?></label>
                                    <input type="text" class="form-control" name="lastName" id="lastName" value="<?= isset($lastName) ? $lastName : ''; ?>" placeholder="Votre Prénom" />
                                </div>
                            </div>  
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-4">
                                    <label for="birthDay">Date de naissance : <?php if (isset($errors['birthDay'])) { ?><span class="red-text"><?= $errors['birthDay']; ?></span><?php } ?></label>
                                    <input type="text" class="form-control" name="birthDay" id="birthDay" value="<?= isset($birthDay) ? $birthDay : ''; ?>" />
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <label for="civility">Civilité : </label>
                                    <select name="civility" id="civility" class="form-control">
                                        <option value="1">Mr</option>
                                        <option value="2">Mme</option>
                                        <option value="3" >Non-Binaire</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <label for="phoneNumber">Téléphone: <?php if (isset($errors['phoneNumber'])) { ?><span class="red-text"><?= $errors['phoneNumber']; ?></span><?php } ?></label>  
                                    <input type="tel" class="form-control" name="phoneNumber" id="phoneNumber" value="<?= isset($phone) ? $phone : ''; ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-5">
                                    <label for="login">*Identifiant : <?php if (isset($errors['userName'])) { ?><span class="red-text"><?= $errors['userName']; ?></span><?php } ?></label>
                                    <input type="text" class="form-control" name="login" id="login" value="<?= isset($login) ? $login : ''; ?>" placeholder="Votre Pseudo" />
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <label for="mail">*Mail : <?php if (isset($errors['mail'])) { ?><span class="red-text"><?= $errors['mail']; ?></span><?php } ?></label>
                                    <input type="text" class="form-control" name="mail" id="mail" value="<?= isset($mail) ? $mail : ''; ?>" placeholder="Example@adresse.mail" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 col-md-6">
                                    <label for="password">*Mot de passe : <?php if (isset($errors['password'])) { ?><span class="red-text"><?= $errors['password']; ?></span><?php } ?></label>
                                    <input type="password" class="form-control" name="password" id="password" value="<?= isset($password) ? $password : ''; ?>" placeholder="•••••••" />
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label for="confirmation">*Confirmation : <?php if (isset($errors['password'])) { ?><span class="red-text"><?= $errors['password']; ?></span><?php } ?></label>
                                    <input type="password" class="form-control" name="confirmation" id="confirmation" value="<?= isset($confirmation) ? $confirmation : ''; ?>" placeholder="•••••••" />
                                </div>
                            </div>
                            <p>Les champs avec un "*" sont obligatoires.</p>
                            <button class="btn btn-info my-4 btn-block" type="submit">Validation</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Fin du formulaire -->
        </main>
        <footer>
            <div class="container-fluid" id="footerStyle">

            </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="assets/script/script.js"></script>
        <script src="assets/script/register.js"></script>
        <script>
            $(function () {
                $('#birthDay').mask('00/00/0000', {placeholder: '__/__/____'});
                $('#phone').mask('00.00.00.00.00');
            })
        </script>
    </body>
</html>

