<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" href="<?php echo base_url();?>images/logo.png">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">	
		
		<title>Pena | Mari Menulis</title>
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
	
	<body class="metro" bgcolor="e6e6fa">
	
		<div class="container">
			<div class="grid">
				<div class="row">
					<div class="span7">
						</br></br></br>
						<center><img src="<?php echo base_url();?>images/logo2.png" width="400px" height="400px"></center>
						<p align="center">
						Berbagi file bersama kami! Cari referensi yang anda perlukan disini. Pena adalah media untuk anda
						mempublikasikan karya tulis anda dan anda bisa berbagi karya tulis anda dengan orang lain secara gratis.
						Tak masalah anda penulis profesional atau pemula. Apapun karya anda posting disini untuk mendapat tanggapan langsung!
						Mendaftar, gratis sampai kapanpun.
						</p>
					</div>
					<div class="span7 padding20">
					<div class="span5">
						</br></br></br></br></br></br></br></br></br>
						<div class="example shadow">
						<h2 id="__table__" align="center">Masuk</h2>
						<form method="post" action="<?php echo (base_url('index.php/welcome/select_login'));?>">
							
							<table align="center">
								<tr>
									<td><input type="text" name="username" autofocus placeholder="Username"></td>
								</tr>
								<tr>
									<td><input type="password" name="password" placeholder="Password"></td>
								</tr>
							</table>
							<?php 
							if(isset($psn)){
								echo "<center><font color='red'>".$psn."</font></center>";
							}
							?>
							<br/><center><button type="submit" class="button inverse">Masuk</button></center>
						</form>
						<center>Belum Punya Akun ? Daftar <a href="<?php echo (site_url('welcome/gosignupview'));?>">Di Sini</a></center>
						
						</div>
					</div>
				</div>

					
				
			</div>
		</div>
	</body>
	

</html>