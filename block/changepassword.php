<?php
if(isset($_POST["submit"])) {
$result = mysql_query("SELECT *from nguoidung WHERE id_nguoidung='" . $_SESSION["id_nguoidung"] . "'");
$row=mysql_fetch_array($result);
if($_POST["currentPassword"] == $row["matkhau"]) {
mysql_query("UPDATE nguoidung set matkhau='" . $_POST["newPassword"] . "' WHERE id_nguoidung='" . $_SESSION["id_nguoidung"] . "'");
echo '<script language="javascript">alert("Mật Khẩu Đã Được Thay Đổi"); window.location="";</script>';
/*echo '<script language="javascript">alert("Mật Khẩu Đã Được Thay Đổi"); window.location="manage_news.php";</script>';*/ 
} else echo '<script language="javascript">alert("Mật Khẩu Hiện Tại Không Đúng"); window.location="";</script>';
//$message = "Mật Khẩu Hiện Tại Không Đúng";
}
?>
<div class="overlay" style="display: none; z-index:1030;">
	<div class="login-wrapper">
		<div class="login-content">
			<a class="close">x</a>
			<h3 style="color:#009194 ; font-weight:bold";>Thay Đổi Mật Khẩu</h3>
			<form name="frmChange" method="post" action="" onSubmit="return validatePassword()" >
            <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
				<label for="currentPassword">
					<a style="color:#39F">Mật khẩu hiện tại:</a>
					<input style="width:350px;" class="form-control" type="password" name="currentPassword" placeholder="Nhập mật khẩu hiện tại !" required />
                    <span id="currentPassword" class="required"></span>
				</label>
				<label for="newpassword">
					<a style="color:#39F">Mật khẩu mới:</a>
					<input style="width:350px;" class="form-control" type="password" name="newPassword" placeholder="Nhập mật khẩu mới !" required />
                    <span id="newPassword" class="required"></span>
				</label>
                <label for="confirmpassword">
					<a style="color:#39F">Xác nhận mật khẩu mới:</a>
					<input style="width:350px;" class="form-control" type="password" name="confirmPassword" placeholder="Nhập mật khẩu trùng với mật khẩu đã nhập !" required />
                    <span id="confirmPassword" class="required"></span>
				</label>
				<button class="button_changepass" type="submit" name="submit" >Xác Nhận</button>
			</form>
		</div>
	</div>
</div>