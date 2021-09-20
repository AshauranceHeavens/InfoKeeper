<?php
      require_once "header.php";

      // var_dump($_SESSION['array']);
      // exit();

     if(isset($_SESSION['array'])){
           $arrays = $_SESSION['array'];

                        echo "<main>
                                 <h2> Mr. ".$_SESSION['NAME']."</h2>";
                           //foreach($rows as $row){
                             echo "
                             <div id='form-delete'>
                               <table>
                                 <tr>
                                   <th> ID  </th>
                                   <th> Name </th>
                                   <th> Second Name  </th>
                                   <th> Surname </th>

                                 </tr>";
                                 foreach($arrays as $array){
                                 echo"
                                 <tr>
                                   <td>" .$array['id']. "</td>
                                   <td><img src='images/" .$array['img']. " ' alt='None' height='50px'></td>
                                   <td> ". $array['name'] ."</td>
                                   <td> " .$array['second_name']. "</td>
                                   <td> " . $array['surname'] ."</td>
                                   <td class='buttons'><div >
                                       <form method='post' action='includes/view.inc.php' class='table-form'>
                                          <input type='hidden' name='id-view' value = ".$array['id'].">
                                          <input type='hidden' name='img' value = ".$array['img'].">
                                          <input type='submit' name='view-person' value='View'>
                                       </form>

                                       <form method='post' action='update.php' class='table-form'>
                                          <input type='hidden' name='id-update' value = ".$array['id'].">
                                          <input type='hidden' name='img' value = ".$array['img'].">
                                          <input type='submit' name='Update-person' value='Update'>
                                       </form>

                                       <form method='post' action='includes/deletePerson.inc.php' class='table-form'>
                                          <input type='hidden' name='id-delete' value = ".$array['id'].">
                                          <input type='submit' name='delete-person' value='Delete' id='delete-person'>
                                       </form>
                                   </div></td>
                                 </tr>
                               ";
                           }
                          echo "</table>
                        </div>
                        </main>";
     }else{
       header("Location:main.php?error=SessionDoesn'tExist");
       exit();
     }

   ?>
