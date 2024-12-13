<?php
// connect database
include 'connection/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // retreive form data
$user_name=trim();
$user_email=trim($_POST['']);
$user_password=trim($_POST['']);
$user_image=trim($_POST['']);
} else {
    echo "Invalid request method.";
}

// Close database connection
mysqli_close($db);
?>