<div class="content">
		<div class="container">
			<div class="">
				<div class="news-bar">
					<div class="row" >
						<div class="col-md-12">
							<a href=""><h4 class=""><span class="glyphicon glyphicon-pencil"></span> Tin mới</h4></a>
						</div>
					</div>
				</div>
				<div class="news">
					<div class="row">
						<div class="col-md-8">
                        <?php
                    		$timmoinhat_mottin=TinMoiNhat_MotTin();
							$row_tinmoinhat_mottin=mysql_fetch_array($timmoinhat_mottin);
						?>
							<div class="card">
								<img src="images/tintuc/<?php echo $row_tinmoinhat_mottin['hinhanh']?>">
								<div class="">
							        <a href="news-detail.php?p=chitiettin&idtintuc=<?php echo $row_tinmoinhat_mottin['id_tintuc']?>"><h4><?php echo $row_tinmoinhat_mottin['tieude_tintuc']?></h4></a>
							        <p><?php echo $row_tinmoinhat_mottin['tomtat_tintuc']?></p>
							        <a href="news-detail.php" class="more">Xem thêm</a>
							    </div>
							</div>
						</div>
						<!--danhmuc tintuc-->
                        <?php require "block/danhmuctintuc.php";?>
					</div>
					<div class="row">
                    	<?php
                    	$batinmoi=TinMoiNhat_BaTin();
						while($row_batinmoi=mysql_fetch_array($batinmoi))
						{
						?>
						<div class="col-md-4">
							<div class="card-mini">
								<img src="images/tintuc/<?php echo $row_batinmoi['hinhanh']?>">
								<div class="">
							        <a href="news-detail.php?p=chitiettintuc&idtintuc=<?php echo $row_batinmoi['id_tintuc']?>"><h4><?php echo $row_batinmoi['tieude_tintuc']?></h4></a>
							        <p><?php echo substr($row_batinmoi['tomtat_tintuc'],0,260)."....."?></p>
							        <a href="news-detail.php?p=chitiettintuc&idtintuc=<?php echo $row_batinmoi['id_tintuc']?>" class="more">Xem thêm</a>
							    </div>
							</div>
						</div>
						<?php
						}
						?>
					</div>
				</div>
			</div>
            <!--tin noi bat-->
            <div class="">
				<div class="news-bar">
					<div class="row" >
						<div class="col-md-12">
							<a href=""><h4 class=""><span class="glyphicon glyphicon-pencil"></span> Tin Nổi Bật</h4></a>
						</div>
					</div>
				</div>
				<div class="news">
					<div class="row">
						<div class="col-md-8">
                        <?php
                    		$timmoinhat_mottin=TinNoiBat_MotTin();
							$row_tinmoinhat_mottin=mysql_fetch_array($timmoinhat_mottin);
						?>
							<div class="card">
								<img src="images/tintuc/<?php echo $row_tinmoinhat_mottin['hinhanh']?>">
								<div class="">
							        <a href="news-detail.php?p=chitiettin&idtintuc=<?php echo $row_tinmoinhat_mottin['id_tintuc']?>"><h4><?php echo $row_tinmoinhat_mottin['tieude_tintuc']?></h4></a>
							        <p><?php echo $row_tinmoinhat_mottin['tomtat_tintuc']?></p>
							        <a href="news-detail.php" class="more">Xem thêm</a>
							    </div>
							</div>
						</div>
                        <?php 
						$tinnoibatthuhai=TinNoiBat_TinThuHai();
						$row_tinnoibatthuhai=mysql_fetch_array($tinnoibatthuhai);
						?>
						<div class="col-md-4">
							<div class="card-mini">
								<img src="images/tintuc/<?php echo $row_tinnoibatthuhai['hinhanh']?>">
								<div class="">
							        <a href="news-detail.php?p=chitiettintuc&idtintuc=<?php echo $row_tinnoibatthuhai['id_tintuc']?>"><h4><?php echo $row_tinnoibatthuhai['tieude_tintuc']?></h4></a>
							        <p><?php echo substr($row_tinnoibatthuhai['tomtat_tintuc'],0,260)."....";?></p>
							        <a href="news-detail.php?p=chitiettintuc&idtintuc=<?php echo $row_tinnoibatthuhai['id_tintuc']?>" class="more">Xem thêm</a>
							    </div>
							</div>
						</div>
						<!--danhmuc tintuc-->
                        <?php //require "block/danhmuctintuc.php";?>
					</div>
					<div class="row">
                    	<?php
                    	$batinmoi=TinNoiBat_BaTin();
						while($row_batinmoi=mysql_fetch_array($batinmoi))
						{
						?>
						<div class="col-md-4">
							<div class="card-mini">
								<img src="images/tintuc/<?php echo $row_batinmoi['hinhanh']?>">
								<div class="">
							        <a href="news-detail.php?p=chitiettintuc&idtintuc=<?php echo $row_batinmoi['id_tintuc']?>"><h4><?php echo $row_batinmoi['tieude_tintuc']?></h4></a>
							        <p><?php echo substr($row_batinmoi['tomtat_tintuc'],0,260)."...."?></p>
							        <a href="news-detail.php?p=chitiettintuc&idtintuc=<?php echo $row_batinmoi['id_tintuc']?>" class="more">Xem thêm</a>
							    </div>
							</div>
						</div>
						<?php
						}
						?>
					</div>
				</div>
			</div>
            <!--tin theo loai-->
            <?php
			$danhsachloaitintuc=DanhSanhLoaiTin();
            while($row_danhsachloaitintuc=mysql_fetch_array($danhsachloaitintuc))
			{
				$id_loaitintuc=$row_danhsachloaitintuc['id_loaitintuc']
			?>
			<div class="">
				<div class="news-bar">
					<div class="row" >
						<div class="col-md-12">
							<a href=""><h4 class=""><span class="glyphicon glyphicon-pencil"></span> <?php echo $row_danhsachloaitintuc['ten_loaitintuc']?></h4></a>
						</div>
					</div>
				</div>
				<div class="news">
					<div class="row">
                    <?php 
					$tinmoibentrai=TinMoiNhat_TheoLoaiTin_MotTin($id_loaitintuc);
					$row_tinmoibentrai=mysql_fetch_array($tinmoibentrai);
					?>
						<div class="col-md-8">
							<div class="card">
								<img src="images/tintuc/<?php echo $row_tinmoibentrai['hinhanh'];?>">
								<div class="">
							        <a href="news-detail.php?p=chitiettintuc&idtintuc=<?php echo $row_tinmoibentrai['id_tintuc']?>"><h4><?php echo $row_tinmoibentrai['tieude_tintuc']?></h4></a>
							        <p><?php echo substr($row_tinmoibentrai['tomtat_tintuc'],0,260)."....";?></p>
							        <a href="news-detail.php?p=chitiettintuc&idtintuc=<?php echo $row_tinmoibentrai['id_tintuc']?>" class="more">Xem thêm</a>
							    </div>
							</div>
						</div>
                        <?php 
						$tinthuhaibenphai=TinMoiNhat_TheoLoaiTin_TinThuHai($id_loaitintuc);
						$row_tinthuhaibenphai=mysql_fetch_array($tinthuhaibenphai);
						?>
						<div class="col-md-4">
							<div class="card-mini">
								<img src="images/tintuc/<?php echo $row_tinthuhaibenphai['hinhanh']?>">
								<div class="">
							        <a href="news-detail.php?p=chitiettintuc&idtintuc=<?php echo $row_tinthuhaibenphai['id_tintuc']?>"><h4><?php echo $row_tinthuhaibenphai['tieude_tintuc']?></h4></a>
							        <p><?php echo substr($row_tinthuhaibenphai['tomtat_tintuc'],0,260)."....";?></p>
							        <a href="news-detail.php?p=chitiettintuc&idtintuc=<?php echo $row_tinthuhaibenphai['id_tintuc']?>" class="more">Xem thêm</a>
							    </div>
							</div>
						</div>
					</div>
					<div class="row">
                    <?php 
					$tinmoibatin_theoloaitin=TinMoiNhat_TheoLoaiTin_BaTin($id_loaitintuc);
					while($row_tinmoibatin_theoloaitin=mysql_fetch_array($tinmoibatin_theoloaitin))
					{
					?>
						<div class="col-md-4">
							<div class="card-mini">
								<img src="images/tintuc/<?php echo $row_tinmoibatin_theoloaitin['hinhanh']?>">
								<div class="">
							        <a href="news-detail.php?p=chitiettintuc&idtintuc=<?php echo $row_tinmoibatin_theoloaitin['id_tintuc']?>"><h4><?php echo $row_tinmoibatin_theoloaitin['tieude_tintuc']?></h4></a>
							        <p><?php echo substr($row_tinmoibatin_theoloaitin['tomtat_tintuc'],0,260)."....";?></p>
							        <a href="news-detail.php?p=chitiettintuc&idtintuc=<?php echo $row_tinmoibatin_theoloaitin['id_tintuc']?>" class="more">Xem thêm</a>
							    </div>
							</div>
						</div>
					<?php
					}
					?>	
					</div>
				</div>
			</div>
            <?php 
			}
			?>
			<!--tuvantructuyen-->
			<?php 
			require "block/tuvantructuyen.php";
			?>
		</div>
	</div>