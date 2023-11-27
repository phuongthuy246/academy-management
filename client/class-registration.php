
<?php
include("../admin/config/config.php");
require('../carbon/autoload.php');
use Carbon\Carbon;
use Carbon\CarbonInterval;


$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

$user = (isset($_SESSION['dangky'])) ? $_SESSION['dangky'] : [];
$mahv=$user['mahv'];
$lop= $_POST['lop'];
$tenph = $_POST['tenph'];
// $emailph = $_POST['emailph'];
// $sdtph=$_POST['sdtph'];
// $hocphi=$_POST['muchocphi'];
if (isset($_POST['dangkyhoc'])) {
$sql_dangkyl="INSERT INTO phieudangki(mahv, mal, tenph, ngaydk) VALUE('".$mahv."','".$lop."','".$tenph."', '".$now."')";
mysqli_query($mysqli,$sql_dangkyl);

if ($sql_dangkyl) {
  echo "<script type='text/javascript'>
      document.location='index.php?page=payment';</script>";
  // $_SESSION['dangkyl'] = $tenph;
  // $_SESSION['lop'] = $lop;
  // $_SESSION['hocphi'] = $hocphi;

  $_SESSION['map'] = mysqli_insert_id($mysqli);
// header("Location:index.php");
// if($sql){
//   echo "<script type='text/javascript'>
//   alert('Đăng ký lớp học thành công. Mời bạn lại trung tâm để tiến hành đóng học phí và nhập học.');
//   document.location='index.php'";
// }
}
}
?>
<?php
                      $sql = "SELECT * FROM capdo WHERE macd = '$_GET[ma]'" ;
                      $query = mysqli_query($mysqli, $sql);
                      $rowc = mysqli_fetch_array($query);
                      // $_SESSION['hocphi']=$rowc['muchocphi'];
                      // $_SESSION['cd']=$rowc['tencd'];
                      ?>
<div class="container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px"
      >
        <h3 class="display-3 font-weight-bold text-white">Đăng ký <?php echo $rowc['tencd'];?></h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="index.php">Trang chủ</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Đăng ký</p>
        </div>
      </div>
</div>



    <div class="container-fluid py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <p class="section-title pr-5">
              <span class="pr-2">Đăng ký</span>
            </p>
            <h1 class="mb-4">Đăng ký lớp học cho trẻ</h1>
            <p>
			            Chương trình toán trí tuệ ToanTT dành cho trẻ trong độ tuổi từ 4-12 tuổi tương ứng với những cấp độ khác nhau. Càng cho trẻ tham gia phương pháp sớm, sự phát triển vượt trội sẽ khác biệt với bạn bè cùng lứa tuổi :
            </p>
            <ul class="list-inline m-0">
              <li class="py-2">
                <i class="fa fa-check text-success mr-3"></i>Khả năng tập trung.
              </li>
              <li class="py-2">
                <i class="fa fa-check text-success mr-3"></i>Khả năng ghi nhớ, tưởng tượng.
              </li>
              <li class="py-2">
                <i class="fa fa-check text-success mr-3"></i>Tư duy logic.
              </li>
            </ul>
            <!-- <a href="" class="btn btn-primary mt-4 py-2 px-4">Book Now</a> -->
          </div>
          <div class="col-lg-6">
            <div class="card border-0">
              <div class="card-header bg-secondary text-center p-4">
                <h1 class="text-white m-0">Đăng ký lớp học</h1>
              </div>
              <div class="card-body rounded-bottom bg-primary p-5">
                <form method="POST" >
                <div class="form-group">
                  <label style="color:white;">Tên trẻ</label>
                    <input
                      type="text"
                      class="form-control border-0 p-4"
                      value="<?php echo $user['tenhv']; ?>"
                      disabled
                    
                    />
                  </div>
                  <div class="form-group">
                    <label style="color:white;">Tên phụ huynh</label>
                    <input
                      type="text"
                      class="form-control border-0 p-4"
                      placeholder=""
                      name="tenph"
                    />
                  </div>
                  <!-- <div class="form-group">
                    <label style="color:white;">Email phụ huynh</label>
                    <input
                      type="email"
                      class="form-control border-0 p-4"
                      name="emailph"
                      placeholder=""
                    />
                  </div>
                  <div class="form-group">
                    <label style="color:white;">Số điện thoại phụ huynh</label>
                    <input
                      type="text"
                      class="form-control border-0 p-4"
                      placeholder="" 
                      name="sdtph"
                      
                    />
                  </div> -->
                  <div class="form-group">
                  <label style="color:white;">Cấp độ</label>
                    <input
                      type="text"
                      class="form-control border-0 p-4"
                      value="<?php echo $rowc['tencd']; ?>"
                      disabled
                    
                    />
                  </div>
                  <div class="form-group">
                  <label style="color:white;">Học phí</label>
                    <input
                    name="muchocphi"
                      type="text"
                      class="form-control border-0 p-4"
                      value="<?php echo number_format ($rowc['muchocphi'],0,',','.').' VND' ?>"
                      disabled
                    
                    />
                  </div>
                  <div class="form-group">
                    <label style="color:white;">Lớp</label>
                    <select
                      class="custom-select border-0 px-4"
                      style="height: 47px"
                      name="lop"
                    >
                      <!-- <option selected>Chọn lớp</option> -->
                      
                      <?php
                      $sql = "SELECT * FROM lophoc WHERE lophoc.macd = '$_GET[ma]' ORDER BY mal ASC" ;
                      $query = mysqli_query($mysqli, $sql);
                      while ($row = mysqli_fetch_array($query)) {
                      ?>
                      <option value="<?php echo $row['mal'] ?>" ><?php echo $row['tenl'] ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div>
                    <button
                      class="btn btn-secondary btn-block border-0 py-3"
                      type="submit"
                      name="dangkyhoc">
                      Đăng ký
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 
    <!-- Registration End -->


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
 