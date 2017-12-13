 <?php 
 	$id_nhombenh=$_GET['id_nhombenh'];
	settype($id_nhombenh,"int");
	$row_nhombenh=QL_ChiTietNhomBenh($id_nhombenh);
	if(isset($_POST["btn_edittype_disease"]))
	{
	$ten_nhombenh=$_POST["ten_nhombenh"];
	
	 $qr="
		UPDATE nhombenh SET 
		ten_nhombenh='$ten_nhombenh'
		WHERE 
		id_nhombenh='$id_nhombenh'
	";
	mysql_query($qr);
	//header ("window.location=manage_news.php?p=suatintuc&id_tintuc=".$id_tintuc);
	echo '<script language="javascript">alert("Sửa tin thành công"); window.location= "manage_news.php?p=suanhombenh";</script>';
}
 ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Quản lý</a>
        </li>
        <li class="breadcrumb-item active">Sửa nhóm bệnh</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <form action="" method="post" role="form" class="addaccount" enctype="multipart/form-data">
            <div class="form-group">
              <label for="ten_nhombenh">Tên loại tin tức</label>
              <input value="<?php echo $row_nhombenh['ten_nhombenh']?>" class="form-control" name="ten_nhombenh" id="ten_loaitintuc" type="text" placeholder="Nhập tên nhóm bệnh...." required>
            </div>
            <div class="row">
              <div class="col-md-6"><button name="btn_edittype_disease" type="submit"  class="btn btn-primary btn-block" >Sửa nhóm bệnh</button></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>