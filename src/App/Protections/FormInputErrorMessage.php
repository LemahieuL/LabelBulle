<?php

namespace App\Protections;

use Models\Database\PDOConnect;

class FormInputErrorMessage {

    private $errors = [];

    public function __construct() {
        
    }

    public function getErrors() {
        return $this->errors;
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

    public function isValidBirthDate($inputDate, $string) {
        if (empty($string)) {
            return true;
        } else {
            if (preg_match('/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/', $string)) {
                /* Si le champs contient des caractere qui ne sont pas pris dans la regex il renvoit le message et oasse la variable error en true */
                $dateExplode = explode('/', $string);
                /* Pour permetre de faire le checkdate */
                if (checkdate($dateExplode[1], $dateExplode[0], $dateExplode[2])) {
                    if (strtotime($dateExplode[1].'/'.$dateExplode[0].'/'.$dateExplode[2]) < strtotime('now')) {
                        return true;
                    } else {
                        $this->errors[$inputDate] = 'La date n\'est pas possible.';
                    }
                } else {
                    $this->errors[$inputDate] = 'Mauvaise date.';
                }
            } else {
                $this->errors[$inputDate] = 'Date invalide.';
            }
        }
        return false;
    }

    public function isValidPhoneNumber($inputPhoneNumber, $string) {
        if (empty($string)) {
            return true;
        } else {
            if (preg_match('/^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$/i', $string)) {
                /* Si le champs contient des caractere qui ne sont pas pris dans la regex il renvoit le message et oasse la variable error en true */
                return true;
            } else {
                $this->errors[$inputPhoneNumber] = 'Numéro invalide.';
            }
        }
        return false;
    }

    public function isValidMail($inputMail, $string) {
        $db = new PDOConnect();
        $req = $db->query('SELECT * FROM `users` WHERE `mail` = ?', [$string]);
        if (!empty($string)) {
            /* Si le champs est vide il renvoit le message et passe la variable error en true */
            if (filter_var($string, FILTER_VALIDATE_EMAIL)) {
                /* Si le champs contient des caractere qui ne sont pas pris dans la regex il renvoit le message et oasse la variable error en true */
                if ($req->rowCount() === 0) {
                    return true;
                } else {
                    $this->errors[$inputMail] = 'Email déjà utilisé';
                }
            } else {
                $this->errors[$inputMail] = 'Email invalide.';
            }
        } else {
            $this->errors[$inputMail] = 'Le champs est vide.';
        }
        return false;
    }

    public function isValidPassword($inputPassword, $string) {
        if (!empty($string)) {
            if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).+$/', $string)) {
                if(strlen($string < 5)){
                return true;
                } else {
                    $this->errors[$inputPassword] = 'Le mot de passe est trop court, 5 caractères minimum';
                }
            } else {
                $this->errors[$inputPassword] = 'Le mot de passe ne contient pas les caractères demandés';
            }
        } else {
            $this->errors[$inputPassword] = 'le champs est vide.';
        }
        return false;
    }

    public function isValidUserName($inputUserName, $string) {
        $db = new PDOConnect();
        $req = $db->query('SELECT * FROM `users` WHERE `userName` = ?', [$string]);
        if (!empty($string)) {
            if (preg_match('/^[a-zA-ZÂ-ÿ0-9-]+$/', $string)) {
                if ($req->rowCount() === 0) {
                    return true;
                } else {
                    $this->errors[$inputUserName] = 'Nom d\'utilisateur déjà utilisé';
                }
            } else {
                $this->errors[$inputUserName] = 'Mauvais caractères.';
            }
        } else {
            $this->errors[$inputUserName] = 'le champs est vide.';
        }
        return false;
    }

    public function connectionUserName($inputUserName, $string) {
        if (!empty($string)) {
            $db = new PDOConnect();
            $req = $db->query('SELECT * FROM `users` WHERE `userName`=? OR `mail`=?', [$string, $string]);
            $user = $req->fetch();
            if ($user) {
                return $user;
            } else {
                $this->errors[$inputUserName] = 'Nom de compte ou mail n\'est pas utilisé.';
            }
        } else {
            $this->errors[$inputUserName] = 'Le champs est vide.';
        }
        return false;
    }

    public function connectionPassword($inputPassword, $string) {
        if (!empty($string)) {
            return true;
        } else {
            $this->errors[$inputPassword] = 'Le champs est vide.';
        }
        return false;
    }
    
    public function matchPassword($password, $passwordHash) {
        if (password_verify($password, $passwordHash)) {
            return true;
        }
        else {
            $this->errors['password'] = 'Le mot de passe ne correspond pas.';
        }
        return false;
    }
    
    public function __destruct() {
        
    }

}
