<?php

    class login{
      public string $email;
      public string $password;

      public function load($credentials){
        $this->email = $credentials->email;
        $this->password = $credentials->password;
      }

      public function save(){

        $errors = [];

        if(empty($this->email)){
           $errors[] = "Email is required";
        }

        if(empty($this->password)){
           $errors[] = "Password is required";
        }

        if(empty($errors)){

          if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $errors[] = "Invalid Email";
          }

          if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $errors[] = "Invalid Email";
          }
        }

        return $errors;

      }


    }
 ?>
