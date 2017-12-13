<?php
function DanhSachTinTuc()
{
	$qr="
		SELECT tintuc.*, ten_loaitintuc FROM tintuc,loaitintuc
		WHERE tintuc.id_loaitintuc=loaitintuc.id_loaitintuc
		ORDER BY id_tintuc DESC
		LIMIT 0,20
	";
	return mysql_query($qr);
}
function QL_ChiTietTinTuc($id_tintuc)
{
	$qr="
		SELECT * FROM tintuc WHERE id_tintuc='$id_tintuc' 
	";
	$tintuc=mysql_query($qr);
	return mysql_fetch_array($tintuc);
}
function DanhSachBenhLy()
{
	$qr="
		SELECT benh.*, ten_nhombenh FROM benh,nhombenh
		WHERE benh.id_nhombenh=nhombenh.id_nhombenh
		ORDER BY id_benh DESC
		LIMIT 0,20
	";
	return mysql_query($qr);
}
function QL_ChiTietBenhLy($id_benh)
{
	$qr="
		SELECT * FROM benh WHERE id_benh='$id_benh' 
	";
	$benh=mysql_query($qr);
	return mysql_fetch_array($benh);
}
function DanhSachLoaiTinTuc()
{
	$qr="
		SELECT loaitintuc.* FROM loaitintuc
		ORDER BY id_loaitintuc DESC
		LIMIT 0,20
	";
	return mysql_query($qr);
}
function DanhSachNhomBenh_QL()
{
	$qr="
		SELECT nhombenh.* FROM nhombenh
		ORDER BY id_nhombenh DESC
		LIMIT 0,20
	";
	return mysql_query($qr);
}
function QL_ChiTietLoaiTinTuc($id_loaitintuc)
{
	$qr="
		SELECT * FROM loaitintuc WHERE id_loaitintuc='$id_loaitintuc' 
	";
	$loaitintuc=mysql_query($qr);
	return mysql_fetch_array($loaitintuc);
}
function QL_ChiTietNhomBenh($id_nhombenh)
{
	$qr="
		SELECT * FROM nhombenh WHERE id_nhombenh='$id_nhombenh' 
	";
	$nhombenh=mysql_query($qr);
	return mysql_fetch_array($nhombenh);
}
function DanhSachBacSi()
{
	$qr="
		SELECT bacsi.* FROM bacsi 
		ORDER BY id_bacsi DESC 
		LIMIT 0,20
	";
	return mysql_query($qr);
}
function DanhSachChuyenKhoa()
{
	$qr="
		SELECT chuyenkhoa.* FROM chuyenkhoa 
		ORDER BY id_chuyenkhoa DESC 
	";
	return mysql_query($qr);
}
function DanhSachChuyenKhoa_TheoBacSi($id_bacsi)
{
	$qr="
		SELECT chitiet_bacsi_chuyenkhoa.id_bacsi,chitiet_bacsi_chuyenkhoa.id_chuyenkhoa,chuyenkhoa.ten_chuyenkhoa FROM bacsi,chitiet_bacsi_chuyenkhoa,chuyenkhoa WHERE bacsi.id_bacsi=chitiet_bacsi_chuyenkhoa.id_bacsi AND chitiet_bacsi_chuyenkhoa.id_chuyenkhoa=chuyenkhoa.id_chuyenkhoa AND bacsi.id_bacsi=$id_bacsi
	";
	return mysql_query($qr);

}
function QL_ChiTietBacSi($id_bacsi)
{
	$qr="
		SELECT * FROM bacsi WHERE id_bacsi='$id_bacsi' 
	";
	$bacsi=mysql_query($qr);
	return mysql_fetch_array($bacsi);
}
function DanhSachCoSoYTe()
{
	$qr="
		SELECT cosoyte.*, ten_loaicosoyte FROM cosoyte,loaicosoyte
		WHERE cosoyte.id_loaicosoyte =loaicosoyte.id_loaicosoyte 
		ORDER BY id_cosoyte DESC
		LIMIT 0,20
	";
	return mysql_query($qr);
}
function DanhSachLoaiCoSoYTe()
{
	$qr="
		SELECT loaicosoyte.* FROM loaicosoyte
		ORDER BY id_loaicosoyte DESC
		LIMIT 0,20
	";
	return mysql_query($qr);
}
function QL_ChiTietCoSoYTe($id_cosoyte)
{
	$qr="
		SELECT * FROM cosoyte WHERE id_cosoyte='$id_cosoyte' 
	";
	$cosoyte=mysql_query($qr);
	return mysql_fetch_array($cosoyte);
}
function DanhSachTaiKhoan()
{
	$qr="
		SELECT nguoidung.*, tenloainguoidung FROM nguoidung,loai_nguoidung
		WHERE nguoidung.id_loainguoidung =loai_nguoidung.id_loainguoidung
		ORDER BY id_nguoidung DESC
		LIMIT 0,20
	";
	return mysql_query($qr);
}
function DanhSachLoaiTaiKhoan()
{
	$qr="
		SELECT loai_nguoidung.* FROM loai_nguoidung
		ORDER BY id_loainguoidung DESC
		LIMIT 0,20
	";
	return mysql_query($qr);
}
function QL_ChiTietTaiKhoan($id_nguoidung)
{
	$qr="
		SELECT * FROM nguoidung WHERE id_nguoidung='$id_nguoidung' 
	";
	$nguoidung=mysql_query($qr);
	return mysql_fetch_array($nguoidung);
}
?>