<?php

    if(isset($_POST['edit-submit'])){
      require_once 'dbh.inc.php';

      $name = $_POST['name'];
      $second_name = $_POST['second_name'];
      $surname = $_POST['surname'];
      $DOB = $_POST['DOB'];
      $id = $_POST['number'];


      // UPDATING IMAGE BELOW

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
      $image = $path."/".$_FILES['img']['name'];

      // UPDATING IMAGE ABOVE


      $sql = "UPDATE people SET name= :name, second_name = :second_name, surname = :surname,  DOB = :DOB, img = :img WHERE id = :id ";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([':name' => $name, ':second_name' => $second_name, ':surname' => $surname, ':DOB' => $DOB, ':img' => $image ,":id" => $id,]);

      if($stmt){
        echo "database updated";
        $sql = 'SELECT * FROM people WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // var_dump($row);
        header('Location:../main.php?update='.$row['name']);

      }
    }else{
      header('Location:../main.php');
    }
