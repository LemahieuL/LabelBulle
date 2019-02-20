<?php

namespace Controllers;

use App\Views\View;
use Models\Database\PDOConnect;
use App\Protections\Security;
class Controller {
    
    protected $db;


    protected $security;


    public function __construct() {
        $this->db = new PDOConnect();
        $this->security = new Security();
    }
    
    /**
     * 
     * @return array
     */
    protected function getRouter(){
        return $GLOBALS['router'];
    }
    
    /**
     * 
     * @param type $path
     * @param array $args
     */
    protected function render($path, $args = []){
        $view = new View($path);
            $args['router'] = $this->getRouter();
        $view->assign($args);
        
    }
    
    public function __destruct() {
        
    }
}
