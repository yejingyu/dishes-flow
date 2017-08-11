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
  $list = pg_query_params($connection,
    "SELECT * FROM order_list WHERE table_id = $1 AND status = 'Ordered' ORDER BY id",
    array($_REQUEST[tableid]))
    or die("Query error:" . pg_last_error());
  
  //out put the html code as result
  while($row = pg_fetch_row($list))
  {
    echo "<tr><td><button type='button' class='btn btn-xs btn-danger' ";
    echo 'onclick="edit_order_status('.$row[0].',\'Cancel\')">X</button></td>';
    echo "<td>$row[2]</td> <td>$row[3]</td> <td>$row[5]</td></tr>";
  }
?>