<?php
//including the database connection file
include("config.php");

//getting uid of the data from url
$p_id_niveli = $_GET['id_niveli'];

//deleting the row from table
$result = mysqli_query($conn,"CALL deleteNivele ('$p_id_niveli')");

//redirecting to the display page (index.php in our case)
header("Location: modifiko_nivele.php");
?>

