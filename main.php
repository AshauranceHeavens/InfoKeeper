<?php
   require_once "header.php";
   require_once "includes/dbh.inc.php";

if(isset($_SESSION['ID']) ){ //&& !isset($_GET['error']) /*|| isset($_GET['login']*//*&& !$_GET['error'] === "sqlerror"*/){
     echo"<main>
        <div class=\"main-head\">
          <h1>
            Welcome Mr " .$_SESSION['NAME']."
          </h1>
        </div>";

 
        if(isset($_GET['error'])){
              if($_GET['error'] === 'emptyfields'){
                    echo "<p class='errorMessage'>
                             Some fields were empty, make sure to fill in all fields
                          </p>";
              }else if($_GET['error'] === 'resultsNULL'){
                    echo "<p class='errorMessage'>
                             There's no such entry on the database
                          </p>";
              }else if($_GET['error'] === 'sqlerror'){
                echo "<p class='errorMessage'>
                         There's an error in the system
                      </p>";
              }

         } 


        echo"<div class=\"find-info\">
          <h2>Search A Person</h2>
          <form method='post' action='includes/find.inc.php'>
             <Label>Name:</Label>
             <input type=\"text\" name=\"find-name\" placeholder='Enter name you are looking for' >
             <input type='submit' name='submit-name-find' value='submit'>
          </form>
        </div>
        <div class=\"add-info\">
          <h2>Add A Person</h2>
          <form method='post' action='includes/add.inc.php'enctype='multipart/form-data'>
            <Label>Image:</Label>
            <input type='file' name='img'>
             <Label>Name:</Label>
             <input type=\"text\" name=\"add-name\" placeholder='Enter first name' >
             <Label>Second name:</Label>
             <input type='text' name='add-second-name' placeholder='Enter second name'>
             <Label>Surname:</Label>
             <input type='text' name='add-surname' placeholder='Enter surname'>
             <Label>Date Of Birth:</Label>
             <input type='date' name='DOB' placeholder='YYYY/MM/DD'>
             <input type='submit' name='submit-info-add' value='submit'>
          </form>
        </div>
     </main>"; /*CHECK THE DATE OF BIRTH INPUT TYPE*/
   }else{
     header("Location:index.php?error=illegalLogin");
     exit();
   }

   require_once "footer.php";
 ?>
