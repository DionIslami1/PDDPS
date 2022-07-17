<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("check.php");	
?>
<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysqli_query($conn,
//"SELECT * FROM puntoret ORDER BY id_p DESC");
?>
<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Lista e Titujve</title>
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
							<div class="inner" style="width: 100%; padding: 1%;">
							<div class="table-wraper" style="border-top: 10%" >
                                <form action="" method="post">
									<table>
										<tr>
											<h2>Kërko të dhënat e Titujve për modifikim ose fshirje</h2>
										</tr>
										<tr>
											<td> 
												Shkruaj:
											</td>
											<td>
												<input type="text" name="term" placeholder="Titujt"/>
											</td>
											<td> <input type="submit" class='button primary' value="Kërko" /></td>
										</tr>
									</table> 
									</div>
									</div>
								</form> 
							<div class="table-wrapper" style="overflow-x:auto; width: 100%;">
									<table style="width: 100%; white-space: nowrap;">
										<tr>
											<td><b>Titujt</b></td>
											<td><b>Modifiko</b></td>
											<td><b>Fshi</b></td>
										</tr>
										<?php
											if (!empty($_REQUEST['term'])) {
												$term = mysqli_real_escape_string
												($conn,$_REQUEST['term']);
												$sql= mysqli_query ($conn31, "CALL zgjedhTerm_Titujt('$term')"); 
											while($row = mysqli_fetch_array($sql)) { 		
													echo "<tr>";
													echo "<td>".$row['titulli']."</td>";		
													echo "<td><a href=\"updateTitujt.php?id_titulli=$row[id_titulli]\" class='button primary'>
													Modifiko</a></td>";
													echo "<td><a href=\"fshiTitull.php?id_titulli=$row[id_titulli]
													\" onClick=\"return confirm('A jeni të sigurt së dëshironi të fshini Titullin?')\" 
													 class='button primary' style='background-color:#F8033C'>Fshi</a></td></tr>";	
												}
											}
											?>           
									</table>
									</div>
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