<?php
include('config.php');
include('check.php');


?>


<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Lista e të të Diplomuarve</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<style>
		.box{
  white-space: nowrap; 
  width: 250px; 
  overflow: hidden;
  text-overflow: ellipsis; 
  border: 0px;
  
}
</style>
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
				<nav id="menu">
						<div class="inner">
							<h2>Meny</h2>
							<ul class="links">
								<li><a href="Ballina.php">Ballina</a></li>
								<li><a href="modifiko_profilin.php">Profili</a></li>
								<li><a href="menaxhimiEdukimit.php">Edukimi</a></li>
								<li><a href="ckycu.php" class="button primary">Çkycu</a></li>
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>

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
											<h2>Të dhënat e Diplomave për modifikim ose fshirje</h2>
										</tr>
										
									</table> 
									</div>
									</div>
								</form> 
							<div class="table-wrapper" style="overflow-x:auto; width: 100%;">
									<table style="width: 100%; white-space: nowrap;">
										<tr>
											<td><b>Niveli</b></td>
											<td><b>Titulli</b></td>
											<td><b>Universiteti</b></td>
											<td><b>Fakulteti</b></td>
											<td><b>Programi Studimor</b></td>
											<td><b>Titulli i Temës së Diplomës</b></td>
											<td><b>Data Regjistrimit</b></td>
											<td><b>Data Përfundimit</b></td>
											<td><b>Data Diplomimit</b></td>
											<td><b>Nr i Kredive ECTS</b></td>
											<td><b>Nota Mesatare</b></td>
											<td><b>Numri i Diplomës</b></td>
											<td><b>Shteti</b></td>
											<td><b>Modifiko</b></td>
											<td><b>Fshi</b></td>
										</tr>
										<?php
										
									
											
										
											// $query = "SELECT DISTINCT id_p_dip from edukimi WHERE id_edu = " . $_SESSION["id_edu"]; 
											// $result = $dbController->getIds($query);
											
											$_SESSION["id_p_dip"] =  $row['id_p_dip'];

											 
												$sql = mysqli_query($conn25,
												"CALL selectLeftOuterJoing_ListaDiplomave($_SESSION[id_p_dip])"); 

											while($row = mysqli_fetch_array($sql)) { 		
													echo "<tr>";
													echo "<td>".$row['niveli']."</td>";
													echo "<td>".$row['titulli']."</td>";
													echo "<td>".$row['universiteti']."</td>";	
													echo "<td>".$row['fakulteti']."</td>";
													echo "<td>".$row['programi_studimor']."</td>";
													echo "<td> <div class='box'>".$row['titulli_i_temes_se_diplomes']."</div></td>";	
													echo "<td>".$row['data_regjistrimit']."</td>";
													echo "<td>".$row['data_perfundimit']."</td>";
													echo "<td>".$row['data_diplomimit']."</td>";
													echo "<td>".$row['nr_i_kredive_ects']."</td>";
													echo "<td>".$row['nota_mesatare']."</td>";
													echo "<td>".$row['nr_i_diplomes']."</td>";
													echo "<td>".$row['shteti']."</td>";

													echo "<td><a href=\"modifikoDiplomen.php?id_edu=$row[id_edu]\" class='button primary'>
													Modifiko</a></td>";
													echo "<td><a href=\"deleteDiplomen.php?id_edu=$row[id_edu]\" 
													onClick=\"return confirm('A jeni të sigurt së dëshironi të fshini Diplomën?')\" class='button primary' style='background-color:#F8033C';>Fshi</a></td></tr>";		

												}
											

											?>           
									</table>
									</div>
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
										<label for="email">Emaili</label>
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