<?php 
	$id_cosoyte=$_GET['id_cosoyte'];
	settype($id_cosoyte,"int");
	$qr="
	 	DELETE FROM cosoyte WHERE id_cosoyte='$id_cosoyte'
	";
	mysql_query($qr);
	echo '<script language="javascript">alert("Xóa cơ sở y tế thành công"); window.location="manage_news.php?p=quanlycosoyte";</script>';
 ?>