<?php

namespace Controllers;

use Models\Profil\Profil;
use Models\Profil\Rank;
use Models\Manga\Collection;
use Models\Manga\Type;

class ProfilController extends Controller {

    /**
     * Fonction pour afficher l'inscription
     */
    public function getRegister() {
        $this->render('profil/register');
    }

    /**
     * Fonction pour afficher la connection
     */
    public function getConnect() {
        $this->render('profil/connection');
    }

    /**
     * Fonction pour afficher la mise à jour des utilisateur.
     */
    public function getEditUser() {
        $rank = new Rank();
        $this->render('profil/editUser', ['ranks' => $rank->showRank()]);
    }

    /**
     * Fonction pour envoyer les données de la mise à jour des utilisateurs.
     */
    public function editUser() {
        $user = [];
        $rank = new Rank();
        if (isset($_POST['firstName'], $_POST['lastName'], $_POST['mail'], $_POST['login'])) {
            $updateUser = new Profil();
            $user = $updateUser->editUserForm($_POST['firstName'], $_POST['lastName'], $_POST['mail'], $_POST['login'], $_POST['birthDay'], $_POST['phoneNumber'], $_POST['idRank'], $_POST['id']);
        }
        $this->render('profil/editUser', ['errors' => $user, 'ranks' => $rank->showRank()]);
    }

    /**
     * Fonction pour envoyer les données de la création des utilisateurs.
     */
    public function createUser() {
        $users = [];
        if (isset($_POST['firstName'], $_POST['lastName'], $_POST['mail'], $_POST['login'], $_POST['password'])) {
            $addUser = new Profil();
            $users = $addUser->addUsers($_POST['firstName'], $_POST['lastName'], $_POST['mail'], $_POST['login'], $_POST['password'], $_POST['birthDay'], $_POST['phoneNumber']);
        }
        $this->render('profil/register', ['errors' => $users]);
    }

    /**
     * Fonction pour envoyer les données de la connection des utilisateurs.
     */
    public function login() {
        $login = [];
        if (isset($_POST['loginUserName'], $_POST['loginPassword'])) {
            $user = new Profil();
            $login = $user->loginUser($_POST['loginUserName'], $_POST['loginPassword']);
        }
        $this->render('profil/connection', ['errors' => $login]);
    }

    /**
     * Fonction pour afficher le profil de l'utilisateur.
     */
    public function profil() {
        $this->render('profil/profil');
    }

    public function management() {
        $users = new Profil();
        $collections = new Collection();
        $this->render('profil/management', ['page' => 'profil', 'users' => $users->showUsers(), 'collections' => $collections->showCollection()]);
        
    }

    public function getDisconect() {
        $profil = new Profil();
        $disconet = $profil->getDisconect();
        $this->security->safeLocalRedirect('index');
    }

    /**
     * Fonction pour supprimer une collection de manga.
     */
    public function deleteCollection() {
        $id = isset($_POST['deleteCollectionId']) ? $_POST['deleteCollectionId'] : 0;
        $collection = new Collection();
        $delete = $collection->getQueryDeleteCollection($id);
        $this->security->safeLocalRedirect('profil');
    }

    /**
     * Fonction pour afficher la mise à jour de la collecion des mangas.
     */
    public function updateCollection() {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $type = new Type();
        if ($this->db->existContent('manga_collection', 'id', $id)) {
            $this->render('manga/updateCollection', ['genres' => $type->showType()]);
        } else {
            $this->security->safeLocalRedirect('default');
        }
    }

}
