<?php
session_start();
?>
<?php
	require_once("lib/connection.php");
	if (isset($_POST["btn-submit-register"])) {
  			//lấy thông tin từ các form bằng phương thức POST
  			$name = $_POST["name"];
			$username=$_POST["username"];
  			$email = $_POST["email"];
 			$password = $_POST["password"];
  			$repassword = $_POST["re-password"];
  			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			  if ($name == "" ||$username==""|| $email == "" || $password == "" || $repassword == "") {
				   echo '<script language="javascript">alert("bạn vui lòng nhập đầy đủ thông tin"); window.location="register.php";</script>';
  			}else{
					//Kiểm tra nhập email đúng định dạng hay chưa
					if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email))
    				{
        				echo "Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        				exit;
   					}
					if($password!=$repassword)
					{
						echo "Vui lòng điền nhập lại mật khẩu trùng với mật khẩu.<a href='javascipt: history.go(-1)'> Trở lại</a>";
						exit;
					}
  					// Kiểm tra tài khoản đã tồn tại chưa
  					$sql="select * from nguoidung where email='$email'";
					$kt=mysql_query($sql);
 
					if(mysql_num_rows($kt)  > 0){
						echo '<script language="javascript">alert("Tài khoản đã tồn tại"); window.location="register.php";</script>';
						
					}else{
						//thực hiện việc lưu trữ dữ liệu vào db
						$create_at=date("Y-m-d H:i:s");
						$update_at=date("Y-m-d H:i:s");
						//date(Y-m-d);
	    				$sql = "INSERT INTO nguoidung(
	    					ten_nguoidung,
	    					diachi,
	    					email,
						    dienthoai,
							hinhanh,
							tendangnhap,
							matkhau,
							trangthai,
							token,
							create_at,
							update_at,
							id_loainguoidung
	    					) VALUES (
	    					'$name',
	    					'',
						    '$email',
	    					'',
							'',
							'$username',
							'$password',
							'',
							'',
							'',
							'',
							'3'
	    					)";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
						mysql_query($sql);
						echo '<script language="javascript">alert("chúc mừng bạn đã đăng ký thành công"); window.location="register.php";</script>';
					}						    
			  }
	} 
?>
<?php
	//Gọi file connection.php ở bài trước
	require_once("lib/connection.php");
	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
	if (isset($_POST["btn_submit_login"])) {
		// lấy thông tin người dùng
		$username_login = $_POST["username_login"];
		$password_login = $_POST["password_login"];
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		$username_login = strip_tags($username_login);
		$username_login = addslashes($username_login);
		$password_login = strip_tags($password_login);
		$password_login = addslashes($password_login);
		if ($username_login == "" || $password_login =="") {
			echo '<script language="javascript">alert("username hoặc password bạn không được để trống!"); window.location="register.php";</script>';
		}else{
			$sql = "select * from nguoidung where tendangnhap = '$username_login' and matkhau = '$password_login' ";
			$query = mysql_query($sql);
			$num_rows = mysql_num_rows($query);
			if ($num_rows==0) {
				echo '<script language="javascript">alert("tên đăng nhập hoặc mật khẩu không đúng !"); window.location="register.php";</script>';
				
			}else{
				//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
				//$_SESSION['username_login'] = $username_login;
				$row=mysql_fetch_array($query);
				$_SESSION["id_nguoidung"]=$row['id_nguoidung'];
				$_SESSION["tendangnhap"]=$row['tendangnhap'];
				$_SESSION["ten_nguoidung"]=$row['ten_nguoidung'];
				$_SESSION["id_loainguoidung"]=$row['id_loainguoidung'];
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                echo '<script language="javascript">alert("Đăng Nhập Thành Công"); window.location="news.php";</script>';
				//header("Location: news.php");
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng Kí</title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<link rel="stylesheet" type="text/css" href="css/nav-footer.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">

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
				<a href="main.php" class="navbar-brand logo"><img src="images/logo.png"></a>
			</div>

			<div class="collapse navbar-collapse" id="myBar">
				<ul class="nav navbar-nav">
					<ul class="nav navbar-nav">
						<li><a href="news.php" >Tin tức</a></li>
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

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				
			</div>
			<div class="col-md-6">
				<div class="register-form">
					<h2>Tạo tài khoản mới</h2>
					<p>Tạo tài khoản mới, dễ dàng, nhanh chóng để trở thành thành viên và sử dụng các dịch vụ của Medical Wiki.</p>
					<form id="myForm" action="" method="post">
						<div class="form-group">
							<label >Họ và tên </label>
							<input name="name" type="text" id="name" class="form-control" placeholder="Nhập Họ và Tên" >
							<span id="error_name" class="text-danger"></span>
						</div>

						<div class="form-group">
							<label>Tên đăng nhập *</label>
							<input name="username" type="text" id="username" class="form-control" placeholder="Nhập tên đăng nhập">
							<span id="error_user" class="text-danger"></span>
						</div>

						<div class="form-group">
							<label >Email *</label>
							<input name="email" type="email" id="email" class="form-control" placeholder="Nhập Email">
							<span id="error_email" class="text-danger"></span>
						</div>

						<div class="form-group">
							<label >Mật khẩu *</label>
							<input name="password" type="password" id="password" class="form-control" placeholder="Nhập mật khẩu" >
							<span id="error_pass" class="text-danger"></span>
						</div>

						<div class="form-group">
							<label >Xác nhận mật khẩu *</label>
							<input name="re-password" type="password"  id="re-password" class="form-control" placeholder="Nhập lại mật khẩu" >
							<span id="error_repass" class="text-danger"></span>
						</div>

						<p>Bằng cách nhấp vào <b>Tạo tài khoản</b>, bạn xác nhận đồng ý với <a>điều khoản và chính sách</a> của chúng tôi.</p>
						<button name="btn-submit-register" type="submit" id="submit" class="btn btn-success">Tạo tài khoản</button>
						<p>Bạn muốn tạo tài khoản để trở thành bác sĩ tư vấn, đăng bài viết, quảng bá phòng khám và chính mình, vui lòng liên hệ trực tiếp với chúng tôi <a href="">Tại đây</a>.</p>

					</form>
				</div>
			</div>
		</div>
	</div>


	 <!--footer-->
	<?php
	include("block/footer.php");	?>


  	<script src="js/script.js"></script>
</body>
</html>