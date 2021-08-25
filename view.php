<?php
    if(isset($_GET['view'])){
      require_once 'header.php';
      $details = $_SESSION['view'];

      echo"<main>
      <div class='edit'>
      <form  method='post' action='update.php'>
        <img src='images/".$details['img']."' alt='none' height='200px'>
        <Label>Name:</Label>
        <input type='text' name='name' value='".$details['name']."'>
        <Label>Second name:</Label>
        <input type='text' name='name' value='".$details['second_name']."'>
        <Label>Surname:</Label>
        <input type='text' name='name' value='".$details['surname']."'>
        <Label>DOB:</Label>
        <input type='text' name='name' value='".$details['DOB']."'>
        <input type='hidden' name='id-update' value='".$details['id']."'>
        <input type='submit' name='Update-person' value='Update'>
        </form>
      </div>
</main>
      ";
    }else{
      header('Location: main.php');
    }
