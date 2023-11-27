
<?php
	$sql = "SELECT * FROM bangdiem, hocvien WHERE bangdiem.mahv=hocvien.mahv AND mabd='$_GET[mabd]' LIMIT 1";
	$query = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_array($query);
?>

<?php
include('./config/config.php');
$dieml1 = $_POST['dieml1'];
$dieml2 = $_POST['dieml2'];
$dieml3 = $_POST['dieml3'];
$diemcuoikhoa=$_POST['diemcuoikhoa'];
$lop=$row['mal'];

if (isset($_POST['suadiem'])) {
	$sql_update = "UPDATE bangdiem SET dieml1='" . $dieml1 . "', dieml2='" . $dieml2 . "', dieml3='" . $dieml3 ."', diemcuoikhoa='" . $diemcuoikhoa."' WHERE mabd='$_GET[mabd]'";
	mysqli_query($mysqli, $sql_update);
	// header('Location:index-gv.php?action=quanlylhv&query=xem&mal=$mal');
	if(mysqli_query($mysqli, $sql_update)===TRUE){

		echo"<script type='text/javascript'>
		
		document.location='index-gv.php?action=quanlylhv&query=xem&mal=$lop';
	</script>";
	}else{
		echo"<script type='text/javascript'>
		
		document.location='index.php?action=quanlycamnang&query=danhsach';
	</script>";
	}
}
// else {
// 	$ma = $_GET['mabd'];
// 	$sql_xoa = "DELETE FROM bangdiem WHERE mabd='" . $ma . "'";
// 	if(mysqli_query($mysqli, $sql_xoa)===TRUE){

// 		echo"<script type='text/javascript'>
		
// 		document.location='index-gv.php?action=quanlylhv&query=xem&mal=$mal';
// 	</script>";
// }
// }
?>



<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sửa điểm /</span> <?php echo $row['tenhv']?></h4>

              <div class="row">
                <div class="col-md-12">
                  
                  <div class="card mb-4">
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST">
					  <?php
				$sql_sua_diem = "SELECT * FROM bangdiem WHERE mabd='$_GET[mabd]' LIMIT 1";
				$query_sua_diem = mysqli_query($mysqli, $sql_sua_diem);
				$dong = mysqli_fetch_array($query_sua_diem);
				?>
                        <div class="row">
						<!-- <input type="text" name="mahv" value="<?php echo $_GET['ma'] ?>" hidden required /> -->

                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Điểm lần 1</label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="dieml1"
                              value="<?php echo $dong['dieml1'] ?>"
                            
                            />
                          </div>
						  <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Điểm lần 2</label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="dieml2"
                              value="<?php echo $dong['dieml2'] ?>"
                             
                            />
                          </div>
                         
                          
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Điểm lần 3</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="dieml3"
                              value="<?php echo $dong['dieml3'] ?>"
                            
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label">Điểm cuối khoá</label>
                            <input
                              type="text"
                              class="form-control"
                              id="organization"
                              name="diemcuoikhoa"
                              value="<?php echo $dong['diemcuoikhoa'] ?>"
                            />
                          </div>
                        </div>
                        <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" onclick="history.back()">
                                    Huỷ
                                  </button>
                                  <button type="submit" class="btn btn-primary" name="suadiem">Lưu</button>
                                </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                  
                </div>
              </div>
            </div>
		