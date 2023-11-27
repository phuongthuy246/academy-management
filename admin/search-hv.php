<?php

include('./config/config.php');
if(isset($_POST['timkiem'])){
	$tukhoa = $_POST['tukhoa'];
}
$sqltk = "SELECT * FROM hocvien WHERE tenhv LIKE '%$tukhoa%'  OR gioitinh LIKE '%$tukhoa%' OR diachihv LIKE '%$tukhoa%'  ";
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
                <form action="index.php?action=hocvien&query=timkiem"  method="post" class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                    name="tukhoa"
                  />
                  <button type="submit" class="btn" name="timkiem" hidden>
                </form>
              </div>
              <!-- Basic Bootstrap Table -->
              
              <div class="card">
                <h5 class="card-header"> Danh sách học viên</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tên học viên</th>
                        <th>Năm sinh</th>
                        <th>Username</th>
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
                        <td><?php echo $rowtk['tenhv'] ?></td>
                        <td class="tintuc__ngay"><?php echo $rowtk['namsinhhv'] ?></td>
                        <!-- <td><?php echo $row['diachihv']?></td> -->
                        <td><?php echo $rowtk['username']?></td>
                        <td><a class="btn btn-outline-primary" href="?action=quanlyhocvien&query=xem&mahv=<?php echo $rowtk['mahv'] ?>">Xem chi tiết</a></td>
                        
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