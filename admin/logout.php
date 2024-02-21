<?php 
include('../frontend/config/constants.php');
//session_destroy();
unset($_SESSION['user-admin']);

// Get the current page URL
$current_page = $_SERVER['REQUEST_URI'];

// Redirect to the sign-in/sign-up page with login=true parameter and current page parameter
header('Location: ../frontend/login-signup.php?login=true&page=' . urlencode($current_page));
exit;
?>
