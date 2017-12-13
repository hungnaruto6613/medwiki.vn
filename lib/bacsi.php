<?php
function DanhSachChuyenKhoa()
{
	$qr="
		SELECT *FROM chuyenkhoa
	";
	return mysql_query($qr);
}
function DanhSachTatCaBacSi()
{
	$qr="
		SELECT *FROM bacsi
		ORDER BY luotthich DESC
	";
	return mysql_query($qr);
}
function DanhSachBacSi($from,$sobacsimottrang)
{
	$qr="
		SELECT *FROM bacsi
		ORDER BY luotthich DESC
		LIMIT $from,$sobacsimottrang
	";
	return mysql_query($qr);
}
function ChiTietBacSi($id_bacsi)
{
	$qr="
		SELECT *FROM bacsi WHERE id_bacsi=$id_bacsi
	";
	return mysql_query($qr);

}
function TimKiemBacSi($tukhoa)
{
	$qr="
			SELECT *FROM bacsi 
			WHERE ten_bacsi REGEXP '$tukhoa'
			ORDER BY ten_bacsi DESC
	";
	return mysql_query($qr);
	
	
}
function DanhSachChuyenKhoa_TheoBacSi($id_bacsi)
{
	$qr="
		SELECT bacsi.id_bacsi,chuyenkhoa.ten_chuyenkhoa FROM bacsi,chitiet_bacsi_chuyenkhoa,chuyenkhoa
		WHERE bacsi.id_bacsi=chitiet_bacsi_chuyenkhoa.id_bacsi AND chitiet_bacsi_chuyenkhoa.id_chuyenkhoa=chuyenkhoa.id_chuyenkhoa AND bacsi.id_bacsi=$id_bacsi
	";
	return mysql_query($qr);

}
function DanhSachBacSi_TheoChuyenKhoa($id_chuyenkhoa)
{
	$qr="
		SELECT chuyenkhoa.id_chuyenkhoa,bacsi.* FROM bacsi,chitiet_bacsi_chuyenkhoa,chuyenkhoa
		WHERE  bacsi.id_bacsi=chitiet_bacsi_chuyenkhoa.id_bacsi AND chitiet_bacsi_chuyenkhoa.id_chuyenkhoa=chuyenkhoa.id_chuyenkhoa AND chuyenkhoa.id_chuyenkhoa=$id_chuyenkhoa
	";
	return mysql_query($qr);
}

?>