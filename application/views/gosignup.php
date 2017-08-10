<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" href="<?php echo base_url();?>images/logo.png">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">	

		<title>Sign Up</title>
		<link rel="stylesheet" href="<?php echo base_url();?>metro/css/metro-bootstrap.css">
        <script src="<?php echo base_url();?>metro/js/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url();?>metro/js/jquery/jquery.widget.min.js"></script>
        <script src="<?php echo base_url();?>metro/js/metro/metro.min.js"></script>
		<link href="<?php echo base_url();?>metro/css/metro-bootstrap.css" rel="stylesheet">
		<link href="<?php echo base_url();?>metro/css/metro-bootstrap-responsive.css" rel="stylesheet">
		<link href="<?php echo base_url();?>metro/css/iconFont.css" rel="stylesheet">
		<link href="<?php echo base_url();?>metro/css/docs.css" rel="stylesheet">
		<link href="<?php echo base_url();?>metro/js/prettify/prettify.css" rel="stylesheet">

		<!-- Load JavaScript Libraries -->
		<script src="<?php echo base_url();?>metro/js/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url();?>metro/js/jquery/jquery.widget.min.js"></script>
		<script src="<?php echo base_url();?>metro/js/jquery/jquery.mousewheel.js"></script>
		<script src="<?php echo base_url();?>metro/js/prettify/prettify.js"></script>
		<script src="<?php echo base_url();?>metro/js/holder/holder.js"></script>

		<!-- Metro UI CSS JavaScript plugins -->
		<script src="<?php echo base_url();?>metro/js/load-metro.js"></script>
		
		<!-- Local JavaScript -->
		<script src="<?php echo base_url();?>metro/js/docs.js"></script>
		<script src="<?php echo base_url();?>metro/js/github.info.js"></script>
	</head>
	
	<body class="metro" bgcolor="lavender">
	
	<?php
		$nama=$this->session->userdata('nama');
		$email=$this->session->userdata('email');
		$tgllahir=$this->session->userdata('tgllahir');
		$jk=$this->session->userdata('jk');
	?>
		
		<div class="container"></br></br>
		<div class="example shadow">
			<h2 id="__table__">DAFTAR</h2>
				<form method="post" action="<?php echo (base_url('index.php/welcome/gosignup'));?>">
				<table class="table striped">
					<tr>
						<td>Username</td> <td>:</td> <td><input type="text" name="username" autofocus required></td>
					</tr>
					<tr>
						<td>Password</td> <td>:</td> <td><input type="password" name="password" required></td>
					</tr>
					<tr>
						<td>Konfirmasi Password</td> <td>:</td> <td><input type="password" name="konfirmpassword" required></td>
					</tr>
					<tr>
						<td>Nama</td> <td>:</td> <td><input type="text" name="nama" value="<?php echo $nama; ?>" required></td>
					</tr>
					<tr>
						<td>E-mail</td> <td>:</td> <td><input type="email" name="email" value="<?php echo $email; ?>" required></td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td> <td>:</td> <td><input type="date" name="tgllahir" value="<?php echo $tgllahir; ?>" required></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td> <td>:</td> <td><input type="radio" name="jk" value="Laki - Laki" required>Laki - Laki<br/><input type="radio" name="jk" value="Perempuan" required>Perempuan</td></td> 
					</tr>
				</table>
				<p>Dengan mengklik daftar, anda menyetujui <a href="<?php echo base_url();?>files/Ketentuan.pdf">ketentuan</a> kami dan bahwa anda telah menyetujui <a href="<?php echo base_url();?>files/Ketentuan.pdf">kebijakan</a> penggunaan data kami</p>
					<br/><center><button type="submit" class="button inverse">Daftar</button></center>
				</form>
				<center><a href="<?php echo (site_url('welcome/indexbackdaftar'));?>">Halaman Awal</a></center>
				<?php 
					if(isset($psn)){
						echo "<center><font color='red'>".$psn."</font></center>";
					}
				?>
		</div>
		</div>
	</body>
</html>