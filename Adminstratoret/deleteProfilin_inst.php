<?php
//including the database connection file
include("config.php");

//getting uid of the data from url
$p_id_p_inst = $_GET['id_p_inst'];

//deleting the row from table
//$result = mysqli_query($conn,"DELETE FROM bicikletat WHERE id_bicikleta=$id_bicikleta");
$result = mysqli_query($conn,"CALL deleteProfilin_Inst('$p_id_p_inst')");

//redirecting to the display page (index.php in our case)
header("Location:Profilet_e_Institucioneve.php");
mysqli_close($conn);

?>

