<html>
<head>
	<title>Shtimi Përdoruesve</title>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<body>
<?php
//including the database connection file
include_once("config.php");
if(isset($_POST['addPerdorues'])) {	
	$emri = $_POST['emri'];
	$mbiemri = $_POST['mbiemri'];
	$emaili = $_POST['emaili'];
    $fjalekalimi = $_POST['fjalekalimi'];
		
	// checking empty fields
	if(empty($emri) || empty($mbiemri) || empty($emaili) || empty($fjalekalimi)) {			
		if(empty($emri)) {echo "<font color='red'>Fusha 'Emri' është e zbrazët .</font><br/>";}
		if(empty($mbiemri)) {echo "<font color='red'>Fusha 'Mbiemri' është e zbrazët .</font><br/>";}
		if(empty($emaili)) {echo "<font color='red'>Fusha 'Emaili' është e zbrazët .</font><br/>";}
        if(empty($fjalekalimi)) {echo "<font color='red'>Fusha 'Fjalëkalimi' është e zbrazët .</font><br/>";}
		//link to the previous programi
		echo "<br/><a href='javascript:self.history.back();'>Kthehu Mbrapa</a>";
	}
	$result = mysqli_query($conn38,"CALL selectEmail_Admin('$emaili')");
	if(mysqli_num_rows($result) > 0){
		echo "<script>
         setTimeout(function(){
            window.location.href = 'shtoPerdorues.php';
         }, 5000);
      </script>";
		echo"<br/><font color='red' style='padding: 10%;'>Ky Email egziston në Platform. Ju lutem provoni një Email tjetër</font>";	
			
	}else { 
		// if all the fields are filled (not empty) 
		//insert data to database	
		$result = mysqli_query($conn, "CALL addPerdorues('$emri','$mbiemri','$emaili','$fjalekalimi')");
		//display success messprogrami
		//echo "<font color='green'>Data added successfully.";
		//echo "<br/><a href='ballina.php'>View Result</a>";
		echo "<script>
         setTimeout(function(){
            window.location.href = 'shtoPerdorues.php';
         }, 5000);
      </script>";
		 echo"<p><b>   E dhëna është duke u regjistruar në sistem. Ju lutem prisni 5 sekonda. <b></p>";

	
		 mysqli_close($conn);
	}
}
?>
</body>
</html>
