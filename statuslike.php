<?php
$statusid = stripcslashes(htmlentities($_POST['statusid']));
$likerid = stripcslashes(htmlentities($_POST['likerid']));
include("lib/connection.php");

$check = mysql_query("SELECT * FROM hoidap WHERE id_hoidap = '$statusid' " );
$num = mysql_num_rows($check);

if($num==1)
{
	$in = mysql_query("INSERT INTO danhgia_hoidap (id, id_hoidap, id_nguoidung) VALUES ('','$statusid','$likerid') ");
	$check2 = mysql_query("SELECT * FROM danhgia_hoidap WHERE id_hoidap='$statusid'  ");
	$num2 =mysql_num_rows($check2);
	echo "Có ".$num2." người quan tâm chủ đề này!" ;
}
else
{
	echo "error";
}

?>