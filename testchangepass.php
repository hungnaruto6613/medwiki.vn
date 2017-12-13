<?php
/*if(count($_POST)>0) {
$result = mysql_query("SELECT *from nguoidung WHERE id_nguoidung='" . $_SESSION["id_nguoidung"] . "'");
$row=mysql_fetch_array($result);
if($_POST["currentPassword"] == $row["matkhau"]) {
mysql_query("UPDATE nguoidung set matkhau='" . $_POST["newPassword"] . "' WHERE id_nguoidung='" . $_SESSION["userId"] . "'");
$message = "Mật Khẩu Đã Được Thay Đổi";
} else $message = "Mật Khẩu Hiện Tại Không Đúng";
}*/
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thay đổi mật khẩu</title>
<link rel="stylesheet" type="text/css" href="css/styles_change_password.css">
<link href='http://fonts.googleapis.com/css?family=Varela+Round|Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/demo.css">

<link rel="icon" href="http://www.thuthuatweb.net/wp-content/themes/HostingSite/favicon.ico" type="image/x-ico"/>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
$(document).ready(function() {
	$("#loginLink").click(function( event ){
		event.preventDefault();
    	$(".overlay").fadeToggle("fast");
  	});
	
	$(".overlayLink").click(function(event){
		event.preventDefault();
		var action = $(this).attr('data-action');
		
		$.get( "ajax/" + action, function( data ) {
			$( ".login-content" ).html( data );
		});	
		
		$(".overlay").fadeToggle("fast");
	});
	
	$(".close").click(function(){
		$(".overlay").fadeToggle("fast");
	});
	
	$(document).keyup(function(e) {
		if(e.keyCode == 27 && $(".overlay").css("display") != "none" ) { 
			event.preventDefault();
			$(".overlay").fadeToggle("fast");
		}
	});
});
</script>
<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
currentPassword.focus();
document.getElementById("currentPassword").innerHTML = "Nhập mật khẩu đúng theo yêu cầu!";
output = false;
}
else if(!newPassword.value) {
newPassword.focus();
document.getElementById("newPassword").innerHTML = "Nhập mật khẩu mới đúng theo yêu cầu!";
output = false;
}
else if(!confirmPassword.value) {
confirmPassword.focus();
document.getElementById("confirmPassword").innerHTML = "Nhập xác nhận mật khẩu đúng theo yêu cầu!";
output = false;
}
if(newPassword.value != confirmPassword.value) {
newPassword.value="";
confirmPassword.value="";
newPassword.focus();
document.getElementById("confirmPassword").innerHTML = "Mật Khẩu Không Trùng Khớp !";
output = false;
} 	
return output;
}
</script>
</head>
<body>
<div class="overlay" style="display: none;">
	<div class="login-wrapper">
		<div class="login-content">
			<a class="close">x</a>
			<h3>Thay Đổi Mật Khẩu</h3>
			<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
            <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
				<label for="username">
					Mật khẩu hiện tại:
					<input type="text" name="currentPassword" placeholder="Nhập mật khẩu hiện tại !" required="required" />
                    <span id="currentPassword" class="required"></span>
				</label>
				<label for="password">
					Mật khẩu mới:
					<input type="password" name="newPassword" placeholder="Nhập mật khẩu mới !" required="required" />
                    <span id="newPassword" class="required"></span>
				</label>
                <label for="password">
					Xác nhận mật khẩu mới:
					<input type="password" name="confirmPassword" placeholder="Nhập mật khẩu trùng với mật khẩu đã nhập !" required="required" />
                    <span id="confirmPassword" class="required"></span>
				</label>
				<button type="submit" name="submit" >Xác Nhận</button>
			</form>
		</div>
	</div>
</div>
<p>Here's some content.</p>
<ul>
	<li><a href="login.php" class="overlayLink" data-action="login-form.html">Log-in</a></li>
</ul>
</body>
</html>