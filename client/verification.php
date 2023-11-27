<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/favicon.ico" />
    <title>Toan.tt | Nhập mã xác nhận</title>
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
	// $mail = new Mailer();
	if(isset($_POST['xacnhan'])){
	 $error= array();
	 if($_POST['maxacnhan']!=$_SESSION['code']){
		$error['fail']='Mã xác thực không hợp lệ !';
	 }else{
		header('location:resetpass.php');
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
	/* .content{
		margin-top: 140px;
	} */
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
                    <p class="heading">NHẬP MÃ XÁC THỰC</p>
					<?php if (isset($error['fail'])){ ?>

					<div style="border-radius: 3px;
								margin-bottom: 5px;
								height: 60px;
								background-color: #c9040421;
								display: block;
							">                    
						<p style="color: #900000;padding: 10px 16px 0px;font-size: 14px;margin: 0px;"><?php echo $error['fail']?></p>
					</div>
					<?php } else { ?>
					<div style="border-radius: 3px;
								margin-bottom: 5px;
								height: 60px;
								background-color: #dae8ee;
								display: block;
							">                    
						<p style="color: #01394f;padding: 19px 16px 0px;font-size: 14px;margin: 0px;">Hãy nhập mã xác thực mà chúng tôi đã gửi cho bạn về email</p>
					</div>
					<?php } ?>
                    <div class="email">
                        <input type="text" name="maxacnhan" placeholder="Nhập mã xác thực" class="inputText"/>
                        <!-- <span class="floating-label">Vui lòng điền email</span> -->
						<i class="icon-login-modal fas fa-shield-alt"></i>
						<!-- <i class="icon-login-modal fas fa-envelope"></i> -->
                    </div>
					

                    <input type="submit" class="register-buttton" value="Gửi" name="xacnhan">
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
                        <a class="btn" href="server.php?dangnhaplai=on">ĐĂNG NHẬP</a>
                    </div>
					
                </div>
           
        
    </form>
	</div>
</body>

</html>