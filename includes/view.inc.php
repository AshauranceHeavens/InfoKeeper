<?php
    if(isset($_POST['view-person'])){
      require_once 'dbh.inc.php';

      $id = $_POST['id-view'];

      $sql = "SELECT * FROM people WHERE id = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([':id' => $id]);
      $results = $stmt->fetch(PDO::FETCH_ASSOC);

      session_start();

      $_SESSION['view'] = $results;

      header('Location: ../view.php?view='.$results['name']);
      exit();
    }else{
      header('Location: ../main.php');
      exit();
    }
