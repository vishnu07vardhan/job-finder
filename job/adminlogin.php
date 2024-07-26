<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <link rel="stylesheet" href="index.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anta&family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
        <style>
        .content {
    margin-top: 30px;
    padding: 20px;
    border-radius: 10px;
    background-color: #f0f0f0;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-left:150px;
}

.content h1 {
    margin-bottom: 20px;
    font-family: 'Anta', sans-serif;
    color: #333;
}

.content table {
    width: 80%;
    margin: auto;
    border-collapse: collapse;
}

.content th, .content td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.content th {
    background-color: #f2f2f2;
}

.content tr:hover {
    background-color: #f9f9f9;
}

    </style>
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
        <div class="content">
        <center>
            <h1>Admin Dashboard</h1>
        </center>
        <?php
        session_start();
        if (isset($_SESSION['email'])) {
            $db_user = "root";
            $db_password = "";
            $db_name = "addemp";

            $conn = new mysqli("localhost", $db_user, $db_password, $db_name);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $employersCount = getCount($conn, 'employee_details');
            $usersCount = getCount($conn, 'udet');
            $jobcount = getCount($conn, 'jobs');
            $enroll = getCount($conn, 'enrollments');
            

            echo "<table>";
            echo "<tr><th>Total Employers</th><td>$employersCount</td></tr>";
            echo "<tr><th>Total Users</th><td>$usersCount</td></tr>";
            echo "<tr><th>Total Jobs</th><td>$jobcount</td></tr>";
            echo "<tr><th>Total Enrollments</th><td>$enroll</td></tr>";

    
            echo "</table>";

            $conn->close();
        } else {
            echo "You are not logged in as an admin.";
        }

        function getCount($conn, $table) {
            $sql = "SELECT COUNT(*) AS count FROM $table";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['count'];
            } else {
                return 0;
            }
        }
        ?>
        </div>
</body>
</html>