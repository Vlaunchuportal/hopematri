<?php
include_once 'dataconnection.php';
session_start();
$matri_id = $_SESSION['matri_id'];
$member_status = mysqli_query($conn, "update register_new set logged_in='0' where matri_id='".$matri_id."'");
// remove all session variables
session_unset();

// destroy the session
session_destroy();
echo "<script language='javascript'>window.location='login.php';</script>";
?>