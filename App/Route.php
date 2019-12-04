<?php 

namespace App;
use MF\Init\Bootstrap;

class Route extends Bootstrap{
        
    protected function initRoutes(){
        $routes['home'] = array(
            'route'      => '/',
            'controller' => 'indexController',
            'action'     => 'index'
        );
        $routes['inscreverse'] = array(
            'route'      => '/inscreverse',
            'controller' => 'indexController',
            'action'     => 'inscreverse'
        );
        $routes['register'] = array(
            'route'      => '/register',
            'controller' => 'indexController',
            'action'     => 'register'
        );

        $this->setRoutes($routes);
    }
    
    
}

?>