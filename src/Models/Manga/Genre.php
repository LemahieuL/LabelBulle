<?php

namespace Models\Manga;

use Models\Database\PDOConnect;
use App\Protections\FormInputErrorMessage;
use App\Protections\Security;

class Genre {
    
    private $id ;
    private $name;
    

    public function __construct($id = false) {
        $this->security = new Security();
        $this->db = new PDOConnect();
        if ($id) {
            $req = $this->db->query('SELECT * FROM `genre` WHERE `id`= ?', [$id]);
            if ($req->rowCount() > 0) {
                $genre = $req->fetch();
                $this->id = $genre->id;
                $this->name = $genre->name;
                return true;
            }
        }
        return false;
    }
    
    public function getId(){
       return $this->id;
    }
    
    public function getName(){
        return $this->name;
    }

    public function showGenre() {
        $req = $this->db->query('SELECT * FROM `genre`');
        $genres = [];
        while ($genre = $req->fetch()) {
            $genres[] = new Genre($genre->id);
        }
        return $genres;
    }

}
