
<html>
<head>
	<title>Shto Diplomë</title>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['addDiplome'])) {	
	$id_niveli = $_POST['id_niveli'];
	$id_titulli = $_POST['id_titulli'];
	$universiteti = $_POST['universiteti'];
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

	$id_p_dip = $_POST['id_p_dip'];
	
	// checking empty fields
	if (empty($id_niveli) || empty($id_titulli) || empty($universiteti) || empty($fakulteti) || empty($programi_studimor) || empty($titulli_i_temes_se_diplomes)
    || empty($data_regjistrimit) || empty($data_perfundimit) || empty($data_diplomimit)
    || empty($nr_i_kredive_ects) || empty($nota_mesatare) || empty($nr_i_diplomes) || empty($shteti)) {
				
		if(empty($id_niveli)) {
			echo "<font color='red'>Fusha Zgjedh Niveli është e zbrazët</font><br/>";
		}
		if(empty($id_titulli)) {
			echo "<font color='red'>Fusha Zgjedh Titullin është e zbrazët</font><br/>";
		}
		if(empty($universiteti)) {
			echo "<font color='red'>Fusha Universiteti është e zbrazët</font><br/>";
		}
		
		if(empty($fakulteti)) {
			echo "<font color='red'>Fusha Fakulteti është e zbrazët.</font><br/>";
		}
		
		if(empty($programi_studimor)) {
			echo "<font color='red'>Fusha Programi Studimor është e zbrazët.</font><br/>";
		}
		if(empty($titulli_i_temes_se_diplomes)) {
			echo "<font color='red'>Fusha Titulli i Temës së Diplomës është e zbrazët.</font><br/>";
		}
        if(empty($data_regjistrimit)) {
			echo "<font color='red'>Fusha Data Regjistrimit është e zbrazët.</font><br/>";
		}
		
		if(empty($data_perfundimit)) {
			echo "<font color='red'>Fusha Data Përfundimit është e zbrazët.</font><br/>";
		}
		
		if(empty($data_diplomimit)) {
			echo "<font color='red'>Fusha Data Diplomimit është e zbrazët.</font><br/>";
		}
		if(empty($nr_i_kredive_ects)) {
			echo "<font color='red'>Fusha Nr i Kredive ECTS është e zbrazët.</font><br/>";
		}
        if(empty($nota_mesatare)) {
			echo "<font color='red'>Fusha Nota Mesatare është e zbrazët.</font><br/>";
		}
		
		if(empty($nr_i_diplomes)) {
			echo "<font color='red'>Fusha Nr i Diplomes është e zbrazët.</font><br/>";
		}
		
		if(empty($shteti)) {
			echo "<font color='red'>Fusha Shteti është e zbrazët.</font><br/>";
		}
		
		//link to the previous pMbiemri
		echo "<br/><a href='javascript:self.history.back();'>Kthehu Mbrapa</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($conn20, "CALL addDiplom ('$id_niveli','$id_titulli','$universiteti','$fakulteti','$programi_studimor','$titulli_i_temes_se_diplomes',
		'$data_regjistrimit','$data_perfundimit','$data_diplomimit','$nr_i_kredive_ects','$nota_mesatare','$nr_i_diplomes','$shteti','$id_p_dip')");
		
		//display success message
			echo "<script>
         setTimeout(function(){
            window.location.href = 'ballina.php';
         }, 5000);
      </script>";
		 echo"<p><b>   E dhëna është duke u regjistruar në sistem. Ju lutem pritni 5 sekonda. <b></p>";
		 
		//echo "<font color='green'>Data added successfully.";
		//echo "<br/><a href='ballina.php'>View Result</a>";
	}
}
?>
</body>
</html>
