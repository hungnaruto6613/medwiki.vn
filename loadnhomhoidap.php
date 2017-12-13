<?php

include("lib/connection.php");
include("timestamp.php");
$sid = $_POST['sid'];
$idnhombenh = $_POST['nid'];
$get = mysql_query("SELECT * FROM hoidap WHERE id_nhombenh='$idnhombenh' ORDER BY id_hoidap DESC;");

echo "
<form action=\"\" onsubmit=\"return false\" id=\"post\">
	<div id=\"top-post\">
		<b><span class=\"glyphicon glyphicon-question-sign\"></span> Đăng vài viết | Nhận tư vấn từ bác sĩ và mọi người</b> 
	</div>
	<div id=\"center-post\">
		<div class=\"avata-box\" >
			<img src=\"images/avata.jpg\" class=\"img-circle avata\">
		</div>
		<div class=\"text\">
			<textarea id=\"status\" class=\"form-control\" required></textarea>
		</div>
		
	</div>
	<div id=\"bot-post\">
		<button id=\"postbutton\" class=\"btn btn-primary\">Đăng bài </button>
	</div>
	<script type=\"text/javascript\">
  		$(document).ready(function(){
			


  			$(\"button#postbutton\").click(function(){
  				if($(\"#status\").val())
				{
	  				var status = $(\"textarea#status\").val();
	  				var posterid = $sid;
	  				var nid = $idnhombenh;
	  				var data = 'status='+status+'&posterid='+posterid+'&nid='+nid;
	  				$.ajax({
	  					
	  					type: \"POST\",
	  					url: \"insertstatus.php\",
	  					data: data,
	  					success: function(data){
	  						$(\"#allstatus\").prepend(data).fadeIn('slow');
	  						$(\"textarea#status\").val('');
	  					}
	  				});
				}
				else
				{
					alert(\"Có lỗi xảy ra, đăng bài viết cần ít nhất 1 kí tự.\");
				}
  			});

  		});


  	</script>
</form>
<div id=\"allstatus\">";


while($get2 = mysql_fetch_assoc($get))
{ 
$statusid = $get2['id_hoidap'];
$statustext = $get2['noidung_hoidap'];
$statusposterid = $get2['id_nguoidung'];
$statustime = $get2['thoigian_hoidap'];

$poster1 = mysql_query("SELECT * FROm nguoidung WHERE id_nguoidung ='$statusposterid' ");
$poster2 = mysql_fetch_assoc($poster1);
$statusname = $poster2['ten_nguoidung'];
$loai = $poster2['id_loainguoidung'];

//fetch comment
$getc = mysql_query("SELECT * FROM binhluan_hoidap WHERE id_hoidap = '$statusid' ");

$clike = mysql_query("SELECT * FROM danhgia_hoidap WHERE id_hoidap='$statusid' ");
$lnum = mysql_num_rows($clike);


$clike2 = mysql_query("SELECT * FROM danhgia_hoidap WHERE id_nguoidung='$sid' AND id_hoidap ='$statusid' ");
$lnum2 = mysql_num_rows($clike2);


echo "
<div id=\"status-$statusid\" class=\"status\">
	<div class=\"topstatus\">
		<div id=\"statuspic-$statusid\" class=\"statuspic-box\">
			<img src=\"images/avata.jpg\" class=\"img-circle statuspic\">
		</div>
		<div id=\"statusinfo-$statusid\" class=\"statusinfo\">
			<div id=\"statusname-$statusid\" class=\"statusname\"> $statusname";
			if($loai == 1)
			{
				echo "<button  class=\"role btn btn-info\">Admin</button>";
			}
			if($loai == 2)
			{
				echo "<button  class=\"role btn btn-warning\">Doctor</button>";
			}
			echo "</div>
			<div id=\"statustext-$statusid\" class=\"statustext\"> $statustext</div>
			<form action=\"\" onsubmit=\"return false\" style=\"display:none;\" id=\"editsform-$statusid\">
				<textarea id=\"statusedit-$statusid\" class=\"form-control\"></textarea>
				<button id=\"postedits-$statusid\" style=\"float:right; padding:4px 12px; font-size:13px; margin: 4px;\" class=\"btn btn-success\">Chỉnh sửa xong</button>
				<button id=\"cancleedits-$statusid\" style=\"float:right; padding:4px 12px; font-size:13px; margin: 4px;\" class=\"btn btn-success\">Hủy</button>
				
			</form>
		</div>";
		
		if($statusposterid == $sid)
		{
			echo "
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
						$(\"#statusedit-$statusid\").val(ax.innnerText);
						$(\"#statustext-$statusid\").hide();
						$(\"#editsform-$statusid\").show();
					});
					$(\"button#cancleedits-$statusid\").click(function(){
						$(\"#statustext-$statusid\").show();
						$(\"#editsform-$statusid\").hide();
					});
					$(\"button#postedits-$statusid\").click(function(){
						var as = $(\"textarea#statusedit-$statusid\").val();
						if(as != \"$statustext\" && $(\"textarea#statusedit-$statusid\").val())
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




			";
		}

		echo "
	</div>

	<div id=\"statusoptions-$statusid\" class=\"statusoptions\">";
		if($lnum2 ==1)
		{
		echo "
		<button id=\"unlikestatus-$statusid\" class=\"like\" style=\"color: #e34554;\"><i class=\"fa fa-heartbeat\" aria-hidden=\"true\"></i> Hủy quan tâm</button>
		<button id=\"unlikestatusdummy-$statusid\" class=\"like\" style=\"display:none;\"><i class=\"fa fa-heartbeat\" aria-hidden=\"true\"></i> Hủy quan tâm</button>
		<button id=\"likestatusdummy-$statusid\" class=\"like\" style=\"display:none;\"><i class=\"fa fa-heart-o\" aria-hidden=\"true\"></i> Quan tâm</button>
		<button id=\"likestatus-$statusid\" class=\"like\" style=\"display:none;\"><i class=\"fa fa-heart-o\" aria-hidden=\"true\"></i> Quan tâm</button>
		";
		}
		else
		{
			
		echo "
		<button id=\"likestatus-$statusid\" class=\"like\"><i class=\"fa fa-heart-o\" aria-hidden=\"true\"></i> Quan tâm</button>
		<button id=\"likestatusdummy-$statusid\" class=\"like\" style=\"display:none;\"><i class=\"fa fa-heart-o\" aria-hidden=\"true\"></i> Quan tâm</button>
		<button id=\"unlikestatusdummy-$statusid\" class=\"like\" style=\"display:none;\"><i class=\"fa fa-heartbeat\" aria-hidden=\"true\"></i> Hủy quan tâm</button>
		<button id=\"unlikestatus-$statusid\" class=\"like\" style=\"display:none;\"><i class=\"fa fa-heartbeat\" aria-hidden=\"true\"></i> Hủy quan tâm</button>
		";
		}
		echo "
		<button id=\"commentstatus-$statusid\" class=\"like\"\"><i class=\"fa fa-comment-o\" aria-hidden=\"true\"></i> Bình luận</button>
		<button id=\"sharestatus-$statusid\" class=\"like\"><i class=\"fa fa-share-alt\" aria-hidden=\"true\"></i> Chia sẻ</button>
		<button id=\"statustime-$statusid\" class=\"time\">";
		echo time_stamp($statustime);
		echo "</button>
	</div>";

	if($lnum>0)
	{
		echo "
	<div id=\"likes-$statusid\" class=\"likes\">";
		echo "Có ".$lnum." người quan tâm chủ đề này!" ;
	echo "
	</div>";
	}
	else
	{

		echo "
	<div id=\"likes-$statusid\" class=\"likes\" style=\"display:none;\">
	</div>";
	}


		
	echo "
	<!-----------comment------------->
	<div id=\"allcomments-$statusid\" class=\"allcomments\">";

		while ($getc2 = mysql_fetch_assoc($getc)) 
		{
		$cid = $getc2['id_binhluan_hoidap'];
		$commenter_id = $getc2['id_nguoidung'];
		$comment = $getc2['noidung_binhluan_hoidap'];
		$ctime = $getc2['thoigian_binhluan_hoidap'];

		$getcname = mysql_query("SELECT * FROm nguoidung WHERE id_nguoidung ='$commenter_id' ");
		$getcname2 = mysql_fetch_assoc($getcname);
		$cname = $getcname2['ten_nguoidung'];

		$getclike = mysql_query("SELECT * FROM danhgia_binhluan WHERE id_binhluan_hoidap = '$cid' AND id_nguoidung = '$sid'  ");
		$clikenum2 = mysql_num_rows($getclike);

		$getnumlike = mysql_query("SELECT * FROM danhgia_binhluan WHERE id_binhluan_hoidap = '$cid' ");
		$numlike = mysql_num_rows($getnumlike);

		echo "
		<div id=\"comment-$cid\" class=\"comment\">
			<div id=\"commentpic-$cid\" class=\"commentpic-box\">
				<img src=\"images/avata.jpg\" class=\"commentpic img-circle\">
			</div>
			<div id=\"commentinfo-$cid\" class=\"commentinfo\">
				<div id=\"commentname-$cid\" class=\"commentname\"> $cname";
			if($loai == 1)
			{
				echo "<button  class=\"role btn btn-info\">Admin</button>";
			}
			if($loai == 2)
			{
				echo "<button  class=\"role btn btn-warning\">Doctor</button>";
			}
			echo "</div>
				<div id=\"commenttext-$cid\" class=\"commenttext\"> $comment</div>
				<form action=\"\" onsubmit=\"return false\" style=\"display:none;position: relative;\" id=\"editcform-$cid\" >
					<textarea id=\"commentedit-$cid\" class=\"comment-input form-control\"></textarea>
					<button id=\"posteditc-$cid\" class=\"editcomment btn btn-success\">Sửa</button>
					<button id=\"cancleeditc-$cid\" class=\"editcomment btn btn-success\">Hủy</button>
				</form>
				<div id=\"commentoption-$cid\" class=\"commentoption\">";
					if($numlike>0)
					{
						echo "
						<button id=\"numlikecomment-$cid\" class=\"likecomment\">";
						echo $numlike;
						echo "</button>";
					}
					else
					{
						echo "
						<button id=\"numlikecomment-$cid\" class=\"likecomment\"></button>";
					}

					if($clikenum2==1)
					{
						echo "
						<button id=\"unlikecomment-$cid\" class=\"likecomment\" ><i class=\"fa fa-heartbeat\" aria-hidden=\"true\"></i> Bỏ cảm ơn</button>
						<button id=\"unlikecommentdummy-$cid\" class=\"likecomment\" style=\"display:none;\"><i class=\"fa fa-heartbeat\" aria-hidden=\"true\"></i> Bỏ cảm ơn</button>
						<button id=\"likecomment-$cid\" class=\"likecomment\" style=\"display:none;\"><i class=\"fa fa-heart-o\" aria-hidden=\"true\"></i> Cảm ơn</button>
						<button id=\"likecommentdummy-$cid\" class=\"likecomment\" style=\"display:none;\"><i class=\"fa fa-heart-o\" aria-hidden=\"true\"></i> Cảm ơn</button>";
					}
					else
					{
						echo "
						<button id=\"likecomment-$cid\" class=\"likecomment\"><i class=\"fa fa-heart-o\" aria-hidden=\"true\"></i> Cảm ơn</button>
						<button id=\"likecommentdummy-$cid\" class=\"likecomment\" style=\"display:none;\"><i class=\"fa fa-heart-o\" aria-hidden=\"true\"></i> Cảm ơn</button>
						<button id=\"unlikecomment-$cid\" class=\"likecomment\" style=\"display:none;\"><i class=\"fa fa-heartbeat\" aria-hidden=\"true\"></i> Bỏ cảm ơn</button>
						<button id=\"unlikecommentdummy-$cid\" class=\"likecomment\" style=\"display:none;\"><i class=\"fa fa-heartbeat\" aria-hidden=\"true\"></i> Bỏ cảm ơn</button>";
					}
					echo "
					&middot
					<button id=\"commenttime-$cid\" class=\"timecomment\">";
					echo time_stamp($ctime);
					echo "</button>
				</div>
				<script type=\"text/javascript\">
					$(document).ready(function() {
						$(\"button#likecomment-$cid\").click(function() {
							$(\"button#likecomment-$cid\").hide();
							$(\"button#unlikecommentdummy-$cid\").show();
							var cid = $cid;
							var likerid = $sid;
							var data = 'cid='+cid+'&likerid='+likerid;
							$.ajax({
								type: \"POST\",
								url: \"commentlike.php\",
								data: data,
								success: function(data){
									if(data==\"error\")
									{
										$(\"button#unlikecommentdummy-$cid\").hide();
										$(\"button#likecomment-$cid\").show();
									}
									$(\"button#unlikecommentdummy-$cid\").hide();
									$(\"button#unlikecomment-$cid\").show();
									$(\"#numlikecomment-$cid\").show(data);
									$(\"#numlikecomment-$cid\").html(data);
								}
							});
						});
						$(\"button#unlikecomment-$cid\").click(function() {
							$(\"button#unlikecomment-$cid\").hide();
							$(\"button#likecommentdummy-$cid\").show();
							var cid = $cid;
							var unlikerid = $sid;
							var data = 'cid='+cid+'&unlikerid='+unlikerid;
							$.ajax({
								type: \"POST\",
								url: \"commentunlike.php\",
								data: data,
								success: function(data){
									if(data==\"error\")
									{
										$(\"button#likecommentdummy-$cid\").hide();
										$(\"button#unlikecomment-$cid\").show();
									}
									$(\"button#likecommentdummy-$cid\").hide();
									$(\"button#likecomment-$cid\").show();
									$(\"#numlikecomment-$cid\").show(data);
									$(\"#numlikecomment-$cid\").html(data);
								}
							});
						});
					});
				</script>
			</div>";
			if($commenter_id==$sid)
			{
				echo "
				<div id=\"commentmenu-$cid\" class=\"commentmenu\">
					<div class=\"dropdown\">
					    <button class=\"drop\" type=\"button\" data-toggle=\"dropdown\">&middot&middot&middot</button>
					    <ul class=\"dropdown-menu\">
					      <li><button id=\"commentdel-$cid\">Xóa bình luận</button></li>
					      <li><button id=\"commentedit-$cid\">Sửa bình luận</button></li>
					    </ul>
					</div>
				</div>
				
				<script type=\"text/javascript\">
					$(document).ready(function() {
						$(\"button#commentdel-$cid\").click(function(){
							if (confirm(\"Bạn có chắc chắn muốn xóa bình luận này không?\") == true) {
								var cid = $cid;
								var data = 'cid='+cid;
								$.ajax({
									type: \"POST\",
									url: \"deletecomment.php\",
									data: data,
									success: function(data){
										alert(\"Xóa bình luận thành công!\");
										$(\"button#group-$idnhombenh\").click(); 
									}
								});
							} else {
							}
						});
						$(\"button#commentedit-$cid\").click(function(){
							var ax = document.getElementById(\"commenttext-$cid\");
							$(\"#commentedit-$cid\").val(ax.innerText);
							$(\"#commenttext-$cid\").hide();
							$(\"#editcform-$cid\").show();
						});
						$(\"button#cancleeditc-$cid\").click(function(){
							$(\"#commenttext-$cid\").show();
							$(\"#editcform-$cid\").hide();
						});
						$(\"button#posteditc-$cid\").click(function(){
							var as = $(\"textarea#commentedit-$cid\").val();
							if(as!=\"$comment\" && $(\"textarea#commentedit-$cid\").val())
							{
								var editc = $(\"textarea#commentedit-$cid\").val();
								var cid = $cid;
								var data = 'editc='+editc+'&cid='+cid;
								$.ajax({
									type: \"POST\",
									url: \"editcomment.php\",
									data: data,
									success: function(data){
										$(\"#commenttext-$cid\").html(data);
										$(\"#commenttext-$cid\").show(data);
									}
								});
								$(\"#commenttext-$cid\").show();
								$(\"#editcform-$cid\").hide();
							}
							else
							{
								alert(\"Có lỗi xảy ra! Thay đổi của bạn không được lưu!\");
							}
						});
					});

				</script>

				";
			}
			echo "
		</div>
		";
		}

			
	echo "
	</div>
	
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
				var commenterid = $sid;
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
			var likerid = $sid;
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
			var unlikerid = $sid;
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
</div>


";
}

?>