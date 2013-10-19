<?php
$db_host = "localhost";
$db_username = "rwandawi_admin";
$db_password = "aime1234%";
$db_name = "rwandawi_business";
mysql_connect("$db_host","$db_username","$db_password") or die ("could not connect to mysql");
mysql_select_db("$db_name") or die ("no database");
?>