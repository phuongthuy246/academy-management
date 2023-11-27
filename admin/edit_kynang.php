<?php
include('./config/config.php');

$tenkn = $_POST['tenkn'];

if (isset($_POST['suakn'])) {
	$sql_update = "UPDATE kynang SET tenkn='" . $tenkn . "' WHERE makn='$_GET[makn]'";
	mysqli_query($mysqli, $sql_update);
	if(mysqli_query($mysqli, $sql_update)===TRUE){

		echo"<script type='text/javascript'>
		alert('Cập nhật kỹ năng thành công!');
		document.location='index.php?action=quanlykynang&query=danhsach';
	</script>";
	}else{
		echo"<script type='text/javascript'>
		alert('Cập nhật kỹ năng không thành công!');
		document.location='index.php?action=quanlykynang&query=danhsach';
	</script>";
	}
}

?>

			<div class="container-xxl flex-grow-1 container-p-y">
			  	<h4 class="fw-bold py-3 mb-4" ><span class="text-muted fw-light">Danh mục /</span>Sửa kĩ năng</h4>                <!-- <button type="button" class="btn btn-outline-primary" style="height: fit-content;" data-bs-toggle="modal" data-bs-target="#basicModal">Thêm</button> -->
				  <div class="card">

			<?php
				$sql_sua_kn = "SELECT * FROM kynang WHERE makn='$_GET[makn]' LIMIT 1";
				$query_sua_kn = mysqli_query($mysqli, $sql_sua_kn);
				?>
                                <!-- <h5 class="modal-title" id="exampleModalLabel1">Thêm tin tức</h5> -->
                           
                              <form action="" method="POST" style="margin-top: -50px;">
							  <?php
								while ($dong = mysqli_fetch_array($query_sua_kn)) {
								?>
                                <div class="modal-body" style="padding: 4.5rem 1.5rem 1.5rem 1.5rem;">
                                  
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameBasic" class="form-label">Tên kĩ năng</label>
                                      <input type="text" name="tenkn" class="form-control"value="<?php echo $dong['tenkn'] ?>"/>
                                    </div>
                                  </div>
								  
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" onclick="history.back()">
                                    Huỷ
                                  </button>
                                  <button type="submit" class="btn btn-primary" name="suakn">Lưu</button>
                                </div>
								<?php
				}
				?>
                              </form>
							  </div>
							  </div>