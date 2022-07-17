<?php
//including the database connection file
include("config.php");

//getting uid of the data from url
$p_id_kontakti = $_GET['id_kontakti'];

//deleting the row from table
$result = mysqli_query($conn,"CALL deleteKontakt ('$p_id_kontakti')");

//redirecting to the display page (index.php in our case)
header("Location:listaKontakteve.php");
?>

