<?php
    class Functions{

      public static function random($number){
          $characters = "123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
          $rand = rand(0, strlen($characters));
          $index = 0;
          $img_name = $characters[$rand];

          while($index <= $number){
            $rand = rand(0, strlen($characters));
            $img_name .= $characters[$rand];
            $index += 1;
          }

          return $img_name;
        }
    }
 ?>
