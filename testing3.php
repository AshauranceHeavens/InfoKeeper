<?php
     // session_start();
     require_once "header.php";

     var_dump($_SESSION['array']);
     $rows = $_SESSION['array'];
     echo "results of row: ".$rows;


      echo "<table>
      <tbody>
         <tr>
           <th>
             ID
           </th>
           <th>
             name
           </th>
           <th>
             name 2
           </th>
           <th>
             surname
           </th>
         </tr>";
     foreach ($rows as $row) {
       echo "<tr>
                 <td>". $row['id']."</td>
                 <td>". $row['name']."</td>
                 <td>". $row['second_name']."</td>
                 <td>". $row['surname']."</td>
              </tr>
       ";
     }
     echo "  <tbody>
    </table>";
?>
