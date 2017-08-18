<!-- 
# Copyright © 2017 Jingyu Ye
# This program is licensed under the MIT License.
# Please see the file LICENSE in this distribution for
# license terms.
-->

<?php
include '../login_info.php'; //login information
include '../public_function.php'; //helper functions
$connection = pg_connect("host=$hostname dbname=$databasename user=$username password=$password")
  or die ("Could not connect");

//insert
if(in_stock($connection, "menu", $_REQUEST[foodid]) == "t")
{
  $result = pg_query_params($connection,
  'INSERT INTO order_list (table_ID,food_ID,quantity,status,comment) VALUES ($1,$2,$3,$4,$5)',
  array($_REQUEST[tableid], $_REQUEST[foodid], $_REQUEST[quantity], "Ordered", $_REQUEST[comment]))
  or die("Query error:" . pg_last_error());
  //return success information
  echo "Insert successful, one record added";
}
else
{
  echo "The food you order is not	available now!";
}
 
pg_close($connection);
?>