<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Quản lý</a>
        </li>
        <li class="breadcrumb-item active">Danh Sách Bác Sĩ</li>
      </ol>
      <div>
        <span class="glyphicon"></span>
      </div>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Bảng tổng hợp bác sĩ</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Tên Bác Sĩ</br>Hình Ảnh</th>
                  <th>Học Vị</th>
                  <th>Kinh Nghiệm Làm Việc</th>
                  <th>Chuyên Khoa</th>
                  <th>Lượt Thích</th>
                  <th></th>
                  <th></th>
            	</tr>
              </thead>
              <tbody>
             <?php
              $bacsi=DanhSachBacSi();
			  while($row_bacsi=mysql_fetch_array($bacsi)){
				  ob_start();
				  $id_bacsi=$row_bacsi['id_bacsi']
			  ?>
                <tr>
                  <td>{id_bacsi}</td>
                  <td><a href="manage_news.php?p=suabacsi&id_bacsi={id_bacsi}">{ten_bacsi}</a></br>
                  <img style="float:left; margin-right:5px ;" src="images/bacsi/{hinhanh_bacsi}" width="152"; height="96" /></td>
                  <td>{hocvi}</td>
                  <td>{kinhnghiem}</td>
                  <td><?php 
				  $bacsicochuyenkhoa=DanhSachChuyenKhoa_TheoBacSi($id_bacsi);
				  while($row_bacsicochuyenkhoa=mysql_fetch_array($bacsicochuyenkhoa))
				  {
					echo $row_bacsicochuyenkhoa['ten_chuyenkhoa']."</br>";
				  }?></td>
                  <td>{luotthich}</td>
                  <td><a href="manage_news.php?p=suabacsi&id_bacsi={id_bacsi}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Sửa</a></td>
                  <td><a href="manage_news.php?p=xoabacsi&id_bacsi={id_bacsi}" onClick="return confirm('Bạn có muốn xóa không?')"><i class="fa fa-times" aria-hidden="true"></i>Xóa</a></td>
                </tr>
                <?php 
				$s=  ob_get_clean();
				$s=  str_replace("{id_bacsi}",$row_bacsi['id_bacsi'],$s);
				$s=  str_replace("{ten_bacsi}",$row_bacsi['ten_bacsi'],$s);
				$s=  str_replace("{hinhanh_bacsi}",$row_bacsi['hinhanh_bacsi'],$s);
				$s=  str_replace("{hocvi}",$row_bacsi['hocvi'],$s);
				$s=  str_replace("{kinhnghiem}",$row_bacsi['kinhnghiem'],$s);
				//$s=  str_replace("{ten_chuyenkhoa}",$chuyenkhoa,$s);
				$s=  str_replace("{luotthich}",$row_bacsi['luotthich'],$s);
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