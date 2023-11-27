

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="th" style="display: flex; justify-content: space-between;">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Danh mục /</span> Học viên</h4>
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
                    placeholder="Tìm kiếm.."
                    aria-label="Search..."
                    name="tukhoa"
                  />
                  <button type="submit" class="btn" name="timkiem" hidden>
                </form>
              </div>
              <!-- Basic Bootstrap Table -->
              <?php
              if (isset($_GET['trang'])) {
                  $page = $_GET['trang'];
                   //them
              }else{
                  $page = '1';
              }if($page =='' || $page ==1) {
                  $begin = 0;
              }else{
                  $begin = ($page*5)-5;
              }
              $sql_lietke_hv = "SELECT * FROM hocvien ORDER BY mahv DESC LIMIT $begin, 5";
              $query_lietke_hv = mysqli_query($mysqli, $sql_lietke_hv);
              ?>
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
                    while ($row = mysqli_fetch_array($query_lietke_hv)) {
                      $i++;
                    ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $i; ?></strong></td>
                        <td><?php echo $row['tenhv'] ?></td>
                        <td class="tintuc__ngay"><?php echo $row['namsinhhv'] ?></td>
                        <!-- <td><?php echo $row['diachihv']?></td> -->
                        <td><?php echo $row['username']?></td>
                        <td><a class="btn btn-outline-primary" href="?action=quanlyhocvien&query=xem&mahv=<?php echo $row['mahv'] ?>">Xem chi tiết</a></td>
                        <!-- <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" onclick="" href="?action=quanlydichvu&query=edit&madv=<?php echo $row['madv'] ?>"
                                ><i class="bx bx-edit-alt me-1"></i> Sửa</a
                              >
                              <a class="dropdown-item" onclick="return Del('<?php echo $row['tengv'] ?>')" href="list_giaovien.php?magv=<?php echo $row['magv'] ?>"
                                ><i class="bx bx-trash me-1"></i> Xoá</a
                              >
                            </div>
                          </div>
                        </td> -->
                      </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                
              </div>
              <?php
                    $sql_trang = mysqli_query($mysqli,"SELECT *FROM hocvien");
                    $row_count = mysqli_num_rows($sql_trang);
                    $trang = ceil($row_count/5);
                ?>
              <nav aria-label="Page navigation" style="margin-top:1rem">
              <?php if(!empty($trang) && $trang>1){ ?>
                  <ul class="pagination pagination-sm justify-content-end">
                    <?php if($page>1):$prev_page = ($page-1);?>
                    <li class="page-item prev">
                      <a class="page-link"style="background-color: white;" href="index.php?action=quanlyhocvien&query=danhsach&trang=<?php echo $prev_page ?>"><i class="tf-icon bx bx-chevrons-left"></i></a>
                    </li>
                    <?php endif;?>
                    <?php 
                    $part = 2;
                    $start =$page -$part;
                    if($start <1){
                      $start = 1;
                    }
                    $end= $page+$part;
                    if($end > $trang){ 
                      $end = $trang;
                    }
                            for($i=$start;$i<=$end;$i++){
                        ?>
                    <li class="page-item <?php echo ($i==$page)?'active':FALSE; ?>" >
                      <a class="page-link" href="index.php?action=quanlyhocvien&query=danhsach&trang=<?php echo $i ?>"><?php echo $i ?></a>
                    </li>
                    <?php }?>
                    <?php if ($page < $trang):$next_page=($page+1);?>
                    <li class="page-item next">
                      <a class="page-link" style="background-color: white;" href="index.php?action=quanlyhocvien&query=danhsach&trang=<?php echo $next_page ?>"><i class="tf-icon bx bx-chevrons-right"></i></a>
                    </li>
                    <?php endif;?>
                  </ul>
                  <?php } ?>
                </nav>
              <!--/ Basic Bootstrap Table -->
          
              <!-- <hr class="my-5" /> -->
              <!--/ Responsive Table -->
            </div>