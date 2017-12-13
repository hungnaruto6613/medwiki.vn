						<?php
						$tukhoa=$_GET["q"];
						$kiemtra=mysql_num_rows(TimKiemBenh($tukhoa));
						if($kiemtra!=0)
						{
						$timkiembenh=TimKiemBenh($tukhoa);
                        /*$tennhombenh=TenNhomBenh_TheoIdNhomBenh($id_nhombenh);
						$row_tennhombenh=mysql_fetch_array($tennhombenh);*/
						?>		
                        <div class="list">						
							<div>
								<div class="row">
									<div class="col-md-12">
										<h4>Nội Dung Tìm Kiếm</h4>
									</div>
								</div>
								<div class="row">
                                    <?php
									//$dsbenhtrongnhombenh = DanhSachBenh_TheoNhomBenh($id_nhombenh);
									while($row_dsbenhtrongnhombenh=mysql_fetch_array($timkiembenh)){
                                    ?>
									<div class="col-md-4">
										<ul>
											<li><a href="diseases-detail.php?p=chitietbenh&id_benh=<?php echo $row_dsbenhtrongnhombenh['id_benh']?>"><?php echo $row_dsbenhtrongnhombenh['ten_benh']; ?></a></li>
										</ul>
									</div>
                                    <?php
									}
                                    ?>
									<div class="col-md-12">
										<a href="" class="link pull-right"> <span class="glyphicon glyphicon-transfer"></span> Xem tất cả</a>
									</div>
								</div>
							</div>
						</div>
                        <?php 
						}
						else{
							echo '<script language="javascript">alert("Không tìm thấy dữ liệu ! "); window.location="diseases.php"</script>';
							}
						?>