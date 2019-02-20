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
    
    public function addManga(){
        $manga = [];
        $collections = new Collection();
        if(isset($_POST['mangaName'],$_POST['mangaNumber'],$_POST['mangaDescription'],$_FILES['mangaImg'],$_POST['mangaPrice'],$_POST['mangaCollection'])){
            $addManga = new Manga();
            $manga = $addManga->addManga($_POST['mangaName'], $_POST['mangaNumber'], $_POST['mangaDescription'], $_FILES['mangaImg'], $_POST['mangaPrice'], $_POST['mangaCollection']);
        }
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
    
    public function showShonen(){
        $shonen = new Collection();        
        $this->render('manga/shonen',['mangas' =>$shonen->showShonen()]);
    }
    
        public function showShojo(){
        $shojo = new Collection();
        $this->render('manga/shonen',['mangas' =>$shojo->showShojo()]);
    }
    
        public function showSeinen(){
        $seinen = new Collection();
        $this->render('manga/shonen',['mangas' =>$seinen->showSeinen()]);
    }

}
