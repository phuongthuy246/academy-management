<?php

include('./config/config.php');
if(isset($_POST['timkiem'])){
	$tukhoa = $_POST['tukhoa'];
}
$sqltk = "SELECT * FROM lophoc, capdo WHERE lophoc.macd=capdo.macd AND tenl LIKE '%$tukhoa%'  OR tencd LIKE '%$tukhoa%'  ";
$querytk = mysqli_query($mysqli, $sqltk);
// $row_title = mysqli_fetch_array($query_pro);
?>

<div class="container-xxl flex-grow-1 container-p-y">
              <div class="th" style="display: flex; justify-content: space-between;">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tìm kiếm /</span> <?php echo $tukhoa ?></h4>
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
                <h5 class="card-header"> Danh sách lớp học</h5>
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

                    $i = 0;
                    while ($rowtk = mysqli_fetch_array($querytk)) {
                      $i++;
                    ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $i; ?></strong></td>
                        <td><?php echo $rowtk['tenl'] ?></td>
                        <td><?php echo $rowtk['tencd'] ?></td>
						<td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="?action=quanlylop&query=edit&mal=<?php echo $rowtk['mal'] ?>"
                                ><i class="bx bx-edit-alt me-1"></i> Sửa</a
                              >
                              <a class="dropdown-item" onclick="return Del('<?php echo $rowtk['tenl'] ?>')" href="list_lop.php?mal=<?php echo $rowtk['mal'] ?>"
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

            </div>