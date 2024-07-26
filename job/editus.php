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
        
        <div style="position:absolute;top:50%;left:40%; font-size:35px;background-color:lightgrey;padding:20px;border:3px solid grey;font-family:monospace;"><?php
session_start();

if (isset($_SESSION['uid'])) {
     $uid = $_SESSION['uid'];
            $db_user = "root";
            $db_password = "";
            $db_name = "addemp";

            $conn = new mysqli("localhost", $db_user, $db_password, $db_name);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $qua = $_POST['qua'];
        $dob = $_POST['dob'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $phno = $_POST['phno'];
        $exp = $_POST['exp'];
        $field = $_POST['field'];
        

        $sql = "UPDATE udet SET 
                qua = '$qua',
                email = '$email',
                uname = '$uname',
                dob = '$dob',
                age = '$age',
                exp = '$exp',
                field = '$field',
                address = '$address',
                phno = '$phno'
                WHERE uid = '$uid'";

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
