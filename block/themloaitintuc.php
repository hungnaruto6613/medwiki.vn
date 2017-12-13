<?php
if(isset($_POST["btn_addtypenews"]))
{
	$ten_loaitintuc=$_POST["ten_loaitintuc"];
	$qr="
		INSERT INTO loaitintuc VALUES(null,'$ten_loaitintuc')
	";
	mysql_query($qr);
	//header("location : manage_news.php");
	echo '<script language="javascript">alert("Thêm tin loại thành công"); window.location="manage_news.php?p=themloaitintuc";</script>';
}
?>
 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Quản lý</a>
        </li>
        <li class="breadcrumb-item active">Thêm loại tin tức</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <form action="" method="post" role="form" class="addaccount" >
            <div class="form-group">
              <label for="ten_loaitintuc">Tên loại tin</label>
              <input class="form-control" name="ten_loaitintuc" id="tieude" type="text" placeholder="Nhập loại tin tức..." required>
            </div>
            <div class="row">
              <div class="col-md-6"><button name="btn_addtypenews" type="submit"  class="btn btn-primary btn-block" >Thêm loại tin tức</button></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
