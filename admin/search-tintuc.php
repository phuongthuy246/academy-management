
<?php

include('./config/config.php');
require('../carbon/autoload.php');

use Carbon\Carbon;
use Carbon\CarbonInterval;

$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

$loaitintuc= $_POST['loaitintuc'];
$tentt = $_POST['tentt'];
$anhtt = $_FILES['anhtt']['name'];
$anhtt_tmp =$_FILES['anhtt']['tmp_name'];
// $anhtt = time() . '_' . $anhtt;

$motatt=$_POST['motatt'];
$noidungtt=$_POST['noidungtt'];

//xulyhinhanhh

if (isset($_POST['themtintuc'])) {
	$sql_them = "INSERT INTO tintuc(maltt,tentt,motatt,noidungtt,ngaytt,anhtt) VALUE ('".$loaitintuc."','".$tentt."','".$motatt."','".$noidungtt."','".$now."','".$anhtt."')";
  // echo $sql_them;
	mysqli_query($mysqli, $sql_them);
	move_uploaded_file($anhtt_tmp, "uploads/" .$anhtt);
	header('Location:index.php?action=quanlytintuc&query=danhsach');
}

else {

  $ma = $_GET['matt'];
	$sql = "SELECT * FROM tintuc WHERE matt = '$ma' LIMIT 1";
	$query = mysqli_query($mysqli, $sql);
	while ($row = mysqli_fetch_array($query)) {
		unlink("uploads/" . $row['anhtt']);
	}
	$sql_xoa = "DELETE FROM tintuc WHERE matt='" . $ma . "'";
	mysqli_query($mysqli, $sql_xoa);
	header('Location:index.php?action=quanlytintuc&query=danhsach');
}

	// $ma = $_GET['matt'];
	// $sql_xoa = "DELETE FROM tintuc WHERE matt='$ma'";
	// mysqli_query($mysqli, $sql_xoa);
	// header('Location:index.php?action=quanlytintuc&query=danhsach');

?>

<?php
if(isset($_POST['timkiem'])){
	$tukhoa = $_POST['tukhoa'];
}
$sqltk = "SELECT * FROM tintuc, loaitt WHERE tintuc.maltt=loaitt.maltt AND tentt LIKE '%$tukhoa%'  ";
$querytk = mysqli_query($mysqli, $sqltk);
// $row_title = mysqli_fetch_array($query_pro);
?>

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="th" style="display: flex; justify-content: space-between;">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tìm kiếm /</span> <?php echo $tukhoa ?></h4>
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
                <form action="index.php?action=tintuc&query=timkiem"  method="post" class="nav-item d-flex align-items-center">
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

              <div class="card">
                <h5 class="card-header">Tin tức</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Hình ảnh</th>
                        <th>Loại tin</th>
                        <th>Tuỳ chọn</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    
                    $i = 0;
                    while ($rowtk = mysqli_fetch_array($querytk)) {
                      $i++;
                    ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $i; ?></strong></td>
                        <td><?php echo $rowtk['tentt'] ;?></td>
                        <td><img class="tintuc__img" src="./uploads/<?php echo $rowtk['anhtt'] ;?>"  style="width: 200px;"/></td>
                        <td><?php echo $rowtk['tenltt']; ?></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" onclick="" href="?action=quanlytintuc&query=edit&matt=<?php echo $rowtk['matt'] ?>"
                                ><i class="bx bx-edit-alt me-1"></i> Sửa</a
                              >
                              <a class="dropdown-item" onclick="return Del('<?php echo $rowtk['tentt'] ?>')" href="list_tintuc.php?matt=<?php echo $rowtk['matt'] ?>"
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
              
              <!-- <hr class="my-5" /> -->

              
              <!--/ Responsive Table -->
            </div>
            <div class="modal fade" id="basicModal" tabindex="-1"  aria-labelledby="basicModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Thêm tin tức</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <form action="" method="POST" enctype="multipart/form-data" >
                                <div class="modal-body">
                                  <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Loại tin</label>
                                    <select class="form-select" name="loaitintuc" id="exampleFormControlSelect1" >
                                      <?php
                                      $sql_loaitintuc = "SELECT * FROM loaitt ORDER BY maltt ASC";
                                      $query_loaitintuc = mysqli_query($mysqli, $sql_loaitintuc);
                                      while ($row_loaitintuc = mysqli_fetch_array($query_loaitintuc)) {
                                      ?>
                                      <!-- <option selected>Open this select menu</option> -->
                                      <option value="<?php echo $row_loaitintuc['maltt'] ?>"><?php echo $row_loaitintuc['tenltt'] ?></option>
                                      <?php
                                      }
                                      ?>
                                    </select>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameBasic" class="form-label">Tên tin tức</label>
                                      <input type="text" name="tentt" class="form-control" placeholder="" />
                                    </div>
                                  </div>
                                  <div class="mb-3">
                                    <label for="formFile" class="form-label">Hình ảnh</label>
                                    <input class="form-control" name="anhtt" type="file"  >
                                  </div>
                                  <div class="row" style="margin-bottom: 1rem !important;">
                                    <div class="col- mb3">
                                      <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                                      <textarea class="form-control" name="motatt"  rows="3" style="height: 54px;" ></textarea>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col- mb3">
                                      <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                                      <textarea class="form-control" name="noidungtt" rows="3" style="height: 54px;" ></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" onclick="history.back()">
                                    Huỷ
                                  </button>
                                  <button type="submit" class="btn btn-primary" name="themtintuc">Lưu</button>
                                </div>
                              </form>
                            </div>
                          </div>
          </div>
          <script>
            function Del(name) {
              return confirm("Bạn chắc chắn muốn xoá tin tức: " + name + "?");
            }
          </script>