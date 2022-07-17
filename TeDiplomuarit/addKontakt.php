<html>
<head>
	<title>Kontakti</title>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['addKontakt'])) {	
	$subijekti = $_POST['subijekti'];
	$mesazhi = $_POST['mesazhi'];
    $emaili = $_POST['emaili'];
    
	// checking empty fields
	if(empty($subijekti) || empty($mesazhi) || empty($emaili)) {			
		if(empty($subijekti)) {echo "<font color='red'>Fusha 'Subjekti' është e zbrazët.</font><br/>";}
		if(empty($mesazhi)) {echo "<font color='red'>Fusha 'Mesazhi' është e zbrazët.</font><br/>";}
		if(empty($emaili)) {echo "<font color='red'>Fusha 'Emaili' është e zbrazët.</font><br/>";}
		//link to the previous Mesazhi
		echo "<br/><a href='javascript:self.history.back();'>Kthehu Mbrapa</a>";
	} else { 
		// if all the fields are filled (not empty) 
		//insert data to database	
        $result = mysqli_query($conn, "CALL addKontakt ('$subijekti','$mesazhi','$emaili')");
		//display success messMesazhi
	//	echo "<font color='green'>Data added successfully.";
		//echo "<br/><a href='contact.php'>View Result</a>";
		echo "<script>
         setTimeout(function(){
            window.location.href = 'ballina.php';
         }, 5000);
      </script>";
		 echo"<p><b>   E dhëna është duke u regjistruar në sistem. Ju lutem pritni 5 sekonda. <b></p>";
	
	}
}
mysqli_close($conn);
?>
</body>
</html>
