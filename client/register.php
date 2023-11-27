<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/favicon.ico" />
    <title>Toan.tt | Quên mật khẩu</title>
	<link href="css/main.css" rel="stylesheet" />

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

include('../admin/config/config.php');
$err = [];

if (isset($_POST['dangky'])) {
	$ten = $_POST['name'];
  $namsinh = $_POST['namsinh'];
	$sdt = $_POST['sdt'];
  $diachi = $_POST['diachi'];
  $gioitinh=$_POST['gioitinh'];
  $email= $_POST['email'];
  $username = $_POST['username'];
    $matkhau = $_POST['password'];
	$matkhau2 = $_POST['repassword'];
	$anh = $_FILES['anh']['name'];
    $anh_tmp =$_FILES['anh']['tmp_name'];
	
    if (!$ten || !$namsinh || !$sdt || !$diachi ||!$email || !$username || !$matkhau )
      {
        $err['null'] ='Vui lòng nhập đầy đủ thông tin';
      }

      $sqlkt="SELECT username FROM hocvien WHERE username='$username'";
      $rowkt=mysqli_query($mysqli, $sqlkt);
      $ktuser=mysqli_num_rows($rowkt);
    if ($ktuser > 0){
      $err['username'] = 'Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác.';
        // echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        
    }
	if(strlen( $matkhau <8)){

	}
    // if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)){
    //   $err['email']='Email không hợp lệ. Vui lòng nhập email khác';
    // }
    

    $sqlmail= "SELECT email FROM hocvien WHERE email='$email'";
    $rowmail=mysqli_query($mysqli, $sqlmail);
    $ktmail=mysqli_num_rows($rowmail);
    if ($ktmail > 0){
      $err['email'] = 'Email này đã có người dùng. Vui lòng chọn email khác.';
        // echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        
    }
	
    if ($matkhau != $matkhau2) {
      $err['repassword'] = 'Mật khẩu không trùng khớp';
    }

    if (empty($err)) {
    $passwordauth = md5($matkhau, false);
		$sql_dangky =  "INSERT INTO hocvien(tenhv,namsinhhv,gioitinh,sdthv,anh,diachihv,email,username, password) VALUE ('" . $ten . "','" . $namsinh . "','" . $gioitinh . "','" . $sdt . "','" . $anh . "','" . $diachi . "','" . $email . "','" . $username . "','" . $passwordauth . "')";
		mysqli_query($mysqli, $sql_dangky);
		move_uploaded_file($anh_tmp, "../admin/uploads/" .$anh);
    
		if ($sql_dangky) {
			echo "<script type='text/javascript'>
					alert('Đăng ký thành công');
					document.location='login.php';</script>";
			$_SESSION['dangky'] = $ten;
			$_SESSION['id_kh'] = mysqli_insert_id($mysqli);
			// header('Location: index.php?quanly=giohang');

			// header('Location:login.php');
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
:root {
    --main: #14a2b8;
    --green: #01394f;
    --orange: #fd7e14;
    --gray: #6c757d;
    --black: #000;
    --white: #fff;
	--font-family-sans-serif: "Nunito", sans-serif;
}
.btn-his{
    border: none;
    background-color: white;
  }
.btn-his:focus{
    outline: none;
  }

.btn-hdangnhap{
	padding: 0;
	border: none;
	background-color: white;
}
.btn-hdangnhap:focus{
	padding: 0;
    border: none;
    background-color: white;
	outline: none;
}

.uname {
    height: 38px;
    padding:  0 9px;
    width: 100%;
    font-size: 0.85rem;
    /* padding: 12px 20px; */
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
	border-radius: 3px;
    box-sizing: border-box;
}

.uname:focus{
	border-color: var(--main);
	outline: 0;
}
.select:focus{
	border-color: var(--main);
	outline: 0;
}

.modal-item-login {
    position: relative;
}
.modal-item-login i {
    font-size: 0.9rem;
    position: absolute;
    right: 10px;
    top: 19px;
    color: #666;
}
.modal-item-login i.active::before{
    color: #666;
    content: "\f06e";
      
}
/* Set a style for all buttons */
.login-submit {
    background-color: var(--main);
    color: white;
    padding: 11px 20px;
    margin: 8px 0;
    border: none;
    font-size: 1rem;
    font-weight: bold;
    border-radius: 3px;
    cursor: pointer;
    width: 100%;
}
.login-submit:focus {
    outline: none;
}
.login-submit:hover {
    opacity: 0.8;
}
.modal-login-register {
    margin: 5px 0;
    font-size: 14px;
}
.modal-login-link-register {
    text-decoration: none;
    background-color: var(--white);
    border: none;
    padding: 0;
    color: var(--green);
}
.modal-login-link-register:focus {
    outline: none;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 0 0;
    position: relative;
}

.modal-container {
    padding: 15px 25px;
}


/* Modal Content/Box */
.modal-content-login {
    box-shadow: 0px 3px 18px rgba(25, 25, 26, 0.2);
    border-radius: 5px;
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #fbfbfb;
    width: 34%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */




@-webkit-keyframes animatezoom {
    from {
        -webkit-transform: scale(0);
    }
    to {
        -webkit-transform: scale(1);
    }
}

@keyframes animatezoom {
    from {
        transform: scale(0);
    }
    to {
        transform: scale(1);
    }
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.forgot {
        display: block;
        float: none;
    }
    .cancelbtn {
        width: 100%;
    }
}

form svg {
	width: 18px;
	height: 18px;
	cursor: pointer;
	float: right;
	margin-top: -37px;
	margin-right: 10px;
	z-index: 4;
	position: relative;
	}
	form #showEye{
	display: block;
	fill: #666;
	transition: all 0;
		
	}
	form #hideEye {
	display: none;
	fill: #666;
	transition: all 0;
	}
    form #showEy{
	display: block;
	fill: #666;
	transition: all 0;
		
	}
	form #hideEy{
	display: none;
	fill: #666;
	transition: all 0;
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

	<form class="modal-content-login " enctype="multipart/form-data" action="" method="post">
		<div class="imgcontainer">
			<p style="
                                color: var(--main);
                                font-weight: bold;
                                margin-bottom: 0;
                                font-size: 15px;
                            ">
				ĐĂNG KÝ TÀI KHOẢN
			</p>
			<!-- <span onclick="document.getElementById('id02').style.display='none'" class="close-modal-login" title="Close Modal">&times;</span> -->
		</div>

		<div class="modal-container">
            <?php if (isset($err['null'])){ ?>

            <div style="border-radius: 3px;
                        margin-bottom: 5px;
                        height: 60px;
                        background-color: #c9040421;
                        display: block;
                    ">                    
                <p style="color: #900000;padding: 19px 16px 0px;font-size: 14px;margin: 0px;"><?php echo $err['null']?></p>
            </div>
            <?php }?>

			
			<div class="modal-item-login">
				<input class="uname" type="text" placeholder="Họ tên trẻ" name="name" value="<?php echo $ten ?>" />
				<!-- <i class="icon-login-modal fas fa-user"></i> -->
			</div>
			<div class="modal-item-login">
				<!-- <label for="formFile" class="form-label">Hình ảnh</label> -->
                <input style="padding-top: 7px;color: #777;" class="uname" name="anh" value="<?php echo $anh ?>" type="file"  >
			</div>
      		<div class="modal-item-login" style="align-items: center;
												justify-content: space-between;
												display: flex;
											">
				<select class="select" name="gioitinh" style="padding: 5px;
										border: 1px solid #ccc
										;color: #777;
										height: 38px;
										width: 48.5%;
										border-radius: 3px;">
                            <option value="">Giới tính</option>
                    <option value="Nam">Nam</option>
                    <option value="Nu">Nữ</option>
                </select>
				<input style="width: 48.5%;color: #777;padding: 0 6px 0 9px;" class="uname" type="date" placeholder="Nhập năm sinh" name="namsinh" value="<?php echo $namsinh ?>" />
				<!-- <i class="icon-login-modal fas fa-envelope"></i> -->
				
			</div>
			<div class="modal-item-login">
				<input class="uname" type="text" placeholder="Địa chỉ" name="diachi"value="<?php echo $diachi ?>" />
				<!-- <i class="icon-login-modal fas fa-map-marker-alt"></i> -->
			</div>
      		<div class="modal-item-login" style="align-items: center;
												justify-content: space-between;
												display: flex;
											">
				<input style="width: 48.5%" class="uname" type="text" placeholder="Nhập email" name="email" value="<?php echo $email ?>"/>
				<!-- <i class="icon-login-modal fas fa-envelope"></i> -->
				<input style="width: 48.5%" class="uname" type="text" placeholder="Nhập số điện thoại" name="sdt" value="<?php echo $sdt ?>"/>
				<!-- <i class="icon-login-modal fas fa-phone"></i> -->
			</div>
      		<span style="color:red; font-size: 13px;"><?php echo (isset($err['email'])) ? $err['email'] : '' ?></span>
      		
			<div class="modal-item-login">
				<input class="uname" type="text" placeholder="Nhập username" name="username" value="<?php echo $username ?>" />
				<!-- <i class="icon-login-modal fas fa-user-circle"></i> -->
			</div>
      		<span style="color:red; font-size: 13px;"><?php echo (isset($err['username'])) ? $err['username'] : '' ?></span>
      

			<div class="modal-item-login">
				<input class="uname" id="password" type="password" placeholder="Nhập mật khẩu" name="password" value="<?php echo $matkhau ?>" />
				<!-- <i class=" fas fa-eye-slash"></i> -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999" xml:space="preserve" onclick="passwordHide()" id="hideEye">
							<g>
							<path d="M508.745,246.041c-4.574-6.257-113.557-153.206-252.748-153.206S7.818,239.784,3.249,246.035    c-4.332,5.936-4.332,13.987,0,19.923c4.569,6.257,113.557,153.206,252.748,153.206s248.174-146.95,252.748-153.201    C513.083,260.028,513.083,251.971,508.745,246.041z M255.997,385.406c-102.529,0-191.33-97.533-217.617-129.418    c26.253-31.913,114.868-129.395,217.617-129.395c102.524,0,191.319,97.516,217.617,129.418    C447.361,287.923,358.746,385.406,255.997,385.406z"/>
							</g>
							<g>
							<path d="M255.997,154.725c-55.842,0-101.275,45.433-101.275,101.275s45.433,101.275,101.275,101.275    s101.275-45.433,101.275-101.275S311.839,154.725,255.997,154.725z M255.997,323.516c-37.23,0-67.516-30.287-67.516-67.516    s30.287-67.516,67.516-67.516s67.516,30.287,67.516,67.516S293.227,323.516,255.997,323.516z"/>
							</g>
						</svg>
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 59.049 59.049" xml:space="preserve"  onclick="passwordShow()" id="showEye">
							<g>
							<path d="M11.285,41.39c0.184,0.146,0.404,0.218,0.623,0.218c0.294,0,0.585-0.129,0.783-0.377c0.344-0.432,0.273-1.061-0.159-1.405   c-0.801-0.638-1.577-1.331-2.305-2.06l-7.398-7.398l7.629-7.629c7.334-7.333,18.003-9.836,27.839-6.534   c0.523,0.173,1.09-0.107,1.267-0.63c0.175-0.523-0.106-1.091-0.63-1.267c-10.562-3.545-22.016-0.857-29.89,7.016L0,30.368   l8.812,8.812C9.593,39.962,10.426,40.705,11.285,41.39z"/>
							<path d="M50.237,21.325c-1.348-1.348-2.826-2.564-4.394-3.616c-0.458-0.307-1.081-0.185-1.388,0.273   c-0.308,0.458-0.185,1.08,0.273,1.388c1.46,0.979,2.838,2.113,4.094,3.369l7.398,7.398l-7.629,7.629   c-7.385,7.385-18.513,9.882-28.352,6.356c-0.52-0.187-1.093,0.084-1.279,0.604c-0.186,0.52,0.084,1.092,0.604,1.279   c3.182,1.14,6.49,1.693,9.776,1.693c7.621,0,15.124-2.977,20.665-8.518l9.043-9.043L50.237,21.325z"/>
							<path d="M30.539,41.774c-2.153,0-4.251-0.598-6.07-1.73c-0.467-0.29-1.084-0.148-1.377,0.321c-0.292,0.469-0.148,1.085,0.321,1.377   c2.135,1.33,4.6,2.032,7.126,2.032c7.444,0,13.5-6.056,13.5-13.5c0-2.685-0.787-5.279-2.275-7.502   c-0.308-0.459-0.93-0.582-1.387-0.275c-0.459,0.308-0.582,0.929-0.275,1.387c1.267,1.893,1.937,4.102,1.937,6.39   C42.039,36.616,36.88,41.774,30.539,41.774z"/>
							<path d="M30.539,18.774c2.065,0,4.089,0.553,5.855,1.6c0.474,0.281,1.088,0.125,1.37-0.351c0.281-0.475,0.125-1.088-0.351-1.37   c-2.074-1.229-4.451-1.879-6.875-1.879c-7.444,0-13.5,6.056-13.5,13.5c0,2.084,0.462,4.083,1.374,5.941   c0.174,0.354,0.529,0.56,0.899,0.56c0.147,0,0.298-0.033,0.439-0.102c0.496-0.244,0.701-0.843,0.458-1.338   c-0.776-1.582-1.17-3.284-1.17-5.06C19.039,23.933,24.198,18.774,30.539,18.774z"/>
							<path d="M54.621,5.567c-0.391-0.391-1.023-0.391-1.414,0l-46.5,46.5c-0.391,0.391-0.391,1.023,0,1.414   c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293l46.5-46.5C55.012,6.591,55.012,5.958,54.621,5.567z"/>
							</g>
						</svg>
               
			</div>
			<div class="modal-item-login">
				<input class="uname" id="pass" type="password" placeholder="Xác nhận mật khẩu" name="repassword"value="<?php echo $matkhau2 ?>"/>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999" xml:space="preserve" onclick="passHide()" id="hideEy">
							<g>
							<path d="M508.745,246.041c-4.574-6.257-113.557-153.206-252.748-153.206S7.818,239.784,3.249,246.035    c-4.332,5.936-4.332,13.987,0,19.923c4.569,6.257,113.557,153.206,252.748,153.206s248.174-146.95,252.748-153.201    C513.083,260.028,513.083,251.971,508.745,246.041z M255.997,385.406c-102.529,0-191.33-97.533-217.617-129.418    c26.253-31.913,114.868-129.395,217.617-129.395c102.524,0,191.319,97.516,217.617,129.418    C447.361,287.923,358.746,385.406,255.997,385.406z"/>
							</g>
							<g>
							<path d="M255.997,154.725c-55.842,0-101.275,45.433-101.275,101.275s45.433,101.275,101.275,101.275    s101.275-45.433,101.275-101.275S311.839,154.725,255.997,154.725z M255.997,323.516c-37.23,0-67.516-30.287-67.516-67.516    s30.287-67.516,67.516-67.516s67.516,30.287,67.516,67.516S293.227,323.516,255.997,323.516z"/>
							</g>
						</svg>
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 59.049 59.049" xml:space="preserve"  onclick="passShow()" id="showEy">
							<g>
							<path d="M11.285,41.39c0.184,0.146,0.404,0.218,0.623,0.218c0.294,0,0.585-0.129,0.783-0.377c0.344-0.432,0.273-1.061-0.159-1.405   c-0.801-0.638-1.577-1.331-2.305-2.06l-7.398-7.398l7.629-7.629c7.334-7.333,18.003-9.836,27.839-6.534   c0.523,0.173,1.09-0.107,1.267-0.63c0.175-0.523-0.106-1.091-0.63-1.267c-10.562-3.545-22.016-0.857-29.89,7.016L0,30.368   l8.812,8.812C9.593,39.962,10.426,40.705,11.285,41.39z"/>
							<path d="M50.237,21.325c-1.348-1.348-2.826-2.564-4.394-3.616c-0.458-0.307-1.081-0.185-1.388,0.273   c-0.308,0.458-0.185,1.08,0.273,1.388c1.46,0.979,2.838,2.113,4.094,3.369l7.398,7.398l-7.629,7.629   c-7.385,7.385-18.513,9.882-28.352,6.356c-0.52-0.187-1.093,0.084-1.279,0.604c-0.186,0.52,0.084,1.092,0.604,1.279   c3.182,1.14,6.49,1.693,9.776,1.693c7.621,0,15.124-2.977,20.665-8.518l9.043-9.043L50.237,21.325z"/>
							<path d="M30.539,41.774c-2.153,0-4.251-0.598-6.07-1.73c-0.467-0.29-1.084-0.148-1.377,0.321c-0.292,0.469-0.148,1.085,0.321,1.377   c2.135,1.33,4.6,2.032,7.126,2.032c7.444,0,13.5-6.056,13.5-13.5c0-2.685-0.787-5.279-2.275-7.502   c-0.308-0.459-0.93-0.582-1.387-0.275c-0.459,0.308-0.582,0.929-0.275,1.387c1.267,1.893,1.937,4.102,1.937,6.39   C42.039,36.616,36.88,41.774,30.539,41.774z"/>
							<path d="M30.539,18.774c2.065,0,4.089,0.553,5.855,1.6c0.474,0.281,1.088,0.125,1.37-0.351c0.281-0.475,0.125-1.088-0.351-1.37   c-2.074-1.229-4.451-1.879-6.875-1.879c-7.444,0-13.5,6.056-13.5,13.5c0,2.084,0.462,4.083,1.374,5.941   c0.174,0.354,0.529,0.56,0.899,0.56c0.147,0,0.298-0.033,0.439-0.102c0.496-0.244,0.701-0.843,0.458-1.338   c-0.776-1.582-1.17-3.284-1.17-5.06C19.039,23.933,24.198,18.774,30.539,18.774z"/>
							<path d="M54.621,5.567c-0.391-0.391-1.023-0.391-1.414,0l-46.5,46.5c-0.391,0.391-0.391,1.023,0,1.414   c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293l46.5-46.5C55.012,6.591,55.012,5.958,54.621,5.567z"/>
							</g>
						</svg>
			</div>
      		<span style="color:red; font-size: 13px;"><?php echo (isset($err['repassword'])) ? $err['repassword'] : '' ?></span>

			<button class="login-submit" type="submit" name="dangky">Đăng ký</button>
			<p class="modal-login-register">
				Bạn đã có tài khoản?
				<a class="modal-login-link-register" href="login.php">
					ĐĂNG NHẬP
				</a>
			</p>
		</div>

		<!-- <div class="modal-container" style="background-color: #f1f1f1">
                        <button
                            type="button"
                            onclick="document.getElementById('id01').style.display='none'"
                            class="cancelbtn"
                        >
                            Cancel
                        </button>
                        <span class="forgot">Forgot <a href="#">password?</a></span>
                    </div> -->
	</form>

	</div>
    <!-- <script>
        const pswrdField= document.querySelector(".content input[type='password']"),
        toggleBtn = document.querySelector (".content .modal-item-login i");
        toggleBtn.onclick=() =>{
            if(pswrdField.type == "password"){
                pswrdField.type ="text";
                toggleBtn.classList.add("active");
            }else{
                pswrdField.type ="password";
                toggleBtn.classList.remove("active");
            }
        }
    </script> -->
    <script type="text/javascript">
		let password = document.getElementById('password');
		let showEye = document.getElementById('showEye');
		let hideEye = document.getElementById('hideEye');

		function black(){
		showEye.style.fill = "#000000";
		hideEye.style.fill = "#000000";
		}
		function white(){
		showEye.style.fill = "#fff";
		hideEye.style.fill = "#fff";
		}

		function passwordShow(){
		password.type = 'text';
		showEye.style.display= "none";
		hideEye.style.display= "inline";
		password.focus();
		}
		function passwordHide(){
		password.type = 'password';
		showEye.style.display= "inline";
		hideEye.style.display= "none";
		password.focus();
		}    
	</script> 
    <script type="text/javascript">
		let pass = document.getElementById('pass');
		let showEy = document.getElementById('showEy');
		let hideEy = document.getElementById('hideEy');

		function black(){
		showEy.style.fill = "#000000";
		hideEy.style.fill = "#000000";
		}
		function white(){
		showEy.style.fill = "#fff";
		hideEy.style.fill = "#fff";
		}

		function passShow(){
		pass.type = 'text';
		showEy.style.display= "none";
		hideEy.style.display= "inline";
		pass.focus();
		}
		function passHide(){
		pass.type = 'password';
		showEy.style.display= "inline";
		hideEy.style.display= "none";
		pass.focus();
		}    
	</script> 
</body>

</html>