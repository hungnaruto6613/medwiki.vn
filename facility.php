<?php 
ob_start();
session_start();
require "lib/connection.php";
require "lib/xuly.php";
require "lib/cosoyte.php";
if(isset($_SESSION['id_nguoidung']))
{
	$sid = $_SESSION['id_nguoidung'];
}
?>
<?php thoat();?>
<?php //notuser();?>
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
	<title>Cơ sở y tế</title>
	<link rel="stylesheet" type="text/css" href="css/facility.css">
	<link rel="stylesheet" type="text/css" href="css/nav-footer.css">

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
				<a href="main.php" class="navbar-brand logo"><img src="images/logo.png"></a>
			</div>

			<div class="collapse navbar-collapse" id="myBar">
				<ul class="nav navbar-nav">
					<ul class="nav navbar-nav">
						<li><a href="news.php" >Tin tức</a></li>
						<li><a href="diseases.php">Bệnh lý</a></li>
						<li><a href="consultant.php">Tư vấn</a></li>
						<li class="active"><a href="facility.php">Cơ sở y tế</a></li>
						<li><a href="doctor.php">Bác sĩ</a></li>
						<li>
							<div class="search pull-left">
								<form>
									<input name="q" maxlength="80" type="text" value="" placeholder="Tìm kiếm...">
									<input type="submit" value="">
                                <input name="p" type="hidden" id="p" value="timkiemcosoyte">
								</form>
							</div>
						</li>
					</ul>
					
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
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

	<div class="content">
		<div class="container">
			<?php 
			switch($p)
			{
				case "cosoytetheoloai": require "block/cosoytetheoloai.php";break;
				case "timkiemcosoyte": require "block/timkiemcosoyte.php";break;
				default:
				echo "
				<div class=\"row\">
					<div class=\"col-md-8\">";
					$cosoyte=DanhSachCoSoYTe();
					while($row_cosoyte=mysql_fetch_array($cosoyte))
					{
						$hinhanh = $row_cosoyte['hinhanh_cosoyte'];
						$id = $row_cosoyte['id_cosoyte'];
						$ten = $row_cosoyte['ten_cosoyte'];
						$chuyenkhoa = $row_cosoyte['chuyenkhoa'];
						$dt = $row_cosoyte['dienthoai_cosoyte'];
						$diachi=$row_cosoyte['diachi_cosoyte'];
						$tomtat = $row_cosoyte['tomtat_gioithieu'];
						echo "
						<div class=\"card\">
							<div class=\"row\">
								<div class=\"col-md-4\">
									<div class=\"avata text-center\">
										<img src=\"images/cosoyte/$hinhanh\" >
				                        <div class=\"rating\">
				                        	<div style=\"margin:8px 0px; text-align:center;\">";
				                        		if(isset($_SESSION['id_nguoidung']))
				                        		{
				                        			$checkvote = mysql_query("SELECT * FROM danhgia_csyt WHERE id_cosoyte ='$id' AND id_nguoidung = '$sid' ");
													$numvote = mysql_num_rows($checkvote);
													if($numvote == 1)
													{
														$fcheckvote = mysql_fetch_assoc($checkvote);
														$votep = $fcheckvote['vote'];
														if($votep==1)
														{
															echo "
															<button style=\"border:0px; background-color:transparent;\" disabled id=\"voteup-$id\"><span class=\"glyphicon glyphicon-thumbs-up\" style=\"color: #ccc;\" id=\"up-$id\"></span></button>
															<button style=\"border:0px; background-color:transparent;\" id=\"votedown-$id\"><span class=\"glyphicon glyphicon-thumbs-down\" style=\"color: #D72828;\" id=\"down-$id\"></span></button>";
														}
														else
														{
															echo "
															<button style=\"border:0px; background-color:transparent;\" id=\"voteup-$id\"><span class=\"glyphicon glyphicon-thumbs-up\" style=\"color: #1852BB; \" id=\"up-$id\"></span></button>
															<button style=\"border:0px; background-color:transparent;\" disabled id=\"votedown-$id\"><span class=\"glyphicon glyphicon-thumbs-down\" style=\"color: #ccc;\" id=\"down-$id\"></span></button>";
														}
													}
													else
													{
														echo "
														<button style=\"border:0px; background-color:transparent;\" id=\"voteup-$id\"><span class=\"glyphicon glyphicon-thumbs-up\" style=\"color: #1852BB;\" id=\"up-$id\"></span></button>
														<button style=\"border:0px; background-color:transparent;\" id=\"votedown-$id\"><span class=\"glyphicon glyphicon-thumbs-down\" style=\"color: #D72828;\" id=\"down-$id\"></span></button>";
													}
													echo "
													<script type=\"text/javascript\">
														$(document).ready(function(){
															$(\"button#voteup-$id\").click(function(){
																$(\"#voteup-$id\").attr('disabled','disabled');
																$(\"#up-$id\").css(\"color\", \"#ccc\");
																$(\"#down-$id\").css(\"color\", \"#D72828\");
																$(\"#votedown-$id\").removeAttr('disabled');
																var cid = $id;
																var sid = $sid;
																var vote = 1;
																var data = 'cid='+cid+'&sid='+sid+'&vote='+vote;
																$.ajax({
																	type: \"POST\",
																	url: \"votecsyt.php\",
																	data: data,
																	success: function(data){
																		$(\"#show-$id\").show(data);
																		$(\"#show-$id\").html(data);
																	}
																});
															});
															$(\"button#votedown-$id\").click(function(){
																$(\"#voteup-$id\").removeAttr('disabled');
																$(\"#votedown-$id\").attr('disabled','disabled');
																$(\"#up-$id\").css(\"color\", \"#1852BB\");
																$(\"#down-$id\").css(\"color\", \"#ccc\");
																var cid = $id;
																var sid = $sid;
																var vote = 0;
																var data = 'cid='+cid+'&sid='+sid+'&vote='+vote;
																$.ajax({
																	type: \"POST\",
																	url: \"votecsyt.php\",
																	data: data,
																	success: function(data){
																		$(\"#show-$id\").show(data);
																		$(\"#show-$id\").html(data);
																	}
																});
															});
														});
													</script>";
				                        		}
				                        		
											echo "</div>";
			                        		$checkvoteup = mysql_query("SELECT * FROM danhgia_csyt WHERE id_cosoyte ='$id'  AND vote =1 ");
											$checkvoteup1 = mysql_num_rows($checkvoteup);

											$checkvotedown = mysql_query("SELECT * FROM danhgia_csyt WHERE id_cosoyte ='$id' AND vote =0 ");
											$checkvotedown1 = mysql_num_rows($checkvotedown);
											$total = ($checkvoteup1+$checkvotedown1);
											if($total==0)
											{
												echo "
												<p style=\"color:#009194; font-size:12px;\" id=\"show-$id\">Chưa được đánh giá</p>
												";
											}
											else
											{
												$percen = ($checkvoteup1/$total)*100;
												echo "
												<p style=\"color:#009194; font-size:12px;\" id=\"show-$id\">
												$percen% đánh giá tích cực
												</p>
												";
											}

									
											
				                        echo "				                        	
				                        </div>
									</div>
								</div>
								<div class=\"col-md-8\">
									<div class=\"name\">
										<a href=\"facility.php?p=chitietcosoyte&id_cosoyte=$id\"><h3>$ten</h3></a>
									</div>
									<div class=\"col-md-6 \">
										<div class=\"major\">
											<b>Chuyên khoa</b>
											<p><small>$chuyenkhoa</small></p>
										</div>
										<div class=\"contact\">
											<b>Liên hệ</b><br>
											<p><small>+84-$dt</small><br>
										</div>
										<div class=\"address\">
											<b>Địa chỉ</b><br>
											<p><small>$diachi</small></p>
										</div>
										</div>
									<div class=\"col-md-6\">
										<div class=\"intro\">
											<b>Giới thiệu</b><br>
											<p><small>$tomtat</small></p>
										</div>
										<div class=\"transfer\">
											<a href=\"facility-detail.php?p=chitietcosoyte&id_cosoyte=$id\" class=\"btn btn-default\">XEM THÔNG TIN</a>
										</div>
									</div>
								</div>
							</div>
						</div>
	                </div>";
					
				}
			}
			?>
            <div class="col-md-4">
				<div class="news-menu">
					<div class="card-menu">
						<div class="header-menu"><p>CÓ THỂ BẠN QUAN TÂM</p></div>
							<ul>
								<?php 
								$loaicosoyte=DanhSachLoaiCoSoYTe();
								while($row_loaicosoyte=mysql_fetch_array($loaicosoyte))
								{
								?>
								<li>
									<div class="row">
										<div class="">
											<a href="facility.php?p=cosoytetheoloai&id_loaicosoyte=<?php echo $row_loaicosoyte['id_loaicosoyte']?>"><h4><?php echo $row_loaicosoyte['ten_loaicosoyte']?></h4></a>
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
</body>
</html>