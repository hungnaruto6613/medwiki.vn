<?php

$status = stripcslashes(($_POST['status']));
$posterid = stripcslashes(($_POST['posterid']));
$idnhombenh = stripcslashes(($_POST['nid']));
include("lib/connection.php");
include("timestamp.php");

$time = time();

//insert
mysql_query("INSERT INTO hoidap (id_hoidap, noidung_hoidap, id_nguoidung, thoigian_hoidap, id_nhombenh) VALUES ('',N'$status','$posterid', '$time','$idnhombenh')");

$fetch = mysql_query("SELECT * FROM nguoidung WHERE id_nguoidung='$posterid' ");
$fetch2 = mysql_fetch_assoc($fetch);
$username = $fetch2['ten_nguoidung'];
$loai = $fetch2['id_loainguoidung'];

$get = mysql_query("SELECT * FROM hoidap WHERE id_nguoidung='$posterid' AND thoigian_hoidap ='$time'");
$get2 = mysql_fetch_assoc($get);
$statusid = $get2['id_hoidap'];
echo "
<div id=\"status-$statusid\" class=\"status\">
	<div class=\"topstatus\">
		<div id=\"statuspic-$statusid\" class=\"statuspic-box\">
			<img src=\"images/avata.jpg\" class=\"img-circle statuspic\">
		</div>
		<div id=\"statusinfo-$statusid\" class=\"statusinfo\">
			<div id=\"statusname-$statusid\" class=\"statusname\"> $username";
			if($loai == 1)
			{
				echo "<button  class=\"role btn btn-info\">Admin</button>";
			}
			if($loai == 2)
			{
				echo "<button  class=\"role btn btn-warning\">Doctor</button>";
			}
			echo "</div>
			<div id=\"statustext-$statusid\" class=\"statustext\"> $status</div>
			<form action=\"\" onsubmit=\"return false\" style=\"display:none;\" id=\"editsform-$statusid\">
				<textarea id=\"statusedit-$statusid\" class=\"form-control\"></textarea>
				<button id=\"postedits-$statusid\" style=\"float:right; padding:4px 12px; font-size:13px; margin: 4px;\" class=\"btn btn-success\">Chỉnh sửa xong</button>
				<button id=\"cancleedits-$statusid\" style=\"float:right; padding:4px 12px; font-size:13px; margin: 4px;\" class=\"btn btn-success\">Hủy</button>
			</form>
		</div>
		<div id=\"statusmenu-$statusid\" class=\"statusmenu\">
			<div class=\"dropdown\">
			    <button class=\"drop\" type=\"button\" data-toggle=\"dropdown\">&middot&middot&middot</button>
			    <ul class=\"dropdown-menu\">
			      	<li><button id=\"statusdel-$statusid\">Xóa bài viết</button></li>
			      	<li><button id=\"statusedit-$statusid\">Chỉnh sửa bài viết</button></li>
			    </ul>
			  </div>
		</div>
		<script type=\"text/javascript\">
			$(document).ready(function() {
				$(\"button#statusdel-$statusid\").click(function(){
					if (confirm(\"Bạn có chắc chắn muốn xóa bài viết này không?\") == true) {
						var statusid = $statusid;
						var data = 'statusid='+statusid;
						$.ajax({
							type: \"POST\",
							url: \"deletestatus.php\",
							data: data,
							success: function(data){
								alert(\"Xóa bài viết thành công!\");
								$(\"button#group-$idnhombenh\").click(); 
							}
						});
					} else {
					}
				});
				$(\"button#statusedit-$statusid\").click(function(){
					var ax = document.getElementById(\"statustext-$statusid\");
					$(\"#statusedit-$statusid\").val(ax.innerText);
					$(\"#statustext-$statusid\").hide();
					$(\"#editsform-$statusid\").show();
				});
				$(\"button#cancleedits-$statusid\").click(function(){
					$(\"#statustext-$statusid\").show();
					$(\"#editsform-$statusid\").hide();
				});
				$(\"button#postedits-$statusid\").click(function(){
					var as = $(\"textarea#statusedit-$statusid\").val();
					if(as!=\"$status\" && $(\"textarea#statusedit-$statusid\").val())
					{
						var edits = $(\"textarea#statusedit-$statusid\").val();
						var statusid = $statusid;
						var data = 'edits='+edits+'&statusid='+statusid;
						$.ajax({
							type: \"POST\",
							url: \"editstatus.php\",
							data: data,
							success: function(data){
								$(\"#statustext-$statusid\").html(data);
								$(\"#statustext-$statusid\").show(data);
							}
						});
						$(\"#statustext-$statusid\").show();
						$(\"#editsform-$statusid\").hide();
					}
					else
					{
						alert(\"Có lỗi xảy ra! Thay đổi của bạn không được lưu!\");
					}
				});
			});

		</script>

	</div>
	<div id=\"statusoptions-$statusid\" class=\"statusoptions\">
		<button id=\"unlikestatus-$statusid\" class=\"like\" style=\"display:none;\"><i class=\"fa fa-heartbeat\" aria-hidden=\"true\"></i> Hủy quan tâm</button>
		<button id=\"unlikestatusdummy-$statusid\" class=\"like\" style=\"display:none;\"><i class=\"fa fa-heartbeat\" aria-hidden=\"true\"></i> Hủy quan tâm</button>
		<button id=\"likestatusdummy-$statusid\" class=\"like\" style=\"display:none;\"><i class=\"fa fa-heart-o\" aria-hidden=\"true\"></i> Quan tâm</button>
		<button id=\"likestatus-$statusid\" class=\"like\" ><i class=\"fa fa-heart-o\" aria-hidden=\"true\"></i> Quan tâm</button>
		<button id=\"commentstatus-$statusid\" class=\"like\"\"><i class=\"fa fa-comment-o\" aria-hidden=\"true\"></i> Bình luận</button>
		<button id=\"sharestatus-$statusid\" class=\"like\"><i class=\"fa fa-share-alt\" aria-hidden=\"true\"></i> Chia sẻ</button>
		<button id=\"statustime-$statusid\" class=\"time\">";
		echo time_stamp($time);
		echo "</button>
	</div>";
	echo "
	<div id=\"likes-$statusid\" class=\"likes\" style=\"display:none;\"></div>
	<div id=\"allcomments-$statusid\" class=\"allcomments\">
	<div id=\"commentpost-$statusid\" class=\"commentpost\">
		<form action=\"\" onsubmit=\"return false\" style=\"position: relative;\">
			<textarea id=\"comment-$statusid\" class=\"comment-input form-control\"></textarea>
			<button id=\"postcomment-$statusid\" class=\"postcomment btn btn-success\">Gửi</button>
		</form>
	</div>
</div>
<script type=\"text/javascript\">
	$(document).ready(function() {
		$(\"button#commentstatus-$statusid\").click(function() {
			$(\"#commentpost-$statusid\").show();
		});
		$(\"button#postcomment-$statusid\").click(function(){
			if($(\"textarea#comment-$statusid\").val())
			{
				var comment = $(\"textarea#comment-$statusid\").val();
				var commenterid = $posterid;
				var statusid = $statusid;
				var data = 'comment='+comment+'&commenterid='+commenterid+'&statusid='+statusid;
				$.ajax({
					type: \"POST\",
					url: \"insertcomment.php\",
					data: data,
					success: function(data){
						$(\"textarea#comment-$statusid\").val('');
						$(\"#allcomments-$statusid\").append(data);
					}
				});
			}
			else
			{
				alert(\"Có lỗi xảy ra, bình luận cần ít nhất 1 kí tự!\");
			}
		});
		$(\"button#likestatus-$statusid\").click(function() {
			$(\"button#likestatus-$statusid\").hide();
			$(\"button#unlikestatusdummy-$statusid\").show();
			var statusid = $statusid;
			var likerid = $posterid;
			var data = 'statusid='+statusid+'&likerid='+likerid;
			$.ajax({
				type: \"POST\",
				url: \"statuslike.php\",
				data: data,
				success: function(data){
					if(data==\"error\")
					{
						$(\"button#unlikestatusdummy-$statusid\").hide();
						$(\"button#likestatus-$statusid\").show();
					}
					$(\"button#unlikestatusdummy-$statusid\").hide();
					$(\"button#unlikestatus-$statusid\").show();
					$(\"button#unlikestatus-$statusid\").css(\"color\", \"#e34554\");
					$(\"#likes-$statusid\").show(data);
					$(\"#likes-$statusid\").html(data);
				}
			});
		});
		$(\"button#unlikestatus-$statusid\").click(function() {
			$(\"button#unlikestatus-$statusid\").hide();
			$(\"button#likestatusdummy-$statusid\").show();
			var statusid = $statusid;
			var unlikerid = $posterid;
			var data = 'statusid='+statusid+'&unlikerid='+unlikerid;
			$.ajax({
				type: \"POST\",
				url: \"unlikestatus.php\",
				data: data,
				success: function(data){
					if(data==\"error\")
					{
						$(\"button#likestatusdummy-$statusid\").hide();
						$(\"button#unlikestatus-$statusid\").show();
					}
					$(\"button#likestatusdummy-$statusid\").hide();
					$(\"button#likestatus-$statusid\").show();
					$(\"#likes-$statusid\").show(data);
					$(\"#likes-$statusid\").html(data);
				}
			});
		});
	});
</script>
";

?>