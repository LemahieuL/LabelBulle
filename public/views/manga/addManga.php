
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