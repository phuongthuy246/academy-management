<?php
if(isset($_POST['timkiem'])){
	$tukhoa = $_POST['tukhoa'];
}
$sql_tt = "SELECT * FROM camnang WHERE tencn LIKE '%$tukhoa%' " ;
// $sql_pro = "SELECT * FROM SanPham WHERE SanPham.MaLSPC = '$_GET[ma]' ORDER BY MaSP ASC LIMIT $begin,8";
$query_tt = mysqli_query($mysqli, $sql_tt);
?>
<!-- <?php
$sql_ltt = "SELECT * FROM loaicamnang WHERE loaicamnang.malcn ='$_GET[ma]' LIMIT 1";
$query_ltt = mysqli_query($mysqli, $sql_ltt);
$row_title = mysqli_fetch_array($query_ltt);
?> -->
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px"
      >
        <h3 class="display-3 font-weight-bold text-white">Tìm kiếm</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="index.php">Trang chủ</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Kết quả cho <?php echo $tukhoa; ?></p>
        </div>
      </div>
    </div>
    <!-- Header End -->

    <!-- Blog Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <!-- <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Kết quả tìm kiếm</span>
          </p>
          <h1 class="mb-4">Từ khoá <?php echo $tukhoa; ?></h1>
        </div> -->

        <div class="row pb-3">
        <?php
            while ($row_tt = mysqli_fetch_array($query_tt)) {
            ?>
          <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
              <img class="card-img-top mb-2" src="../admin/uploads/<?php echo $row_tt['anhcn'] ?>" alt="" />
              <div class="card-body bg-light text-center p-4">
                <h4 class=""><?php echo $row_tt['tencn'] ?></h4>
                <div class="d-flex justify-content-center mb-3">
                  <!-- <small class="mr-3"
                    ><i class="fa fa-user text-primary"></i> Admin</small
                  >
                  <small class="mr-3"
                    ><i class="fa fa-folder text-primary"></i><?php echo $row_title['tenltt'] ?></small
                  > -->
                  <b class="mr-3" style="display: flex;"
                    ><i class="fa fa-calendar  text-primary" style=" padding-top: 2px;"></i><p class="tintuc__ngay" style="margin: 0  0 0 5px;">  <?php echo $row_tt['ngaycn'] ?></p></b
                  >
                </div>
                <p>
				<?php echo substr($row_tt['noidungcn'], 0 ,190) ?>
                </p>
                <a href="index.php?page=handbook-detail&handbook=<?php echo $row_tt['macn'] ?>" class="btn btn-primary px-4 mx-auto my-2"
                  >Chi tiết</a
                >
              </div>
            </div>
          </div>
          <?php } ?>
          
         
        </div>
      </div>
    </div>
    <!-- Blog End -->

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
	element.innerHTML = `${dd}-${mm}-${yyyy}`
});
</script>