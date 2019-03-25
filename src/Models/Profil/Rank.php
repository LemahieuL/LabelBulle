<?php

namespace Models\Profil;

use Models\Database\PDOConnect;
use App\Protections\FormInputErrorMessage;
use App\Protections\Security;

class Rank {

    private $id ;
    private $name;

    /**
    * Fonction public qui est executer quand on apelle cette class
    **/
    public function __construct($id = false) {
        $this->security = new Security();
        $this->db = new PDOConnect();
        if ($id) {
            $req = $this->db->query('SELECT * FROM `ranks` WHERE `id`= ?', [$id]);
            if ($req->rowCount() > 0) {
                $rank = $req->fetch();
                $this->id = $rank->id;
                $this->name = $rank->name;
                return true;
            }
        }
        return false;
    }

    /**
    * On recuper l'id du rang
    **/
    public function getId(){
       return (int) $this->id;
    }

    /**
    * On recuper le nom du rang
    **/
    public function getName(){
        return $this->name;
    }

    /**
    * Fonction pour afficher les rangs
    **/
    public function showRank() {
        $req = $this->db->query('SELECT * FROM `ranks`');
        $ranks = [];
        // on fait un boucle pour pouvoir afficher les rangs en fonction de leur id
        while ($rank = $req->fetch()) {
            $ranks[] = new Rank($rank->id);
        }
        return $ranks;
    }

}
