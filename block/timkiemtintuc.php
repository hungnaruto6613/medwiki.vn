
	<div class="content">
		<div class="container">
			<div class="">
				<div class="news-bar">
					<div class="row" >
						<div class="col-md-12">
							<a href=""><h4 class=""><span class="glyphicon glyphicon-pencil"></span> Nội Dung Tìm Kiếm</h4></a>
						</div>
					</div>
				</div>
				<div class="news">
                	<div class="row">
                    	<?php
						$tukhoa=$_GET["q"];
						$kiemtra=mysql_num_rows(TimKiemTinTuc($tukhoa));
						if($kiemtra!=0)
						{
                    	$tintheoloaitin_phantrang=TimKiemTinTuc($tukhoa);
						while($row_tintheoloaitin_phantrang=mysql_fetch_array($tintheoloaitin_phantrang))
						{
						?>
						<div class="col-md-4">
							<div class="card-mini">
								<img src="images/tintuc/<?php echo $row_tintheoloaitin_phantrang['hinhanh']?>">
								<div class="">
							        <a href="news-detail.php?p=chitiettintuc&idtintuc=<?php echo $row_tintheoloaitin_phantrang['id_tintuc']?>"><h4><?php echo $row_tintheoloaitin_phantrang['tieude_tintuc']?></h4></a>
							        <p><?php echo substr($row_tintheoloaitin_phantrang['tomtat_tintuc'],0,265)?></p>
							        <a href="news-detail.php?p=chitiettintuc&idtintuc=<?php echo $row_tintheoloaitin_phantrang['id_tintuc']?>" class="more">Xem thêm</a>
							    </div>
							</div>
						</div>
						<?php
						}
						}
						else{
							echo '<script language="javascript">alert("Không tìm thấy dữ liệu ! "); window.location="news.php"</script>';
							}
						?>
                        <!--danhmuc tintuc-->
                        <?php //require "block/danhmuctintuc.php";?>
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