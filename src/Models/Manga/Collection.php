<?php

namespace Models\Manga;

use Models\Database\PDOConnect;
use App\Protections\MangaErrorMessage;
use App\Protections\Security;

class Collection {

    private $db;
    private $security;
    private $id;
    private $name;
    private $description;
    private $image;
    private $author;
    private $editor;

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

    public function getName() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }
    
    public function getDescription(){
        return $this->description;
    }
    
    public function getImage(){
        return $this->image;
    }
    
    public function getAuthor(){
        return $this->author;
    }
    
    public function getEditor(){
        return $this->editor;
    }
            

    public function addCollection($collectionName, $description, $collectionImg, $author, $editor, $idGenre) {
        $verifications = new MangaErrorMessage();
        $errors = false;
        if (!$verifications->isValidCollectionName('collectionName', $collectionName)) {
            $errors = true;
        }
        if (!$verifications->isValidName('author', $author)) {
            $errors = true;
        }
        if (!$verifications->isValidName('editor', $editor)) {
            $errors = true;
        }
        if (!$verifications->isValidImage('collectionImg', $collectionImg)) {
            $errors = true;
        }

        if (!$errors) {
            $this->queryAddCollection([$collectionName, $description, $collectionImg['name'], $author, $editor, $idGenre]);
            $this->security->safeLocalRedirect('profil');
        }
        return $verifications->getErrors();
    }

    private function queryAddCollection($params = []) {
        $req = $this->db->query('INSERT INTO `manga_collection`(collectionName,description,image,author,editor,id_genre) VALUE (?,?,?,?,?,?)', $params);
        if ($req) {
            return true;
        }
        return false;
    }

    public function showCollection() {
        $req = $this->db->query('SELECT `id` FROM `manga_collection`');
        $collections = [];
        while ($collection = $req->fetch()) {
            $collections[] = new Collection($collection->id);
        }
        return $collections;
    }

    public function showShonen() {
        $req = $this->db->query('SELECT `id` FROM `manga_collection` WHERE id_genre = 1');
        $collections = [];
        while ($collection = $req->fetch()) {
            $collections[] = new Collection($collection->id);
        }
        return $collections;
    }

    public function showShojo() {
        $req = $this->db->query('SELECT `id` FROM `manga_collection` WHERE id_genre = 2');
        $collections = [];
        while ($collection = $req->fetch()) {
            $collections[] = new Collection($collection->id);
        }
        return $collections;
    }

    public function showSeinen() {
        $req = $this->db->query('SELECT `id` FROM `manga_collection` WHERE id_genre = 3');
        $collections = [];
        while ($collection = $req->fetch()) {
            $collections[] = new Collection($collection->id);
        }
        return $collections;
    }

}
