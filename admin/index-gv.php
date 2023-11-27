<!DOCTYPE html>


<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Toan.tt - Giáo viên</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="./assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="./assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="./assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="./assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="./assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="./assets/vendor/libs/apex-charts/apex-charts.css" />

    <link href="./libs/flaticon/font/flaticon.css" rel="stylesheet" />
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="./assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="./assets/js/config.js"></script>
  </head>


  <?php
// include('./config/config.php');
session_start();
// $user = [];
$user = (isset($_SESSION['giaovien'])) ? $_SESSION['giaovien'] : [];
$gender= $user['gioitinhgv'];

if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['giaovien']);
    header('Location:../client/index.php');
}

?>


  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index-gv.php" class="app-brand-link">
            
              <span class="app-brand-logo demo">
                    <i class="flaticon-043-teddy-bear"></i>
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Toan.TT</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          

          <ul class="menu-inner py-1">
            <li class="menu-item active">
              <a href="index-gv.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
			<li class="menu-header small text-uppercase">
              <span class="menu-header-text">Pages</span>
            </li>
			<li class="menu-item">
              <a href="index-gv.php?action=quanlylichday&query=danhsach" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Tables">Lịch dạy</div>
              </a>
            </li>
			<!-- <li class="menu-item">
              <a href="index-gv.php?action=quanlylhv&query=danhsach" class="menu-link">
              <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Basic">Lớp - Học viên</div>
              </a>
            </li> -->
			
			<li class="menu-header small text-uppercase">
              <span class="menu-header-text">Components</span>
            </li>
            <li class="menu-item">
              <a href="index-gv.php?action=quanlylhv&query=danhsach" class="menu-link">
              <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Basic">Lớp - Học viên</div>
              </a>
            </li>
            <!-- <li class="menu-item">
              <a href="index.php?action=quanlylichhoc&query=danhsach" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Tables">Lịch dạy</div>
              </a>
            </li> -->
              </ul>
 
           
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- <div class="card-body"> -->
              <h5 class="card-title text-primary" style="margin-bottom: 2px;">Xin chào <?php echo $user['tengv']; ?>! 🎉</h5>
              <!-- <p class="mb-4">Trung tâm dạy toán trí tuệ <span class="fw-bold">Toan.TT</span> Chúc bạn một ngày làm việc hiệu quả !</p> -->
        


              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li>

                <!-- User -->
              
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="./uploads/<?php echo $user['anhgv'] ?>" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="./uploads/<?php echo $user['anhgv'] ?>" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                         
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $user['tengv']; ?></span>
                            <small class="text-muted">Giáo viên</small>
                          </div>
                          
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#basicModal">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">Hồ sơ</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#Modal">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Đổi mật khẩu</span>
                      </a>
                    </li>
                    <!-- <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li> -->
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="index.php?dangxuat=1">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Thoát</span>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->
		  
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <?php
		        include("./config/config.php");

		        include("main-gv.php");
		?>
            
            <!-- / Content -->
          </div>
            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                   made with by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                </div>
               
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
	<?php
  include("./config/config.php");
$ten= $_POST['ten'];
$sdt = $_POST['sdt'];
$namkn = $_POST['kinhnghiem'];
$diachi = $_POST['diachi'];
$anh = $_FILES['anh']['name'];
$anh_tmp =$_FILES['anh']['tmp_name'];
$gioitinh=$_POST['gioitinh'];
// $email=$_POST['email'];

