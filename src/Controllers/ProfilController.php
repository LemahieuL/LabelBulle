<?php

namespace Controllers;

use Models\Profil\Profil;
use Models\Profil\Rank;
use Models\Manga\Collection;
use Models\Manga\Type;
use Models\Manga\Manga;

class ProfilController extends Controller {

  /**
  * Fonction pour afficher l'inscription
  */
  public function getRegister() {
    //on affiche la page d'inscription
    $this->render('profil/register', ['page' => 'register']);
  }

  /**
  * Fonction pour afficher la connection
  */
  public function getConnect() {
    // on affiche la page de connexion
    $this->render('profil/connection');
  }

  /**
  * Fonction pour envoyer les données de la connection des utilisateurs.
  */
  public function login() {
    $login = [];
    // on verifie que on a les donnée de la connexion
    if (isset($_POST['loginUserName'], $_POST['loginPassword'])) {
      // on instancie la variable $user avec la class Profi
      $user = new Profil();
      // on envois les donnée dans la fonction loginUser
      $login = $user->loginUser($_POST['loginUserName'], $_POST['loginPassword']);
    }
    // on affiche les erreurs
    $this->render('profil/connection', ['errors' => $login]);
  }

  /**
  * Fonction pour se deconnecter.
  **/
  public function getDisconect() {
    //on instancie la variable $profil avec la class Profil
    $profil = new Profil();
    // on envois les donnée dans la variable getDisconect
    $disconet = $profil->getDisconect();
    // on redirige vers la page d'acceuil
    $this->security->safeLocalRedirect('index');
  }


  /**
  * Fonction pour afficher la mise à jour des utilisateur.
  */
  public function getEditUser() {
    // on instancie la varibale $users avec la class Profil
    $users = new Profil();
    // on instancie la varibale $rank avec la class Rank
    $rank = new Rank();
    // on verifie si l'utilisateur a la rang 3 au minimun sinon il est rediriger vers la page 404
    if($users->hasRank(3)){
      // on affiche la page de mise à jour des profils
      $this->render('profil/editUser', ['ranks' => $rank->showRank()]);
    } else {
      // on affiche les erreurs
      $this->security->safeLocalRedirect('default');
    }
  }

  /**
  * Fonction pour envoyer les données de la mise à jour des utilisateurs.
  */
  public function editUser() {
    $user = [];
    // on instancie la varibale $rank avec la class Rank
    $rank = new Rank();
    // on verifie si on resoit les informations
    if (isset($_POST['firstName'], $_POST['lastName'], $_POST['mail'], $_POST['login'])) {
      // on instancie la variable $updateUser avec la class Profl
      $updateUser = new Profil();
      // on envois les donné dans la fonction editUserForm.
      $user = $updateUser->editUserForm($_POST['firstName'], $_POST['lastName'], $_POST['mail'], $_POST['login'], $_POST['birthDay'], $_POST['phoneNumber'], $_POST['idRank'], $_POST['id']);
    }
    // on affiche les erreurs
    $this->render('profil/editUser', ['errors' => $user, 'ranks' => $rank->showRank()]);
  }

  /**
  * Fonction pour envoyer les données de la création des utilisateurs.
  */
  public function createUser() {
    $users = [];
    // on verifie que on à les données
    if (isset($_POST['firstName'], $_POST['lastName'], $_POST['mail'], $_POST['login'], $_POST['password'])) {
      // on instancie la variable $addUser avec la class Profil
      $addUser = new Profil();
      // on envoie les données dans la fonction addUsers
      $users = $addUser->addUsers($_POST['firstName'], $_POST['lastName'], $_POST['mail'], $_POST['login'], $_POST['password'], $_POST['birthDay'], $_POST['phoneNumber']);
    }
    // on affiche les erreurs
    $this->render('profil/register', ['page' => 'register', 'errors' => $users]);
  }

  /**
  * Fonction pour afficher le profil de l'utilisateur.
  */
  public function profil() {
    // on instancie la variable $users avec la class Profil
    $users = new Profil();
    // on verifie que l'utilisateur a au moins le rang 1 sinon on le redirige vers l'erreur 404
    if($users->hasRank(1)){
      // on affiche la page du profil avec les informations de l'utilisateur
          $this->render('profil/profil', ['user'=>$users]);
    } else {
      $this->security->safeLocalRedirect('default');
    }
  }

  /**
  * Fonction pour afficher la page de gestion.
  **/
  public function management() {
    // on instancie la variable $users avec la class Profil
    $users = new Profil();
    // on instancie la varible $collections avec la class Collection
    $collections = new Collection();
    // on verifie que l'utilisateur a un moin le rang 3 sinon on le redirige vers l'erreur 404
    if($users->hasRank(3)){
      // on affiche la page de gestion
      $this->render('profil/management', ['page' => 'management', 'users' => $users->showUsers(), 'collections' => $collections->showCollection()]);
    } else {
      $this->security->safeLocalRedirect('default');
    }
  }

  public function getManagementCollection(){
    // on verifie que on resoit l'id
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    // on instancie la variable $users avec la class Profil
    $users = new Profil();
    // on instancie la variable $mangas avec la class Manga
    $mangas = new Manga();
    // on verifie que l'utilisateur à au moins le rang 3 sinon on le redirige vers l'erreur 404
    if($users->hasRank(3)){
    // on verifie que la collection existe sinon on le redirige vers l'erreur 404
    if ($this->db->existContent('manga_collection', 'id', $id)) {
      // on affiche la page de gestion d'un collection d'un manga
    $this->render('manga/managementCollection', ['page'=> 'managementCollection', 'mangas'=>$mangas->showManga([$id])]);
  } else {
      $this->security->safeLocalRedirect('default');
  }
} else {
  $this->security->safeLocalRedirect('default');
}
  }

  /**
  * Fonction pour supprimer une collection de manga.
  */
  public function deleteCollection() {
    // on verifie que on resoit l'id
    $id = isset($_POST['deleteCollectionId']) ? $_POST['deleteCollectionId'] : 0;
    // on instancie la variable $collection avec la class Collection
    $collection = new Collection();
    // on envoit les données dans la fonction deleteCollection
    $delete = $collection->deleteCollection($id);
    $this->security->safeLocalRedirect('management');
  }

  /**
  * Fonction pour afficher la mise à jour de la collecion des mangas.
  */
  public function updateCollection() {
    // on verifie que on resoit l'id
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    // on instancie la variable $users avec la class Profil
    $users = new Profil();
    // on instancie la variable $type avec la class Type
    $type = new Type();
    // on verifie que l'utilisateur à au moins le rang 3 sinon on le redirige vers l'erreur 404
    if($users->hasRank(3)){
      // on verifie que la collection existe sinon on le redirige vers l'erreur 404
      if ($this->db->existContent('manga_collection', 'id', $id)) {
        // on instancie la variable $collection avec la class Collection
        $collection = new Collection($id);
        // on affiche la page de mise à jour de la collection
        $this->render('manga/updateCollection', ['genres' => $type->showType(), 'collection'=>$collection]);
      } else {
        $this->security->safeLocalRedirect('default');
      }
    } else {
      $this->security->safeLocalRedirect('default');
    }
  }

}
