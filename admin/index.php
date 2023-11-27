<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
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

    <title>Toan.tt - Admin</title>

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
$user = (isset($_SESSION['nhanvien'])) ? $_SESSION['nhanvien'] : [];


if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['nhanvien']);
    header('Location:../client/index.php');
}

?>

<style>

.layout-wrapper:not(.layout-horizontal) .bg-menu-theme .menu-inner>.menu-item.active::before {
    content: "";
    position: absolute;
    right: 0;
    width: 0.25rem;
    height: 2.5rem;
    border-radius: 0.375rem 0 0 0.375rem;
}
.bg-menu-theme .menu-inner>.menu-item.active::before {
    background: #696cff;
}
  .menu.bg-primary {
  background-color: #696cff !important;
  color: #e0e1ff;
}
.menu.bg-primary .menu-link,
.menu.bg-primary .menu-horizontal-prev,
.menu.bg-primary .menu-horizontal-next {
  color: #e0e1ff;
}
.menu.bg-primary .menu-link:hover, .menu.bg-primary .menu-link:focus,
.menu.bg-primary .menu-horizontal-prev:hover,
.menu.bg-primary .menu-horizontal-prev:focus,
.menu.bg-primary .menu-horizontal-next:hover,
.menu.bg-primary .menu-horizontal-next:focus {
  color: #fff;
}
.menu.bg-primary .menu-link.active,
.menu.bg-primary .menu-horizontal-prev.active,
.menu.bg-primary .menu-horizontal-next.active {
  color: #fff;
}
.menu.bg-primary .menu-item.disabled .menu-link,
.menu.bg-primary .menu-horizontal-prev.disabled,
.menu.bg-primary .menu-horizontal-next.disabled {
  color: #b0b2ff !important;
}
.menu.bg-primary .menu-item.open:not(.menu-item-closing) > .menu-toggle,
.menu.bg-primary .menu-item.active > .menu-link {
  color: #fff;
}
.menu.bg-primary .menu-item.active > .menu-link:not(.menu-toggle) {
  background-color: #6d70ff;
}
.menu.bg-primary.menu-horizontal .menu-sub > .menu-item.active > .menu-link:not(.menu-toggle) {
  background-color: #7174ff;
}
.menu.bg-primary.menu-horizontal .menu-inner .menu-item:not(.menu-item-closing) > .menu-sub, .menu.bg-primary.menu-horizontal .menu-inner .menu-item.open > .menu-toggle {
  background: #6d70ff;
}
.menu.bg-primary .menu-inner > .menu-item.menu-item-closing .menu-item.open .menu-sub,
.menu.bg-primary .menu-inner > .menu-item.menu-item-closing .menu-item.open .menu-toggle {
  background: transparent;
  color: #e0e1ff;
}
.menu.bg-primary .menu-inner-shadow {
  background: linear-gradient(#696cff 41%, rgba(105, 108, 255, 0.11) 95%, rgba(105, 108, 255, 0));
}
.menu.bg-primary .menu-text {
  color: #fff;
}
.menu.bg-primary .menu-header {
  color: #c2c4ff;
}
.menu.bg-primary hr,
.menu.bg-primary .menu-divider,
.menu.bg-primary .menu-inner > .menu-item.open > .menu-sub::before {
  border-color: rgba(255, 255, 255, 0.15) !important;
}
.menu.bg-primary .menu-inner > .menu-header::before {
  background-color: rgba(255, 255, 255, 0.15);
}
.menu.bg-primary .menu-block::before {
  background-color: #c2c4ff;
}
.menu.bg-primary .menu-inner > .menu-item.open .menu-item.open > .menu-toggle::before {
  background-color: #8385ff;
}
.menu.bg-primary .menu-inner > .menu-item.open .menu-item.active > .menu-link::before {
  background-color: #fff;
}
.menu.bg-primary .menu-inner > .menu-item.open .menu-item.open > .menu-toggle::before,
.menu.bg-primary .menu-inner > .menu-item.open .menu-item.active > .menu-link::before {
  box-shadow: 0 0 0 2px #6d70ff;
}

.menu-link:focus{
background-color: #e7e7ff;
color: #696cff;

}
</style>
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.php" class="app-brand-link">
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
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Khoá học</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="index.php?action=quanlycapdo&query=danhsach" class="menu-link">
                    <div data-i18n="Without menu">Cấp độ</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="index.php?action=quanlylop&query=danhsach" class="menu-link">
                    <div data-i18n="Without navbar">Lớp</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="index.php?action=quanlykynang&query=danhsach" class="menu-link">
                    <div data-i18n="Container">Kĩ năng</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Tin tức</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="index.php?action=quanlyltintuc&query=danhsach" class="menu-link">
                    <div data-i18n="Account">Loại tin</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="index.php?action=quanlytintuc&query=danhsach" class="menu-link">
                    <div data-i18n="Notifications">Tin tức</div>
                  </a>
                </li>
                
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Cẩm nang</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="index.php?action=quanlylcamnang&query=danhsach" class="menu-link">
                    <div data-i18n="Account">Loại cẩm nang</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="index.php?action=quanlycamnang&query=danhsach" class="menu-link">
                    <div data-i18n="Notifications">Cẩm nang</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Pages</span>
            </li>
            <li class="menu-item">
              <a href="index.php?action=quanlygiaovien&query=danhsach" class="menu-link">
              <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Basic">Giáo viên</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="index.php?action=quanlylichhoc&query=danhsach" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Tables">Lịch học</div>
              </a>
            </li>
            
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>
            
            <li class="menu-item">
              <a href="index.php?action=quanlyhocvien&query=danhsach" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">Học viên</div>
              </a>
            </li>
          

            <li class="menu-item">
              <a href="index.php?action=quanlydangky&query=danhsach" class="menu-link">
                <i class="menu-icon tf-icons bx bx-crown"></i>
                <div data-i18n="Boxicons">Đăng ký lớp</div>
              </a>
            </li>

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
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <!-- <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div> -->
              </div>
              <!-- /Search -->

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
                      <img src="./assets/img/avatars/avatar.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="./assets/img/avatars/avatar.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                         
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $user['tennv']; ?></span>
                            <small class="text-muted">Admin</small>
                          </div>
                          
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#Modal">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">Hồ sơ</span>
                      </a>
                    </li>
                    <!-- <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
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
                
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <?php
		        include("./config/config.php");

		        include("main.php");
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
