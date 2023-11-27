



<?php
	
	$sql = "SELECT * FROM phieudangki, lophoc, hocvien WHERE phieudangki.mahv=hocvien.mahv AND phieudangki.mal=lophoc.mal AND phieudangki.mal='$_GET[mal]' LIMIT 1";
	$query = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_array($query);
?>

<div class="container-xxl flex-grow-1 container-p-y">
              <div class="th" style="display: flex; justify-content: space-between;">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><?php echo $row['tenl']?> /</span> Danh sách học viên</h4>
                <!-- <button type="button" class="btn btn-outline-primary" style="height: fit-content;" data-bs-toggle="modal" data-bs-target="#basicModal">Thêm</button> -->

              </div>
              <div class="card">
                <h5 class="card-header">Danh sách học viên</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Điểm lần 1</th>
                        <th>Điểm lần 2</th>
                        <th>Điểm lần 3</th>
                        <th>Điểm cuối khoá</th>
                        <th>Tuỳ chọn</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
					          $sql_lietke_lp  = "SELECT * FROM phieudangki, lophoc, hocvien ,lichhoc,giaovien WHERE phieudangki.mahv=hocvien.mahv AND phieudangki.mal=lophoc.mal AND phieudangki.mal='$row[mal]' AND lichhoc.mal=lophoc.mal AND lichhoc.mal='$row[mal]' AND lichhoc.magv=giaovien.magv AND lichhoc.magv= '$user[magv]' ORDER BY map DESC";
                    $query_lietke_lp = mysqli_query($mysqli, $sql_lietke_lp);
                    $i = 0;
                    while ($rowhv = mysqli_fetch_array($query_lietke_lp)) {
                      $i++;
                      // $row['mahv']=$mahv;
                    ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $i; ?></strong></td>
                        <td><?php echo $rowhv['tenhv'] ;?></td>
                        <!-- <td><?php echo $row['mahv'] ;?></td> -->
                        <?php 
                        $sql_bd= "SELECT * FROM bangdiem, hocvien, lophoc WHERE bangdiem.mahv=hocvien.mahv AND bangdiem.mal=lophoc.mal AND bangdiem.mahv='$rowhv[mahv]' AND bangdiem.mal='$row[mal]'";
                        $query_bd = mysqli_query($mysqli, $sql_bd);
                        // $i = 0;
                        $row_bd = mysqli_fetch_array($query_bd) ;
                          // $i++;
                         ?>
                        <td><?php echo $row_bd['dieml1'] ;?></td>
                        <td><?php echo $row_bd['dieml2'] ;?></td>
                        <td><?php echo $row_bd['dieml3'] ;?></td>
                        <td><?php echo $row_bd['diemcuoikhoa'] ;?></td>
                        
                        <td><a href="?action=quanlylhv&query=diem&mal=<?php echo $row['mal'] ?>&mahv=<?php echo $rowhv['mahv'] ?>"  class="btn btn-outline-primary" style="height: fit-content;" >Thêm điểm</a></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <button type="button" class="dropdown-item" style="height: fit-content;" data-bs-toggle="modal" data-bs-target="#basicModal1"><i class='bx bx-plus'></i>Thêm</button>

                              <a class="dropdown-item" href="?action=quanlylhv&query=edit&mabd=<?php echo $row_bd['mabd'] ?>"
                                ><i class="bx bx-edit-alt me-1"></i>Sửa</a
                              >
                              <a class="dropdown-item" onclick="return Del('<?php echo $row['tencn'] ?>')" href="list_camnang.php?macn=<?php echo $row['macn'] ?>"
                                ><i class="bx bx-trash me-1"></i>Xoá</a
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
            
            <!-- <div class="modal fade" id="basicModal1" tabindex="-1" aria-labelledby="basicModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
					        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Thêm điểm</h5>
							                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                            ></button>
                        </div>
                        <form action="" method="post" >
                          <div class="modal-body">
                            
                            <input type="text" name="mahv" value="<?php echo $rowhv['mahv'] ?>" hidden required />
                            <input type="text" name="mal" value="<?php echo $row['mal'] ?>" hidden required />
                            <div class="row g-2" style="margin-bottom: 1rem !important;">
                                    <div class="col mb-0">
                                      <label for="emailLarge" class="form-label">Điểm lần 1</label>
                                      <input type="text" name="dieml1" id="emailLarge" class="form-control" placeholder="" />
                                    </div>
                                    
                                    <div class="col mb-0">
                                      <label for="emailLarge"  class="form-label">Điểm lần 2</label>
                                      <input type="text" name="dieml2"  class="form-control" placeholder="" />
                                    </div>
                                  </div>
                            <div class="row g-2" style="margin-bottom: 1rem !important;">
                                    <div class="col mb-0">
                                      <label for="emailLarge" class="form-label">Điểm lần 3</label>
                                      <input type="text" name="dieml3" id="emailLarge" class="form-control" placeholder="" />
                                    </div>
                                    
                                    <div class="col mb-0">
                                      <label for="emailLarge"  class="form-label">Điểm cuối khoá</label>
                                      <input type="text" name="diemcuoikhoa"  class="form-control" placeholder="" />
                                    </div>
                            </div>
                           
                          <div class="modal-footer">
                              <button type="reset" class="btn btn-outline-secondary" >
                              Đặt lại
                              </button>
                              <button type="submit" class="btn btn-primary" name="themdiem">Lưu</button>
                          </div>
                        </form>
                  </div>
							
				        </div>
          	</div> -->