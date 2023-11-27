<?php
include('./config/config.php');
$tenkynang = $_POST['tenkn'];
if (isset($_POST['themkn'])) {
	$sql_them = "INSERT INTO kynang(tenkn) VALUES ('$tenkynang')";
	mysqli_query($mysqli, $sql_them);
	header('Location:index.php?action=quanlykynang&query=danhsach');
}
// elseif (isset($_POST['suahttt'])) {
// 	$sql_update = "UPDATE HinhThucThanhToan SET TenHTTT='" . $tenloai . "' WHERE MaHTTT='$_GET[MaHTTT]'";
// 	mysqli_query($mysqli, $sql_update);
// 	header('Location:../../index.php?action=quanlyhttt&query=danhsach');
// }
else {
	$ma = $_GET['makn'];
	$sql_xoa = "DELETE FROM kynang WHERE makn='" . $ma . "'";
	mysqli_query($mysqli, $sql_xoa);
	header('Location:index.php?action=quanlykynang&query=danhsach');
}
?>


<div class="container-xxl flex-grow-1 container-p-y">
              <div class="th" style="display: flex; justify-content: space-between;">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Danh mục /</span> Kĩ năng</h4>
                <button type="button" class="btn btn-outline-primary" style="height: fit-content;" data-bs-toggle="modal" data-bs-target="#basicModal">Thêm</button>
              </div>
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Kĩ năng</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Tuỳ chọn</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
					<?php
					$sql_lietke_kynang = "SELECT * FROM kynang ORDER BY makn ASC";
					$query_lietke_kynang = mysqli_query($mysqli, $sql_lietke_kynang);
					$i = 0;
					while ($row = mysqli_fetch_array($query_lietke_kynang)) {
						$i++;
					?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $i; ?></strong></td>
                        <td><?php echo $row['tenkn'] ;?></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="?action=quanlykynang&query=edit&makn=<?php echo $row['makn'] ?>"
                                ><i class="bx bx-edit-alt me-1"></i> Sửa</a
                              >
                              <a class="dropdown-item" onclick="return Del('<?php echo $row['tenkn'] ?>')" href="list_kynang.php?makn=<?php echo $row['makn'] ?>"
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
                            <h5 class="modal-title" id="exampleModalLabel1">Thêm kĩ năng</h5>
							              <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                            ></button>
                        </div>
                        <form action="" method="post" >
                          <div class="modal-body">
                            <div class="row">
                              <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Tên kĩ năng</label>
                                <input type="text" id="nameBasic" name="tenkn" class="form-control" placeholder="" />
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                              <button type="reset" class="btn btn-outline-secondary">
                              Đặt lại
                              </button>
                              <button type="submit" class="btn btn-primary" name="themkn">Lưu</button>
                          </div>
                        </form>
                      </div>
							
				        </div>
          	</div>
			<script>
				function Del(name) {
					return confirm("Bạn chắc chắn muốn xoá kĩ năng: " + name + "?");
				}
			</script>