<?php

namespace Models\Profil;

use Models\Database\PDOConnect;
use App\Protections\FormInputErrorMessage;
use App\Protections\Security;

class Profil {

    private $db;
    private $id;
    private $firstName;
    private $lastName;
    private $mail;
    private $userName;
    private $password;
    private $idRank;
    private $security;

    /**
     * Récupère les données de l'utilisateur SI il existe.
     * @param boolean|int $id
     * @return boolean
     */
    public function __construct($id = false) {
        $this->security = new Security();
        $this->db = new PDOConnect();
        if ($id) {
            $req = $this->db->query('SELECT * FROM `users` WHERE `id`= ?', [$id]);
            if ($req->rowCount() > 0) {
                $user = $req->fetch();
            }
        } elseif(isset($_SESSION['auth'])){
            $user = $_SESSION['auth'];
        }
        if(isset($user)) {
                $this->id = $user->id;
                $this->firstName = $user->firstName;
                $this->lastName = $user->lastName;
                $this->mail = $user->mail;
                $this->userName = $user->userName;
                $this->password = $user->password;
                $this->idRank = $user->id_ranks;
                return true;
        }
        return false;
    }

    /**
     * function qui va recuperer l'id de l'utilisateur.
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * function qui va recuperer le nom de l'utilisateur.
     * @return string
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * function qui va recupere le prenom de l'utilisateur.
     * @return string
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * function qui va recuperer le mail de l'utilisateur.
     * @return string
     */
    public function getMail() {
        return $this->mail;
    }

    /**
     * function pour recuperer le pseudo de l'utilisateur
     * @return string
     */
    public function getUserName() {
        return $this->userName;
    }

    /**
     * function pour recuperer l'id du rang de l'utilisateur.
     * @return int
     */
    public function getRank() {
        return new Rank($this->idRank);
    }

    public function hasRank($rankId) {
        return $this->getRank()->getId() >= $rankId;
    }

    /**
     * Function pour recuperer le mot de passe.
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Function pour envoyer l'id des different users dans la function construct.
     * @return \Models\Profil\Profil
     */
    public function showUsers() {
        $req = $this->db->query('SELECT * FROM `users`');
        $users = [];
        while ($user = $req->fetch()) {
            $users[] = new Profil($user->id);
        }
        return $users;
    }

    /**
     * Function qui va verifier les differentes données et
     * si il n'y a pas d'erreur va créer l'utilisateur.
     * @param string $firstName
     * @param string $lastName
     * @param string $mail
     * @param string $userName
     * @param string $password
     * @param string $birthDate
     * @param string $phoneNumber
     * @return array
     */
    public function addUsers($firstName, $lastName, $mail, $userName, $password, $birthDate, $phoneNumber) {
        $verifications = new FormInputErrorMessage();
        $error = false;
        if (!$verifications->isValidName('firstName', $firstName)) {
            $error = true;
        }
        if (!$verifications->isValidName('lastName', $lastName)) {
            $error = true;
        }
        if (!$verifications->isValidMail('mail', $mail)) {
            $error = true;
        }
        if (!$verifications->isValidUserName('userName', $userName)) {
            $error = true;
        }
        if (!$verifications->isValidPassword('password', $password)) {
            if ($_POST['password'] !== $_POST['confirmation']) {
                $error = true;
            }
        }
        if (!$verifications->isValidBirthDate('birthDay', $birthDate)) {
            $error = true;
        }
        if (!$verifications->isValidPhoneNumber('phoneNumber', $phoneNumber)) {
            $error = true;
        }
        if (!$error) {
            $password = $this->security->hash($password);
            $birthDate = date('Y/m/d', strtotime(str_replace('/', '-', $birthDate)));
            $this->queryAddUsers([$firstName, $lastName, $mail, $userName, $password, $birthDate, $phoneNumber]);
            $this->security->safeLocalRedirect('connection');
        }
        return $verifications->getErrors();
    }

