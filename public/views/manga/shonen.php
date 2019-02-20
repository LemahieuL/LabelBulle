<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://bootswatch.com/4/sketchy/bootstrap.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" />
        <link rel="stylesheet" href="<?= PROJECT_LINK ?>/public/assets/css/style.css" />
        <title>Label Bulles projet</title>
    </head>
    <body>
        <main>
            <?php foreach ($mangas as $manga) { ?>
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-9">
                            <div class="card mb-3">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        <img class="card-img" src="../../public/assets/image/manga/<?= $manga->getImage(); ?>" alt="image <?= $manga->getImage(); ?>" />
                                    </div>
                                    <div class="col-sm-12 col-md-9">
                                        <div class="card-body">
                                            <h1 class="card-title"><?= $manga->getName(); ?></h1>
                                            <p class="card-text"><?= $manga->getDescription() ?></p>
                                            <a href="#" class="btn btn-primary">Voir les tomes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>
