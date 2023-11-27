<?php
include("../admin/config/config.php");
require('../carbon/autoload.php');
require_once("./config-vnpay.php");
use Carbon\Carbon;
use Carbon\CarbonInterval;
$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

session_start();

	$sql_p = "SELECT * FROM phieudangki, hocvien,lophoc,capdo WHERE phieudangki.mahv=hocvien.mahv AND phieudangki.mal=lophoc.mal AND lophoc.macd=capdo.macd AND phieudangki.map ='$_SESSION[map] '";
	$query_p = mysqli_query($mysqli, $sql_p);
	$row_p = mysqli_fetch_array($query_p);
	$hv= $row_p['mahv'];
	// echo $row_p['map'];
	$map= $row_p['map'];
	$sotien=$row_p['muchocphi'];
	$mahd=rand(1000,9999);
	$httt = $_POST['httt'];

	if($httt =='tienmat'|| $httt =='chuyenkhoan'){

		$sql_pay="INSERT INTO hoadon(mahd, map, httt, tinhtrang, ngaylap, sotien) VALUE('".$mahd."','".$map."','".$httt."',0,'".$now."', '".$sotien."')";
		mysqli_query($mysqli,$sql_pay);
		
	}elseif($httt=='vnpay'){
		// Thanh toán bằng vnpay


		$vnp_TxnRef = $mahd; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
		$vnp_OrderInfo = 'Thanh toán hoá đơn đăng kí lớp học tại Toan.tt';
		$vnp_OrderType = 'billpayment';
		$vnp_Amount = $sotien * 100;
		$vnp_Locale = 'vn';
		$vnp_BankCode = 'NCB';
		$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
		//Add Params of 2.0.1 Version
		$vnp_ExpireDate = $expire;
		//Billing
		
		$inputData = array(
			"vnp_Version" => "2.1.0",
			"vnp_TmnCode" => $vnp_TmnCode,
			"vnp_Amount" => $vnp_Amount,
			"vnp_Command" => "pay",
			"vnp_CreateDate" => date('YmdHis'),
			"vnp_CurrCode" => "VND",
			"vnp_IpAddr" => $vnp_IpAddr,
			"vnp_Locale" => $vnp_Locale,
			"vnp_OrderInfo" => $vnp_OrderInfo,
			"vnp_OrderType" => $vnp_OrderType,
			"vnp_ReturnUrl" => $vnp_Returnurl,
			"vnp_TxnRef" => $vnp_TxnRef,
			"vnp_ExpireDate"=>$vnp_ExpireDate
			
		);

		if (isset($vnp_BankCode) && $vnp_BankCode != "") {
			$inputData['vnp_BankCode'] = $vnp_BankCode;
		}
		// if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
		// 	$inputData['vnp_Bill_State'] = $vnp_Bill_State;
		// }

		//var_dump($inputData);
		ksort($inputData);
		$query = "";
		$i = 0;
		$hashdata = "";
		foreach ($inputData as $key => $value) {
			if ($i == 1) {
				$hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
			} else {
				$hashdata .= urlencode($key) . "=" . urlencode($value);
				$i = 1;
			}
			$query .= urlencode($key) . "=" . urlencode($value) . '&';
		}

		$vnp_Url = $vnp_Url . "?" . $query;
		if (isset($vnp_HashSecret)) {
			$vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
			$vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
		}
		$returnData = array('code' => '00'
			, 'message' => 'success'
			, 'data' => $vnp_Url);
			// echo json_encode($returnData);
			if (isset($_POST['thanhtoan'])) {
				$_SESSION['mahd']=$mahd;
				$sql_pay="INSERT INTO hoadon(mahd, map, httt, tinhtrang, ngaylap, sotien) VALUE('".$mahd."','".$map."','".$httt."',1,'".$now."', '".$sotien."')";
				mysqli_query($mysqli,$sql_pay);
				header('Location: '.$vnp_Url);
				die();
			}else{
			echo json_encode($returnData);
			}
			// vui lòng tham khảo thêm tại code demo



		// $sql_pay="INSERT INTO hoadon(mahd, map, httt, tinhtrang, ngaylap, sotien) VALUE('".$mahd."','".$map."','".$httt."',1,'".$now."', '".$sotien."')";
		// mysqli_query($mysqli,$sql_pay);
	}
	if($sql_pay){

		// echo "<script type='text/javascript'>
		// alert('Đăng ký lớp học thành công');
		// document.location='index.php?page=history&mahv=$hv';</script>";
		echo "<script type='text/javascript'>
		document.location='index.php?page=thanks-cash';</script>";
		
	}

