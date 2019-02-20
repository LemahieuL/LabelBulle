<?php

namespace Controllers;

use \Models\Manga\Manga;
use \Models\Manga\Genre;
use Models\Manga\Collection;

class MangaController extends Controller {

    public function getAddManga() {
        $collections = new Collection();
        $this->render('manga/addManga', ['collections' => $collections->showCollection()]);
    }

    public function getAddCollection() {
        $genre = new Genre();
        $this->render('manga/addCollection', ['genres' => $genre->showGenre()]);
    }

    public function addCollection() {
        $collection = [];
        $genre = new Genre();
        if (isset($_POST['collectionName'], $_POST['description'], $_POST['genre'], $_FILES['collectionImg'], $_POST['collectionAuthor'], $_POST['colletionEditor'])) {
            $addCollection = new Collection();
            $collection = $addCollection->addCollection($_POST['collectionName'], $_POST['description'], $_FILES['collectionImg'], $_POST['collectionAuthor'], $_POST['colletionEditor'], $_POST['genre']);
        }
        $this->render('manga/addCollection', ['genres' => $genre->showGenre()]);
        
    }

}
