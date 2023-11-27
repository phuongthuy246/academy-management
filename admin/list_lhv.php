

<div class="container-xxl flex-grow-1 container-p-y">
              <div class="th" style="display: flex; justify-content: space-between;">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Danh mục /</span> Lớp dạy</h4>
                <!-- <button type="button" class="btn btn-outline-primary" style="height: fit-content;" data-bs-toggle="modal" data-bs-target="#basicModal">Thêm</button> -->
              </div>
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Lớp dạy</h5>
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
                    $sql_lietke_lp = "SELECT * FROM lichhoc, lophoc, giaovien,capdo WHERE lichhoc.mal=lophoc.mal AND lichhoc.magv=giaovien.magv AND lophoc.macd=capdo.macd AND lichhoc.magv= '$user[magv]' ORDER BY malh ASC";
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
                          
							<a type="button" class="btn btn-outline-primary" style="height: fit-content;" href="?action=quanlylhv&query=xem&mal=<?php echo $row['mal'] ?>">Xem danh sách học viên</a>

                         
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
            
			