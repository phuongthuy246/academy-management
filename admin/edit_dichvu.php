
<?php

include('./config/config.php');

$ten = $_POST['tendv'];
$anhdv = $_FILES['anhdv']['name'];
$anhdv_tmp =$_FILES['anhdv']['tmp_name'];
// $anhtt = time() . '_' . $anhtt;

$giadv=$_POST['giadv'];


//xulyhinhanh

if (isset($_POST['suadichvu'])) {
	if ( $anhdv != '') {
		
		move_uploaded_file($anhdv_tmp, 'uploads/' .$anhdv);
		$sql_update = "UPDATE dichvu SET   tendv='" . $ten . "', anhdv='" . $anhdv . "', giadv='" . $giadv . "'  WHERE madv ='$_GET[madv]'";
		$sql = "SELECT * FROM dichvu WHERE madv = '$_GET[madv]' LIMIT 1";

		// $sql_update = "UPDATE ThuongHieu SET  TenTH='$tenth',`AnhTH`='$anhth' WHERE MaTH='".$_GET['MaTH']."'";
		// $sql = "SELECT * FROM ThuongHieu WHERE MaTH = '".$_GET['MaTH']."' LIMIT 1";
		$query = mysqli_query($mysqli, $sql);
		
		while ($row = mysqli_fetch_array($query)) {
			
			unlink('uploads/' . $row['anhdv']);
		}
	}
	else {
		$sql_update = "UPDATE dichvu SET   tendv='" . $ten . "', anhdv='" . $anhdv . "', giadv='" . $giadv . "'  WHERE madv ='$_GET[madv]'";
		// $sql_update = "UPDATE ThuongHieu SET  TenTH='$tenth',`AnhTH`='$anhth' WHERE MaTH='".$_GET['MaTH']."'";

	}
	if(mysqli_query($mysqli, $sql_update)===TRUE){

		echo"<script type='text/javascript'>
		alert('Cập nhật dịch vụ thành công!');
		document.location='index.php?action=quanlydichvu&query=danhsach';
	</script>";
	}else{
		echo"<script type='text/javascript'>
		alert('Cập nhật dịch vụ không thành công!');
		document.location='index.php?action=quanlydichvu&query=danhsach';
	</script>";
	}
	// mysqli_query($mysqli, $sql_update);
	// header('Location:../../index.php?action=quanlythuonghieu&query=danhsach');
}	header('Location:index.php?action=quanlydichvu&query=danhsach');

?>

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Danh mục /</span> Dịch vụ</h4>
                <!-- <button type="button" class="btn btn-outline-primary" style="height: fit-content;" data-bs-toggle="modal" data-bs-target="#basicModal">Thêm</button> -->
              
              <!-- Basic Bootstrap Table -->
			  <div class="card">

              <!--/ Basic Bootstrap Table -->
          

              
              <!--/ Responsive Table -->
            </div>
            <?php
				$sql_sua_tt = "SELECT * FROM dichvu WHERE madv='$_GET[madv]' LIMIT 1";
				$query_sua_tt = mysqli_query($mysqli, $sql_sua_tt);
				?>
                              <form action="" method="POST" enctype="multipart/form-data" style="margin-top: -50px;">
							  <?php
								while ($dong = mysqli_fetch_array($query_sua_tt)) {
								?>
                                <div class="modal-body" style="padding: 4.5rem 1.5rem 1.5rem 1.5rem;">
                                  
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameBasic" class="form-label">Tên dịch vụ</label>
                                      <input type="text" name="tendv" class="form-control" placeholder="" value="<?php echo $dong['tendv'] ?>"/>
                                    </div>
                                  </div>
                                  <div class="mb-3">
                                    <label for="formFile" class="form-label">Hình ảnh</label>
                                    <input class="form-control" name="anhdv" type="file"  >
									<img src="./uploads/<?php echo $dong['anhdv'] ?>" width="150px"></td>

                                  </div>
                                  <div class="row" style="margin-bottom: 1rem !important;">
                                    <div class="col- mb3">
                                      <label for="exampleFormControlTextarea1" class="form-label">Giá tiền</label>
									  <input type="text" name="giadv" class="form-control" placeholder="" value="<?php echo $dong['giadv'] ?>"/>                                    
									</div>
                                  </div>
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Huỷ
                                  </button>
                                  <button type="submit" class="btn btn-primary" name="suadichvu">Lưu</button>
                                </div>
								<?php
				}
				?>
                              </form>
			</div>
			</div>