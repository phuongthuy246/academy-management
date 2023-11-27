
<div class="main" id="main">
	<?php
	if (isset($_GET['action']) && $_GET['query']) {
		$tam = $_GET['action'];
		$query = $_GET['query'];
	} else {
		$tam = '';
		$query = '';
	}
	if ($tam == 'quanlylhv' && $query == 'danhsach') {
	   include("list_lhv.php");
	}
	elseif ($tam == 'quanlylichday' && $query == 'danhsach') {
		include("list_lichday.php");
	}
	elseif ($tam == 'quanlylhv' && $query == 'xem') {
	   include("dshv.php");
	} 
	elseif ($tam == 'quanlylhv' && $query == 'edit') {
		include("edit_diem.php");
	 }
	elseif ($tam == 'quanlylhv' && $query == 'diem') {
		include("diem.php");
	 } else {
		include("dashboard-gv.php");
	}

	?>
</div>