<?php

namespace App\Protections;

use Models\Database\PDOConnect;

class MangaErrorMessage {

    private $errors = [];
    private $db;

    public function __construct() {
        $this->db = new PDOConnect();
    }

    public function getErrors() {
        return $this->errors;
    }

    public function isValidCollectionName($inputName, $string) {
        $req = $this->db->query('SELECT * FROM `manga_collection` WHERE `collectionName` = ?', [$string]);
        if (!empty($string)) {
            if ($req->rowCount() === 0) {
                return true;
            } else {
                $this->errors[$inputName] = 'La collection existe déjà.';
            }
        } else {
            $this->errors[$inputName] = 'Le champs est vide.';
        }
        return false;
    }

    public function isValidUpdateCollectionName($inputName, $string, $id) {
        $req = $this->db->query('SELECT * FROM `manga_collection` WHERE `collectionName` = ? AND `id` = ?', [$string, $id]);
        $verificationsReq = $this->db->query('SELECT * FROM `manga_collection` WHERE `collectionName` = ?', [$string]);
        if (!empty($string)) {
            if ($req->rowCount() === 1) {
                return true;
            } else if ($verificationsReq->rowCount() === 0) {
              return true;
              } else {
                $this->errors[$inputName] = 'La collection existe déjà.';
            }
        } else {
            $this->errors[$inputName] = 'Le champs est vide.';
        }
        return false;
    }

    public function isValidDescription($inputName, $string) {
        $req = $this->db->query('SELECT * FROM `manga_collection` WHERE `description` = ?', [$string]);
        if (!empty($string)) {
          return true;
        } else {
            $this->errors[$inputName] = 'Le champs est vide.';
        }
        return false;
    }

    public function isValidName($inputName, $string) {
        if (!empty($string)) {
            /* Si le champs est vide il renvoit le message et passe la variable error en true */
            if (preg_match('/^[a-zA-ZÂ-Ÿ -]+$/i', $string)) {
                /* Si le champs contient des caractere qui ne sont pas pris dans la regex il renvoit le message et oasse la variable error en true */
                if (strlen($string) > 1 && strlen($string) <= 25) {
                    return true;
                } else {
                    $this->errors[$inputName] = 'Le champs doit comprendre entre 3 et 25 caractères.';
                }
            } else {
                $this->errors[$inputName] = 'Mauvais caractères.';
            }
        } else {
            $this->errors[$inputName] = 'Le champs est vide.';
        }
        return false;
    }

    public function isValidImage($inputName, $string) {
        $maximunSize = 5000000; /* Taille de 2Mo */
        $fileSize = $string['size'];
        if (!empty($string)) {
            if ($fileSize < $maximunSize) {
                $autorisedExtension = ['jpg', 'png', 'gif'];
                $fileExtension = strtolower(pathinfo($string['name'], PATHINFO_EXTENSION));
                if (in_array($fileExtension, $autorisedExtension)) {
                    $autorisedMIME = ['image/gif', 'image/jpeg', 'image/pjpeg', 'image/png'];
                    $MIME_Extension = mime_content_type($string['tmp_name']);
                    if (in_array($MIME_Extension, $autorisedMIME)) {
                        return true;
                    } else {
                        $this->errors[$inputName] = 'Le type du fichier n\'est pas autorisée';
                    }
                } else {
                    $this->errors[$inputName] = 'L\'extension du fichier n\'est pas autorisé.';
                }
            } else {
                $this->errors[$inputName] = 'La taille du fichier est trop grande';
            }
        } else {
            $this->errors[$inputName] = 'le champs est vide.';
        }

        return false;
    }

    public function isValidMangaNumber($inputName, $string, $id){
      $req= $this->db->query('SELECT * FROM `manga_tomes` WHERE `tomeNumbers` = ? AND `id_manga_collection` = ?', [$string, $id]);
        if(!empty($string)){
            if(preg_match('/^\d+$/', $string)){
              if($req->rowCount() === 0){
            return true;
          } else {
            $this->errors[$inputName] = 'Numéro de tome déjà utilisé';
          }
            }else{
                $this->errors[$inputName] = 'Mauvais caractères.';
            }
        } else {
            $this->errors[$inputName] = 'le champs est vide.';
        }
    }

    public function isValidPrice($inputName, $string) {
        if (!empty($string)) {
            if (preg_match('/^\d+(?:[.,]\d{2})?/', $string)) {
                return true;
            } else {
                $this->errors[$inputName] = 'mauvais caractère.';
            }
        } else {
            $this->errors[$inputName] = 'le champs est vide.';
        }
    }

    public function isValidMangaName($inputName, $string) {
        $req = $this->db->query('SELECT * FROM `manga_tomes` WHERE `tomeName` = ?', [$string]);
        if (!empty($string)) {
            if ($req->rowCount() === 0) {
                return true;
            } else {
                $this->errors[$inputName] = 'Ce tome existe déjà.';
            }
        } else {
            $this->errors[$inputName] = 'Le champs est vide.';
        }
        return false;
    }

}
