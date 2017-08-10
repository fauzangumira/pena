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
		
		<title>Pena | Mari Menulis</title>
		<link href="<?php echo base_url();?>metro/css/metro-bootstrap.css" rel="stylesheet">
		<link href="<?php echo base_url();?>metro/css/metro-bootstrap-responsive.css" rel="stylesheet">
		<link href="<?php echo base_url();?>metro/css/iconFont.css" rel="stylesheet">
		<link href="<?php echo base_url();?>metro/css/docs.css" rel="stylesheet">
		<link href="<?php echo base_url();?>metro/css/edit.css" rel="stylesheet">


		<!-- Load JavaScript Libraries -->
		<script src="<?php echo base_url();?>metro/js/metro.min.js"></script>
		<script src="<?php echo base_url();?>metro/js/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url();?>metro/js/jquery/jquery.widget.min.js"></script>
		<script src="<?php echo base_url();?>metro/js/jquery/jquery.mousewheel.js"></script>


	</head>
	
	<?php

		foreach($listData as $rows){
			
			$nama=$rows->nama_admin;
			$id=$rows->id_admin;
			//$foto=$rows->foto;
		
								}
	?>
	
	<body class="metro" bgcolor="#e6e6fa">
	
		<nav class="navigation-bar dark">
                <div class="navigation-bar-content">
				<div class="element image-button image-left place-left">
                    <a href="<?php echo (site_url('welcome/backadmin'));?>"><img src="<?php echo base_url();?>images/logo.jpg"/> PENA | Mari Menulis</a>
                    </div>
					<span class="element-divider"></span>

                    <a class="pull-menu" href="#"></a>
                  
                    <div class="no-tablet-portrait">
                        <span class="element-divider"></span>
                        <a class="element brand" href="<?php echo (site_url('welcome/viewfiksiadmin'));?>">Fiksi</a>
						<span class="element-divider"></span>
                        <a class="element brand" href="<?php echo (site_url('welcome/viewnonfiksiadmin'));?>">Non - Fiksi</span></a>
                        <span class="element-divider"></span>

                        <div class="element input-element">
                            <form method="post" action="<?php echo (base_url('index.php/welcome/viewjuduladmin'));?>">
                                <div class="input-control text">
                                    <input type="text" name="judul" placeholder="Cari berdasarkan judul">
                                    <button class="btn-search"></button>
                                </div>
                            </form>
                        </div>

                        <div class="element place-right">
                            <a href="<?php echo site_url('welcome/logout/')?>"><font color="white">Keluar</font></a>
                        </div>
                        <span class="element-divider place-right"></span>
                        <div class="element image-button image-left place-right">
                            <a href="<?php echo (site_url('welcome/backadmin'));?>">Hai, <?php echo $nama; ?>
                            <img src="<?php echo base_url();?>images/logo2.png"/></a>
                        </div>
                    </div>
                </div>
            </nav>

	
		<div class="container">
			<div class="grid">
				<div class="row">
							<!--<img src="<?php echo base_url();?>images/bard.jpg" class="cycle span3">-->
							<div class="example">
							<?php
							foreach($viewpost as $post){
							$id_post = $post -> id_post;
							echo "<center><h2>". $post->judul_postingan ."</h2></center>";
							echo "<br/>";
								echo "<p class='justify'>";
									echo "<b>Jenis</b> : ".$post -> genre;
									echo "<br/>";
									echo $post->deskripsi;
								echo "</p>";
							echo "<center><a href=";?><?php echo base_url();?><?php echo "files/$post->files><button class='inverse'>Unduh</a></center>";
							echo "<br/>";
							echo "Diposting Pada ".$post->waktu_post . " oleh " . $post->nama_member;
							echo "<br/>";
							echo "<br/>";
							echo "<center><a href=";?> <?php echo site_url('welcome/deletepostadmin/'.$post->id_post.'/'.$post->files.'/')?><?php echo"> <button class='button danger'>Hapus Postingan Ini</button></a></center>";
							echo "<br/>";
							echo "<br/>";
							}
							?>
							</div>
							<center><a href="<?php echo (site_url('welcome/backadmin'));?>"><button class='button inverse'>Kembali</button></a></center>
							<br/>
							<br/>
							<br/>
							<h5>Komentar</h5>
							<table class="table">
								<?php
									foreach($viewkoment as $koment){
										echo "<tr>";
											echo "<td> Dari ". $koment -> nama_member .", Pada "  . $koment -> waktu ;
											echo "<br/>";
											echo "<br/><p>";
											echo $koment -> komentar ."</p></td>";
											echo "<td> <center><a href=";?> <?php echo site_url('welcome/deletekomentadmin/'.$koment->id.'/'.$id_post.'/')?><?php echo"> <button class='button danger'>Hapus</button></a></center></td>";
											
										echo "</tr>";
									}
								?>
							</table>
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