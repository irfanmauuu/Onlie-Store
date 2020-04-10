<?php
/*public function index tambah berfungsi untuk membuat data array untuk menyimpan nilai ketika user
meng-input biodata diri seperti username, email, password dan group*/
	class Model_regis extends CI_Model{
		public function tambah($username, $email, $password, $group){
			$data = array(
				'username' => $username,
				'email' => $email,
				'password' => $password,
				'group' => $group,
				);
			$this->db->insert('users',$data);
		}
	}
?>
