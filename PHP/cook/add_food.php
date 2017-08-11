<!-- 
# Copyright © 2017 Jingyu Ye
# This program is licensed under the MIT License.
# Please see the file LICENSE in this distribution for
# license terms.
-->

<?php
include '../login_info.php'; //login information
include 'public_function.php'; //helper functions
$connection = pg_connect("host=$hostname dbname=$databasename user=$username password=$password")
  or die ("Could not connect");

//insert
$result = pg_query_params($connection, 
  'INSERT INTO menu(name,price,available) VALUES ($1,$2,$3)',
  array($_REQUEST[name], $_REQUEST[price], TRUE))
  or die("Query error:" . pg_last_error());
 
pg_close($connection);
?>