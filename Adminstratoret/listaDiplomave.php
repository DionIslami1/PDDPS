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
		<title>Lista e të Diplomuarve</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<style>.box{
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
											<h2>Të dhënat e Diplomave për shikim ose fshirje</h2>
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
											<td><b>Fshi</b></td>
										</tr>
										<?php
											// $query = "SELECT DISTINCT id_p_dip from edukimi WHERE id_edu = " . $_SESSION["id_edu"]; 
											// $result = $dbController->getIds($query
											$id_p_dip = $_GET['id_p_dip'];

												$sql = mysqli_query($conn31,
												"CALL zgjedh_leftouterjoin_Raporti('$id_p_dip')" ); 

											while($row = mysqli_fetch_array($sql)) { 		
													echo "<tr>";
													echo "<td>".$row['niveli']."</td>";
													echo "<td>".$row['titulli']."</td>";
													echo "<td>".$row['universiteti']."</td>";	
													echo "<td>".$row['fakulteti']."</td>";
													echo "<td>".$row['programi_studimor']."</td>";
													echo "<td><div class='box'>".$row['titulli_i_temes_se_diplomes']."</div></td>";	
													echo "<td>".$row['data_regjistrimit']."</td>";
													echo "<td>".$row['data_perfundimit']."</td>";
													echo "<td>".$row['data_diplomimit']."</td>";
													echo "<td>".$row['nr_i_kredive_ects']."</td>";
													echo "<td>".$row['nota_mesatare']."</td>";
													echo "<td>".$row['nr_i_diplomes']."</td>";
													echo "<td>".$row['shteti']."</td>";

												
													echo "<td><a href=\"deleteDiplomen.php?id_edu=$row[id_edu]\" 
													onClick=\"return confirm('A jeni të sigurt se dëshironi të fshini Diplomën?')\" class='button primary' style='background-color:#F8033C';>Fshi</a></td></tr>";		

												}
											
											mysqli_close($conn);

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