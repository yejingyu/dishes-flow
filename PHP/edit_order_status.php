<!-- 
# Copyright © 2017 Jingyu Ye
# This program is licensed under the MIT License.
# Please see the file LICENSE in this distribution for
# license terms.
-->

<?php
include 'login_info.php'; //login information
$connection = pg_connect("host=$hostname dbname=$databasename user=$username password=$password")
    or die ("Could not connect");

//update
$result = pg_query_params($connection, 
      "UPDATE order_list SET status = $1 WHERE id=$2", array($_REQUEST[status],$_REQUEST[id]))
        or die("Query error:" . pg_last_error());
 
pg_close($connection);
?>