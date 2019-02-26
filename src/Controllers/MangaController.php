<?php

namespace Controllers;

use \Models\Manga\Manga;
use \Models\Manga\Type;
use \Models\Manga\Collection;

class MangaController extends Controller {
    
    /**
     * Fonction pour afficher l'ajout des mangas.
     */
    public function getAddManga() {
        $collections = new Collection();
        $this->render('manga/addManga', ['collections' => $collections->showCollection()]);
    }
    
    /**
     * Fonction pour envoyer les données de l'ajout des mangas.
     */
    public function addManga() {
        $manga = [];
        $collections = new Collection();
        if (isset($_POST['mangaName'], $_POST['mangaNumber'], $_POST['mangaDescription'], $_FILES['mangaImg'], $_POST['mangaPrice'], $_POST['mangaCollection'])) {
            $addManga = new Manga();
            $manga = $addManga->addManga($_POST['mangaName'], $_POST['mangaNumber'], $_POST['mangaDescription'], $_FILES['mangaImg'], $_POST['mangaPrice'], $_POST['mangaCollection']);
        }
        $this->render('manga/addManga', ['collections' => $collections->showCollection()]);
    }
    
    /**
     * Fonction pour afficher l'ajout de la collection des mangas.
     */
    public function getAddCollection() {
        $type = new Type();
        $this->render('manga/addCollection', ['genres' => $type->showGenre()]);
    }
    
    /**
     * Fonction pour envoyer les données de l'ajout des collections des mangas.
     */
    public function addCollection() {
        $collection = [];
        $type = new Type();
        if (isset($_POST['collectionName'], $_POST['description'], $_POST['genre'], $_FILES['collectionImg'], $_POST['collectionAuthor'], $_POST['collectionEditor'])) {
            $addCollection = new Collection();
            $collection = $addCollection->addCollection($_POST['collectionName'], $_POST['description'], $_FILES['collectionImg'], $_POST['collectionAuthor'], $_POST['collectionEditor'], $_POST['genre']);
        }
        $this->render('manga/addCollection', ['genres' => $type->showType()]);
    }
    
    /**
     * Fonction pour afficher les differentes collection de mangas (shonen).
     */
    public function showShonen() {
        $shonen = new Collection();
        $this->render('manga/shonen', ['mangas' => $shonen->showShonen()]);
    }
    
    /**
     * Fonction pour afficher les differentes collection de mangas (shojo)
     */
    public function showShojo() {
        $shojo = new Collection();
        $this->render('manga/shonen', ['mangas' => $shojo->showShojo()]);
    }

    /**
     * Fonction pour afficher les differentes collection de mangas (seinen)
     */
    public function showSeinen() {
        $seinen = new Collection();
        $this->render('manga/shonen', ['mangas' => $seinen->showSeinen()]);
    }
    
    /**
     * Fonction pour afficher les manga en fonction de la collection.
     */
    public function showManga() {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $manga = new Manga();
        if ($this->db->existContent('manga_tomes', 'id_manga_collection', $id)) {
            $this->render('manga/showManga', ['mangas' => $manga->showManga([$id])]);
        } else {
            $this->security->safeLocalRedirect('default');
        }
    }
    
    /**
     * Fonction pour mettre à jour une collection de manga.
     */
    public function editCollection() {
        $type = new Type();
        if (isset($_POST['collectionName'], $_POST['description'], $_POST['genre'], $_FILES['collectionImg'], $_POST['collectionAuthor'], $_POST['collectionEditor'])) {
            $updateCollection = new Collection();
            $collection = $updateCollection->getQueryUpdateCollection($_POST['collectionName'], $_POST['description'], $_POST['genre'], $_FILES['collectionImg'], $_POST['collectionAuthor'], $_POST['collectionEditor'], $_POST['id']);
        }
        $this->render('manga/updateCollection', ['genres' => $type->showType()]);
    }

}
