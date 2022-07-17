<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("check.php");	
?>
<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['updateMenyte']))
{	
	$id_m = $_POST['id_m'];
	
	$Emri=$_POST['Emri'];	
	$Modul=$_POST['Modul'];
	// checking empty fields
	if(empty($Emri)) {	
			
		if(empty($Emri)) {
			echo "<font color='red'>Fusha 'Emri' eshte e pa plotesuar.</font><br/>";
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
		
		mysqli_query($conn32, "SET @p_id_m =${id_m}");
		mysqli_query($conn32, "SET @p_Emri='${Emri}'");
		mysqli_query($conn32, "SET @p_Modul='${Modul}'");
		$result=mysqli_query($conn32,"CALL modifikoMeny(@p_id_m,@p_Emri,@p_Modul)");
		//redirectig to the display ppassword. In our case, it is admin.php
		if($result)
		{
		//redirectig to the display pProgrami. In our case, it is admin.php
		header("Location:modifikoMeny.php");
		}
		else{
		die("Coudn't execute update procedure!");
		}
		
		}
		}
      
		?>
		<?php
//getting uid from url
$p_id_m = $_GET['id_m'];
$result = mysqli_query($conn33,"CALL selectID_Menyte('$p_id_m')");
while($res = mysqli_fetch_array($result))
{
	$Emri_1 = $res['Emri'];
	$Modul_1 = $res['Modul'];
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
		<title>Modifikimi i Menyve</title>
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
                                <h3 class="major">Modifikimi i Menyve</h3>
                                <form method="post" action="updateMenyte.php">
                                    <div class="row gtr-uniform">
                                        
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Emri</label>
                                            <input type="text" name="Emri" id="demo-name" value="<?php echo $Emri_1;?>" />
                                        </div>
										<div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Moduli</label>
                                            <input type="text" name="Modul" id="demo-name" value="<?php echo $Modul_1;?>"/>
                                        </div>
                                        
                                        <div class="col-12">
                                            <input type="hidden" name="id_m" value='<?php echo $_GET['id_m'];?>' />
                                            <ul class="actions">
                                                <li><input type="submit" value="Modifiko" name="updateMenyte" class="primary" /></li>
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