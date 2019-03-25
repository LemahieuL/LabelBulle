<?php

namespace Controllers;

class IndexController extends Controller {
    /**
     * Fonction pour aficher la page d'accueil.
     */
    public function getHome() {
        $this->render('index');
    }

    /**
     * Fonction pour afficher la page 404.
     */
    public function NotFound() {
        $this->render('errors/404');
    }

    /**
    * fonction pour afficher les politique de confidentialité
    **/
    public function privaty_polity(){
        $this->render('required/privacyPolicy');
    }

}
