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
		<title>Raportet</title>
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
				<?php 
				$_SESSION["id_p_inst"] =  $row['id_p_inst'];
										mysqli_next_result($conn);
										$result = mysqli_query($conn27,"CALL select_session_INST($_SESSION[id_p_inst])");	
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
				

						<!-- Four -->
						<section id="four" class="wrapper alt style1">
							<div class="inner" style="width: 100%; padding: 1%;">
							<div class="table-wraper" style="border-top: 10%" >
                                <form action="" method="post">
									<table>
										<tr>
											<h2>Kërko të dhënat e Raporteve për Shikim</h2>
										</tr>
										<tr>
											<td> 
												Shkruaj:
											</td>
											<td>
												<input type="text" name="term" placeholder="Emrin ose Emailin"/>
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
											<td><b>Emri</b></td>
											<td><b>Mbiemri</b></td>
											<td><b>Nr.Personal</b></td>
											<td><b>Datëlindja</b></td>
											<td><b>Telefoni</b></td>
											<td><b>Email-i</b></td>
											<td><b>Fjalëkalimi</b></td>
											<td><b>Foto</b></td>
											<td><b>Emri Fotos</b></td>
											<td><b>Shiko Diplomat</b></td>
											
										</tr>
										<?php
											if (!empty($_REQUEST['term'])) {
												$term = mysqli_real_escape_string
												($conn,$_REQUEST['term']);     
												$sql= mysqli_query ($conn28, "CALL zgjedhTermTeDiplomuarit('$term')"); 
											while($row = mysqli_fetch_array($sql)) { 		
													echo "<tr>";
													echo "<td>".$row['emri']."</td>";	
													echo "<td>".$row['mbiemri']."</td>";
													echo "<td>".$row['nr_personal']."</td>";
													echo "<td>".$row['datelindja']."</td>";	
													echo "<td>".$row['telefoni']."</td>";
													echo "<td>".$row['emaili']."</td>";
													echo "<td>".$row['fjalekalimi']."</td>";
													echo "<td><img src=data:image/jpeg;base64,".base64_encode($row['image'])." width='80'  height='100'/></td>";
													echo "<td>".$row['name']."</td>";	
													echo "<td><a href=\"detajet.php?id_p_dip=$row[id_p_dip]\" class='button primary'>
													Shiko Diplomat</a></td>";
													// echo "<td><a href=\"modifiko_profilin.php?id_p_dip=$row[id_p_dip]\" class='button primary'>
													// Modifiko</a></td>";
													// echo "<td><a href=\"deleteProfil.php?id_p_dip=$row[id_p_dip]\" 
													// onClick=\"return confirm('A jeni te sigurt se deshironi te fshini Profilin?')\" class='button primary' style='background-color:#F8033C';>Fshi</a></td></tr>";		

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