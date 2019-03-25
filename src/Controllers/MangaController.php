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
      // on instancie une nouvelle variable $collections avec la class Collection
      $collections = new Collection();
      // on instancie une nouvelle variable $users avec la class Profil
      $users = new Profil();
      // Si l'utilisateur n'a pas le rank 3 minimun la page ne s'affiche pas.
      if($users->hasRank(3)){
        //On affiche la page pour l'ajout des mangas
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

    /**
    * Fonction pour afficher la mise à jours des mangas.
    **/
    public function getUpdateManga(){
      // on verifie l'id
      $id = isset($_GET['id']) ? $_GET['id'] : 0;
      // On instancie une nouvelle variable $collections avec la class Collection.
      $collections = new Collection();
      // On instancie une nouvelle variable $users avec la class Profil.
      $users = new Profil();
      // Si l'utilisateur n'a pas le rank 3 minimun la page ne s'affiche pas on le redirige vers la page 404.
      if($users->hasRank(3)){
        // On instancie une nouvelle variable $manga avec la class Manga à laquel on lie l'id du manga.
        $manga = new Manga($id);
        // On affiche la page de la mise à jour des mangas avec les information liée à ce manga et au collection.
        $this->render('manga/updateManga', ['collections' => $collections->showCollection(), 'manga'=> $manga]);
      } else {
        $this->security->safeLocalRedirect('default');
      }
    }

    /**
    * Fonction pour mettre à jours les manga.
    **/
    public function updateManga(){
      $manga=[];
      // On instancie une nouvelle variable $collections avec la class Collection.
      $collections = new Collection();
      // on verifie que les donné sont bien presante.
      if(isset($_POST['mangaName'], $_POST['mangaNumber'], $_POST['mangaDescription'], $_FILES['mangaImg'], $_POST['mangaPrice'], $_POST['mangaCollection'], $_POST['id'])){
        // on instancie une nouvelle variable $updateManga avec la class Manga.
        $updateManga = new Manga();
        // on envois les donné recuperer dans la Function upDateManga de la class Manga.
        $manga = $updateManga->upDateManga($_POST['mangaName'], $_POST['mangaNumber'], $_POST['mangaDescription'], $_FILES['mangaImg'], $_POST['mangaPrice'], $_POST['mangaCollection'], $_POST['id']);
      }
      //si il y en a des erreur elle vont etre afficher.
      $this->render('manga/updateManga', ['errors'=> $manga, 'collections' => $collections->showCollection()]);
    }

    /**
    * Fonction pour suprimer un manga
    **/
    public function deleteManga(){
      // on verifie que on resoit l'id
      $id = isset($_POST['deleteMangaId']) ? $_POST['deleteMangaId'] : 0;
      // on instancie la variable $collection avec la class Manga
      $collection = new Manga();
      // On envois les donner dans la fonction deleteManga
      $delete = $collection->deleteManga($id);
      // on affiche la page management
      $this->security->safeLocalRedirect('management');
    }

    /**
     * Fonction pour afficher l'ajout de la collection des mangas.
     */
    public function getAddCollection() {
      // on instancie la varibale $type avec la class Type
      $type = new Type();
      // on instancie la varibale $users avec la class Profil
      $users = new Profil();
      // Si l'utilisateur n'a pas le rang 3 minimun la page ne s'affiche pas.
      if($users->hasRank(3)){
        // on affiche la page d'ajout des mangas.
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
        // on instancie la variable $shonen avec la class Collection
        $shonen = new Collection();
        // on affiche les differents shonen grace à la fonction showShonen
        $this->render('manga/manga', ['mangas' => $shonen->showShonen()]);
    }

    /**
     * Fonction pour afficher les differentes collection de mangas (shojo)
     */
    public function showShojo() {
        // on instancie la variable $shojo avec la class Collection
        $shojo = new Collection();
        // on affiche les differents shojo grace à la fonction showShojo
        $this->render('manga/manga', ['mangas' => $shojo->showShojo()]);
    }

    /**
     * Fonction pour afficher les differentes collection de mangas (seinen)
     */
    public function showSeinen() {
        // on instancie la variable $seinen avec la class Collection
        $seinen = new Collection();
        // on affiche les differents seinen grace à la fonction showSeinen
        $this->render('manga/manga', ['mangas' => $seinen->showSeinen()]);
    }

    /**
     * Fonction pour afficher les manga en fonction de la collection.
     */
    public function showManga() {
      // on verifie l'// IDEA:
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        //on instancie la varibale $manga avec la class Manga
        $manga = new Manga();
        // on verifie que l'id du manga existe sinon on redirige vers l'error 404
        if ($this->db->existContent('manga_tomes', 'id_manga_collection', $id)) {
          //on affiche le manga en fonction de son id
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
        // on instancie la varible $type avec la class Type
        $type = new Type();
        // on verrifie que on resoit toute les données
        if (isset($_POST['collectionName'], $_POST['description'], $_POST['genre'], $_FILES['collectionImg'], $_POST['collectionAuthor'], $_POST['collectionEditor'])) {
          // on instancie la classe $updateCollection avec la class Cllection
            $updateCollection = new Collection();
            // on envois les donnes dans la fonction updateCollection
            $collection = $updateCollection->updateCollection($_POST['collectionName'], $_POST['description'], $_POST['genre'], $_FILES['collectionImg'], $_POST['collectionAuthor'], $_POST['collectionEditor'], $_POST['id']);
        }
        // on affiche les erreurs si il y en a.
        $this->render('manga/updateCollection', ['errors'=>$collection, 'genres' => $type->showType()]);
    }

}
