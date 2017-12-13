 <?php
if(isset($_POST["btn_adddoctor"]))
{
	$path="images/bacsi/";
	$ten_bacsi=$_POST["ten_bacsi"];
	$hocvi=$_POST["hocvi"];
	$noilamviec=$_POST["noilamviec"];
	$dienthoai_bacsi=$_POST["dienthoai_bacsi"];
	$diachi_bacsi=$_POST["diachi_bacsi"];
	$kinhnghiem=$_POST["kinhnghiem"];
	$date=date("Y-m-d H:i:s");
	$hinhanh_bacsi=""; 
	if(isset($_FILES["hinhanh_bacsi"]["name"]))
	{
		$hinhanh_bacsi=$_FILES["hinhanh_bacsi"]["name"];
		move_uploaded_file($_FILES['hinhanh_bacsi']['tmp_name'],$path.$_FILES["hinhanh_bacsi"]["name"]);
	}
	
	$ten_chuyenkhoa=$_POST["ten_chuyenkhoa"];
	
	$gioithieu=$_POST["gioithieu"];
	$id_nguoidung=$_SESSION["id_nguoidung"];
	$qr="
		INSERT INTO bacsi VALUES('null','$ten_bacsi','$hocvi','$noilamviec','$dienthoai_bacsi','$diachi_bacsi','$kinhnghiem','$hinhanh_bacsi','$gioithieu',0,'$id_nguoidung')";
	mysql_query($qr);
	if($ten_chuyenkhoa)
	{
		foreach ($ten_chuyenkhoa as $ck)
		{
			mysql_query("INSERT INTO chitiet_bacsi_chuyenkhoa VALUES ('".mysql_insert_id()."','$ck')");
		}
	}
	//header ("window.location=manage_news.php?p=suatintuc&id_tintuc=".$id_tintuc);
	echo '<script language="javascript">alert("Thêm thông tin bác sĩ thành công"); window.location= "manage_news.php?p=quanlybacsi";</script>';
}
 ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Quản lý</a>
        </li>
        <li class="breadcrumb-item active">Sửa Bác Sĩ</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <form action="" method="post" role="form" class="addaccount" enctype="multipart/form-data">
            <div class="form-group">
              <label for="tieude">Tên Bác Sĩ</label>
              <input value="" class="form-control" name="ten_bacsi" id="ten_bacsi" type="text" pattern="^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{1,100}$" title="Tên không được dùng kí tự đặc biệt và số!" placeholder="Nhập Tên" required>
            </div>
            <div class="form-group">
              <label for="hocvi">Học Vị</label>
              <input value="" class="form-control" name="hocvi" id="hocvi" type="text" placeholder="Nhập Nội Dung">
            </div>
            <div class="form-group">
              <label for="noilamviec">Nơi Làm Việc</label>
              <input value="" class="form-control" name="noilamviec" id="noilamviec" type="text" placeholder="Nhập Địa Chỉ">
            </div>
            <div class="form-group">
              <label for="dienthoai_bacsi">Điện Thoại</label>
              <input value="" maxlength="13" class="form-control" name="dienthoai_bacsi" id="dienthoai_bacsi" type="text" pattern="^[0-9]{0,13}$" title="Bạn chỉ được nhập số !" placeholder="Nhập Số Điện Thoại">
            </div>
            <div class="form-group">
              <label for="diachi_bacsi">Địa Chỉ Nhà Ở</label>
              <input value="" class="form-control" name="diachi_bacsi" id="diachi_bacsi" type="text" placeholder="Nhập Địa Chỉ">
            </div>
            <div class="form-group">
              <label for="kinhnghiem">Kinh Nghiệm</label>
              <textarea class="form-control"  row="4" name="kinhnghiem" id="kinhnghiem" placeholder="Nhập nội dung"></textarea>
              <script>
					CKEDITOR.replace('kinhnghiem',{uiColor: '#9AB8F3',
	language:'vi'});
				</script>
            </div>
            <div class="form-group">
              <label for="hinhanh_bacsi">Hình ảnh</label>
              <input class="form-control" id="hinhanh_bacsi" name="hinhanh_bacsi" type="file" placeholder="Chọn hình ảnh">
            </div>
            <div class="form-group">
              <label for="gioithieu">Giới Thiệu</label>
              <textarea class="form-control" rows="4" name="gioithieu" id="gioithieu" placeholder="Nhập nội dung" required></textarea>
              <script>
					CKEDITOR.replace('gioithieu',{uiColor: '#9AB8F3',
	language:'vi'});
				</script>
            </div>
            <div class="form-group">
              <label for="chuyenkhoa">Thêm chuyên khoa</label>
              <select class="form-control" name="ten_chuyenkhoa[]" multiple="multiple" id="chuyenkhoa" >
              <?php 
				$bacsicochuyenkhoa=DanhSachChuyenKhoa();
				while($row_bacsicochuyenkhoa=mysql_fetch_array($bacsicochuyenkhoa))
				{
				?>
                    <option value="<?php echo $row_bacsicochuyenkhoa['id_chuyenkhoa']; ?>"><?php echo $row_bacsicochuyenkhoa['ten_chuyenkhoa'];?></option>
                <?php
                } 
				?>
              </select>
            </div>
            <div class="row">
              <div class="col-md-6"><button name="btn_adddoctor" type="submit"  class="btn btn-primary btn-block" >Thêm Mới</button></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>