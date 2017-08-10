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
			
			$nama=$rows->nama_member;
			$id=$rows->id_member;
			$foto=$rows->foto;
		
								}
	?>
	
	<body class="metro" bgcolor="#e6e6fa" >
	
		 <nav class="navigation-bar dark">
                <div class="navigation-bar-content">
				<div class="element image-button image-left place-left">
                    <a href="<?php echo (site_url('welcome/backmember'));?>"><img src="<?php echo base_url();?>images/logo.jpg"/> PENA | Mari Menulis</a>
                    </div>
					<span class="element-divider"></span>

                    <a class="pull-menu" href="#"></a>
                  
                    <div class="no-tablet-portrait">
                        <span class="element-divider"></span>
                        <a class="element brand" href="<?php echo (site_url('welcome/viewfiksi'));?>">Fiksi</a>
						<span class="element-divider"></span>
                        <a class="element brand" href="<?php echo (site_url('welcome/viewnonfiksi'));?>">Non - Fiksi</span></a>
                        <span class="element-divider"></span>

                        <div class="element input-element">
                            <form method="post" action="<?php echo (base_url('index.php/welcome/viewjudul'));?>">
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
                            <a href="<?php echo site_url('welcome/editprofilview/'.$id.'/')?>">Hai, <?php echo $nama; ?>
                            <img src="<?php echo base_url();?>images/<?php echo $foto;?>"/></a>
                        </div>
                    </div>
                </div>
            </nav>

	
		<div class="container">
			<div class="grid">
				<div class="row">
					
						<div class="span7 ">
							<!--<img src="<?php echo base_url();?>images/bard.jpg" class="cycle span3">-->
							<h2>Hasil Pencarian</h2>
							<br/>
							<?php
							foreach($postingan as $post){
							echo "<div class='span6'>";
							echo "<div class='example shadow'>";
								echo "<a href=";?> <?php echo site_url('welcome/viewpost/'.$post->id_post.'/')?><?php echo">" . $post->judul_postingan . "</a>";
								echo "<br/>";
								echo "<br/>";
							echo "<p class='justify'>";
									echo "<b>Jenis</b> : ".$post -> genre;
									echo "<br/>";
									echo $post->deskripsi;
								echo "</p>";
							echo "Diposting Pada ".$post->waktu_post;
							echo "</div>";
							echo "</div>";
							echo "<br/>";
							echo "<br/>";
							}
							?>
							
						</div>
					
					
						<div class="span7">
							<h2 id="__table__">Unggah File</h2>
							<br/>
							<form method="post" enctype="multipart/form-data" action="<?php echo (base_url('index.php/welcome/uploadfile'));?>">
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<table class="table">
										<tr align="left" bgcolor="#e6e6fa">
											<td><input name="nama_post" type="text" style="width:333px;" placeholder="Masukan judul postingan" required /></td>
										</tr>
										<tr align="left" bgcolor="#e6e6fa">
											<td><pre><input name="userfile" type="file" class="button small" required />	<button type="submit" class="button inverse">Unggah</button></pre></td>
										</tr>
										<tr align="left" bgcolor="#e6e6fa">
											<td><pre><h3>Genre</h3><br/><input type="radio" name="genre" value="Fiksi" required> Fiksi		<input type="radio" name="genre" value="Non - Fiksi" required> Non - Fiksi</pre></td>
										</tr>
										<tr align="left" bgcolor="#e6e6fa">
											<td><textarea name="deskripsi" cols="50" rows="7" placeholder="Masukkan deskripsi disini" required ></textarea></td>
										</tr>
										
									</table>
							</form>
							
							<h2 id="__table__">Postingan Saya</h2>
							<div class='example'>
							<table class="table">
								<?php
									foreach($postingansaya as $postsaya){
										echo "<tr>";
											echo "<td><a href=";?> <?php echo site_url('welcome/viewpost/'.$postsaya->id_post.'/')?><?php echo">" . $postsaya->judul_postingan . "</a></td>";
											echo "<td> &nbsp;</td>";
											echo "<td> &nbsp;</td>";
											echo "<td> <a href=";?> <?php echo site_url('welcome/deletepost/'.$postsaya->id_post.'/'.$postsaya->files.'/')?><?php echo"> Hapus </a> </td>";
										echo "</tr>";
									}
								?>
							</table>
							
						</div>
						</div>
					
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