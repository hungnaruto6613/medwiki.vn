<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Quản lý</a>
        </li>
        <li class="breadcrumb-item active">Danh Sách Bệnh Lý</li>
      </ol>
      <div>
        <span class="glyphicon"></span>
      </div>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Bảng tổng hợp Bệnh Lý</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Tên Bệnh</br>Hình Ảnh</th>
                  <th>Tổng Quan Bệnh</th>
                  <th>Thuộc Nhóm Bệnh</th>
                  <th>Lượt Xem</th>
                  <th></th>
                  <th></th>
            	</tr>
              </thead>
              <tbody>
             <?php
              $benh=DanhSachBenhLy();
			  while($row_benh=mysql_fetch_array($benh)){
				  ob_start();
			  ?>
                <tr>
                  <td>{id_benh}</td>
                  <td><a href="manage_news.php?p=suabenhly&id_benh={id_benh}">{ten_benh}</a></br>
                  <img style="float:left; margin-right:5px ;" src="images/benhly/{hinhanh_benh}" width="152"; height="96" /></td>
                  <td>{tong_quan}</td>
                  <td>{ten_nhombenh}</td>
                  <td>{luotxem}</td>
                  <td><a href="manage_news.php?p=suabenhly&id_benh={id_benh}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Sửa</a></td>
                  <td><a href="manage_news.php?p=xoabenhly&id_tintuc={id_benh}"><i class="fa fa-times" aria-hidden="true"></i>Xóa</a></td>
                </tr>
                <?php 
				$s=  ob_get_clean();
				$s=  str_replace("{id_benh}",$row_benh['id_benh'],$s);
				$s=  str_replace("{ten_benh}",$row_benh['ten_benh'],$s);
				$s=  str_replace("{hinhanh_benh}",$row_benh['hinhanh_benh'],$s);
				$s=  str_replace("{tong_quan}",$row_benh['tong_quan'],$s);
				$s=  str_replace("{ten_nhombenh}",$row_benh['ten_nhombenh'],$s);
				$s=  str_replace("{luotxem}",$row_benh['luotxem'],$s);
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