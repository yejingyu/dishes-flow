<!-- 
# Copyright © 2017 Jingyu Ye
# This program is licensed under the MIT License.
# Please see the file LICENSE in this distribution for
# license terms.
-->

<?php
//display the menu
function displayMenu($connection)
{
  //get menu
  $menu = pg_query($connection, 'Select * from menu ORDER BY id')
  or die("Query error:" . pg_last_error());

  //set table
  echo '<table border="2">';
  echo '<tr>';
  echo '<td> ID </td> <td> Name </td> <td> Price </td> <td> avilablity </td>';
  echo '</tr>';

  while($row = pg_fetch_row($menu))
  {
    //if the item is not avilable, it should be displayed in red.
    if($row[3] == "t")
      echo '<tr>';
    else
      echo '<tr style="color:red">';
      
    echo "<td>$row[0]</td> <td> $row[1]</td> <td> $row[2]</td>";
    
    //dis play yes or no instead of t(rue) or f(alse)
    if($row[3] == "t")
      echo "<td> Yes</td>\n";
    else
      echo "<td> No</td>\n";
    echo '</tr>';
  }
  echo '</table>';
}

function get_max_id($connection, $dbname)
{
  $buffer = pg_query($connection,"SELECT MAX(id) FROM $dbname")
  or die("Query error:" . pg_last_error());
  $row = pg_fetch_row($buffer);
  if($row == null)
    return -1;
  return $row[0];
}

function in_stock($connection, $dbname, $id)
{
  $buffer = pg_query($connection,"SELECT available FROM $dbname WHERE id=$id")
  or die("Query error:" . pg_last_error());
  $row = pg_fetch_row($buffer);
  if($row == null)//if can not find this item
    return false;
  return $row[0];
}
?>
