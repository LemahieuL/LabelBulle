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

    public function __construct($id = false) {
        $this->security = new Security();
        $this->db = new PDOConnect();
        if ($id) {
            $req = $this->db->query('SELECT * FROM `manga_collection` WHERE `id`= ?', [$id]);
            if ($req->rowCount() > 0) {
                $collection = $req->fetch();
                $this->id = $collection->id;
                $this->name = $collection->collectionName;
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

    public function addCollection($collectionName, $description, $collectionImg, $author, $editor, $idGenre) {
        $verifications = new MangaErrorMessage();
        $errors = false;
        var_dump($collectionImg);
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
        var_dump($verifications->getErrors());
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

}
