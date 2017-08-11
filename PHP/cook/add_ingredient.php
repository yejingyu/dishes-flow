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
$result = pg_query_params($connection, 
'INSERT INTO ingredient(name,available) VALUES ($1,$2)', array($_REQUEST[name], TRUE))
  or die("Query error:" . pg_last_error());
//return success information
echo "Insert successful, one record added";
 
pg_close($connection);
?>