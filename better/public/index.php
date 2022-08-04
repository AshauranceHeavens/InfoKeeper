<?php
    require_once __DIR__."/../Router.php";
    require_once __DIR__."/../controllers/PeopleController.php";

    $router = new Router();

    $router->get('/', [PeopleController::class, 'index']);
    $router->post('/', [PeopleController::class, 'index']); // NOTE: postIndex was here
    $router->get('/people/login', [PeopleController::class, 'index']);
    $router->post('/people/login', [PeopleController::class, 'index']); // NOTE: postIndex was here

    $router->get('/people/logout', [PeopleController::class, 'logOut']);
    $router->post('/people/logout', [PeopleController::class, 'logOut']);

    $router->get('/people/people', [PeopleController::class, 'people']);
    $router->post('/people/people', [PeopleController::class, 'people']);

    $router->get('/people/add_person', [PeopleController::class, 'addPerson']);
    $router->post('/people/add_person', [PeopleController::class, 'addPerson']);

    $router->get('/people/view', [PeopleController::class, 'view']);
    // $router->post('/people/view', [PeopleController::class, 'view']);


    $router->get('/people/update', [PeopleController::class, 'updatePerson']);
    $router->post('/people/update', [PeopleController::class, 'updatePerson']);

    $router->post('/people/delete', [PeopleController::class, 'delete']);


    $router->resolve();
 ?>
