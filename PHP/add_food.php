<!-- 
# Copyright © 2017 Jingyu Ye
# This program is licensed under the MIT License.
# Please see the file LICENSE in this distribution for
# license terms.
-->

<html>
<head>
</head>
<body>
 
 
<?php
include 'login_info.php'; //login information
$connection = pg_connect("host=$hostname dbname=$databasename user=$username password=$password")
  or die ("Could not connect");


//get the largest id, +1 and use it as next id. 
$ask_id = pg_query($connection, "SELECT MAX(id) FROM menu")
  or die("Query error:" . pg_last_error());
$row = pg_fetch_row($ask_id);
$next_id = $row[0]+1;
echo "row[0]: $row[0],next_id: $next_id, $_POST[name],$_POST[price]";
//insert

$result = pg_query_params($connection, 
'INSERT INTO menu VALUES ($1,$2,$3,$4)', array($next_id, $_POST[name], $_POST[price], TRUE))
  or die("Query error:" . pg_last_error());
//return success information
echo "Insert successful, one record added";
 
pg_close($connection);
?>
</body>
</html>