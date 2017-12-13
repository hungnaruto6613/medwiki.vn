<?php
$comment = stripcslashes(($_POST['comment']));
$commenterid = stripcslashes(($_POST['commenterid']));
$statusid = stripcslashes(($_POST['statusid']));
$time = time();
include('lib/connection.php');
include('timestamp.php');

mysql_query("INSERT INTO binhluan_hoidap (id_binhluan_hoidap,noidung_binhluan_hoidap, id_nguoidung, id_hoidap, thoigian_binhluan_hoidap) VALUES ('',N'$comment','$commenterid','$statusid','$time') ");
$get = mysql_query("SELECT * FROM binhluan_hoidap WHERE thoigian_binhluan_hoidap='$time' AND id_nguoidung='$commenterid' AND id_hoidap='$statusid'   ");
$get2 = mysql_fetch_assoc($get);

$id = $get2['id_binhluan_hoidap'];
$get3 = mysql_query("SELECT * FROM nguoidung WHERE id_nguoidung='$commenterid'  ");
$get4 = mysql_fetch_assoc($get3);
$username = $get4['ten_nguoidung'];
$loai = $get4['id_loainguoidung'];

$getnhom = mysql_query("SELECT * FROM hoidap WHERE id_hoidap = '$statusid'  ");
$getnhom2 = mysql_fetch_assoc($getnhom);
$idnhom = $getnhom2['id_nhombenh'];

echo "
<div id=\"comment-$id\" class=\"comment\">
	<div id=\"commentpic-$id\" class=\"commentpic-box\">
		<img src=\"images/avata.jpg\" class=\"commentpic img-circle\">
	</div>
	<div id=\"commentinfo-$id\" class=\"commentinfo\">
		<div id=\"commentname-$id\" class=\"commentname\"> $username";
			if($loai == 1)
			{
				echo "<button  class=\"role btn btn-info\">Admin</button>";
			}
			if($loai == 2)
			{
				echo "<button  class=\"role btn btn-warning\">Doctor</button>";
			}
			echo "</div>
		<div id=\"commenttext-$id\" class=\"commenttext\"> $comment</div>
		<form action=\"\" onsubmit=\"return false\" style=\"display:none;position: relative;\" id=\"editcform-$id\" >
			<textarea id=\"commentedit-$id\" class=\"comment-input form-control\"></textarea>
			<button id=\"posteditc-$id\" class=\"editcomment btn btn-success\">Sửa</button>
			<button id=\"cancleeditc-$id\" class=\"editcomment btn btn-success\">Hủy</button>
		</form>
		<div id=\"commentoption-$id\" class=\"commentoption\">
			<button id=\"numlikecomment-$id\" class=\"likecomment\" style=\"display:none;\">
			<button id=\"likecomment-$id\" class=\"likecomment\"><i class=\"fa fa-heart-o\" aria-hidden=\"true\"></i> Cảm ơn</button>
			<button id=\"likecommentdummy-$id\" class=\"likecomment\" style=\"display:none;\"><i class=\"fa fa-heart-o\" aria-hidden=\"true\"></i> Cảm ơn</button>
			<button id=\"unlikecomment-$id\" class=\"likecomment\" style=\"display:none;\"><i class=\"fa fa-heartbeat\" aria-hidden=\"true\"></i> Bỏ cảm ơn</button>
			<button id=\"unlikecommentdummy-$id\" class=\"likecomment\" style=\"display:none;\"><i class=\"fa fa-heartbeat\" aria-hidden=\"true\"></i> Bỏ cảm ơn</button>
			&middot
			<button id=\"commenttime-$id\" class=\"timecomment\">";
			echo time_stamp($time);
			echo "</button>
		</div>
		<script type=\"text/javascript\">
			$(document).ready(function() {
				$(\"button#likecomment-$id\").click(function() {
					$(\"button#likecomment-$id\").hide();
					$(\"button#unlikecommentdummy-$id\").show();
					var cid = $id;
					var likerid = $commenterid;
					var data = 'cid='+cid+'&likerid='+likerid;
					$.ajax({
						type: \"POST\",
						url: \"commentlike.php\",
						data: data,
						success: function(data){
							if(data==\"error\")
							{
								$(\"button#unlikecommentdummy-$id\").hide();
								$(\"button#likecomment-$id\").show();
							}
							$(\"button#unlikecommentdummy-$id\").hide();
							$(\"button#unlikecomment-$id\").show();
							$(\"#numlikecomment-$id\").show(data);
							$(\"#numlikecomment-$id\").html(data);
						}
					});
				});
				$(\"button#unlikecomment-$id\").click(function() {
					$(\"button#unlikecomment-$id\").hide();
					$(\"button#likecommentdummy-$id\").show();
					var cid = $id;
					var unlikerid = $commenterid;
					var data = 'cid='+cid+'&unlikerid='+unlikerid;
					$.ajax({
						type: \"POST\",
						url: \"commentunlike.php\",
						data: data,
						success: function(data){
							if(data==\"error\")
							{
								$(\"button#likecommentdummy-$id\").hide();
								$(\"button#unlikecomment-$id\").show();
							}
							$(\"button#likecommentdummy-$id\").hide();
							$(\"button#likecomment-$id\").show();
							$(\"#numlikecomment-$id\").show(data);
							$(\"#numlikecomment-$id\").html(data);
						}
					});
				});
			});
		</script>
	</div>
	<div id=\"commentmenu-$id\" class=\"commentmenu\">
		<div class=\"dropdown\">
		    <button class=\"drop\" type=\"button\" data-toggle=\"dropdown\">&middot&middot&middot</button>
		    <ul class=\"dropdown-menu\">
		      <li><button id=\"commentdel-$id\">Xóa bình luận</button></li>
		      <li><button id=\"commentedit-$id\">Sửa bình luận</button></li>
		    </ul>
		</div>
	</div>
	
	<script type=\"text/javascript\">
		$(document).ready(function() {
			$(\"button#commentdel-$id\").click(function(){
				if (confirm(\"Bạn có chắc chắn muốn xóa bình luận này không?\") == true) {
					var cid = $id;
					var data = 'cid='+cid;
					$.ajax({
						type: \"POST\",
						url: \"deletecomment.php\",
						data: data,
						success: function(data){
							alert(\"Xóa bình luận thành công!\");
							$(\"button#group-$idnhom\").click(); 
						}
					});
				} else {
				}
			});
			$(\"button#commentedit-$id\").click(function(){
				var ax = document.getElementById(\"commenttext-$id\");
				$(\"#commentedit-$id\").val(ax.innerText);
				$(\"#commenttext-$id\").hide();
				$(\"#editcform-$id\").show();
			});
			$(\"button#cancleeditc-$id\").click(function(){
				$(\"#commenttext-$id\").show();
				$(\"#editcform-$id\").hide();
			});
			$(\"button#posteditc-$id\").click(function(){
				var as = $(\"textarea#commentedit-$id\").val();
				if(as!=\"$comment\" && $(\"textarea#commentedit-$id\").val())
				{
					var editc = $(\"textarea#commentedit-$id\").val();
					var cid = $id;
					var data = 'editc='+editc+'&cid='+cid;
					$.ajax({
						type: \"POST\",
						url: \"editcomment.php\",
						data: data,
						success: function(data){
							$(\"#commenttext-$id\").html(data);
							$(\"#commenttext-$id\").show(data);
						}
					});
					$(\"#commenttext-$id\").show();
					$(\"#editcform-$id\").hide();
				}
				else
				{
					alert(\"Có lỗi xảy ra! Thay đổi của bạn không được lưu!\");
				}
			});
		});

	</script>
</div>
";

?>