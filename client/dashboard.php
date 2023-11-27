	<!-- Header Start -->
	  <div class="container-fluid bg-primary px-0 px-md-5 mb-5">
      <div class="row align-items-center px-3">
        <div class="col-lg-6 text-center text-lg-left">
          <h4 class="text-white mb-4 mt-5 mt-lg-0">Trung tâm học tập cho trẻ</h4>
          <h3 class="display-3 font-weight-bold text-white" style="font-size: 3rem;">
            Phương pháp giáo dục trẻ em mới
          </h3>
          <p class="text-white mb-4">
          “Phương pháp chúng ta có thể học được nhưng điều cần nhất ở người làm giáo dục là trái tim và sự nhẫn nại”. Bằng tình yêu thương và sự nhiệt huyết với nền giáo dục toàn cầu nói chung và Việt Nam nói riêng, ToanTT chúng tôi luôn hướng đến hành trình:
                    “Kiến tạo thế hệ trẻ tri thức và hạnh phúc”.
          </p>
          <!-- <a href="" class="btn btn-secondary mt-1 py-3 px-5">Xem thêm</a> -->
        </div>
        <div class="col-lg-6 text-center text-lg-right">
          <img class="img-fluid mt-5" src="img/header.PNG" alt="" />
        </div>
      </div>
    </div>
	    <!-- Header End -->

    <!-- About Start -->
    <div class="container-fluid py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5">
            <img
              class="img-fluid rounded mb-5 mb-lg-0"
              src="img/gd.jpg"
              alt=""
            />
          </div>
          <div class="col-lg-7">
            <p class="section-title pr-5">
              <span class="pr-2">Tìm hiểu về chúng tôi</span>
            </p>
            <h1 class="mb-4">Trường học tốt nhất cho con bạn</h1>
            <p>
            ToanTT tin rằng nền tảng hạnh phúc luôn là yếu tố cần thiết nhất cho con trẻ – nơi gieo 
            cho con sự yêu thương, quan tâm, chăm sóc và chia sẻ, trang bị cho con một hành trang 
            vững chãi trên hành trình nuôi dưỡng trí tuệ, nâng niu cảm xúc. 
            </p>
            <div class="row pt-2 pb-4">
              <div class="col-6 col-md-4">
                <img class="img-fluid rounded" src="img/tre.jpeg" alt="" />
              </div>
              <div class="col-6 col-md-8">
                <ul class="list-inline m-0">
                  <li class="py-2 border-top border-bottom">
                    <i class="fa fa-check text-primary mr-3"></i>Kiến tạo thế hệ trẻ tri thức và hạnh phúc.
                  </li>
                  <li class="py-2 border-bottom">
                    <i class="fa fa-check text-primary mr-3"></i>Khơi dậy và phát triển tiềm năng con trẻ.
                  </li>
                  <li class="py-2 border-bottom">
                    <i class="fa fa-check text-primary mr-3"></i>Trí tuệ phải luôn song hành với giá trị đạo đức.
                  </li>
                </ul>
              </div>
            </div>
            <a href="index.php?page=contact" class="btn btn-primary mt-2 py-2 px-4">Xem thêm</a>
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->

    <!-- Class Start -->
    <?php
    $sql_cd = "SELECT * FROM capdo ORDER BY macd ASC";
    $query_cd = mysqli_query($mysqli, $sql_cd);
    // $row_tt = mysqli_fetch_array($query_tt);
    ?>
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Khoá học</span>
          </p>
          <h1 class="mb-4">Khoá học dành cho trẻ</h1>
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

   

    <!-- Team Start -->
    <!-- <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Our Teachers</span>
          </p>
          <h1 class="mb-4">Meet Our Teachers</h1>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3 text-center team mb-5">
            <div
              class="position-relative overflow-hidden mb-4"
              style="border-radius: 100%"
            >
              <img class="img-fluid w-100" src="img/team-1.jpg" alt="" />
              <div
                class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
              >
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-twitter"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-linkedin-in"></i
                ></a>
              </div>
            </div>
            <h4>Julia Smith</h4>
            <i>Music Teacher</i>
          </div>
          <div class="col-md-6 col-lg-3 text-center team mb-5">
            <div
              class="position-relative overflow-hidden mb-4"
              style="border-radius: 100%"
            >
              <img class="img-fluid w-100" src="img/team-2.jpg" alt="" />
              <div
                class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
              >
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-twitter"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-linkedin-in"></i
                ></a>
              </div>
            </div>
            <h4>Jhon Doe</h4>
            <i>Language Teacher</i>
          </div>
          <div class="col-md-6 col-lg-3 text-center team mb-5">
            <div
              class="position-relative overflow-hidden mb-4"
              style="border-radius: 100%"
            >
              <img class="img-fluid w-100" src="img/team-3.jpg" alt="" />
              <div
                class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
              >
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-twitter"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-linkedin-in"></i
                ></a>
              </div>
            </div>
            <h4>Mollie Ross</h4>
            <i>Dance Teacher</i>
          </div>
          <div class="col-md-6 col-lg-3 text-center team mb-5">
            <div
              class="position-relative overflow-hidden mb-4"
              style="border-radius: 100%"
            >
              <img class="img-fluid w-100" src="img/team-4.jpg" alt="" />
              <div
                class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
              >
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-twitter"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-linkedin-in"></i
                ></a>
              </div>
            </div>
            <h4>Donald John</h4>
            <i>Art Teacher</i>
          </div>
        </div>
      </div>
    </div> -->
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
      <div class="container p-0">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Chứng thực</span>
          </p>
          <h1 class="mb-4">Phụ huynh nói gì!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
          <?php $sql = "SELECT *FROM binhluan,hocvien WHERE binhluan.mahv=hocvien.mahv ORDER bY mabl ASC";
                $query = mysqli_query($mysqli,$sql);
								while ($row = mysqli_fetch_array($query)) {
								
          ?>
          <div class="testimonial-item px-3">
            <div class="bg-light shadow-sm rounded mb-4 p-4">
              <h3 class="fas fa-quote-left text-primary mr-3"></h3>
              <?php echo $row['noidungbl'];?>
            </div>
            <div class="d-flex align-items-center">
              <img
                class="rounded-circle"
                src="../admin/uploads/<?php echo $row['anh'] ;?>"
                style="width: 70px; height: 70px"
                alt="Image"
              />
              <div class="pl-3">
                <h5><?php echo $row['tenhv'];?></h5>
                <i>Học viên</i>
              </div>
            </div>
          </div>
          <?php } ?>
          <!-- <div class="testimonial-item px-3">
            <div class="bg-light shadow-sm rounded mb-4 p-4">
              <h3 class="fas fa-quote-left text-primary mr-3"></h3>
              Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr
              eirmod clita lorem. Dolor tempor ipsum clita
            </div>
            <div class="d-flex align-items-center">
              <img
                class="rounded-circle"
                src="img/testimonial-2.jpg"
                style="width: 70px; height: 70px"
                alt="Image"
              />
              <div class="pl-3">
                <h5>Parent Name</h5>
                <i>Profession</i>
              </div>
            </div>
          </div>
          <div class="testimonial-item px-3">
            <div class="bg-light shadow-sm rounded mb-4 p-4">
              <h3 class="fas fa-quote-left text-primary mr-3"></h3>
              Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr
              eirmod clita lorem. Dolor tempor ipsum clita
            </div>
            <div class="d-flex align-items-center">
              <img
                class="rounded-circle"
                src="img/testimonial-3.jpg"
                style="width: 70px; height: 70px"
                alt="Image"
              />
              <div class="pl-3">
                <h5>Parent Name</h5>
                <i>Profession</i>
              </div>
            </div>
          </div>
          <div class="testimonial-item px-3">
            <div class="bg-light shadow-sm rounded mb-4 p-4">
              <h3 class="fas fa-quote-left text-primary mr-3"></h3>
              Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr
              eirmod clita lorem. Dolor tempor ipsum clita
            </div>
            <div class="d-flex align-items-center">
              <img
                class="rounded-circle"
                src="img/testimonial-4.jpg"
                style="width: 70px; height: 70px"
                alt="Image"
              />
              <div class="pl-3">
                <h5>Parent Name</h5>
                <i>Profession</i>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
    <!-- Testimonial End -->

    <!-- Blog Start -->
    <?php
    $sql_tt = "SELECT * FROM tintuc, loaitt WHERE tintuc.maltt = loaitt.maltt  ORDER BY matt DESC LIMIT 3" ;
    $query_tt = mysqli_query($mysqli, $sql_tt);
    ?>
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Bài viết mới nhất</span>
          </p>
          <h1 class="mb-4">Tin tức - Sự kiện</h1>
        </div>
        <div class="row pb-3">
        <?php
            while ($row_tt = mysqli_fetch_array($query_tt)) {
            ?>
          <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
              <img class="card-img-top mb-2" src="../admin/uploads/<?php echo $row_tt['anhtt'] ?>" alt="" />
              <div class="card-body bg-light text-center p-4">
                <h4 class=""><?php echo $row_tt['tentt'] ?></h4>
                <div class="d-flex justify-content-center mb-3">
                  <!-- <small class="mr-3"
                    ><i class="fa fa-user text-primary"></i> Admin</small
                  >
                  <small class="mr-3"
                    ><i class="fa fa-folder text-primary"></i><?php echo $row_title['tenltt'] ?></small
                  > -->
                  <b class="mr-3" style="display: flex;"
                    ><i class="fa fa-calendar  text-primary" style=" padding-top: 2px;"></i><p class="tintuc__ngay" style="margin: 0  0 0 5px;">  <?php echo $row_tt['ngaytt'] ?></p></b
                  >
                </div>
                <p>
                  <?php echo $row_tt['motatt'] ?>
                </p>
                <a href="index.php?page=blog-detail&blog=<?php echo $row_tt['matt'] ?>" class="btn btn-primary px-4 mx-auto my-2"
                  >Chi tiết</a
                >
              </div>
            </div>
          </div>
          <?php
            }
            ?>
          
        </div>
      </div>
    </div>
    <!-- Blog End -->
    <script>
  const tintuc__ngay = document.querySelectorAll(".tintuc__ngay")
  tintuc__ngay.forEach((element) => {
	const date = new Date(element.innerHTML)
  const yyyy = date.getFullYear()
  let mm = date.getMonth() + 1
  let dd = date.getDate()
  if ( dd <10 ) dd = '0' + dd;
  if ( mm <10 ) mm = '0' + mm;
	element.innerHTML = `${dd}-${mm}-${yyyy}`
  });
  function myFunction() {
  alert("Bạn cần đăng ký tài khoản !");
}
  </script>