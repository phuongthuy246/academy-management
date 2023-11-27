<?php
		if (isset($_GET['page'])) {
			$tam = $_GET['page'];
		} else {
			$tam = '';
		}
		if ($tam == 'class') {
			include("class.php");
		} 
		elseif ($tam == 'class-detail') {
			include("class-detail.php");
		} 
		elseif ($tam == 'search') {
			include("search.php");
		} 
		elseif ($tam == 'search-blog') {
			include("search-blog.php");
		} 
		elseif ($tam == 'blog') {
			include("blog.php");
		}
		elseif ($tam == 'blog-detail') {
			include("blog-detail.php");
		}
		elseif ($tam == 'contact') {
			include("contact.php");
		}
		elseif ($tam == 'thanks') {
			include("thanks.php");
		}
		elseif ($tam == 'thanks-cash') {
			include("thanks-cash.php");
		}
		elseif ($tam == 'invoice') {
			include("invoice.php");
		}
		elseif ($tam == 'transcript') {
			include("transcript.php");
		}
        elseif ($tam == 'about-us') {
			include("about-us.php");
		}
        elseif ($tam == 'class-registration') {
			include("class-registration.php");
        } 
		elseif ($tam == 'payment') {
			include("payment.php");
        } 
		elseif ($tam == 'handbook') {
			include("handbook.php");
        } 
		elseif ($tam == 'search-handbook') {
			include("search-handbook.php");
        } 
		elseif ($tam == 'handbook-detail') {
			include("handbook-detail.php");
        } 
		elseif ($tam == 'single') {
			include("single.php");
        } 
		elseif ($tam == 'infor-user') {
			include("infor-user.php");
        } 
		elseif ($tam == 'history') {
			include("history.php");
        } 
		elseif ($tam == 'schedule') {
			include("schedule.php");
        } 
		elseif ($tam == 'changepassword') {
			include("change-password.php");
        } 
		else {
			include("dashboard.php");
		}

		?>
