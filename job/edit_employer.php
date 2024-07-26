<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Details</title>
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
        <a href="index.php" class="ah" style="margin-left:150px;">HOME</a>
        <a href="about.php" class="ah">ABOUT US</a>
        <a href="admin.php" class="ah">ADMIN</a>
        <a href="employer.php" class=ah>EMPLOYER</a>
        <a href="user.php" class="ah">USER</a>
    </div>
    <div class="side">
        <a href="adminlogin.php" class="b">Dashboard</a>
            <br>
            <a href="addemployee.php" class="b">Add Employer</a>
            <br>
            <a href="viewemployee.php" class="b">View Employer Details</a>
            <br>
            <a href="adduser.php" class="b">Add User</a>
            <br>
            <a href="viewuser.php" class="b">View User Details</a>
            <br>
            <a href="addjob.php" class="b">Add Job</a>
            <br>
            <a href="manage.php" class="b">Jobs Management</a>
            <br>
            <a href="logout.php" class="b">Log Out</a>
        </div>
        
        <div style="position:absolute;top:50%;left:40%; font-size:35px;background-color:lightgrey;padding:20px;border:3px solid grey;font-family:monospace;"><?php
session_start();

if (isset($_SESSION['empid'])) {
    $empid = $_SESSION['empid'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $company = $_POST['company'];
        $email = $_POST['email'];
        $empname = $_POST['empname'];
        $dob = $_POST['dob'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $phno = $_POST['phno'];

        $db_user = "root";
        $db_password = "";
        $db_name = "addemp";

        $conn = new mysqli("localhost", $db_user, $db_password, $db_name);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE employee_details SET 
                company = '$company',
                email = '$email',
                empname = '$empname',
                dob = '$dob',
                age = '$age',
                address = '$address',
                phno = '$phno'
                WHERE empid = '$empid'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Invalid request";
    }
} else {
    echo "You are not logged in as an employer.";
}
?>
</div>
