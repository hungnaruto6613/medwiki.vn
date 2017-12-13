<script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script>
	$(document).ready(function() {
	$("").click(function( event ){
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
		if(e.keyCode == 27 && $(".overlay").css("style") != "none" ) { 
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
<link rel="stylesheet" type="text/css" href="css/styles_change_password.css"/>
<link rel="stylesheet" type="text/css" href="css/change-password.css">