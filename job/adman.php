<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View employees</title>
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

                <a href="adminlogin.php" class="ah" style="margin-left:500px;">ADMIN PROFILE</a>
                <a href="logout.php" class="ah">LOG OUT</a>
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
            <a href="adman.php" class="b">Jobs Management</a>
            <br>
        </div>
    <div class="etab">
        <table class="tab">
            <h2 style="margin-left: 500px">Job Details</h2>
        <tr>
            <th>Job ID</th>
            <th>Company</th>
            <th>Job Type</th>
            <th>Branch</th>
            <th>Description</th>
            <th>Salary</th>
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

        $sql = "SELECT * FROM jobs";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['jobid'] . "</td>";
                echo "<td>" . $row['company'] . "</td>";
                echo "<td>" . $row['job_type'] . "</td>";
                echo "<td>" . $row['branch'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['salary'] . "</td>";
                echo "<td>" . $row['jexp'] . "</td>";
                echo "<td>" . $row['jfield'] . "</td>";
                echo "<td style='text-decoration:none;'><a href='ajdel.php?jobid=" . $row['jobid'] . "'>Delete</a></td>";
                echo "<td><a href='editjob.php?jobid=" . $row['jobid'] . "'>Edit</a></td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
    </div>
    
</body>
</html>