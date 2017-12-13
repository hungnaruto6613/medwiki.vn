<?php
//get id loaitin
$id_loaitintuc=$_GET["id_loaitintuc"];
settype($id_loaitintuc,"int");
?>
<div class="content">
		<div class="container">
			<div class="">
            <?php 
			$tenloaitin=TenLoaiTin($id_loaitintuc);
			$row_tenloaitin=mysql_fetch_array($tenloaitin);
			?>
				<div class="news-bar">
					<div class="row" >
						<div class="col-md-12">
							<a href=""><h4 class=""><span class="glyphicon glyphicon-pencil"></span> <?php echo $row_tenloaitin['ten_loaitintuc']?></h4></a>
						</div>
					</div>
				</div>
				<div class="news">
					<div class="row">
                    	<div class="col-md-8">
                        <?php
                    		$timmoinhat_theoloai_mottin=TinMoiNhat_TheoLoai_MotTin($id_loaitintuc);
							$row_tinmoinhat_theoloai_mottin=mysql_fetch_array($timmoinhat_theoloai_mottin);
						?>
							<div class="card">
								<img src="images/tintuc/<?php echo $row_tinmoinhat_theoloai_mottin['hinhanh']?>">
								<div class="">
							        <a href="news-detail.php?p=chitiettin&idtintuc=<?php echo $row_tinmoinhat_theoloai_mottin['id_tintuc']?>"><h4><?php echo $row_tinmoinhat_theoloai_mottin['tieude_tintuc']?></h4></a>
							        <p><?php echo $row_tinmoinhat_theoloai_mottin['tomtat_tintuc']?></p>
							        <a href="news-detail.php?p=chitiettin&idtintuc=<?php echo $row_tinmoinhat_theoloai_mottin['id_tintuc']?>" class="more">Xem thêm</a>
							    </div>
							</div>
						</div>
                        <!--danhmuc tintuc-->
                        <?php require "block/danhmuctintuc.php";?>
					</div>
					<div class="row">
                    	<?php
						$sotinmottrang=9;
						if(isset($_GET["trang"]))
						{
							$trang=$_GET["trang"];
							settype($trang,"int");
						}
						else{
							$trang=1;
						}
						$from=($trang-(($sotinmottrang-1)/$sotinmottrang))*$sotinmottrang;
                    	$tintheoloaitin_phantrang=TinTheoLoaiTin_PhanTrang($id_loaitintuc,$from,$sotinmottrang);
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
						?>
					</div>
				</div>
                <style>
				#phantrang{text-align:center;}
				#phantrang a {background-color:#0CF; color:#F00; padding:5px; margin-right:3px;}
				#phantrang a:hover{background-color:#FF0;}
				</style>
				<div id="phantrang">
                <?php 
				$tintheoloaitin=TinTheoLoaiTin($id_loaitintuc);
				$tongsotin=mysql_num_rows($tintheoloaitin);
				$tongsotrang=ceil($tongsotin/$sotinmottrang);
				for($i=1;$i<=$tongsotrang;$i++)
				{	
				?>
                <a <?php if($i==$trang) echo "style='background-color:yellow' "?> href="news.php?p=trangtintheoloaitin&id_loaitintuc=<?php echo $id_loaitintuc ?>&trang=<?php echo $i?>"><?php echo $i?></a>
                <?php 
				}
				?>
				</div>
			</div>
			<!--tu van truc tuyen-->
			<?php 
			require "block/tuvantructuyen.php";
			?>
		</div>
	</div>