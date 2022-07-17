<?php
/* Kontrollon nese logini mund te kryhet me sukses, nese username dhe passwordi qe ka shkruar useri ne Index.php gjindet ne db ne MySQL */
	session_start();
	include("config.php"); //Establishing connection with our database
	
	$error = ""; //Variable for storing our errors.
	if(isset($_POST["submit"]))
	{
		if(empty($_POST["emaili"]) || empty($_POST["fjalekalimi"]))
		{
			$error = "Both fields are required.";
		}else
		{
			// Define $username and $fjalekalimi
			$emaili=$_POST['emaili'];
			$fjalekalimi=$_POST['fjalekalimi'];
			//Check username and password from database
			$sql="CALL select_LoginINST('$emaili','$fjalekalimi')";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC); 
			//If username and fjalekalimi exist in our database then create a session.
			//Otherwise echo error.
			if(mysqli_num_rows($result) == 1)
			{
				$_SESSION['emaili'] = $emaili; // Initializing Session
				header("location: ballina.php"); // Redirecting To Other Page
			}else
			{
				$error = "emaili ose Fjalekalimi eshte Gabim.";
			}
		}
	}
?>