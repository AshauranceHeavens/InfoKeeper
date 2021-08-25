<?php
//ADD SESSION
session_start();
      ?>

<!DOCTYPE html>
<html>
   <head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="Information Keeper">
     <meta name="author" content="Sqiniseko Zulu">
     <title>Information Keeper</title>
     <link rel="stylesheet" href="styles/login.css"> <!-- php dependant -->
     <style>

     </style>
   </head>
   <body>
     <header>
       <h1>
        The Database
      </h1>
      <nav>
      <?php if(isset($_SESSION['NAME'])){
        echo "<ul>
          <li><a href=\"main.php\">Home</a></li>
        </ul>
        <form style='display:inline;padding-right:20px;' method=\"post\" action=\"includes/logout.inc.php\">
          <input type=\"submit\" name=\"submit-logout\" value=\"Log Out\">
        </form>";
      }else{

      }
      ?>
    </nav>
     </header>
