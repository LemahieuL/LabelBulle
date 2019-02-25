<main>
    <?php foreach ($mangas as $manga) { ?>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-9">
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <img src="../../public/assets/image/manga/<?= $manga->getImage(); ?>" class="card-img" alt="image <?= $manga->getImage(); ?>" />
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <div class="card-body">
                                    <h1 class="card-title"><?= $manga->getName(); ?></h1>
                                    <p class="card-text"><?= substr($manga->getDescription(), 0,350) ?>...</p>
                                    <a href="<?= $router->getFullUrl('showMangaShonen'); ?>?id=<?= $manga->getId(); ?>" class="btn btn-primary">Voir les tomes</a>
                                </div>                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</main>
