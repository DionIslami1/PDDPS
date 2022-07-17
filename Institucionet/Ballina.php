<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("check.php");	
	include("config.php")
?>



<?php
$dataPoints = array();

$result1 = mysqli_query($conn20, "CALL Select_ProgramiSutdimor" );
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
						<h1 id="logo"><a href="Ballina.php">PDDPS</a></h1>

						<nav>
							<a href="#menu">Menytë</a>
						</nav>
					</header>

				<!-- Menu -->
				<?php 
				$_SESSION["id_p_inst"] =  $row['id_p_inst'];
										mysqli_next_result($conn20);
										$result = mysqli_query($conn20,"CALL select_session_INST($_SESSION[id_p_inst])");	
										while($row=mysqli_fetch_array($result)){
											extract($row);
											if($result==null)
												mysqli_free_result($result);
											?>
					<?php include_once('menyte.php');?>
					<?php } ?>	

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
						<section id="four" class="wrapper alt style1">
								<div class="inner">
								
									<h2 class="major">Sygjerimet nga Institucionet</h2>
									<p>Më poshtë janë paraqitur sygjerimet nga 'Institucionet' për programet studimore</p>
									<section class="features">
									<?php
										$result = mysqli_query($conn22,"CALL LeftOuterJoin_Sygjerimet");

										while ($row = mysqli_fetch_assoc($result)) {

										extract($row);
										
										
										if($result==null)
										mysqli_free_result($result);

										?>
										<article>
											<div class="image"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'">'; ?></div>
											<h3 class="major"><?php echo $p_studimor; ?></h3>
											<i><h4 class="special"><?php echo $universiteti; ?> <br>Fakulteti: <?php echo $fakulteti; ?></h4></i>
											<p><?php echo $pershkrimi_p_studimor; ?></p>
											<!-- <a href="#" class="special">Learn more</a> -->
										</article>
										<?php } ?>
									</section>
									<ul class="actions">
										<!-- <li><a href="#" class="button">Browse All</a></li> -->
									</ul>
								</div>
							</section>

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

				<!-- Footer -->
				

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