<main>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <form method="post" action="<?= $router->getFullUrl('pLogin') ?>">
                <h1 class="d-flex justify-content-center pb-2">Connection</h1>
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <label for="loginUserName">Login :</label>
                            <input id="loginUserName" name="loginUserName" />
                        </div>
                        <div class="col-6">
                            <label for="loginPassword">Mot de passe :</label>
                            <input type="password" id="loginPassword" name="loginPassword"/>
                        </div>
                        <div class="col-6">
                            <a href="<?= $router->getFullUrl('register') ?>">Inscription.</a>
                        </div>
                        <div class="col-6">
                            <a>Mot de passe oublié?</a>
                        </div>
                    </div>            
                </div>
                <button type="submit" class="btn btn-primary">Connexion</button>
            </form>
        </div>
    </div>
</main>

