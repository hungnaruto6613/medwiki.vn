			<div class="header-content">
				<div class="dropdown">
					<a href="" class="btn btn-default dropdown-toggle" data-toggle="dropdown">LỌC THEO TỈNH THÀNH</a>
					<ul class="dropdown-menu">
						<li class="dropdown-header">Chọn tỉnh thành</li>
					    <li><a href="#">Đà Nẵng</a></li>
					   	<li><a href="#">Đaklak</a></li>
				    </ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
                <?php 
				$cosoyte=DanhSachCoSoYTe();
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
				?>	
					
				