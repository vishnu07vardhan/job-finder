<?php
session_start();

// Check if the employer is not logged in
if (!isset($_SESSION['empid'])) {
    header("Location: elogin.php"); // Redirect to employer login page
    exit; // Stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee page</title>
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="top">
        <p class="heading">Job Finder</p>
    </div>
    <div class="navbar">
        <a href="index.php" class="ah" style="margin-left:350px;">HOME</a>
        <a href="emppage.php" class="ah">EMPLOYER PROFILE</a>
        <a href="logout.php" class="ah">LOG OUT</a>
    </div>
    <div class="side">
        <a href="curemp.php" class="b">My Details</a>
        <br>
        <a href="updemp.php" class="b">Update My Details</a>
        <br>
        <a href="eaddus.php" class="b">Add User</a>
        <br>
        <a href="eview.php" class="b">View User Details</a>
        <br>
        <a href="eaddjob.php" class="b">Add Job</a>
        <br>
        <a href="manage.php" class="b">Jobs Management</a>
    </div>
</body>
</html>
