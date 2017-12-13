<li class="dropdown profile">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span></span></a>
	<ul class="dropdown-menu">
		<li class="avatar"><img class="img-thumbnail avatar-image center-block" src="images/avata.jpg">
		</li>
		<li><p>Xin chào <?php echo $_SESSION["ten_nguoidung"];?></p></li>
		<li><a href=""><span class="glyphicon glyphicon-pencil"></span> Thay đổi avatar</a></li>
		<li><a href=""><span class="glyphicon glyphicon-paperclip"></span> Cập nhật thông tin cá nhân</a></li>
        <li><a href="" class="overlayLink" data-action="login-form.html"><span class="glyphicon glyphicon-pencil"></span> Thay đổi mật khẩu</a></li>
		<li <?php if($_SESSION["id_loainguoidung"]!=1) echo "style='display:none'"?> ><a href="manage_news.php" ><span class="glyphicon glyphicon-random"></span> Chuyển tới trang quản lý (admin)</a></li>
		<li <?php if($_SESSION["id_loainguoidung"]!=2) echo "style='display:none'"?> ><a  href="manage_news.php"><span class="glyphicon glyphicon-random"></span> Chuyển tới trang quản lý (doctor)</a></li>
	</ul>
</li>