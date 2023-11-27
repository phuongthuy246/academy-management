
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>ToanTT - Website học tập dành cho trẻ</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../admin/assets/vendor/fonts/boxicons.css" />


    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />

  </head>



 

  <?php
// include('../admincp/config/config.php');
  session_start();
  // $user = [];
  $user = (isset($_SESSION['dangky'])) ? $_SESSION['dangky'] : [];

  if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangky']);
    header('Location:index.php');
  }
  ?>
<style>
  .btn-his{
    font-weight: bold;
    border: none;
    background-color: #ebfcff;
    color: var(--primary);
}
.btn-his:focus{
  outline: none;
}
.timkim:focus {
    color: #495057;
    background-color: #fff;
    border-color: #63d9ec;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.25);
}
.timkiem2:focus{
  outline: 0;
  border-color: none;
}
  </style>
  <body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
      <nav
        class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5"
      >
        <a
          href="index.php"
          class="navbar-brand font-weight-bold text-secondary"
          style="font-size: 50px"
        >
          <i class="flaticon-043-teddy-bear"></i>
          <span class="text-primary">Toan.tt</span>
        </a>
        <button
          type="button"
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-between "
          id="navbarCollapse"
        >
        <!-- tim kiem -->
        <!-- <div>
            <form class="timkim" action="index.php?page=search"  method="post" style="display:flex;padding-left: 55px" >
              <input class="form-control" type="" name="tukhoa" style="
                          border-radius: 18px 0 0 18px;
                          border: 1px solid #17a2b8;
                          background-color: #f8f9fa;
                          border-right: none;
                      " placeholder="Tìm kiếm..."/>
              <button type="submit" class="btn" style="
                          border-radius: 0 18px 18px 0;
                          border: 1px solid #17a2b8;
                          background-color: #f8f9fa;
                          border-left: none;
                          color: #17a2b8;
                      " name="timkiem"> <i class="fas fa-search"></i></button>

            </form>

          </div> -->
          
          <div class="navbar-nav font-weight-bold mx-auto py-0">
            <a href="index.php" class="nav-item nav-link active">Trang chủ</a>
            <!-- <a href="about.html" class="nav-item nav-link">About</a> -->
            <a href="index.php?page=class" class="nav-item nav-link">Chương trình học</a>
            <!-- <a href="index.php?page=single" class="nav-item nav-link">Giáo viên</a> -->
            <!-- <a href="index.php?page=blog" class="nav-item nav-link">Tin tức</a> -->

            <div class="nav-item blog-dropdown">
              <a href="" class=" nav-link dropdown-toggle">Tin tức - Sự kiện</a>
              <?php
                  include("../admin/config/config.php");
                  $sql_loaitt = "SELECT * FROM loaitt ORDER BY maltt ASC";
                  $query_loaitt = mysqli_query($mysqli, $sql_loaitt);
                  ?>
              <div class="flag-dropdown">
                  <ul style="padding-left: 0px; margin: 0px">
                  <?php
                  while ($row_loaitt = mysqli_fetch_array($query_loaitt)) {
                  ?>
                      <li><a href="index.php?page=blog&ma=<?php echo $row_loaitt['maltt'];?>"><?php echo $row_loaitt['tenltt']?></a></li>
                      <?php
                }
                ?>
                      
                      <!-- <li><a href="../admin/register.php">Lịch sử đăng ký</a></li>
                      <li><a href="index.php?dangxuat=1">Đăng xuất</a></li> -->
                      
                  </ul>
              </div>  
            </div>

            <!-- <a href="index.php?page=contact" class="nav-item nav-link">Cẩm nang</a> -->

            <div class="nav-item blog-dropdown">
              <a href="" class=" nav-link dropdown-toggle">Cẩm nang</a>
              <?php
                  include("../admin/config/config.php");
                  $sql_loaicn = "SELECT * FROM loaicamnang ORDER BY malcn ASC";
                  $query_loaicn = mysqli_query($mysqli, $sql_loaicn);
                  ?>
              <div class="flag-dropdown">
                  <ul style="padding-left: 0px; margin: 0px">
                  <?php
                  while ($row_loaicn = mysqli_fetch_array($query_loaicn)) {
                  ?>
                      <li><a href="index.php?page=handbook&ma=<?php echo $row_loaicn['malcn'];?>"><?php echo $row_loaicn['tenlcn']?></a></li>
                      <?php
                }
                ?>
                      
                      <!-- <li><a href="../admin/register.php">Lịch sử đăng ký</a></li>
                      <li><a href="index.php?dangxuat=1">Đăng xuất</a></li> -->
                      
                  </ul>
              </div>  
            </div>

            <a href="index.php?page=contact" class="nav-item nav-link">Liên hệ</a>
            <div class="btn-login">
									<button style="padding: 30px 15px;
                              outline: none;
                              border: none;
                              background-color: #f8f9fa;" class="btn-login-main" onclick="document.getElementById('id01').style.display='block'" >
                  <i class="fas fa-search" style="color:#14a2b8"></i>
                  </button>
            </div>
          </div>
         
          
          <!-- <div class="btn-login">
									<button style="padding: 30px 15px;
                              outline: none;
                              border: none;
                              background-color: #f8f9fa;" class="btn-login-main" onclick="document.getElementById('id01').style.display='block'" >
                  <i class="fas fa-search" style="color:#14a2b8"></i>
                  </button>
            </div> -->
          <?php if (isset($user['username'])) { ?>
          <div class="language-option">
            <img src="../admin/uploads/<?php echo $user['anh'] ?>" alt="">
            <span > <?php echo $user['username'] ; ?> <i class="fa fa-angle-down"></i></span>
            <div class="flagg-dropdown">
                <ul style="padding-left: 0px; margin: 0px">
                    <li><a href="index.php?page=infor-user&mahv=<?php echo $user['mahv'] ?>">Hồ sơ</a></li>
                    <li><a href="index.php?page=history&mahv=<?php echo $user['mahv'] ?>">Lịch sử đăng ký</a></li>
                    <li><a href="index.php?page=changepassword&mahv=<?php echo $user['mahv'] ?>">Đổi mật khẩu</a></li>
                    <li><a href="index.php?dangxuat=1">Đăng xuất</a></li>
                    
                </ul>
            </div>
        </div>
        <?php } else { ?>
        <div class="language-option">
            <img src="img/user1.jpg" alt="">
            <span>Tài khoản <i class="fa fa-angle-down"></i></span>
            <div class="flagg-dropdown">
                <ul style="padding-left: 0px; margin: 0px">
                    <li><a class="btn-hdangnhap" href="login.php">Đăng nhập</a></li>
                    <li><a class="btn-hdangnhap" href="register.php">Đăng ký</a></li>
                    <li><a class="btn-hdangnhap" href="forgot-psw.php">Quên mật khẩu</a></li>
                    <!-- <li><a href="../admin/register.php">Đăng ký</a></li> -->
                </ul>
            </div>
        </div>
        <?php } ?>
        </div>
      </nav>
    </div>
    <!-- Navbar End -->

    <?php
    
		        include("../admin/config/config.php");

		        include("main.php");
		?>
   

   



    <!-- Modal-dangnhap -->


