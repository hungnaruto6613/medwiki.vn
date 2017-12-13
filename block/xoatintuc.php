<?php 
 	$id_tintuc=$_GET['id_tintuc'];
	settype($id_tintuc,"int");
	$qr="
	 	DELETE FROM tintuc WHERE id_tintuc='$id_tintuc'
	";
	mysql_query($qr);
	header("location:manage_news.php");
 ?>