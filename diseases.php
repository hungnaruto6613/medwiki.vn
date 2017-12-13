<?php
ob_start();
session_start();
require "lib/connection.php";
require "lib/benhly.php";
require "lib/xuly.php";
?>
<?php thoat();?>
<?php //notuser();?>
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
	<title>Bệnh lý</title>
	<link rel="stylesheet" type="text/css" href="css/diseases.css">
	<link rel="stylesheet" type="text/css" href="css/nav-footer.css">

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
				<a href="main.php" class="navbar-brand logo"><img src="images/logo.png"></a>
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
								<form action="" method="get">
									<input name="q" maxlength="80" type="text" value="" placeholder="Tìm kiếm..." required>
									<input type="submit" value="">    
								<input name="p" type="hidden" id="p" value="timkiembenh">
                                </form>
							</div>
						</li>
					</ul>
					
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
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



	
	<div class="wrap">
		<div class="container">
			<div class="content">
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-6">
								<div>
									<h1 style="color: #009194;">DANH SÁCH BỆNH</h1>
								</div>
							</div>
							<div class="col-md-6">
								<div class="header-content pull-right">
									<div class="dropdown">
										<a href="" class="btn btn-default dropdown-toggle" data-toggle="dropdown">SẮP XẾP</a>
										<ul class="dropdown-menu">
										    <li><a href="#">A-Z</a></li>
										   	<li><a href="#">Z-A</a></li>
										   	<li><a href="#">Xem nhiều</a></li>
										   	<li><a href="#">Mới đăng</a></li>
									    </ul>
									</div>
								</div>
							</div>
						</div>
						<!--box page -->
                        <?php
						switch($p){
						 	case "danhsachbenh": require "block/trangbenhtheonhombenh.php";break;
							case "timkiembenh": require "block/timkiembenh.php"; break;
							default: 
								require "block/trangchinhbenh.php";
						}
						?>
					</div>
						
					<!--danhmucbenh-->
                    <?php require "block/danhmucbenh.php";?>
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