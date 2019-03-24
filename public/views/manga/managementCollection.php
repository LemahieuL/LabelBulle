<main class="container-fluid">
  <h1 class="text-center pb-2">Tome de la collection.</h1>
  <div class="container col-8">
  <table class="table table-hover col-12">
    <tbody>
  <?php foreach ($mangas as $manga) { ?>
      <tr class="table-active">
        <td><?= $manga->getMangaTomeNumber(); ?></td>
        <td><?= $manga->getMangaName(); ?><td>
        <td><?= $manga->getMangaPrice(); ?>€</td>
        <td><a class="badge badge-warning badge-pill text-white" href="<?= $router->getFullUrl('updateManga');?>?id=<?= $manga->getMangaId(); ?>">modification</a></td>
        <td><a class="badge badge-danger badge-pill text-white deleteManga" data-manga-id="<?= $manga->getMangaId(); ?>" data-toggle="modal" data-target="#mangaSupression">supprimer</a></td>
      </tr>
  <?php } ?>
</tbody>
</table>
</div>
<!-- Modal pour la suppresion des collection -->
<div class="modal fade" id="mangaSupression" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                Voulez vous vraiment supprimer le tome ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <form method="post" action="<?= $router->getFullUrl('deleteManga'); ?>">
                    <input id="deleteMangaId" name="deleteMangaId" type="hidden" value="0" />
                    <button type="submit" class="btn btn-primary">Supprimer le manga</button>
                </form>
            </div>
        </div>
    </div>
</div>
</main>
