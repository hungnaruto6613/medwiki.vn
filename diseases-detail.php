<?php
ob_start();
session_start();
require "lib/connection.php";
require "lib/benhly.php";
?>
<?php 
	if(isset($_GET["id_benh"]))
	{
		$id_benh=$_GET["id_benh"];
		settype($id_benh,"int");
	}else{
		$id_benh=1;
	}
	CapNhatSoLanXemBenh($id_benh);
?>
<?php
	$chitietbenh = ChiTietBenh($id_benh);
	$row_chitietbenh = mysql_fetch_array($chitietbenh);
	$id_nguoidung=$row_chitietbenh['id_nguoidung'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bệnh lý</title>
	<link rel="stylesheet" type="text/css" href="css/diseases-detail.css">
	<link rel="stylesheet" type="text/css" href="css/nav-footer.css">
	<link rel="stylesheet" type="text/css" href="css/comment.css">


	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
  	
  	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  	<script type="text/javascript" src="css/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/facebook.css">
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
						<li class="active"><a href="diseases.php">Bệnh lý</a></li>
						<li><a href="consultant.php">Tư vấn</a></li>
						<li><a href="facility.php">Cơ sở y tế</a></li>
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
					<?php require "block/profile.php";?>
					<?php require "block/xinchao.php"; ?>
				</ul>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="container">
			<div class="header-content">
				<h1><?php echo $row_chitietbenh['ten_benh'] ?></h1>
			</div>
			<div class="row">
				<div class="col-md-9">
					<div class="card">
						<div class="row">
							<div class="col-md-7">
								<div class="another-name">
									<h5><b>Tên gọi khác của bệnh này: </b></h5>
									<p><?php echo $row_chitietbenh['ten_goi_khac']?></p>
								</div>
							</div>

							<div class="col-md-5">
								<div class="imgbenh">
									<img src="images/benhly/<?php echo $row_chitietbenh['hinhanh_benh']?>" class="img-rounded">
								</div>
							</div>
						</div>
						<section class="noidung">
							<h4 class="header">Tổng quan</h4>
							<p>
								<?php echo $row_chitietbenh['tong_quan']?>
							</p>
						</section>
						<section class="noidung">
							<h4 class="header">Triệu chứng</h4>
							<p>
								<?php echo $row_chitietbenh['trieuchung_phongngua']?>
							</p>
						</section>
						<section class="noidung">
							<h4 class="header">Nguyên nhân</h4>
							<p>
								<?php echo $row_chitietbenh['nguyennhan']?>
							</p>
						</section>
						<section class="noidung">
							<h4 class="header">Điều trị</h4>
							<ul>
								<?php echo $row_chitietbenh['phuongphapdieutri']?>
							</ul>
						</section>
						<div class="row">
							<div class="col-md-12">
                            
								<cite style="float: right; margin-top: 10px;"><?php $tacgia=TenNguoiDangBai_TheoId($id_nguoidung); $row_tacgia=mysql_fetch_array($tacgia); echo $row_tacgia['ten_nguoidung'];?></cite>
							</div>
                              <div style="float:left; margin-left:10px;" class="fb-like" data-href="https://www.facebook.com/medwiki.vn/" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
						</div>
						<div class="noidung">
							<div class="row">
								<div class="col-md-6">
									<h4>Đặt câu hỏi về bệnh này</h4> 
								</div>
								<div class="col-md-6">
									<a href="" style="float: right;"><b>Chuyển đến hỏi đáp</b></a>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<h4>Tìm hiểu thêm về bệnh khác</h4> 
								</div>
								<div class="col-md-6">
									<a href="" style="float: right;"><b>Chuyển đến tra cứu bệnh</b></a>
								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="col-md-3">
					<div class="news-menu">
						<div class="card-menu">
							<div class="header-menu"><h4>GỢI Ý</h4></div>
							<ul>
                            <!---->
                            <?php 
							$benhcungloai=BenhCungLoai($id_benh,$row_chitietbenh['id_nhombenh']);
							while($row_benhcungloai=mysql_fetch_array($benhcungloai))
							{
							?>
								<li>
									<div class="row">
										<div class="col-md-4">
											<img src="images/benhly/<?php echo $row_benhcungloai['hinhanh_benh']?>">
										</div>
										<div class="col-md-8">
											<a href="diseases-detail.php?p=chitietbenh&id_benh=<?php echo $row_benhcungloai['id_benh']?>"><b><?php echo $row_benhcungloai['ten_benh']?></b></a>
										</div>
									</div>
								</li>
                            <?php
							}
							?>
							</ul>
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