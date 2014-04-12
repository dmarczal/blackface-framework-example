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

    /* Rotas para os Área administrativa
    ------------------------- */
    $router->get('/admin', array('controller' => 'Admin\HomeController', 'action' => 'index'));
    $router->get('/admin/login', array('controller' => 'Admin\SessionsController', 'action' => '_new'));
    $router->post('/admin/login', array('controller' => 'Admin\SessionsController', 'action' => 'create'));
    $router->get('/admin/logout', array('controller' => 'Admin\SessionsController', 'action' => 'destroy'));

    /* Rotas para os usuarios
    ------------------------- */
    $router->get('/admin/usuarios', array('controller' => 'Admin\UsersController', 'action' => 'index'));
    $router->get('/admin/usuarios/novo', array('controller' => 'Admin\UsersController', 'action' => '_new'));
    $router->post('/admin/usuarios', array('controller' => 'Admin\UsersController', 'action' => 'create'));

    $router->get('/admin/usuarios/:id', array('controller' => 'Admin\UsersController', 'action' => 'show'));
    $router->get('/admin/usuarios/:id/editar', array('controller' => 'Admin\UsersController', 'action' => 'edit'));
    $router->post('/admin/usuarios/:id', array('controller' => 'Admin\UsersController', 'action' => 'update'));
    $router->get('/admin/usuarios/:id/deletar', array('controller' => 'Admin\UsersController', 'action' => 'destroy'));
    /* Fim para as rotas para os usuarios
    ------------------------- */

    /* Rotas para os categorias de quarto
    ------------------------- */
    $router->get('/admin/categorias-de-quarto', array('controller' => 'Admin\RoomCategoriesController', 'action' => 'index'));
    $router->get('/admin/categorias-de-quarto/novo', array('controller' => 'Admin\RoomCategoriesController', 'action' => '_new'));
    $router->post('/admin/categorias-de-quarto', array('controller' => 'Admin\RoomCategoriesController', 'action' => 'create'));

    $router->get('/admin/categorias-de-quarto/:id/editar', array('controller' => 'Admin\RoomCategoriesController', 'action' => 'edit'));
    $router->post('/admin/categorias-de-quarto/:id', array('controller' => 'Admin\RoomCategoriesController', 'action' => 'update'));
    $router->get('/admin/categorias-de-quarto/:id/deletar', array('controller' => 'Admin\RoomCategoriesController', 'action' => 'destroy'));
    /* Fim para as rotas para as categorias de quarto

    /* Rotas para os quartos
    ------------------------- */
    $router->get('/admin/quartos', array('controller' => 'Admin\RoomsController', 'action' => 'index'));
    $router->get('/admin/quartos/novo', array('controller' => 'Admin\RoomsController', 'action' => '_new'));
    $router->post('/admin/quartos', array('controller' => 'Admin\RoomsController', 'action' => 'create'));

    $router->get('/admin/quartos/:id/editar', array('controller' => 'Admin\RoomsController', 'action' => 'edit'));
    $router->get('/admin/quartos/:id', array('controller' => 'Admin\RoomsController', 'action' => 'show'));
    $router->post('/admin/quartos/:id', array('controller' => 'Admin\RoomsController', 'action' => 'update'));
    $router->get('/admin/quartos/:id/deletar', array('controller' => 'Admin\RoomsController', 'action' => 'destroy'));
    $router->post('/admin/quartos/:id/imagens', array('controller' => 'Admin\RoomPhotosController', 'action' => 'create'));

    $router->post('/admin/quarto-imagens/:id/deletar', array('controller' => 'Admin\RoomPhotosController', 'action' => 'destroy'));
    /* Fim para as rotas para quartos

    /* Rotas para os contatos
    ------------------------- */
    $router->get('/admin/mensagens-recebidas', array('controller' => 'Admin\ContactsController', 'action' => 'index'));
    /* Fim para as rotas para os contatos
    ------------------------- */

    /* Fim das rotas para as áreas administrativas
    --------------------------------- */
    $router->load();
?>
