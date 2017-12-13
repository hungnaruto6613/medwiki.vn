<?php 
$id_benh=$_GET['id_benh'];
settype($id_benh,"int");
$qr="
	 	DELETE FROM benh WHERE id_benh='$id_benh'
	";
	mysql_query($qr);
	header("location:manage_news.php?p=quanlybenhly");
?>