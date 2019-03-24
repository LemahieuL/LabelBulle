<main class="container-fluid">
    <div class="container">
        <form method="post" action="<?= $router->getFullUrl('createCollection') ?>" enctype="multipart/form-data">
            <h1 class="text-center">Création d'une collection.</h1>
            <div class="form-group row">
                <div class="col-sm-12 col-md-12">
                    <label for="collectionName">Nom de la serie : <?php if (isset($errors['collectionName'])) { ?><span class="red-text"><?= $errors['collectionName']; ?></span><?php } ?></label>
                    <input type="text" class="form-control" id="collectionName" name="collectionName" value="<?= isset($_POST['collectionName']) ? $_POST['collectionName'] : '' ?>"/>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 col-md-8">
                    <label for="description">Description : <?php if (isset($errors['description'])) { ?><span class="red-text"><?= $errors['description']; ?></span><?php } ?></label>
                    <textarea class="form-control" rows="2" id="description" name="description" ><?= isset($_POST['description']) ? $_POST['description'] : '' ?></textarea>
                </div>
                <div class="col-sm-12 col-md-4">
                    <label for="genre">Genre : </label>
                    <select name="genre" id="genre" class="form-control">
                        <?php foreach ($genres as $genre) { ?>
                            <option value="<?= $genre->getId() ?>"><?= $genre->getName() ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col custom-file">
                    <label class="custom-file-label" for="collectionImg">Couverture du Tome : <?php if (isset($errors['collectionImg'])) { ?><span class="red-text"><?= $errors['collectionImg']; ?></span><?php } ?></label>
                    <input type="file" class="custom-file-input" id="collectionImg" name="collectionImg" />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 col-md-6">
                    <label for="collectionAuthor">Auteur : <?php if (isset($errors['author'])) { ?><span class="red-text"><?= $errors['author']; ?></span><?php } ?></label>
                    <input type="text" class="form-control" id="collectionAuthor" name="collectionAuthor" value="<?= isset($_POST['collectionAuthor']) ? $_POST['collectionAuthor'] : '' ?>" />
                </div>
                <div class="col-sm-12 col-md-6">
                    <label for="collectionEditor">Editeur : <?php if (isset($errors['editor'])) { ?><span class="red-text"><?= $errors['editor']; ?></span><?php } ?></label>
                    <input type="text" class="form-control" id="collectionEditor" name="collectionEditor" value="<?= isset($_POST['collectionEditor']) ? $_POST['collectionEditor'] : '' ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    <button class="btn btn-primary w-1OO text-white" type="submit">Créer la collection</button>
                </div>
            </div>
        </form>
    </div>
</main>
