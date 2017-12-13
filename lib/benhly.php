<?php
function DanhSachNhomBenh()
{
	//cau truy van lay danh sach nhom benh
	$qr="
			SELECT *FROM nhombenh
	";
	return mysql_query($qr);
}
function DanhSachBenh_TheoNhomBenh($id_nhombenh)
{
	$qr="
			SELECT *FROM benh
			WHERE id_nhombenh=$id_nhombenh
			ORDER BY id_benh DESC
	";
	return mysql_query($qr);
}
function TenNhomBenh_TheoIdNhomBenh($id_nhombenh)
{
	$qr="
			SELECT ten_nhombenh FROM nhombenh
			WHERE id_nhombenh=$id_nhombenh
	";
	return mysql_query($qr);
}
function ChiTietBenh($id_benh)
{
	$qr="
			SELECT *FROM benh
			WHERE id_benh=$id_benh
	";
	return mysql_query($qr);
}
function SapXepAtoZTheoDanhSachNhomBenh()
{
	$qr="
			SELECT *FROM nhombenh
			ORDER BY ten_nhombenh ASC
	";	
	return mysql_query($qr);
}
function SapXepZtoATheoDanhSachNhomBenh()
{
	$qr="
			SELECT *FROM nhombenh
			ORDER BY ten_nhombenh DESC
	";	
	return mysql_query($qr);
}
function SapXepAtoZTheoDanhSachBenh()
{
	$qr="
			SELECT *FROM benh
			ODER BY ten_benh ASC
	";	
	return mysql_query($qr);
}
function SapXepZtoATheoDanhSachBenh()
{
	$qr="
			SELECT *FROM benh
			ORDER BY ten_benh DESC
	";	
	return mysql_query($qr);
}
function SapXepTheoBenhXemNhieu()
{
	$qr="
			SELECT *FROM benh
			ORDER BY luotxem DESC
	";	
	return mysql_query($qr);
}
function SapXepTheoBenhMoiDang()
{
	$qr="
			SELECT *FROM benh
			ORDER BY id_benh DESC
	";	
	return mysql_query($qr);
}
function BenhLienQuan_TheoNhomBenh($id_nhombenh){
	//cau lenh truy van lay 1 tin duy nhat
	$qr="
			SELECT *FROM benh
			WHERE id_nhombenh=$id_nhombenh
			ORDER BY id_benh DESC
			LIMIT 1,3
	";
	return mysql_query($qr);
}
function CapNhatSoLanXemBenh($id_benh)
{
	$qr="
			UPDATE benh
			SET luotxem=luotxem+1
			WHERE id_benh=$id_benh
	";
	return mysql_query($qr);
}
function TenNguoiDangBai_TheoId($id_nguoidung)
{
	//cau truy van lay ten nguoi dung
	$qr="
			SELECT ten_nguoidung FROM nguoidung
			WHERE id_nguoidung=$id_nguoidung
	";
	return mysql_query($qr);
}
function BenhCungLoai($id_benh,$id_nhombenh)
{
	$qr="
			SELECT * FROM benh
			WHERE id_benh<>$id_benh
			AND id_nhombenh=$id_nhombenh
			ORDER BY RAND()
			LIMIT 0,3
	";
	return mysql_query($qr);
}
function TimKiemBenh($tukhoa)
{
	$qr="
	SELECT *FROM benh
	WHERE ten_benh REGEXP '$tukhoa' 
	ORDER BY id_benh DESC
	";
	return mysql_query($qr);
}
?>