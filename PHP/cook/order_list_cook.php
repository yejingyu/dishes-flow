<!-- 
# Copyright © 2017 Jingyu Ye
# This program is licensed under the MIT License.
# Please see the file LICENSE in this distribution for
# license terms.
-->

<?php
  include '../login_info.php'; //information for login database
  $connection = pg_connect("host=$hostname dbname=$databasename user=$username password=$password")
    or die ("Could not connect");

  //get menu
  /*$buffer = "SELECT order_list.id, menu.name, order_list.food_id, "
          + "order_list.quantity, order_list.comment, order_list.status "
          + "FROM order_list "
          + "LEFT JOIN menu ON order_list.food_id = menu.id "
          + "WHERE status = 'Ordered' ORDER BY id";*/
  $list = pg_query($connection, "SELECT order_list.id, menu.name, order_list.food_id, order_list.quantity, order_list.comment, order_list.status FROM order_list LEFT JOIN menu ON order_list.food_id = menu.id WHERE status = 'Ordered' OR status = 'Cooking' ORDER BY id")
    or die("Query error:" . pg_last_error());
  
  //out put the html code as result
  while($row = pg_fetch_row($list))
  {
    //if the status is cooking, make it blue so that cook can notic it
    if($row[5] == "Cooking")
      echo "<tr style='color:Blue'>";
    else
      echo "<tr>";
    echo "<td><button type='button' class='btn btn-xs btn-danger' ";
    echo 'onclick="edit_order_status('.$row[0].',\'Cancel\')">X</button></td>';
    echo "<td>$row[1]</td> <td>$row[2]</td> <td>$row[3]</td><td>$row[4]</td>";
    
    //if the status is cooking, don't make cooking buttom
    if($row[5] != "Cooking")
    {
      echo "<td><button type='button' class='btn btn-primary' ";
      echo 'onclick="edit_order_status('.$row[0].',\'Cooking\')">Cooking</button></td>';
    }
    else
    {
      echo "<td></td>";
    }
    echo "<td><button type='button' class='btn btn-success' ";
    echo 'onclick="edit_order_status('.$row[0].',\'Cooked\')">Done</button></td>';
    //echo "<td><button type='button' class='btn btn-primary' onclick='edit_order_state($row[0], 'Cooking')'>Cooking<tton></td>";
    //echo "<td><button type='button' class='btn btn-success' onclick='edit_order_state($row[0], 'Cooked')'>Done<tton></td>";
    echo "</tr>";
  }
?>