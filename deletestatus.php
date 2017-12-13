<?php
$statusid = stripcslashes(htmlentities($_POST['statusid']));
include("lib/connection.php");

mysql_query("DELETE FROM hoidap WHERE id_hoidap = '$statusid' ")


?>