<?php

$statusid = stripcslashes(htmlentities($_POST['statusid']));
$unlikerid = stripcslashes(htmlentities($_POST['unlikerid']));
include("lib/connection.php");

$check = mysql_query("SELECT * FROM hoidap WHERE id_hoidap = '$statusid' " );
$num = mysql_num_rows($check);

if($num>=1)
{
	$update = mysql_query("DELETE FROM danhgia_hoidap WHERE id_hoidap='$statusid' AND id_nguoidung='$unlikerid' ");
	$check2 = mysql_query("SELECT * FROM danhgia_hoidap WHERE id_hoidap='$statusid'  ");
	$num2 =mysql_num_rows($check2);
	echo "Có ".$num2." người quan tâm chủ đề này!" ;
}
else
{
	echo "error";
}

?>