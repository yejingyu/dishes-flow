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

<!-- set table -->
<h1>Menu</h1>
<table border="2">
<tr>
<td> ID </td> <td> Name </td> <td> Price </td> <td> avilablity </td>
</tr>

<?php
include 'login_info.php'; //information for login database
$connection = pg_connect("host=$hostname dbname=$databasename user=$username password=$password")
  or die ("Could not connect");

//get menu
$menu = pg_query($connection, 'Select * from menu')
  or die("Query error:" . pg_last_error());


while($row = pg_fetch_row($menu)){
    echo '<tr>';
    echo "<td>$row[0]</td> <td> $row[1]</td> <td> $row[2]</td> <td> $row[3]</td>\n";
    echo '</tr>';
}
 
pg_close($connection);
?>
</table>

</body>
</html>