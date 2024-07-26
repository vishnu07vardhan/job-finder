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
            <br>
            <a href="logout.php" class="b">Log Out</a>
        </div>
        
        <div style="position:absolute;top:50%;left:40%; font-size:35px;background-color:lightgrey;padding:20px;border:3px solid grey;font-family:monospace;">
        <?php
// Start the session
session_start();

// Check if the employer is logged in
if(!isset($_SESSION['empid']) || $_SESSION['empid'] !== true) {
    // Redirect to the employer login page
    header("Location: elogin.php");
    exit; // Stop further execution
}

// Database connection parameters
$db_user = "root";
$db_password = "";
$db_name = "addemp";

// Establish database connection
$conn = new mysqli("localhost", $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if uid is provided
if (isset($_GET['uid'])) {
    $uid = mysqli_real_escape_string($conn, $_GET['uid']);

    // Check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $qua = $_POST['qua'];
        $email = $_POST['email'];
        $uname = $_POST['uname'];
        $dob = $_POST['dob'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $phno = $_POST['phno'];

        // SQL query to update user details
        $sql = "UPDATE udet SET 
                qua = '$qua',
                email = '$email',
                uname = '$uname',
                dob = '$dob',
                age = '$age',
                address = '$address',
                phno = '$phno'
                WHERE uid = '$uid'";

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Invalid request";
    }
} else {
    echo "User ID not provided";
}

// Close the database connection
$conn->close();
?>

</div>
</body>
</html>