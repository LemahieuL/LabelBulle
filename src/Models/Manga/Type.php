<?php

namespace Models\Manga;

use Models\Database\PDOConnect;
use App\Protections\Security;

class Type {

    private $id ;
    private $name;

    /**
     * Fonction qui va permetre de stoquer les valeurs des genres si on possède l'id.
     * @param boolean|int $id
     * @return boolean
     */
    public function __construct($id = false) {
        $this->security = new Security();
        $this->db = new PDOConnect();
        if ($id) {
            $req = $this->db->query('SELECT * FROM `types` WHERE `id`= ?', [$id]);
            if ($req->rowCount() > 0) {
                $type = $req->fetch();
                $this->id = $type->id;
                $this->name = $type->name;
                return true;
            }
        }
        return false;
    }

    /**
     * Fonction qui va renvoyer l'id du genre.
     * @return int
     */
    public function getId(){
       return $this->id;
    }

    /**
     * Fonction qui va renvoyer le nom du genre.
     * @return string
     */
    public function getName(){
        return $this->name;
    }

    /**
     * Fonction qui va retourner l'id pour la function construct pour chaque genre de manga.
     * @return \Models\Manga\Type
     */
    public function showType() {
        $req = $this->db->query('SELECT * FROM `types`');
        $types = [];
        while ($type = $req->fetch()) {
          // on retourne dans la tableu $type le genre du manga grace à son id
            $types[] = new Type($type->id);
        }
        return $types;
    }

}
