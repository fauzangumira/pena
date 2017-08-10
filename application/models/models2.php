<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Models2 extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function select_login($username,$password){
	
		$username=htmlspecialchars($username);
		$username=mysql_real_escape_string($username);
		
		$password=htmlspecialchars($password);
		$password=mysql_real_escape_string($password);
		
		$q="select * from member where username = '$username' and password = '$password' ";
		return $this->db->query($q);
		
	}
	function select_edit($id){
		$q="select * from member where id_member = '$id'";
		return $this->db->query($q);
		
	}
	
	function cek_user($username){
		$q="select * from member where username = '$username'";
		return $this->db->query($q);
	}
	
	function cek_email($email){
		$q="select * from member where email = '$email'";
		return $this->db->query($q);
		
	}
	
	function signup($username,$password,$nama,$email,$tgllahir,$jk){
		$q="insert into member (username,password,nama_member,email,tgllahir,jk,foto) values ('$username','$password','$nama','$email','$tgllahir','$jk','images.png')";
		return $this->db->query($q);
		
	}
	
	function editprofil($password,$nama,$tgllahir,$jk,$id){
		$q="update member set password = '$password', nama_member = '$nama', tgllahir = '$tgllahir', jk = '$jk' where id_member = '$id' ";
		return $this->db->query($q);
		
	}
	
	function uploadfoto($foto,$id){
		$q="update member set foto = '$foto' where id_member = '$id' ";
		return $this->db->query($q);	
	}
	
	function hapusfoto($id){
		$q="update member set foto = 'images.png' where id_member = '$id' ";
		return $this->db->query($q);	
	}
	
	function ambilfoto($id){
		$q="select foto from member where id_member = '$id'";
		return $this->db->query($q);
		
	}

}