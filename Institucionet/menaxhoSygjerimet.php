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
		<title>Menaxho Sygjerimet</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

			<header id="header" class="alt">
						<h1 id="logo"><a href="Ballina.php">PDDPS</a></h1>

						<nav>
							<a href="#menu">Menytë</a>
						</nav>
					</header>

				<!-- Menu -->
				<?php 
				$_SESSION["id_p_inst"] =  $row['id_p_inst'];
										mysqli_next_result($conn24);
										$result = mysqli_query($conn24,"CALL select_session_INST($_SESSION[id_p_inst])");	
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

						<!-- Content -->
							<div class="wrapper">
							<h2 style="text-align: center;">Menaxho Sygjerimet</h2>
								<div class="inner" style="text-align: center;">

								<table>
                                   <tr>
                                    <td><a href="shtoSygjerim.php" style="margin-right: 10%;" class="button primary">Dërgo Sygjerim</a></td>
                                    <td><a href="listaSygjerimeve.php?id_p_inst=<?php echo $id_p_inst;?>" class="button primary">Lista e Sygjerimeve të Dërguara</a></td>
								   </tr>
								</table>
								</div>
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