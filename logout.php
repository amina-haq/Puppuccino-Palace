<?php
// inclues the conn for the database
include './connection.php';

session_start();// starts/resumes new session
session_unset();// unset all session variables
session_destroy();// destroy sesssion completly

// redirects to login page
header('location:login.php');
?>