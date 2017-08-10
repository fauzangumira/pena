<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Models3 extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function gosignup($username,$password){
		$q="select * from member where username = '$username' and password = '$password' ";
		return $this->db->query($q);
		
	}
	
	function postingan($id,$namapost,$deskripsi,$genre,$path,$date){
		$q="insert into postingan(id_pemosting,judul_postingan,deskripsi,genre,files,waktu_post) values ($id,'$namapost','$deskripsi','$genre','$path','$date')";
		return $this->db->query($q);
		
	}
	
	function ambilpost(){
		$q="select * from postingan order by id_post DESC";
		return $this->db->query($q);
		
	}

	public function viewpost($id) {
		$q="select id_post, id_pemosting, judul_postingan, deskripsi, genre, files, waktu_post, nama_member from postingan, member where id_post = $id and postingan.id_pemosting = member.id_member";
		return $this->db->query($q);
	}
	
	public function postingansaya($id_member) {
		$q="select * from postingan where id_pemosting = $id_member order by id_post DESC";
		return $this->db->query($q);
	}
	
	public function deletepost($id_post) {
		$q="delete from postingan where id_post = $id_post";
		return $this->db->query($q);
	}
	
	public function deletekomentadmin($id_koment) {
		$q="delete from komentar where id = $id_koment";
		return $this->db->query($q);
	}
	
	public function deletekoment($id_post) {
		$q="delete from komentar where id_post = $id_post";
		return $this->db->query($q);
	}
	
	public function komentpost($id_post,$id_komentator,$komentar,$date) {
		$q="insert into komentar(id_post,id_komentator,komentar,waktu) values ('$id_post','$id_komentator','$komentar','$date')";
		echo $q;
		return $this->db->query($q);
	}
	
	public function viewkoment($id_post) {
		$q="select id, id_post, id_komentator, komentar, waktu, nama_member from komentar,member where id_post = $id_post and member.id_member = komentar.id_komentator order by id DESC";
		return $this->db->query($q);
	}
	
	public function viewfiksi() {
		$q="select * from postingan where genre = 'Fiksi' order by id_post DESC";
		return $this->db->query($q);
	}
	
	public function viewnonfiksi() {
		$q="select * from postingan where genre = 'Non - Fiksi' order by id_post DESC";
		return $this->db->query($q);
	}
	
	public function viewjudul($judul) {
		$q="select * from postingan where judul_postingan like '%$judul%' order by id_post DESC";
		return $this->db->query($q);
	}
	
	
}