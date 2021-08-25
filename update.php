<?php

     if(isset($_POST['Update-person'])){
       // session_start();
       require_once 'header.php';
       require_once 'includes/dbh.inc.php';
       $id = $_POST['id-update'];
       $sql = "SELECT * FROM people WHERE id = :id";
       $stmt = $pdo->prepare($sql);
       $stmt->execute([':id' => $id]);
       $results = $stmt->fetch(PDO::FETCH_ASSOC);
       // var_dump($results);
       // exit;

       echo "
       <main>
            <div class='edit'>

              <form method='post' action='includes/Update.inc.php' enctype='multipart/form-data' id='Update-person'>
              <img src=images/".$results['img']." alt='no image' height=200px>
                  <Label>Image:</Label>
                <input type='file' name='img'>
                <Label>Name:</Label>
                <input type='text' name='name' value=".$results['name'].">
                <Label>Second name:</Label>
                <input type='text' name='second_name' value=".$results['second_name'].">
                <Label>Surname:</Label>
                <input type='text' name='surname' value=".$results['surname'].">
                <Label>Date Of Birth:</Label>
                <input type='date' name='DOB' value=".$results['DOB'].">
                <input type='hidden' name='number' value =".$results['id'].">

                <input type='submit' name='edit-submit' value='submit'>
              </form>
            </div>
       </main>";

     }else{
       header('Location:main.php');
       exit();
     }
 ?>
