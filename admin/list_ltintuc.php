<?php
include('./config/config.php');
$tenloai = $_POST['tenltt'];
if (isset($_POST['themltt'])) {
	$sql_them = "INSERT INTO loaitt(tenltt) VALUE ('" . $tenloai . "')";
	mysqli_query($mysqli, $sql_them);
	header('Location:index.php?action=quanlyltintuc&query=danhsach');
}
// elseif (isset($_POST['suahttt'])) {
// 	$sql_update = "UPDATE HinhThucThanhToan SET TenHTTT='" . $tenloai . "' WHERE MaHTTT='$_GET[MaHTTT]'";
// 	mysqli_query($mysqli, $sql_update);
// 	header('Location:../../index.php?action=quanlyhttt&query=danhsach');
// }
else {
	$ma = $_GET['maltt'];
	$sql_xoa = "DELETE FROM loaitt WHERE maltt='" . $ma . "'";
	mysqli_query($mysqli, $sql_xoa);
	header('Location:index.php?action=quanlyltintuc&query=danhsach');
}
?>


<div class="container-xxl flex-grow-1 container-p-y">
              <div class="th" style="display: flex; justify-content: space-between;">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Danh mục /</span> Loại tin tức</h4>
                <button type="button" class="btn btn-outline-primary" style="height: fit-content;" data-bs-toggle="modal" data-bs-target="#basicModal">Thêm</button>
              </div>
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Loại tin tức</h5>
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
					$sql_lietke_loaitt = "SELECT * FROM loaitt ORDER BY maltt ASC";
					$query_lietke_loaitt = mysqli_query($mysqli, $sql_lietke_loaitt);
					$i = 0;
					while ($row = mysqli_fetch_array($query_lietke_loaitt)) {
						$i++;
					?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $i; ?></strong></td>
                        <td><?php echo $row['tenltt'] ;?></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="?action=quanlyltintuc&query=edit&maltt=<?php echo $row['maltt'] ?>"
                                ><i class="bx bx-edit-alt me-1"></i> Sửa</a
                              >
                              <a class="dropdown-item" onclick="return Del('<?php echo $row['tenltt'] ?>')" href="list_ltintuc.php?maltt=<?php echo $row['maltt'] ?>"
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
                            <h5 class="modal-title" id="exampleModalLabel1">Thêm loại tin tức</h5>
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
										<label for="nameBasic" class="form-label">Tên loại tin tức</label>
										<input type="text" id="nameBasic" name="tenltt" class="form-control" placeholder="" />
									</div>
								</div>
							</div>
							<div class="modal-footer">
									<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" >
									Huỷ
									</button>
									<button type="submit" class="btn btn-primary" name="themltt">Lưu</button>
							</div>
						</form>
                    </div>
							
				</div>
          	</div>
			<script>
				function Del(name) {
					return confirm("Bạn chắc chắn muốn xoá loại tin tức: " + name + "?");
				}
			</script>