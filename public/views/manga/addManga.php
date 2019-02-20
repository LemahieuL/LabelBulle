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
        <main>
            <div class="container">
                <div class="row">
                    <form method="post" action="<?= $router->getFullUrl('createManga') ?>" enctype="multipart/form-data">
                        <h1>Création d'une série.</h1>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12">
                                <label for="collectionName">Nom de la serie</label>
                                <input type="text" id="collectionName" name="collectionName" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-8">
                                <label for="description">Description</label>
                                <textarea class="form-control" rows="2" id="description" name="description" ></textarea>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <label for="genre">Genre</label>
                                <select name="genre" id="genre" class="form-control">
                                    <?php foreach ($collections as $collection) { ?>
                                        <option value="<?= $collection->getId() ?>"><?= $collection->getName() ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="collectionImg">Couverture du Tome</label>
                                <input type="file" id="collectionImg" name="collectionImg" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-6">
                                <label for="collectionAuthor">Auteur</label>
                                <input type="text" id="collectionAuthor" name="collectionAuthor" />                            
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="colletionEditor">Editeur</label>
                                <input type="text" id="colletionEditor" name="colletionEditor" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <button class="btn btn-primary w-1OO text-white" type="submit">Créer la collection</button>
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
