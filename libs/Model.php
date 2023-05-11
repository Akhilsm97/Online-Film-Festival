<?php
class Model{
	public function __construct()
	{
		$this->db = new Database();
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
}
?>