
<?php

include('./config/config.php');
require('../carbon/autoload.php');

use Carbon\Carbon;
use Carbon\CarbonInterval;

$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

$loaicamnang= $_POST['loaicamnang'];
$tencn = $_POST['tencn'];
$anhcn = $_FILES['anhcn']['name'];
$anhcn_tmp =$_FILES['anhcn']['tmp_name'];
// $anhtt = time() . '_' . $anhtt;

// $motac=$_POST['motatt'];
$noidungcn=$_POST['noidungcn'];

//xulyhinhanh

if (isset($_POST['suacamnang'])) {
	if ( $anhcn != '') {
		
		move_uploaded_file($anhcn_tmp, 'uploads/' .$anhcn);
		$sql_update = "UPDATE camnang SET  malcn='".$loaicamnang."', tencn='" . $tencn . "',noidungcn='".$noidungcn."' ,ngaycn='".$now."', anhcn='" . $anhcn . "' WHERE macn ='$_GET[macn]'";
		$sql = "SELECT * FROM camnang WHERE macn = '$_GET[macn]' LIMIT 1";

		
		$query = mysqli_query($mysqli, $sql);
		
		while ($row = mysqli_fetch_array($query)) {
			
			unlink('uploads/' . $row['anhcn']);
		}
	}
	else {
		$sql_update = "UPDATE camnang SET  malcn='".$loaicamnang."', tencn='" . $tencn . "',noidungcn='".$noidungcn."' ,ngaycn='".$now."' WHERE macn ='$_GET[macn]'";
		// $sql_update = "UPDATE ThuongHieu SET  TenTH='$tenth',`AnhTH`='$anhth' WHERE MaTH='".$_GET['MaTH']."'";

	}
	if(mysqli_query($mysqli, $sql_update)===TRUE){

		echo"<script type='text/javascript'>
		alert('Cập nhật cẩm nang thành công!');
		document.location='index.php?action=quanlycamnang&query=danhsach';
	</script>";
	}else{
		echo"<script type='text/javascript'>
		alert('Cập nhật cẩm nang không thành công!');
		document.location='index.php?action=quanlycamnang&query=danhsach';
	</script>";
	}
	// mysqli_query($mysqli, $sql_update);
	// header('Location:../../index.php?action=quanlythuonghieu&query=danhsach');
}
?>
            <div class="container-xxl flex-grow-1 container-p-y">
              
			  	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Danh mục /</span>Sửa cẩm nang</h4>                <!-- <button type="button" class="btn btn-outline-primary" style="height: fit-content;" data-bs-toggle="modal" data-bs-target="#basicModal">Thêm</button> -->
              
				<div class="card">
			<?php
				$sql_sua_tt = "SELECT * FROM camnang WHERE macn='$_GET[macn]' LIMIT 1";
				$query_sua_tt = mysqli_query($mysqli, $sql_sua_tt);
				?>
                                <!-- <h5 class="modal-title" id="exampleModalLabel1">Thêm tin tức</h5> -->
                           
                              <form action="" method="POST" enctype="multipart/form-data" style="margin-top: -50px;">
							  <?php
								while ($dong = mysqli_fetch_array($query_sua_tt)) {
								?>
                                <div class="modal-body" style="padding: 4.5rem 1.5rem 1.5rem 1.5rem;">
                                  <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Loại cẩm nang</label>
                                    <select class="form-select" name="loaicamnang" id="exampleFormControlSelect1" >
									<?php
										$sql_loaicn = "SELECT * FROM loaicamnang ORDER BY malcn ASC";
										$query_loaicn = mysqli_query($mysqli, $sql_loaicn);
										while ($row_loaicn = mysqli_fetch_array($query_loaicn)) {
											if ($row_loaicn['malcn'] == $dong['malcn']) {
										?>
                                      <!-- <option selected>Open this select menu</option> -->
									  	<option selected value="<?php echo $row_loaicn['malcn'] ?>"><?php echo $row_loaicn['tenlcn'] ?></option>
										<?php
										} else {
										?>
										<option value="<?php echo $row_loaicn['malcn'] ?>"><?php echo $row_loaicn['tenlcn'] ?></option>
										<?php
											}
										}
										?>
                                    </select>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameBasic" class="form-label">Tên cẩm nang</label>
                                      <input type="text" name="tencn" class="form-control"value="<?php echo $dong['tencn'] ?>"/>
                                    </div>
                                  </div>
                                  <div class="mb-3">
                                    <label for="formFile" class="form-label">Hình ảnh</label>
                                    <input class="form-control" name="anhcn" type="file"  >
									<img src="./uploads/<?php echo $dong['anhcn'] ?>" width="150px"></td>
                                  </div>
                                  <!-- <div class="row" style="margin-bottom: 1rem !important;">
                                    <div class="col- mb3">
                                      <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                                      <textarea class="form-control" name="motatt"  rows="3" style="height: 54px;" ><?php echo $dong['motatt'] ?></textarea>
                                    </div>
                                  </div> -->
                                  <div class="row">
                                    <div class="col- mb3">
                                      <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                                      <textarea class="form-control" name="noidungcn" rows="3" style="height: 80px;" ><?php echo $dong['noidungcn'] ?></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" onclick="history.back()">
                                    Huỷ
                                  </button>
                                  <button type="submit" class="btn btn-primary" name="suacamnang">Lưu</button>
                                </div>
								<?php
				}
				?>
                              </form>
							  </div>
							</div>