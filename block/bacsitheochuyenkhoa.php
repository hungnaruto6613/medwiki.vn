<?php 
$id_chuyenkhoa=$_GET["id_chuyenkhoa"];
settype($id_chuyenkhoa,"int");
?>			
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
                            $bacsichuyenkhoa=DanhSachBacSi_TheoChuyenKhoa($id_chuyenkhoa);
							while($row_bacsichuyenkhoa=mysql_fetch_array($bacsichuyenkhoa))
							{
								$id_bacsi=$row_bacsichuyenkhoa['id_bacsi'];
							?>
                            <div class="col-lg-4 col-sm-6">
								<div class="card">
									<div class="wraper-avata">
										<img src="images/bacsi/<?php echo $row_bacsichuyenkhoa['hinhanh_bacsi']?>" alt="Avatar" class="avata">
										<div class="overlay">
										    <div class="information">
												<p><span class="glyphicon glyphicon-briefcase"></span> <?php echo $row_bacsichuyenkhoa['hocvi']?></p>
                                                <?php
                                                $chuyenkhoa_theobacsi=DanhSachChuyenKhoa_TheoBacSi($id_bacsi);
												?>
												<p><span class="glyphicon glyphicon-education"></span> <?php while($row_chuyenkhoatheobacsi=mysql_fetch_array($chuyenkhoa_theobacsi))
												{ echo $row_chuyenkhoatheobacsi['ten_chuyenkhoa'].", "; } ?></p>
												<p><span class="glyphicon glyphicon-tag"></span> <?php echo $row_bacsichuyenkhoa['noilamviec']?></p>
												<p><span class="glyphicon glyphicon-list"></span> <?php echo $row_bacsichuyenkhoa['diachi_bacsi']?></p>
												<p><span class="glyphicon glyphicon-earphone"></span> <?php echo " +84.".$row_bacsichuyenkhoa['dienthoai_bacsi']?></p>
										    </div>
										</div>
									</div>
										<a href="doctor.php?p=chitietbacsi&id_bacsi=<?php echo $row_bacsi['id_bacsi']?>" class="doctor-name"><h4><span class="glyphicon glyphicon-user"></span> Bác sĩ: <?php echo $row_bacsichuyenkhoa['ten_bacsi']?></h4></a>
									
									<a class="btn btn-primary doctor-link"  href="doctor.php?p=chitietbacsi&id_bacsi=<?php echo $row_bacsichuyenkhoa['id_bacsi']?>">Xem thông tin <span class="glyphicon glyphicon-share"></span></a>
								</div>
					        </div>
                            <?php
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

			<!--tu van truc tuyen-->
            <?php 
			require "block/tuvantructuyen.php";
			?>
			<!--<div class="row chat-window col-xs-5 col-md-4" id="chat_window_1" style="margin-left:10px;">
		        <div class="col-xs-12 col-md-12">
		        	<div class="panel panel-default">
		                <div class="panel-heading top-bar">
		                    <div class="col-md-8 col-xs-8">
		                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Tư vấn trực tuyến</h3>
		                    </div>
		                    <div class="col-md-4 col-xs-4" style="text-align: right;">
		                        <a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
		                        <a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>
		                    </div>
		                </div>
		                <div class="panel-body msg_container_base">
		                    
		                    <div class="row msg_container base_receive">
		                        <div class="col-md-2 col-xs-2 avatar">
		                            <img src="images/avata.jpg" class=" img-circle ">
		                        </div>
		                        <div class="col-xs-10 col-md-10">
		                            <div class="messages msg_receive">
		                            	<h5 style="text-align: left;"><b>MedWiki Bot</b></h5>
		                                <p>Chào mừng bạn đến với MedWiki, vui lòng nhập câu hỏi bạn muốn tư vấn tại đây.</p>
		                                <time datetime="2009-11-13T20:00">51 min</time>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="row msg_container base_sent">
		                        <div class="col-md-10 col-xs-10">
		                            <div class="messages msg_sent">
		                            	<h5 style="text-align: right;"><b>Tôi</b></h5>
		                                <p>Xin chào</p>
		                               	<time datetime="2009-11-13T20:00">51 phút</time>
		                            </div>
		                        </div>
		                        <div class="col-md-2 col-xs-2 avatar">
		                            <img src="images/avata.jpg" class=" img-circle ">
		                        </div>
		                    </div>
		                </div>
		                <div class="panel-footer">
		                    <div class="input-group">
		                        <input id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Nhập tin nhắn ở đây..." />
		                        <span class="input-group-btn">
		                        <button class="btn btn-primary btn-sm" id="btn-chat">Gửi</button>
		                        </span>
		                    </div>
		                </div>
		    		</div>
		        </div>
		    </div>-->