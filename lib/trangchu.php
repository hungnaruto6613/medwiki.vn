<?php
//khi goi ham nay thi se goi ra tin moi nhat 
function TinMoiNhat_MotTin(){
	//cau lenh truy van lay 1 tin duy nhat
	$qr="
			SELECT *FROM tintuc
			ORDER BY id_tintuc DESC
			LIMIT 0,1
	";
	return mysql_query($qr);
}
function TinMoiNhat_TheoLoai_MotTin($id_loaitintuc){
	//cau lenh truy van lay 1 tin duy nhat
	$qr="
			SELECT *FROM tintuc
			WHERE id_loaitintuc=$id_loaitintuc
			ORDER BY id_tintuc DESC
			LIMIT 0,1
	";
	return mysql_query($qr);
}
function TinTheoLoaiTin($id_loaitintuc){
	//cau lenh truy van lay tin moi sau tin moi nhat
	$qr="
			SELECT *FROM tintuc
			WHERE id_loaitintuc=$id_loaitintuc
			ORDER BY id_tintuc DESC
	";
	return mysql_query($qr);
}
function TinTheoLoaiTin_PhanTrang($id_loaitintuc,$from,$sotinmottrang){
	//cau lenh truy van lay tin moi sau tin moi nhat
	$qr="
			SELECT *FROM tintuc
			WHERE id_loaitintuc=$id_loaitintuc
			ORDER BY id_tintuc DESC
			LIMIT $from, $sotinmottrang
	";
	return mysql_query($qr);
}

function TinMoiNhat_BaTin(){
	//cau lenh truy van lay 3 tin moi sau tin moi nhat
	$qr="
			SELECT *FROM tintuc
			ORDER BY id_tintuc DESC
			LIMIT 1,3
	";
	return mysql_query($qr);
}
function TinNoiBat_MotTin(){
	//cau lenh truy van lay tin dau tien nhieu nguoi xem nhat
	$qr="
			SELECT *FROM tintuc
			ORDER BY solanxem DESC
			LIMIT 0,1
	";
	return mysql_query($qr);
}
function TinNoiBat_TinThuHai(){
	//cau lenh truy van lay tin dau tien nhieu nguoi xem nhat
	$qr="
			SELECT *FROM tintuc
			ORDER BY solanxem DESC
			LIMIT 1,1
	";
	return mysql_query($qr);
}
function TinNoiBat_BaTin(){
	//cau lenh truy van lay 3 tin moi sau noi bat bat
	$qr="
			SELECT *FROM tintuc
			ORDER BY solanxem DESC
			LIMIT 2,3
	";
	return mysql_query($qr);
}
function TinNoiBat_NamTin(){
	//cau lenh truy van lay 3 tin moi sau noi bat bat
	$qr="
			SELECT *FROM tintuc
			ORDER BY solanxem DESC
			LIMIT 0,5
	";
	return mysql_query($qr);
}
function DanhSanhLoaiTin()
{
	//cau truy van lay danh sach loai tin
	$qr="
			SELECT *FROM loaitintuc
	";
	return mysql_query($qr);
}
function DanhSachTinTheoLoaiTin($id_loaitintuc)
{
	//cau truy van lay danh sach tin theo loai tin
	$qr="
			SELECT *FROM tin
			WHERE id_loaitintuc=$id_loaitintuc
			ORDER BY id_tin DESC
	";
	return mysql_query($qr);
}
function ChiTietTinTuc($id_tintuc)
{
	$qr="
			SELECT *FROM tintuc
			WHERE id_tintuc=$id_tintuc
	";
	return mysql_query($qr);
}
function TinMoiNhat_TheoLoaiTin_MotTin($id_loaitintuc)
{
	$qr="
			SELECT *FROM tintuc
			WHERE id_loaitintuc=$id_loaitintuc
			ORDER BY id_tintuc DESC
			LIMIT 0,1
	";
	return mysql_query($qr);
}
function TinMoiNhat_TheoLoaiTin_TinThuHai($id_loaitintuc)
{
	$qr="
			SELECT *FROM tintuc
			WHERE id_loaitintuc=$id_loaitintuc
			ORDER BY id_tintuc DESC
			LIMIT 1,1
	";
	return mysql_query($qr);
}
function TinMoiNhat_TheoLoaiTin_BaTin($id_loaitintuc)
{
	$qr="
			SELECT *FROM tintuc
			WHERE id_loaitintuc=$id_loaitintuc
			ORDER BY id_tintuc DESC
			LIMIT 2,3
	";
	return mysql_query($qr);
}
function TenLoaiTin($id_loaitintuc)
{
	$qr="
			SELECT * From loaitintuc
			WHERE id_loaitintuc=$id_loaitintuc
	";
	return mysql_query($qr);
}
function TenTacGia($id_tintuc)
{
	$qr="
			SELECT nguoidung.ten_nguoidung From tintuc,nguoidung
			WHERE tintuc.id_nguoidung=nguoidung.id_nguoidung AND tintuc.id_tintuc=$id_tintuc
	";
	$tentacgia=mysql_query($qr);
	return mysql_fetch_array($tentacgia);
	
}
function CapNhatSoLanXemTin($id_tintuc)
{
	$qr="
			UPDATE tintuc
			SET solanxem=solanxem+1
			WHERE id_tintuc=$id_tintuc
	";
	return mysql_query($qr);
}
function TimKiemTinTuc($tukhoa)
{
	$qr="
			SELECT *FROM tintuc 
			WHERE tieude_tintuc like '%$tukhoa%'
			OR noidung_tintuc like '%$tukhoa%'
			ORDER BY id_tintuc DESC
	";
	return mysql_query($qr);
}
?>