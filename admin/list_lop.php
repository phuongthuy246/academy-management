<?php
include('./config/config.php');
$capdo= $_POST['capdo'];
$tenlop = $_POST['tenl'];
if (isset($_POST['themlop'])) {
	$sql_them = "INSERT INTO lophoc(macd, tenl) VALUE ('" . $capdo . "','" . $tenlop . "')";
	mysqli_query($mysqli, $sql_them);
	header('Location:index.php?action=quanlylop&query=danhsach');
}
// elseif (isset($_POST['suahttt'])) {
// 	$sql_update = "UPDATE HinhThucThanhToan SET TenHTTT='" . $tenloai . "' WHERE MaHTTT='$_GET[MaHTTT]'";
// 	mysqli_query($mysqli, $sql_update);
// 	header('Location:../../index.php?action=quanlyhttt&query=danhsach');
// }
else {
	$ma = $_GET['mal'];
	$sql_xoa = "DELETE FROM lophoc WHERE mal='" . $ma . "'";
	mysqli_query($mysqli, $sql_xoa);
	header('Location:index.php?action=quanlylop&query=danhsach');
}
?>


<div class="container-xxl flex-grow-1 container-p-y">
              <div class="th" style="display: flex; justify-content: space-between;">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Danh mục /</span> Lớp học</h4>
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
                <form action="index.php?action=lophoc&query=timkiem"  method="post" class="nav-item d-flex align-items-center">
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
                <h5 class="card-header">Lớp học</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Cấp độ</th>
                        <th>Tuỳ chọn</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    $sql_lietke_lp = "SELECT * FROM lophoc, capdo WHERE lophoc.macd=capdo.macd ORDER BY mal ASC";
                    $query_lietke_lp = mysqli_query($mysqli, $sql_lietke_lp);
                    $i = 0;
                    while ($row = mysqli_fetch_array($query_lietke_lp)) {
                      $i++;
                    ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $i; ?></strong></td>
                        <td><?php echo $row['tenl'] ;?></td>
                        <td><?php echo $row['tencd'] ;?></td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="?action=quanlylop&query=edit&mal=<?php echo $row['mal'] ?>"
                                ><i class="bx bx-edit-alt me-1"></i> Sửa</a
                              >
                              <a class="dropdown-item" onclick="return Del('<?php echo $row['tenl'] ?>')" href="list_lop.php?mal=<?php echo $row['mal'] ?>"
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
                            <h5 class="modal-title" id="exampleModalLabel1">Thêm lớp</h5>
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
                                                <label for="exampleFormControlSelect1" class="form-label">Cấp độ</label>
                                                <select class="form-select" name="capdo" id="exampleFormControlSelect1" >
                                                  <?php
                                                  $sql_capdo = "SELECT * FROM capdo ORDER BY macd ASC";
                                                  $query_capdo = mysqli_query($mysqli, $sql_capdo);
                                                  while ($row_capdo = mysqli_fetch_array($query_capdo)) {
                                                  ?>
                                                  <!-- <option selected>Open this select menu</option> -->
                                                  <option value="<?php echo $row_capdo['macd'] ?>"><?php echo $row_capdo['tencd'] ?></option>
                                                  <?php
                                                  }
                                                  ?>
                                                </select>
                            </div>
                            <div class="row">
                              <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Tên lớp</label>
                                <input type="text" id="nameBasic" name="tenl" class="form-control" placeholder="" />
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                              <button type="reset" class="btn btn-outline-secondary" >
                              Đặt lại
                              </button>
                              <button type="submit" class="btn btn-primary" name="themlop">Lưu</button>
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