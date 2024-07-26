<?php
session_start(); 

if (!isset($_SESSION['empid'])) {

    header("Location: elogin.php");
    exit; 
}

$db_user = "root";
$db_password = "";
$db_name = "addemp";

$conn = new mysqli("localhost", $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['jobid'])) {

    $jobid = mysqli_real_escape_string($conn, $_GET['jobid']);

    $sql = "DELETE FROM jobs WHERE jobid = '$jobid'";

    if ($conn->query($sql) === TRUE) {

        header("Location: eman.php");

    } else {

        echo "Error deleting record: " . $conn->error;
    }
} else {

    echo "Invalid request. Employee ID not provided.";
}

$conn->close();
?>
