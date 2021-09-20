<?php


if(isset($_POST['submit-login'])){
  require_once "dbh.inc.php";

  $email = $_POST['email'];
  $password = $_POST['password'];

  if(empty($email) || empty($password)){
    //empty fields
      header("Location:../index.php");
      exit();
  }else{
    $sql = "SELECT * FROM names WHERE email =:email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email); 
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $passwordcheck = password_verify($password, $row['passwordd']);

    if(!$passwordcheck){
      header("Location:../index.php?login=wrongpwd");
      exit();
    }else{
      session_start();
      $_SESSION['ID'] = $row['id'];
      $_SESSION['EMAIL'] = $row['email'];
      $_SESSION['NAME'] = $row['name'];

      header("Location:../main.php?login=success");
      exit();
    }
    }
  }else{
    header("Location:../main.php?login=illegal");
  }
