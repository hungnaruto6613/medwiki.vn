<?php
function thoat()
{
if(isset($_POST["btnThoat"]))
{
	unset($_SESSION["id_nguoidung"]);
	unset($_SESSION["tendangnhap"]);
	unset($_SESSION["ten_nguoidung"]);
	unset($_SESSION["id_loainguoidung"]);
	echo '<script language="javascript">alert("Đăng Xuất Thành Công Nhấn Ok Để Trở Về Trang Chủ!"); window.location="news.php";</script>';
}
}
function dangnhap()
{
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
}
function notuser()
{
	if(!isset($_SESSION["tendangnhap"]))
	{
	echo '<script language="javascript">alert("Bạn Phải Đăng Nhập Mới Được Xem Trang Này!"); window.location="register.php";</script>';
	}
}

?>