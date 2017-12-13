<?php
$cid = stripcslashes(htmlentities($_POST['cid']));
include("lib/connection.php");

mysql_query("DELETE FROM binhluan_hoidap WHERE id_binhluan_hoidap = '$cid' ")


?>