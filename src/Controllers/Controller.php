<?php

namespace Controllers;

use App\Views\View;
use Models\Database\PDOConnect;
use App\Protections\Security;
use Models\Profil\Profil;

class Controller {

    protected $db;
    protected $security;

    public function __construct() {
        session_start();
        $this->db = new PDOConnect();
        $this->security = new Security();
    }

    /**
     * 
     * @return array
     */
    protected function getRouter() {
        return $GLOBALS['router'];
    }

    /**
     * 
     * @param type $path
     * @param array $args
     */
    protected function render($path, $args = []) {
        $args['user'] = new Profil();
        $args['router'] = $this->getRouter();
        $view = new View('required/header');
        $view->assign($args);
        $view = new View($path);
        $view->assign($args);
        $view = new View('required/footer');
        $view->assign($args);
    }
    
    public function __destruct() {
        
    }

}
