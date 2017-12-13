<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Quản lý</a>
        </li>
        <li class="breadcrumb-item active">Danh Sách Tin Tức</li>
      </ol>
      <div>
        <span class="glyphicon"></span>
      </div>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Bảng tổng hợp tin tức</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</br>Ngày</th>
                  <th>Tiêu đề</br>Hình Ảnh</th>
                  <th>Tóm Tắt Tin Tức</th>
                  <th>Tên Loại Tin Tức</th>
                  <th>Số Lần Xem</th>
                  <th></th>
                  <th></th>
            	</tr>
              </thead>
              <tbody>
             <?php
              $tintuc=DanhSachTinTuc();
			  while($row_tintuc=mysql_fetch_array($tintuc)){
				  ob_start();
			  ?>
                <tr>
                  <td>{id_tintuc}</br>{thoigian_dangtin}</td>
                  <td><a href="manage_news.php?p=suatintuc&id_tintuc={id_tintuc}">{tieude_tintuc}</a></br>
                  <img style="float:left; margin-right:5px ;" src="images/tintuc/{hinhanh}" width="152"; height="96" /></td>
                  <td>{tomtat_tintuc}</td>
                  <td>{ten_loaitintuc}</td>
                  <td>{solanxem}</td>
                  <td><a href="manage_news.php?p=suatintuc&id_tintuc={id_tintuc}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Sửa</a></td>
                  <td><a href="manage_news.php?p=xoatintuc&id_tintuc={id_tintuc}" onClick="return confirm('Bạn có muốn xóa không?')"><i class="fa fa-times" aria-hidden="true"></i>Xóa</a></td>
                </tr>
                <?php 
				$s=  ob_get_clean();
				$s=  str_replace("{id_tintuc}",$row_tintuc['id_tintuc'],$s);
				$s=  str_replace("{thoigian_dangtin}",$row_tintuc['thoigian_dangtin'],$s);
				$s=  str_replace("{tieude_tintuc}",$row_tintuc['tieude_tintuc'],$s);
				$s=  str_replace("{hinhanh}",$row_tintuc['hinhanh'],$s);
				$s=  str_replace("{tomtat_tintuc}",$row_tintuc['tomtat_tintuc'],$s);
				$s=  str_replace("{ten_loaitintuc}",$row_tintuc['ten_loaitintuc'],$s);
				$s=  str_replace("{solanxem}",$row_tintuc['solanxem'],$s);
				echo $s;
			  	}
				?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Cập nhật mới nhất lúc: <?php echo date("d-m-Y H:i:s")?></div>
      </div>
    </div>
  </div>