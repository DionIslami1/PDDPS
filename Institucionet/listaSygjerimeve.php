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
		<title>Lista e Sygjerimev</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<style>
			.box{
  white-space: nowrap; 
  width: 200px; 
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
							<h2>Menytë</h2>
							<ul class="links">
								<li><a href="Ballina.php">Ballina</a></li>
								<li><a href="modifiko_profilin.php?id_p_inst=<?php echo $id_p_inst;?>">Profili</a></li>
								<li><a href="menaxhoSygjerimet.php">Sygjerimet</a></li>
								<li><a href="raportet.php">Raportet</a></li>
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
											<h2>Të dhënat e Sygjerimeve për modifikim ose fshirje</h2>
										</tr>
										
									</table> 
									</div>
									</div>
								</form> 
							<div class="table-wrapper" style="overflow-x:auto; width: 100%;">
									<table style="width: 100%; white-space: nowrap;">
										<tr>
											<td><b>Universiteti</b></td>
											<td><b>Fakulteti</b></td>
											<td><b>Programi Studimor</b></td>
											<td><b>Përshkrimi i Programit Studimor</b></td>
											<td><b>Foto</b></td>
											<td><b>Emri - Fotos</b></td>
											<td><b>Modifiko</b></td>
											<td><b>Fshi</b></td>
										</tr>
										<?php
										
									
											
										
											// $query = "SELECT DISTINCT id_p_dip from edukimi WHERE id_edu = " . $_SESSION["id_edu"]; 
											// $result = $dbController->getIds($query);
											
											$_SESSION["id_p_inst"] =  $row['id_p_inst'];

											 
											$sql = mysqli_query($conn24,
											"CALL selectLeftOuterJoing_ListaSygjerimeve($_SESSION[id_p_inst])" );

											while($row = mysqli_fetch_array($sql)) { 		
													echo "<tr>";
													echo "<td>".$row['universiteti']."</td>";
													echo "<td>".$row['fakulteti']."</td>";
													echo "<td>".$row['p_studimor']."</td>";
													echo "<td> <div class='box'>". $row ['pershkrimi_p_studimor']. "</div> </td>";	
													echo "<td><img src=data:image/jpeg;base64,".base64_encode($row['image'])." width='80'  height='100'/></td>";
													echo "<td> <div class='box'>".$row['name']."</div></td>";

													echo "<td><a href=\"modifiko_sygjerim.php?id_sygjerimi=$row[id_sygjerimi]\" class='button primary'>
													Modifiko</a></td>";
													echo "<td><a href=\"deleteSygjerimin.php?id_sygjerimi=$row[id_sygjerimi]\" 
													onClick=\"return confirm('A jeni te sigurt se deshironi te fshini Sygjerimin?')\" class='button primary' style='background-color:#F8033C';>Fshi</a></td></tr>";		

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