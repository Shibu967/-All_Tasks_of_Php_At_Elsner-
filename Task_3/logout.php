<?php
// Start the session
session_start();
include 'conn.php';
unset($_SESSION['id']);
unset($_SESSION['email']);
header('location: login.php');
?>