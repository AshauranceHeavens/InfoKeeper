<?php
    require_once "header.php";
 ?>
 <main>
   <h2>Signup</h2>
   <form action="includes/signup.inc.php" method="post">
     <Label>Name:</Label>
     <input type="text" name="username" placeholder="username"/>
     <Label>Email:</Label>
     <input type="email" name="email" placeholder="Enter your email"/>
     <Label>Password:</Label>
     <input type="password" name="password" placeholder="Enter password"/>
     <Label>Repeat password:</Label>
     <input type="password" name="password-Repeat" placeholder="Repeat password"/>
     <input type="submit" name="submit-signup" value="Submit"/>
   </form>
 </main>
