
<?php
$ten= $_POST['ten'];
$sdt = $_POST['sdt'];
$namsinh = $_POST['namsinh'];
$diachi = $_POST['diachi'];
$anh = $_FILES['anh']['name'];
$anh_tmp =$_FILES['anh']['tmp_name'];
$gioitinh=$_POST['gioitinh'];
$email=$_POST['email'];
if (isset($_POST['doithongtin'])) {
	if ( $anh != '') {
		move_uploaded_file($anh_tmp, '../admin/uploads/' .$anh);
		$sql_update = "UPDATE hocvien SET  tenhv='".$ten."', namsinhhv='" . $namsinh . "',gioitinh='".$gioitinh."',anh='".$anh."' ,sdthv='".$sdt."', diachihv='" . $diachi . "', email='" . $email . "' WHERE mahv ='$_GET[mahv]'";
		$sql = "SELECT * FROM hocvien WHERE mahv = '$_GET[mahv]' LIMIT 1";
		$query = mysqli_query($mysqli, $sql);
		while ($row = mysqli_fetch_array($query)) {
			unlink('../admin/uploads/' . $row['anh']);
		}
	}
	else {
		$sql_update = "UPDATE hocvien SET  tenhv='".$ten."', namsinhhv='" . $namsinh . "',gioitinh='".$gioitinh."',sdthv='".$sdt."', diachihv='" . $diachi . "', email='" . $email . "' WHERE mahv ='$_GET[mahv]'";
		// $sql_update = "UPDATE ThuongHieu SET  TenTH='$tenth',`AnhTH`='$anhth' WHERE MaTH='".$_GET['MaTH']."'";
	}
	if(mysqli_query($mysqli, $sql_update)===TRUE){

		echo "<script type='text/javascript'>
		alert('Cập nhật thông tin thành công!');
		document.location='index.php?page=infor-user&mahv='$_GET[mahv]'';
	</script>";
	}else{
		echo"<script type='text/javascript'>
		alert('Cập nhật thông tin không thành công!');
		document.location='infor-user.php';
	</script>";
	}
	// mysqli_query($mysqli, $sql_update);
	// header('Location:../../index.php?action=quanlythuonghieu&query=danhsach');
}
?>
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px"
      >
        <h3 class="display-3 font-weight-bold text-white">Hồ sơ</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="index.php">Trang chủ</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Thông tin cá nhân</p>
        </div>
      </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
	<?php
				$sql = "SELECT * FROM hocvien WHERE mahv='$_GET[mahv]' LIMIT 1";
				$query = mysqli_query($mysqli, $sql);
				?>
