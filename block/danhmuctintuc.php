						<div class="col-md-4 right-with-menu">
							<div class="news-menu">
								<div class="card-menu">
									<div class="header-menu"><p>TIN TỨC</p></div>
                                    <ul>
             						<?php
									$loaitintuc=DanhSanhLoaiTin();
									while($row_loaitintuc=mysql_fetch_array($loaitintuc))
									{ 
									?>
										<li>
											<div class="row">
												<div class="col-md-2">
													<img src="images/news.png">
												</div>
												<div class="col-md-10">
													<a href="news.php?p=trangtintheoloaitin&id_loaitintuc=<?php echo $row_loaitintuc['id_loaitintuc']?>"><h4><?php echo $row_loaitintuc['ten_loaitintuc']?></h4></a>
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