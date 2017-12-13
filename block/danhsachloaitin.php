<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Quản lý</a>
        </li>
        <li class="breadcrumb-item active">Danh Sách Loại Tin Tức</li>
      </ol>
      <div>
        <span class="glyphicon"></span>
      </div>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Bảng tổng hợp loại tin tức</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Tên Loại Tin Tức</th>
                  <th></th>
                  <th></th>
            	</tr>
              </thead>
              <tbody>
             <?php
              $loaitintuc=DanhSachLoaiTinTuc();
			  while($row_loaitintuc=mysql_fetch_array($loaitintuc)){
				  ob_start();
			  ?>
                <tr>
                  <td>{id_loaitintuc}</td>
                  <td><a href="manage_news.php?p=sualoaitintuc&id_loaitintuc={id_loaitintuc}">{ten_loaitintuc}</a></td>
                  <td><a href="manage_news.php?p=sualoaitintuc&id_loaitintuc={id_loaitintuc}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Sửa</a></td>
                  <td><a href="manage_news.php?p=xoaloaitintuc&id_loaitintuc={id_loaitintuc}" onClick="return confirm('Bạn có muốn xóa không?')"><i class="fa fa-times" aria-hidden="true"></i>Xóa</a></td>
                </tr>
                <?php 
				$s=  ob_get_clean();
				$s=  str_replace("{id_loaitintuc}",$row_loaitintuc['id_loaitintuc'],$s);
				$s=  str_replace("{ten_loaitintuc}",$row_loaitintuc['ten_loaitintuc'],$s);
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