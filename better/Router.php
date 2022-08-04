<?php

     require_once __DIR__."/Database.php";

     class Router{

       public array $getRoutes = [];
       public array $postRoutes = [];
       public Database $db;

       public function __construct(){
         $this->db = new Database();
       }

       public function get($url, $fn){
         $this->getRoutes[$url] = $fn;
       }

       public function post($url, $fn){
         $this->postRoutes[$url] = $fn;
       }

       public function resolve(){

         $currentUrl = $_SERVER['REQUEST_URI'] ?? '/';

         if(strpos($currentUrl, '?') !== false){
           $currentUrl = substr($currentUrl, 0, strpos($currentUrl, '?'));
         }

         $method = $_SERVER['REQUEST_METHOD'];

         if($method === 'GET'){
            $func = $this->getRoutes[$currentUrl];
         }else{
           $func = $this->postRoutes[$currentUrl];
         }

         if($func){
           call_user_func($func, $this);
         }else{
           echo "Page not found";
         }

       }

       public function renderView($view, $params = []){

         $params['route'] = $view;

         foreach ($params as $key => $value) {
           $$key = $value;
         }

         // echo "<pre>";
         // var_dump($params);
         // echo "</pre>";
         // exit();

         ob_start();
         require_once __DIR__."/views/$view.php";
         $content = ob_get_clean();
         require_once __DIR__."/views/_layout.php";
       }
     }
 ?>
