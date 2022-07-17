<?php
/* Kontrollon sesionin */
include('config.php');
session_start();
$user_check=$_SESSION['emaili'];
$ses_sql = mysqli_query($conn,"CALL seleckt_check_DIP('$user_check')");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_user=$row['emaili'];
if(!isset($user_check))
{
header("Location: index.php");
} ?>