<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("check.php");	
	include("config.php")
?>
<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Sygjerimet</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
				<header id="header" class="alt">
						<h1 id="logo"><a href="Ballina.php">PDDPS</a></h1>

						<nav>
							<a href="#menu">Menytë</a>
						</nav>
					</header>

				<!-- Menu -->
				<?php 
				$_SESSION["id_p_inst"] =  $row['id_p_inst'];
										mysqli_next_result($conn);
										$result = mysqli_query($conn28,"CALL select_session_INST($_SESSION[id_p_inst])");	
										while($row=mysqli_fetch_array($result)){
											extract($row);
											if($result==null)
												mysqli_free_result($result);
											?>
					<?php include_once('menyte.php');?>
					


				<!-- Banner -->
				<section id="banner">
				<?php include_once('headerAdm.php');?>
					</section>

				<!-- Wrapper -->
				

						<!-- Four -->
				
							<section id="four" class="wrapper alt style1">
							<div class="inner">
                                <h3 class="major">Dërgo Sygjerim</h3>
                                <form enctype="multipart/form-data" method="post" action="addSygjerim.php">
                                    <div class="row gtr-uniform">
                                        
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Zgjedh Universitetin </label>
											<select name="id_uni"required>
													<option selected="selected" ></option>
														<?php
														$res=mysqli_query($conn29,"CALL selectUniversitetet()");
														while($row=$res->fetch_array())
														{
															?>
															<option value="<?php echo $row['id_uni']; ?>" ><?php echo $row['universiteti']; ?></option>
															<?php
														}
														?>
												</select>
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Fakulteti </label>
                                            <input type="text" name="fakulteti" id="demo-name" value="" required/>
                                        </div>
										
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Programi studimor</label>
                                            <input  type="text" name="p_studimor" id="demo-name" value="" required/>
                                        </div>
										<div class="col-6 col-12-xsmall">
											<label for="demo-name">Shto Foto</label>
                                       		<input type="hidden" name="MAX_FILE_SIZE" value="10000000" required/>
											<input name="userfile" type="file" required/>
											<input type="hidden" name="id_p_inst" value='<?php echo $id_p_inst;?>' />
										</div>
										<div class="col-12">
													<label for="demo-message">Përshkrimi i Programit Studimor</label>
													<textarea name="pershkrimi_p_studimor" id="demo-message" rows="6" required></textarea>
										</div>
                                        <div class="col-12">
                                            <ul class="actions">
                                                <li><input type="submit" name="addSygjerim" value="Dërgo" class="primary" /></li>
                                            </ul>
                                        </div>
                                    </div>
                                </form>
						</div>

					</section>
					<?php } ?>	


				<!-- Footer -->
				<section id="footer">
						<div class="inner">
							<h2 class="major">Kontakti</h2>
							<p>Më poshtë mund të na kontaktoni në lidhje me ndonjë parregullsi të mundshme, apo ndonjë pyetje lidhur me Platformën Digjitale</p>
							<form method="post" action="addKontakt.php">
								<div class="fields">
									<div class="field">
										<label for="name">Subijekti</label>
										<input type="text" name="subijekti" id="name" />
									</div>
									<div class="field">
										<label for="message">Mesazhi</label>
										<textarea name="mesazhi" id="message" rows="4"></textarea>
									</div>
									<div class="field">
										<label for="email">Email-i</label>
										<input type="email" name="emaili" id="email" />
									</div>
								</div>
								<ul class="actions">
									<li><input type="submit" name="addKontakt" class="primary" value="Dërgo" /></li>
								</ul>
							</form>
							<?php include_once('footeri.php');?>
							<?php include_once('copyright.php');?>
						</div>
					</section>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>