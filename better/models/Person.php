<?php

    class Person{

      public ?int $id = null;
      public ?string $name = null;
      public ?string $second_name = null;
      public ?string $surname = null;
      public ?string $DOB = null;
      public ?array $imageFile = null;
      public ?string $imagePath = null;

      public function load($person){
        $this->name = $person['name'];
        $this->second_name = $person['second_name'];
        $this->surname = $person['surname'];
        $this->DOB = $person['DOB'];
        $this->imageFile = $_FILES['image'];
        $this->id = $person['id'];
      }

      public function save(){

        $errors = [];

        if(empty($this->name)){
           $errors[] = "Name is required";
        }

        if(empty($this->surname)){
           $errors[] = "Surname is required";
        }

        if(empty($errors)){

          if(!empty($this->name) && !empty($this->surname)){
            if(!preg_match('/^[a-zA-Z]*$/',$this->name)){
              $errors[] = "Special characters are not allowed in the name field, only a-z or A-Z is allowed";
            }

            if(!preg_match('/^[a-zA-Z]*$/',$this->surname)){
              $errors[] = "Special characters are not allowed in the surname field, only a-z or A-Z is allowed";
            }
          }else{
            $errors[] = "Name and surname are required";
          }

          if(isset($this->second_name) && !preg_match('/^[a-zA-Z]*$/',$this->name)){
            $errors[] = "Special characters are not allowed in the name field, only a-z or A-Z is allowed";
          }
          // var_dump($this->imageFile); exit();

          if (!is_dir(__DIR__.'/../public/images')) {
            mkdir(__DIR__.'/../public/images');
          }

          if($this->imageFile){
            if(isset($this->imageFile['tmp_name'])){

              require_once __DIR__.'/../functions/Functions.php';

              $path = Functions::random(8);
              mkdir(__DIR__."/../public/images/".$this->name."".$path);
              // echo $path;
              move_uploaded_file($this->imageFile['tmp_name'], __DIR__."/../public/images/" . $this->name."".$path ."/". $this->imageFile['name']);
              $image = $this->name."".$path ."/". $this->imageFile['name'];

              $this->imagePath = $image;

            }
          }

        }

        return $errors;

      }

    }
 ?>
