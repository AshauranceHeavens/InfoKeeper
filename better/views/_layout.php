<?php
//  session_start();

  // if(!isset($_SESSION['EMAIL']) && $route !== 'people/login'){
  //   header('Location: /');
  //   exit();
  // }

  // var_dump($route);exit();
?>

<!DOCTYPE html>
<html>
   <head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="Information Keeper">
     <meta name="author" content="Sqiniseko Zulu">
     <meta name="keywords" content="">
     <meta name="description" content="">
     <meta name="author" content="Sqiniseko Zulu">
     <meta property="og:title" content="Infokeeper" />
     <meta property="og:url" content="https://www.Infokeeper.example" />
     <meta property="og:image" content="" />
     <title>Infokeeper</title>

     <link rel="stylesheet" href="/styles/bootstrap-5.1.2-dist/bootstrap-5.1.2-dist/css/bootstrap.min.css">
     <link rel="shortcut icon" type="image/jpg" href=""/>
     <script type="text/javascript" src="/styles/bootstrap-5.1.2-dist/bootstrap-5.1.2-dist/js/bootstrap.bundle.js">
     // <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     // <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/styles/login.css">


   </head>
     <body>
       <header class="text-white d-flex justify-content-between align-items-center py-2 px-2" style="background:black;">
         <nav class="text-white navbar  d-flex justify-content-between navbar-expand-lg fixed-top shadow md-5 px-2" style="background:black;">
           <h1>
             <a href="/" class="text-white text-decoration-none">The Database</a>
           </h1>
        <?php if(isset($_SESSION['NAME'])){ ?>
          <div class="d-md-flex justify-content-center align-items-center">

            <div class="">
              <ul class="nav d-none d-md-flex justify-content-around align-items-center">
                <li class="mx-3" style="list-style-type:none"><a class="text-white text-decoration-none" href="/">Home</a></li>
                <li style="list-style-type:none">
                  <!-- <form method="post" class="mb-2">
                    <input class="btn btn-outline-secondary text-white" style="background-color:black;
                    border-radius:5px;
                   box-shadow:0px 2px 2px lightgrey;" type="submit" name="submit-logout" value="Log Out">
                 </form> -->
                 <p>
                   <a href="/people/logout" class="btn text-white" style="background-color:black;
                      border-radius:5px;
                      box-shadow:0px 2px 2px lightgrey;">
                      LogOut
                    </a>
                 </p>
                </li>
              </ul>

              <button type="button" class="btn btn-success d-md-none dropdown-toggle" style="background-color:black;border-radius:5px;
                      box-shadow:0px 2px 2px lightgrey;border:white 1px solid;" data-bs-toggle="dropdown"   aria-expanded="false">
                More
              </button>

              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenubutton1" style="background-color:black;">
                <li><a class="dropdown-item text-white" href="/">Home</a></li>
                <li><div class="dropdown-divider bg-light"></div></li>
                <li>
                  <!-- <form method="post" class="dropdown-item">
                    <input class="btn btn-outline-dark text-white" type="submit" name="submit-logout" value="Log Out">
                 </form> -->
                 <a href="/people/logout" class="btn text-white" style="background-color:black;
                    border-radius:5px;
                    box-shadow:0px 2px 2px lightgrey;">
                    LogOut
                  </a>
                </li>

             </ul>

            </div>
          </div>

        <?php } ?>
    </nav>
  </header>

  <body>
  <main class="pt-5">
    <div class="px-5">

      <?php echo $content; ?>

    </div>
  </main>


  </body>


  <footer class="" style="top:70vh">
      <div class="text-white ">
        <div class="text-center py-3" style="background:black">
          <p>
            Infokeeper
          </p>
          <p>
            Copyright &copy; 2022
          </p>
        </div>
        <div class="text-center p-4" style="background:#fff">
          <a class="text-black"target="_blank" href="https://ashauranceheavens.github.io">Sqiniseko Zulu</a>
        </div>
      </div>
    </footer>

</html>
