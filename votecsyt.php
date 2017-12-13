<?php
$cid = $_POST['cid'];
$sid = $_POST['sid'];
$vote =$_POST['vote'];
include("lib/connection.php");


$check = mysql_query("SELECT * FROM danhgia_csyt WHERE id_cosoyte='$cid' AND id_nguoidung='$sid'  ");
$ncheck = mysql_num_rows($check);
if($ncheck==0)
{
	mysql_query("INSERT INTO danhgia_csyt (id,id_cosoyte, id_nguoidung, vote) VALUES ('','$cid','$sid','$vote') ");
	$checkvoteup = mysql_query("SELECT * FROM danhgia_csyt WHERE id_cosoyte ='$cid'  AND vote =1 ");
	$checkvoteup1 = mysql_num_rows($checkvoteup);

	$checkvotedown = mysql_query("SELECT * FROM danhgia_csyt WHERE id_cosoyte ='$cid' AND vote =0 ");
	$checkvotedown1 = mysql_num_rows($checkvotedown);

	$total = $checkvoteup1+$checkvotedown1;
	$percen = ($checkvoteup1/$total)*100;

	echo $percen."% đánh giá tích cực";
}
else
{
	mysql_query("UPDATE danhgia_csyt SET vote = $vote WHERE id_cosoyte='$cid' AND id_nguoidung='$sid'  ");
	$checkvoteup = mysql_query("SELECT * FROM danhgia_csyt WHERE id_cosoyte ='$cid'  AND vote =1 ");
	$checkvoteup1 = mysql_num_rows($checkvoteup);

	$checkvotedown = mysql_query("SELECT * FROM danhgia_csyt WHERE id_cosoyte ='$cid' AND vote =0 ");
	$checkvotedown1 = mysql_num_rows($checkvotedown);

	$total = $checkvoteup1+$checkvotedown1;
	$percen = ($checkvoteup1/$total)*100;

	echo $percen."% đánh giá tích cực";
}


?>