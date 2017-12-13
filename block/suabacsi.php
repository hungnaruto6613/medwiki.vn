<?php 
 	$id_bacsi=$_GET['id_bacsi'];
	settype($id_bacsi,"int");
	$row_bacsi=QL_ChiTietBacSi($id_bacsi);
 ?>
 <?php
if(isset($_POST["btn_editdoctor"]))
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
	if($hinhanh_bacsi!='')
	{
	 	$qr="
		UPDATE bacsi SET 
		ten_bacsi='$ten_bacsi',
		hocvi='$hocvi',
		noilamviec='$noilamviec',
		dienthoai_bacsi='$dienthoai_bacsi',
		diachi_bacsi='$diachi_bacsi',
		kinhnghiem='$kinhnghiem',
		hinhanh_bacsi='$hinhanh_bacsi',
		gioithieu='$gioithieu',
		id_nguoidung='$id_nguoidung'
		WHERE 
		id_bacsi='$id_bacsi'
		";
		if($ten_chuyenkhoa!=0)
		{
			foreach ($ten_chuyenkhoa as $ck)
			{
				mysql_query("INSERT INTO chitiet_bacsi_chuyenkhoa VALUES ('$id_bacsi','$ck')");
			}
		}
	}else{
		$qr="
		UPDATE bacsi SET 
		ten_bacsi='$ten_bacsi',
		hocvi='$hocvi',
		noilamviec='$noilamviec',
		dienthoai_bacsi='$dienthoai_bacsi',
		diachi_bacsi='$diachi_bacsi',
		kinhnghiem='$kinhnghiem',
		gioithieu='$gioithieu',
		id_nguoidung='$id_nguoidung'
		WHERE 
		id_bacsi='$id_bacsi'
		";
		if($ten_chuyenkhoa)
		{
			foreach ($ten_chuyenkhoa as $ck)
			{
				mysql_query("INSERT INTO chitiet_bacsi_chuyenkhoa VALUES ('$id_bacsi','$ck')");
			}
		}
	}
	mysql_query($qr);
	//header ("window.location=manage_news.php?p=suatintuc&id_tintuc=".$id_tintuc);
	echo '<script language="javascript">alert("Sửa thông tin bác sĩ thành công"); window.location= "manage_news.php?p=quanlybacsi";</script>';
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
              <input value="<?php echo $row_bacsi['ten_bacsi']?>" class="form-control" name="ten_bacsi" id="ten_bacsi" type="text" pattern="^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{1,100}$" title="Tên không được dùng kí tự đặc biệt và số!" placeholder="Nhập Tên" required>
            </div>
            <div class="form-group">
              <label for="hocvi">Học Vị</label>
              <input value="<?php echo $row_bacsi['hocvi']?>" class="form-control" name="hocvi" id="hocvi" type="text" placeholder="Nhập Nội Dung">
            </div>
            <div class="form-group">
              <label for="noilamviec">Nơi Làm Việc</label>
              <input value="<?php echo $row_bacsi['noilamviec']?>" class="form-control" name="noilamviec" id="noilamviec" type="text" placeholder="Nhập Địa Chỉ">
            </div>
            <div class="form-group">
              <label for="dienthoai_bacsi">Điện Thoại</label>
              <input value="<?php echo $row_bacsi['dienthoai_bacsi']?>" maxlength="13" class="form-control" name="dienthoai_bacsi" id="dienthoai_bacsi" type="text" placeholder="Nhập Số Điện Thoại">
            </div>
            <div class="form-group">
              <label for="diachi_bacsi">Địa Chỉ Nhà Ở</label>
              <input value="<?php echo $row_bacsi['diachi_bacsi']?>" class="form-control" name="diachi_bacsi" id="diachi_bacsi" type="text" placeholder="Nhập Địa Chỉ">
            </div>
            <div class="form-group">
              <label for="kinhnghiem">Kinh Nghiệm</label>
              <textarea class="form-control"  row="4" name="kinhnghiem" id="kinhnghiem" placeholder="Nhập nội dung"><?php echo $row_bacsi['kinhnghiem']?></textarea>
              <script>
					CKEDITOR.replace('kinhnghiem',{uiColor: '#9AB8F3',
	language:'vi'});
				</script>
            </div>
            <div class="form-group">
              <label for="hinhanh_bacsi">Hình ảnh</label>
              <input class="form-control" id="hinhanh_bacsi" name="hinhanh_bacsi" type="file" placeholder="Chọn hình ảnh"><img src="images/bacsi/<?php echo $row_bacsi['hinhanh_bacsi']?>" width="100" height="100"/>
            </div>
            <div class="form-group">
              <label for="gioithieu">Giới Thiệu</label>
              <textarea class="form-control" rows="4" name="gioithieu" id="gioithieu" placeholder="Nhập nội dung" required><?php echo $row_bacsi['gioithieu']?></textarea>
              <script>
					CKEDITOR.replace('gioithieu',{uiColor: '#9AB8F3',
	language:'vi'});
				</script>
            </div>
            <div class="form-group">
              <label for="show_chuyenkhoa">Hiển thị chuyên khoa</label>
              <textarea  rows="2" value="" class="form-control" name="" id="show_chuyenkhoa" type="text" placeholder=""> <?php 
					$danhsachkhoabacsi=DanhSachChuyenKhoa_TheoBacSi($id_bacsi);
					while($row_danhsachchkhoabacsi=mysql_fetch_array($danhsachkhoabacsi))
					{ 
						echo $row_danhsachchkhoabacsi['ten_chuyenkhoa']."  ";
					}
					?></textarea>
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
              <div class="col-md-6"><button name="btn_editdoctor" type="submit"  class="btn btn-primary btn-block" >Sửa</button></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>