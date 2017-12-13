<?php
ob_start();
session_start();
require "lib/connection.php";
require "lib/xuly.php";
require "lib/bacsi.php";
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
	<title>Bác sĩ</title>
	<link rel="stylesheet" type="text/css" href="css/doctor.css">
    <link rel="stylesheet" type="text/css" href="css/doctor-detail.css">
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
						<li><a href="facility.php">Cơ sở y tế</a></li>
						<li class="active"><a href="doctor.php">Bác sĩ</a></li>
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
	
	<div class="noidung">
		<div class="container">
			<!--block -->
            <?php 
			switch($p)
			{
			case "timkiembacsi": require "block/timkiembacsi.php";break;
			case "bacsichuyenkhoa": require "block/bacsitheochuyenkhoa.php";break;
			case "chitietbacsi": require "block/chitietbacsi.php";break;
			default:
				echo "
				<div class=\"row\">
					<div class=\"col-md-9\">
						
						<div >
							<div class=\"row\" id=\"alldoctor\">";
								
								$sobacsimottrang=20;
								if(isset($_GET["trang"]))
								{
									$trang=$_GET["trang"];
									settype($trang,"int");
								}
								else{
									$trang=1;
								}
								$from=($trang-1)*$sobacsimottrang;
				                $bacsi=DanhSachBacSi($from,$sobacsimottrang);
								while($row_bacsi=mysql_fetch_array($bacsi))
								{
									$id_bacsi=$row_bacsi['id_bacsi'];
									$hinhanh=$row_bacsi['hinhanh_bacsi'];
									$hocvi =$row_bacsi['hocvi'];
									$noilamviec =$row_bacsi['noilamviec'];
									$diachi= $row_bacsi['diachi_bacsi'];
									$dt=$row_bacsi['dienthoai_bacsi'];
									$ten = $row_bacsi['ten_bacsi'];
								
								echo "
				                <div class=\"col-lg-4 col-sm-6\">
									<div class=\"card\">
										<div class=\"wraper-avata\">
											<img src=\"images/bacsi/$hinhanh\" alt=\"Avatar\" class=\"avata\">
											<div class=\"overlay\">
											    <div class=\"information\">
													<p><span class=\"glyphicon glyphicon-briefcase\"></span> </p>";
				                                    $chuyenkhoa_theobacsi=DanhSachChuyenKhoa_TheoBacSi($id_bacsi);
													echo "
													<p><span class=\"glyphicon glyphicon-education\"></span> ";
													while($row_chuyenkhoatheobacsi=mysql_fetch_array($chuyenkhoa_theobacsi))
													{ 
														echo $row_chuyenkhoatheobacsi['ten_chuyenkhoa'].", "; 
													} 
													echo "</p>
													<p><span class=\"glyphicon glyphicon-tag\"></span> $noilamviec</p>
													<p><span class=\"glyphicon glyphicon-list\"></span> $diachi</p>
													<p><span class=\"glyphicon glyphicon-earphone\">+84 $dt </p>
											    </div>
											</div>
										</div>
										<a href=\"doctor.php\" style=\"text-align: center;\" class=\"\"><h4><span class=\"glyphicon glyphicon-user\"></span> Bác sĩ: $ten</h4></a>
										<div class=\"rating\" style=\"margin-bottom: 15px; text-align: center; color: #009194;\">";
												
												if(isset($_SESSION['id_nguoidung']))
												{
													$checkvote = mysql_query("SELECT * FROM danhgia_bacsi WHERE id_bacsi ='$id_bacsi' AND id_nguoidung = '$sid' ");
													$numvote = mysql_num_rows($checkvote);
													if($numvote == 1)
													{
														$fcheckvote = mysql_fetch_assoc($checkvote);
														$votep = $fcheckvote['vote'];
														if($votep==1)
														{
															echo "
															<button style=\"border:0px; background-color:transparent;\" disabled id=\"voteup-$id_bacsi\"><span class=\"glyphicon glyphicon-thumbs-up\" style=\"color: #ccc;\" id=\"up-$id_bacsi\"></span></button>
															<button style=\"border:0px; background-color:transparent;\" id=\"votedown-$id_bacsi\"><span class=\"glyphicon glyphicon-thumbs-down\" style=\"color: #D72828;\" id=\"down-$id_bacsi\"></span></button>";
														}
														else
														{
															echo "
															<button style=\"border:0px; background-color:transparent;\" id=\"voteup-$id_bacsi\"><span class=\"glyphicon glyphicon-thumbs-up\" style=\"color: #1852BB; \" id=\"up-$id_bacsi\"></span></button>
															<button style=\"border:0px; background-color:transparent;\" disabled id=\"votedown-$id_bacsi\"><span class=\"glyphicon glyphicon-thumbs-down\" style=\"color: #ccc;\" id=\"down-$id_bacsi\"></span></button>";
														}
													}
													else
													{
														echo "
														<button style=\"border:0px; background-color:transparent;\" id=\"voteup-$id_bacsi\"><span class=\"glyphicon glyphicon-thumbs-up\" style=\"color: #1852BB;\" id=\"up-$id_bacsi\"></span></button>
														<button style=\"border:0px; background-color:transparent;\" id=\"votedown-$id_bacsi\"><span class=\"glyphicon glyphicon-thumbs-down\" style=\"color: #D72828;\" id=\"down-$id_bacsi\"></span></button>";
													}
													echo "
													<script type=\"text/javascript\">
														$(document).ready(function(){
															$(\"button#voteup-$id_bacsi\").click(function(){
																$(\"#voteup-$id_bacsi\").attr('disabled','disabled');
																$(\"#votedown-$id_bacsi\").removeAttr('disabled');
																$(\"#up-$id_bacsi\").css(\"color\", \"#ccc\");
																$(\"#down-$id_bacsi\").css(\"color\", \"#D72828\");
																var did = $id_bacsi;
																var sid = $sid;
																var vote = 1;
																var data = 'did='+did+'&sid='+sid+'&vote='+vote;
																$.ajax({
																	type: \"POST\",
																	url: \"votedoctor.php\",
																	data: data,
																	success: function(data){
																		$(\"#show-$id_bacsi\").show(data);
																		$(\"#show-$id_bacsi\").html(data);
																	}
																});
															});
															$(\"button#votedown-$id_bacsi\").click(function(){
																$(\"#voteup-$id_bacsi\").removeAttr('disabled');
																$(\"#votedown-$id_bacsi\").attr('disabled','disabled');
																$(\"#up-$id_bacsi\").css(\"color\", \"#1852BB\");
																$(\"#down-$id_bacsi\").css(\"color\", \"#ccc\");
																var did = $id_bacsi;
																var sid = $sid;
																var vote = 0;
																var data = 'did='+did+'&sid='+sid+'&vote='+vote;
																$.ajax({
																	type: \"POST\",
																	url: \"votedoctor.php\",
																	data: data,
																	success: function(data){
																		$(\"#show-$id_bacsi\").show(data);
																		$(\"#show-$id_bacsi\").html(data);
																	}
																});
															});
														});
													</script>
													";
												}
												
												$checkvoteup = mysql_query("SELECT * FROM danhgia_bacsi WHERE id_bacsi ='$id_bacsi'  AND vote =1 ");
												$checkvoteup1 = mysql_num_rows($checkvoteup);

												$checkvotedown = mysql_query("SELECT * FROM danhgia_bacsi WHERE id_bacsi ='$id_bacsi' AND vote =0 ");
												$checkvotedown1 = mysql_num_rows($checkvotedown);
												$total = ($checkvoteup1+$checkvotedown1);
												if($total==0)
												{
													echo "
													<small id=\"show-$id_bacsi\">
													Chưa được đánh giá!
													</small>
													";
												}
												else
												{
													$percen = ($checkvoteup1/$total)*100;
													echo "
													<small id=\"show-$id_bacsi\">
													$percen % đánh giá tích cực
													</small>
													";
												}

										echo "
										</div>
										<a class=\"btn btn-primary doctor-link\"  href=\"doctor.php?p=chitietbacsi&id_bacsi=$id_bacsi\">Xem thông tin <span class=\"glyphicon glyphicon-share\"></span></a>
									</div>
						        </div>";
				                
								}
								
				            echo "
							</div>
						</div>	
						<div>
							<div class=\"pagination\">";
				            
							$bacsiphantrang=DanhSachTatCaBacSi();
							$tongsobacsi=mysql_num_rows($bacsiphantrang);
							$tongsotrang=ceil($tongsobacsi/$sobacsimottrang);
							for($i=1;$i<=$tongsotrang;$i++)
							{	
								echo "
							  	<a href=\"#\">&laquo;</a>
							  	<a if($i==$trang) echo \"style='background-color:yellow' \" href=\"doctor.php?p=&trang=$i\">$i</a>
							  	<a href=\"#\">&raquo;</a>";
				            
				            }
							echo "
							</div>
						</div>
					</div>
					<div class=\"col-md-3\">
						<div class=\"news-menu\">
							<div class=\"card-menu\">
								<div class=\"header-menu\"><p>CHUYÊN KHOA</p></div>
								<ul>";
								$chuyenkhoa=DanhSachChuyenKhoa();
								while($row_chuyenkhoa=mysql_fetch_array($chuyenkhoa))
								{
									$ten_chuyenkhoa= $row_chuyenkhoa['ten_chuyenkhoa'];
									$id_chuyenkhoa= $row_chuyenkhoa['id_chuyenkhoa'];
									echo "
									<li>
										<div class=\"row\">
											<div class=\"col-md-2\">
												<img src=\"images/edu.png\">
											</div>
											<div class=\"col-md-10\">
												<a href=\"doctor.php?p=bacsichuyenkhoa&id_chuyenkhoa=$id_chuyenkhoa\"><h4>$ten_chuyenkhoa</h4></a>
											</div>
										</div>
									</li>";
				                
								}
								echo " 
								</ul>
							</div>
						</div>
					</div>
				</div>";
			}
			?>
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