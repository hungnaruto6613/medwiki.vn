			<div class="row">
				<div class="col-md-9">
                	<div class="choose">
						<div class="form-group">
						  	<!--<label for="sel1">Tỉnh thành</label>
						  	<select class="form-control" id="sel1" value="">
						    	<option>Đà Nẵng</option>
						    	<option>TP.Hồ Chí Minh</option>
						    	<option>Daklak</option>
						    	<option>Ngày đăng</option>
						  	</select>
						  	<label for="sel1" style="margin-left: 10px;">Học bằng, Học vị</label>
						  	<select class="form-control" id="sel1" value="">
						    	<option>Tiến sĩ</option>
						    	<option>Thạc sĩ</option>
						    	<option>Cử nhân</option>
						    	<option>Bác sĩ</option>
						  	</select>-->
						</div>
                    </div> 	
					<div>
						<div class="row">
							<?php
							$tukhoa=$_GET["q"];
							$kiemtra=mysql_num_rows(TimKiemBacSi($tukhoa));
							if($kiemtra!=0)
							{
                            $bacsitimkiem=TimKiemBacSi($tukhoa);
							while($row_bacsitimkiem=mysql_fetch_array($bacsitimkiem))
							{
								$id_bacsi=$row_bacsitimkiem['id_bacsi'];
							?>
                            <div class="col-lg-4 col-sm-6">
								<div class="card">
									<div class="wraper-avata">
										<img src="images/bacsi/<?php echo $row_bacsitimkiem['hinhanh_bacsi']?>" alt="Avatar" class="avata">
										<div class="overlay">
										    <div class="information">
												<p><span class="glyphicon glyphicon-briefcase"></span> <?php echo $row_bacsitimkiem['hocvi']?></p>
                                                <?php
                                                $chuyenkhoa_theobacsi=DanhSachChuyenKhoa_TheoBacSi($id_bacsi);
												
												?>
												<p><span class="glyphicon glyphicon-education"></span> <?php while($row_chuyenkhoatheobacsi=mysql_fetch_array($chuyenkhoa_theobacsi))
												{ echo $row_chuyenkhoatheobacsi['ten_chuyenkhoa'].", "; } ?></p>
												<p><span class="glyphicon glyphicon-tag"></span> <?php echo $row_bacsitimkiem['noilamviec']?></p>
												<p><span class="glyphicon glyphicon-list"></span> <?php echo $row_bacsitimkiem['diachi_bacsi']?></p>
												<p><span class="glyphicon glyphicon-earphone"></span> <?php echo "+84 ".$row_bacsitimkiem['dienthoai_bacsi']?></p>
										    </div>
										</div>
									</div>
									<a href="doctor.php?p=chitietbacsi&id_bacsi=<?php echo $row_bacsi['id_bacsi']?>" class="doctor-name"><h4><span class="glyphicon glyphicon-user"></span> Bác sĩ: <?php echo $row_bacsitimkiem['ten_bacsi']?></h4></a>
									<a class="btn btn-primary doctor-link"  href="doctor.php?p=chitietbacsi&id_bacsi=<?php echo $row_bacsitimkiem['id_bacsi']?>">Xem thông tin <span class="glyphicon glyphicon-share"></span></a>
								</div>
					        </div>
                            <?php
							}
							}
							else
							{
								echo '<script language="javascript">alert("Không tìm thấy dữ liệu ! "); window.location="doctor.php"</script>';
								}
							?>
                            
						</div>
					</div>

					<div>
						<div class="pagination">
						  	<a href="#">&laquo;</a>
						  	<a href="#">1</a>
						  	<a class="active" href="#">2</a>
						  	<a href="#">3</a>
						  	<a href="#">4</a>
						  	<a href="#">5</a>
						  	<a href="#">6</a>
						  	<a href="#">&raquo;</a>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="news-menu">
						<div class="card-menu">
							<div class="header-menu"><p>CHUYÊN KHOA</p></div>
							<ul>
                            <?php
							$chuyenkhoa=DanhSachChuyenKhoa();
							while($row_chuyenkhoa=mysql_fetch_array($chuyenkhoa))
							{
							?>
								<li>
									<div class="row">
										<div class="col-md-2">
											<img src="images/edu.png">
										</div>
										<div class="col-md-10">
											<a href="doctor.php?p=bacsichuyenkhoa&id_chuyenkhoa=<?php echo $row_chuyenkhoa['id_chuyenkhoa']?>"><h4><?php echo $row_chuyenkhoa['ten_chuyenkhoa']?></h4></a>
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