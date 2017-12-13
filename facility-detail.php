<?php 
ob_start();
session_start();
require "lib/connection.php";
require "lib/xuly.php";
require "lib/cosoyte.php";
?>
<?php thoat();?>
<?php //notuser();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cơ sở y tế</title>
	<link rel="stylesheet" type="text/css" href="css/facility-detail.css">
	<link rel="stylesheet" type="text/css" href="css/nav-footer.css">

	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  	<script type="text/javascript" src="css/bootstrap/js/bootstrap.min.js"></script>
  	<script src="https://use.fontawesome.com/677b7314cf.js"></script>
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myBar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="news.php" class="navbar-brand logo"><img src="images/logo.png"></a>
			</div>

			<div class="collapse navbar-collapse" id="myBar">
				<ul class="nav navbar-nav">
					<ul class="nav navbar-nav">
						<li><a href="news.php" >Tin tức</a></li>
						<li><a href="diseases.php">Bệnh lý</a></li>
						<li><a href="consultant.php">Tư vấn</a></li>
						<li class="active"><a href="facility.php">Cơ sở y tế</a></li>
						<li><a href="doctor.php">Bác sĩ</a></li>
						<li>
							<div class="search pull-left">
								<form>
									<input type="text" value="" placeholder="Tìm kiếm...">
									<input type="submit" value="">
								</form>
							</div>
						</li>
					</ul>
					
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<!--profile-->
                    <?php require "block/profile.php"; ?>
                    <!--xinchao-->
					<?php require "block/xinchao.php"; ?>
				</ul>
			</div>
		</div>
	</div>
	<?php 
	if(isset($_GET["id_cosoyte"]))
	{
		$id_cosoyte=$_GET["id_cosoyte"];
		settype($id_cosoyte,"int");
	}else{
		$id_cosoyte=1;
	}
	?>
	<?php
	$chitietcosoyte = ChiTietCoSoYTe($id_cosoyte);
	$row_chitietcosoyte = mysql_fetch_array($chitietcosoyte);
	?>
	<div class="content">
		<div class="container">
			<div class="header-content">
				<h1><?php echo $row_chitietcosoyte['ten_cosoyte']?></h1>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="row">
							<div class="col-md-4">
								<img src="images/cosoyte/<?php echo $row_chitietcosoyte['hinhanh_cosoyte']?>">
								<h4>Thời gian làm việc</h4>
								<p><span class="glyphicon glyphicon-time"></span> Thứ 2 - Chủ nhật: 24/24</p>
							</div>
							<div class="col-md-4">
								<h4>Chuyên khoa</h4>
								<p><?php echo $row_chitietcosoyte['chuyenkhoa']?></p>
							</div>
							<div class="col-md-4">
								<h4>Địa chỉ</h4>
								<p><span class="glyphicon glyphicon-map-marker"></span> <?php echo $row_chitietcosoyte['diachi_cosoyte']?></p>
								<h4>Liên hệ</h4>
								<p><span class="glyphicon glyphicon-earphone"></span> <?php echo $row_chitietcosoyte['dienthoai_cosoyte']?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 intro">
								<h4>Giới thiệu:</h4>
							<p><?php echo $row_chitietcosoyte['gioithieu']?></p>
							

							<div>
								<h4>Dịch vụ</h4>
								<p>Chăm sóc sức khỏe toàn diện</p>
								<p>Cấp cứu tổng hơp</p>
								<p>Khám, cấp giấy chứng nhận sức khỏe theo thông tư 14</p>
								<p>Khám, chữa bệnh BHYT cho mọi đối tượng</p>
								<p>Trung tâm vật lý trị liệu - phục hồi chức năng</p>
							</div>
							</div>
                             <div style="float:left; margin-left:10px; margin-top:20px;" class="fb-like" data-href="https://www.facebook.com/medwiki.vn/" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
						</div>
					</div>	
				</div>
			</div>


			<!--tu van truc tuyen-->
			<?php 
			require "block/tuvantructuyen.php";
			?>
		    <!--end tu van truc tuyen-->
		</div>
	</div>



	<!--footer-->
	<?php
	include("block/footer.php");	?>

  	<script src="js/script.js"></script>
    <script type="text/javascript" src="js/js.js"></script>
</body>
</html>