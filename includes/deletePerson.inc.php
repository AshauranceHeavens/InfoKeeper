<?php

    if(isset($_POST['delete-person'])){
          require "dbh.inc.php";

          $id = $_POST['id-delete'];

          if(!empty($id)){
                $sql = "DELETE FROM people WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([':id' => $id]);

                if($stmt){
                  header("Location: ../info.php?delete=rowdeleted");
                  exit();
                }else{
                  header("Location: ../main.php?delete=sqlerror");
                  exit();
                }
          }else{
            header("Location: ../main.php?error=emptyfield");
            exit();
          }

    }else{
      header("Location: ../main.php?error=illegalLogin");
      exit();
    }
