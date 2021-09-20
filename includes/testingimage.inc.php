<?php


 
    function random($number){
      $characters = "123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
      $rand = rand(0, strlen($characters));
      $index = 0;
      $name = $characters[$rand];

      while($index <= $number){
        $rand = rand(0, strlen($characters));
        $name .= $characters[$rand];
        $index += 1;
      }

      return $name;
    }



    $path = random(8);
    mkdir("../images/".$path);
    echo $path;
    move_uploaded_file($_FILES['img']['tmp_name'], "../images/" . $path ."/". $_FILES['img']['name']);

   
