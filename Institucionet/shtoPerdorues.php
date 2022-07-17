<html>
<head>
	<title>Regjistrimi</title>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<body>
<?php
//including the database connection file
include_once("config.php");
if(isset($_POST['shtoPerdorues'])) {	
	$emri_institucionit = $_POST['emri_institucionit'];
	$telefoni = $_POST['telefoni'];
	$emaili = $_POST['emaili'];
    $fjalekalimi = $_POST['fjalekalimi'];
	$shteti = $_POST['shteti'];
		
	// checking empty fields
	if(empty($emri_institucionit) || empty($telefoni) || empty($emaili) || empty($fjalekalimi) || empty($shteti)) {			
		if(empty($emri_institucionit)) {echo "<font color='red'>Fusha Emri Institucionit është e zbrazët.</font><br/>";}
		if(empty($telefoni)) {echo "<font color='red'>Fusha Telefoni është e zbrazët.</font><br/>";}
		if(empty($emaili)) {echo "<font color='red'>Fusha Emaili është e zbrazët.</font><br/>";}
        if(empty($fjalekalimi)) {echo "<font color='red'>Fusha Fjalëkalimi është e zbrazët.</font><br/>";}
		if(empty($shteti)) {echo "<font color='red'>Fusha Shteti është e zbrazët.</font><br/>";}
		//link to the previous programi
		echo "<br/><a href='javascript:self.history.back();'>Kthehu Mbrapa</a>";
	}
	$result = mysqli_query($conn30,"CALL selectEmail_INST('$emaili')");
	if(mysqli_num_rows($result) > 0){
		echo "<script>
         setTimeout(function(){
            window.location.href = 'Regjistrohu.php';
         }, 5000);
      </script>";
		echo"<br/><font color='red' style='padding: 10%;'>Ky Email egziston në Platform. Ju lutem provoni një Email tjetër, pas 5 sekondave</font>";	
			
	}else { 
		// if all the fields are filled (not empty) 
		//insert data to database	
		$result = mysqli_query($conn29, "CALL addPerdorues_INST ('$emri_institucionit','$telefoni','$emaili','$fjalekalimi','$shteti')");
		//display success messprogrami
		//echo "<font color='green'>Data added successfully.";
		//echo "<br/><a href='ballina.php'>View Result</a>";
		echo "<script>
         setTimeout(function(){
            window.location.href = 'Regjistrohu.php';
         }, 5000);
      </script>";
		 echo"<p><b>   E dhëna është duke u regjistruar në sistem. Ju lutem pritni 5 sekonda. <b></p>";

	
	
	}
}
?>
</body>
</html>
