<?php

namespace Controllers;

use Models\Profil\Profil;
use Models\Profil\Rank;

class ProfilController extends Controller {

    public function getRegister() {
        $this->render('profil/register');
    }

    public function getConnect() {
        $this->render('profil/connection');
    }

    public function getEditUser() {
        $rank = new Rank();
        $this->render('profil/editUser', ['ranks' => $rank->showRank()]);
    }

    public function editUser() {
        $user = [];
        $rank = new Rank();
        if (isset($_POST['firstName'], $_POST['lastName'], $_POST['mail'], $_POST['login'])) {
            $updateUser = new Profil();
            $user = $updateUser->editUserForm($_POST['firstName'], $_POST['lastName'], $_POST['mail'], $_POST['login'], $_POST['birthDay'], $_POST['phoneNumber'], $_POST['idRank'], $_POST['id']);
        }
        $this->render('profil/editUser', ['errors' => $user, 'ranks' => $rank->showRank()]);
    }

    public function createUser() {
        $users = [];
        if (isset($_POST['firstName'], $_POST['lastName'], $_POST['mail'], $_POST['login'], $_POST['password'])) {
            $addUser = new Profil();
            $users = $addUser->addUsers($_POST['firstName'], $_POST['lastName'], $_POST['mail'], $_POST['login'], $_POST['password'], $_POST['birthDay'], $_POST['phoneNumber']);
            
        } 
            $this->render('profil/register', ['errors' => $users]);
        
    }

    public function login() {
        $login = [];
        if (isset($_POST['loginUserName'], $_POST['loginPassword'])) {
            $user = new Profil();
            $login = $user->loginUser($_POST['loginUserName'], $_POST['loginPassword']);
        }
        $this->render('profil/connection', ['errors' => $login]);
    }

    public function profil() {
        $users = new Profil();
        $this->render('profil/profil', ['users' => $users->showUsers()]);
    }

}
