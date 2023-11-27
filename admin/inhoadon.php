<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="../img/logo2.png">
    <title>Toan.tt</title>
</head>

<style>
body {
	font-family: "Nunito", sans-serif;
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    /* font: 12pt "Tohoma"; */
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}

/* button {
    width:100px;
    height: 24px;
} */
.header {
    overflow:hidden;
}

.title {
    text-align:center;
    position:relative;
    color:#2f2f2f;
    /* font-size: 24px; */
    top:1px;
}
.thongtincoban{
	font-size: 15px;
	margin-top:40px;
	display: flex;
	justify-content:space-between;
}
.thongtincoban li{
	margin-bottom: 12px;
}

.TableData {
    background:#ffffff;
    font: 11px;
    width:100%;
    border-collapse:collapse;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size:12px;
    border:thin solid #d3d3d3;
}
.TableData TH {
    background: rgba(0,0,255,0.1);
    text-align: center;
    font-weight: bold;
    color: #000;
    border: solid 1px #ccc;
    height: 24px;
}
.TableData TR {
    height: 24px;
    border:thin solid #d3d3d3;
}
.TableData TR TD {
    padding-right: 2px;
    padding-left: 2px;
    border:thin solid #d3d3d3;
}
.TableData TR:hover {
    background: rgba(0,0,0,0.05);
}

.TableData .tong {
    text-align: right;
    font-weight:bold;
    text-transform:uppercase;
    padding-right: 4px;
}
.TableData .cotSoLuong input {
    text-align: center;
}
@media print {
 @page {
 margin: 0;
 border: initial;
 border-radius: initial;
 width: initial;
 min-height: initial;
 box-shadow: initial;
 background: initial;
 page-break-after: always;
}
}
.company{
    text-align: center;
}
.logo img
{
    width: 100px;
}
/* #mocdo{
    display: block;
    position: absolute;
    top:110px;
    right: -150px;
} */
#page{
    height: 100%;
	width: 66%;
	/* box-shadow: 0px 1px 9px rgb(0 0 0 / 9%) !important; */
    /* padding: 55px; */
    margin-top: 60px;
    /* background-color: #fff; */
    border-radius: 5px;
            margin: 0 auto;
        }
        td{
            text-align: center;
        }
    </style>




<?php

function convert_number_to_words($number) {



$hyphen      = ' ';

$conjunction = '  ';

$separator   = ' ';

$negative    = 'âm ';

$decimal     = ' phẩy ';

$dictionary  = array(

0                   => 'Không',

1                   => 'Một',

2                   => 'Hai',

3                   => 'Ba',

4                   => 'Bốn',

5                   => 'Năm',

6                   => 'Sáu',

7                   => 'Bảy',

8                   => 'Tám',

9                   => 'Chín',

10                  => 'Mười',

11                  => 'Mười một',

12                  => 'Mười hai',

13                  => 'Mười ba',

14                  => 'Mười bốn',

15                  => 'Mười năm',

16                  => 'Mười sáu',

17                  => 'Mười bảy',

18                  => 'Mười tám',

19                  => 'Mười chín',

20                  => 'Hai mươi',

30                  => 'Ba mươi',

40                  => 'Bốn mươi',

50                  => 'Năm mươi',

60                  => 'Sáu mươi',

70                  => 'Bảy mươi',

80                  => 'Tám mươi',

90                  => 'Chín mươi',

100                 => 'trăm',

1000                => 'ngàn',

1000000             => 'triệu',

1000000000          => 'tỷ',

1000000000000       => 'nghìn tỷ',

1000000000000000    => 'ngàn triệu triệu',

1000000000000000000 => 'tỷ tỷ'

);



if (!is_numeric($number)) {

return false;

}



if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {

// overflow

trigger_error(

'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,

E_USER_WARNING

);

return false;

}



if ($number < 0) {

return $negative . convert_number_to_words(abs($number));

}



$string = $fraction = null;



if (strpos($number, '.') !== false) {

list($number, $fraction) = explode('.', $number);

}



switch (true) {

case $number < 21:

$string = $dictionary[$number];

break;

case $number < 100:

$tens   = ((int) ($number / 10)) * 10;

$units  = $number % 10;

$string = $dictionary[$tens];

if ($units) {

$string .= $hyphen . $dictionary[$units];

}

break;

case $number < 1000:

$hundreds  = $number / 100;

$remainder = $number % 100;

$string = $dictionary[$hundreds] . ' ' . $dictionary[100];

if ($remainder) {

$string .= $conjunction . convert_number_to_words($remainder);

}

break;

default:

$baseUnit = pow(1000, floor(log($number, 1000)));

$numBaseUnits = (int) ($number / $baseUnit);

$remainder = $number % $baseUnit;

$string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];

if ($remainder) {

$string .= $remainder < 100 ? $conjunction : $separator;

$string .= convert_number_to_words($remainder);

}

break;

}



