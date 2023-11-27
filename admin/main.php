
<div class="main" id="main">
	<?php
	if (isset($_GET['action']) && $_GET['query']) {
		$tam = $_GET['action'];
		$query = $_GET['query'];
	} else {
		$tam = '';
		$query = '';
	}
	if ($tam == 'quanlycapdo' && $query == 'danhsach') {
		include("list_capdo.php");
		// include("modules/quanlyloaisp/them.php");

	} elseif ($tam == 'quanlycapdo' && $query == 'edit') {
		include("edit_capdo.php");

	} elseif ($tam == 'quanlylop' && $query == 'danhsach') {
		include("list_lop.php");

	} elseif ($tam == 'quanlylop' && $query == 'edit') {
		include("edit_lop.php");

	} elseif ($tam == 'quanlyltintuc' && $query == 'danhsach') {
		include("list_ltintuc.php");

	} elseif ($tam == 'quanlyltintuc' && $query == 'edit') {
		include("edit_ltintuc.php");

	} elseif ($tam == 'quanlytintuc' && $query == 'danhsach') {
		include("list_tintuc.php");

	} elseif ($tam == 'quanlytintuc' && $query == 'edit') {
		include("edit_tintuc.php");
	} elseif ($tam == 'quanlylcamnang' && $query == 'danhsach') {
		include("list_lcamnang.php");
		
	} elseif ($tam == 'quanlylcamnang' && $query == 'edit') {
		include("edit_lcamnang.php");

	}elseif ($tam == 'quanlygiaovien' && $query == 'danhsach') {
		include("list_giaovien.php");
	}elseif ($tam == 'quanlygiaovien' && $query == 'edit') {
		include("edit_giaovien.php");

	} elseif ($tam == 'quanlycamnang' && $query == 'danhsach') {
		include("list_camnang.php");
		
	} elseif ($tam == 'quanlycamnang' && $query == 'edit') {
		include("edit_camnang.php");


	} elseif ($tam == 'quanlykynang' && $query == 'danhsach') {
		include("list_kynang.php");
	}elseif ($tam == 'quanlykynang' && $query == 'edit') {
		include("edit_kynang.php");

	} elseif ($tam == 'quanlylichhoc' && $query == 'danhsach') {
		include("list_lichhoc.php");

	} elseif ($tam == 'quanlylichhoc' && $query == 'edit') {
		include("edit_lichhoc.php");

	}elseif ($tam == 'quanlylichday' && $query == 'danhsach') {
		include("list_lichday.php");
	}
	elseif ($tam == 'quanlylhv' && $query == 'danhsach') {
	   include("list_lhv.php");
	}
	elseif ($tam == 'quanlylhv' && $query == 'xem') {
	   include("dshv.php");
	}
	 elseif ($tam == 'quanlyhocvien' && $query == 'danhsach') {
		include("list_hocvien.php");
	} elseif ($tam == 'quanlyhocvien' && $query == 'xem') {
		include("detail_hocvien.php");

	} elseif ($tam == 'quanlydangky' && $query == 'danhsach') {
		include("list_dangkylop.php");
	} elseif ($tam == 'dangkylop' && $query == 'timkiem') {
		include("search-dkl.php");

	} elseif ($tam == 'laphoadon' && $query == 'hd') {
		include("hoadon.php");

	} elseif ($tam == 'giaovien' && $query == 'timkiem') {
		include("search-gv.php");
	} elseif ($tam == 'tintuc' && $query == 'timkiem') {
		include("search-tintuc.php");
	} elseif ($tam == 'hocvien' && $query == 'timkiem') {
		include("search-hv.php");
	} elseif ($tam == 'capdo' && $query == 'timkiem') {
		include("search-cd.php");
	} elseif ($tam == 'lophoc' && $query == 'timkiem') {
		include("search-lop.php");
	}elseif ($tam == 'camnang' && $query == 'timkiem') {
			include("search-cn.php");
	} elseif ($tam == 'quanlyhttt' && $query == 'danhsach') {
		include("modules/quanlyhttt/lietke.php");

	} elseif ($tam == 'quanlyhttt' && $query == 'them') {
		include("modules/quanlyhttt/them.php");

	} elseif ($tam == 'quanlyhttt' && $query == 'sua') {
		include("modules/quanlyhttt/sua.php");

	} elseif ($tam == 'quanlyhttt' && $query == 'timkiem') {
		include("modules/quanlyhttt/timkiem.php");

	
	} 
	elseif ($tam == 'quanlytintuc' && $query == 'danhsach') {
		include("modules/quanlytt/lietke.php");
		

	} elseif ($tam == 'quanlyptvc' && $query == 'them') {
		include("modules/quanlyptvc/them.php");

	} elseif ($tam == 'quanlyptvc' && $query == 'sua') {
		include("modules/quanlyptvc/sua.php");

	}
	elseif ($tam == 'quanlydh' && $query == 'danhsach') {
		include("modules/quanlydh/lietke.php");

	

	
	}
	elseif ($tam == 'quanlydh' && $query == 'xemdonhang') {
		include("modules/quanlydh/xemdonhang.php");

	

	
	} 
	elseif ($tam == 'quanlybinhluan' && $query == 'danhsach') {
		include("modules/quanlybl/lietke.php");

	

	
	} else {
		include("dashboard.php");
	}

	?>
</div>