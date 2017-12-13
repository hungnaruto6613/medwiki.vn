<?php
ob_start();
session_start();
require "lib/connection.php";
require "lib/trangchu.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tin tức</title>
	<link rel="stylesheet" type="text/css" href="css/news-detail.css">
	<link rel="stylesheet" type="text/css" href="css/nav-footer.css">
	<link rel="stylesheet" type="text/css" href="css/facebook.css">

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
						<li class="active"><a href="news.php" >Tin tức</a></li>
						<li><a href="diseases.php">Bệnh lý</a></li>
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
					<li class="dropdown profile">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span></span></a>
						<ul class="dropdown-menu">
							<li class="avatar"><img class="img-thumbnail avatar-image center-block" src="images/avata.jpg">
								<p>Xin chào Hirai Momo</p>
							</li>
							<li><a href=""><span class="glyphicon glyphicon-pencil"></span> Thay đổi avatar</a></li>
							<li><a href=""><span class="glyphicon glyphicon-paperclip"></span> Cập nhật thông tin cá nhân</a></li>
							<li><a href=""><span class="glyphicon glyphicon-random"></span> Chuyển tới trang quản lý (admin)</a></li>
							<li><a href=""><span class="glyphicon glyphicon-random"></span> Chuyển tới trang quản lý (doctor)</a></li>
						</ul>
					</li>
					<li><a href="register.php"><span class="glyphicon glyphicon-plus"></span> Đăng ký</a></li>
					<li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập <span class="caret"></span></a>
						<ul id="login-dp" class="dropdown-menu">
							<li>
								 <div class="row">
										<div class="col-md-12">
											<form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
												<div class="form-group">
													 <label class="sr-only" for="login-username">Tên đăng nhập</label>
													 <input type="text" class="form-control" id="login-username" placeholder="Nhập địa chỉ email">
													 <span id="error_loginuser" class="text-danger" style="font-size: 12px"></span>
												</div>
												<div class="form-group">
													 <label class="sr-only" for="login-password">Mật khẩu</label>
													 <input type="password" class="form-control" id="login-password" placeholder="Nhập mật khẩu">
													 <span id="error_loginpass" class="text-danger"></span>
		                                             <div class="help-block text-right"><a href="">Quên mật khẩu ?</a></div>
												</div>
												<div class="form-group">
													 <button type="submit" id="login-submit" class="btn btn-primary btn-block">Đăng nhập</button>
												</div>
												<div class="checkbox">
													 <label>
													 <input type="checkbox"> Giữ đăng nhập
													 </label>
												</div>
											</form>
										</div>
								 </div>
							</li>
						</ul>
			        </li>
				</ul>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="card">
						<div class="row">
							<div class="col-md-12">
                            	<?php 
								if(isset($_GET["idtintuc"]))
								{
									$idTin=$_GET["idtintuc"];
									settype($idTin,"int");
								}else{
									$idTin=1;
								}
								CapNhatSoLanXemTin($idTin);
								?>
                                <?php
								$tin = ChiTietTinTuc($idTin);
								$row_tin = mysql_fetch_array($tin);
								?>
								<h4><?php echo $row_tin['tieude_tintuc']?></h4>
								<p><small><?php echo $row_tin['thoigian_dangtin']?></small></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-7">
								<div class="imgbenh">
									<img src="images/tintuc/<?php echo $row_tin['hinhanh']?>" style="height:350px;width:500px;" class="img-rounded">
									<p style="text-align: center; margin-top: 7px;"><cite>Hình ảnh</cite></p>
								</div>
							</div>
						</div>
						<div>
							<?php echo $row_tin['noidung_tintuc']?>
							<div class="row">
								<div class="col-md-12"><cite style="float: right; margin-top: 10px;"><?php $tentacgia=TenTacGia($idTin); echo "Biên Tập :".$tentacgia['ten_nguoidung']?></cite></div>
                                <div style="float:left; margin-left:10px;" class="fb-like" data-href="https://www.facebook.com/medwiki.vn/" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
							</div>
						</div>
					</div>
                    
				</div>

				<div class="col-md-4">
					<div class="news-menu">
						<div class="card-menu">
							<div class="header-menu"><h4>TIN NỔI BẬT</h4></div>
							<ul>
                            <?php 
							$tinnoibat=TinNoiBat_NamTin();
							while($row_tinnoibat=mysql_fetch_array($tinnoibat))
							{
							?>
								<li>
									<div class="row">
										<div class="col-md-4">
											<img src="images/tintuc/<?php echo $row_tinnoibat['hinhanh']?>">
										</div>
										<div class="col-md-8">
											<a href=""><b><?php echo $row_tinnoibat['tieude_tintuc']?></b></a>
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
    <div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>