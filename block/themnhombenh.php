<?php
if(isset($_POST["btn_addtype_disease"]))
{
	$ten_nhombenh=$_POST["ten_nhombenh"];
	$qr="
		INSERT INTO nhombenh VALUES(null,'$ten_nhombenh')
	";
	mysql_query($qr);
	//header("location : manage_news.php");
	echo '<script language="javascript">alert("Thêm nhóm bệnh thành công"); window.location="manage_news.php?p=themnhombenh";</script>';
}
?>
 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Quản lý</a>
        </li>
        <li class="breadcrumb-item active">Thêm nhóm bệnh</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <form action="" method="post" role="form" class="addaccount" >
            <div class="form-group">
              <label for="ten_nhombenh">Tên nhóm bệnh</label>
              <input class="form-control" name="ten_nhombenh" id="tieude" type="text" placeholder="Nhập nhóm bệnh..." required>
            </div>
            <div class="row">
              <div class="col-md-6"><button name="btn_addtype_disease" type="submit"  class="btn btn-primary btn-block" >Thêm nhóm bệnh</button></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
