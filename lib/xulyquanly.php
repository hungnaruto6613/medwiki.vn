<?php

function xulythemtin()
{
if(isset($_POST["btn_addnews"]))
{
	
	/*if($_FILES['hinhanh']['name'] != NULL){ // Đã chọn file
        // Tiến hành code upload file
        if($_FILES['hinhanh']['type'] == "image/jpeg"
        || $_FILES['hinhanh']['type'] == "image/png"
        || $_FILES['hinhanh']['type'] == "image/gif"){
        // là file ảnh
        // Tiến hành code upload    
            if($_FILES['hinhanh']['size'] > 1048576){
                echo "File không được lớn hơn 1mb";
            }else{
                // file hợp lệ, tiến hành upload
				$path = "data/"; // file sẽ lưu vào thư mục data
				$hinhanh=$_FILES['hinhanh']['name'];
                $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
                // Upload file
                move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
           }
        }else{
           // không phải file ảnh
           echo "Kiểu file không hợp lệ";
        }
   	}else{
        echo "Vui lòng chọn file";
   	}*/
	$path="images/tintuc/";
	$tieude_tintuc=$_POST["tieude_tintuc"];
	$tomtat_tintuc=$_POST["tomtat_noidung"];
	$noidung_tintuc=$_POST["noidung_tintuc"];
	
	$date=date("Y-m-d H:i:s");
	$hinhanh=""; 
	if(isset($_FILES["hinhanh"]["name"]))
	{
		$hinhanh=$_FILES["hinhanh"]["name"];
		move_uploaded_file($_FILES['hinhanh']['tmp_name'],$path.$_FILES["hinhanh"]["name"]);
	}
	$loai_tintuc=$_POST["loai_tintuc"];
	
	$id_nguoidung=$_SESSION["id_nguoidung"];
	$qr="
		INSERT INTO tintuc VALUES(null,'$tieude_tintuc','$tomtat_tintuc','$noidung_tintuc','$date','$hinhanh','$loai_tintuc',0,'$id_nguoidung')
	";
	mysql_query($qr);
	//header("location : manage_news.php");
	echo '<script language="javascript">alert("Thêm tin thành công"); window.location="manage_news.php";</script>';
}
}
function xulysuatin()
{ 
$id_tintuc=$_GET['id_tintuc'];
if(isset($_POST["btn_editnews"]))
{
	$path="images/tintuc/";
	$tieude_tintuc=$_POST["tieude_tintuc"];
	$tomtat_tintuc=$_POST["tomtat_noidung"];
	$noidung_tintuc=$_POST["noidung_tintuc"];
	
	$date=date("Y-m-d H:i:s");
	$hinhanh=""; 
	if(isset($_FILES["hinhanh"]["name"]))
	{
		$hinhanh=$_FILES["hinhanh"]["name"];
		move_uploaded_file($_FILES['hinhanh']['tmp_name'],$path.$_FILES["hinhanh"]["name"]);
	}
	$loai_tintuc=$_POST["loai_tintuc"];
	
	$id_nguoidung=$_SESSION["id_nguoidung"];
	if($hinhanh!='')
	{
	 	$qr="
		UPDATE tintuc SET 
		tieude_tintuc='$tieude_tintuc',
		tomtat_tintuc='$tomtat_tintuc',
		noidung_tintuc='$noidung_tintuc',
		thoigian_dangtin='$date',
		hinhanh='$hinhanh',
		id_loaitintuc='$loai_tintuc',
		id_nguoidung='$id_nguoidung'
		WHERE 
		id_tintuc='$id_tintuc'
		";
	}else{
		$qr="
		UPDATE tintuc SET tieude_tintuc='$tieude_tintuc',
		tomtat_tintuc='$tomtat_tintuc',
		noidung_tintuc='$noidung_tintuc',
		thoigian_dangtin='$date',
		id_loaitintuc='$loai_tintuc',
		id_nguoidung='$id_nguoidung'
		WHERE 
		id_tintuc='$id_tintuc'
		";
	}
	mysql_query($qr);
	//header ("window.location=manage_news.php?p=suatintuc&id_tintuc=".$id_tintuc);
	echo '<script language="javascript">alert("Sửa tin thành công");</script>';
	header ("window.location=manage_news.php?p=suatintuc&id_tintuc=".$id_tintuc);
}
}
?>