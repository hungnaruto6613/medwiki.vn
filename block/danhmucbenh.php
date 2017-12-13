					<div class="col-md-3">
						<div class="news-menu">
							<div class="card-menu">
								<div class="header-menu"><h4>DANH MỤC BỆNH</h4></div>
								<ul>
                                <?php
								$danhsachnhombenh=DanhSachNhomBenh();
								while($row_danhsachnhombenh=mysql_fetch_array($danhsachnhombenh)){
                                ?>
									<li><a href="diseases.php?p=danhsachbenh&id_nhombenh=<?php echo $row_danhsachnhombenh['id_nhombenh']?>"><?php echo $row_danhsachnhombenh['ten_nhombenh']?></a></li>
								<?php
								}
								?>	
								</ul>
							</div>
						</div>
					</div>