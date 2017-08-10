<?php
	header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0',false);
	header('Pragma: no-cache');
?>

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

		foreach($listData as $rows){
			
			$username=$rows->username;
			$nama=$rows->nama_member;
			$password=$rows->password;
			$tgllahir=$rows->tgllahir;
			$email=$rows->email;
			$id=$rows->id_member;
			$foto=$rows->foto;
		
								}
	?>
		
		<div class="container">
		</br></br>
			<div class="example shadow"><h2 id="__table__">EDIT PROFIL</h2>
				<center><img src="<?php echo base_url();?>images/<?php echo $foto;?>" width="200px" height="200px"/></center>
				<center><a href="<?php echo (site_url('welcome/hapusfoto/'.$id));?>">Hapus Foto</a></pre></center></br>
				<form method="post" enctype="multipart/form-data" action="<?php echo (base_url('index.php/welcome/uploadfoto'));?>">
					<input type="hidden" name="username2" value="<?php echo $username; ?>">
					<input type="hidden" name="id2" value="<?php echo $id; ?>">
					<br/>
					<br/>
					<center><div class="span7 shadow">
						<table class="table">
							<tr>
								<td>Foto</td> <td>:</td> <td><pre><input name="userfile" type="file" accept="image/*" class="button small" required/>  <button type="submit" class="button inverse">Unggah</button></pre></td>
							</tr>
					
				</form>
				
				<form method="post" action="<?php echo (base_url('index.php/welcome/editprofil'));?>">
				
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="hidden" name="username2" value="<?php echo $username; ?>">
					
					<tr>
						<td>Username</td> <td>:</td> <td><input type="text" name="username" value="<?php echo $username; ?>" required disabled></td>
					</tr>
					<tr>
						<td>Password</td> <td>:</td> <td><input type="password" name="password" value="<?php echo $password; ?>" required></td>
					</tr>
					<tr>
						<td>Nama</td> <td>:</td> <td><input type="text" name="nama" value="<?php echo $nama; ?>" required></td>
					</tr>
					<tr>
						<td>E-mail</td> <td>:</td> <td><input type="email" name="email" value="<?php echo $email; ?>" required disabled></td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td> <td>:</td> <td><input type="date" name="tgllahir" value="<?php echo $tgllahir; ?>" required></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td> <td>:</td> <td><input type="radio" name="jk" value="Laki - Laki" required>Laki - Laki<br/><input type="radio" name="jk" value="Perempuan" required>Perempuan</td></td> 
					</tr>
				</table>
					<center><pre><button type="submit" class="button inverse">Simpan</button></center><br/><center><a href="<?php echo (site_url('welcome/backmember'));?>">Kembali</a></pre></center></br>
				</form>
				
				<?php 
					if(isset($psn)){
						echo "<center><font color='red'>".$psn."</font></center>";
					}
				?>
		</div>
		</div>
		</div>
	</body>
	
		<footer>
		<div class="bg-dark">
            <div class="container" style="padding: 10px 0;">

                <div class="grid no-margin">
                    <div class="row no-margin">
                        <div class="span3 padding10">
                            <img src="<?php echo base_url();?>images/org.png"/ alt="" class="polaroid"/>
                        </div>
                        <div class="span6 padding10">
                            <h3 class="fg-white">About author</h3>
                            <p class="fg-white">
								Hi!
								Aplikasi ini dibuat untuk project tugas besar rpl.
								Segala kesamaan ide, bentuk hanyalah kebeltulan semata.
								Kami menerima semua kritik dan saran.</br>
								Kami tidak bertanggung jawab atas segala penyalahgunaan konten yang diupload di aplikasi ini.
								Kontak kami :
								tinta_pena@tulis.com
							</p>
                        </div>
                        <div class="span3 padding10">
                            <a class="button info " style="width: 100%; margin-bottom: 5px" href="http://bizspark.com">Daskani</a>
                            <a class="button info " style="width: 100%; margin-bottom: 5px"  href="http://jetbrains.com">Fauzan Gumira A</a>
                            <a class="button info " style="width: 100%; margin-bottom: 5px"  href="https://github.com/olton/Metro-UI-CSS">M. Rizki Nugraha</a>
                            <a class="button info" style="width: 100%; margin-bottom: 5px;"  href="http://lesscss.org">Sri Nurfatimah</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
	</footer>
</html>