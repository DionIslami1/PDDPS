<?php
//including the database connection file
include("config.php");

//getting uid of the data from url
$p_id_p_dip = $_GET['id_p_dip'];

//deleting the row from table
//$result = mysqli_query($conn,"DELETE FROM bicikletat WHERE id_bicikleta=$id_bicikleta");
$result = mysqli_query($conn,"CALL deleteProfil('$p_id_p_dip')");

//redirecting to the display page (index.php in our case)
header("Location:Profilet_e_te_diplomuarve.php");
mysqli_close($conn);

?>

