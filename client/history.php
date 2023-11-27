
<div class="container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px"
      >
        <h3 class="display-3 font-weight-bold text-white">Lịch sử đăng ký khoá học</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="index.php">Trang chủ</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Đăng ký</p>
        </div>
      </div>
</div>
<?php
				$sql = "SELECT * FROM hocvien WHERE mahv='$_GET[mahv]' LIMIT 1";
				$query = mysqli_query($mysqli, $sql);
				?>

    <div class="container-fluid py-5">
      <div class="container">
        <div class="row align-items-center">
          
          
        <div class="col-lg-12 mb-5 mb-lg-0" style="padding: 0;">
          <div class="text-center pb-2">
            <p class="section-title px-5">
              <span class="px-2">Lịch sử đăng ký</span>
            </p>
            <h1 class="mb-4"></h1>
          </div>
        <!-- <p class="section-title pr-5">
              <span class="pr-2">Lịch sử đăng ký</span>
            </p> -->
            <div class="card-his" style="display:flex; justify-content: space-between;">
            <?php
										while ($row = mysqli_fetch_array($query)) {
											// $gender= $row['gioitinh'];
										?>
              <div class="co" style=" background-color: #ebfcff;width: 26%;">
                <div class=" align-items-start align-items-sm-center gap-4">
                    <img style="margin: 0 auto;
                      border-radius: 115px;
                      margin-top: 20px;"
                    src="../admin/uploads/<?php echo $row['anh'] ?>"
                    alt="user-avatar"
                    class="d-block "
                    height="220"
                    width="220"
                    id="uploadedAvatar"
                    />
                    <div style="text-align: center; margin-top: 10px;color: black;"><?php echo $row['tenhv'] ?></div>
                    <div style="text-align: center;"><?php echo $row['username'] ?></div>
                    <div class="button-wrapper" style="text-align: center;">
                      <label style="margin-top: 15px;" for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">Đổi ảnh đại diện</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input
                        type="file"
                        id="upload"
                        class="account-file-input"
                        hidden
                        name="anh"
                        accept="image/png, image/jpeg"
                        />
                      </label>
                    

                    <!-- <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p> -->
                    </div>
                </div>
                <ul style="list-style:none; padding-left: 38px;font-size: 16px;">
                  <li style="margin: 5px 0 12px 0;"><i class="fas fa-user-edit"></i><a style="margin-left: 8px; color: #666666;text-decoration:none;" href="index.php?page=infor-user&mahv=<?php echo $user['mahv'] ?>">Hồ sơ cá nhân</a></li>
                  <li style="margin: 0px 0 12px 0;"><i class="fas fa-history"></i><a style="margin-left: 10px;color: #666666;text-decoration:none;" href="index.php?page=history&mahv=<?php echo $user['mahv'] ?>">Lịch sử đăng ký</a></li>
                  <li style="margin: 0px 0 12px 0;"><i class="fas fa-calendar-alt"></i><a style="margin-left: 10px;color: #666666;text-decoration:none;" href="index.php?page=schedule&mahv=<?php echo $user['mahv'] ?>">Lịch học</a></li>
                  <li style="margin: 0px 0 12px 0;"><i class="fas fa-table"></i></i><a style="margin-left: 10px;color: #666666;text-decoration:none;" href="index.php?page=schedule&mahv=<?php echo $user['mahv'] ?>">Bảng điểm</a></li>

                </ul>
              
              
              

              </div>
              <?php
										}
										?>
                <!-- <h5 class="card-header">Borderless Table</h5> -->
                <div class="table-res" style="width: 70%;">
                  <table class="table-his" style="width: 100%;;
                    background-color: var(--primary);
                    border-radius: 5px 5px 0 0;">
                    <thead style=" text-align: justify;height: 50px;color: white;">
                      <tr>
                        <th style="padding-left: 10px;">STT</th>
                        <!-- <th>Tên học viên</th>  -->
                        <th>Cấp độ</th>
                        <th>Lớp</th>
                        <th>Tên phụ huynh</th>
                        <th>SĐT</th>
                        <th>Ngày đăng ký</th>
                        <!-- <th>Hoá đơn</th> -->
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_dk = "SELECT * FROM phieudangki,hocvien, lophoc,  capdo  WHERE phieudangki.mahv=hocvien.mahv AND phieudangki.mal=lophoc.mal AND lophoc.macd=capdo.macd AND hocvien.mahv='$_GET[mahv]' ORDER BY map DESC";
                        $query_dk = mysqli_query($mysqli, $sql_dk);
                        $i=0;
                        
                          while ($row = mysqli_fetch_array($query_dk)){
                            $i++;
                            ?> 
                      <tr style="height: 77px; background-color: #ebfcff;">
                        <td style="padding-left: 10px;"> <strong><?php echo $i ?></strong></td>
                        <!-- <td><?php echo $row['tenhv']?></td> -->
                        <td><?php echo $row['tencd']?></td>
                        <td><?php echo $row['tenl']?></td>
                        <td><?php echo $row['tenph']?></td>
                        <td><?php echo $row['sdthv']?></td>
                        <td class="tintuc__ngay"><?php echo $row['ngaydk']?></td>
                        <td style="width:113px;">
                          <div class="dropdown">
                            <a class="btn-his" href="index.php?page=invoice&map=<?php echo $row['map'] ?>" >
                              Xem hoá đơn
                            </a>
                            
                          </div>
                        </td>
                      </tr>
                      
                      <?php } ?>
                    </tbody>
                  </table>
                  <hr class="my-5">
                  
                </div>
            </div>
            
           

        </div>
      

        </div>
      </div>
    </div>


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