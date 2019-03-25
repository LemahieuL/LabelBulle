<?php

namespace Models\Manga;

use Models\Database\PDOConnect;
use App\Protections\MangaErrorMessage;
use App\Protections\Security;
use Models\Manga\Collection;

class Manga {
    /* Ensemble des fonction pour stocker les donnée des mangas */
    private $db;
    private $security;
    private $id;
    private $name;
    private $tomeNumber;
    private $description;
    private $image;
    private $price;
    private $mangaCollection;


    /**
     * Fonction qui va se lancer à l'apelle de la fonction et
     * qui permet de stoquer les données si l'on a l'id du tome.
     * @param boolean|int $id
     * @return boolean
     */
    public function __construct($id = false) {
        $this->security = new Security();
        $this->db = new PDOConnect();
        if ($id) {
            $req = $this->db->query('SELECT * FROM `manga_tomes` WHERE `id`= ?', [$id]);
            if ($req->rowCount() > 0) {
                $collection = $req->fetch();
                $this->id = $collection->id;
                $this->name = $collection->tomeName;
                $this->tomeNumber = $collection->tomeNumbers;
                $this->description = $collection->description;
                $this->image = $collection->image;
                $this->price = $collection->price;
                $this->mangaCollection = $collection->id_manga_collection;
                return true;
            }
        }
        return false;
    }
    /* Ensemble des fonctions pouvant etre utiliser dans les views */
    public function getMangaId(){
        return $this->id;
    }

    public function getMangaName() {
        return $this->name;
    }

    public function getMangaTomeNumber(){
        return $this->tomeNumber;
    }

    public function getMangaDescription(){
        return $this->description;
    }

    public function getMangaImage(){
        return $this->image;
    }

    public function getMangaPrice(){
        return $this->price;
    }

    public function getMangaCollection(){
        return $this->mangaCollection;
    }

    public function getNewMangaCollection(){
        return new Collection($this->mangaCollection);
    }

    /**
     * Fonction qui va verifier mes données, renvoyer les messages d'errors
     * et si il n'y a pas d'errors va pouvoir exectuer la function query avec les données.
     * @param string $mangaName
     * @param string $mangaNumber
     * @param string $mangaDescription
     * @param string $mangaImg
     * @param string $mangaPrice
     * @param int $idMangaCollection
     * @return array
     */
    public function addManga($mangaName, $mangaNumber, $mangaDescription, $mangaImg, $mangaPrice, $idMangaCollection) {
        // on instancie une nouvelle variable $verifications avec la class MangaErrorMessage.
        $verifications = new MangaErrorMessage();
        // on set les errors en faux.
        $errors = false;
        //on verifie le nom du manga
        if(!$verifications->isValidMangaName('mangaName', $mangaName)){
          $errors =true;
        }
        // on verifie le numeros du manga
        if (!$verifications->isValidMangaNumber('mangaNumber', $mangaNumber, $idMangaCollection)) {
            $errors = true;
        }
        // on verifie la description
        if (!$verifications->isValidDescription('mangaDescription', $mangaNumber)) {
            $errors = true;
        }
        //on verifie le prix du manga
        if (!$verifications->isValidPrice('mangaPrice', $mangaPrice)) {
            $errors = true;
        }
        //on verifie l'image
        if (!$verifications->isValidImage('mangaImg', $mangaImg)) {
            $errors = true;
        }
        // si il n'y a pas d'error on envois les donné dans la fonction queryAddManga et apres on redirige vers la page profil.
        if (!$errors) {
            $this->queryAddManga([$mangaName, $mangaNumber, $mangaDescription, $mangaImg['name'], $mangaPrice, $idMangaCollection]);
            $this->security->safeLocalRedirect('management');
        }
        return $verifications->getErrors();
    }

    public function updateManga($mangaName, $mangaNumber, $mangaDescription, $mangaImg, $mangaPrice, $idMangaCollection, $id){
      $verifications = new MangaErrorMessage();
      $errors = false;
      // on verifie le numeros du manga
      if (!$verifications->isValidMangaNumber('mangaNumber', $mangaNumber, $idMangaCollection)) {
          $errors = true;
      }
      //on verifie le prix du manga
      if (!$verifications->isValidPrice('mangaPrice', $mangaPrice)) {
          $errors = true;
      }
      //on verifie l'image
      if (!$verifications->isValidImage('mangaImg', $mangaImg)) {
          $errors = true;
      }
      if (!$errors) {
          $this->queryUpdateManga([$mangaName, $mangaNumber, $mangaDescription, $mangaImg['name'], $mangaPrice, $idMangaCollection, $id]);
          $this->security->safeLocalRedirect('management');
      }
      return $verifications->getErrors();
    }

    public function deleteManga($id){
        $this->queryDeleteManga([$id]);
    }

    /**
     * Fonction qui va permetre d'afficher les mangas présants dans la table manga_tomes
     * et va renvoyer l'id pour pouvoir l'utiliser.
     * @return \Models\Manga\Manga
     */
    public function showMangaProfil(){
        $req = $this->db->query('SELECT * FROM `manga_tomes`');
                $mangas = [];
        while ($manga = $req->fetch()) {
            $mangas[] = new Manga($manga->id);
        }
        return $mangas;
    }

    /**
     * Fonction pour afficher les mangas lorsque l'on a l'id de la collection.
     * @param type $id
     * @return \Models\Manga\Manga
     */
    public function showManga($id = []) {
        $req = $this->db->query('SELECT * FROM `manga_tomes` WHERE `id_manga_collection` = ? ORDER BY `tomeNumbers`', $id);
        $mangas = [];
        while ($manga = $req->fetch()) {
            $mangas[] = new Manga($manga->id);
        }
        return $mangas;
    }

    /**
     * Fonction qui va permet d'ajouter un manga dans la table manga_tome.
     * @param array $params
     * @return boolean
     */
    private function queryAddManga($params = []) {
        $req = $this->db->query('INSERT INTO `manga_tomes`(tomeName,tomeNumbers,description,image,price,id_manga_collection) VALUE (?,?,?,?,?,?)', $params);
        if ($req) {
            return true;
        }
        return false;
    }

    private function queryUpdateManga($params = []) {
        $req = $this->db->query('UPDATE `manga_tomes` SET `tomeName` = ?, `tomeNumbers` = ?, `description` = ?, `image` = ?, `price` = ? ,`id_manga_collection` = ? WHERE `id` = ?', $params);
        if ($req) {
            return true;
        }
        return false;
    }

    private function queryDeleteManga($params = []) {
        $req = $this->db->query('DELETE FROM `manga_tomes` WHERE `id` = ?', $params);
        if ($req) {
            return true;
        }
        return false;
    }

}
