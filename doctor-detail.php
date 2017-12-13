<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bác sĩ</title>
	<link rel="stylesheet" type="text/css" href="css/doctor-detail.css">
	<link rel="stylesheet" type="text/css" href="css/nav-footer.css">
	<link rel="stylesheet" type="text/css" href="css/comment.css">

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
						<li><a href="facility.php">Cơ sở y tế</a></li>
						<li class="active"><a href="doctor.php">Bác sĩ</a></li>
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
	



	 <!--footer-->
	<?php
	include("block/footer.php");	?>
  	<script src="js/script.js"></script>
</body>
</html>