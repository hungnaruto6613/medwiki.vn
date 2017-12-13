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
	<title>Trang chủ</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/nav-footer.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


	<link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaE2ITOmMgGcw5ioN4yltVjb_ITDkjCAM&callback=myMap"></script>
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

	
	<?php  
	//$url='main-banner.jpg';
	?>
	<div  class="container-fluid ">
		<div class="parallax-banner" style="background-image:url('<?php $url='images/main-banner.jpg'; echo $url?>')">
			<div class="banner">
			
				<div class="row content-banner text-center">
					<div class="col-md-12">
						<h1>Chào mừng bạn đến với MedWiki</h1>
						<br><br><br>
						
						<h4>Cung cấp thông tin</h4>
						<h4>chăm sóc sức khỏe, phòng khám, bác sĩ </h4>
						<h4>chính xác với dữ liệu đầy đủ và cập nhật liên tục.</h4>
						<h4>Tham gia chia sẻ, hỏi đáp thắc mắc về tất cả vấn đề sức khỏe.</h4>
						<br>
						<h4><i>Chăm sóc sức khỏe ngày hôm nay mang lại hy vọng tươi sáng hơn vào ngày mai.</i></h4>
					</div>
				</div>
			</div>
		</div>
		

		<div id="service" class="text-center">
			<h2>NHỮNG DỊCH VỤ</h2>
			<br>
			<div class="row " style="padding: 30px 0px;">
				<div class="col-md-4">
					<img class="animation" src="images/disease.png"><br>
					<a href="diseases.php"><h4>BỆNH LÝ</h4></a>
					<p>Tra cứu thông tin về bệnh dễ dàng</p>
				</div>
				<div class="col-md-4">
					<img class="animation" src="images/doctor.png"><br>
					<a href="doctor.php"><h4>BÁC SĨ</h4></a>
					<p>Cung cấp hồ sơ các bác sĩ uy tín</p>
				</div>
				<div class="col-md-4">
					<img class="animation" src="images/facility.png"><br>
					<a href="facility.php"><h4>CƠ SỞ Y TẾ</h4></a>
					<p>Thông tin về những cơ sở y tế hàng đầu</p>
				</div>
			</div>
			<div class="row"  style="padding: 30px 0px;">
				<div class="col-md-4">
					<img class="animation" src="images/news-main.png"><br>
					<a href="news.php"><h4>TIN TỨC</h4></a>
					<p>Nhận những tin tức y tế mới nhất nhanh chóng</p>
				</div>
				<div class="col-md-4">
					<img class="animation" src="images/consultant.png"><br>
					<a href="consultant.php"><h4>TƯ VẤN</h4></a>
					<p>Đặt câu hỏi, nhận tư vấn miễn phí</p>
				</div>
				<div class="col-md-4">
					<img class="animation" src="images/online-consuling.png"><br>
					<a href=""><h4>TƯ VẤN TRỰC TUYẾN</h4></a>
					<p>Trực tiếp trao đổi, nhận tư vấn từ bác sĩ</p>
				</div>
			</div>
		</div>

		<div id="about">
			<div class="row" >
			    <div class="col-sm-6 animate-right about-us">
			        <h2>VỀ CHÚNG TÔI</h2><br>
			      	
			      	<i>“Diseases of the soul are more dangerous and more numerous than those of the body”</i> <br>
			      	<i>Người có sức khỏe, có hy vọng; và người có hy vọng, có tất cả mọi thứ.</i> <br><br>
			      	<i>Đây là lí do chúng thôi thành lập MedWiki, nơi cung cấp cho các bạn những thông tin chuẩn xác về y tế, bệnh tình, hay cả những cơ sở y tế, bác sĩ. Cùng đội ngũ tư vấn chuyên môn, chúng tôi tạo điều kiện tốt nhất để đem lại thông tin đáng tin cậy nhất cho bạn về sức khỏe. </i>
			      	<br>
			    </div>
			    <div class="col-sm-6">
			        <img src="images/main-about.jpg">
			    </div>
		  	</div>
		</div>

		<div>
			<div class="contact-us">
				<h2>HỢP TÁC CÙNG CHÚNG TÔI</h2>
				<div class="row">
					<div class="col-sm-6">
						<div class="info">
							<h4>Để lại thông tin và chúng tôi sẽ liên hệ sớm với bạn.</h4>
							<h4>Hoặc liên hệ trực tiếp</h4>
							<span class="glyphicon glyphicon-phone"></span> +84 1568946731
							<br>
							<span class="glyphicon glyphicon-envelope"></span> Flamesteam@gmail.com
						</div>
					</div>
					<div class="col-sm-6" >
						<form name="" action="" method="" class="contact-form">
							<div class="row">
							<div class="col-sm-6 form-group">
								<input type="text" class="form-control" name="" placeholder="Tên">
							</div>
							<div class="col-sm-6 form-group">
								<input type="email" class="form-control" name="" placeholder="Email">
							</div>
							</div>
							<div class="row form-group">
								<div class="col-sm-12">
									<textarea class="form-control" style="min-height: 100px"></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<button type="submit" id="submit" class="btn btn-default">Gửi</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div id="googleMap" style="width:100%;height:400px"></div>
		</div>
	</div>


	


	

	
	 <!--footer-->
	<?php
	include("block/footer.php");	?>

	
	
	



	 <script>
		var slideIndex = 0;
		showSlides();

		function showSlides() {
		    var i;
		    var slides = document.getElementsByClassName("mySlides");
		    var dots = document.getElementsByClassName("dot");
		    for (i = 0; i < slides.length; i++) {
		       slides[i].style.display = "none";  
		    }
		    slideIndex++;
		    if (slideIndex > slides.length) {slideIndex = 1}    
		    for (i = 0; i < dots.length; i++) {
		        dots[i].className = dots[i].className.replace(" active", "");
		    }
		    slides[slideIndex-1].style.display = "block";  
		    dots[slideIndex-1].className += " active";
		    setTimeout(showSlides, 2000); // Change image every 2 seconds
		}
		function myMap() {
			var myCenter = new google.maps.LatLng(16.059874, 108.209754);
			var mapProp = {center:myCenter, zoom:16, scrollwheel:true, draggable:true, mapTypeId:google.maps.MapTypeId.ROADMAP};
			var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
			var marker = new google.maps.Marker({position:myCenter});
			marker.setMap(map);
		}
	</script>
  	<script src="js/script.js"></script>
  	<script type="text/javascript" src="js/js.js"></script>
</body>
</html>