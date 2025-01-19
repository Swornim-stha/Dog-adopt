<?php
session_start(); // Start the session
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Redirect to the homepage
header("Location: index.php");
exit(); // Ensure no further code is executed
?>