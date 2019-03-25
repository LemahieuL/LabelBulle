<main class="container-fluid">
    <div class="container col-8" >
      <h1 class="text-center pb-2">Page de Profil.</h1>
      <div class="container">
        <p class="text-center">Nom : <?=$user->getFirstName(); ?></p>
        <p class="text-center">Prénom : <?=$user->getLastName(); ?></p>
        <p class="text-center">Adresse mail actuelle : <?=$user->getMail(); ?></p>
        <p class="text-center">Votre rang sur le site est : <?=$user->getRank(); ?></p>
      </div>
        <p>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#mailFormChanged" aria-expanded="false" aria-controls="collapseExample">
                Modifier votre adresse mail
            </button>
        </p>
        <div id="mailFormChanged" class="collapse">
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
</main>
