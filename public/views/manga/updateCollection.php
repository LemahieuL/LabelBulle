<main>
    <div class="container">
        <form method="post" action="<?= $router->getFullUrl('editCollection') ?>" enctype="multipart/form-data">
            <h1 class="text-center">Mise à jour de la collection.</h1>
            <div class="form-group row">
                <div class="col-sm-12 col-md-12">
                    <label for="collectionName">Nom de la serie : </label>
                    <input type="text" id="collectionName" name="collectionName" />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 col-md-8">
                    <label for="description">Description : </label>
                    <textarea class="form-control" rows="2" id="description" name="description" ></textarea>
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
            <div class="form-group row ">
                <div class="col-sm-12 col-md-10 custom-file">
                    <label class="custom-file-label" for="collectionImg">Couverture du Tome : </label>
                    <input type="file" class="custom-file-input" id="collectionImg" name="collectionImg" />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 col-md-6">
                    <label for="collectionAuthor">Auteur : </label>
                    <input type="text" id="collectionAuthor" name="collectionAuthor" />                            
                </div>
                <div class="col-sm-12 col-md-6">
                    <label for="collectionEditor">Editeur : </label>
                    <input type="text" id="collectionEditor" name="collectionEditor" />
                </div>
            </div>
            <input name="id" type="text" hidden value="<?= $_GET['id'] ?>" />
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    <button class="btn btn-primary w-1OO text-white" type="submit">Mise à jour de la collection</button>
                </div>
            </div>
        </form>
    </div>
</main>
