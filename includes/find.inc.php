<?php

   if(isset($_POST['submit-name-find'])){
        if(!empty($_POST['find-name'])){

             require_once "dbh.inc.php";

            $name = $_POST['find-name'];

            if($name !== '*'){
              $sql = "SELECT * FROM people WHERE name LIKE :name OR second_name LIKE :name  "; /*SEARCH FOR SECOND OR FIRSTNAME and if two rows have the same name only one shows*/
              $stmt = $pdo->prepare($sql);

              if($stmt){
                $stmt->bindValue(':name', $name);
                $stmt->bindValue(':name', $name);
                $stmt->execute();
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if($results != null){
                      session_start();
                      $_SESSION['array'] = $results;

                      // var_dump($_SESSION['array']);
                      header("Location:../info.php");
                      exit();

                    }else{
                      header("Location:../main.php?error=resultsNULL");
                      exit();
                    }
              }else{
                header("Location:../main.php?error=sqlerror");
                exit();
              }
            }else{
              $sql = "SELECT * FROM people"; /*SEARCH FOR SECOND OR FIRSTNAME and if two rows have the same name only one shows*/
              $stmt = $pdo->prepare($sql);

              if($stmt){
                $stmt->bindValue(':name', $name);
                $stmt->bindValue(':name', $name);
                $stmt->execute();
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if($results != null){
                      session_start();
                      $_SESSION['array'] = $results;

                      // var_dump($_SESSION['array']);
                      header("Location:../info.php");
                      exit();

                    }else{
                      header("Location:../main.php?error=resultsNULL");
                      exit();
                    }
              }else{
                header("Location:../main.php?error=sqlerror");
                exit();
              }
            }


        }else{
          header("Location: ../main.php?error=emptyfields");
          exit();
        }
   }else{
     header("Location: ../main.php");
     exit();
   }
 ?>
