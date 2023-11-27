<div class="container-xxl flex-grow-1 container-p-y">
            
            

			<div class="row">
			 <!-- thong ke -->
			  <div class="col-lg-4 col-md-4 order-1">
				<div class="row">
				  <div class="col-lg-6 col-md-12 col-6 mb-4">
					<div class="card">
					  <div class="card-body">
						<div class="card-title d-flex align-items-start justify-content-between">
							<div class="avatar flex-shrink-0 me-3">
								<span class="avatar-initial rounded bg-label-success">
								<i class='bx bxs-user'></i>
								</span>
							
						  	</div>
						  
						</div>
						<span >Giáo viên</span>
						<?php 
						$sql= "SELECT * FROM giaovien";
						$query= mysqli_query($mysqli, $sql);
						$count = mysqli_num_rows($query);
						?>
						<h4 class="card-title text-nowrap mb-1"><?php echo $count ?></h4>
						<small class="text-success fw-semibold"><i class='bx bx-up-arrow-alt'></i> Tổng số</small>
					  </div>
					</div>
				  </div>
				  <div class="col-lg-6 col-md-12 col-6 mb-4">
					<div class="card">
					  <div class="card-body">
						<div class="card-title d-flex align-items-start justify-content-between">
						  <div class="avatar flex-shrink-0 me-3">
							<span class="avatar-initial rounded bg-label-info">
							<i class='bx bxs-user-badge'></i>
							</span>
							
						  </div>
						  
						</div>
						<span>Học viên</span>
						<?php 
						$sql= "SELECT * FROM hocvien";
						$query= mysqli_query($mysqli, $sql);
						$count = mysqli_num_rows($query);
						?>
						<h4 class="card-title text-nowrap mb-1"><?php echo $count ?></h4>
						<small class="text-success fw-semibold"><i class='bx bx-up-arrow-alt'></i> Tổng số</small>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="col-lg-8 mb-4 order-0">
				<div class="card">
				  <div class="d-flex align-items-end row">
					<div class="col-sm-7">
					  <div class="card-body">
						<h5 class="card-title text-primary">Xin chào <?php echo $user['tennv']; ?>! 🎉</h5>
						<p class="mb-4">Trung tâm dạy toán trí tuệ <span class="fw-bold">Toan.TT</span> Chúc bạn một ngày làm việc hiệu quả !</p>
			
						<a href="index.php?action=quanlydangky&query=danhsach" class="btn btn-sm btn-outline-primary">Xem danh sách đăng ký</a>
					  </div>
					</div>
					<div class="col-sm-5 text-center text-sm-left">
					  <div class="card-body pb-0 px-0 px-md-4">
						<img src="./assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
					  </div>
					</div>
					
				  </div>

				</div>
			  </div>
			  <!-- Hoi dap -->
			  <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
				<div class="card">
				<?php
              if (isset($_GET['trang'])) {
                  $page = $_GET['trang'];
                   //them
              }else{
                  $page = '1';
              }if($page =='' || $page ==1) {
                  $begin = 0;
              }else{
                  $begin = ($page*2)-2;
              }
              $sql_hoidap = "SELECT * FROM hoidap, hocvien WHERE hoidap.mahv=hocvien.mahv ORDER BY mahd DESC LIMIT $begin, 2";
              $query_hoidap = mysqli_query($mysqli, $sql_hoidap);
              ?>
				  <div class="row row-bordered g-0">
					<div class="card-body" style="padding-bottom: 0;">
					  <h5 class=" m-0 me-2 pb-3">Hỏi đáp</h5>
					  <!-- <div id="totalRevenueChart" class="px-2"></div> -->
					</div>
					<?php
                    // $sql_hoidap = "SELECT * FROM hoidap, hocvien WHERE hoidap.mahv=hocvien.mahv ORDER BY mahd ASC";
                    // $query_hoidap  = mysqli_query($mysqli, $sql_hoidap );
                    while ($row_hoidap = mysqli_fetch_array($query_hoidap )) {
                    ?>
					<div class="help" style="width: 93%;border-radius: 5px;margin:0 25px 15px;background-color: #efefef8a;">
						<div class="toast-header" style="padding: 1.25rem 1.25rem 0.6rem">
							
							<img src="./uploads/<?php echo $row_hoidap['anh'] ;?>" alt="Credit Card" class="me-2 rounded-circle" height="25px" >
							<div class="me-auto fw-semibold"><?php echo $row_hoidap['tenhv'] ;?></div>
							<small><button  href="javascript:;" class="btn btn-sm btn-outline-primary">Trả lời</button></small>
							<!-- <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button> -->
						</div>
						<div class="toast-body" style="padding-top:0;">
						<div><i class='bx bx-chevrons-right'></i><span><?php echo $row_hoidap['tieude']?></span></div><?php echo $row_hoidap['noidung'] ;?>
						</div>
					</div>
					<?php
                    };
					?>
				  </div>
					<?php
						$sql_trang = mysqli_query($mysqli,"SELECT * FROM hoidap, hocvien WHERE hoidap.mahv=hocvien.mahv");
						$row_count = mysqli_num_rows($sql_trang);
						$trang = ceil($row_count/2);
					?>
					<nav aria-label="Page navigation" style="margin-right: 24px;" >
						<?php if(!empty($trang) && $trang>1){ ?>
						<ul class="pagination pagination-sm justify-content-end">
							<?php if($page>1):$prev_page = ($page-1);?>
							<li class="page-item prev">
							<a class="page-link"style="background-color: white;" href="index.php?&trang=<?php echo $prev_page ?>"><i class="tf-icon bx bx-chevrons-left"></i></a>
							</li>
							<?php endif;?>
							<?php 
							$part = 2;
							$start =$page -$part;
							if($start <1){
							$start = 1;
							}
							$end= $page+$part;
							if($end > $trang){ 
							$end = $trang;
							}
									for($i=$start;$i<=$end;$i++){
								?>
							<li class="page-item <?php echo ($i==$page)?'active':FALSE; ?>" >
							<a class="page-link" href="index.php?&trang=<?php echo $i ?>"><?php echo $i ?></a>
							</li>
							<?php }?>
							<?php if ($page < $trang):$next_page=($page+1);?>
							<li class="page-item next">
							<a class="page-link" style="background-color: white;" href="index.php?&trang=<?php echo $next_page ?>"><i class="tf-icon bx bx-chevrons-right"></i></a>
							</li>
							<?php endif;?>
						</ul>
						<?php } ?>
					</nav>
				</div>
			  </div>
			  <!--/ Thong ke -->
			  <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
				<div class="row">
				  <div class="col-6 mb-4">
					<div class="card">
					  <div class="card-body">
						<div class="card-title d-flex align-items-start justify-content-between">
						  <div class="avatar flex-shrink-0">
						  	<img src="./assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded">

							<!-- <img src="./assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded"> -->
						  </div>
						  
						</div>
						<span class="d-block mb-1">Đã thanh toán</span>
						<?php 
						$sql= "SELECT * FROM hoadon WHERE tinhtrang='1'";
						$query= mysqli_query($mysqli, $sql);
						while ($row = mysqli_fetch_array($query, 1)) {
							$data[] = $row;
						}
						$thanhtien=0;
						if(!empty($data))
                        for($i = 0; $i < count($data) ; $i++){
						$thanhtien +=$data[$i]['sotien'];
									}
						?>
						<h4 class="card-title text-nowrap mb-2"><?php echo number_format($thanhtien, 0, ',', '.'); ?></h4>
						<small class="text-success fw-semibold">$ VND</small>
					  </div>
					</div>
				  </div>
				  <div class="col-6 mb-4">
					<div class="card">
					  <div class="card-body">
						<div class="card-title d-flex align-items-start justify-content-between">
						
						<div class="avatar flex-shrink-0 me-3">
							<span class="avatar-initial rounded bg-label-danger">
								<i class='bx bx-money'></i>
							</span>
							
						</div>
						  <!-- <div class="avatar flex-shrink-0">
						  	<img src="./assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded">
						  </div> -->
						</div>
						<span class="d-block mb-1">Chưa thanh toán</span>
						<?php 
						$sqltt= "SELECT * FROM hoadon WHERE tinhtrang='0'";
						$querytt= mysqli_query($mysqli, $sqltt);
						while ($rowtt = mysqli_fetch_array($querytt)) {
							$data1[] = $rowtt;
						}
						$tt=0;
						if(!empty($data1))
                        for($i = 0; $i < count($data1) ; $i++){
						$tt +=$data1[$i]['sotien'];
									}
						?>
						<h4 class="card-title mb-2"><?php echo number_format($tt, 0, ',', '.'); ?></h4>
						<small class="text-danger fw-semibold">$ VND</small>
					  </div>
					</div>
				  </div>
				  
				</div>
				  <!-- Hinh anh -->
				<div class="row" style="margin-top: 2px;">
				  <div class="col-12 mb-4">
					<div class="card">
					  <img src="./assets/img/avatars/admin.jpeg" alt="Credit Card" class="rounded">
					</div>
				  </div>
				</div>
			  </div>
			</div>
			
			
						
</div>
<!-- <hr class="my-5" /> -->