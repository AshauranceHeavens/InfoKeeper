
<?php
     session_start();

     require_once "header.php";
     require_once "includes/dbh.inc.php";

     $name = $_POST['name'];

     $sql = "SELECT * FROM people WHERE name LIKE :name OR second_name LIKE :name ";
     $stmt  = $pdo->prepare($sql);
     $stmt->bindValue(':name', $name);
     $stmt->bindValue(':name', $name);
     $stmt->execute();
     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
     $_SESSION['array'] = $results;

     // var_dump($results);
     // $url = urlencode(serialize($results));

     header("Location:testing3.php");

 ?>
