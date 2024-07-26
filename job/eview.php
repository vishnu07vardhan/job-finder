<?php
session_start();
if (!isset($_SESSION['empid'])) {
    header("Location: elogin.php"); 
    exit; 
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
        <a href="emppage.php" class="ah" style = "margin-left:500px;">EMPLOYER PROFILE</a>
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
        <a href="eman.php" class="b">Jobs Management</a>
    </div>
    <div class="etab">
        <table class="tab">
            <h2 style="margin-left: 500px">User Details</h2>
        <tr>
            <th>UserID</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Qualification</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Age</th>
            <th>Address</th>
            <th>Phno</th>
            <th>Experience</th>
            <th>Field</th>

        </tr>
        <?php
     
    
        $db_user = "root";
        $db_password = "";
        $db_name = "addemp";

        $conn = new mysqli("localhost", $db_user, $db_password, $db_name);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM udet";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['uid'] . "</td>";
                echo "<td>" . $row['uname'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['qua'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['dob'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['phno'] . "</td>";
                echo "<td>" . $row['exp'] . "</td>";
                echo "<td>" . $row['field'] . "</td>";

                echo "<td style='text-decoration:none;'><a href='eudel.php?uid=" . $row['uid'] . "'>Delete</a></td>";

                echo "</tr>";
            }
        }
        ?>
    </table>
    </div>
</body>
</html>
