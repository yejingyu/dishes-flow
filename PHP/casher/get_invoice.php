<!-- 
# Copyright © 2017 Jingyu Ye
# This program is licensed under the MIT License.
# Please see the file LICENSE in this distribution for
# license terms.
-->

<?php
include '../login_info.php'; // login information
$connection = pg_connect("host=$hostname dbname=$databasename user=$username password=$password")
  or die ("Could not connect");

$result = pg_query_params($connection,
  'SELECT menu.name, order_list.quantity, menu.price FROM order_list LEFT JOIN menu ON order_list.food_id=menu.id WHERE table_id = $1 AND status = $2 ORDER BY order_list.id',
  array($_REQUEST[tableid], "Cooked"))
  or die("Query error:" . pg_last_error());
$counter = 0;
$total = 0;
  while($row = pg_fetch_row($result))
  {
    $counter = $row[1]*$row[2];
    $total += $counter;
    echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$counter</td></tr>";
  }
  echo "<tr><td></td><td></td><td>Total:</td><td>$total</td></tr>";
?>