<?php
//including the database connection file
include("config.php");

//getting uid of the data from url
$p_id_titulli = $_GET['id_titulli'];

//deleting the row from table
$result = mysqli_query($conn33,"CALL deleteTitull ('$p_id_titulli')");

//redirecting to the display page (index.php in our case)
header("Location: modifiko_titujt.php");
?>

