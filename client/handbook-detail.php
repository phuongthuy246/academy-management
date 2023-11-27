
    <!-- Navbar End -->
	<?php
if (isset($_GET['handbook'])) {
  $query = "SELECT * FROM camnang, loaicamnang WHERE camnang.malcn = camnang.malcn AND camnang.macn= '$_GET[handbook]'";
  $datasql = mysqli_query($mysqli, $query);
  if (mysqli_num_rows($datasql) != 0) {
    $row = mysqli_fetch_array($datasql, 1);
  ?>
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white"><?php echo $row['tenlcn']; ?></h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="index.php">Trang chủ</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Chi tiết</p>
        </div>
      </div>
    </div>
    <!-- Header End -->
    
    <!-- Detail Start -->
    <div class="container py-5">
      <div class="row pt-5">
        <div class="col-lg-8">
          <div class="d-flex flex-column text-left mb-3">
            <p class="section-title pr-5">
              <span class="pr-2"><?php echo $row['tenlcn'] ?></span>
            </p>
            <h1 class="mb-3"><?php echo $row['tencn'] ?></h1>
            <div class="d-flex">
              <b class="mr-3" style="display: flex;"
                    ><i class="fa fa-calendar  text-primary" style=" padding-top: 2px;"></i><p class="tintuc__ngay" style="margin: 0  0 0 5px;">  <?php echo $row['ngaycn'] ?></p></b
                  >
            </div>
          </div>
          <div class="mb-5">
            <h4>
            <?php echo substr($row['noidungcn'], 0 ,190) ?>
            </h4>
            <img
              class="img-fluid rounded w-100 mb-4"
              src="../admin/uploads/<?php echo $row['anhcn'] ?>"
              alt="Image"
            />
            
            <p>
            <?php echo nl2br($row['noidungcn']) ?>
            </p>
            
          </div>
        <?php
            }
          }
        ?>
        
        
        </div>

        <div class="col-lg-4 mt-5 mt-lg-0">

          <!-- Search Form -->
          <div class="mb-5">
            <form action="index.php?page=search-handbook" method="post" >
              <div class="input-group">
                <input
                  name="tukhoa"
                  type="text"
                  class="form-control form-control-lg"
                  placeholder="Từ khoá"
                />
                <div class="input-group-append">
                  
                  <button type="submit" name="timkiem" class="input-group-text bg-transparent text-primary"
                    ><i class="fa fa-search"></i
                  ></button>
                </div>
              </div>
            </form>
          </div>

          <!-- Category List -->
          <?php
                  $sql_loaitt = "SELECT * FROM loaicamnang ORDER BY malcn ASC";
                  $query_loaitt = mysqli_query($mysqli, $sql_loaitt);
                  // $loai=$row_loaitt['maltt'];
                  // $sql_loaitt = "SELECT * FROM tintuc, loaitt WHERE tintuc.maltt = loaitt.maltt " ;
                  // $query_loaitt= mysqli_query($mysqli, $sql_loaitt);
	                // $count = mysqli_num_rows($query_loaitt);
                  ?>
          <div class="mb-5">
            <h2 class="mb-4">Danh mục</h2>
            <ul class="list-group list-group-flush">
            <?php
                  while ($row_loaitt = mysqli_fetch_array($query_loaitt)) {
                  ?>
              <li
                class="list-group-item d-flex justify-content-between align-items-center px-0"
              >
                <a href="index.php?page=handbook&ma=<?php echo $row_loaitt['malcn'];?>"><?php echo $row_loaitt['tenlcn']?></a>
                <?php
                    // $sql = mysqli_query($mysqli,"SELECT *FROM tintuc, loaitt WHERE tintuc.maltt=loaitt.maltt AND tintuc.matt = '$_GET[ma]'");
                    // $count = mysqli_num_rows($sql);
                ?>
                <?php 
                  $sql_l = "SELECT * FROM camnang, loaicamnang WHERE camnang.malcn = loaicamnang.malcn AND loaicamnang.malcn= '$row_loaitt[malcn]'" ;
                  $query_l= mysqli_query($mysqli, $sql_l);
	                $count = mysqli_num_rows($query_l); ?> 
                <span class="badge badge-primary badge-pill"><?php echo $count ?></span>
              </li>
              <?php }
              ?>
            </ul>
          </div>

          <!-- Single Image -->
          <div class="mb-5">
            <img src="img/hoc.jpeg" alt="" class="img-fluid rounded" />
          </div>

          <!-- Recent Post -->
          <?php
            $sql_tint = "SELECT * FROM camnang, loaicamnang WHERE camnang.malcn = loaicamnang.malcn ORDER BY macn DESC LIMIT 3" ;
            $query_tint = mysqli_query($mysqli, $sql_tint);
            // $row_tt = mysqli_fetch_array($query_tt);
            ?>
          <div class="mb-5">
            <h2 class="mb-4">Bài viết mới nhất</h2>
            <?php
                while ($row_tint = mysqli_fetch_array($query_tint)) {
                ?>
            <div
              class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mb-3"
            >
              <img
                class="img-fluid"
                src="../admin/uploads/<?php echo $row_tint['anhcn'] ?>"
                style="width: 100px; height: 80px"
              />
              <div class="pl-3">
                <a href="index.php?page=blog-detail&blog=<?php echo $row_tint['macn'] ?>" style="display:contents"><h6 class=""><?php echo $row_tint['tencn'] ?></h6>
                <div class="d-flex">
                  <small class="mr-3" style="display:flex;"
                    ><i class="fa fa-calendar text-primary" ></i> <p class="tintuc__ngay" style="margin: 0  0 0 5px;padding-bottom: 2px;"><?php echo $row_tint['ngaycn'] ?></p></small
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

          <!-- Tag Cloud -->
          <div class="mb-5">
            <h2 class="mb-4">Thẻ</h2>
            <div class="d-flex flex-wrap m-n1">
            <?php
                  $sql_loaitt = "SELECT * FROM loaicamnang ORDER BY malcn ASC";
                  $query_loaitt = mysqli_query($mysqli, $sql_loaitt);
                  while ($row_loaitt = mysqli_fetch_array($query_loaitt)) {
                  ?>
              <a class="btn btn-outline-primary m-1" href="index.php?page=handbook&ma=<?php echo $row_loaitt['malcn'];?>"><?php echo $row_loaitt['tenlcn']?></a>
              <?php } ?>
             
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- Detail End -->

    <!-- Footer Start -->
  
    <!-- Footer End -->

    <!-- Back to Top -->

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

