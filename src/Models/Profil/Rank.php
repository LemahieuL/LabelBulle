<?php

namespace Models\Profil;

use Models\Database\PDOConnect;
use App\Protections\FormInputErrorMessage;
use App\Protections\Security;

class Rank {
    
    private $id ;
    private $name;
    

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
    
    public function getId(){
       return (int) $this->id;
    }
    
    public function getName(){
        return $this->name;
    }

    public function showRank() {
        $req = $this->db->query('SELECT * FROM `ranks`');
        $ranks = [];
        while ($rank = $req->fetch()) {
            $ranks[] = new Rank($rank->id);
        }
        return $ranks;
    }

}
