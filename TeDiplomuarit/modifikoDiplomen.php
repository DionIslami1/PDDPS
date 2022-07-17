<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("check.php");	
?>

<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['modifikoDiplomen']))
{	
	$id_edu = $_POST['id_edu'];
	$id_niveli = $_POST['id_niveli'];
	$id_titulli = $_POST['id_titulli'];
	$universiteti= $_POST['universiteti'];
	$fakulteti = $_POST['fakulteti'];	
	$programi_studimor = $_POST['programi_studimor'];
	$titulli_i_temes_se_diplomes = $_POST['titulli_i_temes_se_diplomes'];
	$data_regjistrimit = $_POST['data_regjistrimit'];
	$data_perfundimit = $_POST['data_perfundimit'];
	$data_diplomimit = $_POST['data_diplomimit'];	
	$nr_i_kredive_ects = $_POST['nr_i_kredive_ects'];
	$nota_mesatare = $_POST['nota_mesatare'];
	$nr_i_diplomes = $_POST['nr_i_diplomes'];
	$shteti = $_POST['shteti'];
	
	// checking empty fields
	if(empty($id_niveli) || empty($id_titulli) || empty($universiteti) || empty($fakulteti) || empty($programi_studimor) || empty($titulli_i_temes_se_diplomes) || empty($data_regjistrimit)
	|| empty($data_perfundimit) || empty($data_diplomimit) || empty($nr_i_kredive_ects) || empty($nota_mesatare) || empty($nr_i_diplomes) || empty($shteti)) {	
			
		if(empty($id_niveli)) {
			echo "<font color='red'>Fusha Niveli është e zbrazët. </font><br/>";
		}
		
		if(empty($id_titulli)) {
			echo "<font color='red'>Fusha Titulli është e zbrazët.</font><br/>";
		}
		
		if(empty($universiteti)) {
			echo "<font color='red'>Fusha Universiteti është e zbrazët.</font><br/>";
		}
		if(empty($fakulteti)) {
			echo "<font color='red'>Fusha Fakulteti është e zbrazët.</font><br/>";
		}	
		if(empty($programi_studimor)) {
			echo "<font color='red'>Fusha Programi Studimor është e zbrazët. </font><br/>";
		}
		
		if(empty($titulli_i_temes_se_diplomes)) {
			echo "<font color='red'>Fusha Tema e Diplomes është e zbrazët.</font><br/>";
		}
		
		if(empty($data_regjistrimit)) {
			echo "<font color='red'>Fusha Data Regjistrimit është e zbrazët.</font><br/>";
		}
		if(empty($data_perfundimit)) {
			echo "<font color='red'>Fusha Data Perfundimit është e zbrazët.</font><br/>";
		}
		if(empty($data_diplomimit)) {
			echo "<font color='red'>Fusha Data Diplomimit është e zbrazët. </font><br/>";
		}
		
		if(empty($nr_i_kredive_ects)) {
			echo "<font color='red'>Fusha Numri i Kredive ECTS është e zbrazët.</font><br/>";
		}
		
		if(empty($nota_mesatare)) {
			echo "<font color='red'>Fusha Nota Mesatare është e zbrazët.</font><br/>";
		}
		if(empty($nr_i_diplomes)) {
			echo "<font color='red'>Fusha Numri i diplomes është e zbrazët.</font><br/>";
		}
		if(empty($shteti)) {
			echo "<font color='red'>Fusha Shteti është e zbrazët.</font><br/>";
		}		
	} else {	
		//updating the table
		mysqli_query($conn30, "SET @p_id_edu=${id_edu}");
		mysqli_query($conn30, "SET @p_id_niveli='${id_niveli}'");
		mysqli_query($conn30, "SET @p_id_titulli='${id_titulli}'");
		mysqli_query($conn30, "SET @p_universiteti='${universiteti}'");
		mysqli_query($conn30, "SET @p_fakulteti='${fakulteti}'");
        mysqli_query($conn30, "SET @p_programi_studimor='${programi_studimor}'");
		mysqli_query($conn30, "SET @p_titulli_i_temes_se_diplomes='${titulli_i_temes_se_diplomes}'");
        mysqli_query($conn30, "SET @p_data_regjistrimit='${data_regjistrimit}'");
		mysqli_query($conn30, "SET @p_data_perfundimit='${data_perfundimit}'");
		mysqli_query($conn30, "SET @p_data_diplomimit='${data_diplomimit}'");
		mysqli_query($conn30, "SET @p_nr_i_kredive_ects='${nr_i_kredive_ects}'");
		mysqli_query($conn30, "SET @p_nota_mesatare='${nota_mesatare}'");
		mysqli_query($conn30, "SET @p_nr_i_diplomes='${nr_i_diplomes}'");
        mysqli_query($conn30, "SET @p_shteti='${shteti}'");
		$result=mysqli_query($conn30,"CALL modifiko_Diplome(@p_id_edu,@p_id_niveli,@p_id_titulli,@p_universiteti,
        @p_fakulteti,@p_programi_studimor,@p_titulli_i_temes_se_diplomes,@p_data_regjistrimit,@p_data_perfundimit,@p_data_diplomimit
		,@p_nr_i_kredive_ects,@p_nota_mesatare,@p_nr_i_diplomes,@p_shteti)");
		
		//redirectig to the display message. In our case, it is ballina.php
		header("Location: Ballina.php");
	}
}
?>
<?php
//getting ID_Studenti from url
$id_edu = $_GET['id_edu'];

