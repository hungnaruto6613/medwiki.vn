	<div class="content">
		<div class="container">
			<div class="row">
            	<?php 
				if(isset($_GET["id_bacsi"]))
				{
					$id_bacsi=$_GET["id_bacsi"];
					settype($id_bacsi,"int");
				}else{
					$id_bacsi=1;
				}
				?>
               	<?php
					$chitietbacsi = ChiTietBacSi($id_bacsi);
					$row_chitietbacsi = mysql_fetch_array($chitietbacsi);
				?>
				<div class="col-md-4">
					<div class="left-bar">
						<img src="images/bacsi/<?php echo $row_chitietbacsi['hinhanh_bacsi']?>" class="avata">
						<a href=""><h4><span class="glyphicon glyphicon-user" ></span> Bác sĩ: <?php echo $row_chitietbacsi['ten_bacsi']?></h4></a>
						<div class="infor">
							<p><b><span class="glyphicon glyphicon-briefcase"></span> Học vị: </b> <?php echo $row_chitietbacsi['hocvi']?></p>
							<p><b><span class="glyphicon glyphicon-map-marker"></span> Địa chỉ: </b>  <?php echo $row_chitietbacsi['diachi_bacsi']?></p>
							<p><b><span class="glyphicon glyphicon-earphone"></span> Điện thoại: </b> <?php echo $row_chitietbacsi['dienthoai_bacsi']?></p> 
							<p><b><span class="glyphicon glyphicon-list"></span> Nơi làm việc:</b> <?php echo $row_chitietbacsi['noilamviec']?></p> 
						</div>
					</div>
				</div>
				<div class="col-md-8 ">
					<div class="right-content">
						<div class="row">
							<div class="col-md-12">
								<h4><span class="glyphicon glyphicon-user"></span>  Giới thiệu</h4>
								<p>
									<?php echo $row_chitietbacsi['gioithieu']?>
								</p>							
							</div>
						</div>
					</div>
					<div class="right-content">
						<div class="row">
							<div class="col-md-12">
								<h4><span class="glyphicon glyphicon-book"></span>  Kinh nghiệm</h4>
								<p>
									<?php echo $row_chitietbacsi['kinhnghiem']?>
								</p>
							</div>
						</div>
					</div>
					<div class="right-content">
						<div class="row">
							<div class="col-md-12">
								<h4><span class="glyphicon glyphicon-list"></span>  Chuyên khoa</h4>
								<ul>
                                	<?php
                                    $chuyenkhoa_theobacsi=DanhSachChuyenKhoa_TheoBacSi($id_bacsi);
									while($row_chuyenkhoatheobacsi=mysql_fetch_array($chuyenkhoa_theobacsi))
									{			
									?>
									<li class="col-md-4"><a href=""><?php echo $row_chuyenkhoatheobacsi['ten_chuyenkhoa']?></a></li>
									<?php 
									}
									?>
								</ul>
							</div>
                             <div style="float:left; margin-left:10px;" class="fb-like" data-href="https://www.facebook.com/medwiki.vn/" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
						</div>
					</div>
				</div>
			</div>


			<!--tu van truc tuyen-->
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
		    <!--end tu van truc tuyen-->
		</div>

	</div>