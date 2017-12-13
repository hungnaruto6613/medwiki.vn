$(document).ready(function(){
	$flag=1;
	$("#name").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_name").text("* Bạn phải nhập Họ và tên!");
        }
        else{
            if ($(this).val().length>20)
            {   
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                $("#error_name").text("* Độ dài của tên không được quá 20 kí tự!");
            }
            else{
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled',false);
                $("#error_name").text("");
            }
        }
   });
    $("#username").focusout(function(){
		if($(this).val()==''){
    		$(this).css("border-color", "#FF0000");
			$('#submit').attr('disabled',true);
			$("#error_user").text("* Bạn phải nhập tên đăng nhập!");
    	}
    	else
    	{

    		if($(this).val().length >=6 && $(this).val().length <=15){
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled',false);
                $("#error_user").text("");
            }
            else{
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                $("#error_user").text("* Tên đăng nhập phải từ 6 đến 15 kí tự!");
            }
    	}
   });
    $("#email").focusout(function(){
		if($(this).val()==''){
    		$(this).css("border-color", "#FF0000");
			$('#submit').attr('disabled',true);
			$("#error_email").text("* Bạn phải nhập email!");
    	}
    	else
    	{
            if(validateEmail($(this).val())){
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled',false);
                $("#error_email").text("");
            }
            else{
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                $("#error_email").text("* Bạn phải nhập đúng định dạng email!");
            }
    		
    	}
   });
    $("#password").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_pass").text("* Bạn phải nhập mật khẩu!");
        }
        else
        {
            if($(this).val().length >=8 && $(this).val().length <=20){
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled',false);
                $("#error_pass").text("");
            }
            else{
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                $("#error_pass").text("* Mật khẩu phải từ 8 đến 20 kí tự!");
            }
        }
   });
    
    $("#re-password").focusout(function(){
        var pass =$("#password").val();
		if($(this).val()==''){
    		$(this).css("border-color", "#FF0000");
			$('#submit').attr('disabled',true);
			$("#error_repass").text("* Bạn phải xác nhận lại mật khẩu!");
    	}
        else{    
            if($(this).val() != pass){
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                $("#error_repass").text("* Mật khẩu không trùng khớp!");
                
            }
            else{
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled',false);
                $("#error_repass").text("");
            }
        }

	});

	$( "#submit" ).click(function() {
        if($("#name" ).val()=='')
        {
            $("#name").css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_name").text("* Bạn phải nhập họ và tên!");
        }
    	if($("#username" ).val()=='')
		{
    		$("#username").css("border-color", "#FF0000");
    		$('#submit').attr('disabled',true);
    		$("#error_user").text("* Bạn phải nhập tên đăng nhập!");
    	}
		if($("#email" ).val()=='')
		{
    		$("#email").css("border-color", "#FF0000");
    		$('#submit').attr('disabled',true);
    		$("#error_email").text("* Bạn phải nhập email!");
    	}
		if($("#password" ).val()=='')
		{
    		$("#password").css("border-color", "#FF0000");
    		$('#submit').attr('disabled',true);
    		$("#error_pass").text("* Bạn phải nhập mật khẩu!");
    	}
    	if($("#re-password" ).val()=='')
			{
    		$("#re-password").css("border-color", "#FF0000");
    		$('#submit').attr('disabled',true);
    		$("#error_repass").text("* Bạn phải xác nhận lại mật khẩu!");
    	}
	});

    function validateEmail(sEmail) {
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        if (filter.test(sEmail)) {
            return true;
        }
        else {
            return false;
        }
    }




    $("#login-username").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
            $('#login-submit').attr('disabled',true);
            $("#error_loginuser").text("* Bạn phải nhập tên đăng nhập!");
        }
        else
        {

            if($(this).val().length >=6 && $(this).val().length <=15){
                $(this).css("border-color", "#2eb82e");
                $('#login-submit').attr('disabled',false);
                $("#error_loginuser").text("");
            }
            else{
                $(this).css("border-color", "#FF0000");
                $('#login-submit').attr('disabled',true);
                $("#error_loginuser").text("* Tên đăng nhập phải từ 6 đến 15 kí tự!");
            }
        }
   });
    $("#login-password").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
            $('#login-submit').attr('disabled',true);
            $("#error_loginpass").text("* Bạn phải nhập mật khẩu!");
        }
        else
        {
            if($(this).val().length >=8 && $(this).val().length <=20){
                $(this).css("border-color", "#2eb82e");
                $('#login-submit').attr('disabled',false);
                $("#error_loginpass").text("");
            }
            else{
                $(this).css("border-color", "#FF0000");
                $('#login-submit').attr('disabled',true);
                $("#error_loginpass").text("* Mật khẩu phải từ 8 đến 20 kí tự!");
            }
        }
   });
    $( "#login-submit" ).click(function() {
        if($("#login-username" ).val()=='')
        {
            $("#login-username").css("border-color", "#FF0000");
            $('#login-submit').attr('disabled',true);
            $("#error_loginuser").text("* Bạn phải nhập tên đăng nhập!");
        }
        if($("#login-password" ).val()=='')
        {
            $("#login-password").css("border-color", "#FF0000");
            $('#login-submit').attr('disabled',true);
            $("#error_loginpass").text("* Bạn phải nhập mật khẩu!");
        }
    });
	
});