//selecting data associated with this particular ID_Studenti
$result = mysqli_query($conn33,"CALL selectID_edukimi('$id_edu')");



while($res = mysqli_fetch_array($result))
{
	$id_niveli = $res['id_niveli'];
	$id_titulli = $res['id_titulli'];
	$universiteti = $res['universiteti'];
	$fakulteti = $res['fakulteti'];
	$programi_studimor = $res['programi_studimor'];
	$titulli_i_temes_se_diplomes = $res['titulli_i_temes_se_diplomes'];
	$data_regjistrimit = $res['data_regjistrimit'];
	$data_perfundimit1 = $res['data_perfundimit'];
	$data_diplomimit = $res['data_diplomimit'];
	$nr_i_kredive_ects = $res['nr_i_kredive_ects'];
	$nota_mesatare = $res['nota_mesatare'];
	$nr_i_diplomes = $res['nr_i_diplomes'];
	$shteti = $res['shteti'];
	
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
		<title>Modifikimi Diplomave</title>
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
				$_SESSION["id_p_dip"] =  $row['id_p_dip'];
										mysqli_next_result($conn34);
										$result = mysqli_query($conn34,"CALL select_session_DIP($_SESSION[id_p_dip])");	
										while($row=mysqli_fetch_array($result)){
											extract($row);
											if($result==null)
												mysqli_free_result($result);
											?>
					<?php 
				$_SESSION["id_p_dip"] =  $row['id_p_dip'];
										mysqli_next_result($conn35);
										$result = mysqli_query($conn35,"CALL select_session_DIP($_SESSION[id_p_dip])");	
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
							<div class="inner">
                                <h3 class="major">Shtimi Diplomave</h3>
                                <form enctype="multipart/form-data" method="post" action="modifikoDiplomen.php">
                                    <div class="row gtr-uniform">
                                        
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Zgjedh Nivelin </label>
											<select name="id_niveli" required>
													<option selected="selected"></option>
														<?php
														$res=mysqli_query($conn36,"CALL select_nivelet()");
														while($row=$res->fetch_array())
														{
															?>
															<option value="<?php echo $row['id_niveli']; ?>"><?php echo $row['niveli']; ?></option>
															<?php
														}
														?>
												</select>
                                        </div>
										<div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Zgjedh Titullin</label>
											<select name="id_titulli" required>
													<option selected="selected"></option>
														<?php
														$res=mysqli_query($conn37,"CALL select_titujt()");
														while($row=$res->fetch_array())
														{
															?>
															<option value="<?php echo $row['id_titulli']; ?>"><?php echo $row['titulli']; ?></option>
															<?php
														}
														?>
												</select>
                                        </div>
										<div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Universiteti</label>
                                            <input type="text" name="universiteti" id="demo-name"  value="<?php echo $universiteti;?>" required/>
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Fakulteti </label>
                                            <input type="text" name="fakulteti" id="demo-name" value="<?php echo $fakulteti;?>" required/>
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Programi Studimor </label>
                                            <input type="text" name="programi_studimor" id="demo-name" value="<?php echo $programi_studimor;?>" required/>
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Tema e Diplomës </label>
                                            <input  type="text" name="titulli_i_temes_se_diplomes" id="demo-name" value="<?php echo $titulli_i_temes_se_diplomes;?>" required/>
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-date">Data Regjistrimit</label>
                                            <input type="date"style="color: black;" name="data_regjistrimit" id="demo-date" value="<?php echo $data_regjistrimit;?>" required/>
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-date">Data Përfundimit</label>
                                            <input type="date"style="color: black;" name="data_perfundimit" id="demo-date" value="<?php echo $data_perfundimit1;?>" required/>
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-date">Data Diplomimit</label>
                                            <input type="date" style="color: black;" name="data_diplomimit" id="demo-date" value="<?php echo $data_diplomimit;?>" required/>
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Nr i kredive (ECTS)  </label>
                                            <input type="text" name="nr_i_kredive_ects" id="demo-name" value="<?php echo $nr_i_kredive_ects;?>" required/>
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Nota Mesatare</label>
                                            <input type="text" name="nota_mesatare" id="demo-name" value="<?php echo $nota_mesatare;?>" required/>
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Nr i Diplomës </label>
                                            <input type="text" name="nr_i_diplomes" id="demo-name" value="<?php echo $nr_i_diplomes;?>" required/>
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Shteti </label>
                                            <input type="text" name="shteti" id="demo-name" value="<?php echo $shteti;?>" required/>
											<input type="hidden" name="id_p_dip" value='<?php echo $id_p_dip;?>' />


                                        </div>
										                                       
                                        <div class="col-12">
										<input type="hidden" name="id_edu" value='<?php echo $_GET['id_edu'];?>' />
                                            <ul class="actions">
                                                <li><input type="submit" name="modifikoDiplomen" value="Modifiko" class="primary" /></li>
                                            </ul>
                                        </div>
                                    </div>
                                </form>
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