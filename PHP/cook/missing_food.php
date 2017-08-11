<!-- 
# Copyright © 2017 Jingyu Ye
# This program is licensed under the MIT License.
# Please see the file LICENSE in this distribution for
# license terms.
-->

<?php
include '../login_info.php'; //login information
$connection = pg_connect("host=$hostname dbname=$databasename user=$username password=$password")
    or die ("Could not connect");

//update
$result = pg_query_params($connection, 
  'UPDATE ingredient SET Available=$1 WHERE id=$2', array($_REQUEST[available],$_REQUEST[id]))
  or die("Query error:" . pg_last_error());
    echo 'Update complete</br>';
 
 
$result = pg_query($connection, 'UPDATE menu SET Available=true')
  or die("Query error:" . pg_last_error());
$result = pg_query($connection, 'UPDATE menu SET Available=false WHERE id IN (SELECT ingredient_list.food_id FROM ingredient_list LEFT JOIN ingredient ON ingredient_list.ingredient_id = ingredient.id WHERE ingredient.available = false);')
  or die("Query error:" . pg_last_error());
pg_close($connection);
?>