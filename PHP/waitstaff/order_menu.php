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
  $menu = pg_query($connection, 'SELECT * FROM menu ORDER BY id')
  or die("Query error:" . pg_last_error());

  while($row = pg_fetch_row($menu))
  {
    //if the item is not avilable, it should be displayed in red.
    if($row[3] == "t")
      echo '<tr onclick="load_order('.$row[0].',\''.$row[1].'\')">';
    else
      echo '<tr style="color:red">';

    echo "<td>$row[0]</td> <td> $row[1]</td> <td> $row[2]</td></tr>";
  }
?>