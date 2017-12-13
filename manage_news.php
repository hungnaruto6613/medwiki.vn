<?php
ob_start();
session_start();
if(!isset($_SESSION['id_nguoidung'])&& ($_SESSION['id_loainguoidung']==1 or $_SESSION['id_loainguoidung']==2) )
{
	echo '<script language="javascript">alert("Bạn Không Phải Là Admin or Bác Sĩ"); window.location= "news.php";</script>';
}
require "lib/trangchu.php";
require "lib/connection.php";
require "lib/quanli.php";
require "lib/xulyquanly.php";
require "lib/benhly.php";
?>
<?php
	if(isset($_GET["p"])){
		$p=$_GET["p"];
	}else
	{
		$p="";
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
  
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="manage_news.php">Trang chủ</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li <?php if($_SESSION["id_loainguoidung"]==2)echo "style='display:none'" ?> class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTK" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Quản lý tài khoản</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseTK">
            <li>
              <a href="manage_news.php?p=themtaikhoan">Thêm tài khoản</a>
            </li>
            <li>
              <a href="manage_news.php?p=quanlytaikhoan">Danh sách tài khoản</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseNews" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Quản lý tin tức</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseNews">
            <li>
              <a href="manage_news.php?p=themloaitintuc">Thêm loại tin tức</a>
            </li>
			<li>
              <a href="manage_news.php?p=quanlyloaitintuc">Danh sách loại tin tức</a>
            </li>
            <li>
              <a href="manage_news.php?p=themtintuc">Thêm tin tức</a>
            </li>
            <li>
              <a href="manage_news.php">Danh sách tin tức</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseBenh" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Quản lý thông tin bệnh</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseBenh">
            <li>
              <a href="manage_news.php?p=themnhombenh">Thêm nhóm bệnh</a>
            </li>
			<li>
              <a href="manage_news.php?p=quanlynhombenh">Danh sách nhóm bệnh</a>
            </li>
            <li>
              <a href="manage_news.php?p=thembenhly">Thêm bệnh lý</a>
            </li>
            <li>
              <a href="manage_news.php?p=quanlybenhly">Danh sách bệnh lý</a>
            </li>
          </ul>
        </li>
        <li <?php if($_SESSION["id_loainguoidung"]==2)echo "style='display:none'" ?> class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseBS" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Quản lý bác sĩ</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseBS">
            <li>
              <a href="manage_news.php?p=thembacsi">Thêm bác sĩ</a>
            </li>
            <li>
              <a href="manage_news.php?p=quanlybacsi">Danh sách bác sĩ</a>
            </li>
          </ul>
        </li>
        <li <?php if($_SESSION["id_loainguoidung"]==2)echo "style='display:none'" ?> class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseCSYT" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Quản lý cơ sở y tế</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseCSYT">
            <li>
              <a href="manage_news.php?p=themcosoyte">Thêm cơ sở y tế</a>
            </li>
            <li>
              <a href="manage_news.php?p=quanlycosoyte">Danh sách cơ sở y tế</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Link</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
      	<li class=""><a class="nav-link dropdown-toggle mr-lg-2">Chào <?php if($_SESSION["id_loainguoidung"]==1){echo "Admin";} else {echo 'Bác Sĩ';} ?>: <?php echo $_SESSION["ten_nguoidung"]; ?></a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">Tin nhắn mới:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Chào</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Cảm ởn!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Khi nào</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">Xem tất cả</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Thông báo</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Mới cập nhật tin mơi</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">Xem hết</a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a href="news.php" class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Trở về</a>
        </li>
      </ul>
    </div>
  </nav>
  <!--form block: -->
  <?php
	switch($p)
	{
		case "themtintuc": xulythemtin(); require "block/themtintuc.php"; break;
		case "suatintuc" : require "block/suatintuc.php"; xulysuatin(); break;
		case "xoatintuc" : require "block/xoatintuc.php"; break;
		case "themloaitintuc":require "block/themloaitintuc.php";break;
		case "sualoaitintuc":require "block/sualoaitintuc.php";break;
		case "xoaloaitintuc":require "block/xoaloaitintuc.ph";break;
		case "quanlyloaitintuc":require "block/danhsachloaitin.php";break;
 		case "quanlybenhly": require "block/quanlybenhly.php"; break;
		case "thembenhly": require "block/thembenhly.php"; break;
		case "suabenhly" : require "block/suabenhly.php"; break;
		case "xoabenhly" : require "block/xoabenhly.php"; break;
		case "themnhombenh":require "block/themnhombenh.php";break;
		case "suanhombenh":require "block/suanhombenh.php";break;
		case "xoanhombenh":require "block/xoanhombenh.php";break;
		case "quanlynhombenh":require "block/danhsachnhombenh.php";break;
		case "quanlytaikhoan":require "block/danhsachtaikhoan.php"; break;
		case "themtaikhoan":require "block/themtaikhoan.php"; break;
		case "suataikhoan": require "block/suataikhoan.php"; break;
		case "xoataikhoan": require "block/xoataikhoan.php"; break;
		case "quanlybacsi": require "block/danhsachbacsi.php"; break;
		case "thembacsi": require "block/thembacsi.php"; break;
		case "suabacsi": require "block/suabacsi.php";break;
		case "xoabacsi": require "block/xoabacsi.php";break;
		case "quanlycosoyte": require "block/danhsachcosoyte.php"; break;
		case "themcosoyte": require "block/themcosoyte.php"; break;
		case "suacosoyte": require "block/suacosoyte.php";break; 
		case "xoacosoyte": require "block/xoacosoyte.php";break; 
		default: 
			require"block/danhsachquanlytintuc.php";
	}
	?>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn rời khỏi đây ?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Chọn Xác Nhận Để Quay Trở Về Trang Tin Tức!</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
            <a class="btn btn-primary" href="news.php">Xác Nhận</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>
