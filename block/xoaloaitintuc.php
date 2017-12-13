<?php 
 	$id_loaitintuc=$_GET['id_loaitintuc'];
	settype($id_loaitintuc,"int");
	$qr="
	 	DELETE FROM loaitintuc WHERE id_loaitintuc='$id_loaitintuc'
	";
	mysql_query($qr);
	header("location:manage_news.php?p=quanlyloaitintuc");
 ?>