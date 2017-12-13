<?php 
function DanhSachCoSoYTe()
{
	$qr="
		SELECT *FROM cosoyte
		ORDER BY binhchon DESC
	";
	return mysql_query($qr);
}
function TimKiemCoSoYTe($tukhoa)
{
	$qr="
		SELECT *FROM cosoyte
		WHERE ten_cosoyte REGEXP '$tukhoa' OR chuyenkhoa like '%$tukhoa%' OR diachi_cosoyte like '%$tukhoa%'
		ORDER BY ten_cosoyte DESC
	";
	return mysql_query($qr);
}
function DanhSachLoaiCoSoYTe()
{
	$qr="
		SELECT *FROM loaicosoyte
	";
	return mysql_query($qr);
}
function DanhSachCoSoYTeNoiBat()
{
	$qr="
		SELECT *FROM loaicosoyte
		ORDER BY binhchon DESC
		LIMIT 0,10
	";
	return mysql_query($qr);
}
function DanhSachCoSoYTeMoi()
{
	$qr="
		SELECT *FROM loaicosoyte
		ORDER BY id_cosoyte DESC
		LIMIT 0,10
	";
	return mysql_query($qr);
}
function DanhSachCoSoYTe_TheoLoaiCoSoYTe($id_loaicosoyte)
{
	$qr="
		SELECT *FROM cosoyte
		WHERE id_loaicosoyte=$id_loaicosoyte
		ORDER BY binhchon DESC
	";
	return mysql_query($qr);
}
function ChiTietCoSoYTe($id_cosoyte)
{
	$qr="
		SELECT *FROM cosoyte
		WHERE id_cosoyte=$id_cosoyte
	";
	return mysql_query($qr);
}
?>