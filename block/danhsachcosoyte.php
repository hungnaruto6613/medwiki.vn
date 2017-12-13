<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Quản lý</a>
        </li>
        <li class="breadcrumb-item active">Danh Sách Cơ Sở Y Tế</li>
      </ol>
      <div>
        <span class="glyphicon"></span>
      </div>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Bảng tổng hợp Cơ Sở Y Tế</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Tên Cơ Sở Y Tế</br>Hình Ảnh</th>
                  <th>Chuyên Khoa</th>
                  <th>Giới Thiệu Tóm Tắt</th>
                  <th>Thuộc Loại Cơ Sở Y Tế</th>
                  <th>Bình Chọn</th>
                  <th></th>
                  <th></th>
            	</tr>
              </thead>
              <tbody>
             <?php
              $coso=DanhSachCoSoYTe();
			  while($row_coso=mysql_fetch_array($coso)){
				  ob_start();
			  ?>
                <tr>
                  <td>{id_cosoyte}</td>
                  <td><a href="manage_news.php?p=suacosoyte&id_cosoyte={id_cosoyte}">{ten_cosoyte}</a></br>
                  <img style="float:left; margin-right:5px ;" src="images/cosoyte/{hinhanh_cosoyte}" width="152"; height="96" /></td>
                  <td>{chuyenkhoa}</td>
                  <td>{tomtat_gioithieu}</td>
                  <td>{ten_loaicosoyte}</td>
                  <td>{binhchon}</td>
                  <td><a href="manage_news.php?p=suacosoyte&id_cosoyte={id_cosoyte}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Sửa</a></td>
                  <td><a href="manage_news.php?p=xoacosoyte&id_cosoyte={id_cosoyte}" onClick="return confirm('Bạn có muốn xóa không?')"><i class="fa fa-times" aria-hidden="true"></i>Xóa</a></td>
                </tr>
                <?php 
				$s=  ob_get_clean();
				$s=  str_replace("{id_cosoyte}",$row_coso['id_cosoyte'],$s);
				$s=  str_replace("{ten_cosoyte}",$row_coso['ten_cosoyte'],$s);
				$s=  str_replace("{chuyenkhoa}",$row_coso['chuyenkhoa'],$s);
				$s=  str_replace("{hinhanh_cosoyte}",$row_coso['hinhanh_cosoyte'],$s);
				$s=  str_replace("{tomtat_gioithieu}",$row_coso['tomtat_gioithieu'],$s);
				$s=  str_replace("{ten_loaicosoyte}",$row_coso['ten_loaicosoyte'],$s);
				$s=  str_replace("{binhchon}",$row_coso['binhchon'],$s);
				echo $s;
			  	}
				?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Cập nhật mới nhất lúc: <?php echo date("Y-m-d H:i:s")?></div>
      </div>
    </div>
  </div>