<?php
include('./config/config.php');
$capdo= $_POST['capdo'];
$tenlop = $_POST['tenl'];


if (isset($_POST['sualop'])) {

  $sql_update = "UPDATE lophoc SET  macd='".$capdo."', tenl='" . $tenlop . "' WHERE mal ='$_GET[mal]'";
  $sql = "SELECT * FROM lophoc WHERE mal = '$_GET[mal]' LIMIT 1";
	$query = mysqli_query($mysqli, $sql);
		
	if(mysqli_query($mysqli, $sql_update)===TRUE){

		echo"<script type='text/javascript'>
		alert('Cập nhật lớp thành công!');
		document.location='index.php?action=quanlylop&query=danhsach';
	</script>";
	}else{
		echo"<script type='text/javascript'>
		alert('Cập nhật lớp không thành công!');
		document.location='index.php?action=quanlylop&query=danhsach';
	</script>";
	}
}

// }
?>


		<div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Danh mục /</span> Sửa lớp học</h4>
                <!-- <button type="button" class="btn btn-outline-primary" style="height: fit-content;" data-bs-toggle="modal" data-bs-target="#largeModal">Thêm</button> -->
              
              <!-- Basic Bootstrap Table -->
     
       <div class="card">

			<?php
				$sql_sua_lop= "SELECT * FROM lophoc WHERE mal='$_GET[mal]' LIMIT 1";
				$query_sua_lop = mysqli_query($mysqli, $sql_sua_lop);
				?>
         
                            <form action="" method="POST"  style="margin-top: -50px;" >
                              <?php
                                while ($dong = mysqli_fetch_array($query_sua_lop)) {
                                ?>
                              <div class="modal-body" style="padding: 4.5rem 1.5rem 1.5rem 1.5rem;">
                              
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameLarge" class="form-label">Tên Lớp</label>
                                    <input type="text" id="nameLarge" name="tenl" class="form-control" placeholder="" value="<?php echo $dong['tenl'] ?>"/>
                                  </div>
                                </div>
                                <div class="row g-2" style="margin-bottom: 1rem !important;">
                                  <div class="col mb-0">
                                    <label for="exampleFormControlSelect1" class="form-label">Cấp độ</label>
                                    <select class="form-select" name="capdo" id="exampleFormControlSelect1" aria-label="Default select example">
                                                        <?php
                                        $sql_cd = "SELECT * FROM capdo ORDER BY macd ASC";
                                        $query_cd = mysqli_query($mysqli, $sql_cd);
                                        while ($row_cd = mysqli_fetch_array($query_cd)) {
                                          if ($row_cd['macd'] == $dong['macd']) {
                                        ?>
                                                          <!-- <option selected>Open this select menu</option> -->
                                          <option selected value="<?php echo $row_cd['macd'] ?>"><?php echo $row_cd['tencd'] ?></option>
                                        <?php
                                        } else {
                                        ?>
                                        <option value="<?php echo $row_cd['macd'] ?>"><?php echo $row_cd['tencd'] ?></option>
                                        <?php
                                          }
                                        }
                                        ?>
                                    </select>
                                  </div>
                                  
                                </div>

                                

                             

                                

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" onclick="history.back()">
                                  Huỷ
                                </button>
                                <button type="submit" class="btn btn-primary" name="sualop">Lưu</button>
                              </div>
							  <?php
				}
				?>
                            </form>
                            </div>
                            </div>