if (null !== $fraction && is_numeric($fraction)) {

$string .= $decimal;

$words = array();

foreach (str_split((string) $fraction) as $number) {

$words[] = $dictionary[$number];

}

$string .= implode(' ', $words);

}



return $string;

}
?>
<?php 
session_start();
include("./config/config.php");
$sql= "SELECT * FROM hoadon, phieudangki,lophoc,capdo,hocvien WHERE hoadon.map=phieudangki.map AND phieudangki.mahv=hocvien.mahv AND phieudangki.mal=lophoc.mal AND lophoc.macd=capdo.macd AND mahd='$_GET[mahd]' LIMIT 1";
$query=mysqli_query($mysqli,$sql);
$row=mysqli_fetch_array($query);
$tt=$row['httt'];
?>

<body onload="window.print()" onclick="window.history.back();">
	<div id="page" style="margin-top: 70px;margin-bottom: 100px;">
        
        <div class="title">
			<div style="display: flex;align-items: center;
					margin-bottom: 0px;
					justify-content: space-between;">
			 <div style="text-align:start;">
				<img src="./assets/img/logo.png" style="height: 40px;"/>
				<p style="font-size: 13px;">Địa chỉ: 123 Đường 30/4, Phường Hưng Lợi, Ninh Kiều, TP. Cần Thơ</p>
				<p style="font-size: 13px;">Số diện thoại: 0978675876</p>
			</div>
			<div>
				<h3 style="margin-top: 0;font-size:23px;" >HOÁ ĐƠN ĐÓNG HỌC PHÍ </h3>
				<p style="margin-top:-10px; margin-bottom:10px;font-size: 13px;">Mã hóa đơn: <?php echo $row['mahd']?>   </p>
				<i style="text-align:center;font-size:13px;" class="tintuc__ngay"><?php echo $row['ngaylap']?></i>
			</div>

			</div>
            
        </div>
        <div class="thongtincoban" >
			<ul style="list-style:none;width:25%;padding-left:0;">
				<li>Họ tên phụ huynh:</li>
				<li>Họ tên học viên:</li>
				<li>Về khoản :</li>
				<li>Số tiền:</li>
				<li>Viết bằng chữ:</li>
				<li>Hình thức thanh toán:</li>
				<li>Trạng thái:</li>
			</ul>
			<ul style="list-style:none;width:75%;padding-left:0; color: black;" >
				<li><?php echo $row['tenph']?></li>
				<li style="display:flex;justify-content: space-between;"><?php echo $row['tenhv']?> <p style="margin-bottom:0;margin-top:0;color:#777;margin-left: 4px;">Địa chỉ:</p><?php echo $row['diachihv']?></li>
				<li>Học phí khoá học toán trí tuệ <?php echo $row['tencd'] ?>. Lớp: <?php echo $row['tenl']?></li>
				<li><?php echo number_format ($row['sotien'],0,',','.').' VNĐ' ?></li>
				<li><?php echo convert_number_to_words($row['sotien']) ?></li>
				<?php
                        if($tt=='tienmat') 
						echo "<li>Tiền mặt</li>";
					else if($tt=='vnpay')
						echo "<li>Thanh toán vnpay</li>";
					
					else echo "<li>Chuyển khoản</li>";
				?>
				<?php
                        if($row['tinhtrang']=='0') 
						echo "<li>Chưa thanh toán</li>";
					
					else echo "<li>Đã thanh toán</li>";
				?>
				
			</ul>
				
			
        </div>
        <div style="display:flex; justify-content:space-around">
		<div>
				<p></p>
				<p style="margin-bottom: 100px; margin-top: 50px;">Người nộp tiền</p>
				<!-- <p><?php echo $row['tenph']?></p> -->
				</div>
			<div>
			<p>Cần Thơ, ngày......... tháng......... năm......... </p>
			<p style="text-align: center;margin-bottom: 100px; ">Người thu tiền</p>

			<?php
			$sql= "SELECT * FROM nhanvien WHERE manv='$_GET[manv]' LIMIT 1";
			$query=mysqli_query($mysqli,$sql);
			$rownv=mysqli_fetch_array($query);
			?>
			<p style="text-align: center;"><?php echo $rownv['tennv']?></p> 
			</div>
		</div>
           
    </div>
	<script>
  const tintuc__ngay = document.querySelectorAll(".tintuc__ngay")
  tintuc__ngay.forEach((element) => {
	const date = new Date(element.innerHTML)
  const yyyy = date.getFullYear()
  let mm = date.getMonth() + 1
  let dd = date.getDate()
  if ( dd <10 ) dd = '0' + dd;
  if ( mm <10 ) mm = '0' + mm;
	element.innerHTML = `Ngày ${dd} tháng ${mm} năm ${yyyy}`
  });
  </script>
</body>

</html>