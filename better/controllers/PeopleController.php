<?php

    require_once __DIR__."/../models/login.php";
    require_once __DIR__."/../models/Person.php";
    require_once __DIR__."/../functions/Functions.php";

    class PeopleController{

      public function searchPerson(Router $router){
        // $person = '';

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit-login'])){
          $person = $_POST['name'] ?? null;
          $people = $router->db->getPeople($person);

        }else{

          $people = $router->db->getPeople();

        }

        return $people;

        // return $router->renderView('people/people', [
        //   'people' => $people,
        //   'search' => $person
        // ]);
      }

      public function sessionTest(){
        session_start();

        if(!isset($_SESSION['EMAIL']) && !isset($_SESSION['NAME'])){
          header("Location: /");
          exit();
        }

      }

      public function index($router){
        session_start();
        $errors = [];

        if(isset($_SESSION['EMAIL']) && isset($_SESSION['NAME'])){
          header("Location: /people/people");
          exit();
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit-login'])){
          self::searchPerson($router);

          $errors = [];
          $loginDetails = new login();
          $loginDetails->email = $_POST['email'];
          $loginDetails->password = $_POST['password'];

          $login = new login();
          $login->load($loginDetails);
          $errors = $login->save();

          if(empty($errors)){
            $loginRes = $router->db->login($loginDetails);

            $passwordCheck = password_verify($loginDetails->password, $loginRes['passwordd']);

            if($passwordCheck){

              session_start();
              $_SESSION['EMAIL'] = $loginDetails->email;
              $_SESSION['NAME'] = $loginRes['name'];

              // $people = $router->db->getPeople();

              // return $router->renderView('people/people', [
              //   'people' => $people
              // ]);

              header("Location: /people/people");
              exit();

            }else{
              $errors[] = "Invalid login credentials";

              return $router->renderView('people/login', [
                'errors' => $errors
              ]);
           }

          }else{
            return $router->renderView('people/login', [
              'errors' => $errors
            ]);
          }
        }

        return $router->renderView('people/login', [
          'errors' => $errors
        ]);
      }

      public function people($router){

        self::sessionTest();
        $errors = [];

        $people = self::searchPerson($router);

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit-search-p'])){
          $person = $_POST['name'] ?? null;
          $people = $router->db->getPeople($person);

          return $router->renderView('people/people', [
            'people' => $people,
            'errors' => $errors,
            'search' => $person
          ]);
        }

        return $router->renderView('people/people', [
          'people'=> $people
        ]);
      }

      public function addPerson($router){

        self::sessionTest();

        $errors = [];
        $person = '';

         if($_SERVER['REQUEST_METHOD'] === 'POST'){
           $P_update = [
             'name' => $_POST['name'],
             'second_name' => $_POST['second_name'],
             'surname' => $_POST['surname'],
             'DOB' => $_POST['DOB'],
           ];


           $personUpdate = new Person();
           $personUpdate->load($P_update);
           $errors = $personUpdate->save();

           $router->db->addPerson($personUpdate);
           // $person = $router->db->getPeople($personUpdate->name);

           header("Location: /people/people");
           exit();
         }

        return $router->renderView('people/add_person', [
          'person'=> $person,
          'errors' => $errors
        ]);
      }

      public function view($router){

        self::sessionTest();

        $id = $_GET['id'];

        if(!preg_match('/^[0-9]*$/',$id)){
          header("Location: /");
          exit();
        }

        $person = $router->db->viewPerson($id);

        return $router->renderView('people/view',[
          'person' => $person
        ]);
      }

      public function updatePerson($router){
        self::sessionTest();

        $errors = [];

        $id = $_GET['id'];

        if(!preg_match('/^[0-9]*$/', $id)){
          header("Location: /");
          exit();
        }

        $person = $router->db->viewPerson($id);
        $route = 'people/update';

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

          $errors = [];

          $P_update = [
            'name' => $_POST['name'],
            'second_name' => $_POST['second_name'],
            'surname' => $_POST['surname'],
            'DOB' => $_POST['DOB'],
            'id' => $_POST['id']
          ];

          $personUpdate = new Person();
          $personUpdate->load($P_update);
          $errors = $personUpdate->save();

          $router->db->updatePerson($personUpdate);
          $person = $router->db->viewPerson($personUpdate->id);

        }

        if($person['img'] === 'Array'){
          $person['img'] = null;
        }

        return $router->renderView($route,[
          'person' => $person,
          'route' => $route
        ]);
      }

      public function delete($router){

        self::sessionTest();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

          $id = $_POST['id'];

          if(!preg_match('/^[0-9]*$/', $id)){
            header("Location: /");
            exit();
          }
          $router->db->delete($id);
          $people = $router->db->getPeople();
        }

        // return $router->renderView('people/people', [
        //   'people' => $people,
        //
        // ]);

        header("Location: /people/people");
        exit();
      }

      public function logOut($router){
        self::sessionTest();

         // session_start();
         session_unset();
         session_destroy();

         header("Location: /people/login");
         exit();
      }


    }
 ?>
