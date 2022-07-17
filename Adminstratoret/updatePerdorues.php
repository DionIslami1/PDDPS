<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("check.php");	
?>
<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['updatePerdorues']))
{	
	$id_p_adm = $_POST['id_p_adm'];
	
	$emri=$_POST['emri'];	
	$mbiemri=$_POST['mbiemri'];
	$emaili=$_POST['emaili'];
	$fjalekalimi=$_POST['fjalekalimi'];
	// checking empty fields
	if(empty($emri) || empty($mbiemri) || empty($emaili) || empty($fjalekalimi)) {	
			
		if(empty($emri)) {
			echo "<font color='red'>Fusha 'Emri' eshte e pa plotesuar.</font><br/>";
		}
		
		if(empty($mbiemri)) {
			echo "<font color='red'>Fusha 'Mbiemri' eshte e pa plotesuar.</font><br/>";
		}
		
		if(empty($emaili)) {
			echo "<font color='red'>Fusha 'Emaili' eshte e pa plotesuar.</font><br/>";
		}

		if(empty($fjalekalimi)) {
			echo "<font color='red'>Fusha 'Fjalekalimi' eshte e pa plotesuar.</font><br/>";
		}
    }
        else {	
		
		mysqli_query($conn32, "SET @p_id_p_adm=${id_p_adm}");
		mysqli_query($conn32, "SET @p_emri='${emri}'");
		mysqli_query($conn32, "SET @p_mbiemri='${mbiemri}'");
		mysqli_query($conn32, "SET @p_emaili='${emaili}'");
		mysqli_query($conn32, "SET @p_fjalekalimi='${fjalekalimi}'");
		$result=mysqli_query($conn32,"CALL modifikoPerdorues(@p_id_p_adm,@p_emri,@p_mbiemri,@p_emaili,@p_fjalekalimi)");
		//redirectig to the display ppassword. In our case, it is admin.php
		if($result)
		{
		//redirectig to the display pProgrami. In our case, it is admin.php
		header("Location:modifikoPerdorues.php");
		}
		else{
		die("Coudn't execute update procedure!");
		}
		
		}
		}
      
		?>
		<?php
//getting uid from url
$id_p_adm = $_GET['id_p_adm'];
//selecting data associated with this particular uid
$result = mysqli_query($conn32,"CALL selectID_Perdoruesit('$id_p_adm')");
while($res = mysqli_fetch_array($result))
{
	$emri = $res['emri'];
	$mbiemri = $res['mbiemri'];
	$emaili = $res['emaili'];
	$fjalekalimi = $res['fjalekalimi'];
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
		<title>Modifikimi i Përdoruesve</title>
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
                                <h3 class="major">Modifikimi i Përdoruesve</h3>
                                <form method="post" action="updatePerdorues.php">
                                    <div class="row gtr-uniform">
                                        
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Emri </label>
                                            <input type="text" name="emri" id="demo-name" value="<?php echo $emri;?>" required/>
                                        </div>
										<div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Mbiemri </label>
                                            <input type="text" name="mbiemri" id="demo-name" value="<?php echo $mbiemri;?>" required/>
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-email">Email-i </label>
                                            <input type="email" name="emaili" id="demo-email" value="<?php echo $emaili;?>" required/>
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Fjalëkalimi </label>
                                            <input type="password" name="fjalekalimi" id="demo-name" value="<?php echo $fjalekalimi;?>" required/>
                                        </div>
                                        <div class="col-12">
                                            <input type="hidden" name="id_p_adm" value='<?php echo $_GET['id_p_adm'];?>' />
                                            <ul class="actions">
                                                <li><input type="submit" value="Modifiko" name="updatePerdorues" class="primary" /></li>
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