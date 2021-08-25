<?php

//THE BELOW CODE IS THE CODE THE WORKS WHEN SEARCHING FOR A PERSON ON THE BADATABASE
     //  require_once "header.php";
     //
     //  if(isset($_POST['submit-name-find']) && !empty($_POST['find-name'])){
     //   require_once 'includes/dbh.inc.php';
     //
     //
     //   $name = $_POST['find-name'];
     //
     //   $sql = "SELECT * FROM people WHERE name LIKE :name OR second_name LIKE :name  "; /*SEARCH FOR SECOND OR FIRSTNAME and if two rows have the same name only one shows*/
     //   $stmt = $pdo->prepare($sql);
     //
     //   if($stmt){
     //     $stmt->bindValue(':name', $name);
     //     $stmt->bindValue(':name', $name);
     //     $stmt->execute();
     //     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
     //
     //
     //            if($results != null){
     //              echo "<main>
     //                    <h2> Mr. ".$_SESSION['NAME']."</h2>";
     //              $rows = $results;
     //              //foreach($rows as $row){
     //                echo "
     //                <div>
     //                  <table>
     //                    <tr>
     //                      <th> ID  </th>
     //                      <th> Name </th>
     //                      <th> Second Name  </th>
     //                      <th> Surname </th>
     //
     //                    </tr>";
     //                    foreach($rows as $row){
     //                    echo"
     //                    <tr>
     //                      <td>" .$row['id']. "</td>
     //                      <td> ". $row['name'] ."</td>
     //                      <td> " .$row['second_name']. "</td>
     //                      <td> " . $row['surname'] ."</td>
     //                      <td class='buttons'><div >
     //                          <form method='post' action=# class='table-form'>
     //                             <input type='hidden' name='id-view' value = ".$row['id'].">
     //                             <input type='submit' name='view-person' value='View'>
     //                          </form>
     //
     //                          <form method='post' action=# class='table-form'>
     //                             <input type='hidden' name='id-update' value = ".$row['id'].">
     //                             <input type='submit' name='Update-person' value='Update'>
     //                          </form>
     //
     //                          <form method='post' action='includes/deletePerson.inc.php' class='table-form'>
     //                             <input type='hidden' name='id-delete' value = ".$row['id'].">
     //                             <input type='submit' name='delete-person' value='Delete'>
     //                          </form>
     //                      </div></td>
     //                    </tr>
     //                  ";
     //              }
     //             echo "</table>
     //           </div>
     //           </main>";
     //            }else{
     //              header("Location:../main.php?results=null");
     //              exit();
     //            }
     //   }else{
     //     header("Location: ../main.php?error=sqlerror");
     //     exit();
     //   }
     //
     // }else if(isset($_POST['find-name'])){
     //
     //       if(empty($_POST['find-name'])){
     //         header("Location:../main.php?error=NameFieldIsEmpty");
     //         exit();
     //       }
     //
     //  }else{
     //   header("Location: ../main.php");/*if submit button was not pressed*/
     //   exit();
     //  }

//THE ABOVE CODE IS THE CODE THE WORKS WHEN SEARCHING FOR A PERSON ON THE BADATABASE



//THE CODE BELOW IS FOR FINDING A PERSON ON THE DATABASE, IT IS BEING WOKED ON CURRENTLY
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




//THE CODE ABOVE IS FOR FINDING A PERSON ON THE DATABASE, IT IS BEING WORKED ON CURRENTLY


   ?>
