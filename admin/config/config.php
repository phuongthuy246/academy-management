<?php
	$mysqli = new mysqli("localhost","root","","project");

	// Check connection
	if ($mysqli->connect_errno) {
  	echo "Kết nối MySQLi lỗi" . $mysqli->connect_error;
  	exit();
}
?>