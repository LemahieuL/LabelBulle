<?php

namespace Controllers;

use \Models\Profil\Profil;
use \Models\Manga\Manga;
use \Models\Manga\Type;
use \Models\Manga\Collection;

class MangaController extends Controller {

    /**
     * Fonction pour afficher l'ajout des mangas.
     */
    public function getAddManga() {
      $collections = new Collection();
      $users = new Profil();
      // Si l'utilisateur n'a pas le rank 3 minimun la page ne s'affiche pas.
      if($users->hasRank(3)){
        $this->render('manga/addManga', ['collections' => $collections->showCollection()]);
      } else {
        $this->security->safeLocalRedirect('default');
      }
    }

    /**
     * Fonction pour envoyer les données de l'ajout des mangas.
     */
    public function addManga() {
        $manga = [];
        // on instancie une nouvelle variable $collections avec la class Collection.
        $collections = new Collection();
        // on verifie que les donné sont bien presante.
        if (isset($_POST['mangaName'], $_POST['mangaNumber'], $_POST['mangaDescription'], $_FILES['mangaImg'], $_POST['mangaPrice'], $_POST['mangaCollection'])) {
            // on instancie une nouvelle variable $addManga avec la class Manga.
            $addManga = new Manga();
            // on envois les donné recuperer dans la Function addManga de la class Manga.
            $manga = $addManga->addManga($_POST['mangaName'], $_POST['mangaNumber'], $_POST['mangaDescription'], $_FILES['mangaImg'], $_POST['mangaPrice'], $_POST['mangaCollection']);
        }
        //si il y en a des erreur elle vont etre afficher.
        $this->render('manga/addManga', ['errors' => $manga, 'collections' => $collections->showCollection()]);
    }

    public function getUpdateManga(){
      $id = isset($_GET['id']) ? $_GET['id'] : 0;
      $collections = new Collection();
      $users = new Profil();
      // Si l'utilisateur n'a pas le rank 3 minimun la page ne s'affiche pas.
      if($users->hasRank(3)){
        $manga = new Manga($id);
        $this->render('manga/updateManga', ['collections' => $collections->showCollection(), 'manga'=> $manga]);
      } else {
        $this->security->safeLocalRedirect('default');
      }
    }

    public function updateManga(){
      $manga=[];
      $collections = new Collection();
      if(isset($_POST['mangaName'], $_POST['mangaNumber'], $_POST['mangaDescription'], $_FILES['mangaImg'], $_POST['mangaPrice'], $_POST['mangaCollection'], $_POST['id'])){
        $updateManga = new Manga();
        $manga = $updateManga->upDateManga($_POST['mangaName'], $_POST['mangaNumber'], $_POST['mangaDescription'], $_FILES['mangaImg'], $_POST['mangaPrice'], $_POST['mangaCollection'], $_POST['id']);
      }
      $this->render('manga/updateManga', ['errors'=> $manga, 'collections' => $collections->showCollection()]);
    }

    public function deleteManga(){
      $id = isset($_POST['deleteMangaId']) ? $_POST['deleteMangaId'] : 0;
      $collection = new Manga();
      $delete = $collection->deleteManga($id);
      $this->security->safeLocalRedirect('management');
    }

    /**
     * Fonction pour afficher l'ajout de la collection des mangas.
     */
    public function getAddCollection() {
      $type = new Type();
      $users = new Profil();
      // Si l'utilisateur n'a pas le rang 3 minimun la page ne s'affiche pas.
      if($users->hasRank(3)){
        $this->render('manga/addCollection', ['genres' => $type->showType()]);
      } else {
        $this->security->safeLocalRedirect('default');
      }
    }

    /**
     * Fonction pour envoyer les données de l'ajout des collections des mangas.
     */
    public function addCollection() {
        $collection = [];
        // on instancie une nouvelle variable $type avec la class Type.
        $type = new Type();
        // on verifie que les donné sont bien presante.
        if (isset($_POST['collectionName'], $_POST['description'], $_POST['genre'], $_FILES['collectionImg'], $_POST['collectionAuthor'], $_POST['collectionEditor'])) {
            // on instancie une nouvelle variable $addCollection avec la class Collection.
            $addCollection = new Collection();
            // on envois les donné recuperer dans la Function addCollection de la class Collection.
            $collection = $addCollection->addCollection($_POST['collectionName'], $_POST['description'], $_FILES['collectionImg'], $_POST['collectionAuthor'], $_POST['collectionEditor'], $_POST['genre']);
        }
        //si il y en a des erreur elle vont etre afficher.
        $this->render('manga/addCollection', ['errors' => $collection, 'genres' => $type->showType()]);
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
        $collection = [];
        $type = new Type();
        if (isset($_POST['collectionName'], $_POST['description'], $_POST['genre'], $_FILES['collectionImg'], $_POST['collectionAuthor'], $_POST['collectionEditor'])) {
            $updateCollection = new Collection();
            $collection = $updateCollection->updateCollection($_POST['collectionName'], $_POST['description'], $_POST['genre'], $_FILES['collectionImg'], $_POST['collectionAuthor'], $_POST['collectionEditor'], $_POST['id']);
        }
        $this->render('manga/updateCollection', ['errors'=>$collection, 'genres' => $type->showType()]);
    }

}