<!-- Modal-dangky -->


<div id="id01" class="search-model" style="position: fixed;
                                      width: 100%;
                                      height: 100%;
                                      left: 0;
                                      top: 0;
                                      background: #000;
                                      z-index: 99999;
                                      display: none;">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch" style="position: absolute;
                                        width: 50px;
                                        height: 50px;
                                        background: #333;
                                        color: #fff;
                                        text-align: center;
                                        border-radius: 50%;
                                        font-size: 28px;
                                        line-height: 28px;
                                        top: 30px;
                                        cursor: pointer;
                                        display: -webkit-box;
                                        display: -ms-flexbox;
                                        display: flex;
                                        -webkit-box-align: center;
                                        -ms-flex-align: center;
                                        align-items: center;
                                        -webkit-box-pack: center;
                                        -ms-flex-pack: center;
                                        justify-content: center;" onclick="document.getElementById('id01').style.display='none'" ><i class="fas fa-times"></i></div>
            <form class="search-model-form" action="index.php?page=search" method="POST" style="padding: 0 15px;">
                <input class="timkiem2" type="text" id="search-input" placeholder="Tìm kiếm....." name="tukhoa" style ="width: 500px;
                              font-size: 40px;
                              border: none;
                              border-bottom: 2px solid #333;
                              background: none;
                              color: #999;">
                <button class="search-btn" type="submit" name="timkiem" hidden="" required="">
				</button>
            </form>
            
        </div>
    </div>




    <!-- Footer Start -->
    <div
      class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
      <div class="row pt-5">
        <div class="col-lg-3 col-md-6 mb-5">
          <a
            href=""
            class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0"
            style="font-size: 40px; line-height: 40px"
          >
            <i class="flaticon-043-teddy-bear"></i>
            <span class="text-white">Toan.tt</span>
          </a>
          <p>
          Toan.tt là nơi học sinh rèn luyện để phát triển tư duy, trí tuệ thông qua Toán học. Dành cho học sinh từ 3-12 tuổi.
          </p>
          <div class="d-flex justify-content-start mt-4">
            <a
              class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="#"
              ><i class="fab fa-twitter"></i
            ></a>
            <a
              class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="#"
              ><i class="fab fa-facebook-f"></i
            ></a>
            <a
              class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="#"
              ><i class="fab fa-linkedin-in"></i
            ></a>
            <a
              class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="#"
              ><i class="fab fa-instagram"></i
            ></a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
          <h3 class="text-primary mb-4">Liên hệ</h3>
          <div class="d-flex">
            <h4 class="fa fa-map-marker-alt text-primary"></h4>
            <div class="pl-3">
              <h5 class="text-white">Địa chỉ</h5>
              <p>123 Đường 30/4, Phường Hưng Lợi, Ninh Kiều, TP. Cần Thơ</p>
            </div>
          </div>
          <div class="d-flex">
            <h4 class="fa fa-envelope text-primary"></h4>
            <div class="pl-3">
              <h5 class="text-white">Email</h5>
              <p>cskh@toantt.edu.com</p>
            </div>
          </div>
          <div class="d-flex">
            <h4 class="fa fa-phone-alt text-primary"></h4>
            <div class="pl-3">
              <h5 class="text-white">Phone</h5>
              <p>+012 345 67890</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
          <h3 class="text-primary mb-4">Liên kết</h3>
          <div class="d-flex flex-column justify-content-start">
            <a class="text-white mb-2" href="index.php"
              ><i class="fa fa-angle-right mr-2"></i>Trang chủ</a
            >
            <a class="text-white mb-2" href="index.php?page=contact"
              ><i class="fa fa-angle-right mr-2"></i>Về chúng tôi</a
            >
            <a class="text-white mb-2" href="index.php?page=class"
              ><i class="fa fa-angle-right mr-2"></i>Chương trình học</a
            >
            <a class="text-white mb-2" href="#"
              ><i class="fa fa-angle-right mr-2"></i>Giáo viên</a
            >
            <a class="text-white mb-2" href="index.php?page=blog"
              ><i class="fa fa-angle-right mr-2"></i>Tin tức</a
            >
            <!-- <a class="text-white" href="#"
              ><i class="fa fa-angle-right mr-2"></i>Liên hệ</a
            > -->
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
          <h3 class="text-primary mb-4">Đăng ký nhận thông tin</h3>
          <form action="">
            <!-- <div class="form-group">
              <input
                type="text"
                class="form-control border-0 py-4"
                placeholder="Your Name"
                required="required"
              />
            </div> -->
            <div class="form-group">
              <input
                type="email"
                class="form-control border-0 py-4"
                placeholder="Nhập email của bạn"
                required="required"
              />
            </div>
            <div>
              <button
                class="btn btn-primary btn-block border-0 py-3"
                type="submit"
              >
                Gửi
              </button>
            </div>
          </form>
        </div>
      </div>
      <!-- <div
        class="container-fluid pt-5"
        style="border-top: 1px solid rgba(23, 162, 184, 0.2) ;"
        >
        <p class="m-0 text-center text-white">
          &copy;
          <a class="text-primary font-weight-bold" href="#">Your Site Name</a>.
          All Rights Reserved.

          Designed by
          <a class="text-primary font-weight-bold" href="https://htmlcodex.com"
            >HTML Codex</a
          >
          <br />Distributed By:
          <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
        </p>
      </div> -->
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"
      ><i class="fa fa-angle-double-up"></i
    ></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    
  </body>
</html>
