<?php
$host = "localhost";
$databaseName = "InfoKeeper";
$username = "root";
$password = "";


  $dsn = 'mysql:host='.$host.'; dbname='.$databaseName;
  $pdo = new PDO($dsn, $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// BETTER METHOD
/*
try{
    $dsn = 'mysql:host='.$host.'; dbname='.$databaseName;
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $error){
    echo "error: " .$error->getMessage();
}
*/
