<?php
// include('../admin/config/config.php');
$user = (isset($_SESSION['dangky'])) ? $_SESSION['dangky'] : [];
$tieude= $_POST['tieude'];
$noidung= $_POST['loinhan'];
$mahv = $user['mahv'];

if (isset($_POST['hoidap']) && !empty($user)) {
	$sql_them = "INSERT INTO hoidap(tieude,noidung,mahv) VALUES ('$tieude','$noidung','$mahv')";
	mysqli_query($mysqli, $sql_them);
	header('Location:index.php');
}

else {
	$ma = $_GET['mal'];
	$sql_xoa = "DELETE FROM lophoc WHERE mal='" . $ma . "'";
	mysqli_query($mysqli, $sql_xoa);
	header('Location:index.php?action=quanlylichhoc&query=danhsach');
}
?>
   
   
   <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px"
      >
        <h3 class="display-3 font-weight-bold text-white">Liên hệ chúng tôi</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="index.php">Trang chủ</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Liên hệ chúng tôi</p>
        </div>
      </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Gửi lời nhắn cho Toan.TT</span>
          </p>
          <h1 class="mb-4">Toan.tt đồng hành cùng bạn</h1>
        </div>
        <div class="row">
          <div class="col-lg-7 mb-5">
            <div class="contact-form">
              <!-- <div id="success"></div> -->
              <form method="POST" >
                
                <div class="control-group">
                  <input
                    type="text"
                    class="form-control"
                    name="tieude"
                    placeholder="Tiêu đề"
                    required="required"
                  
                  />
                  <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                  <textarea
                    class="form-control"
                    rows="6"
                    name="loinhan"
                    placeholder="Lời nhắn"
                    required="required"
                    
                  ></textarea>
                  <p class="help-block text-danger"></p>
                </div>
                <?php if (isset($_SESSION['dangky'])) {
					?>
                <div>
                  <button
                    class="btn btn-primary py-2 px-4"
                    type="submit"
                    id="sendMessageButton"
                    name="hoidap"
                  >
                    Gửi đi
                  </button>
                </div>
                <?php
					} else {
            ?>
            <div>
                  <button
                    class="btn btn-primary py-2 px-4"
                    onclick="myFunction1()" 
                  >
                    Gửi đi
                  </button>
                </div>
                <?php 
          }
          ?>
              </form>
            </div>
          </div>
          <div class="col-lg-5 mb-5">
            <p>
            Toan.tt là nơi học sinh rèn luyện để phát triển tư duy, trí tuệ thông qua Toán học. Dành cho học sinh từ 3-12 tuổi.

            </p>
            <div class="d-flex">
              <i
                class="fa fa-map-marker-alt d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle"
                style="width: 45px; height: 45px"
              ></i>
              <div class="pl-3">
                <h5>Địa chỉ</h5>
                <p>123 Đường 30/4, Phường Hưng Lợi, Ninh Kiều, TP. Cần Thơ</p>
              </div>
            </div>
            <div class="d-flex">
              <i
                class="fa fa-envelope d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle"
                style="width: 45px; height: 45px"
              ></i>
              <div class="pl-3">
                <h5>Email</h5>
                <p>cskh@toantt.edu.com</p>
              </div>
            </div>
            <div class="d-flex">
              <i
                class="fa fa-phone-alt d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle"
                style="width: 45px; height: 45px"
              ></i>
              <div class="pl-3">
                <h5>Điện thoại</h5>
                <p>+012 345 67890</p>
              </div>
            </div>
            <div class="d-flex">
              <i
                class="far fa-clock d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle"
                style="width: 45px; height: 45px"
              ></i>
              <div class="pl-3">
                <h5>Giờ mở cửa</h5>
                <strong>Thứ 2 - Chủ nhật:</strong>
                <p class="m-0">08:00 AM - 05:00 PM</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Contact End -->

    <!-- Footer Start -->
    
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

    <script>
function myFunction1() {
  alert("Bạn cần đăng ký tài khoản !");
}
</script>