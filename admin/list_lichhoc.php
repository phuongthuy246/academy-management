<?php
include('./config/config.php');
$lophoc= $_POST['lophoc'];
$thu= $_POST['thu'];
$kynang= $_POST['kynang'];
$giaovien= $_POST['giaovien'];
$giobd = $_POST['giobd'];
$giokt = $_POST['giokt'];
if (isset($_POST['themlichhoc'])) {
	$sql_them = "INSERT INTO lichhoc(mal, mat, makn, magv, giobd, giokt) VALUE ('" . $lophoc . "','" . $thu . "','" . $kynang . "','" . $giaovien . "','" . $giobd . "','" . $giokt . "')";
	mysqli_query($mysqli, $sql_them);
	header('Location:index.php?action=quanlylichhoc&query=danhsach');
}
// elseif (isset($_POST['suahttt'])) {
// 	$sql_update = "UPDATE HinhThucThanhToan SET TenHTTT='" . $tenloai . "' WHERE MaHTTT='$_GET[MaHTTT]'";
// 	mysqli_query($mysqli, $sql_update);
// 	header('Location:../../index.php?action=quanlyhttt&query=danhsach');
// }
else {
	$ma = $_GET['malh'];
	$sql_xoa = "DELETE FROM lichhoc WHERE malh='" . $ma . "'";
	mysqli_query($mysqli, $sql_xoa);
	header('Location:index.php?action=quanlylichhoc&query=danhsach');
}
?>


<div class="container-xxl flex-grow-1 container-p-y">
              <div class="th" style="display: flex; justify-content: space-between;">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Danh mục /</span> Lịch học</h4>
                <button type="button" class="btn btn-outline-primary" style="height: fit-content;" data-bs-toggle="modal" data-bs-target="#basicModal">Thêm</button>
              </div>
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Lịch học</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                  
                    <thead>
                    
                      <tr>
                        <th>Thứ</th>
                        <th>Lớp</th>
                        <th>Kĩ năng</th>
                        <th>Giáo viên</th>
                        <th>Giờ học</th>
                      </tr>
                      
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    $sql_lietke_lh = "SELECT * FROM lichhoc, lophoc, thu, kynang, giaovien WHERE lichhoc.mal=lophoc.mal AND lichhoc.mat=thu.mat AND lichhoc.makn=kynang.makn AND lichhoc.magv=giaovien.magv ORDER BY malh ASC";
                    $query_lietke_lh = mysqli_query($mysqli, $sql_lietke_lh);
                    $i = 0;
                    while ($row = mysqli_fetch_array($query_lietke_lh)) {
                      $i++;
                    ?>
                      <tr>
                        <td><?php echo $row['tent']?></td>
                        <td><?php echo $row['tenl'] ?></td> 
                        <td><?php echo $row['tenkn'] ?></td>
                        <td><?php echo $row['tengv'] ?></td>
                        <td><?php echo $row['giobd']?> - <?php echo $row['giokt'] ?></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="?action=quanlylichhoc&query=edit&malh=<?php echo $row['malh'] ?>"
                                ><i class="bx bx-edit-alt me-1"></i> Sửa</a
                              >
                              <a class="dropdown-item" onclick="return Del('<?php echo $row['tent'] ?>')" href="list_lichhoc.php?malh=<?php echo $row['malh'] ?>"
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
            <div class="modal fade" id="basicModal" tabindex="-1" aria-labelledby="basicModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
					        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Thêm lịch học</h5>
							                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close" 
                            ></button>        
                        </div>
                        <form action="" method="post" >
                          <div class="modal-body">
                            <div class="mb-3"> 
                                                <label for="exampleFormControlSelect1" class="form-label">Thứ</label>
                                                <select class="form-select" name="thu" id="exampleFormControlSelect1" >
                                                  <?php
                                                  $sql_capdo = "SELECT * FROM thu ORDER BY mat ASC";
                                                  $query_capdo = mysqli_query($mysqli, $sql_capdo);
                                                  while ($row_capdo = mysqli_fetch_array($query_capdo)) {
                                                  ?>
                                                  <option value="<?php echo $row_capdo['mat'] ?>"><?php echo $row_capdo['tent'] ?></option>
                                                  <?php
                                                  }
                                                  ?>
                                                </select>
                            </div>
                            <div class="mb-3">
                                                <label for="exampleFormControlSelect1" class="form-label">Lớp</label>
                                                <select class="form-select" name="lophoc" id="exampleFormControlSelect1" >
                                                  <?php
                                                  $sql_lop = "SELECT * FROM lophoc ORDER BY mal ASC";
                                                  $query_lop = mysqli_query($mysqli, $sql_lop);
                                                  while ($row_lop = mysqli_fetch_array($query_lop)) {
                                                  ?>
                                                  <option value="<?php echo $row_lop['mal'] ?>"><?php echo $row_lop['tenl'] ?></option>
                                                  <?php
                                                  }
                                                  ?>
                                                </select>
                            </div>                
                            <div class="mb-3">
                                                <label for="exampleFormControlSelect1" class="form-label">Giáo viên</label>
                                                <select class="form-select" name="giaovien" id="exampleFormControlSelect1" >
                                                  <?php
                                                  $sql_giaovien = "SELECT * FROM giaovien ORDER BY magv ASC";
                                                  $query_giaovien = mysqli_query($mysqli, $sql_giaovien);
                                                  while ($row_giaovien = mysqli_fetch_array($query_giaovien)) {
                                                  ?>
                                                  <!-- <option selected>Open this select menu</option> -->
                                                  <option value="<?php echo $row_giaovien['magv'] ?>"><?php echo $row_giaovien['tengv'] ?></option>
                                                  <?php
                                                  }
                                                  ?>
                                                </select>
                            </div>
                            <div class="mb-3">
                                                <label for="exampleFormControlSelect1" class="form-label">Kĩ năng</label>
                                                <select class="form-select" name="kynang" id="exampleFormControlSelect1" >
                                                  <?php
                                                  $sql_kinang = "SELECT * FROM kynang ORDER BY makn ASC";
                                                  $query_kinang = mysqli_query($mysqli, $sql_kinang);
                                                  while ($row_kinang = mysqli_fetch_array($query_kinang)) {
                                                  ?>
                                                  <!-- <option selected>Open this select menu</option> -->
                                                  <option value="<?php echo $row_kinang['makn'] ?>"><?php echo $row_kinang['tenkn'] ?></option>
                                                  <?php
                                                  }
                                                  ?>
                                                </select>
                            </div>

                            <div class="row g-2" style="margin-bottom: 1rem !important;">
                                    <div class="col mb-0">
                                      <label for="html5-time-input" class="form-label">Giờ bắt đầu</label>
                                      <input class="form-control" type="time" name="giobd" value="12:30:00" id="html5-time-input" />
                                    </div>
                                    
                                    <div class="col mb-0">
                                      <label for="html5-time-input" class="form-label">Giờ kết thúc</label>
                                      <input class="form-control" type="time" name="giokt" value="12:30:00" id="html5-time-input" />
                                    </div>
                            </div>


                            
                          </div>
                          <div class="modal-footer">
                              <button type="reset" class="btn btn-outline-secondary" >
                              Đặt lại
                              </button>
                              <button type="submit" class="btn btn-primary" name="themlichhoc">Lưu</button>
                          </div>
                        </form>
                  </div>
							
				        </div>
          	</div>
			<script>
				function Del(name) {
					return confirm("Bạn chắc chắn muốn xoá lớp: " + name + "?");
				}
			</script>