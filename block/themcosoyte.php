 <?php 
if(isset($_POST["btn_them_cosoyte"]))
{
	$path="images/cosoyte/";
	$ten_cosoyte=$_POST["ten_cosoyte"];
	$chuyenkhoa=$_POST["chuyenkhoa"];
	$diachi_cosoyte=$_POST["diachi_cosoyte"];
	$dienthoai_cosoyte=$_POST["dienthoai_cosoyte"];
	$tomtat_gioithieu=$_POST["tomtat_gioithieu"];
	$gioithieu=$_POST["gioithieu"];

	$hinhanh_cosoyte=""; 
	if(isset($_FILES["hinhanh_cosoyte"]["name"]))
	{
		$hinhanh_benh=$_FILES["hinhanh_cosoyte"]["name"];
		move_uploaded_file($_FILES['hinhanh_cosoyte']['tmp_name'],$path.$_FILES["hinhanh_cosoyte"]["name"]);
	}
	$ten_loaicosoyte=$_POST["ten_loaicosoyte"];
	
	$id_nguoidung=$_SESSION["id_nguoidung"];
	$qr="
		INSERT INTO cosoyte VALUES(null,'$ten_cosoyte','$chuyenkhoa','$diachi_cosoyte','$dienthoai_cosoyte','$tomtat_gioithieu','$gioithieu','$hinhanh_cosoyte',0,'$ten_loaicosoyte','$id_nguoidung')
	";
	mysql_query($qr);
	//header("location : manage_news.php");
	echo '<script language="javascript">alert("Thêm bệnh thành công"); window.location="manage_news.php?p=quanlycosoyte";</script>';
}
 ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Quản lý</a>
        </li>
        <li class="breadcrumb-item active">Thêm Cơ Sở Y Tế</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <form action="" method="post" role="form" class="addaccount" enctype="multipart/form-data">
            <div class="form-group">
              <label for="ten_cosoyte">Tên Cơ Sở Y Tế</label>
              <input value="" maxlength="100" class="form-control" name="ten_cosoyte" id="ten_cosoyte" type="text" placeholder="Nhập Tên Cơ Sở Y Tế">
            </div>
            <div class="form-group">
              <label for="chuyenkhoa">Chuyên Khoa Điều Trị</label>
              <input value="" maxlength="200" class="form-control" name="chuyenkhoa" id="chuyenkhoa" type="text" placeholder="Nhập Chuyên Khoa Điều Trị">
            </div>
            <div class="form-group">
              <label for="diachi_cosoyte">Địa Chỉ Cơ Sở Y Tế</label>
              <input  value="" class="form-control" maxlength="100" name="diachi_cosoyte" id="diachi_cosoyte" placeholder="Nhập Địa Chỉ"></input>
            </div>
            <div class="form-group">
              <label for="dienthoai_cosoyte">Điện Thoại Cơ Sở Y Tế</label>
              <input value="" class="form-control" maxlength="13" name="dienthoai_cosoyte" id="dienthoai_cosoyte" placeholder="Nhập Điện Thoại"></input>
            </div>
            <div class="form-group">
              <label for="tomtat_gioithieu">Giới Thiệu Tóm tắt</label>
              <textarea class="form-control"  row="4" name="tomtat_gioithieu" id="tomtat_gioithieu" placeholder="Nhập nội dung"></textarea>
            </div>
            <div class="form-group">
              <label for="gioithieu">Giới Thiệu</label>
              <textarea class="form-control" rows="10" name="gioithieu" id="gioithieu" placeholder="Nhập nội dung"></textarea>
              <script>
					CKEDITOR.replace('gioithieu',{uiColor: '#9AB8F3',
	language:'vi'});
				</script>
            </div>
            <div class="form-group">
              <label for="hinhanh_cosoyte">Hình ảnh Cơ Sở Y Tế</label>
              <input class="form-control" id="hinhanh_cosoyte" name="hinhanh_cosoyte" type="file" placeholder="Chọn hình ảnh">
            </div>
            <div class="form-group">
              <label for="ten_loaicosoyte">Thuộc Loại Cơ Sở Y Tế</label>
              <select class="form-control" name="ten_loaicosoyte" id="ten_loaicosoyte" >
              		<?php 
					$danhsachloaicosoyte= DanhSachLoaiCoSoYTe();
					while($row_danhsachloaicosoyte=mysql_fetch_array($danhsachloaicosoyte))
					{
					?>
                    <option value="<?php echo $row_danhsachloaicosoyte['id_loaicosoyte']?>"><?php echo $row_danhsachloaicosoyte['ten_loaicosoyte'];?></option>
                    <?php
					}
					?>
              </select>
            </div>
            <div class="row">
              <div class="col-md-6"><button name="btn_them_cosoyte" type="submit"  class="btn btn-primary btn-block" >Thêm</button></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>