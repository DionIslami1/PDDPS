<?php
//including the database connection file
include("config.php");

//getting uid of the data from url
$p_id_p_adm = $_GET['id_p_adm'];

//deleting the row from table
$result = mysqli_query($conn,"CALL deletePerdorues ('$p_id_p_adm')");

//redirecting to the display page (index.php in our case)
header("Location: modifikoPerdorues.php");
?>

