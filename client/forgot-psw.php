<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/favicon.ico" />
    <title>Toan.tt | Quên mật khẩu</title>
    <!-- <link rel="stylesheet" type="text/css" href="css/pass.css"> -->
	<link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
	<link
      href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap"
      rel="stylesheet"
    />
    <!-- <script type="text/javascript" async="" src="./js/login.js"></script> -->
</head>

<?php
	   session_start();
	   ob_start();
	   include('../admin/config/config.php');
	   include('../mail/index.php');
	   $mail = new Mailer();
	   if(isset($_POST['guima'])){
		$error= array();
		$email= $_POST['email'];
		if($email==''){
			$error['email']='Không được để trống';
		}
		
		if( !empty($email)){
			$sqlkt ="SELECT * FROM hocvien WHERE email='$email'";
			$rowkt =mysqli_query($mysqli, $sqlkt);
			$ktuser=mysqli_fetch_array($rowkt);
			if(empty($ktuser)){
			$error['email']='Email của bạn chưa đăng ký';
			}else{
			$code=substr(rand(0,999999),0,6);
			$title = "ToanTT - Đặt lại mật khẩu cho tài khoản của bạn";
			$content = "Chào bạn,<br>Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản ToanTT. Sử dụng mã xác thực bên dưới để đặt lại:<br><span style='color: green;font-size: 17px;'>".$code."</span><br><br>Nếu bạn không yêu cầu đặt lại mặt khẩu, vui lòng bỏ qua thư này.<br><br>-----<br><b style: 'color: #14a2b8;'>Toán trí tuệ Toan.TT</b><br><b style: 'color: #14a2b8;'>Địa chỉ: 123, Đường 30/4, Phường Hưng Lợi, Quận Ninh Kiều, Thành Phố Cần Thơ</b><br><b style: 'color: #14a2b8;'>Số điện thoại: 0945678901</b>";
			// $content .="<br><br>***********<br><h2>Toan.TT</h2><br>Địa chỉ: 123, Đường 30/4, Phường Hưng Lợi, Quận Ninh Kiều, Thành Phố Cần Thơ<br>Số điện thoại: 0945678901";
			$mail->sendMail($title, $content, $email);

			$_SESSION['mail']=$email;
			$_SESSION['code']=$code;
			header('location:verification.php');
			}
			
		}
	   }
	   ?>
<style>

	body{
		/* width: 100%; */
		height: 100%;
		margin: 0px;
		font-family: "Nunito", sans-serif;
		background-image:url("img/bgl.jpeg") ;
		background-repeat: no-repeat;
    background-size: cover;
	}
	.header{
		height: 86px;
		box-shadow: 0 6px 6px rgba(0,0,0,.06);
		background-color: #f8f9fa;
	}
	.logo{
		margin: 0 70px;
		display: flex;
	}
	.anh{
		width: 218px;
		padding-top: 12px;
	}
	.form{
		box-shadow: 0px 3px 18px rgba(25, 25, 26, 0.2);
		border-radius: 5px;
		background-color: #fefefe;
		margin: 5% auto 15% auto;
		border: 1px solid #f5f5f5;
		width: 32%;
	}
	.content{
		margin-top: 140px;
	}
	.heading{
		font-size: 1rem;
		color: #14a2b8;
		text-align: center;
		font-weight: bold;
	}
	.register--content{
		width: 395px;
		padding: 15px 25px;
		margin: 0 auto;
	}
	.email{
		position: relative;
	}
	.inputText{
		height: 40px;
		padding: 0 9px;
		width: 100%;
		font-size: 0.9375rem;
		/* padding: 12px 20px; */
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 3px;
		box-sizing: border-box;
	}
	.inputText:focus {
		border-color: #14a2b8;
		outline: 0;
	}
	.icon-login-modal {
		font-size: 0.9rem;
		position: absolute;
		right: 10px;
		top: 21px;
		color: #666;
	}
	.register-buttton {
		background-color:#14a2b8 ;
		color: white;
		padding: 11px 20px;
		margin: 20px 0;
		border: none;
		font-size: 1rem;
		font-weight: bold;
		border-radius: 3px;
		cursor: pointer;
		width: 100%;
		font-family: "Nunito", sans-serif;
	}
	.login--button{
		text-align: center;
		font-size: 14px;
		margin: 5px 0;
		color: #666666;
	}
	.btn{
		color: #01394f;
		text-decoration: none;
	}
	.chu{
		display: flex;
		align-items: center;
		padding-bottom: 14px;
	}
	.gach{
		height: 1px;
		width: 100%;
		background-color: #dbdbdb;
		flex: 1;
	}
	.chu2{
		color: #ccc;
		padding: 0 16px;
		text-transform: uppercase;
		font-size: .75rem;

	}
</style>
<body>
	<div class="header">
		<a href="index.php" class="logo">
			<img class="anh" src="img/logo.png">
			<span class="ten"></span>
		</a>
	</div>
<div class="content">
    <form class="form" action="" method="POST">
       
          
                <div class="register--content">
                    <p class="heading">QUÊN MẬT KHẨU</p>
                    
                    <div class="email">
                        <input type="text" name="email" placeholder="Nhập email đã đăng ký" class="inputText"/>
                        <!-- <span class="floating-label">Vui lòng điền email</span> -->
						<!-- <i class="icon-login-modal fas fa-envelope"></i> -->
                    </div>
					<span style="color:red; font-size: 13px;"><?php if (isset($error['email'])) echo $error['email'] ?></span>
					<!-- <div class="modal-item-login">
				<input class="uname" type="text" placeholder="Nhập email hoặc số điện thoại" name="username" required />
				<i class="icon-login-modal fas fa-envelope"></i>
			</div> -->

                    <input type="submit" class="register-buttton" value="Gửi mã xác thực" name="guima">
				<div class="chu">
					<div class="gach">
					
					</div>
					<span class="chu2"> hoặc
					
					</span>
					<div class="gach">
					
					</div>
				</div>
                    
					<div class="login--button" style="margin-bottom: 10px;">
                        <span>Bạn chưa có tài khoản?</span>
                        <a class="btn"  href="register.php">ĐĂNG KÝ</a>
                    </div>
                    <div class="login--button">
                        <span>Bạn đã có tài khoản?</span>
                        <a class="btn"  href="login.php">ĐĂNG NHẬP</a>
                    </div>
                </div>
           
        
    </form>
	</div>
</body>

</html>