<?php
ob_start();
session_start();
require "lib/connection.php";
require "lib/xuly.php";
$sid = $_SESSION['id_nguoidung'];

include("timestamp.php");
$fetch = mysql_query("SELECT * FROM nguoidung WHERE id_nguoidung='$sid' ");
$fetch2 = mysql_fetch_assoc($fetch);
$username = $fetch2['ten_nguoidung'];
$time = time();
?>
<?php thoat();?>
<?php notuser();?>
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
	<title>Tư vấn</title>
	<link rel="stylesheet" type="text/css" href="css/nav-footer.css">
	<link rel="stylesheet" type="text/css" href="css/consultant.css">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
						<li class="active"><a href="consultant.php">Tư vấn</a></li>
						<li><a href="facility.php">Cơ sở y tế</a></li>
						<li><a href="doctor.php">Bác sĩ</a></li>
						<li>
							<div class="search pull-left">
								<form>
									<input name="q" maxlength="80" type="text" value="" placeholder="Tìm kiếm...">
									<input type="submit" value="">
                                <input name="p" type="hidden" id="p" value="timkiembacsi">
								</form>
							</div>
						</li>
					</ul>
					
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<!--profile-->
                    <?php require "block/profile.php"; ?>
                    <!--xinchao-->
					<?php require "block/xinchao.php"; ?>
				</ul>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	<?php /*?><a><?php echo $username; ?></a>
	<a><?php echo $_SESSION['id_nguoidung']; ?></a><?php */?>
	
	<div class="wrap">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-primary">
				        <div class="panel-heading"><b>CHỦ ĐỀ</b></div>
				      	<div id="menu_nhombenh" class="panel-body">
				      		<?php
				      		$get = mysql_query("SELECT * FROM nhombenh ORDER BY ten_nhombenh ASC");
				      		while($get2 = mysql_fetch_assoc($get))
				      		{

				      			$name = $get2['ten_nhombenh'];
				      			$idnhombenh = $get2['id_nhombenh'];
				      			echo "
				      			<button id=\"group-$idnhombenh\" class=\"accordion\">$name</button>
				      			<script type=\"text/javascript\">
								$(document).ready(function() {
									$(\"button#group-$idnhombenh\").click(function(){
										$('button').removeClass('active');
										$('button#group-$idnhombenh').addClass('active');
										var nid = $idnhombenh;
										var sid = $sid;
										var data = 'nid='+nid+'&sid='+sid;
										$.ajax({
											type: \"POST\",
											url: \"loadnhomhoidap.php\",
											data: data,
											success: function(result){
												$(\"#global\").html(result);
												setInterval(function(){
													$(\"button#group-$idnhombenh\").click(); 
												}, 180000);
											}
										});
									});
								});
							</script>
				      			";
				      		}
				      		?>
				      		
				      	</div>
				    </div>
				</div>
				<div class="col-md-8">
					<div id="global">
						
							<?php
								require "loadall.php";
							?>
					</div>
				</div>
			</div>
            <?php 
			require "block/tuvantructuyen.php";
			?>
		</div>
	</div>
	
	<?php
		require "block/footer.php";
	?>
	

	
	
  	<script src="js/script.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
</body>
</html>