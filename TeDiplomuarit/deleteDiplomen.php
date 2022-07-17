<?php
//including the database connection file
include("config.php");

//getting uid of the data from url
$p_id_edu = $_GET['id_edu'];

//deleting the row from table
$result = mysqli_query($conn1,"CALL deleteDiplomen ('$p_id_edu')");

//redirecting to the display page (index.php in our case)
header("Location: Ballina.php");
?>

