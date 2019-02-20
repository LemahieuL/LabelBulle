<?php

namespace Models\Manga;

use Models\Database\PDOConnect;
use App\Protections\MangaErrorMessage;
use App\Protections\Security;

class Manga {

    private $db;
    private $security;
    private $id;
    private $name;

    public function __construct($id = false) {
        $this->security = new Security();
        $this->db = new PDOConnect();
        if ($id) {
            $req = $this->db->query('SELECT * FROM `manga_tomes` WHERE `id`= ?', [$id]);
            if ($req->rowCount() > 0) {
                $collection = $req->fetch();
                $this->id = $collection->id;
                $this->name = $collection->tomeName;
                return true;
            }
        }
        return false;
    }

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
        var_dump($verifications->getErrors());
        return $verifications->getErrors();
    }

    private function queryAddManga($params = []) {
        $req = $this->db->query('INSERT INTO `manga_tomes`(tomeName,tomeNumbers,description,image,price,id_manga_collection) VALUE (?,?,?,?,?,?)', $params);
        if ($req) {
            return true;
        }
        return false;
    }

}
