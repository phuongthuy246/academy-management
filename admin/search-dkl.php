<?php
if(isset($_POST['timkiem'])){
	$tukhoa = $_POST['tukhoa'];
}
$sqltkdk = "SELECT * FROM phieudangki, lophoc, hocvien, capdo WHERE phieudangki.mal=lophoc.mal AND phieudangki.mahv=hocvien.mahv AND lophoc.macd=capdo.macd AND tenhv LIKE '%$tukhoa%' OR tenl LIKE '%$tukhoa%' OR tencd LIKE '%$tukhoa%'";

// $sqltk = "SELECT * FROM giaovien WHERE tengv LIKE '%$tukhoa%' OR kinhnghiemgv LIKE '%$tukhoa%' OR gioitinhgv LIKE '%$tukhoa%'  ";
$querytkdk = mysqli_query($mysqli, $sqltkdk);
// $row_title = mysqli_fetch_array($query_pro);
?>

<div class="container-xxl flex-grow-1 container-p-y">
              <div class="th" style="display: flex; justify-content: space-between;">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tìm kiếm /</span> <?php echo $tukhoa ?></h4>
                <!-- <button type="button" class="btn btn-outline-primary" style="height: fit-content;" data-bs-toggle="modal" data-bs-target="#basicModal">Thêm</button> -->
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
                <form action="index.php?action=dangkylop&query=timkiem"  method="post" class="nav-item d-flex align-items-center">
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
                <h5 class="card-header"> Danh sách đăng ký lớp học</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tên học viên</th>
                        <th>Cấp độ</th>
                        <th>Lớp</th>
                        <th>SĐT</th>
                        <th>Tên phụ huynh</th>
                        <!-- <th>Username</th> -->
                        <th>Tuỳ chọn</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    $i = 0;
                    while ($rowtkdk = mysqli_fetch_array($querytkdk)) {
                      $i++;
                    ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $i; ?></strong></td>
                        <td><?php echo $rowtkdk['tenhv'] ?></td>
                        <td><?php echo $rowtkdk['tencd'] ?></td>
                        <td><?php echo $rowtkdk['tenl']?></td>
                        <td><?php echo $rowtkdk['sdtph']?></td>
                        <td><?php echo $rowtkdk['tenph']?></td>
						<td>
							<a  class="btn btn-outline-primary" style="height: fit-content;" href="?action=laphoadon&query=hd&map=<?php echo $row['map'] ?>">Xem hoá đơn</a>
						</td>
                      </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            
            </div>