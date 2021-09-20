<?php

 if(isset($_POST['submit-signup'])){
   require_once "dbh.inc.php";

   $email = $_POST['email'];
   $username = $_POST['username'];
   $password = $_POST['password'];
   $passwordRepeat = $_POST['password-Repeat'];

   if(empty($email) || empty($username) || empty($password) || empty($passwordRepeat) ) {
     header("Location:../signup.php?error=emptyfields");
     exit();
   }else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
     header("Location:../signup.php?error=invalidEmailandUsername");
     exit();
   }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
     header("Location:../signup.php?error=invalidEmail&username=".$username);
     exit();
   }else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
     header("Location:../signup.php?error=invalidUsername&email=".$email);
     exit();
   }else if($password !== $passwordRepeat){
     header("Location:../signup.php?error=passwordsDon'tmatch&username=".$username."&email=".$email);
     exit();
   }else{
     $sql = "SELECT name FROM names WHERE email=:email";
     $stmt = $pdo->prepare($sql);
     $stmt->bindValue(':email', $email);
     $stmt->execute();
     $results = $stmt->fetch(PDO::FETCH_ASSOC);

     if($results != null){
       header("Location:../signup.php?error=usernametaken&username=".$username."&email=".$email);
       exit();
     }else{
       $sql = "INSERT INTO names(email, name, passwordd) VALUES(:email, :name, :passwordd)";
       $stmt = $pdo->prepare($sql);
      
       if(!$stmt){
         header("Location:../signup.php?error=sqlerror");
         exit();
       }else{
         $passwordHash = password_hash($password, PASSWORD_DEFAULT);
         $stmt->bindValue(':email', $email);
         $stmt->bindValue(':name', $username);
         $stmt->bindValue(':passwordd', $passwordHash);
         $stmt->execute();

         header("Location:../index.php?signup=success");
         exit();
       }

     }
   }
 }else{
   header('Location:../signup.php');
   exit();
 }
