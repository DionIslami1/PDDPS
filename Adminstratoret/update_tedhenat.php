<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("check.php");	
?>
<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update_tedhenat']))
{	
	$id_tedhenat = $_POST['id_tedhenat'];
	
	$emertimi1=$_POST['emertimi'];	
	$pershkrimi1=$_POST['pershkrimi'];
	$pamjafaqes1=$_POST['pamjafaqes'];
	// checking empty fields
	if(empty($pamjafaqes1)) {	
			
		if(empty($pamjafaqes1)) {
			echo "<font color='red'>Fusha 'Pamjafaqës' është e pa plotësuar.</font><br/>";
		}
    }
        // $result = mysqli_query($conn,"CALL selectEmail_Admin('$emaili')");
        // if(mysqli_num_rows($result) > 0){
        //     echo "<script>
        //      setTimeout(function(){
        //         window.location.href = 'updatePerdorues.php';
        //      }, 5000);
        //   </script>";
        //     echo"<br/><font color='red' style='padding: 10%;'>Ky Email egziston ne Platform. Ju lutem provoni nje Email tjeter</font>";	
                
        // } 
        else {	
		
		mysqli_query($conn30, "SET @p_id_tedhenat =${id_tedhenat}");
		mysqli_query($conn30, "SET @p_emertimi='${emertimi1}'");
		mysqli_query($conn30, "SET @p_pershkrimi='${pershkrimi1}'");
		mysqli_query($conn30, "SET @p_pamjafaqes='${pamjafaqes1}'");
		$result=mysqli_query($conn30,"CALL modifikoTedhena(@p_id_tedhenat,@p_emertimi,@p_pershkrimi,@p_pamjafaqes)");
		//redirectig to the display ppassword. In our case, it is admin.php
		if($result)
		{
		//redirectig to the display pProgrami. In our case, it is admin.php
		header("Location:modifikoTedhena.php");
		}
		else{
		die("Coudn't execute update procedure!");
		}
		
		}
		}
      
		?>
		<?php
//getting uid from url
$id_tedhenat = $_GET['id_tedhenat'];
//selecting data associated with this particular uid
$result = mysqli_query($conn30,"CALL selectId_teDhenat('$id_tedhenat')");
while($res = mysqli_fetch_array($result))
{
	$emertimi1 = $res['emertimi'];
	$pershkrimi1 = $res['pershkrimi'];
	$pamjafaqes1 = $res['pamjafaqes'];
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
		<title>Modifikimi i të Dhënave</title>
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
                                <h3 class="major">Modifikimi të Dhënave</h3>
                                <form method="post" action="update_tedhenat.php">
                                    <div class="row gtr-uniform">
                                        
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Titulli</label>
                                            <input type="text" name="emertimi" id="demo-name" value="<?php echo $emertimi1;?>" />
                                        </div>
										<div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Përshkrimi</label>
                                            <input type="text" name="pershkrimi" id="demo-name" value="<?php echo $pershkrimi1;?>"/>
                                        </div>

										<div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Pamjafaqës</label>
                                            <input type="text" name="pamjafaqes" id="demo-name" value="<?php echo $pamjafaqes1;?>"/>
                                        </div>
                                        
                                        <div class="col-12">
                                            <input type="hidden" name="id_tedhenat" value='<?php echo $_GET['id_tedhenat'];?>' />
                                            <ul class="actions">
                                                <li><input type="submit" value="Modifiko" name="update_tedhenat" class="primary" /></li>
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