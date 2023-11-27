
<?php
$sql_cd = "SELECT * FROM capdo ORDER BY macd ASC";
$query_cd = mysqli_query($mysqli, $sql_cd);
// $row_tt = mysqli_fetch_array($query_tt);
?>
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px"
      >
        <h3 class="display-3 font-weight-bold text-white">Chương trình học</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="index.php">Trang chủ</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Chương trình học</p>
        </div>
      </div>
    </div>
    <!-- Header End -->

    <!-- Class Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Khoá học</span>
          </p>
          <h1 class="mb-4">Tìm hiểu khoá học dành cho trẻ</h1>
        </div>
        <div class="row">
              <?php
                while ($row_cd = mysqli_fetch_array($query_cd)) {
                ?>
          <div class="col-lg-4 mb-5">
            <div class="card border-0 bg-light shadow-sm pb-2">
              <a href="index.php?page=class-detail&ma=<?php echo $row_cd['macd'] ?>"><img class="card-img-top mb-2" src="../admin/uploads/<?php echo $row_cd['anhcd'] ?>" alt="" /></a>
              <div class="card-body text-center">
              <a href="index.php?page=class-detail&ma=<?php echo $row_cd['macd'] ?>" style="display:contents"><h4 class="card-title"><?php echo $row_cd['tencd'] ?></h4></a>
                <p class="card-text">
                <?php echo $row_cd['motacd'] ?>
                </p>
              </div>
              <div class="card-footer bg-transparent py-4 px-5">
                <div class="row border-bottom">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Độ tuổi</strong>
                  </div>
                  <div class="col-6 py-1"><?php echo $row_cd['dotuoi'] ?></div>
                </div>
                
                <div class="row">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Mức học phí</strong>
                  </div>
                  <div class="col-6 py-1"><?php echo number_format ($row_cd['muchocphi'],0,',','.').' VND' ?> / Khoá</div>
                </div>
              </div>
              <?php
					if (isset($_SESSION['dangky'])) {
					?>
              <a href="index.php?page=class-registration&ma=<?php echo $row_cd['macd']?>" class="btn btn-primary px-4 mx-auto mb-4">Đăng ký</a>
              <?php
					} else {
            ?>
            <button class="btn btn-primary px-4 mx-auto mb-4" onclick="myFunction()" >Đăng ký</button>

          
          
            <?php
					}
					?>
            </div>
          </div>
          <?php 
          }
          ?>
          
        </div>
      </div>
    </div>
    <!-- Class End -->
    <!-- <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalToggleLabel">Modal 1</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Show a second modal and hide this one with the button below.
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" data-bs-target="#modalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Open second modal</button>
                </div>
              </div>
            </div>
          </div> -->
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
function myFunction() {
  alert("Bạn cần đăng nhập tài khoản !");
}
</script>
 