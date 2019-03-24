<main class="container-fluid">
    <h1 class="d-flex justify-content-center pb-2">Page de Gestion</h1>
    <!-- Gestion des différents manga par les employers et le Gérant -->
    <div class="container col-8">
        <table class="table table-hover col-12">
            <tbody>
                <?php foreach ($collections as $collection) { ?>
                    <tr class="table-active">
                        <th scope="row"><?= $collection->getName(); ?></th>
                        <td><a class="badge badge-primary badge-pill text-white" href="<?= $router->getFullUrl('managementCollection'); ?>?id=<?= $collection->getId() ;?>">afficher</a></td>
                        <td><a class="badge badge-warning badge-pill text-white" href="<?= $router->getFullUrl('updateCollection'); ?>?id=<?= $collection->getId(); ?>">modifier</a></td>
                        <td><a class="badge badge-danger badge-pill text-white deleteCollection" data-collection-id="<?= $collection->getId(); ?>" data-toggle="modal" data-target="#collectionSupression">supprimer</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
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
        <table class="table table-hover col-12">
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr class="table-active">
                        <th scope="row"><?= $user->getLastName() ?> <?= $user->getFirstName() ?></th>
                        <td><a class="badge badge-warning badge-pill text-white" href="<?= $router->getFullUrl('getEditUser') ?>?id=<?= $user->getId() ?>">modifier</a></td>
                        <td><a class="badge badge-danger badge-pill text-white" href="#">supprimer</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Modal pour la suppresion des collection -->
    <div class="modal fade" id="collectionSupression" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    Voulez vous vraiment supprimer la collection ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <form method="post" action="<?= $router->getFullUrl('deleteCollection'); ?>">
                        <input id="deleteCollectionId" name="deleteCollectionId" type="hidden" value="0" />
                        <button type="submit" class="btn btn-primary">Supprimer le manga</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
