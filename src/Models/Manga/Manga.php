<?php

namespace Models\Manga;

use Models\Database\PDOConnect;
use App\Protections\MangaErrorMessage;
use App\Protections\Security;

class Manga {

    private $db;
    private $security;
    
    
    public function __construct() {
        $this->security = new Security();
        $this->db = new PDOConnect();
    }


    public function addManga($tomeName, $tomeNumber, $description, $image, $price, $idMangaCollection) {
        $this->queryAddManga([$tomeName, $tomeNumber, $description, $image, $price, $idMangaCollection]);
    }


    
    private function queryAddManga($params = []) {
        $req = $this->db->query('INSERT INTO `manga_tomes`(tomeName,tomeNumbers,description,image,price,id_manga_collection) VALUE (?,?,?,?,?,?,?)', $params);
        if ($req) {
            return true;
        }
        return false;
    }



}
