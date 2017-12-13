<?php 
	$id_nguoidung=$_GET['id_nguoidung'];
	settype($id_nguoidung,"int");
	$qr="
	 	DELETE FROM nguoidung WHERE id_nguoidung='$id_nguoidung'
	";
	mysql_query($qr);
	echo '<script language="javascript">alert("Xóa tài khoản thành công"); window.location="manage_news.php?p=quanlytaikhoan";</script>';
 ?>