// }
?>


    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px"
      >
        <h3 class="display-3 font-weight-bold text-white">Thông tin thanh toán</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="index.php">Trang chủ</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Thanh toán</p>
        </div>
      </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->

<div class="container-fluid pt-5">
    <div class="container">
        <!-- <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Cập nhật thông tin</span>
          </p>
        </div> -->
		<!-- style="text-align: -webkit-center;display: revert;" -->
		<form method="POST" action="payment.php">
			<div class="row" style="justify-content: space-between;">
				<div class="co" style="width: 66%;">
					<div class="form-grid">
						<p style=" font-weight: bolder;
							padding: 20px 45px 0;
							font-size: 20px;">Thông tin đăng ký lớp học</p>
						<div class="form-group" style="
							display: flex;
							justify-content: space-between;
							padding: 10px 45px 0;
							margin-bottom:0;">
							<label class="control-label" style="padding-top:8px;">Họ tên trẻ</label>
							<div class="form-info" style="width: 80%">
								<input
									type="text"
									class="form-control"
									id="name"
									placeholder=""
									value="<?php echo $row_p['tenhv'] ?>"
									required="required"
									
									data-validation-required-message="Please enter your name"
									disabled
								/>
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="form-group" style="
									display: flex;
									justify-content: space-between;
									padding: 0px 45px;
									margin-bottom:0;
								">
							<label class="control-label" style="padding-top:8px;">Phụ huynh</label>
							<div class="form-info" style="width: 80%">
								<input
									type="text"
									class="form-control"
									id="email"
									value="<?php echo $row_p['tenph'] ?>"
									disabled
									required="required"
									
									data-validation-required-message="Please enter your email"
								/>
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="form-group" style="
									display: flex;
									justify-content: space-between;
									padding: 0px 45px;
									margin-bottom:0;
								">
							<label class="control-label" style="padding-top:8px;">Số điện thoại</label>
							<div class="form-info" style="width: 80%">
								<input
									type="text"
									class="form-control"
									id="email"
									value="<?php echo $row_p['sdthv'] ?> "
									disabled
									required="required"
									
									data-validation-required-message="Please enter your email"
								/>
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="form-group" style="
									display: flex;
									justify-content: space-between;
									padding: 0px 45px;
									margin-bottom:0;
								">
							<label class="control-label" style="padding-top:8px;">Địa chỉ</label>
							<div class="form-info" style="width: 80%">
								<input
									type="text"
									class="form-control"
									id="email"
									value="<?php echo $row_p['diachihv'] ?>"
									disabled
									required="required"
									
									data-validation-required-message="Please enter your email"
								/>
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="form-group" style="
									display: flex;
									justify-content: space-between;
									padding: 0px 45px;
									margin-bottom:0;
								">
							<label class="control-label" style="padding-top:8px;">Cấp độ</label>
							<div class="form-info" style="width: 80%">
								<input
									type="text"
									class="form-control"
									
									value="<?php echo $row_p['tencd'] ?>"
									disabled
									required="required"
									
									data-validation-required-message="Please enter your email"
								/>
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="form-group" style="
									display: flex;
									justify-content: space-between;
									padding: 0px 45px;
									margin-bottom:20px;
								">
							<label class="control-label" style="padding-top:8px;">Lớp</label>
							<div class="form-info" style="width: 80%">
							<!-- <?php
								$sql = "SELECT * FROM lophoc WHERE mal = '$_SESSION[lop]' " ;
								$query = mysqli_query($mysqli, $sql);
								$rowl = mysqli_fetch_array($query)
								?> -->
								<input
									type="text"
									class="form-control"
									
									value="<?php echo $row_p['tenl']?>"
									disabled
									required="required"
									
									data-validation-required-message="Please enter your email"
								/>
								<p class="help-block text-danger"></p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="righ-usr" style="justify-content: space-between;
										width: 32%;
										display: flow-root;">
						<p style="font-weight: bolder;
							padding: 20px 45px 0;
							font-size: 20px;">Hình thức thanh toán</p>
						<div class="form-group" style="
									display: flex;
									/* justify-content: space-between; */
									padding: 0px 45px;
									margin-bottom:0;
								">
							<div class="form-info" style="padding-top: 8px;
														text-align: center;
														padding-left: 20px;">
								<input
									type="radio"
									class="form-check-input"
									value="tienmat"
									required="required"
									name="httt"
									data-validation-required-message=""
								/>
							</div>
							<label class="control-label" style="padding-top:8px;">Tiền mặt</label>
						</div>
						<!-- <div class="form-group" style="
									display: flex;
									/* justify-content: space-between; */
									padding: 0px 45px;
									margin-bottom:0;
								">
							<div class="form-info" style="padding-top: 8px;
														text-align: center;
														padding-left: 20px;">
								<input
									type="radio"
									class="form-check-input"
									
									value="chuyenkhoan"
									required="required"
									name="httt"
									data-validation-required-message=""
								/>
							</div>
							<label class="control-label" style="padding-top:8px;">Chuyển khoản</label>
						</div> -->
						<div class="form-group" style="
									display: flex;
									/* justify-content: space-between; */
									padding: 0px 45px;
									margin-bottom:0;
								">
							<div class="form-info" style="padding-top: 8px;
														text-align: center;
														padding-left: 20px;">
								<input
									type="radio"
									class="form-check-input"
									
									value="vnpay"
									required="required"
									name="httt"
									data-validation-required-message=""
								/>
							</div>
							<img style="height: 18px;margin-top: 11px;"
							src="./img/VNPAY-QR.png"
							alt="user-avatar"
							/>
							<label class="control-label" style="padding-top: 9px;
    padding-left: 2px;">Vnpay</label>
						</div>
						<!-- <div class="form-group" style="
									display: flex;
									/* justify-content: space-between; */
									padding: 0px 45px;
									margin-bottom:0;
								">
							<div class="form-info" style="padding-top: 8px;
														text-align: center;
														padding-left: 20px;">
								<input
									type="radio"
									class="form-check-input"
									
									value="momo"
									required="required"
									name="httt"
									data-validation-required-message=""
								/>
							</div>
							<img style="height: 16px;margin-top: 11px;"
							src="./img/VNPAY-QR.png"
							alt="user-avatar"
							/>
							<label class="control-label" style="padding-top:8px;">Momo</label>
						</div> -->
						<p style="  font-weight: bolder;
									padding: 20px 0 20px 45px;
									font-size: 16px;">Tổng tiền cần thanh toán: <?php echo number_format ($row_p['muchocphi'],0,',','.').' VNĐ'   ?></p>
						<div style="    margin-top: 35px;
										display: flex;
										justify-content: flex-start;
										padding-left: 45px;">
							<button
							class="btn btn-primary py-2 px-4"
							type="submit"
							
							name="thanhtoan">
							Thanh toán
							</button>
						</div>
				</div>
				
				
			</div>
			</form>
    </div>
</div>
    <!-- Contact End -->

    <!-- Footer Start -->
    
    <!-- Footer End -->

    <!-- Back to Top -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>


