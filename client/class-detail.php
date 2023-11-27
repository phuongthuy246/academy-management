
    <!-- Navbar End -->
<?php   
require('../carbon/autoload.php');

use Carbon\Carbon;
use Carbon\CarbonInterval;

$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
$user = (isset($_SESSION['dangky'])) ? $_SESSION['dangky'] : [];

if (isset($_POST['binhluan']) && !empty($user)) {
		
  $macd = $_POST['macd'];
  $noidungbl = $_POST['noidungbl'];
  $mahv = $user['mahv'];
  $product = $_GET['ma'];
  $query = "INSERT INTO binhluan( mahv, macd, noidungbl, ngaybl) VALUES ('" . $mahv . "','" . $macd . "','" . $noidungbl . "','" . $now . "')";
  mysqli_query($mysqli, $query);

    }
?>
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px"
      >
        <h3 class="display-3 font-weight-bold text-white">Cấp độ</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="index.php">Trang chủ</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Chi tiết cấp độ</p>
        </div>
      </div>
    </div>
    <!-- Header End -->
   <?php
    if (isset($_GET['ma'])) {
    $query = "SELECT * FROM capdo WHERE macd = '$_GET[ma]'";
    $datasql = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($datasql) != 0) {
        $row = mysqli_fetch_array($datasql, 1);
    ?>
    <!-- Detail Start -->
    <div class="container py-5">
      <div class="row pt-5">
        <div class="col-lg-8">
          <div class="d-flex flex-column text-left mb-3">
            <p class="section-title pr-5">
              <span class="pr-2">Trang chi tiết</span>
            </p>
            <h1 class="mb-3"><?php echo $row['tencd'] ?></h1>
            <div class="d-flex">
              
              <b class="mr-3" style="display: flex;"
                    ><i class="fa fa-user  text-primary" style=" padding-top: 2px;"></i><p style="margin: 0  0 0 5px;">  <?php echo $row['dotuoi'] ?></p></b
                  >
              <p class="mr-3"><i class="fa fa-money-bill-alt text-primary"></i> <?php echo number_format ($row['muchocphi'],0,',','.').' VND' ?> / Khoá</p>
            </div>
          </div>
          <div class="mb-5">
            <h4>
            <?php echo $row['motacd'] ?>
            </h4>
            <img
              class="img-fluid rounded w-100 mb-4"
              src="../admin/uploads/<?php echo $row['anhcd'] ?>"
              alt="Image"
            />
            
            <p>
            <?php echo nl2br($row['noidung']) ?>
            </p>
            
          </div>
        <?php
            }
          }
        ?>
       

          <!-- Comment List -->
          <?php
              $sql_bl = "SELECT * FROM binhluan, hocvien, capdo WHERE binhluan.mahv=hocvien.mahv AND binhluan.macd=capdo.macd AND binhluan.macd='" .$row['macd']."' ORDER BY mabl ASC";
              $query_bl = mysqli_query($mysqli, $sql_bl);
              $count = mysqli_num_rows($query_bl);
            ?>
          <div class="mb-5">
          <h2 class="mb-4"><?php echo $count; ?> Bình luận</h2>
          <?php  while ($row1 = mysqli_fetch_array($query_bl)){
                ?> 
            
            
            <div class="media mb-4">
              <img
                src="../admin/uploads/<?php echo $row1['anh'] ;?>"
                alt="Image"
                class="img-fluid rounded-circle mr-3 mt-1"
                style="width: 45px"
              />
              <div class="media-body">
                <h6>
                <?php echo $row1['tenhv']?> <small><i class="tintuc__ngay"><?php echo $row1['ngaybl']?></i></small>
                </h6>
                <p>
                  <?php echo $row1['noidungbl']?>
                </p>
                <!-- <button class="btn btn-sm btn-light">Reply</button> -->
              </div>
            </div>
            <?php } ?>
            
          </div>

          <!-- Comment Form -->
          <?php
					if (isset($_SESSION['dangky'])) {
					?>
          <div class="bg-light p-5">
            <h2 class="mb-4">Cảm nhận của bạn</h2>
            <form method="POST">
              
              <input type="text" name="macd" value="<?php echo $_GET['ma'] ?>" hidden required />
              <div class="form-group">
                <label for="message">Nhập mô tả *</label>
                <textarea
                  id="message"
                  cols="30"
                  rows="5"
                  class="form-control"
                  name="noidungbl"
                ></textarea>
              </div>
              <div class="form-group mb-0">
                <input
                  type="submit"
                  value="Bình luận"
                  class="btn btn-primary px-3"
                  name="binhluan"
                />
              </div>
            </form>
          </div>
          <?php
					} else {
            ?>
            <div class="bg-light p-5">
              <h2 class="mb-4">Đăng nhập để bình luận</h2>
              <form method="POST">
                
                  
                <div class="form-group mb-0">
                  <a href="login.php"
                    type="submit"
                    value="Đăng nhập"
                    class="btn btn-primary px-3"
                    name="binhluan">Đăng nhập</a>
                  
                </div>
              </form>
          </div>
          <?php
					}
					?>
            

        </div>

        <div class="col-lg-4 mt-5 mt-lg-0">
          

          <!-- Search Form -->
          <div class="mb-5">
            <form action="">
              <div class="input-group">
                <input
                  type="text"
                  class="form-control form-control-lg"
                  placeholder="Từ khoá"
                />
                <div class="input-group-append">
                  <span class="input-group-text bg-transparent text-primary"
                    ><i class="fa fa-search"></i
                  ></span>
                </div>
              </div>
            </form>
          </div>

          

          <!-- Single Image -->
          <div class="mb-5">
            <img src="img/hoctap1.jpeg" alt="" class="img-fluid rounded" />
          </div>

          <!-- Recent Post -->
          <?php
            $sql_cd = "SELECT * FROM capdo ORDER BY macd DESC";
            $query_cd = mysqli_query($mysqli, $sql_cd);
            // $row_tt = mysqli_fetch_array($query_tt);
            ?>
          <div class="mb-5">
            <h2 class="mb-4">Bài viết gần đây</h2>
            <?php
                while ($row_cd = mysqli_fetch_array($query_cd)) {
                ?>
            <div
              class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mb-3"
            >
              <img
                class="img-fluid"
                src="../admin/uploads/<?php echo $row_cd['anhcd'] ?>"
                style="width: 100px; height: 80px"
              />
              <div class="pl-3">
                <a href="index.php?page=class-detail&ma=<?php echo $row_cd['macd'] ?>" style="display:contents"><h5 class=""><?php echo $row_cd['tencd'] ?></h5></a>
                <div class="d-flex">
                  <small class="mr-3"
                    ><i class="fa fa-user  text-primary"></i> <?php echo $row_cd['dotuoi'] ?> Tuổi</small
                  >
                  <small class="mr-3"
                    ><i class="fa fa-money-bill-alt text-primary"></i> <?php echo number_format ($row['muchocphi'],0,',','.').' VND' ?> / Khoá</small
                  >
                  
                </div>
              </div>
            </div>
            <?php 
                }
                ?>
          </div>

          <!-- Single Image -->
          <div class="mb-5">
            <img src="img/hoctap.jpeg" alt="" class="img-fluid rounded" />
          </div>


          <!-- Plain Text -->
          <!-- <div>
            <h2 class="mb-4">Plain Text</h2>
            Aliquyam sed lorem stet diam dolor sed ut sit. Ut sanctus erat ea
            est aliquyam dolor et. Et no consetetur eos labore ea erat voluptua
            et. Et aliquyam dolore sed erat. Magna sanctus sed eos tempor rebum
            dolor, tempor takimata clita sit et elitr ut eirmod.
          </div> -->
        </div>
      </div>
    </div>
    <!-- Detail End -->

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
      function checkTime(i) 
      {
          if (i < 10) {
              i = "0" + i;
          }
          return i;
      }
      const tintuc__ngay = document.querySelectorAll(".tintuc__ngay")
      tintuc__ngay.forEach((element) => {
      const date = new Date(element.innerHTML)
      const yyyy = date.getFullYear()
      let mm = date.getMonth() + 1
      let dd = date.getDate()
      let h = date.getHours()
      let m = date.getMinutes()
      let s  = date.getSeconds()
          m = checkTime(m);
          s = checkTime(s);
      if ( dd <10 ) dd = '0' + dd;
      if ( mm <10 ) mm = '0' + mm;
      element.innerHTML = `${h}:${m}:${s} ${dd}-${mm}-${yyyy}`
      });
  </script>

