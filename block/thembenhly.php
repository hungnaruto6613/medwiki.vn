 <?php 
if(isset($_POST["btn_thembenh"]))
{
	$path="images/benhly/";
	$ten_benh=$_POST["ten_benh"];
	$ten_goi_khac=$_POST["ten_goi_khac"];
	$tong_quan=$_POST["tong_quan"];
	$nguyennhan=$_POST["nguyennhan"];
	$trieuchung_phongngua=$_POST["trieuchung_phongngua"];
	$phuongphapdieutri=$_POST["phuongphapdieutri"];

	$hinhanh_benh=""; 
	if(isset($_FILES["hinhanh_benh"]["name"]))
	{
		$hinhanh_benh=$_FILES["hinhanh_benh"]["name"];
		move_uploaded_file($_FILES['hinhanh_benh']['tmp_name'],$path.$_FILES["hinhanh_benh"]["name"]);
	}
	$ten_nhombenh=$_POST["ten_nhombenh"];
	
	$id_nguoidung=$_SESSION["id_nguoidung"];
	$qr="
		INSERT INTO benh VALUES(null,'$ten_benh','$ten_goi_khac','$tong_quan','$trieuchung_phongngua','$nguyennhan','$trieuchung_phongngua','$hinhanh_benh','$ten_nhombenh',0,'$id_nguoidung')
	";
	mysql_query($qr);
	//header("location : manage_news.php");
	echo '<script language="javascript">alert("Thêm bệnh thành công"); window.location="manage_news.php?p=thembenhly";</script>';
}
 ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Quản lý</a>
        </li>
        <li class="breadcrumb-item active">Thêm Bệnh Lý</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <form action="" method="post" role="form" class="addaccount" enctype="multipart/form-data">
            <div class="form-group">
              <label for="ten_benh">Tên Bệnh</label>
              <input value="" class="form-control" name="ten_benh" id="ten_benh" type="text" placeholder="Nhập Tên Bệnh" required>
            </div>
            <div class="form-group">
              <label for="ten_goi_khac">Tên Gọi Khác</label>
              <input value="" class="form-control" name="ten_goi_khac" id="ten_goi_khac" type="text" placeholder="Nhập Tên Gọi Khác Của Bệnh">
            </div>
            <div class="form-group">
              <label for="tong_quan">Tổng Quan Bệnh Lý</label>
              <textarea class="form-control"  row="10" name="tong_quan" id="tong_quan" placeholder="Nhập nội dung" required></textarea>
              <script>
					CKEDITOR.replace('tong_quan',{uiColor: '#9AB8F3',
	language:'vi'});
				</script>
            </div>
            <div class="form-group">
              <label for="nguyennhan">Nguyên Nhân</label>
              <textarea class="form-control"  row="10" name="nguyennhan" id="nguyennhan" placeholder="Nhập nội dung" required></textarea>
              <script>
					CKEDITOR.replace('nguyennhan',{uiColor: '#9AB8F3',
	language:'vi'});
				</script>
            </div>
            <div class="form-group">
              <label for="trieuchung_phongngua">Triệu Chứng Và Cách Phòng Ngừa</label>
              <textarea class="form-control" rows="10" name="trieuchung_phongngua" id="trieuchung_phongngua" placeholder="Nhập nội dung" required></textarea>
              <script>
					CKEDITOR.replace('trieuchung_phongngua',{uiColor: '#9AB8F3',
	language:'vi'});
				</script>
            </div>
            <div class="form-group">
              <label for="phuongphapdieutri">Phương Pháp Điều Trị</label>
              <textarea class="form-control" rows="10" name="phuongphapdieutri" id="phuongphapdieutri" placeholder="Nhập nội dung" required></textarea>
              <script>
					CKEDITOR.replace('phuongphapdieutri',{uiColor: '#9AB8F3',
	language:'vi'});
				</script>
            </div>
            <div class="form-group">
              <label for="hinhanh_benh">Hình ảnh Bệnh</label>
              <input class="form-control" id="hinhanh_benh" name="hinhanh_benh" type="file" placeholder="Chọn hình ảnh">
            </div>
            <div class="form-group">
              <label for="ten_nhombenh">Thuộc Nhóm Bệnh</label>
              <select class="form-control" name="ten_nhombenh" id="ten_nhombenh" >
              		<?php 
					$danhsachnhombenh= DanhSachNhomBenh();
					while($row_danhsachnhombenh=mysql_fetch_array($danhsachnhombenh))
					{
					?>
                    <option value="<?php echo $row_danhsachnhombenh['id_nhombenh']?>"><?php echo $row_danhsachnhombenh['ten_nhombenh'];?></option>
                    <?php
					}
					?>
              </select>
            </div>
            <div class="row">
              <div class="col-md-6"><button name="btn_thembenh" type="submit"  class="btn btn-primary btn-block" >Thêm Bệnh Lý</button></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>