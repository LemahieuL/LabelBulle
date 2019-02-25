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
        <table class="table table-hover col-12">
            <tbody>
            <?php foreach ($collections as $collection) { ?>
                <tr class="table-active">
                    <th scope="row"><?= $collection->getName(); ?></th>
                    <td><span class="badge badge-primary badge-pill text-white">1</span></td>
                    <td><a class="badge badge-warning badge-pill text-white" href="<?= $router->getFullUrl('updateCollection'); ?>?id=<?= $collection->getId(); ?>">modifier</a></td>
                    <td><a class="badge badge-danger badge-pill text-white" href="<?= $router->getFullUrl('deleteCollection'); ?>?id=<?= $collection->getId(); ?>">supprimer</a></td>
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

