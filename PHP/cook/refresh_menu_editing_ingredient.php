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
  $menu = pg_query($connection, 'SELECT * FROM ingredient ORDER BY id')
  or die("Query error:" . pg_last_error());

  while($row = pg_fetch_row($menu))
  {
    //if the item is not avilable, it should be displayed in red.
    echo '<tr onclick="load_ingredient('.$row[0].',\''.$row[1].'\')">';
    echo "<td>$row[0]</td> <td> $row[1]</td></tr>";
  }
?>