<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Models1 extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function select_login($username,$password){
	
		$username=htmlspecialchars($username);
		$username=mysql_real_escape_string($username);
		
		$password=htmlspecialchars($password);
		$password=mysql_real_escape_string($password);
		
		$q="select * from admin where username = '$username' and password = '$password' ";
		return $this->db->query($q);
		
	}
	
	function cek_user($username){
		
		$username=htmlspecialchars($username);
		$username=mysql_real_escape_string($username);
		
		$q="select * from admin where username = '$username'";
		return $this->db->query($q);
		
	}

}