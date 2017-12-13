<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Quản lý</a>
        </li>
        <li class="breadcrumb-item active">Danh Sách Tài Khoản</li>
      </ol>
      <div>
        <span class="glyphicon"></span>
      </div>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Bảng tổng hợp tài khoản</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Tên Người Dùng</br>Hình Ảnh</th>
                  <th>Địa Chỉ</th>
                  <th>Email</th>
                  <!--<th>Điện Thoại</th>-->
                  <th>Tên Đăng Nhập</th>
                  <th>Trạng Thái</th>
                  <th>Thuộc Loại Tài Khoản</th>
                  <th></th>
                  <th></th>
            	</tr>
              </thead>
              <tbody>
             <?php
              $taikhoan=DanhSachTaiKhoan();
			  while($row_taikhoan=mysql_fetch_array($taikhoan)){
				  ob_start();
			  ?>
                <tr>
                  <td>{id_nguoidung}</td>
                  <td><a href="manage_news.php?p=suataikhoan&id_nguoidung={id_nguoidung}">{ten_nguoidung}</a></br>
                  <img style="float:left; margin-right:5px ;" src="images/taikhoan/{hinhanh}" width="152"; height="96" /></td>
                  <td>{diachi}</td>
                  <td>{email}</td>
                  <!--<td>{dienthoai}</td>-->
                  <td>{tendangnhap}</td>
                  <td>{trangthai}</td>
                  <td>{tenloainguoidung}</td>
                  <td><a href="manage_news.php?p=suataikhoan&id_nguoidung={id_nguoidung}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Sửa</a></td>
                  <td><a href="manage_news.php?p=xoataikhoan&id_nguoidung={id_nguoidung}" onClick="return confirm('Bạn có muốn xóa không?')"><i class="fa fa-times" aria-hidden="true"></i>Xóa</a></td>
                </tr>
                <?php 
				$s=  ob_get_clean();
				$s=  str_replace("{id_nguoidung}",$row_taikhoan['id_nguoidung'],$s);
				$s=  str_replace("{ten_nguoidung}",$row_taikhoan['ten_nguoidung'],$s);
				$s=  str_replace("{hinhanh}",$row_taikhoan['hinhanh'],$s);
				$s=  str_replace("{diachi}",$row_taikhoan['diachi'],$s);
				$s=  str_replace("{email}",$row_taikhoan['email'],$s);
				/*$s=  str_replace("{dienthoai}",$row_taikhoan['dienthoai'],$s);*/
				$s=  str_replace("{tendangnhap}",$row_taikhoan['tendangnhap'],$s);
				$s=  str_replace("{trangthai}",$row_taikhoan['trangthai'],$s);
				$s=  str_replace("{tenloainguoidung}",$row_taikhoan['tenloainguoidung'],$s);
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