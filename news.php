<?php
ob_start();
session_start();
require "lib/connection.php";
require "lib/trangchu.php";
require "lib/xuly.php";
?>
<?php thoat();?>
<?php dangnhap();?>
<?php
	if(isset($_GET["p"])){
		$p=$_GET["p"];
	}else
	{
		$p="";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tin tức</title>
	<link rel="stylesheet" type="text/css" href="css/news.css">
	<link rel="stylesheet" type="text/css" href="css/nav-footer.css"> 

	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  	<script type="text/javascript" src="css/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/facebook.css">
    <script src="https://use.fontawesome.com/677b7314cf.js"></script>
    <?php require "lib/other.php" ?>
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
				<a href="main.php" class="navbar-brand logo"><img src="images/logo.png"></a>
			</div>

			<div class="collapse navbar-collapse" id="myBar">
				<ul class="nav navbar-nav">
					<ul class="nav navbar-nav">
						<li class="active"><a href="news.php" >Tin tức</a></li>
						<li><a href="diseases.php">Bệnh lý</a></li>
						<li><a href="consultant.php">Tư vấn</a></li>
						<li><a href="facility.php">Cơ sở y tế</a></li>
						<li><a href="doctor.php">Bác sĩ</a></li>
						<li>
							<div class="search pull-left">
								<form action="" method="get">
									<input name="q" maxlength="80" type="text" value="" placeholder="Tìm kiếm..." required>
									<input type="submit" value="">
								<input name="p" type="hidden" id="p" value="timkiemtintuc">
                                </form>
							</div>
						</li>
					</ul>
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<!--block profile-->
                    	
                    <?php 
					//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
					if (!isset($_SESSION["tendangnhap"])) {
	 					require "block/dangki.php";
						require "block/dangnhap.php";
					}
					else{
						require "block/profile.php";
						require "block/xinchao.php";
					}?>
				</ul>
			</div>
		</div>
	</div>

	<div class="banner">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		      	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		      	<li data-target="#myCarousel" data-slide-to="1"></li>
		      	<li data-target="#myCarousel" data-slide-to="2"></li>
		    </ol>

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner">
		    	<div class="item active">
			        <img src="images/banner-medical.jpg" alt="Slogan" style="width:100%;">
			        <div class="carousel-caption">
			          	<h1><b>CUNG CẤP NHỮNG THÔNG TIN CHÍNH XÁC NHẤT VỀ Y TẾ</b></h1>
			        </div>
			    </div>

			    <div class="item">
			        <img src="images/banner-doctor.jpg" alt="Slogan" style="width:100%;">
			        <div class="carousel-caption">
			          	<h1><b>ĐỘI NGŨ HỖ TRỢ TƯ VẤN CHẤT LƯỢNG</b></h1>
			        </div>
			    </div>
		    
			    <div class="item">
			        <img src="images/banner-falicity.jpg" alt="Slogan" style="width:100%;">
			        <div class="carousel-caption">
			          	<h1><b>TIẾP CẬN NHANH CHÓNG TÌNH HÌNH Y TẾ</b></h1>
			        </div>
			    </div>
		  
		    </div>

		    <!-- Left and right controls -->
		    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		      	<span class="glyphicon glyphicon-chevron-left"></span>
		      	<span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" data-slide="next">
		      	<span class="glyphicon glyphicon-chevron-right"></span>
		      	<span class="sr-only">Next</span>
		    </a>
		  </div>
		</div>
	</div>

	<!--page-->
    <?php
	switch($p)
	{
		case "trangtintheoloaitin" :require "block/trangtintheoloai.php"; break;
		case "timkiemtintuc" : require "block/timkiemtintuc.php"; break;
		default: 
			require"block/trangchinhtintuc.php";
	}
	?>

	 <!--footer-->
	<?php
	include("block/footer.php");	?>
	
	
	



	 
  	<script src="js/script.js"></script>
  	<script type="text/javascript" src="js/js.js"></script>
</body>
<?php require "block/changepassword.php" ?>
</html>