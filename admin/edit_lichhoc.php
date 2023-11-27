
<?php
include('./config/config.php');
$lophoc= $_POST['lophoc'];
$thu= $_POST['thu'];
$kynang= $_POST['kynang'];
$giaovien= $_POST['giaovien'];
$giobd = $_POST['giobd'];
$giokt = $_POST['giokt'];

if (isset($_POST['sualichday'])) {
	$sql_update = "UPDATE lichhoc SET mal='" . $lophoc . "', mat='".$thu."', makn='".$kynang."', magv='".$giaovien."', giobd='".$giobd."', giokt='".$giokt."' WHERE malh='$_GET[malh]'";
	mysqli_query($mysqli, $sql_update);
	if(mysqli_query($mysqli, $sql_update)===TRUE){

		echo"<script type='text/javascript'>
		alert('Cập nhật lịch học thành công!');
		document.location='index.php?action=quanlylichhoc&query=danhsach';
	</script>";
	}else{
		echo"<script type='text/javascript'>
		alert('Cập nhật lịch học không thành công!');
		document.location='index.php?action=quanlylichhoc&query=danhsach';
	</script>";
	}
}
?>
            <div class="container-xxl flex-grow-1 container-p-y">
			  	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Danh mục /</span>Sửa lịch học</h4>                
				<div class="card">
					<?php
					$sql_sua_tt = "SELECT * FROM lichhoc WHERE malh='$_GET[malh]' LIMIT 1";
					$query_sua_tt = mysqli_query($mysqli, $sql_sua_tt);
					?>
                                <!-- <h5 class="modal-title" id="exampleModalLabel1">Thêm tin tức</h5> -->
                           
                              <form action="" method="POST" style="margin-top: -50px;">
							  	<?php
								while ($dong = mysqli_fetch_array($query_sua_tt)) {
								?>
                                <div class="modal-body" style="padding: 4.5rem 1.5rem 1.5rem 1.5rem;">
                                  <div class="mb-3">
								  		<label for="exampleFormControlSelect1" class="form-label">Thứ</label>
										<select class="form-select" name="thu" id="exampleFormControlSelect1" >
										<?php
											$sql_thu = "SELECT * FROM thu ORDER BY mat ASC";
											$query_thu = mysqli_query($mysqli, $sql_thu);
											while ($row_thu = mysqli_fetch_array($query_thu)) {
												if ($row_thu['mat'] == $dong['mat']) {
											?>
										<!-- <option selected>Open this select menu</option> -->
											<option selected value="<?php echo $row_thu['mat'] ?>"><?php echo $row_thu['tent'] ?></option>
											<?php
											} else {
											?>
											<option value="<?php echo $row_thu['mat'] ?>"><?php echo $row_thu['tent'] ?></option>
											<?php
												}
											}
											?>
										</select> 
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
										<label for="exampleFormControlSelect1" class="form-label">Lớp học</label>
										<select class="form-select" name="lophoc" id="exampleFormControlSelect1" >
										<?php
											$sql_lophoc = "SELECT * FROM lophoc ORDER BY mal ASC";
											$query_lophoc = mysqli_query($mysqli, $sql_lophoc);
											while ($row_lophoc = mysqli_fetch_array($query_lophoc)) {
												if ($row_lophoc['mal'] == $dong['mal']) {
											?>
										<!-- <option selected>Open this select menu</option> -->
											<option selected value="<?php echo $row_lophoc['mal'] ?>"><?php echo $row_lophoc['tenl'] ?></option>
											<?php
											} else {
											?>
											<option value="<?php echo $row_lophoc['mal'] ?>"><?php echo $row_lophoc['tenl'] ?></option>
											<?php
												}
											}
											?>
										</select>                                 
									</div>
                                  </div>

								  <div class="row">
                                    <div class="col mb-3">
									  <label for="exampleFormControlSelect1" class="form-label">Giáo viên</label>
										<select class="form-select" name="giaovien" id="exampleFormControlSelect1" >
										<?php
											$sql_gv = "SELECT * FROM giaovien ORDER BY magv ASC";
											$query_gv = mysqli_query($mysqli, $sql_gv);
											while ($row_gv = mysqli_fetch_array($query_gv)) {
												if ($row_gv['magv'] == $dong['magv']) {
											?>
										<!-- <option selected>Open this select menu</option> -->
											<option selected value="<?php echo $row_gv['magv'] ?>"><?php echo $row_gv['tengv'] ?></option>
											<?php
											} else {
											?>
											<option value="<?php echo $row_gv['magv'] ?>"><?php echo $row_gv['tengv'] ?></option>
											<?php
												}
											}
											?>
										</select>                                    
									</div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
									  <label for="exampleFormControlSelect1" class="form-label">Kỹ năng</label>
										<select class="form-select" name="kynang" id="exampleFormControlSelect1" >
										<?php
											$sql_kn = "SELECT * FROM kynang ORDER BY makn ASC";
											$query_kn = mysqli_query($mysqli, $sql_kn);
											while ($row_kn = mysqli_fetch_array($query_kn)) {
												if ($row_kn['makn'] == $dong['makn']) {
											?>
										<!-- <option selected>Open this select menu</option> -->
											<option selected value="<?php echo $row_kn['makn'] ?>"><?php echo $row_kn['tenkn'] ?></option>
											<?php
											} else {
											?>
											<option value="<?php echo $row_kn['makn'] ?>"><?php echo $row_kn['tenkn'] ?></option>
											<?php
												}
											}
											?>
										</select>                                    
									</div>
                                  </div>

                                  <div class="row" style="margin-bottom: 1rem !important;">
                                    <div class="mb-3 col-md-6">
									  <label for="html5-time-input" class="form-label">Giờ bắt đầu</label>
                                      <input class="form-control" type="time" name="giobd" value="<?php echo $dong['giobd'] ?>" id="html5-time-input" />                                    
									</div>
								  	
                                    <div class="mb-3 col-md-6">
										<label for="html5-time-input" class="form-label">Giờ kết thúc</label>
                                      	<input class="form-control" type="time" name="giokt" value="<?php echo $dong['giokt'] ?>" id="html5-time-input" />
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <a type="button" class="btn btn-outline-secondary" href="index.php?action=quanlylichhoc&query=danhsach">
                                    Huỷ
                                  </a>
                                  <button type="submit" class="btn btn-primary" name="sualichday">Lưu</button>
                                </div>
								<?php
				}
				?>
                              </form>
		</div>
							</div>