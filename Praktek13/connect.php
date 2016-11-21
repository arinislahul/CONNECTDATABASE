<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbnama = "showroommobil";
mysql_connect($host, $user, $pass);
mysql_select_db($dbnama)
or die ("Connect Failed !! : ".mysql_error());
?>