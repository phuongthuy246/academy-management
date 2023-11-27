<?php
include('./config/config.php');
$tencd = $_POST['tencd'];
$motacd= $_POST['motacd'];
$noidung= $_POST['noidung'];
$muchocphi= $_POST['muchocphi'];
$anhcd = $_FILES['anhcd']['name'];
$anhcd_tmp =$_FILES['anhcd']['tmp_name'];
if (isset($_POST['themcd'])) {
	$sql_them = "INSERT INTO capdo(tencd, motacd,noidung, muchocphi, anhcd) VALUE ('" . $tencd . "','" . $motacd . "','" . $noidung . "','" . $muchocphi . "','" . $anhcd . "')";
	mysqli_query($mysqli, $sql_them);
  move_uploaded_file($anhcd_tmp, "uploads/" .$anhcd);
	header('Location:index.php?action=quanlycapdo&query=danhsach');
}

else {
	$ma = $_GET['macd'];
	$sql = "SELECT * FROM capdo WHERE macd = '$ma' LIMIT 1";
	$query = mysqli_query($mysqli, $sql);
	while ($row = mysqli_fetch_array($query)) {
		unlink("uploads/" . $row['anhcd']);
	}
	$sql_xoa = "DELETE FROM capdo WHERE macd='" . $ma . "'";
	mysqli_query($mysqli, $sql_xoa);
	header('Location:index.php?action=quanlycapdo&query=danhsach');
}
?>

<?php
if(isset($_POST['timkiem'])){
	$tukhoa = $_POST['tukhoa'];
}
$sqltk = "SELECT * FROM capdo WHERE muchocphi LIKE '%$tukhoa%' OR tencd LIKE '%$tukhoa%' OR dotuoi LIKE '%$tukhoa%'  ";
$querytk = mysqli_query($mysqli, $sqltk);
// $row_title = mysqli_fetch_array($query_pro);
?>

<div class="container-xxl flex-grow-1 container-p-y">
              <div class="th" style="display: flex; justify-content: space-between;">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tìm kiếm /</span> <?php echo $tukhoa; ?></h4>
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
                <h5 class="card-header">Cấp độ</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Độ tuổi</th>
                        <!-- <th>Nội dung</th> -->
                        <th>Mức học phí</th>
                        <th>Hình ảnh</th>
                        <th>Tuỳ chọn</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    // $sql_lietke_capdo = "SELECT * FROM capdo ORDER BY macd ASC";
                    // $query_lietke_capdo  = mysqli_query($mysqli, $sql_lietke_capdo );
                    $i = 0;
                    while ($row = mysqli_fetch_array($querytk )) {
                      $i++;
                    ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $i; ?></strong></td>
                        <td><?php echo $row['tencd'] ;?></td>
                        <td><?php echo $row['dotuoi'] ;?></td>
                        <td><?php echo number_format ($row['muchocphi'],0,',','.').' VND' ;?></td>
                        <td><img class="tintuc__img" src="./uploads/<?php echo $row['anhcd'] ;?>"  style="width: 200px;"/></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="?action=quanlycapdo&query=edit&macd=<?php echo $row['macd'] ?>"
                                ><i class="bx bx-edit-alt me-1"></i> Sửa</a
                              >
                              <a class="dropdown-item" onclick="return Del('<?php echo $row['tencd'] ?>')" href="list_capdo.php?macd=<?php echo $row['macd']?>"
                                ><i class="bx bx-trash me-1"></i> Xoá</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php
                    }?>
                      
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
                                <h5 class="modal-title" id="exampleModalLabel1">Thêm cấp độ</h5>
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
                                    <label for="nameBasic" class="form-label">Tên cấp độ</label>
                                    <input type="text" id="nameBasic" name="tencd" class="form-control" placeholder="" />
                                  </div>
                                </div>
                                
                                <div class="row" style="margin-bottom: 1rem !important;">
                                  <div class="col- mb3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                                    <textarea class="form-control" name="motacd" id="exampleFormControlTextarea1" rows="3" style="height: 54px;"></textarea>
                                  </div>
                                </div>

                                <div class="row" style="margin-bottom: 1rem !important;">
                                  <div class="col- mb3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                                    <textarea class="form-control" name="noidung" id="exampleFormC
                                    ontrolTextarea1" rows="5" style="height: 74px;"></textarea>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Mức học phí</label>
                                    <input type="text" id="nameBasic" name="muchocphi" class="form-control" placeholder="" />
                                  </div>
                                </div>

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Hình ảnh</label>
                                    <input class="form-control" name="anhcd" type="file"  >
                                  </div>
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Huỷ
                                </button>
                                <button type="submit" name="themcd" class="btn btn-primary">Lưu</button>
                              </div>
                              </form>
                            </div>
                          </div>
          </div>
          <script>
            function Del(name) {
              return confirm("Bạn chắc chắn muốn xoá cấp độ: " + name + "?");
            }
          </script>