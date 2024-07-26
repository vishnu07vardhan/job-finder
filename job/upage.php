<?php
session_start();


if (!isset($_SESSION['uid'])) {
    header("Location: ulogin.php"); 
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User</title>
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
        <a href="ulogged.php" class="ah" style="margin-left:250px;">HOME</a>
        <a href="uabt.php" class="ah">ABOUT US</a>
        <a href="upage.php" class="ah">PROFILE</a>
        <a href="logout.php" class="ah">LOG OUT</a>
    </div>
    <div class="side">
        <a href="curus.php" class="b">My Details</a>
        <br>
        <a href="updus.php" class="b">Update My Details</a>
        <br>
        <a href="uapjb.php" class="b">My applied jobs</a>
        <br>
    </div>


</body>
</html>
