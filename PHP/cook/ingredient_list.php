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

$result = pg_query($connection, "SELECT * FROM ingredient ORDER BY id")
    or die("Query error:" . pg_last_error());
$counter = 0;
  while($row = pg_fetch_row($result))
  {
    if($row[2] == "t")
    {
      echo "<tr><td><button type='button' class='btn btn-danger' ";
      echo 'onclick="edit_ingredient_status('.$row[0].',\'false\')">Sold out</button></td>';
    }
    else
    {
      echo "<tr style='color:red'><td><button type='button' class='btn btn-primary' ";
      echo 'onclick="edit_ingredient_status('.$row[0].',\'true\')">Available</button></td>';
    }
      echo "<td>$row[1]</td></tr>";
  }
?>