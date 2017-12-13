<?php  
 	$id_nguoidung=$_GET['id_nguoidung'];
	settype($id_nguoidung,"int");
	$row_nguoidung=QL_ChiTietTaiKhoan($id_nguoidung);
if(isset($_POST["btn_sua_taikhoan"]))
{
	$path="images/taikhoan/";
	$ten_nguoidung=$_POST["ten_nguoidung"];
	$diachi=$_POST["diachi"];
	$email=$_POST["email"];
	$dienthoai=$_POST["dienthoai"];
	$tendangnhap=$_POST["tendangnhap"];
	$matkhau=$_POST["matkhau"];
	$update_at=date("Y-m-d H:i:s");
	$hinhanh=""; 
	if(isset($_FILES["hinhanh"]["name"]))
	{
		$hinhanh_benh=$_FILES["hinhanh"]["name"];
		move_uploaded_file($_FILES['hinhanh']['tmp_name'],$path.$_FILES["hinhanh"]["name"]);
	}
	$tenloainguoidung=$_POST["tenloainguoidung"];
	if($hinhanh_cosoyte!='')
	{
	 	$qr="
		UPDATE nguoidung SET 
		ten_nguoidung='$ten_nguoidung',
		diachi='$diachi',
		email='$email',
		dienthoai='$dienthoai',
		hinhanh='$hinhanh',
		tendangnhap='$tendangnhap',
		matkhau='$matkhau',
		update_at='$update_at',
		id_loainguoidung='$tenloainguoidung',
		WHERE 
		id_nguoidung='$id_nguoidung'
		";
	}else{
		$qr="
		UPDATE nguoidung SET 
		ten_nguoidung='$ten_nguoidung',
		diachi='$diachi',
		email='$email',
		dienthoai='$dienthoai',
		tendangnhap='$tendangnhap',
		matkhau='$matkhau',
		update_at='$update_at',
		id_loainguoidung='$tenloainguoidung',
		WHERE 
		id_nguoidung='$id_nguoidung'
		";
	}
	mysql_query($qr);
	//header("location : manage_news.php");
	echo '<script language="javascript">alert("Sửa tài khoản thành công"); window.location="manage_news.php?p=quanlytaikhoan";</script>';
}
 ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Quản lý</a>
        </li>
        <li class="breadcrumb-item active">Sửa Tài Khoản</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <form action="" method="post" role="form" class="addaccount" enctype="multipart/form-data">
            <div class="form-group">
              <label for="ten_nguoidung">Tên Người Dùng</label>
              <input value="<?php echo $row_nguoidung['ten_nguoidung']?>" maxlength="100" class="form-control" name="ten_nguoidung" id="ten_nguoidung" type="text" pattern="^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{1,100}$" title="Tên không được dùng kí tự đặc biệt và số!" placeholder="Nhập Tên Người Dùng" required>
            </div>
            <div class="form-group">
              <label for="diachi">Địa Chỉ</label>
              <input value="<?php echo $row_nguoidung['diachi']?>" maxlength="200" class="form-control" name="diachi" id="diachi" type="text" placeholder="Nhập Địa Chỉ">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input  value="<?php echo $row_nguoidung['email']?>" class="form-control" maxlength="100" name="email" id="email" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$" placeholder="Nhập Email"></input>
            </div>
            <div class="form-group">
              <label for="dienthoai">Điện Thoại</label>
              <input value="<?php echo $row_nguoidung['dienthoai']?>" class="form-control" maxlength="13" name="dienthoai" id="dienthoai" placeholder="Nhập Điện Thoại"></input>
            </div>
            <div class="form-group">
              <label for="tendangnhap">Tên Đăng Nhập</label>
              <input value="<?php echo $row_nguoidung['tendangnhap']?>" maxlength="30" class="form-control"  name="tendangnhap" id="tendangnhap" placeholder="Nhập tên đăng Nhập phải trên 8 kí tự!" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,30}$" required></input>
            </div>
            <div class="form-group">
              <label for="matkhau">Mật Khẩu</label>
              <input value="<?php echo $row_nguoidung['matkhau']?>" class="form-control"  maxlength="30" name="matkhau" id="matkhau" placeholder="Nhập mật khẩu phải gồm một chữ Hoa, một chữ thường và số!" pattern="(?=^.{8,30}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required></input>
            </div>
            <div class="form-group">
              <label for="hinhanh">Hình Ảnh</label>
              <input class="form-control" id="hinhanh" name="hinhanh" type="file" placeholder="Chọn hình ảnh"><img src="images/taikhoan/<?php echo $row_nguoidung['hinhanh']?>" width="100" height="100"/>
            </div>
            <div class="form-group">
              <label for="tenloainguoidung">Thuộc Loại Người Dùng</label>
              <select class="form-control" name="tenloainguoidung" id="tenloainguoidung" >
              		<?php 
					$danhsachloaitaikhoan= DanhSachLoaiTaiKhoan();
					while($row_danhsachloaitaikhoan=mysql_fetch_array($danhsachloaitaikhoan))
					{
					?>
                    <option <?php if($row_nguoidung['id_loainguoidung']==$row_danhsachloaitaikhoan['id_loainguoidung']) echo "selected='selected'";?> value="<?php echo $row_danhsachloaitaikhoan['id_loainguoidung']?>"><?php echo $row_danhsachloaitaikhoan['tenloainguoidung'];?></option>
                    <?php
					}
					?>
              </select>
            </div>
            <div class="row">
              <div class="col-md-6"><button name="btn_sua_taikhoan" type="submit"  class="btn btn-primary btn-block" >Sửa</button></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>