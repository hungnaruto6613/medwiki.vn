<?php 
 	$id_nhombenh=$_GET['id_nhombenh'];
	settype($id_nhombenh,"int");
	$qr="
	 	DELETE FROM nhombenh WHERE id_nhombenh='$id_nhombenh'
	";
	mysql_query($qr);
	header("location:manage_news.php?p=quanlynhombenh");
 ?>