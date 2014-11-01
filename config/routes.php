<?php
    require 'application.php';
    $router = new Router($_SERVER['REQUEST_URI']);

    $router->get('/', array('controller' => 'HomeController', 'action' => 'index'));

    /* Rotas para os contatos
    ------------------------- */
    $router->get('/fale-conosco', array('controller' => 'ContactsController', 'action' => '_new'));
    $router->post('/fale-conosco', array('controller' => 'ContactsController', 'action' => 'create'));
    /* Fim das rotas para os contatos
    --------------------------------- */

    /* Rotas para os usuários
    ------------------------- */
    $router->get('/registre-se', array('controller' => 'UsersController', 'action' => '_new'));
    $router->post('/registre-se', array('controller' => 'UsersController', 'action' => 'create'));
    $router->get('/perfil', array('controller' => 'UsersController', 'action' => 'edit'));
    $router->post('/perfil', array('controller' => 'UsersController', 'action' => 'update'));
    /* Fim das rotas para os usuários
    --------------------------------- */

    /* Rotas para os sessões
    ------------------------- */
    $router->get('/login', array('controller' => 'SessionsController', 'action' => '_new'));
    $router->post('/login', array('controller' => 'SessionsController', 'action' => 'create'));
    $router->get('/logout', array('controller' => 'SessionsController', 'action' => 'destroy'));
    /* Fim das rotas para os sessões
      --------------------------------- */
      
    $router->load();
?>
