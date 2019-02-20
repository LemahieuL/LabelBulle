<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://bootswatch.com/4/sketchy/bootstrap.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" >
        <link rel="stylesheet" href="<?= PROJECT_LINK ?>/public/assets/css/style.css" />
        <title>Label Bulles projet</title>
    </head>
    <body>
        <main>
            <div class="container col-8" >
                <p>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#mailFormChanged" aria-expanded="false" aria-controls="collapseExample">
                        Modifier votre adresse mail
                    </button>
                </p>
                <div id="mailFormChanged" class="card collapse">
                    <form method="post">
                        <div class="row  pb-4">
                            <div class="col-sm-12 col-md-8">
                                <label for="mailChanged">Mail</label>
                                <input type="text" class="form-control" id="mailChanged" name="mailChanged" placeholder="Modifier votre Mail" />
                            </div>
                            <div class="col-sm-12 col-md-3 row align-items-end">
                                <button type="submit" class="btn btn-primary mt-2" id="buttonModifier">Modifier</button>
                            </div>
                        </div>
                    </form>
                </div>
                <p>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#passwordFormChanged" aria-expanded="false" aria-controls="collapseExample">
                        Modifier votre mot de passe
                    </button>
                </p>
                <form method="post" id="passwordFormChanged" class="collapse">
                    <div class="row pb-4">
                        <div class="col-sm-12 col-md-8">
                            <label>Mot de passe</label>
                            <input type="text" class="form-control" placeholder="Modifier votre Mail" />
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <label>Confirmation</label>
                            <input type="text" class="form-control" placeholder="Modifier votre Mail" />
                        </div>
                        <div class="col-sm-4 row align-items-end">
                            <button type="submit" class="btn btn-primary mt-2" id="buttonModifier">Modifier</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Gestion des différents manga par les employers et le Gérant -->
            <div class="container col-8">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        example manga 1
                        <span class="badge badge-primary badge-pill text-white">1</span>
                        <a class="badge badge-warning badge-pill text-white" href="#">modifier</a>
                        <a class="badge badge-danger badge-pill text-white" href="#">supprimer</a>
                    </li>
                </ul>
                <div class="my-4">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-sm-12 col-md-3">
                            <a class="btn btn-primary w-1OO text-white" href="<?= $router->getFullUrl('addCollection') ?>">Ajouter une Collection</a>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-sm-12 col-md-3">
                            <a class="btn btn-primary w-1OO text-white" href="<?= $router->getFullUrl('addManga') ?>">Ajouter un Tome</a>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
            <!-- Gestion des utilisateurs par le gérant -->
            <div class="container col-8">
                <ul class="list-group">
                    <?php foreach ($users as $user) { ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= $user->getLastName() ?> <?= $user->getFirstName() ?>
                            <a class="badge badge-warning badge-pill text-white" href="<?= $router->getFullUrl('getEditUser') ?>?id=<?= $user->getId() ?>">modifier</a>
                            <a class="badge badge-danger badge-pill text-white" href="#">supprimer</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="assets/script/script.js"></script>
        <script src="assets/script/register.js"></script>
    </body>
</html>
