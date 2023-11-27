<?php
include('./config/config.php');
$tencd = $_POST['tencd'];
$dotuoi=$_POST['dotuoi'];
$motacd= $_POST['motacd'];
$noidung= $_POST['noidung'];
$muchocphi= $_POST['muchocphi'];
$anhcd = $_FILES['anhcd']['name'];
$anhcd_tmp =$_FILES['anhcd']['tmp_name'];

if (isset($_POST['suacd'])) {
	if ( $anhcd != '') {
		
		move_uploaded_file($anhcd_tmp, "uploads/" .$anhcd);
		$sql_update = "UPDATE capdo SET  tencd='" . $tencd . "',dotuoi='" . $dotuoi . "',motacd='".$motacd."',noidung='".$noidung."' ,muchocphi='".$muchocphi."', anhcd='" . $anhcd . "' WHERE macd ='$_GET[macd]'";
		$sql = "SELECT * FROM capdo WHERE macd = '$_GET[macd]' LIMIT 1";

		// $sql_update = "UPDATE ThuongHieu SET  TenTH='$tenth',`AnhTH`='$anhth' WHERE MaTH='".$_GET['MaTH']."'";
		// $sql = "SELECT * FROM ThuongHieu WHERE MaTH = '".$_GET['MaTH']."' LIMIT 1";
		$query = mysqli_query($mysqli, $sql);
		
		while ($row = mysqli_fetch_array($query)) {
			
			unlink("uploads/" . $row['anhcd']);
		}
	}
	else {
		$sql_update = "UPDATE capdo SET tencd='" . $tencd . "',dotuoi='" . $dotuoi . "',motacd='".$motacd."',noidung='".$noidung."' ,muchocphi='".$muchocphi."' WHERE macd ='$_GET[macd]'";
		// $sql_update = "UPDATE ThuongHieu SET  TenTH='$tenth',`AnhTH`='$anhth' WHERE MaTH='".$_GET['MaTH']."'";

	}
	if(mysqli_query($mysqli, $sql_update)===TRUE){

		echo"<script type='text/javascript'>
		alert('Cập nhật cấp độ thành công!');
		document.location='index.php?action=quanlycapdo&query=danhsach';
	</script>";
	}else{
		echo"<script type='text/javascript'>
		alert('Cập nhật cấp độ không thành công!');
		document.location='index.php?action=quanlycapdo&query=danhsach';
	</script>";
	}
	// mysqli_query($mysqli, $sql_update);
	// header('Location:../../index.php?action=quanlythuonghieu&query=danhsach');
}
?>

			<div class="container-xxl flex-grow-1 container-p-y">
             
			  	<h4 class="fw-bold py-3 mb-4" ><span class="text-muted fw-light">Danh mục /</span>Sửa cấp độ</h4>                <!-- <button type="button" class="btn btn-outline-primary" style="height: fit-content;" data-bs-toggle="modal" data-bs-target="#basicModal">Thêm</button> -->
				  
					
						<div class="card">
           
							<?php
								$sql_sua_capdo = "SELECT * FROM capdo WHERE macd='$_GET[macd]' LIMIT 1";
								$query_sua_capdo = mysqli_query($mysqli, $sql_sua_capdo);
								?>
                                <!-- <h5 class="modal-title" id="exampleModalLabel1">Thêm tin tức</h5> -->
                           
                              <form action="" method="POST" enctype="multipart/form-data" style="margin-top: -50px;">
							  <?php
								while ($dong = mysqli_fetch_array($query_sua_capdo)) {
								?>
                                <div class="modal-body" style="   padding: 4.5rem 1.5rem 1.5rem 1.5rem;">
							
                                  	<div class="row">
										<div class="col mb-3">
										<label for="nameBasic" class="form-label">Tên cấp độ</label>
										<input type="text" name="tencd" class="form-control"value="<?php echo $dong['tencd'] ?>"/>
										</div>
                                  	</div>
									  <div class="row">
										<div class="col mb-3">
										<label for="nameBasic" class="form-label">Độ tuổi</label>
										<input type="text" name="dotuoi" class="form-control"value="<?php echo $dong['dotuoi'] ?>"/>
										</div>
                                  	</div>
								  	<div class="row" >
										<div class="col mb-3">
											<label for="nameBasic" class="form-label">Mô tả cấp độ</label>
											<textarea class="form-control" name="motacd" id="exampleFormControlTextarea1" rows="3" style="height: 60px;"><?php echo $dong['motacd'] ?></textarea>
										
										</div>
									</div>
									
									<div class="row" >
										<div class="col mb-3">
											<label for="nameBasic" class="form-label">Nội dung cấp độ</label>
											<textarea class="form-control" name="noidung" id="exampleFormC
                                    ontrolTextarea1" rows="5" style="height: 100px;"><?php echo $dong['noidung'] ?></textarea>
										</div>
									</div>
									<div class="row" style="margin-bottom: 1rem !important;">
										<div class="col- mb3">
										<label for="exampleFormControlTextarea1" class="form-label">Mức học phí</label>
										<input type="text" name="muchocphi" class="form-control" placeholder="" value="<?php echo $dong['muchocphi'] ?>"/>                                    
									</div>
									<div class="mb-3">
										<label for="formFile" class="form-label">Hình ảnh</label>
										<input class="form-control" name="anhcd" type="file"  >
										<img src="./uploads/<?php echo $dong['anhcd'] ?>" width="150px"></td>
                                  	</div>
									  
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" onclick="history.back()">
                                    Huỷ
                                  </button>
                                  <button type="submit" class="btn btn-primary" name="suacd">Lưu</button>
                                </div>
								<?php
				}
				?>
                              </form>
</div>
</div>


