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
    || empty($fjalekalimi)) {	
			
		if(empty($emri)) {
			echo "<font color='red'>Fusha 'Emri' është e pa plotësuar.</font><br/>";
		}
		
		if(empty($mbiemri)) {
			echo "<font color='red'>Fusha 'Mbiemri' është e pa plotësuar.</font><br/>";
		}
		
		if(empty($nr_personal)) {
			echo "<font color='red'>Fusha 'Nr.Personal' është e pa plotësuar.</font><br/>";
		}

		if(empty($datelindja)) {
			echo "<font color='red'>Fusha 'Datëlindja' është e pa plotësuar.</font><br/>";
		}
		
		if(empty($telefoni)) {
			echo "<font color='red'>Fusha 'Telefoni' është e pa plotësuar.</font><br/>";
		}

		if(empty($emaili)) {
			echo "<font color='red'>Fusha 'Email-i' është e pa plotësuar.</font><br/>";
		}
		
		if(empty($fjalekalimi)) {
			echo "<font color='red'>Fusha 'Fjalëkalimi' është e pa plotësuar.</font><br/>";
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
$result = mysqli_query($conn28,"CALL zgjedhDiplomen_Raporti('$id_p_dip')");
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
		<title>Raporti</title>
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
								
                                <h3 class="major">Raportet</h3>
								<fieldset style="border: solid 3px rgba(255, 255, 255, 0.125);">
								<legend style="margin-left:3%; "></b>Profili</b></legend>
								<?php 
										mysqli_next_result($conn);
										$result = mysqli_query($conn,"CALL zgjedhDiplomen_Raporti('$id_p_dip')");	
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
										<label for="demo-name"  style="padding-top:10%"> </label>
                                        <tr>
											<td><input type="hidden" name="MAX_FILE_SIZE" value="10000000" /></td>
													<td><input type="hidden" name="userfile" type="file" /></td>
											</tr>
										</div>
								

										

										<div class="col-6 col-12-xsmall" style="float:left;padding-left: 4%;  ">
                                            <label for="demo-name" >Emri</label>
                                            <input type="text" name="emri" id="demo-name" value="<?php echo $emri;?>"  disabled/>
                                        </div>
										<div class="col-6 col-12-xsmall" style="float:left;padding-right: 1%;  ">
                                            <label for="demo-name">Mbiemri</label>
                                            <input type="text" name="mbiemri" id="demo-name"value="<?php echo $mbiemri;?>"  disabled/>
                                        </div>

										<div class="col-6 col-12-xsmall" style="float:left;padding-left: 4%;  ">
                                            <label for="demo-name">Nr.Personal</label>
                                            <input type="text" name="nr_personal" id="demo-name" value="<?php echo $nr_personal;?>" disabled />
                                        </div>	
											
                                       
										<div class="col-6 col-12-xsmall" style="float:left;padding-right: 4%;  ">
                                            <label for="demo-date">Datëlindja</label>
                                            <input style="color: black;" type="date" name="datelindja" id="demo-date" value="<?php echo $datelindja;?>"  disabled/>
                                        </div>
										<div class="col-6 col-12-xsmall" style="float:left;padding-left: 4%;  ">
                                            <label for="demo-name">Telefoni</label>
                                            <input type="text" name="telefoni" id="demo-name" value="<?php echo $telefoni;?>"  disabled/>
                                        </div>
										<div class="col-6 col-12-xsmall" style="float:left;padding-right: 1%;  ">
                                            <label for="demo-email">Email-i</label>
                                            <input type="email" name="emaili" id="demo-email" value="<?php echo $emaili;?>"  disabled/>
                                        </div>
							
                                    </div>
									
                                </form>
								</fieldset>
						</div>


							<div class="inner">
                                <h3 class="major">Diplomat</h3>
										<?php
																	$result = mysqli_query($conn27, "CALL zgjedh_leftouterjoin_Raporti('$id_p_dip')");
																	while ($row = mysqli_fetch_assoc($result)) {

																	extract($row);
																	
																	
														if($result==null)
														mysqli_free_result($result);

										?>


								<fieldset style="border: solid 3px rgba(255, 255, 255, 0.125);">
								<legend style="margin-left:3%; ">Niveli i Diplomës: <?php echo $niveli?></legend>
                                <form enctype="multipart/form-data" method="post" action="addDiplome.php">
                                    <div class="row gtr-uniform">
                                        
									<div class="col-6 col-12-xsmall" style="float:left;padding-left: 4%;  ">
                                            <label for="demo-name">Nivelin </label>
											<input type="text" name="niveli" id="demo-name" value="<?php echo $niveli;?>"  disabled/>
                                        </div>
										<div class="col-6 col-12-xsmall" style="float:left;padding-right: 1%;  " >
                                            <label for="demo-name">Zgjedh Titullin </label>
											<input type="text" name="niveli" id="demo-name" value="<?php echo $titulli;?>"  disabled/>
                                        </div>
										<div class="col-6 col-12-xsmall" style="float:left;padding-left: 4%;  ">
                                            <label for="demo-name">Universiteti </label>
                                            <input type="text" name="universiteti" id="demo-name" value="<?php echo $universiteti;?>"  disabled/>
                                        </div>
										<div class="col-6 col-12-xsmall" style="float:left;padding-right: 1%;  ">
                                            <label for="demo-name">Fakulteti </label>
                                            <input type="text" name="fakulteti" id="demo-name"value="<?php echo $fakulteti;?>"  disabled/>
                                        </div>
                                        <div class="col-6 col-12-xsmall" style="float:left;padding-left: 4%;  ">
                                            <label for="demo-name">Programi studimor </label>
                                            <input type="text" name="programi_studimor" id="demo-name" value="<?php echo $programi_studimor;?>"  disabled/>
                                        </div>
										<div class="col-6 col-12-xsmall" style="float:left;padding-right: 1%;  ">
                                            <label for="demo-name">Tema e Diplomës </label>
                                            <input  type="text" name="titulli_i_temes_se_diplomes" id="demo-name" value="<?php echo $titulli_i_temes_se_diplomes;?>"  disabled/>
                                        </div>
										<div class="col-6 col-12-xsmall" style="float:left;padding-left: 4%;  ">
                                            <label for="demo-date">Data regjistrimit  </label>
                                            <input type="date"style="color: black;" name="data_regjistrimit" id="demo-date" value="<?php echo $data_regjistrimit;?>"  disabled/>
                                        </div>
										<div class="col-6 col-12-xsmall" style="float:left;padding-right: 1%;  ">
                                            <label for="demo-date">Data përfundimit </label>
                                            <input type="date"style="color: black;" name="data_perfundimit" id="demo-date" value="<?php echo $data_perfundimit;?>"  disabled/>
                                        </div>
										<div class="col-6 col-12-xsmall" style="float:left;padding-left: 4%;  ">
                                            <label for="demo-date">Data Diplomimit  </label>
                                            <input type="date" style="color: black;" name="data_diplomimit" id="demo-date" value="<?php echo $data_diplomimit;?>"  disabled/>
                                        </div>
										<div class="col-6 col-12-xsmall" style="float:left;padding-right: 1%;  ">
                                            <label for="demo-name">Nr i kredive (ECTS)  </label>
                                            <input type="text" name="nr_i_kredive_ects" id="demo-name" value="<?php echo $nr_i_kredive_ects;?>"  disabled/>
                                        </div>
										<div class="col-6 col-12-xsmall" style="float:left;padding-left: 4%;  ">
                                            <label for="demo-name">Nota mesatare  </label>
                                            <input type="text" name="nota_mesatare" id="demo-name" value="<?php echo $nota_mesatare;?>"  disabled/>
                                        </div>
										<div class="col-6 col-12-xsmall" style="float:left;padding-right: 1%;  ">
                                            <label for="demo-name">Nr i diplomës   </label>
                                            <input type="text" name="nr_i_diplomes" id="demo-name" value="<?php echo $nr_i_diplomes;?>"  disabled/>
                                        </div>
										<div class="col-6 col-12-xsmall" style="float:left;padding-left: 4%;  ">
                                            <label for="demo-name">Shteti </label>
                                            <input type="text" name="shteti" id="demo-name" value="<?php echo $shteti;?>"  disabled/>
                                        </div>
										                                       
                                        <!-- <div class="col-12">
                                            <ul class="actions">
                                                <li><input type="submit" name="addDiplome" value="Shto" class="primary" /></li>
                                            </ul>
                                        </div> -->
                                    </div>
                                </form>
								</fieldset>
								<br>
								<br>
								<?php } ?>
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