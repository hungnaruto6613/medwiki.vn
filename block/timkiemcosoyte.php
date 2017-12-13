			<div class="header-content">
				<div class="dropdown">
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
                <?php 
				$tukhoa=$_GET["q"];
				$kiemtra=mysql_num_rows(TimKiemCoSoYTe($tukhoa));
				if($kiemtra!=0)
				{
                $cosoyte=TimKiemCoSoYTe($tukhoa);
				while($row_cosoyte=mysql_fetch_array($cosoyte))
				{
				?>
					<div class="card">
						<div class="row">
							<div class="col-md-4">
								<div class="avata text-center">
									<img src="images/cosoyte/<?php echo $row_cosoyte['hinhanh_cosoyte']?>" >
			                        <div class="rating">
			                        	<h4 class="bold padding-bottom-7">4.3 <small>/ 5</small></h4>
			                            <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star">
			                            </span><span class="glyphicon glyphicon-star-empty"></span>
			                        </div>
								</div>
							</div>
							<div class="col-md-8">
								<div class="name">
									<a href="facility.php?p=chitietcosoyte&id_cosoyte=<?php echo $row_cosoyte['id_cosoyte']?>"><h3><?php echo $row_cosoyte['ten_cosoyte']?></h3></a>
								</div>
								<div class="col-md-6 ">
									<div class="major">
										<b>Chuyên khoa</b>
										<p><small><?php echo $row_cosoyte['chuyenkhoa']?></small></p>
									</div>
									<div class="contact">
										<b>Liên hệ</b><br>
										<p><small><?php echo "+84-".$row_cosoyte['dienthoai_cosoyte']?></small><br>
									</div>
									<div class="address">
										<b>Địa chỉ</b><br>
										<p><small><?php echo $row_cosoyte['diachi_cosoyte']?></small></p>
									</div>
									</div>
								<div class="col-md-6">
									<div class="intro">
										<b>Giới thiệu</b><br>
										<p><small><?php echo $row_cosoyte['tomtat_gioithieu']?></small></p>
									</div>
									<div class="transfer">
										<a href="facility.php?p=chitietcosoyte&id_cosoyte=<?php echo $row_cosoyte['id_cosoyte']?>" class="btn btn-default">XEM THÔNG TIN</a>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
				<?php 
				}
				}
				else
				{
					echo '<script language="javascript">alert("Không tìm thấy dữ liệu ! "); window.location="facility.php"</script>';
				}
				?>	
			