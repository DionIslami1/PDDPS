<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("check.php");	
?>
<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['updateTitujt']))
{	
	$id_titulli = $_POST['id_titulli'];
	
	$titulli=$_POST['titulli'];	
	// checking empty fields
	if(empty($titulli)) {	
			
		if(empty($titulli)) {
			echo "<font color='red'>Fusha 'Titulli' eshte e pa plotesuar.</font><br/>";
		}
    }
        else {	
		
		mysqli_query($conn32, "SET @p_id_titulli=${id_titulli}");
		mysqli_query($conn32, "SET @p_titulli='${titulli}'");
		$result=mysqli_query($conn32,"CALL modifiko_Titujt(@p_id_titulli,@p_titulli)");
		//redirectig to the display ppassword. In our case, it is admin.php
		if($result)
		{
		//redirectig to the display pProgrami. In our case, it is admin.php
		header("Location:modifiko_titujt.php");
		}
		else{
		die("Coudn't execute update procedure!");
		}
		
		}
		}
      
		?>
		<?php
//getting uid from url
$id_titulli = $_GET['id_titulli'];
//selecting data associated with this particular uid
$result = mysqli_query($conn32,"CALL selectId_titulli('$id_titulli')");
while($res = mysqli_fetch_array($result))
{
	$titulli = $res['titulli'];
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
		<title>Modifikimi i Titujve</title>
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
                                <h3 class="major">Modifikimi i Titujve</h3>
                                <form method="post" action="updateTitujt.php">
                                    <div class="row gtr-uniform">
                                        
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Titulli</label>
                                            <input type="text" name="titulli" id="demo-name" value="<?php echo $titulli;?>" required/>
                                        </div>
                                        <div class="col-12">
                                            <input type="hidden" name="id_titulli" value='<?php echo $_GET['id_titulli'];?>' />
                                            <ul class="actions">
                                                <li><input type="submit" value="Modifiko" name="updateTitujt" class="primary" /></li>
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