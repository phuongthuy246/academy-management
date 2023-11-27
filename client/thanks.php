<?php
include("../admin/config/config.php");

if(isset($_GET['vnp_Amount'])){
	$vnp_Amount=$_GET['vnp_Amount'];
	$vnp_BankCode =$_GET['vnp_BankCode'];
	$vnp_BankTranNo=$_GET['vnp_BankTranNo'];
	$vnp_OrderInfo=$_GET['vnp_OrderInfo'];
	$vnp_PayDate=$_GET['vnp_PayDate'];
	$vnp_TmnCode=$_GET['vnp_TmnCode'];
	$vnp_TransactionNo=$_GET['vnp_TransactionNo'];
	$vnp_CardType=$_GET['vnp_CardType'];
	$hd=$_SESSION['mahd'];
	$hv=$user['mahv'];
	
	$insert= "INSERT INTO vnpay(vnp_amount,vnp_bankcode,vnp_banktranno,vnp_cardtype,vnp_orderinfo,vnp_paydate,vnp_tmncode,vnp_transactionno,mahd) VALUE ('".$vnp_Amount."','".$vnp_BankCode."','".$vnp_BankTranNo."','".$vnp_OrderInfo."','".$vnp_PayDate."','".$vnp_TmnCode."','".$vnp_TransactionNo."','".$vnp_CardType."','".$hd."')";
	$query = mysqli_query($mysqli, $insert);
	if($query){
		echo'<div class="container-fluid bg-white mb-5" style="background-color: #fff;">
		<div
		  class="d-flex flex-column align-items-center justify-content-center"
		  style="min-height: 400px"
		>
		  <h3 class="display-3 font-weight-bold text-primary" style ="color: #17a2b8;">Đăng ký lớp học thành công</h3>
		  <div class="d-inline-flex text-primary">
			<p class="m-0">Mời bạn lại trung tâm để tiến hành thủ tục nhập học cho trẻ</p>
			<p class="m-0 px-2">|</p>
			<p class="m-0"><a class="text-primary" href="index.php">Trang chủ</a></p>
		  </div>
		</div>
  </div>
		';
	}else{
		echo'<div class="container-fluid bg-white mb-5" style="background-color: #fff;">
		<div
		  class="d-flex flex-column align-items-center justify-content-center"
		  style="min-height: 400px"
		>
		  <h3 class="display-3 font-weight-bold text-primary" style ="color: #17a2b8;">Đăng ký lớp học không thành công</h3>
		  <div class="d-inline-flex text-primary">
			<p class="m-0">Giao dịch vnpay thất bại</p>
			<p class="m-0 px-2">|</p>
			<p class="m-0"><a class="text-primary" href="index.php">Trang chủ</a></p>
		  </div>
		</div>
  </div>';
	}

}
?>
<!-- <p style="text-align: center; margin-bottom: 200px;">Xem lịch sử đăng kí</p>
<p style="text-align: center; margin-bottom: 200px;">Trở về trang chủ</p> -->