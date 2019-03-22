<main>
    <!-- Début du formulaire -->
    <div class="container pt-3" id="containerForm">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <form method="post" action="<?= $router->getFullUrl('createUser') ?>">
                    <h1 class="d-flex justify-content-center pb-2">Inscription</h1>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-6">
                            <label for="firstName">*Nom : <?php if (isset($errors['firstName'])) { ?><span class="red-text"><?= $errors['firstName']; ?></span><?php } ?></label>
                            <input type="text" class="form-control" name="firstName" id="firstName" value="<?= isset($_POST['firstName']) ? $_POST['firstName'] : ''; ?>" placeholder="Votre Nom" />
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="lastName">*Prénom : <?php if (isset($errors['lastName'])) { ?><span class="red-text"><?= $errors['lastName']; ?></span><?php } ?></label>
                            <input type="text" class="form-control" name="lastName" id="lastName" value="<?= isset($_POST['lastName']) ? $_POST['lastName'] : ''; ?>" placeholder="Votre Prénom" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-6">
                            <label for="birthDay">Date de naissance : <?php if (isset($errors['birthDay'])) { ?><span class="red-text"><?= $errors['birthDay']; ?></span><?php } ?></label>
                            <input type="text" class="form-control" name="birthDay" id="birthDay" value="<?= isset($_POST['birthDay']) ? $_POST['birthDay'] : ''; ?>" />
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="phoneNumber">Téléphone: <?php if (isset($errors['phoneNumber'])) { ?><span class="red-text"><?= $errors['phoneNumber']; ?></span><?php } ?></label>
                            <input type="tel" class="form-control" name="phoneNumber" id="phoneNumber" value="<?= isset($_POST['phone']) ? $_POST['phone'] : ''; ?>" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-5">
                            <label for="login">*Identifiant : <?php if (isset($errors['userName'])) { ?><span class="red-text"><?= $errors['userName']; ?></span><?php } ?></label>
                            <input type="text" class="form-control" name="login" id="login" value="<?= isset($_POST['login']) ? $_POST['login'] : ''; ?>" placeholder="Votre Pseudo" />
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <label for="mail">*Mail : <?php if (isset($errors['mail'])) { ?><span class="red-text"><?= $errors['mail']; ?></span><?php } ?></label>
                            <input type="text" class="form-control" name="mail" id="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : ''; ?>" placeholder="Example@adresse.mail" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 col-md-6">
                            <label for="password">*Mot de passe : <?php if (isset($errors['password'])) { ?><span class="red-text"><?= $errors['password']; ?></span><?php } ?></label>
                            <input type="password" class="form-control" name="password" id="password" value="<?= isset($_POST['password']) ? $_POST['password'] : ''; ?>" placeholder="•••••••" />
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="confirmation">*Confirmation : <?php if (isset($errors['password'])) { ?><span class="red-text"><?= $errors['password']; ?></span><?php } ?></label>
                            <input type="password" class="form-control" name="confirmation" id="confirmation" value="<?= isset($_POST['confirmation']) ? $_POST['confirmation'] : ''; ?>" placeholder="•••••••" />
                        </div>
                    </div>
                    <p>Les champs avec un "*" sont obligatoires.</p>
                    <button class="btn btn-info my-4 btn-block" type="submit">Validation</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Fin du formulaire -->
</main>
