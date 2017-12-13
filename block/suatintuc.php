 <?php 
 	$id_tintuc=$_GET['id_tintuc'];
	settype($id_tintuc,"int");
	$row_tintuc=QL_ChiTietTinTuc($id_tintuc);
 ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Quản lý</a>
        </li>
        <li class="breadcrumb-item active">Sửa tin tức</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <form action="" method="post" role="form" class="addaccount" enctype="multipart/form-data">
            <div class="form-group">
              <label for="tieude">Tiêu đề</label>
              <input value="<?php echo $row_tintuc['tieude_tintuc']?>" class="form-control" name="tieude_tintuc" id="tieude" type="text" placeholder="Nhập tiêu đề" required>
            </div>
            <div class="form-group">
              <label for="tomtat_noidung">Tóm Tắt Nội Dung</label>
              <textarea class="form-control"  row="4" name="tomtat_noidung" id="tomtat_noidung" placeholder="Nhập nội dung" required><?php echo $row_tintuc['tomtat_tintuc']?></textarea>
            </div>
            <div class="form-group">
              <label for="noidung">Nội dung</label>
              <textarea class="form-control" rows="10" name="noidung_tintuc" id="noidung" placeholder="Nhập nội dung" required><?php echo $row_tintuc['noidung_tintuc']?></textarea>
              <script>
					CKEDITOR.replace('noidung',{uiColor: '#9AB8F3',
	language:'vi'});
				</script>
            </div>
            <div class="form-group">
              <label for="hinhanh">Hình ảnh</label>
              <input class="form-control" id="hinhanh" name="hinhanh" type="file" placeholder="Chọn hình ảnh"><img src="images/tintuc/<?php echo $row_tintuc['hinhanh']?>" width="100" height="100"/>
            </div>
            <div class="form-group">
              <label for="loai_tintuc">Loại tin tức</label>
              <select class="form-control" name="loai_tintuc" id="loai_tintuc" >
              		<?php 
					$danhsachloaitin=DanhSanhLoaiTin();
					while($row_danhsachloaitin=mysql_fetch_array($danhsachloaitin))
					{
					?>
                    <option <?php if($row_tintuc['id_loaitintuc']==$row_danhsachloaitin['id_loaitintuc']) echo "selected='selected'";?> value="<?php echo $row_danhsachloaitin['id_loaitintuc']?>"><?php echo $row_danhsachloaitin['ten_loaitintuc'];?></option>
                    <?php
					}
					?>
              </select>
            </div>
            <div class="row">
              <div class="col-md-6"><button name="btn_editnews" type="submit"  class="btn btn-primary btn-block" >Sửa tin tức</button></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>