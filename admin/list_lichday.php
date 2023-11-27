


<div class="container-xxl flex-grow-1 container-p-y">
              <div class="th" style="display: flex; justify-content: space-between;">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Danh mục /</span> Lịch dạy</h4>
                <!-- <button type="button" class="btn btn-outline-primary" style="height: fit-content;" data-bs-toggle="modal" data-bs-target="#basicModal">Thêm</button> -->
              </div>
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Lịch dạy</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                  
                    <thead>
                    
                      <tr>
                        <th>Thứ</th>
                        <th>Lớp</th>
                        <th>Kĩ năng</th>
                        <!-- <th>Giáo viên</th> -->
                        <th>Giờ học</th>
                      </tr>
                      
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    $sql_lietke_lh = "SELECT * FROM lichhoc, lophoc, thu, kynang, giaovien WHERE lichhoc.mal=lophoc.mal AND lichhoc.mat=thu.mat AND lichhoc.makn=kynang.makn AND lichhoc.magv=giaovien.magv AND lichhoc.magv= '$user[magv]' ORDER BY malh ASC";
                    $query_lietke_lh = mysqli_query($mysqli, $sql_lietke_lh);
                    $i = 0;
                    while ($row = mysqli_fetch_array($query_lietke_lh)) {
                      $i++;
                    ?>
                      <tr>
                        <td><?php echo $row['tent']?></td>
                        <td><?php echo $row['tenl'] ?></td> 
                        <td><?php echo $row['tenkn'] ?></td>
                        <!-- <td><?php echo $row['tengv'] ?></td> -->
                        <td><?php echo $row['giobd']?> - <?php echo $row['giokt'] ?></td>
                        <!-- <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="?action=quanlylichhoc&query=edit&malh=<?php echo $row['malh'] ?>"
                                ><i class="bx bx-edit-alt me-1"></i> Sửa</a
                              >
                              <a class="dropdown-item" onclick="return Del('<?php echo $row['tenl'] ?>')" href="list_lop.php?mal=<?php echo $row['mal'] ?>"
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
              <!--/ Basic Bootstrap Table -->
          
              <!-- <hr class="my-5" /> -->

              
              <!--/ Responsive Table -->
            </div>
            