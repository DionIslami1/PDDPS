
<html>
<head>
	<title>Shto Sygjerim</title>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['addSygjerim'])) {	
	$id_uni = $_POST['id_uni'];
	$fakulteti = $_POST['fakulteti'];
	$p_studimor = $_POST['p_studimor'];
	$pershkrimi_p_studimor = $_POST['pershkrimi_p_studimor'];

	$imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
	$name = $_FILES['userfile']['name'];
	 $maxsize = 10000000;

     $id_p_inst = $_POST['id_p_inst'];
	
	// checking empty fields
	if (empty($p_studimor) || empty($id_uni) || empty($fakulteti) || empty($pershkrimi_p_studimor)) {
				
		if(empty($id_uni)) {
			echo "<font color='red'>Fusha Zgjedh Universitetin është e zbrazët</font><br/>";
		}
		if(empty($fakulteti)) {
			echo "<font color='red'>Fusha Fakulteti është e zbrazët</font><br/>";
		}
		if(empty($p_studimor)) {
			echo "<font color='red'>Fusha Programi Studimor është e zbrazët</font><br/>";
		}
		if(empty($pershkrimi_p_studimor)) {
			echo "<font color='red'>Fusha Përshkrimi i Programit Studimor është e zbrazët</font><br/>";
		}		
		
		
		//link to the previous pMbiemri
		echo "<br/><a href='javascript:self.history.back();'>Kthehu Mbrapa</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($conn20, "CALL addSygjerim ('$id_uni','$fakulteti','$p_studimor' ,'$pershkrimi_p_studimor' ,'$imgData' ,'$name','$id_p_inst')");
		
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