if (isset($_POST['doithongtingv'])) {
	if ( $anh != '') {
		
		move_uploaded_file($anh_tmp, "uploads/" .$anh);
		$sql_update = "UPDATE giaovien SET  tengv='$ten',sdtgv='$sdt', diachigv='$diachi', kinhnghiemgv='$namkn',gioitinhgv='$gioitinh',anhgv='$anh' WHERE magv ='$user[magv]'";
		$sql = "SELECT * FROM giaovien WHERE magv = '$user[magv]' LIMIT 1";

		
		$query = mysqli_query($mysqli, $sql);
		
		while ($row = mysqli_fetch_array($query)) {
			
			unlink("uploads/" . $row['anhgv']);
		}
	}
	else {
		$sql_update = "UPDATE giaovien SET  tengv='$ten',sdtgv='$sdt', diachigv='$diachi', kinhnghiemgv='$namkn',gioitinhgv='$gioitinh' WHERE magv ='$user[magv]'";
		// $sql_update = "UPDATE ThuongHieu SET  TenTH='$tenth',`AnhTH`='$anhth' WHERE MaTH='".$_GET['MaTH']."'";

	}
	if(mysqli_query($mysqli, $sql_update)===TRUE){

		echo"<script type='text/javascript'>
		alert('Cập nhật thông tin thành công!');
		document.location='index-gv.php';
	</script>";
	}else{
		echo"<script type='text/javascript'>
		alert('Cập nhật thông tin không thành công!');
		document.location='index-gv.php';
	</script>";
	}
	// mysqli_query($mysqli, $sql_update);
	// header('Location:../../index.php?action=quanlythuonghieu&query=danhsach');
}
?>
    			<div class="modal fade" id="basicModal" tabindex="-1"  aria-labelledby="basicModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Thông tin giáo viên</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <form action="" method="POST" enctype="multipart/form-data" >
                                <div class="modal-body">
                                  
								  	
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameBasic" class="form-label">Tên giáo viên</label>
                                      <input type="text" name="ten" class="form-control" value="<?php echo $user['tengv']?>"placeholder="" />
                                    </div>
                                  </div>
                                  <!-- <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameBasic" class="form-label">Tên giáo viên</label>
                                      <input type="text" name="ten" class="form-control" value="<?php echo $user['gioitinhgv']?>" placeholder="" />
                                    </div>
                                  </div> -->
                                  <div class="row" >
                                    <label class="form-label" style="padding-top:8px;">Giới tính</label>
                                    <div class="form-info">
                                      <select
                                        type="text"
                                        class="form-select"
                                        id="defaultSelect"
                                        name="gioitinh"
                                        required="required"
                                        data-validation-required-message="Please enter a subject"
                                      >
                                          <!-- <option value=" ">--select--</option> -->
                                          <option value="Nam" <?php  if($gender == "Nam"){?> selected="selected" <?php }?> >Nam</option>
                                          <option value="Nu" <?php if($gender == "Nu"){?> selected="selected" <?php }?> >Nữ</option>
                                        </select>
                                      <p class="help-block text-danger"></p>
                                    </div>
                                  </div>
								                  <div class="row g-2" style="margin-bottom:1rem;">
                                    <div class="col mb-0">
                                      <label for="nameBasic" class="form-label">SĐT</label>
                                      <input type="text" name="sdt" class="form-control" value="<?php echo $user['sdtgv']?>"placeholder="" />
                                    </div>
									                <div class="col mb-0">
                                      <label for="nameBasic" class="form-label">Kinh nghiệm</label>
                                      <input type="text" name="kinhnghiem" class="form-control" value="<?php echo $user['kinhnghiemgv']?>"placeholder="" />
                                    </div>
                                  </div>
								                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameBasic" class="form-label">Địa chỉ</label>
                                      <input type="text" name="diachi" class="form-control" value="<?php echo $user['diachigv']?>"placeholder="" />
                                    </div>
                                  </div>
                                  <div class="mb-3">
                                    <label for="formFile" class="form-label">Hình ảnh</label>
                                    <input class="form-control" name="anh" value="<?php echo $user['anhgv']?>" type="file"  >
                                  </div>
                                  <!-- <div class="row" style="margin-bottom: 1rem !important;">
                                    <div class="col- mb3">
                                      <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                                      <textarea class="form-control" name="motatt"  rows="3" style="height: 54px;" ></textarea>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col- mb3">
                                      <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                                      <textarea class="form-control" name="noidungtt" rows="3" style="height: 54px;" ></textarea>
                                    </div>
                                  </div> -->
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Huỷ
                                  </button>
                                  <button type="submit" class="btn btn-primary" name="doithongtingv">Cập nhật</button>
                                </div>
                              </form>
                            </div>
                          </div>
          </div>
		  <?php
	// session_start();
	// ob_start();
	include('./config/config.php');
	// include('../mail/index.php');
	// $mail = new Mailer();
	if(isset($_POST['doimatkhau'])){
	 $error= array();
	 $passold=md5($_POST['matkhaucu']);
	 $sql= "SELECT * FROM giaovien WHERE magv='$user[magv]'";
	 $query= mysqli_query($mysqli,$sql);
	 $row=mysqli_fetch_array($query);
	 if($passold!=$row['password']){
		$error['fail']='Mật khẩu cũ không hợp lệ!';
	 }elseif($_POST['xnmatkhau']!=$_POST['matkhaumoi']){
		$error['failed']='Mật khẩu không trùng khớp!';
	 }else{
		$error['success']='Đổi mật khẩu thành công !';
		$password=md5($_POST['matkhaumoi'], false);
		$sql1 ="UPDATE giaovien SET password ='$password' WHERE magv='$user[magv]'";
		$row1 =mysqli_query($mysqli, $sql1);
		// $user=mysqli_fetch_array($rowkt);
		echo"<script type='text/javascript'>
		alert('Đổi mật khẩu thành công. Vui lòng đăng nhập lại!');
		document.location='../client/login.php';
	</script>";
		}
		
	 
	}
