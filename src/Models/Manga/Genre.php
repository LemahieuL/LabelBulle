<?php

namespace Models\Manga;

use Models\Database\PDOConnect;
use App\Protections\Security;

class Genre {
    
    private $id ;
    private $name;
    
    /**
     * Function qui va permetre de stoquer les valeurs des genres si on possède l'id.
     * @param int $id
     * @return boolean
     */
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
    
    /**
     * function qui va renvoyer l'id du genre.
     * @return int
     */
    public function getId(){
       return $this->id;
    }
    
    /**
     * function qui va renvoyer le nom du genre.
     * @return string
     */
    public function getName(){
        return $this->name;
    }
    
    /**
     * Function qui va returner l'id pour la function construct pour chaque genre de manga.
     * @return \Models\Manga\Genre
     */
    public function showGenre() {
        $req = $this->db->query('SELECT * FROM `genre`');
        $genres = [];
        while ($genre = $req->fetch()) {
            $genres[] = new Genre($genre->id);
        }
        return $genres;
    }

}
