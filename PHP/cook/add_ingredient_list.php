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
$max_id = get_max_id($connection,"menu");
$result = pg_query_params($connection, 
'INSERT INTO ingredient_list(food_id,ingredient_id) VALUES ($1,$2)',
  array($max_id, $_REQUEST[ingredientid]))
  or die("Query error:" . pg_last_error());
  
echo "Success!";
 
pg_close($connection);
?>