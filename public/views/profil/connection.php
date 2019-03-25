<main class="container-fluid">
    <div class="container-fluid pt-3">
        <div class="row d-flex justify-content-center">
            <form method="post" action="<?= $router->getFullUrl('pLogin') ?>">
                <h1 class="d-flex justify-content-center pb-4">Connexion</h1>
                <div class="container">
                    <div class="form-group row">
                        <div class="col-12 row pb-3">
                            <div class="col-sm-12 col-md-6">
                                <label for="loginUserName">Login :<?php if (isset($errors['login'])) { ?><span class="red-text"><?= $errors['login']; ?></span><?php } ?></label>
                                <input id="loginUserName" class="form-control" name="loginUserName" value="<?= isset($_POST['loginUserName']) ? $_POST['loginUserName'] : ''; ?>" />
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="loginPassword">Mot de passe :<?php if (isset($errors['password'])) { ?><span class="red-text"><?= $errors['password']; ?></span><?php } ?></label>
                                <input type="password" id="loginPassword" class="form-control" name="loginPassword" value="<?= isset($_POST['loginPassword']) ? $_POST['loginPassword'] : ''; ?>"/>
                            </div>
                        </div>
                        <div class="col-12 row pb-3">
                            <div class="col-6">
                                <a href="<?= $router->getFullUrl('register') ?>">Inscription.</a>
                            </div>
                            <div class="col-6">
<!--                            <a>Mot de passe oublié?</a>-->
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Connexion</button>
            </form>
        </div>
    </div>
</main>
