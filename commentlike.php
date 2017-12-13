<?php
$cid = stripcslashes(htmlentities($_POST['cid']));
$likerid = stripcslashes(htmlentities($_POST['likerid']));
include("lib/connection.php");

$check = mysql_query("SELECT * FROM binhluan_hoidap WHERE id_binhluan_hoidap = '$cid' " );
$num = mysql_num_rows($check);

if($num==1)
{
	$in = mysql_query("INSERT INTO danhgia_binhluan (id, id_binhluan_hoidap, id_nguoidung) VALUES ('','$cid','$likerid') ");
	$check2 = mysql_query("SELECT * FROM danhgia_binhluan WHERE id_binhluan_hoidap='$cid'  ");
	$num2 =mysql_num_rows($check2);
	echo $num2;
}
else
{
	echo "error";
}

?>