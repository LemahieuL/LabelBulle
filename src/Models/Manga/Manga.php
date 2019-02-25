<?php

namespace Models\Manga;

use Models\Database\PDOConnect;
use App\Protections\MangaErrorMessage;
use App\Protections\Security;
use Models\Manga\Collection;

class Manga {

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
     * @param int $id
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
     * Function qui va verifier mes données, renvoyer les messages d'errors 
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
        $verifications = new MangaErrorMessage();
        $errors = false;
        if (!$verifications->isValidMangaNumber('mangaNumber', $mangaNumber)) {
            $errors = true;
        }
        if (!$verifications->isValidPrice('mangaPrice', $mangaPrice)) {
            $errors = true;
        }
        if (!$verifications->isValidImage('mangaImg', $mangaImg)) {
            $errors = true;
        }
        if (!$errors) {
            $this->queryAddManga([$mangaName, $mangaNumber, $mangaDescription, $mangaImg['name'], $mangaPrice, $idMangaCollection]);
            $this->security->safeLocalRedirect('profil');
        }
        return $verifications->getErrors();
    }
    
    public function showMangaProfil(){
        $req = $this->db->query('SELECT * FROM `manga_tomes`');
                $mangas = [];
        while ($manga = $req->fetch()) {
            $mangas[] = new Manga($manga->id);
        }
        return $mangas;
    }

    public function showManga($id = []) {
        $req = $this->db->query('SELECT * FROM `manga_tomes` WHERE `id_manga_collection` = ? ORDER BY `tomeNumbers`', $id);
        $mangas = [];
        while ($manga = $req->fetch()) {
            $mangas[] = new Manga($manga->id);
        }
        return $mangas;
    }

    /**
     * Function qui va permet d'ajouter un manga dans la table manga_tome.
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

}
