

<?php
include('./config/config.php');
$dieml1 = $_POST['dieml1'];
$dieml2 = $_POST['dieml2'];
$dieml3 = $_POST['dieml3'];
$diemcuoikhoa=$_POST['diemcuoikhoa'];
$mahv = $_GET['mahv'];
$mal  = $_GET['mal'];

if (isset($_POST['themdiem'])) {
	$sql_them = "INSERT INTO bangdiem(dieml1, dieml2, dieml3, diemcuoikhoa, mahv, mal) VALUE ('".$dieml1."','".$dieml2."','".$dieml3."','".$diemcuoikhoa."','".$mahv."','".$mal."')";
	// mysqli_query($mysqli, $sql_them);
	// header('Location:index-gv.php?action=quanlylhv&query=xem&mal=$mal');
	if(mysqli_query($mysqli, $sql_them)===TRUE){

		echo"<script type='text/javascript'>
		
		document.location='index-gv.php?action=quanlylhv&query=xem&mal=$mal';
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

<?php
	$sql = "SELECT * FROM hocvien WHERE mahv='$_GET[mahv]' LIMIT 1";
	$query = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_array($query);
?>

<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Thêm điểm /</span> <?php echo $row['tenhv']?></h4>

              <div class="row">
                <div class="col-md-12">
                  
                  <div class="card mb-4">
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST">
                        <div class="row">
						<!-- <input type="text" name="mahv" value="<?php echo $_GET['ma'] ?>" hidden required /> -->

                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Điểm lần 1</label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="dieml1"
                              value=""
                            
                            />
                          </div>
						  <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Điểm lần 2</label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="dieml2"
                              value=""
                             
                            />
                          </div>
                         
                          
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Điểm lần 3</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="dieml3"
                              value=""
                            
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label">Điểm cuối khoá</label>
                            <input
                              type="text"
                              class="form-control"
                              id="organization"
                              name="diemcuoikhoa"
                              value=""
                            />
                          </div>
                        </div>
                        <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" onclick="history.back()">
                                    Huỷ
                                  </button>
                                  <button type="submit" class="btn btn-primary" name="themdiem">Lưu</button>
                                </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                  
                </div>
              </div>
            </div>
		