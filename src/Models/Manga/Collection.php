<?php

namespace Models\Manga;

use Models\Database\PDOConnect;
use App\Protections\MangaErrorMessage;
use App\Protections\Security;

class Collection {
    /* Ensemble des fonction pour stocker les donnée des collections */

    private $db;
    private $security;
    private $id;
    private $name;
    private $description;
    private $image;
    private $author;
    private $editor;

    /**
     * Fonction qui va se lancer a l'apelle de la class et qui va stoquer les données des
     * differents manga si on à l'id de la collection.
     * @param boolean|int $id
     * @return boolean
     */
    public function __construct($id = false) {
        $this->security = new Security();
        $this->db = new PDOConnect();
        if ($id) {
            $req = $this->db->query('SELECT * FROM `manga_collection` WHERE `id`= ?', [$id]);
            if ($req->rowCount() > 0) {
                $collection = $req->fetch();
                $this->id = $collection->id;
                $this->name = $collection->collectionName;
                $this->description = $collection->description;
                $this->image = $collection->image;
                $this->author = $collection->author;
                $this->editor = $collection->editor;
                return true;
            }
        }
        return false;
    }

    /* Ensemble des fonctions pouvant etre utiliser dans les views */

    public function getName() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImage() {
        return $this->image;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getEditor() {
        return $this->editor;
    }

    /**
     * Fonction qui va verifier les données envoyer et qui va exectuer le query si il n'y a pas d'erreur
     * sinon il ne l'execute pas et renvoye les messages d'erreurs.
     * @param string $collectionName
     * @param string $description
     * @param string $collectionImg
     * @param string $author
     * @param string $editor
     * @param string $idGenre
     * @return array
     */
    public function addCollection($collectionName, $description, $collectionImg, $author, $editor, $idGenre) {
        // on instancie une nouvelle variable $verifications avec la class MangaErrorMessage.
        $verifications = new MangaErrorMessage();
        $errors = false;
        //on verifie le nom de la collection
        if (!$verifications->isValidCollectionName('collectionName', $collectionName)) {
            $errors = true;
        }
        //on verifie si la description
        if (!$verifications->isValidDescription('description', $description)){
          $errors = true;
        }
        // on verifie le nom de l'auteur
        if (!$verifications->isValidName('author', $author)) {
            $errors = true;
        }
        // on verifie le nom de l'editeur
        if (!$verifications->isValidName('editor', $editor)) {
            $errors = true;
        }
        //on verifie les donné de l'image.
        if (!$verifications->isValidImage('collectionImg', $collectionImg)) {
            $errors = true;
        }
        // si il n'y a pas d'error on envois les donné dans la fonction queryAddCollection et apres on redirige vers la page profil.
        if (!$errors) {
            // on envois les information dans la fonction queryAddCollection pour créer la collection.
            $this->queryAddCollection([$collectionName, $description, $collectionImg['name'], $author, $editor, $idGenre]);
            $this->security->safeLocalRedirect('management');
        }
        // on retourne les message d'erreurs.
        return $verifications->getErrors();
    }

    /**
     * Fonction pour afficher l'id de toutes les collections
     * @return \Models\Manga\Collection
     */
    public function showCollection() {
        // la requette pour aller chercher l'id dans la table manga_collection.
        $req = $this->db->query('SELECT `id` FROM `manga_collection`');
        $collections = [];
        while ($collection = $req->fetch()) {
            // on retourne l'id de la collection dans la class Collection
            $collections[] = new Collection($collection->id);
        }
        return $collections;
    }

    public function showShonen() {
      // la requette pour aller chercher l'id dans la table manga_collection quand l'id de du genre est 1.
        $req = $this->db->query('SELECT `id` FROM `manga_collection` WHERE id_genre = 1');
        $collections = [];
        while ($collection = $req->fetch()) {
          // on retourne l'id de la collection dans la class Collection
            $collections[] = new Collection($collection->id);
        }
        return $collections;
    }

    public function showShojo() {
      // la requette pour aller chercher l'id dans la table manga_collection quand l'id de du genre est 2.
        $req = $this->db->query('SELECT `id` FROM `manga_collection` WHERE id_genre = 2');
        $collections = [];
        while ($collection = $req->fetch()) {
          // on retourne l'id de la collection dans la class Collection
            $collections[] = new Collection($collection->id);
        }
        return $collections;
    }

    public function showSeinen() {
      // la requette pour aller chercher l'id dans la table manga_collection quand l'id de du genre est 3.
        $req = $this->db->query('SELECT `id` FROM `manga_collection` WHERE id_genre = 3');
        $collections = [];
        while ($collection = $req->fetch()) {
          // on retourne l'id de la collection dans la class Collection
            $collections[] = new Collection($collection->id);
        }
        return $collections;
    }

    /**
    * Fonction qui va envoyer les donnée dans la fonction queryDeleteCollection
    **/
    public function deleteCollection($id) {
        $this->queryDeleteCollection([$id]);
    }

    public function updateCollection($collectionName, $description, $genre, $collectionImg, $collectionAuthor, $collectionEditor, $id) {
        $verifications = new MangaErrorMessage();
        $errors = false;
        // on verifie le nom de la collection
        if (!$verifications->isValidUpdateCollectionName('collectionName', $collectionName, $id)) {
            $errors = true;
        }
        // on verifie la description
        if (!$verifications->isValidDescription('description', $description)){
            $errors=true;
        }
        // on verifie le nom de l'auteur
        if (!$verifications->isValidName('author', $collectionAuthor)) {
            $errors = true;
        }
        // on verifie le nom de l'éditeur
        if (!$verifications->isValidName('editor', $collectionEditor)) {
            $errors = true;
        }
        // on verifie l'image
        if (!$verifications->isValidImage('collectionImg', $collectionImg)) {
            $errors = true;
        }
        // si il n'y a pas d'erreur on envois les donné dans la fonction pour la mise à jour de la collection
        if (!$errors) {
            $this->queryUpdateCollection([$collectionName, $description, $collectionImg['name'], $collectionAuthor, $collectionEditor, $genre, $id]);
            $this->security->safeLocalRedirect('management');
        }
        // on renvois les message d'erreurs
        return $verifications->getErrors();
    }

    /**
    * Fonction privé qui permet l'ajout d'une collection
    **/
    private function queryAddCollection($params = []) {
      // requet pour la creation d'une collection' à partir des differentes infomation demandé
        $req = $this->db->query('INSERT INTO `manga_collection`(collectionName,description,image,author,editor,id_genre) VALUE (?,?,?,?,?,?)', $params);
        if ($req) {
            return true;
        }
        return false;
    }

    /**
    * Fonction privé qui permet la mise à jour d'une collection
    **/
    private function queryUpdateCollection($params = []) {
      // requet pour la mise à jour d'une collection à partir des differentes infomation demandé
        $req = $this->db->query('UPDATE `manga_collection` SET `collectionName` = ?, `description` = ?, `image` = ?, `author` = ?, `editor` = ?, `id_genre` = ? WHERE `id` = ?', $params);
        if ($req) {
            return true;
        }
        return false;
    }

    /**
    * Fonction privé qui permet la suppresion d'une collection
    **/
    private function queryDeleteCollection($params = []) {
      // requet pour la suppresion d'une collection à partir de l'id
        $req = $this->db->query('DELETE FROM `manga_collection` WHERE `id` = ?', $params);
        if ($req) {
            return true;
        }
        return false;
    }

}
