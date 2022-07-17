
<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Menaxhimi i Profilit</title>
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
						<nav>
							<a href="#menu">Menytë</a>
						</nav>
					</header>

				<!-- Menu -->
				<?php include_once('menyte.php');?>

				<!-- Banner -->
				<section id="banner">
				<?php include_once('headerAdm.php');?>
					</section>

				<!-- Wrapper -->
				

						<!-- Four -->
							<section id="four" class="wrapper alt style1">
							<div class="inner">
                                <h3 class="major">Form per Menaxhimin e Profilit </h3>
                                <form method="post" action="#">
                                    <div class="row gtr-uniform">
                                        
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Emri</label>
                                            <input type="text" name="demo-name" id="demo-name" value="" />
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Mbiemri</label>
                                            <input type="text" name="demo-name" id="demo-name" value="" />
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Nr. Personal</label>
                                            <input type="text" name="demo-name" id="demo-name" value="" />
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-date">Datelindja</label>
                                            <input style="color: black;" type="date" name="demo-date" id="demo-date" value="" />
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Telefoni</label>
                                            <input type="text" name="demo-name" id="demo-name" value="" />
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-email">Emaili</label>
                                            <input type="email" name="demo-email" id="demo-email" value="" />
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Fjalekalimi </label>
                                            <input type="password" name="demo-name" id="demo-name" value="" />
                                        </div>
                                       
                                        <div class="col-12">
                                            <ul class="actions">
                                                <li><input type="submit" value="Modifiko" class="primary" /></li>
                                            </ul>
                                        </div>
                                    </div>
                                </form>
						</div>

					</section>

				<!-- Footer -->
				<section id="footer">
				<div class="inner">
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