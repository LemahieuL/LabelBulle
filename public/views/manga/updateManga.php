<main class="container-fluid">
      <div class="container">
              <form method="post" action="<?= $router->getFullUrl('editManga') ?>" enctype="multipart/form-data">
                  <h1 class="text-center">Modification d'un tome.</h1>
                  <div class="form-group row">
                      <div class="col-sm-12 col-md-9">
                          <label for="mangaName">Nom du tome : <?php if (isset($errors['mangaName'])) { ?><span class="red-text"><?= $errors['mangaName']; ?></span><?php } ?></label>
                          <input type="text" class="form-control" id="mangaName" name="mangaName" value="<?= isset($_POST['mangaName']) ? $_POST['mangaName'] : $manga->getMangaName(); ?>"/>
                      </div>
                      <div class="col-sm-12 col-md-3">
                          <label for="mangaNumber">Numéro du tome : <?php if (isset($errors['mangaNumber'])) { ?><span class="red-text"><?= $errors['mangaNumber']; ?></span><?php } ?></label>
                          <input type="text" class="form-control" id="mangaNumber" name="mangaNumber" value="<?= isset($_POST['mangaNumber']) ? $_POST['mangaNumber'] : $manga->getMangaTomeNumber();; ?>"/>
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-sm-12 col-md-8">
                          <label for="mangaDescription">Description : <?php if (isset($errors['mangaDescription'])) { ?><span class="red-text"><?= $errors['mangaDescription']; ?></span><?php } ?></label>
                          <textarea class="form-control" rows="3" id="mangaDescription" name="mangaDescription" ><?= isset($_POST['mangaDescription']) ? $_POST['mangaDescription'] : $manga->getMangaDescription();; ?></textarea>
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
                              <label for="mangaPrice">Prix : <?php if (isset($errors['mangaPrice'])) { ?><span class="red-text"><?= $errors['mangaPrice']; ?></span><?php } ?></label>
                              <input type="text" class="form-control" id="mangaPrice" name="mangaPrice" value="<?= isset($_POST['mangaPrice']) ? $_POST['mangaPrice'] : $manga->getMangaPrice();; ?>"/>
                          </div>
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col">
                          <label class="custom-file-label" for="mangaImg">Couverture du Tome : <?php if (isset($errors['mangaImg'])) { ?><span class="red-text"><?= $errors['mangaImg']; ?></span><?php } ?></label>
                          <input type="file" class="custom-file-input" id="mangaImg" name="mangaImg" />
                      </div>
                  </div>
                  <input name="id" type="text" hidden value="<?= isset($_POST['id']) ? $_POST['id'] : $_GET['id']; ?>" />
                  <div class="row">
                      <div class="col-sm-12 col-md-3">
                          <button class="btn btn-primary w-1OO text-white" type="submit">Modifier le manga</button>
                      </div>
                  </div>
              </form>
          </div>
</main>
