<?php
$db_user = "root";
$db_password = "";
$db_name = "addemp";

$conn = new mysqli("localhost", $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['empid'])) {
    $empid = mysqli_real_escape_string($conn, $_GET['empid']);

    $sql = "DELETE FROM employee_details WHERE empid = '$empid'";
    if ($conn->query($sql) === TRUE) {
        header("Location: adminlogin.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request. Employee ID not provided.";
}

$conn->close();
?>
