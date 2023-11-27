
<?php

include('./config/config.php');
require('../carbon/autoload.php');

use Carbon\Carbon;
use Carbon\CarbonInterval;

$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

$loaitintuc= $_POST['loaitintuc'];
$tentt = $_POST['tentt'];
$anhtt = $_FILES['anhtt']['name'];
$anhtt_tmp =$_FILES['anhtt']['tmp_name'];
// $anhtt = time() . '_' . $anhtt;

$motatt=$_POST['motatt'];
$noidungtt=$_POST['noidungtt'];

//xulyhinhanh

if (isset($_POST['suatintuc'])) {
	if ( $anhtt != '') {
		
		move_uploaded_file($anhtt_tmp, 'uploads/' .$anhtt);
		$sql_update = "UPDATE tintuc SET  maltt='".$loaitintuc."', tentt='" . $tentt . "',motatt='".$motatt."',noidungtt='".$noidungtt."' ,ngaytt='".$now."', anhtt='" . $anhtt . "' WHERE matt ='$_GET[matt]'";
		$sql = "SELECT * FROM tintuc WHERE matt = '$_GET[matt]' LIMIT 1";

		
		$query = mysqli_query($mysqli, $sql);
		
		while ($row = mysqli_fetch_array($query)) {
			
			unlink('uploads/' . $row['anhtt']);
		}
	}
	else {
		$sql_update = "UPDATE tintuc SET  maltt='".$loaitintuc."', tentt='" . $tentt . "',motatt='".$motatt."',noidungtt='".$noidungtt."' ,ngaytt='".$now."' WHERE matt ='$_GET[matt]'";
		// $sql_update = "UPDATE ThuongHieu SET  TenTH='$tenth',`AnhTH`='$anhth' WHERE MaTH='".$_GET['MaTH']."'";

	}
	if(mysqli_query($mysqli, $sql_update)===TRUE){

		echo"<script type='text/javascript'>
		alert('Cập nhật tin tức thành công!');
		document.location='index.php?action=quanlytintuc&query=danhsach';
	</script>";
	}else{
		echo"<script type='text/javascript'>
		alert('Cập nhật tin tức không thành công!');
		document.location='index.php?action=quanlytintuc&query=danhsach';
	</script>";
	}
	// mysqli_query($mysqli, $sql_update);
	// header('Location:../../index.php?action=quanlythuonghieu&query=danhsach');
}
?>
            <div class="container-xxl flex-grow-1 container-p-y">
              
			  	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Danh mục /</span>Sửa tin tức</h4>                <!-- <button type="button" class="btn btn-outline-primary" style="height: fit-content;" data-bs-toggle="modal" data-bs-target="#basicModal">Thêm</button> -->
              
				<div class="card">
			<?php
				$sql_sua_tt = "SELECT * FROM tintuc WHERE matt='$_GET[matt]' LIMIT 1";
				$query_sua_tt = mysqli_query($mysqli, $sql_sua_tt);
				?>
                                <!-- <h5 class="modal-title" id="exampleModalLabel1">Thêm tin tức</h5> -->
                           
                              <form action="" method="POST" enctype="multipart/form-data" style="margin-top: -50px;">
							  <?php
								while ($dong = mysqli_fetch_array($query_sua_tt)) {
								?>
                                <div class="modal-body" style="padding: 4.5rem 1.5rem 1.5rem 1.5rem;">
                                  <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Loại tin</label>
                                    <select class="form-select" name="loaitintuc" id="exampleFormControlSelect1" >
									<?php
										$sql_loaitt = "SELECT * FROM loaitt ORDER BY maltt ASC";
										$query_loaitt = mysqli_query($mysqli, $sql_loaitt);
										while ($row_loaitt = mysqli_fetch_array($query_loaitt)) {
											if ($row_loaitt['maltt'] == $dong['maltt']) {
										?>
                                      <!-- <option selected>Open this select menu</option> -->
									  	<option selected value="<?php echo $row_loaitt['maltt'] ?>"><?php echo $row_loaitt['tenltt'] ?></option>
										<?php
										} else {
										?>
										<option value="<?php echo $row_loaitt['maltt'] ?>"><?php echo $row_loaitt['tenltt'] ?></option>
										<?php
											}
										}
										?>
                                    </select>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameBasic" class="form-label">Tên tin tức</label>
                                      <input type="text" name="tentt" class="form-control"value="<?php echo $dong['tentt'] ?>"/>
                                    </div>
                                  </div>
                                  <div class="mb-3">
                                    <label for="formFile" class="form-label">Hình ảnh</label>
                                    <input class="form-control" name="anhtt" type="file"  >
									<img src="./uploads/<?php echo $dong['anhtt'] ?>" width="150px"></td>
                                  </div>
                                  <div class="row" style="margin-bottom: 1rem !important;">
                                    <div class="col- mb3">
                                      <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                                      <textarea class="form-control" name="motatt"  rows="3" style="height: 54px;" ><?php echo $dong['motatt'] ?></textarea>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col- mb3">
                                      <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                                      <textarea class="form-control" name="noidungtt" rows="3" style="height: 80px;" ><?php echo $dong['noidungtt'] ?></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" onclick="history.back()">
                                    Huỷ
                                  </button>
                                  <button type="submit" class="btn btn-primary" name="suatintuc">Lưu</button>
                                </div>
								<?php
				}
				?>
                              </form>
							  </div>
							</div>