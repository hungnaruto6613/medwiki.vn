<?php
$statusid = stripcslashes(($_POST['statusid']));
$edits = stripcslashes(($_POST['edits']));
include("lib/connection.php");

$get = mysql_query("SELECT * FROM hoidap WHERE id_hoidap = '$statusid' ");
$get2 = mysql_fetch_assoc($get);
$content = $get2['noidung_hoidap'];

if($edits!=$content)
{
	mysql_query(" UPDATE hoidap SET noidung_hoidap =N'$edits' WHERE id_hoidap = '$statusid' ");
	echo $edits;
}
else
{
	echo $edits;
}


?>