<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
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
		<title>Regjistrohu</title>
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
						<h1><a href="index.php">PDDPS</a></h1>
						
				</header>
				<!-- Menu -->
				<!-- Banner -->
				<section id="banner">
				<?php include_once('header_login.php');?>
					</section>

				<!-- Wrapper -->
				

						<!-- Four -->
							<section id="four" class="wrapper alt style1">
							<div class="inner">
                                <h3 class="major">Regjistrimi</h3>
                                <form method="post" action="shtoPerdorues.php">
                                    <div class="row gtr-uniform">
                                        
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Emri Institucionit</label>
                                            <input type="text" name="emri_institucionit" id="demo-name" value="" required/>
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Telefoni</label>
                                            <input type="text" name="telefoni" id="demo-name" value=""  required/>
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-email">Email-i</label>
                                            <input type="email" name="emaili" id="demo-email" value="" required/>
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Fjal??kalimi </label>
                                            <input type="password" name="fjalekalimi" id="demo-name" value="" required/>
                                        </div>
										<div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Shteti</label>
                                            <input type="text" name="shteti" id="demo-name" value=""  required/>
                                        </div>
                                        <div class="col-12">
                                            <ul class="actions">
                                                <li><input type="submit" value="Regjistrohu" name="shtoPerdorues" class="primary" /></li>
												<li><a href="index.php" class="button primary">Ky??u</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </form>
						</div>

					</section>

				<!-- Footer -->
				<section id="footer">
						<div class="inner">
							<h2 class="major">Kontakti</h2>
							<p>M?? posht?? mund t?? na kontaktoni n?? lidhje me ndonj?? parregullsi t?? mundshme, apo ndonj?? pyetje lidhur me Platform??n Digjitale</p>
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
									<li><input type="submit" name="addKontakt" class="primary" value="D??rgo" /></li>
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