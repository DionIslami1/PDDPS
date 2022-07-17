<?php
//including the database connection file
include("config.php");

//getting uid of the data from url
$p_id_sygjerimi = $_GET['id_sygjerimi'];

//deleting the row from table
$result = mysqli_query($conn,"CALL deleteSygjerimin ('$p_id_sygjerimi')");

//redirecting to the display page (index.php in our case)
header("Location:ballina.php");
?>

