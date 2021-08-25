<?php

    if(isset($_POST['submit-info-add'])){
      require_once "dbh.inc.php";

      /*check for empty fields*/


      if(!empty($_POST['add-name']) && !empty($_POST['add-second-name']) && !empty($_POST['add-surname']) && !empty($DOB = $_POST['DOB'])){

        $name = $_POST['add-name'];
        $secondName = $_POST['add-second-name'];
        $surname = $_POST['add-surname'];
        $DOB = $_POST['DOB'];

        //UPLOADING AN IMAGE BELOW
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
        $image = $path ."/". $_FILES['img']['name'];
        //UPLOADING AN IMAGE ABOVE

        $sql = "INSERT INTO people(name, second_name, surname, DOB, img) VALUES(:name, :second_name, :surname, :DOB, :img)";
        $stmt = $pdo->prepare($sql); //check for errors
        $stmt->execute([':name' => $name, ':second_name' => $secondName, ':surname' => $surname, ':DOB' => $DOB, ':img' => $image]);


        if($stmt){
          $NewRow = $name;

          header("Location: ../main.php?newuser=".$NewRow);
          exit();
        }else{
          header("Location: ../main.php?error=sqlerror");
          exit();
        }
      }else{
        header("Location:../main.php?error=emptyfields");
        exit();
      }
    //
    // }else{
    //   header("Location: ../main.php?newuser=".$NewRow);
    //   exit();
    // }


    }else{
      header("Location:../main.php");
      exit();
    }
 ?>
