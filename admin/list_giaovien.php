
<?php

include('./config/config.php');

  $tengv = $_POST['tengv'];
	$sdtgv = $_POST['sdtgv'];
  $diachigv = $_POST['diachigv'];
  $kinhnghiemgv = $_POST['kinhnghiemgv'];
  $username = $_POST['username'];
  $gioitinh = $_POST['gioitinh'];
	$matkhau = $_POST['password'];
	$matkhau2 = $_POST['repassword'];
  $anh = $_FILES['anh']['name'];
  $anh_tmp =$_FILES['anh']['tmp_name'];
//xulyhinhanh

if (isset($_POST['themgiaovien'])) {
  $passwordauth = md5($matkhau, false);
	$sql_them = "INSERT INTO giaovien (tengv, sdtgv, diachigv, kinhnghiemgv, gioitinhgv, anhgv, username, password) VALUE ('" . $tengv . "','" . $sdtgv . "','" . $diachigv . "','" . $kinhnghiemgv . "','" . $gioitinh . "','" . $anh . "','" . $username . "','" . $passwordauth . "')";
	mysqli_query($mysqli, $sql_them);
  move_uploaded_file($anh_tmp, "uploads/" .$anh);
  if ($sql_them) {
    $_SESSION['giaovien'] = $tengv;
    $_SESSION['id_gv'] = mysqli_insert_id($mysqli);
    // header('Location: index.php?quanly=giohang');

    header('Location:index.php?action=quanlygiaovien&query=danhsach');
  }
}

else {

	$ma = $_GET['magv'];
	$sql = "SELECT * FROM giaovien WHERE magv='$ma' LIMIT 1";
	$query=mysqli_query($mysqli, $sql);
  while ($row = mysqli_fetch_array($query)) {
		unlink("uploads/" . $row['anh']);
	}
	$sql_xoa = "DELETE FROM giaovien WHERE magv='" . $ma . "'";
	mysqli_query($mysqli, $sql_xoa);
	header('Location:index.php?action=quanlygiaovien&query=danhsach');
}
?>

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="th" style="display: flex; justify-content: space-between;">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Danh mục /</span> Giáo viên</h4>
                <button type="button" class="btn btn-outline-primary" style="height: fit-content;" data-bs-toggle="modal" data-bs-target="#basicModal">Thêm</button>
              </div>
              
              <div class="navbar-nav align-items-start" style="
                            margin-top: -20px;
                            justify-content: center;
                            border-radius: 0.5rem;
                            background-color: white;
                            margin-bottom: 20px;
                            /* padding: 10px; */
                            height: 50px;
                            padding-left: 20px;
                        ">
                <form action="index.php?action=giaovien&query=timkiem"  method="post" class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Tìm kiếm..."
                    aria-label="Search..."
                    name="tukhoa"
                  />
                  <button type="submit" class="btn" name="timkiem" hidden>
                </form>
              </div>
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Danh sách giáo viên</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>SDT</th>
                        <th>Địa chỉ</th>
                        <th>Kinh nghiệm</th>
                        <th>Tuỳ chọn</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    $sql_lietke_gv = "SELECT * FROM giaovien ORDER BY magv ASC";
                    $query_lietke_gv = mysqli_query($mysqli, $sql_lietke_gv);
                    $i = 0;
                    while ($row = mysqli_fetch_array($query_lietke_gv)) {
                      $i++;
                    ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $i; ?></strong></td>
                        <td><?php echo $row['tengv'] ?></td>
                        <td><?php echo $row['sdtgv']?></td>
                        <td><?php echo $row['diachigv']?></td>
                        <td><?php echo $row['kinhnghiemgv']?></td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <!-- <a class="dropdown-item" onclick="" href="?action=quanlydichvu&query=edit&madv=<?php echo $row['madv'] ?>"
                                ><i class="bx bx-edit-alt me-1"></i> Sửa</a
                              > -->
                              <a class="dropdown-item" onclick="return Del('<?php echo $row['tengv'] ?>')" href="list_giaovien.php?magv=<?php echo $row['magv'] ?>"
                                ><i class="bx bx-trash me-1"></i> Xoá</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->
          
              <!-- <hr class="my-5" /> -->

              
              <!--/ Responsive Table -->
            </div>
            <div class="modal fade" id="basicModal" tabindex="-1"  aria-labelledby="basicModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Thêm giáo viên</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <form action="" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                  
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameBasic" class="form-label">Tên giáo viên</label>
                                      <input type="text" name="tengv" class="form-control" placeholder="" />
                                    </div>
                                  </div>
                                  <div class="row" style="margin-bottom: 1rem;" >
                                    <label class="form-label" style="padding-top:8px;">Giới tính</label>
                                    <div class="form-info">
                                      <select
                                        type="text"
                                        class="form-control"
                                        id="subject"
                                        name="gioitinh"
                                        required="required"
                                        data-validation-required-message="Please enter a subject"
                                      >
                                          <option value=" ">--select--</option>
                                          <option value="Nam" >Nam</option>
                                          <option value="Nu" >Nữ</option>
                                        </select>
                                    </div>
                                  </div>
                                  <div class="row g-2" style="margin-bottom: 1rem !important;">
                                    <div class="col mb-0">
                                      <label for="emailLarge" class="form-label">SDT</label>
                                      <input type="text" name="sdtgv" id="emailLarge" class="form-control" placeholder="" />
                                    </div>
                                    
                                    <div class="col mb-0">
                                      <label for="emailLarge"  class="form-label">Kinh nghiệm</label>
                                      <input type="text" name="kinhnghiemgv"  class="form-control" placeholder="" />
                                    </div>
                                  </div>

                                  <div class="row" >
                                    <div class="col mb-3">                                      
                                      <label for="exampleFormControlTextarea1" class="form-label">Địa chỉ</label>
                                        <input type="text" name="diachigv" class="form-control" placeholder="" />                                    
                                    </div>
                                  </div>

                                  
                                  <div class="row" >
                                    <div class="col mb-3">                                      
                                      <label for="exampleFormControlTextarea1" class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control" placeholder="" />                                    
                                    </div>
                                  </div>

                                  

                                  <div class="row" >
                                    <div class="mb-3 form-password-toggle">                                      
                                      <label for="exampleFormControlTextarea1" class="form-label">Mật khẩu</label>
                                      <div class="input-group input-group-merge">
                                        <input
                                          type="password"
                                          class="form-control"
                                          name="password"
                                          value="<?php echo $matkhau?>"
                                          placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                          aria-describedby="password"
                                        />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                      </div>                                 
                                    </div>
                                  </div>
                                  <div class="row" >
                                    <div class="mb-3 form-password-toggle">                                      
                                      <label for="exampleFormControlTextarea1" class="form-label">Nhập lại mật khẩu</label>
                                      <div class="input-group input-group-merge">
                                        <input
                                          type="password"
                                          class="form-control"
                                          name="repassword"
                                          value="<?php echo $matkhau2?>"
                                          placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                          aria-describedby="password"
                                        />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                      </div>                                     
                                    </div>
                                  </div>
                                  <div class="mb-3">
                                    <label for="formFile" class="form-label">Hình ảnh</label>
                                    <input type="file" name="anh" class="form-control" placeholder="" />  
                                  </div>
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="reset" class="btn btn-outline-secondary" >
                                    Đặt lại
                                  </button>
                                  <button type="submit" class="btn btn-primary" name="themgiaovien">Lưu</button>
                                </div>
                              </form>
                            </div>
                          </div>
          </div>
          <script>
            function Del(name) {
              return confirm("Bạn chắc chắn muốn xoá giáo viên: " + name + "?");
            }
          </script>