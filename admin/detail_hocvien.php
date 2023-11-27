<?php if (isset($_GET['mahv'])) {
  $query = "SELECT * FROM hocvien WHERE mahv= '$_GET[mahv]'";
  $datasql = mysqli_query($mysqli, $query);
  if (mysqli_num_rows($datasql) != 0) {
    $row = mysqli_fetch_array($datasql, 1);
	$gender= $row['gioitinh'];
  ?>
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tài khoản /</span> Hồ sơ học viên</h4>

              <div class="row">
                <div class="col-md-12">
                  
                  <div class="card mb-4">
                    <h5 class="card-header">Thông tin cá nhân</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="./uploads/<?php echo $row['anh'] ?>"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Họ tên</label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="firstName"
                              value="<?php echo $row['tenhv']; ?>"
                              disabled
                            />
                          </div>
						  <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Username</label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="firstName"
                              value="<?php echo $row['username']; ?>"
                              disabled
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="country">Giới tính</label>
                            <select id="country" class="select2 form-select" disabled>
                              <option value="Nam"<?php if($gender == "Nam"){?> selected="selected" <?php }?>>Nam</option>
                              <option value="Nu"<?php if($gender == "Nu"){?> selected="selected" <?php }?>>Nữ</option>
                              <option value="Bangladesh">Bangladesh</option>
                              
                            </select>
                          </div>
						  <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Năm sinh</label>
                            <input
                              class="form-control"
                              type="date"
                              id="email"
                              name="email"
                              value="<?php echo $row['namsinhhv']; ?>"
                              disabled
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="email"
                              value="<?php echo $row['email']; ?>"
                              disabled
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label">Số điện thoại</label>
                            <input
                              type="text"
                              class="form-control"
                              id="organization"
                              name="organization"
                              value="<?php echo $row['sdthv']; ?>"
							  disabled
                            />
                          </div>
                          
                          <div class="mb-3 col-md-12">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['diachihv']; ?>" disabled/>
                          </div>
                          
                          
                        </div>
                        <div class="mt-2">
                          <!-- <button type="submit" class="btn btn-primary me-2">Save changes</button> -->
                          <a href="?action=quanlyhocvien&query=danhsach" class="btn btn-outline-secondary">Trở về</a>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                  
                </div>
              </div>
            </div>
			<?php
            }
          }
        ?>