<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Cập nhật thông tin</span>
          </p>
          <!-- <h1 class="mb-4">ToanTT đồng hành cùng bạn</h1> -->
        </div>
		<!-- style="text-align: -webkit-center;display: revert;" -->
		<form method="POST" enctype="multipart/form-data">
			<div class="row" style="justify-content: space-between;">
			
			<?php
										while ($row = mysqli_fetch_array($query)) {
											$gender= $row['gioitinh'];
										?>
				<div class="co" style=" background-color: #ebfcff;width: 26%;">
					<div class=" align-items-start align-items-sm-center gap-4">
							<img style="margin: 0 auto;
								border-radius: 115px;
								margin-top: 20px;"
							src="../admin/uploads/<?php echo $row['anh'] ?>"
							alt="user-avatar"
							class="d-block "
							height="220"
							width="220"
							id="uploadedAvatar"
							/>
							<div style="text-align: center; margin-top: 10px;color: black;"><?php echo $row['tenhv'] ?></div>
							<div style="text-align: center;"><?php echo $row['username'] ?></div>
							<div class="button-wrapper" style="text-align: center;">
							<label style="margin-top: 15px;" for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
								<span class="d-none d-sm-block">Đổi ảnh đại diện</span>
								<i class="bx bx-upload d-block d-sm-none"></i>
								<input
								type="file"
								id="upload"
								class="account-file-input"
								hidden
								name="anh"
								accept="image/png, image/jpeg"
								/>
							</label>
							

							<!-- <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p> -->
							</div> 
						</div>
						<ul style="list-style:none; padding-left: 38px;font-size: 16px;">
							<li style="margin: 5px 0 12px 0;"><i class="fas fa-user-edit"></i><a style="margin-left: 8px; color: #666666;text-decoration:none;" href="index.php?page=infor-user&mahv=<?php echo $user['mahv'] ?>">Hồ sơ cá nhân</a></li>
							<li style="margin: 0px 0 12px 0;"><i class="fas fa-history"></i><a style="margin-left: 10px;color: #666666;text-decoration:none;" href="index.php?page=history&mahv=<?php echo $user['mahv'] ?>">Lịch sử đăng ký</a></li>
							<li style="margin: 0px 0 12px 0;"><i class="fas fa-calendar-alt"></i><a style="margin-left: 10px;color: #666666;text-decoration:none;" href="index.php?page=schedule&mahv=<?php echo $user['mahv'] ?>">Lịch học</a></li>
							<li style="margin: 0px 0 12px 0;"><i class="fas fa-table"></i></i><a style="margin-left: 10px;color: #666666;text-decoration:none;" href="index.php?page=transcript&mahv=<?php echo $user['mahv'] ?>">Bảng điểm</a></li>

						</ul>
						
						
						

				</div>
				<div class="righ-usr" style="background-color: #ebfcff;justify-content: space-between;
					width: 70%;
					display: flow-root;">
					<div class="form-grid">
						<p style="    font-weight: bolder;
							padding: 20px 45px 0;
							font-size: 18px;">Thông tin cá nhân</p>
						<div class="form-group" style="
							display: flex;
							justify-content: space-between;
							padding: 10px 45px 0;
							margin-bottom:0;
						">
							<label class="control-label" style="padding-top:8px;">Họ tên trẻ</label>
							<div class="form-info" style="width: 80%">
								<input
									type="text"
									class="form-control"
									id="name"
									placeholder=""
									value="<?php echo $row['tenhv'] ?>"
									required="required"
									name="ten"
									data-validation-required-message="Please enter your name"
								/>
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="form-group" style="
									display: flex;
									justify-content: space-between;
									padding: 0px 45px;
									margin-bottom:0;
								">
							<label class="control-label" style="padding-top:8px;">Năm sinh trẻ</label>
							<div class="form-info" style="width: 80%">
								<input
									type="date"
									class="form-control"
									id="email"
									value="<?php echo $row['namsinhhv'] ?>"
									required="required"
									name="namsinh"
									data-validation-required-message="Please enter your email"
								/>
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="form-group" style="
									display: flex;
									justify-content: space-between;
									padding: 0px 45px;
									margin-bottom:0;
								">
							<label class="control-label" style="padding-top:8px;">Giới tính trẻ</label>
							<div class="form-info" style="width: 80%">
								<select
									type="text"
									class="form-control"
									id="subject"
									name="gioitinh"
									required="required"
									data-validation-required-message="Please enter a subject"
								>
								<option value=" ">--select--</option>
								<option value="Nam" <?php if($gender == "Nam"){?> selected="selected" <?php }?> >Nam</option>
								<option value="Nu" <?php if($gender == "Nu"){?> selected="selected" <?php }?> >Nữ</option>
								<!-- <option value="<?php echo $row['gioitinh'] ?>"><?php echo $row['gioitinh'] ?></option> -->
                				</select>
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<p style="    font-weight: bolder;
							padding: 10px 45px 0;
							font-size: 18px;">Thông tin liên hệ</p>
						<div class="form-group" style="
							display: flex;
							justify-content: space-between;
							padding: 0px 45px;
							margin-bottom:0;
						">
							<label class="control-label" style="padding-top:8px;">Địa chỉ</label>
							<div class="form-info" style="width: 80%">
								<input
									type="text"
									class="form-control"
									id="subject"
									value="<?php echo $row['diachihv'] ?>"
									required="required"
									name="diachi"
									data-validation-required-message="Please enter a subject"
								/>
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="form-group" style="
									display: flex;
									justify-content: space-between;
									padding: 0 45px ;
									margin-bottom:0;
								">
							<label class="control-label" style="padding-top:8px;">Email</label>
							<div class="form-info" style="width: 80%">
								<input
									type="text"
									class="form-control"
									id="subject"
									value="<?php echo $row['email'] ?>"
									required="required"
									data-validation-required-message="Please enter a subject"
									name="email"
								/>
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="form-group" style="
									display: flex;
									justify-content: space-between;
									padding: 0 45px 10px;
									margin-bottom:0;
								">
							<label class="control-label" style="padding-top:8px;">Số điện thoại</label>
							<div class="form-info" style="width: 80%">
								<input
									type="text"
									class="form-control"
									id="subject"
									value="<?php echo $row['sdthv'] ?>"
									required="required"
									name="sdt"
									data-validation-required-message="Please enter a subject"
								/>
								<p class="help-block text-danger"></p>
							</div>
						</div>
						
					</div>
					<div style="display: flex;
								justify-content: flex-end;
								padding-right: 45px;
								padding-bottom: 25px;">
						<button
							class="btn btn-primary py-2 px-4"
							type="submit"
							id="sendMessageButton"
							name="doithongtin"
						>
							Cập nhật
						</button>
					</div>
						
						
				</div>
				
				
				<?php
										}
										?>
				
			</div>
		</form>
    </div>
</div>
    <!-- Contact End -->

    <!-- Footer Start -->
    
    <!-- Footer End -->

    <!-- Back to Top -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

