<?php
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
        header("Location: adminlogin.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request. Job ID not provided.";
}

$conn->close();
?>
