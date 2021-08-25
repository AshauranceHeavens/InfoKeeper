

        <footer>

        </footer>
      <!--  <script>-->
          <?php

            if(isset($_GET['newuser'])){
              echo "<script>
                    function user_added(x){
                      alert(x + ' has been added successfully');
                    }

                    var name2 =' ".$_GET['newuser']. " ';

                    user_added(name2);
              </script>";
              $_GET['newuser'] = null;
            }else if(isset($_GET['update'])){
              echo "<script>
                    function user_added(x){
                      alert(x + ' has been updated successfully');
                    }

                    var name2 =' ".$_GET['update']. " ';

                    user_added(name2);
              </script>";
              $_GET['update'] = null;
            }else if(isset($_GET['error']) && isset($_GET['newuser']) && $_GET['error'] === "sqlerror"){
              echo "<script>
                    function user_not_added(x, y){
                      alert('error = '+ y + '; ' + x + ' was NOT added on the database');
                    }
                    var name1 = ' " .$_GET['error']. " ';
                    var name2 =' " .$_GET['newuser']." ';

                    user_not_added(name1, name2);
              </script>";
            }else if(isset($_GET['error']) && $_GET['error'] === "sqlerror"){
              echo "<script>
                    function user_not_added(y){
                      alert('error = ' + y + ': was NOT added on the database');
                    }

                    var name1 = ' ".$_GET['error']." ';

                    user_not_added(name1);
              </script>";
            }

           ?>

      <!--  </script>-->
    </body>
</html>
