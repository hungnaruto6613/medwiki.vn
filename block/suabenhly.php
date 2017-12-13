 <?php 
$id_benh=$_GET['id_benh'];
settype($id_benh,"int");
$row_benh=QL_ChiTietBenhLy($id_benh);
	//$id_benh=$_GET['id_benh'];
if(isset($_POST["btn_suabenh"]))
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
	if($hinhanh_benh!='')
	{
	 	$qr="
		UPDATE benh SET 
		ten_benh='$ten_benh',
		ten_goi_khac='$ten_goi_khac',
		tong_quan='$tong_quan',
		trieuchung_phongngua='$trieuchung_phongngua',
		nguyennhan='$nguyennhan',
		phuongphapdieutri='$phuongphapdieutri',
		hinhanh_benh='$hinhanh_benh',
		id_nhombenh='$ten_nhombenh',
		id_nguoidung='$id_nguoidung'
		WHERE 
		id_benh='$id_benh'
		";
	}else{
		$qr="
		UPDATE benh SET 
		ten_benh='$ten_benh',
		ten_goi_khac='$ten_goi_khac',
		tong_quan='$tong_quan',
		trieuchung_phongngua='$trieuchung_phongngua',
		nguyennhan='$nguyennhan',
		phuongphapdieutri='$phuongphapdieutri',
		id_nhombenh='$ten_nhombenh',
		id_nguoidung='$id_nguoidung'
		WHERE 
		id_benh='$id_benh'
		";
	}
	mysql_query($qr);
	header ("window.location=manage_news.php?p=suabenhly&id_benh=".$id_benh);
	/*echo '<script language="javascript">alert("Sửa bệnh thành công"); window.location= "manage_news.php?p=quanlybenhly";</script>';*/
}
 ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Quản lý</a>
        </li>
        <li class="breadcrumb-item active">Sửa Bệnh Lý</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <form action="" method="post" role="form" class="addaccount" enctype="multipart/form-data">
            <div class="form-group">
              <label for="ten_benh">Tên Bệnh</label>
              <input value="<?php echo $row_benh['ten_benh']?>" class="form-control" name="ten_benh" id="ten_benh" type="text" placeholder="Nhập Tên Bệnh" required>
            </div>
            <div class="form-group">
              <label for="ten_goi_khac">Tên Gọi Khác</label>
              <input value="<?php echo $row_benh['ten_goi_khac']?>" class="form-control" name="ten_goi_khac" id="ten_goi_khac" type="text" placeholder="Nhập Tên Gọi Khác Của Bệnh">
            </div>
            <div class="form-group">
              <label for="tong_quan">Tổng Quan Bệnh Lý</label>
              <textarea class="form-control"  row="10" name="tong_quan" id="tong_quan" placeholder="Nhập nội dung" required><?php echo $row_benh['tong_quan']?></textarea>
              <script>
					CKEDITOR.replace('tong_quan',{uiColor: '#9AB8F3',
	language:'vi'});
				</script>
            </div>
            <div class="form-group">
              <label for="nguyennhan">Nguyên Nhân</label>
              <textarea class="form-control"  row="10" name="nguyennhan" id="nguyennhan" placeholder="Nhập nội dung" required><?php echo $row_benh['nguyennhan']?></textarea>
              <script>
					CKEDITOR.replace('nguyennhan',{uiColor: '#9AB8F3',
	language:'vi'});
				</script>
            </div>
            <div class="form-group">
              <label for="trieuchung_phongngua">Triệu Chứng Và Cách Phòng Ngừa</label>
              <textarea class="form-control" rows="10" name="trieuchung_phongngua" id="trieuchung_phongngua" placeholder="Nhập nội dung" required><?php echo $row_benh['trieuchung_phongngua']?></textarea>
              <script>
					CKEDITOR.replace('trieuchung_phongngua',{uiColor: '#9AB8F3',
	language:'vi'});
				</script>
            </div>
            <div class="form-group">
              <label for="phuongphapdieutri">Phương Pháp Điều Trị</label>
              <textarea class="form-control" rows="10" name="phuongphapdieutri" id="phuongphapdieutri" placeholder="Nhập nội dung" required><?php echo $row_benh['phuongphapdieutri']?></textarea>
              <script>
					CKEDITOR.replace('phuongphapdieutri',{uiColor: '#9AB8F3',
	language:'vi'});
				</script>
            </div>
            <div class="form-group">
              <label for="hinhanh_benh">Hình ảnh Bệnh</label>
              <input class="form-control" id="hinhanh_benh" name="hinhanh_benh" type="file" placeholder="Chọn hình ảnh"><img src="images/benhly/<?php echo $row_benh['hinhanh_benh']?>" width="100" height="100"/>
            </div>
            <div class="form-group">
              <label for="ten_nhombenh">Thuộc Nhóm Bệnh</label>
              <select class="form-control" name="ten_nhombenh" id="ten_nhombenh" >
              		<?php 
					$danhsachnhombenh= DanhSachNhomBenh();
					while($row_danhsachnhombenh=mysql_fetch_array($danhsachnhombenh))
					{
					?>
                    <option <?php if($row_benh['id_nhombenh']==$row_danhsachnhombenh['id_nhombenh']) echo "selected='selected'";?> value="<?php echo $row_danhsachnhombenh['id_nhombenh']?>"><?php echo $row_danhsachnhombenh['ten_nhombenh'];?></option>
                    <?php
					}
					?>
              </select>
            </div>
            <div class="row">
              <div class="col-md-6"><button name="btn_suabenh" type="submit"  class="btn btn-primary btn-block" >Sửa Bệnh</button></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>