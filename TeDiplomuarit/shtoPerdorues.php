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
	$emri = $_POST['emri'];
	$mbiemri = $_POST['mbiemri'];
	$nr_personal = $_POST['nr_personal'];
    $datelindja = $_POST['datelindja'];
	$telefoni = $_POST['telefoni'];
	$emaili = $_POST['emaili'];
    $fjalekalimi = $_POST['fjalekalimi'];
		
	// checking empty fields
	if(empty($emri) || empty($mbiemri) || empty($nr_personal) || empty($datelindja) || empty($telefoni)
     || empty($emaili) || empty($fjalekalimi)) {			
		if(empty($emri)) {echo "<font color='red'>Fusha Emri eshte e zbrazët.</font><br/>";}
		if(empty($mbiemri)) {echo "<font color='red'>Fusha Mbiemri eshte e zbrazët.</font><br/>";}
		if(empty($nr_personal)) {echo "<font color='red'>Fusha Nr Personal eshte e zbrazët.</font><br/>";}
        if(empty($datelindja)) {echo "<font color='red'>Fusha Datelindja eshte e zbrazët.</font><br/>";}
		if(empty($telefoni)) {echo "<font color='red'>Fusha Telefoni eshte e zbrazët.</font><br/>";}
		if(empty($emaili)) {echo "<font color='red'>Fusha Email-i eshte e zbrazët.</font><br/>";}
		if(empty($fjalekalimi)) {echo "<font color='red'>Fusha Fjalëkalimi është e zbrazët.</font><br/>";}
		//link to the previous programi
		echo "<br/><a href='javascript:self.history.back();'>Kthehu Mbrapa</a>";
	}
	$result = mysqli_query($conn45,"CALL selectEmail_DIP('$emaili')");
	if(mysqli_num_rows($result) > 0){
		echo "<script>
         setTimeout(function(){
            window.location.href = 'Regjistrohu.php';
         }, 5000);
      </script>";
		echo"<br/><font color='red'>Ky Email egziston në Platform. Ju lutem provoni një Email tjetër, pas 5 sekondave</font>";	
			
	} else { 
		
		$result = mysqli_query($conn42, "CALL addPerdorues_DIP ('$emri','$mbiemri','$nr_personal','$datelindja','$telefoni','$emaili',
		'$fjalekalimi')");
	
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
