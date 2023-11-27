<?php
require '../../admin/config/config.php';
class App{
	public $db;
	public function __construct(){
		$this->db = new database();
	}
	public function getUser() {
		$sql= "SELECT * FROM hocvien";
		$result= $this->db->select($sql);
		return $result;
	}
}