    /**
     * Function qui va verifier les differentes données et
     * si il n'y a pas d'errors va mettre à jour l'utilisateur.
     * @param string $firstName
     * @param string $lastName
     * @param string $mail
     * @param string $userName
     * @param string $birthDate
     * @param string $phoneNumber
     * @param string $idRank
     * @param int $id
     * @return array
     */
    public function editUserForm($firstName, $lastName, $mail, $userName, $birthDate, $phoneNumber, $idRank, $id) {
        $verifications = new FormInputErrorMessage();
        $error = false;
        if (!$verifications->isValidName('firstName', $firstName)) {
            $error = true;
        }
        if (!$verifications->isValidName('lastName', $lastName)) {
            $error = true;
        }
        if (!$verifications->isValidMail('mail', $mail)) {
            $error = true;
        }
        if (!$verifications->isValidUserName('userName', $userName)) {
            $error = true;
        }

        if (!$verifications->isValidBirthDate('birthDay', $birthDate)) {
            $error = true;
        }
        if (!$verifications->isValidPhoneNumber('phoneNumber', $phoneNumber)) {
            $error = true;
        }
        if (!$error) {
            $birthDate = date('Y/m/d', strtotime(str_replace('/', '-', $birthDate)));
            $this->queryEditUserFrom([$firstName, $lastName, $mail, $userName, $birthDate, $phoneNumber, $idRank, $id]);
        }
        return $verifications->getErrors();
    }

    /**
     * Function qui va faire les verification pour la connectio, si il n'y a pas d'erreur
     * elle va créer une session avec les paramettres de l'utilisateur.
     * @param string $login
     * @param string $password
     * @return array
     */
    public function loginUser($login, $password) {
        $verifications = new FormInputErrorMessage();
        $error = false;
        $user = $verifications->connectionUserName('login', $login);
        if (!$user) {
            $error = true;
        }
        if (!$verifications->connectionPassword('password', $password)) {
            $error = true;
        }
        if (!$error) {
            $this->id = $user->id;
            if (!$verifications->matchPassword($password, $user->password)) {
                $error = true;
            }
        }
        if (!$error) {
            $_SESSION['auth'] = $user;
            $this->security->safeLocalRedirect('profil');
        }
        return $verifications->getErrors();
    }

    public function getDisconect(){
        unset($_SESSION['auth']);
    }

    /**
     *
     * @param string $id
     */
    public function deletUser($id) {
        $this->queryDeletUser([$id]);
    }

    /**
     *
     * @return boolean
     */
    public function exists() {
        return !is_null($this->id) ? true : false;
    }

    /**
     *
     * @param string $password
     * @return type
     */
    public function setPassword($password) {
        $password = $this->security->hash($password);
        $req = $this->db->query('UPDATE users SET password = ? WHERE id = ?', [$password, $this->getId()]);
        return $req;
    }

    /**
     * fonction qui va permetre de créer un utilisateur
     * @param array $params
     * @return boolean
     */
    private function queryAddUsers($params = []) {
        $req = $this->db->query('INSERT INTO `users`(firstName,lastName,mail,userName,password,birthDate,phoneNumber,id_ranks) VALUE (?,?,?,?,?,?,?,1)', $params);
        if ($req) {
            return true;
        }
        return false;
    }

    /**
     * Function pour mettre à jour l'utilisateur.
     * @param array $params
     * @return boolean
     */
    private function queryEditUserFrom($params = []) {
        $req = $this->db->query('UPDATE `users` SET `firstName` = ?, lastName = ?, mail = ?, userName = ?, birthDate = ?, phoneNumber = ?, id_ranks = ? WHERE id = ?', $params);
        if ($req) {
            return true;
        }
        return false;
    }

    /**
     * Function pour suprimer l'utilisateur.
     * @param array $params
     * @return boolean
     */
    private function queryDeletUser($params = []) {
        $req = $this->db->query('DELETE FROM `users` WHERE id = ?', $params);
        if ($req) {
            return true;
        }
        return false;
    }

    public function __destruct() {

    }

}
