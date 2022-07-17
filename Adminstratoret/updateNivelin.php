<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("check.php");	
?>
<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['updateNivelin']))
{	
	$id_niveli = $_POST['id_niveli'];
	
	$niveli=$_POST['niveli'];	
	// checking empty fields
	if(empty($niveli)) {	
			
		if(empty($niveli)) {
			echo "<font color='red'>Fusha 'Niveli' eshte e pa plotesuar.</font><br/>";
		}
    }
        else {	
		
		mysqli_query($conn32, "SET @p_id_niveli=${id_niveli}");
		mysqli_query($conn32, "SET @p_niveli='${niveli}'");
		$result=mysqli_query($conn32,"CALL modifikoNivelet(@p_id_niveli,@p_niveli)");
		//redirectig to the display ppassword. In our case, it is admin.php
		if($result)
		{
		//redirectig to the display pProgrami. In our case, it is admin.php
		header("Location:modifiko_nivele.php");
		}
		else{
		die("Coudn't execute update procedure!");
		}
		
		}
		}
      
		?>
		<?php
//getting uid from url
$id_niveli = $_GET['id_niveli'];
//selecting data associated with this particular uid
$result = mysqli_query($conn32,"CALL selectID_nivelet('$id_niveli')");
while($res = mysqli_fetch_array($result))
{
	$niveli = $res['niveli'];
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
		<title>Modifikimi i Nivelit</title>
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
                                <h3 class="major">Modifikimi i Nivelit</h3>
                                <form method="post" action="updateNivelin.php">
                                    <div class="row gtr-uniform">
                                        
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Niveli</label>
                                            <input type="text" name="niveli" id="demo-name" value="<?php echo $niveli;?>" required/>
                                        </div>
                                        <div class="col-12">
                                            <input type="hidden" name="id_niveli" value='<?php echo $_GET['id_niveli'];?>' />
                                            <ul class="actions">
                                                <li><input type="submit" value="Modifiko" name="updateNivelin" class="primary" /></li>
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