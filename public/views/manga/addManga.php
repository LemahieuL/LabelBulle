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
                <div class="row">
                    <form method="post" action="<?= $router->getFullUrl('createManga') ?>" enctype="multipart/form-data">
                        <h1>Création d'une série.</h1>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-9">
                                <label for="mangaName">Nom du tome :</label>
                                <input type="text" id="mangaName" name="mangaName" />
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <label for="mangaNumber">Numéro du tome :</label>
                                <input type="text" id="mangaNumber" name="mangaNumber" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-8">
                                <label for="mangaDescription">Description :</label>
                                <textarea class="form-control" rows="3" id="mangaDescription" name="mangaDescription" ></textarea>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div>
                                    <label for="mangaCollection">Série du manga :</label>
                                    <select name="mangaCollection" id="mangaCollection" class="form-control">
                                        <?php foreach ($collections as $collection) { ?>
                                            <option value="<?= $collection->getId() ?>"><?= $collection->getName() ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="mangaPrice">Prix :</label>
                                    <input type="text" id="mangaPrice" name="mangaPrice" />  
                                </div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="mangaImg">Couverture du Tome</label>
                                <input type="file" id="mangaImg" name="mangaImg" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <button class="btn btn-primary w-1OO text-white" type="submit">Créer le manga</button>
                            </div>
                        </div>
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
