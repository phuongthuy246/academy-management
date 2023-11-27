<?php
include('./config/config.php');

$tenloai = $_POST['tenltt'];

if (isset($_POST['sualtt'])) {
	$sql_update = "UPDATE loaitt SET tenltt='" . $tenloai . "' WHERE maltt='$_GET[maltt]'";
	mysqli_query($mysqli, $sql_update);
	if(mysqli_query($mysqli, $sql_update)===TRUE){

		echo"<script type='text/javascript'>
		alert('Cập nhật loại tin tức thành công!');
		document.location='index.php?action=quanlyltintuc&query=danhsach';
	</script>";
	}else{
		echo"<script type='text/javascript'>
		alert('Cập nhật loại tin tức không thành công!');
		document.location='index.php?action=quanlyltintuc&query=danhsach';
	</script>";
	}
}

?>

			<div class="container-xxl flex-grow-1 container-p-y">
			  	<h4 class="fw-bold py-3 mb-4" ><span class="text-muted fw-light">Danh mục /</span>Sửa loại tin tức</h4>                <!-- <button type="button" class="btn btn-outline-primary" style="height: fit-content;" data-bs-toggle="modal" data-bs-target="#basicModal">Thêm</button> -->
				<div class="card">
			<?php
				$sql_sua_ltt = "SELECT * FROM loaitt WHERE maltt='$_GET[maltt]' LIMIT 1";
				$query_sua_ltt = mysqli_query($mysqli, $sql_sua_ltt);
				?>
                                <!-- <h5 class="modal-title" id="exampleModalLabel1">Thêm tin tức</h5> -->
                           
                              <form action="" method="POST" style="margin-top: -50px;">
							  <?php
								while ($dong = mysqli_fetch_array($query_sua_ltt)) {
								?>
                                <div class="modal-body" style="padding: 4.5rem 1.5rem 1.5rem 1.5rem;">
                                  
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameBasic" class="form-label">Tên loại tin tức</label>
                                      <input type="text" name="tenltt" class="form-control"value="<?php echo $dong['tenltt'] ?>"/>
                                    </div>
                                  </div>
								  
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" onclick="history.back()">
                                    Huỷ
                                  </button>
                                  <button type="submit" class="btn btn-primary" name="sualtt">Lưu</button>
                                </div>
								<?php
				}
				?>
                              </form>
			</div>
			</div>
            