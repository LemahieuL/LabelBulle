<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://bootswatch.com/4/sketchy/bootstrap.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" >
        <link rel="stylesheet" href="<?= PROJECT_LINK ?>/public/assets/css/style.css" />
        <title></title>
    </head>
    <body>
        <main>
            <div class="container" id="containerForm">
                <div class="row">
                    <div class="col-md-10">
                        <form method="post" action="<?= $router->getFullUrl('editUser') ?>?id=<?= $_GET['id'] ?>">
                            <h1 class="d-flex justify-content-center pb-2">Modifications</h1>
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-6">
                                    <label for="firstName">*Nom : <?php if (isset($errors['firstName'])) { ?><span class="red-text"><?= $errors['firstName']; ?></span><?php } ?></label>
                                    <input type="text" class="form-control" name="firstName" id="firstName" value="<?= isset($firstName) ? $firstName : ''; ?>" placeholder="Votre Nom" />
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label for="lastName">*Prénom : <?php if (isset($errors['lastName'])) { ?><span class="red-text"><?= $errors['lastName']; ?></span><?php } ?></label>
                                    <input type="text" class="form-control" name="lastName" id="lastName" value="<?= isset($lastName) ? $lastName : ''; ?>" placeholder="Votre Prénom" />
                                </div>
                            </div>  
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-4">
                                    <label for="birthDay">Date de naissance : <?php if (isset($errors['birthDay'])) { ?><span class="red-text"><?= $errors['birthDay']; ?></span><?php } ?></label>
                                    <input type="text" class="form-control" name="birthDay" id="birthDay" value="<?= isset($birthDay) ? $birthDay : ''; ?>" />
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <label for="idRank">rank : </label>
                                    <select name="idRank" id="idRank" class="form-control">
                                        <?php foreach ($ranks as $rank) { ?>
                                            <option value="<?= $rank->getId() ?>"><?= $rank->getName() ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <label for="phoneNumber">Téléphone: <?php if (isset($errors['phoneNumber'])) { ?><span class="red-text"><?= $errors['phoneNumber']; ?></span><?php } ?></label>  
                                    <input type="tel" class="form-control" name="phoneNumber" id="phoneNumber" value="<?= isset($phone) ? $phone : ''; ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-5">
                                    <label for="login">*Identifiant : <?php if (isset($errors['userName'])) { ?><span class="red-text"><?= $errors['userName']; ?></span><?php } ?></label>
                                    <input type="text" class="form-control" name="login" id="login" value="<?= isset($login) ? $login : ''; ?>" placeholder="Votre Pseudo" />
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <label for="mail">*Mail : <?php if (isset($errors['mail'])) { ?><span class="red-text"><?= $errors['mail']; ?></span><?php } ?></label>
                                    <input type="text" class="form-control" name="mail" id="mail" value="<?= isset($mail) ? $mail : ''; ?>" placeholder="Example@adresse.mail" />
                                </div>
                            </div>
                            <input name="id" type="text" hidden value="<?= $_GET['id'] ?>" />
                            <p>Les champs avec un "*" sont obligatoires.</p>
                            <button class="btn btn-info my-4 btn-block" type="submit">Validation</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>
