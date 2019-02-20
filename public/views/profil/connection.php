<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://bootswatch.com/4/sketchy/bootstrap.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" >
        <link rel="stylesheet" href="<?= PROJECT_LINK ?>/public/assets/css/style.css" />
        <title>Label Bulles projet</title>
    </head>
    <body>
        <main>
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <form method="post" action="<?= $router->getFullUrl('pLogin') ?>">
                        <h1 class="d-flex justify-content-center pb-2">Connection</h1>
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
                </div>
            </div>
        </main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>
