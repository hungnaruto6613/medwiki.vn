						<div class="list">	
                        <?php 
						$dsnhombenh=DanhSachNhomBenh();
						while($rowdsnhombenh=mysql_fetch_array($dsnhombenh))
						{
							$id_nhombenh=$rowdsnhombenh['id_nhombenh'];
						?>					
							<div>
								<div class="row">
									<div class="col-md-12">
										<h4><?php echo $rowdsnhombenh['ten_nhombenh'];?></h4>
									</div>
								</div>
								<div class="row">
                                	<?php 
									$dsbenhtrongnhombenh = DanhSachBenh_TheoNhomBenh($id_nhombenh);
									while($row_dsbenhtrongnhombenh=mysql_fetch_array($dsbenhtrongnhombenh))
									{
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
                            <?php
                            }
							?>
						</div>