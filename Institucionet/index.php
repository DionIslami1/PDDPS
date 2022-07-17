<?php
/* Index.php faqja qe permban formen e loginit) */
	include('login.php'); // Include Login Script
	if ((isset($_SESSION['emaili']) != '')) 
	{
		header('Location: ballina.php');
	}	
?>
<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Kycu</title>
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
							<h2 class="major">Kyçu në Platformë</h2>
							<p style="text-align: justify;">Ju lutemi kyçuni në platformë. Nëse nuk jeni regjistruar në platformë ju duhet të regjistroheni. Për tu regjistruar në platformë ju duhet klikoni në butonin "Regjistrohu" dhe paststaj jepni të dhënat tuaja.</p>
							<form method="post" action="" style="margin-left:25% ;">
								<div class="fields" style="width: 60%;">
									<div class="field">
										<label for="emaili">Email-i</label>
										<input type="email" name="emaili" id="email" required/>
									</div>
									<div class="field">
										<label for="fjalekalimi">Fjalëkalimi</label>
										<input type="password" name="fjalekalimi" id="password" required/>
									</div>
								</div>
								<ul class="actions">
									<li><input type="submit" class="button primary" name="submit" value="Kyçu" /></li>
									<li><a href="Regjistrohu.php" class="button">Regjistrohu</a></li>
								</ul>
								
							</form>
						</div>

					</section>

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