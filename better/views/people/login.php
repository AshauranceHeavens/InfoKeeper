<!-- <h1>Login</h1> -->

<main class="mt-5 mb-5">
  <div class="container d-flex flex-column justify-content-center align-items-center">
    <div class="border p-4 w-75 shadow rouded">
      <h2 class="text-center">Login</h2>

      <?php if(!empty($errors)):?>
           <div class="alert alert-danger">
             <?php foreach ($errors as $error): ?>
               <p><?php echo $error; ?></p>
             <?php endforeach; ?>
           </div>
       <?php endif;?>
      <form class="" method="post"> <!-- action="/InfoKeeper/includes/login.inc.php" -->
        <div class="form-group">
          <Label class="form-label">Name:</Label>
          <input class="form-control" type="email" name="email" placeholder="Enter your email"/>
        </div>
        <div class="form-group">
          <Label class="form-label">Password:</Label>
          <input  class="form-control" type="password" name="password" placeholder="Enter password"/>
        </div>
        <div class="">
          <input class="btn my-2 " style="background:black; color:white;" type="submit" name="submit-login" value="Submit"/>
          <a href="/InfoKeeper/signup.php" class="btn ">signup</a>
        </div>
      </form>
    </div>
  </div>
</main>