?>

		  <div class="modal fade" id="Modal" tabindex="-1"  aria-labelledby="basicModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Đổi mật khẩu</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <form action="" method="POST" >
                                <div class="modal-body">
								<span style="color:green; font-size: 13px;"><?php echo (isset($err['success'])) ? $err['success'] : '' ?></span>

								  <div class="form-password-toggle" style="margin-bottom: 1rem !important;">
										<label class="form-label" for="basic-default-password32">Mật khẩu cũ</label>
										<div class="input-group input-group-merge">
										<input
											type="password"
											class="form-control"
											id="basic-default-password32"
											placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
											aria-describedby="basic-default-password"
											name="matkhaucu"
										/>
										<span class="input-group-text cursor-pointer" id="basic-default-password"
											><i class="bx bx-hide"></i
										></span>
										</div>
										<span style="color:red; font-size: 13px;"><?php echo (isset($err['fail'])) ? $err['fail'] : '' ?></span>

									</div>
									<div class="form-password-toggle" style="margin-bottom: 1rem !important;">
										<label class="form-label" for="basic-default-password32">Mật khẩu mới</label>
										<div class="input-group input-group-merge">
										<input
											type="password"
											class="form-control"
											id="basic-default-password32"
											placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
											aria-describedby="basic-default-password"
											name="matkhaumoi"
										/>
										<span class="input-group-text cursor-pointer" id="basic-default-password"
											><i class="bx bx-hide"></i
										></span>
										</div>
									</div>
									<div class="form-password-toggle">
										<label class="form-label" for="basic-default-password32">Xác nhận mật khẩu</label>
										<div class="input-group input-group-merge">
										<input
											type="password"
											class="form-control"
											id="basic-default-password32"
											placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
											aria-describedby="basic-default-password"
											name="xnmatkhau"
										/>
										<span class="input-group-text cursor-pointer" id="basic-default-password"
											><i class="bx bx-hide"></i
										></span>
										</div>
										<span style="color:red; font-size: 13px;"><?php echo (isset($err['failed'])) ? $err['failed'] : '' ?></span>

									</div>
								  
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Huỷ
                                  </button>
                                  <button type="submit" class="btn btn-primary" name="doimatkhau">Cập nhật</button>
                                </div>
                              </form>
                            </div>
                          </div>
          </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="./assets/vendor/libs/jquery/jquery.js"></script>
    <script src="./assets/vendor/libs/popper/popper.js"></script>
    <script src="./assets/vendor/js/bootstrap.js"></script>
    <script src="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="./assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="./assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="./assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="./assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
  const tintuc__ngay = document.querySelectorAll(".tintuc__ngay")
  tintuc__ngay.forEach((element) => {
	const date = new Date(element.innerHTML)
  const yyyy = date.getFullYear()
  let mm = date.getMonth() + 1
  let dd = date.getDate()
  if ( dd <10 ) dd = '0' + dd;
  if ( mm <10 ) mm = '0' + mm;
	element.innerHTML = `${dd}/${mm}/${yyyy}`
  });
  </script>
  </body>
</html>
