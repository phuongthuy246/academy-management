
<?php
include('./config/config.php');

if (isset($_POST['hoadon'])) {
	$hd=$_POST['mahd'];
	$tinhtrang = $_POST['tt'];
	

	$sql_up = "UPDATE hoadon SET tinhtrang= '" . $tinhtrang ."' WHERE mahd='$hd' ";
	mysqli_query($mysqli, $sql_up);
	if(mysqli_query($mysqli, $sql_up)===TRUE){

		echo"<script type='text/javascript'>
		document.location='index.php?action=quanlydangky&query=danhsach';
	</script>";
	}
}

?>

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
                      $sql = "SELECT * FROM hoadon, phieudangki,lophoc,hocvien,capdo WHERE hoadon.map=phieudangki.map AND phieudangki.mal=lophoc.mal AND phieudangki.mahv=hocvien.mahv AND lophoc.macd=capdo.macd AND hoadon.map = '$_GET[map]' LIMIT 1" ;
                      $query = mysqli_query($mysqli, $sql);
                      $row = mysqli_fetch_array($query);
                      $tt=$row['tinhtrang'];
                      ?>

            <div class="container-xxl flex-grow-1 container-p-y">
              
			  	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Danh mục /</span>Hoá đơn</h4>      
              
				<div class="card">
			
                                <!-- <h5 class="modal-title" id="exampleModalLabel1">Thêm tin tức</h5> -->
                           
                              <form method="POST" style="margin-top: -50px;padding: 30px">
                              <input type="text" name="mahd" value="<?php echo $row['mahd'] ?>" hidden required />
                                <div  style="padding: 4.5rem 1.5rem 1.5rem 1.5rem;">
                                <h3 style="text-align: center;">HOÁ ĐƠN <?php echo $row['mahd']?></h3>
                                <p style="text-align: center;"><i class="tintuc__ngay" ><?php echo $row['ngaylap']?></i></p>
                                  <div style="display: flex; font-size:16px;">
                                      <label style="width: 30%;">Tên phụ huynh:</label>
                                      <p><?php echo $row['tenph'] ?><p/>
                                  </div>
                                  <div style="display: flex; font-size:16px;">
                                      <label style="width: 30%;">Địa chỉ:</label>
                                      <p><?php echo $row['diachihv'] ?><p/>
                                  </div>
                                  <div style="display: flex; font-size:16px;">
                                      <label style="width: 30%;">Số tiền:</label>
                                      <p><?php echo number_format ($row['sotien'],0,',','.').' VND' ?><p/>
                                  </div>
                                  <div style="display: flex; font-size:16px;">
                                      <label style="width: 30%;">Viết bằng chữ:</label>
                                      <p><?php echo convert_number_to_words ($row['sotien']) ?><p/>
                                  </div>
								                  <div style="display: flex; font-size:16px;">
                                      <label style="width: 30%;">Hình thức thanh toán:</label>
                                      <?php
                                      if($row['httt']=='tienmat') 
                                        echo "<p>Tiền mặt</p>";
                                      else if($row['httt']=='vnpay')
                                        echo "<p>Thanh toán vnpay</p>";
                                      
                                      else echo "<p>Chuyển khoản</p>";
                                    ?>
                              
                                  </div>
                                  
                                  <div style="display: flex; font-size:16px;">
                                    <label for="exampleFormControlSelect1" style="width: 30%;">Trạng thái</label>
                                    <select name="tt" id="exampleFormControlSelect1" style="
                                            border: 1px solid #718192;
                                            border-radius: 4px;
                                            color: #718192;
                                            padding: 6px;
                                        " >
                                    <option value="0" <?php if($tt == "0"){?> selected="selected" <?php }?> >Chưa thanh toán</option>
								                    <option value="1" <?php if($tt == "1"){?> selected="selected" <?php }?> >Đã thanh toán</option>
										
                                    </select>
                                  </div>
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" onclick="history.back()">
                                    Huỷ
                                  </button>
                                  <button type="submit" class="btn btn-primary" name="hoadon">Lưu</button>
                                  <a href="inhoadon.php?inhoadon&mahd=<?php echo $row['mahd']?>&manv=<?php echo $user['manv']?>"class="btn btn-outline-dark" name="hoadon"><i class='bx bx-printer'></i>In</a>

                                </div>
				
                              </form>
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