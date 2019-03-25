<main class="container-fluid">
    <?php foreach ($mangas as $manga) { ?>
        <div class="container pb-5">
            <div class="row">
                <div class="col-12 text-center pb-2">
                    <h1><?= $manga->getNewMangaCollection()->getName(); ?></h1>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="col-12 text-center">
                        <img id="imageManga" src="../../public/assets/image/manga/<?= $manga->getMangaImage(); ?>"  alt="image <?= $manga->getMangaImage(); ?>" />
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="col-12 text-center">
                        <h2><?= $manga->getMangaName(); ?></h2>
                    </div>
                    <div class="col-12 ">
                        <p><?= $manga->getMangaDescription(); ?></p>
                    </div>
                    <div class="col-12  text-center">
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <p>Auteur : <?= $manga->getNewMangaCollection()->getAuthor(); ?></p>
                            </div>

                            <div class="col-sm-12 col-md-5">
                                <p>Editeur : <?= $manga->getNewMangaCollection()->getEditor(); ?></p>
                            </div>
                            <div class="col-sm-12 col-md-2">
                                <p><?= $manga->getMangaPrice(); ?>€</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php } ?>
</main>
