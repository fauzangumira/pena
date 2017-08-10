<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('models1');
		$this->load->model('models2');
		$this->load->model('models3');
	}
	
	public function index()
	{
		$this->load->view('index');
	}
	
	public function indexbackdaftar()
	{
		$this->session->sess_destroy();
		$this->load->view('index');
		
	}

	public function gosignupview()
	{
		$this->session->sess_destroy();
		$this->load->view('gosignup');
	}
	
	public function select_login()
	{
		$data['username']=$this->input->post('username');
		$data['password']=$this->input->post('password');
				
		$data['listData'] = $this->models1->select_login($data['username'],$data['password'])->result();		
		$data['listData2'] = $this->models2->select_login($data['username'],$data['password'])->result();
		
		if($data['listData']){
			$data['listData'] = $this->models1->select_login($data['username'],$data['password'])->result();
			if($data['listData']){
				$newdata=array('username'=>$data['username'],'password'=>$data['password'],'logged_in'=> TRUE);
				$this->session->set_userdata($newdata);
				echo 'admin';
				redirect(site_url('welcome/backadmin'));
			}else{
				$msg['psn']='ID atau Password Salah';
				$this->load->view('index',$msg);
				
			}
		}elseif($data['listData2']){
			$data['listData'] = $this->models2->select_login($data['username'],$data['password'])->result();
			if($data['listData']){
				$newdata=array('username'=>$data['username'],'password'=>$data['password'],'logged_in'=> TRUE);
				$this->session->set_userdata($newdata);
				redirect(site_url('welcome/backmember'));
			}else{
				$msg['psn']='Username atau Password Salah';
				$this->load->view('index',$msg);
				
			}
		}else{
			$msg['psn']='Username atau Password Salah';
			$this->load->view('index',$msg);
		}
	}
	
	public function gosignup(){
		$data['username']=$this->input->post('username');
		$data['password']=$this->input->post('password');
		$data['konfirmpassword']=$this->input->post('konfirmpassword');
		$data['nama']=$this->input->post('nama');
		$data['email']=$this->input->post('email');
		$data['tgllahir']=$this->input->post('tgllahir');
		$data['jk']=$this->input->post('jk');
		
		$newdata=array('nama'=>$data['nama'],'email'=>$data['email'],'tgllahir'=>$data['tgllahir'],'jk'=>$data['jk']);
		$this->session->set_userdata($newdata);
		$data['listData'] = $this->models1->cek_user($data['username'])->result();		
		$data['listData2'] = $this->models2->cek_user($data['username'])->result();
		$data['listData3'] = $this->models2->cek_email($data['email'])->result();
		
		
 		if($data['listData'] || $data['listData2'] || $data['listData3']){
			$msg['psn']='Maaf, Username atau Email Anda Sudah Terdaftar';
			$this->load->view('gosignup',$msg,$newdata);
		
		}else{
			if($data['password']<>$data['konfirmpassword']){
				$msg['psn']='Periksa Kembali Password';
				$this->load->view('gosignup',$msg,$newdata);
			}else{
				$this->models2->signup($data['username'],$data['password'],$data['nama'],$data['email'],$data['tgllahir'],$data['jk']);
				$msg['psn']='Pendaftaran Berhasil';
				$this->load->view('index',$msg);
			}
		}

	}

	public function backadmin(){
		if($this->session->userdata('username')&&$this->session->userdata('password')){
			$username=$this->session->userdata('username');
			$password=$this->session->userdata('password');
			$data['listData'] = $this->models1->select_login($username,$password)->result();
			$data['postingan'] = $this->models3->ambilpost()->result();
			$this->load->view('homeadmin',$data);
		}else{
			redirect(site_url('welcome/index'));
		}
	}

	public function backmember(){
		if($this->session->userdata('username')&&$this->session->userdata('password')){
			$username=$this->session->userdata('username');
			$password=$this->session->userdata('password');
			$data['listData'] = $this->models2->select_login($username,$password)->result();
			$data['postingan'] = $this->models3->ambilpost()->result();
			foreach($data['listData'] as $rows){
				$id_member = $rows -> id_member;
			}
			$data['postingansaya'] = $this->models3->postingansaya($id_member)->result();
			$jumlah=count($data['postingansaya']);
			$this->load->view('homemember',$data);
		}else{
			redirect(site_url('welcome/index'));
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect(site_url('welcome/index'));
	}
	
	public function editprofilview($id_member){
		if($this->session->userdata('username')&&$this->session->userdata('password')){
			$data['listData'] = $this->models2->select_edit($id_member)->result();
			$this->load->view('editprofil',$data);
		}else{
			redirect(site_url('welcome/index'));
		}
	}
	

	public function editprofil(){
		$data['id']=$this->input->post('id');
		$data['username']=$this->input->post('username2');
		$data['password']=$this->input->post('password');
		$data['konfirmpassword']=$this->input->post('konfirmpassword');
		$data['nama']=$this->input->post('nama');
		$data['tgllahir']=$this->input->post('tgllahir');
		$data['jk']=$this->input->post('jk');
		
		$newdata=array('username'=>$data['username'],'password'=>$data['password'],'logged_in'=> TRUE);
		$this->session->set_userdata($newdata);
		
		$this->models2->editprofil($data['password'],$data['nama'],$data['tgllahir'],$data['jk'],$data['id']);
		redirect(site_url('welcome/backmember'));
		
	}	
	
	public function uploadfoto() {
			$username = $this->input->post('username2');
			$id = $this->input->post('id2');
			
			$config['upload_path']= './images/';
			$config['allowed_types']= 'jpeg|jpg|png';
			$config['max_size']='1024';
			$config['overwrite']= TRUE;
			$config['file_name'] = $username;
			//$config['max_width']='1024';
			//$config['max_height']='768';
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if(!$this->upload->do_upload()){
				$error=array('error'=>$this->upload->display_errors());
				$username=$this->session->userdata('username');
				$password=$this->session->userdata('password');
				$data['listData'] = $this->models2->select_login($username,$password)->result();
				$this->load->view('uploadgagal',$data);			
				
			}else
			{
				$data=$this->upload->data();
				$data['listData'] = $this->models2->uploadfoto($data['file_name'],$id);
				redirect(site_url('welcome/backmember/'));
				
			}
		
	}
	
	public function uploadfile() {
		if($this->session->userdata('username')&&$this->session->userdata('password')){
				$namapost = $this->input->post('nama_post');
				$id = $this->input->post('id');
				$deskripsi = $this->input->post('deskripsi');
				$genre = $this->input->post('genre');
				$date = date("F j, Y, g:i a");
				
				$config['upload_path']= './files/';
				$config['allowed_types']= 'docx|pdf|doc';
				$config['max_size']='2048';
				$config['overwrite']= FALSE;
				$config['file_name'] = $namapost;
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				
				if(!$this->upload->do_upload()){
					$error=array('error'=>$this->upload->display_errors());
					$username=$this->session->userdata('username');
					$password=$this->session->userdata('password');
					$data['listData'] = $this->models2->select_login($username,$password)->result();
					$this->load->view('uploadgagal',$data);		
				}else
				{
					$data=$this->upload->data();
					$path = $data['file_name'];
					$data['listData'] = $this->models3->postingan($id,$namapost,$deskripsi,$genre,$path,$date);
					redirect(site_url('welcome/backmember'));
					
				}
			}else{
				redirect(site_url('welcome/index'));
			}		
		
	}
	
	public function viewpost($id_post) {
		if($this->session->userdata('username')&&$this->session->userdata('password')){
			$username=$this->session->userdata('username');
			$password=$this->session->userdata('password');
			$data['listData'] = $this->models2->select_login($username,$password)->result();
			$data['viewpost'] = $this->models3->viewpost($id_post)->result();
			$data['viewkoment'] = $this->models3->viewkoment($id_post)->result();
			$this->load->view('viewpost',$data);
		}else{
			redirect(site_url('welcome/index'));
		}		
	}
	
	public function viewpostadmin($id_post) {
		if($this->session->userdata('username')&&$this->session->userdata('password')){
			$username=$this->session->userdata('username');
			$password=$this->session->userdata('password');
			$data['listData'] = $this->models1->select_login($username,$password)->result();
			$data['viewpost'] = $this->models3->viewpost($id_post)->result();
			$data['viewkoment'] = $this->models3->viewkoment($id_post)->result();
			$this->load->view('viewpostadmin',$data);
		}else{
			redirect(site_url('welcome/index'));
		}		
	}

	
	public function deletepost($id_post,$files) {
		if($this->session->userdata('username')&&$this->session->userdata('password')){
			unlink("files/$files");
			$this->models3->deletekoment($id_post);
			$this->models3->deletepost($id_post);
			redirect(site_url('welcome/backmember'));
		}else{
			redirect(site_url('welcome/index'));
		}		
	}
	
	public function deletepostadmin($id_post,$files) {
		if($this->session->userdata('username')&&$this->session->userdata('password')){
			unlink("files/$files");
			$this->models3->deletekoment($id_post);
			$this->models3->deletepost($id_post);
			redirect(site_url('welcome/backadmin'));
		}else{
			redirect(site_url('welcome/index'));
		}		
	}
	
	public function deletekomentadmin($id_koment,$id_post) {
		if($this->session->userdata('username')&&$this->session->userdata('password')){
			$this->models3->deletekomentadmin($id_koment);
			redirect(site_url('welcome/viewpostadmin/'.$id_post));
		}else{
			redirect(site_url('welcome/index'));
		}		
	}
	
	public function komentpost() {
		if($this->session->userdata('username')&&$this->session->userdata('password')){
			$id_post = $this->input->post('id_post');
			$id_komentator = $this->input->post('id');
			$komentar = $this->input->post('komentar');
			$date = date("F j, Y, g:i a");
			
			$this->models3->komentpost($id_post,$id_komentator,$komentar,$date);
			redirect(site_url('welcome/viewpost/'.$id_post));
			//redirect(site_url('welcome/backmember'));
		}else{
			redirect(site_url('welcome/index'));
		}		
	}
	
	public function komentpostadmin() {
		if($this->session->userdata('username')&&$this->session->userdata('password')){
			$id_post = $this->input->post('id_post');
			$id_komentator = $this->input->post('id');
			$komentar = $this->input->post('komentar');
			$date = date("F j, Y, g:i a");
			
			$this->models3->komentpost($id_post,$id_komentator,$komentar,$date);
			redirect(site_url('welcome/viewpostadmin/'.$id_post));
			//redirect(site_url('welcome/backmember'));
		}else{
			redirect(site_url('welcome/index'));
		}		
	}
	
	public function viewfiksi(){
		if($this->session->userdata('username')&&$this->session->userdata('password')){
			$username=$this->session->userdata('username');
			$password=$this->session->userdata('password');
			$data['listData'] = $this->models2->select_login($username,$password)->result();
			$data['postingan'] = $this->models3->viewfiksi()->result();
			foreach($data['listData'] as $rows){
				$id_member = $rows -> id_member;
			}
			$data['postingansaya'] = $this->models3->postingansaya($id_member)->result();
			$jumlah=count($data['postingansaya']);
			$this->load->view('viewfiksi',$data);
		}else{
			redirect(site_url('welcome/index'));
		}
	}
	
	public function viewfiksiadmin(){
		if($this->session->userdata('username')&&$this->session->userdata('password')){
			$username=$this->session->userdata('username');
			$password=$this->session->userdata('password');
			$data['listData'] = $this->models1->select_login($username,$password)->result();
			$data['postingan'] = $this->models3->viewfiksi()->result();
			$this->load->view('viewfiksiadmin',$data);
		}else{
			redirect(site_url('welcome/index'));
		}
	}
	
	public function viewnonfiksi(){
		if($this->session->userdata('username')&&$this->session->userdata('password')){
			$username=$this->session->userdata('username');
			$password=$this->session->userdata('password');
			$data['listData'] = $this->models2->select_login($username,$password)->result();
			$data['postingan'] = $this->models3->viewnonfiksi()->result();
			foreach($data['listData'] as $rows){
				$id_member = $rows -> id_member;
			}
			$data['postingansaya'] = $this->models3->postingansaya($id_member)->result();
			$jumlah=count($data['postingansaya']);
			$this->load->view('viewnonfiksi',$data);
		}else{
			redirect(site_url('welcome/index'));
		}
	}
	
	public function viewnonfiksiadmin(){
		if($this->session->userdata('username')&&$this->session->userdata('password')){
			$username=$this->session->userdata('username');
			$password=$this->session->userdata('password');
			$data['listData'] = $this->models1->select_login($username,$password)->result();
			$data['postingan'] = $this->models3->viewnonfiksi()->result();
			$this->load->view('viewnonfiksiadmin',$data);
		}else{
			redirect(site_url('welcome/index'));
		}
	}
	
	public function viewjudul(){
		if($this->session->userdata('username')&&$this->session->userdata('password')){
			$username=$this->session->userdata('username');
			$password=$this->session->userdata('password');
			$judul = $this->input->post('judul');
			$data['listData'] = $this->models2->select_login($username,$password)->result();
			$data['postingan'] = $this->models3->viewjudul($judul)->result();
			foreach($data['listData'] as $rows){
				$id_member = $rows -> id_member;
			}
			$data['postingansaya'] = $this->models3->postingansaya($id_member)->result();
			$jumlah=count($data['postingansaya']);
			$this->load->view('viewjudul',$data);
		}else{
			redirect(site_url('welcome/index'));
		}
	}
	
	public function viewjuduladmin(){
		if($this->session->userdata('username')&&$this->session->userdata('password')){
			$username=$this->session->userdata('username');
			$password=$this->session->userdata('password');
			$judul = $this->input->post('judul');
			$data['listData'] = $this->models1->select_login($username,$password)->result();
			$data['postingan'] = $this->models3->viewjudul($judul)->result();
			$this->load->view('viewjuduladmin',$data);
		}else{
			redirect(site_url('welcome/index'));
		}
	}
	
	public function hapusfoto($id){
		if($this->session->userdata('username')&&$this->session->userdata('password')){
			$data['listData'] = $this->models2->ambilfoto($id)->result();
			foreach($data['listData'] as $rows){
				$foto = $rows->foto;
			}
			unlink("images/$foto");
			$this->models2->hapusfoto($id);
			redirect(site_url('welcome/backmember'));
			
		}else{
			redirect(site_url('welcome/index'));
		}
	}


}