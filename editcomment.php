<?php
$cid = stripcslashes(($_POST['cid']));
$editc = stripcslashes(($_POST['editc']));
include("lib/connection.php");

$get = mysql_query("SELECT * FROM binhluan_hoidap WHERE id_binhluan_hoidap = '$cid' ");
$get2 = mysql_fetch_assoc($get);
$content = $get2['noidung_binhluan_hoidap'];

if($editc!=$content)
{
	mysql_query(" UPDATE binhluan_hoidap SET noidung_binhluan_hoidap =N'$editc' WHERE id_binhluan_hoidap = '$cid' ");
	echo $editc;
}
else
{
	echo $editc;
}


?>