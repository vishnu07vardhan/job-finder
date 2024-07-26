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
    <div style="background-color:lightgrey;padding:20px;border:3px solid grey;font-size:23px;top:50%;left:40%;position:absolute;">
       <?php
session_start();

if (!isset($_SESSION['uid'])) {
    header("Location: ulogin.php"); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['jobid'])) {
    $jobid = $_GET['jobid'];
    $uid = $_SESSION['uid'];

    $db_user = "root";
    $db_password = "";
    $db_name = "addemp";

    $conn = new mysqli("localhost", $db_user, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $checkSql = "SELECT * FROM enrollments WHERE uid = '$uid' AND jobid = '$jobid'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {

        $deleteSql = "DELETE FROM enrollments WHERE uid = '$uid' AND jobid = '$jobid'";
        if ($conn->query($deleteSql) === TRUE) {

            echo "Unenrollment successful!";
        } else {
            echo "Error unenrolling: " . $conn->error;
        }
    } else {
        echo "You are not enrolled in this job.";
    }

    $conn->close();
} else {
    header("Location: ulogged.php"); 
    exit();
}
?>


    </div>

</body>
</html>
