<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: ulogin.php");
    exit();
}


$db_user = "root";
$db_password = "";
$db_name = "addemp";

$conn = new mysqli("localhost", $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$jobid = isset($_GET['jobid']) ? $_GET['jobid'] : '';
if (!empty($jobid)) {
    $jobQuery = "SELECT * FROM jobs WHERE jobid = '$jobid'";
    $jobResult = $conn->query($jobQuery);
    if ($jobResult->num_rows > 0) {
        $jobRow = $jobResult->fetch_assoc();
    }
}


$uid = $_SESSION['uid'];
$userQuery = "SELECT * FROM udet WHERE uid = '$uid'";
$userResult = $conn->query($userQuery);
if ($userResult->num_rows > 0) {
    $userRow = $userResult->fetch_assoc();
}

$canEnroll = false;
$isEnrolled = false;
if (!empty($jobRow) && !empty($userRow)) {
    if ($userRow['exp'] >= $jobRow['jexp']) {
        $canEnroll = true;
    }
}

if (!empty($jobRow)) {
    $checkEnrollmentQuery = "SELECT * FROM enrollments WHERE uid = '$uid' AND jobid = '$jobid'";
    $checkEnrollmentResult = $conn->query($checkEnrollmentQuery);
    if ($checkEnrollmentResult->num_rows > 0) {
        $isEnrolled = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Job</title>
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <style>
        .form-container {
            position:absolute;
            top:35%;
            width:800px;
            left:25%;
            font-size:20px;
            background-color: lightgrey;
            padding:30px;
            border: 5px solid black;
            box-shadow: 4px 8px grey;
            border-radius: 20px;
        }
    </style>
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
    <div class="form-container">
        <h2>Job Details</h2>
        <?php if (!empty($jobRow)) : ?>
            <p><strong>Job ID:</strong> <?php echo $jobRow['jobid']; ?></p>
            <p><strong>Job Type:</strong> <?php echo $jobRow['job_type']; ?></p>
            <p><strong>Company:</strong> <?php echo $jobRow['company']; ?></p>
            <p><strong>Description:</strong> <?php echo $jobRow['description']; ?></p>
            <p><strong>Salary:</strong> <?php echo $jobRow['salary']; ?></p>
            <p><strong>Experience Required:</strong> <?php echo $jobRow['jexp']; ?></p>
            <p><strong>Field:</strong> <?php echo $jobRow['jfield']; ?></p>
        <?php else : ?>
            <p>No job details available.</p>
        <?php endif; ?>

        <h2>User Details</h2>
        <?php if (!empty($userRow)) : ?>
            <p><strong>User ID:</strong> <?php echo $userRow['uid']; ?></p>
            <p><strong>User Name:</strong> <?php echo $userRow['uname']; ?></p>
            <p><strong>Email:</strong> <?php echo $userRow['email']; ?></p>
            <p><strong>Experience:</strong> <?php echo $userRow['exp']; ?></p>
            <p><strong>Field:</strong> <?php echo $userRow['field']; ?></p>
        <?php else : ?>
            <p>No user details available.</p>
        <?php endif; ?>

        <?php if ($canEnroll && !$isEnrolled) : ?>
            <form action="submit_application.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="jobid" value="<?php echo $jobid; ?>">
                <input type="hidden" name="uid" value="<?php echo $uid; ?>">
                <label for="resume">Upload Resume:</label>
                <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required>
                <br><br>
                <button type="submit">Submit Application</button>
            </form>
        <?php elseif ($isEnrolled) : ?>
            <p style="background-color: lightgreen;padding: 20px;">You are already enrolled in this job.</p>
        <?php else : ?>
            <p>You don't meet the required experience for this job.</p>
        <?php endif; ?>
    </div>
</body>
</html>
