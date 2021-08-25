<?php
    require_once "header.php";
?>
<?php

    if(empty($_GET['email']) && empty($_GET['password']) && !isset($_SESSION['EMAIL'])){
      echo"<main>
      <h2>Login</h2>
        <form method=\"post\" action=\"includes/login.inc.php\">
          <Label>Name:</Label>
          <input type=\"email\" name=\"email\" placeholder=\"Enter your email\"/>
          <Label>Password:</Label>
          <input type=\"password\" name=\"password\" placeholder=\"Enter password\"/>
          <input type=\"submit\" name=\"submit-login\" value=\"Submit\"/>
        </form>
        <a href=\"signup.php\">signup</a>
      </main>";
    }else{
      header("Location:../main.php");
      exit();
    }

?>
      <!--<main>
        <form method="post" action="includes/login.php">
          <input type="text" name="username" placeholder="Enter your username"/>
          <input type="password" name="password" placeholder="Enter password"/>
          <input type="submit" name="submit-login" value="Submit"/>
        </form>
      </main>-->

<?php
    require_once "footer.php"
?>
