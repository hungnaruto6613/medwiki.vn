<?php

$cid = stripcslashes(htmlentities($_POST['cid']));
$unlikerid = stripcslashes(htmlentities($_POST['unlikerid']));
include("lib/connection.php");

$check = mysql_query("SELECT * FROM binhluan_hoidap WHERE id_binhluan_hoidap = '$cid' " );
$num = mysql_num_rows($check);

if($num>=1)
{
	$update = mysql_query("DELETE FROM danhgia_binhluan WHERE id_binhluan_hoidap='$cid' AND id_nguoidung='$unlikerid' ");
	$check2 = mysql_query("SELECT * FROM danhgia_binhluan WHERE id_binhluan_hoidap='$cid'  ");
	$num2 =mysql_num_rows($check2);
	if($num2>=1)
	{
		echo $num2;
	}
	
}
else
{
	echo "error";
}

?>