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
        $routes['auth'] = array(
            'route'      => '/auth',
            'controller' => 'AuthController',
            'action'     => 'auth'
        );
        $routes['timeline'] = array(
            'route'      => '/timeline',
            'controller' => 'AppController',
            'action'     => 'timeline'
        );
        $routes['quit'] = array(
            'route'      => '/quit',
            'controller' => 'AuthController',
            'action'     => 'quit'
        );
        $routes['tweet'] = array(
            'route'      => '/tweet',
            'controller' => 'AppController',
            'action'     => 'tweet'
        );

        $this->setRoutes($routes);
    }
    
    
}

?>