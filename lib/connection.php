<?php
$server_username="root";
$server_password="";
$server_host="localhost";
$database="medwikisystem";
mysql_connect($server_host,$server_username,$server_password) or die("không thể kết nối tới database");
mysql_select_db($database);
mysql_query("SET NAMES 'UTF8'");
?>