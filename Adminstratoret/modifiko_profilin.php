<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("check.php");	
?>
<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['modifiko_profilin']))
{	
	$id_p_dip = $_POST['id_p_dip'];
	
	$emri=$_POST['emri'];	
	$mbiemri=$_POST['mbiemri'];
    $nr_personal=$_POST['nr_personal'];	
    $datelindja=$_POST['datelindja'];	
	$telefoni=$_POST['telefoni'];
	$emaili=$_POST['emaili'];
	$fjalekalimi=$_POST['fjalekalimi'];


    $imgData = addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
	$name = $_FILES['userfile']['name'];
	$maxsize = 10000000; //set to approx 10 MB	// checking empty fields

	if(empty($emri) || empty($mbiemri) || empty($nr_personal) || empty($datelindja) || empty($telefoni) || empty($emaili)
    || empty($fjalekalimi) || empty($imgData)) {	
			
		if(empty($emri)) {
			echo "<font color='red'>Fusha 'Emri' eshte e pa plotesuar.</font><br/>";
		}
		
		if(empty($mbiemri)) {
			echo "<font color='red'>Fusha 'Mbiemri' eshte e pa plotesuar.</font><br/>";
		}
		
		if(empty($nr_personal)) {
			echo "<font color='red'>Fusha 'Nr.Personal' eshte e pa plotesuar.</font><br/>";
		}

		if(empty($datelindja)) {
			echo "<font color='red'>Fusha 'Datelindja' eshte e pa plotesuar.</font><br/>";
		}
		
		if(empty($telefoni)) {
			echo "<font color='red'>Fusha 'Telefoni' eshte e pa plotesuar.</font><br/>";
		}

		if(empty($emaili)) {
			echo "<font color='red'>Fusha 'Emaili' eshte e pa plotesuar.</font><br/>";
		}
		
		if(empty($fjalekalimi)) {
			echo "<font color='red'>Fusha 'Fjalekalimi' eshte e pa plotesuar.</font><br/>";
		}

		if(empty($imgData)) {
			echo "<font color='red'>Fusha 'Foto-ja' eshte e pa plotesuar.</font><br/>";
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
		
		mysqli_query($conn, "SET @p_id_p_dip=${id_p_dip}");
		mysqli_query($conn, "SET @p_emri='${emri}'");
		mysqli_query($conn, "SET @p_mbiemri='${mbiemri}'");
		mysqli_query($conn, "SET @p_nr_personal='${nr_personal}'");
		mysqli_query($conn, "SET @p_datelindja='${datelindja}'");
        mysqli_query($conn, "SET @p_telefoni='${telefoni}'");
		mysqli_query($conn, "SET @p_emaili='${emaili}'");
        mysqli_query($conn, "SET @p_fjalekalimi='${fjalekalimi}'");
		mysqli_query($conn, "SET @p_file='${imgData}'");
        mysqli_query($conn, "SET @p_name='${name}'");
		$result=mysqli_query($conn,"CALL modifikoProfilin(@p_id_p_dip,@p_emri,@p_mbiemri,@p_nr_personal,
        @p_datelindja,@p_telefoni,@p_emaili,@p_fjalekalimi,@p_file,@p_name)");
		//redirectig to the display ppassword. In our case, it is admin.php
		if($result)
		{
		//redirectig to the display pProgrami. In our case, it is admin.php
		header("Location:Ballina.php");
		}
		else{
		die("Coudn't execute update procedure!");
		}
		
		}
		}
      
		?>
		<?php
//getting uid from url
$id_p_dip = $_GET['id_p_dip'];

//selecting data associated with this particular uid
$result = mysqli_query($conn,"SELECT * from perdoruesit_dip WHERE id_p_dip=$id_p_dip");
while($res = mysqli_fetch_array($result))
{
	$emri = $res['emri'];
	$mbiemri = $res['mbiemri'];
	$emaili = $res['emaili'];
	$nr_personal = $res['nr_personal'];
    $datelindja = $res['datelindja'];
	$telefoni = $res['telefoni'];
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
		<title>Profili</title>
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
							<a href="#menu">Meny</a>
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
								
                                <h3 class="major">Profili</h3>
								<?php 
				$_SESSION["id_p_dip"] =  $row['id_p_dip'];
										mysqli_next_result($conn);
										$result = mysqli_query($conn,"SELECT * from perdoruesit_dip WHERE id_p_dip = " . $_SESSION["id_p_dip"]);	
										while($row=mysqli_fetch_array($result)){
											extract($row);
											if($result==null)
												mysqli_free_result($result);
											?>
							
										

								
								<br>
                                <form enctype="multipart/form-data" method="post" action="modifiko_profilin.php">
								

                                    <div class="row gtr-uniform">
									
									<div class="col-6 col-12-xsmall" style="float:right">
									<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" style="border-radius: 50%; margin-left: 33% "  width="150px" height="150px">'; ?>
									<?php } ?>	
									</div>
									
									

									<div class="col-6 col-12-xsmall">
										<label for="demo-name"  style="padding-top:10%">Ndrysho foton</label>
                                        <tr>
											<td><input type="hidden" name="MAX_FILE_SIZE" value="10000000" required/></td>
													<td><input name="userfile" type="file" required/></td>
											</tr>
										</div>
								

										

                                        <div class="col-6 col-12-xsmall" style="float:left; ">
                                            <label for="demo-name" >Emri</label>
                                            <input type="text" name="emri" id="demo-name" value="<?php echo $emri;?>" required/>
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Mbiemri</label>
                                            <input type="text" name="mbiemri" id="demo-name"value="<?php echo $mbiemri;?>" required/>
                                        </div>

										<div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Nr.Personal</label>
                                            <input type="text" name="nr_personal" id="demo-name" value="<?php echo $nr_personal;?>"required />
                                        </div>	
											
                                       
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-date">Datelindja</label>
                                            <input style="color: black;" type="date" name="datelindja" id="demo-date" value="<?php echo $datelindja;?>" required/>
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Telefoni</label>
                                            <input type="text" name="telefoni" id="demo-name" value="<?php echo $telefoni;?>" required/>
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-email">Emaili</label>
                                            <input type="email" name="emaili" id="demo-email" value="<?php echo $emaili;?>" required/>
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Fjalëkalimi </label>
                                            <input type="password" name="fjalekalimi" id="demo-name" value="<?php echo $fjalekalimi;?>" required/>
                                        </div>
										
                                        <div class="col-12">
                                        <input type="hidden" name="id_p_dip" value='<?php echo $_GET['id_p_dip'];?>' />
                                            <ul class="actions">
                                                <li><input type="submit" value="Modifiko" name="modifiko_profilin" class="primary" /></li>
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