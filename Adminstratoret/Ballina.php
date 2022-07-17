<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("check.php");	
	include("config.php")
?>



<?php
$dataPoints = array();

$result1 = mysqli_query($conn32, "CALL Select_ProgramiSutdimor" );
foreach($result1 as $row1){
	
		
		array_push($dataPoints, array("label"=> $row1['programi_studimor'], "y"=> $row1['TeDiplomuar']));

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
		<title>Ballina</title>
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
				<section id="wrapper">
							<script>
								window.onload = function () {
								
								var chart = new CanvasJS.Chart("chartContainer", {
									animationEnabled: true,
									exportEnabled: true,
									title:{
										text: ""
									},
									subtitles: [{
										text: ""
									}],
									data: [{
										type: "pie",
										showInLegend: "true",
										legendText: "{label}",
										indexLabelFontSize: 10,
										indexLabel: "{label} - #percent%",
										yValueFormatString: "#,##0",
										dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
									}]
								});
								chart.render();
								
								}
							</script>

						<!-- One -->
							<section id="one" class="wrapper spotlight style1" style="box-shadow: #fff;">
								<div class="inner" style="width: 100%; padding-left: 0%; background-color: #fff; box-shadow: #fff;">
									
									<div class="content">
										<div id="chartContainer" style="height: 470px; width: 100%;"></div>
										<script src="canvasjs.min.js"></script>
									</div>
								</div>
							</section>

						

						<!-- Four -->
							

					

						<!-- Two -->
							

						<!-- Four -->
							<section id="four" class="wrapper alt style1">
							<h2 style="text-align: center;">Menaxhimi i Nomenklaturave</h2>
								<div class="inner" style="text-align: center;">
								<h4 style="text-align: left;">Menaxhimi i Universiteteve</h4>
								<table>
									<tr>
										<td><a href="shto_universitet.php" style="border: 10%;" class="button primary">Shtimi i Universitetit</a></td> 
										<td><a href="modifiko_universitet.php" class="button primary">Lista e Universiteteve</a></td>
									</tr>
									</table>
									<br>
									<h4 style="text-align: left;">Menaxhimi i Niveleve</h4>
								<table>
									<tr>
										<td><a href="shto_nivele.php" style="border: 10%;" class="button primary">Shtimi i Nivelit</a></td> 
										<td><a href="modifiko_nivele.php" class="button primary">Lista e Niveleve</a></td>
									</tr>
									</table>
									<br>
									<h4 style="text-align: left;">Menaxhimi i Titujve</h4>
								<table>
									<tr>
										<td><a href="shto_tituj.php" style="border: 10%;" class="button primary">Shtimi i Titujve</a></td> 
										<td><a href="modifiko_titujt.php" class="button primary">Lista e Titujve</a></td>
									</tr>
									</table>
									</div>
							<hr>
							<div class="inner" style="text-align: center;">
								<table>
									<tr>
										<td><b>Lista e të Dhënave</b></td> 
										<td><b>Lista e Kotakteve</b></td>
										<td><b>Lista e Menyve</b></td>
									</tr>
									<tr>
										<td><a href="modifikoTedhena.php" style="border: 10%;" class="button primary">Të Dhënat</a></td> 
										<td><a href="listaKontakteve.php"  style="border: 10%;" class="button primary" >Kontaktet</a></td>
										<td><a href="modifikoMeny.php" class="button primary">Menytë</a></td>
									</tr>
									</table>

									
								</div>

							</section>

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
		</div>
	</body>
</html>