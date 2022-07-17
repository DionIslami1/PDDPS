<?php
//including the database connection file
include("config.php");

//getting uid of the data from url
$p_id_uni = $_GET['id_uni'];

//deleting the row from table
$result = mysqli_query($conn,"CALL deleteUniversitete ('$p_id_uni')");

//redirecting to the display page (index.php in our case)
header("Location: modifiko_universitet.php");
?>

