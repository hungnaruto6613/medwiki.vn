<?php 
	$id_bacsi=$_GET['id_bacsi'];
	settype($id_bacsi,"int");
	$qr="
	 	DELETE FROM bacsi WHERE id_bacsi='$id_bacsi'
	";
	$qrr="
	 	DELETE FROM chitiet_bacsi_chuyenkhoa WHERE id_bacsi='$id_bacsi'
	";
	mysql_query($qr);
	mysql_query($qrr);
	echo '<script language="javascript">alert("Xóa bác sĩ thành công"); window.location="manage_news.php?p=quanlytaikhoan";</script>';
 ?>