 <?php 
 	$id_loaitintuc=$_GET['id_loaitintuc'];
	settype($id_loaitintuc,"int");
	$row_loaitintuc=QL_ChiTietLoaiTinTuc($id_loaitintuc);
	if(isset($_POST["btn_edittype_news"]))
	{
	$ten_loaitintuc=$_POST["ten_loaitintuc"];
	
	 $qr="
		UPDATE loaitintuc SET 
		ten_loaitintuc='$ten_loaitintuc'
		WHERE 
		id_loaitintuc='$id_loaitintuc'
	";
	mysql_query($qr);
	//header ("window.location=manage_news.php?p=suatintuc&id_tintuc=".$id_tintuc);
	echo '<script language="javascript">alert("Sửa tin thành công"); window.location= "manage_news.php?p=sualoaitintuc";</script>';
}
 ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Quản lý</a>
        </li>
        <li class="breadcrumb-item active">Sửa loại tin tức</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <form action="" method="post" role="form" class="addaccount" enctype="multipart/form-data">
            <div class="form-group">
              <label for="ten_loaitintuc">Tên loại tin tức</label>
              <input value="<?php echo $row_loaitintuc['ten_loaitintuc']?>" class="form-control" name="ten_loaitintuc" id="ten_loaitintuc" type="text" placeholder="Nhập tên loại tin tức...." required>
            </div>
            <div class="row">
              <div class="col-md-6"><button name="btn_edittype_news" type="submit"  class="btn btn-primary btn-block" >Sửa loại tin tức</button></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>