<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbnama = "showroommobil";
mysql_connect($host, $user, $pass);
mysql_select_db($showroommobil)
or die ("Connect Failed !! : ".mysql_error());
?>