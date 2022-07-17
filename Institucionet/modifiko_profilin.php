<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("check.php");	
?>
<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['modifiko_profilin']))
{	
	$id_p_inst = $_POST['id_p_inst'];
	
	$emri_institucionit=$_POST['emri_institucionit'];	
	$telefoni=$_POST['telefoni'];
	$emaili=$_POST['emaili'];
	$fjalekalimi=$_POST['fjalekalimi'];
    $shteti=$_POST['shteti'];


    $imgData = addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
	$name = $_FILES['userfile']['name'];
	$maxsize = 10000000; //set to approx 10 MB	// checking empty fields

	if(empty($emri_institucionit) || empty($telefoni) || empty($emaili) || empty($fjalekalimi) || empty($shteti)) {	
			
		if(empty($emri_institucionit)) {
			echo "<font color='red'>Fusha 'Emri i Instucionit' është e pa plotësuar.</font><br/>";
		}
		
		if(empty($telefoni)) {
			echo "<font color='red'>Fusha 'Telefoni' është e pa plotësuar.</font><br/>";
		}
		
		if(empty($emaili)) {
			echo "<font color='red'>Fusha 'Emaili' është e pa plotësuar.</font><br/>";
		}

		if(empty($fjalekalimi)) {
			echo "<font color='red'>Fusha 'Fjalëkalimi' është e pa plotësuar.</font><br/>";
		}
		
		if(empty($shteti)) {
			echo "<font color='red'>Fusha 'Shteti' është e pa plotësuar.</font><br/>";
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
		
		mysqli_query($conn26, "SET @p_id_p_inst=${id_p_inst}");
		mysqli_query($conn26, "SET @p_emri_institucionit='${emri_institucionit}'");
		mysqli_query($conn26, "SET @p_telefoni='${telefoni}'");
		mysqli_query($conn26, "SET @p_emaili='${emaili}'");
		mysqli_query($conn26, "SET @p_fjalekalimi='${fjalekalimi}'");
        mysqli_query($conn26, "SET @p_shteti='${shteti}'");
		mysqli_query($conn26, "SET @p_file='${imgData}'");
        mysqli_query($conn26, "SET @p_name='${name}'");
		$result=mysqli_query($conn26,"CALL modifikoProfilin_inst(@p_id_p_inst,@p_emri_institucionit,@p_telefoni,@p_emaili,
        @p_fjalekalimi,@p_shteti,@p_file,@p_name)");
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
$id_p_inst = $_GET['id_p_inst'];
$_SESSION["id_p_inst"] =  $row['id_p_inst'];

//selecting data associated with this particular uid
$result = mysqli_query($conn24,"CALL select_session_INST($_SESSION[id_p_inst])");
while($res = mysqli_fetch_array($result))
{
	$emri_institucionit = $res['emri_institucionit'];
	$telefoni = $res['telefoni'];
	$emaili = $res['emaili'];
	$fjalekalimi = $res['fjalekalimi'];
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
		<title>Profili</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
										mysqli_next_result($conn25);
										$result = mysqli_query($conn25,"CALL select_session_INST($_SESSION[id_p_inst])");	
										while($row=mysqli_fetch_array($result)){
											extract($row);
											if($result==null)
												mysqli_free_result($result);
											?>
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
				
							<div class="inner">
								
                                <h3 class="major">Profili</h3>
								
								<br>
                                <form enctype="multipart/form-data" method="post" action="modifiko_profilin.php">
								

                                    <div class="row gtr-uniform">
									
									<div class="col-6 col-12-xsmall" style="float:right">
									<form>
									<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" id="frame" style="border-radius: 50%; margin-left: 33% "  width="150px" height="150px">'; ?>
									<?php } ?>	
	
									</div>
							

									<div class="col-6 col-12-xsmall">
										<label for="demo-name"  style="padding-top:10%">Ndrysho foton</label>
                                        <tr>
											<td><input type="hidden" name="MAX_FILE_SIZE" value="10000000" /></td>
													<td><input name="userfile" type="file" onchange="preview()" required></td>
											</tr>
											<script>
    function preview() {
     $('#frame').attr('src',URL.createObjectURL(event.target.files[0]));
    }
    </script>
	

										</div>
										</form>  
		
										

                                        <div class="col-6 col-12-xsmall" style="float:left; ">
                                            <label for="demo-name" >Emri Institucionit</label>
                                            <input type="text" name="emri_institucionit" id="demo-name" value="<?php echo $emri_institucionit;?>" required/>
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Telefoni</label>
                                            <input type="text" name="telefoni" id="demo-name"value="<?php echo $telefoni;?>" required/>
                                        </div>

										<div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Emaili</label>
                                            <input type="email" name="emaili" id="demo-name" value="<?php echo $emaili;?>"required />
                                        </div>	
                                       
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-date">Fjalëkalimi</label>
                                            <input type="password" name="fjalekalimi" id="demo-date" value="<?php echo $fjalekalimi;?>" required/>
                                        </div>
                                        <div class="col-6 col-12-xsmall">
                                            <label for="demo-name">Shteti</label>
                                            <input type="text" name="shteti" id="demo-name" value="<?php echo $shteti;?>" required/>
                                        </div>
										
                                        <div class="col-12">
                                        <input type="hidden" name="id_p_inst" value='<?php echo $_GET['id_p_inst'];?>' />
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