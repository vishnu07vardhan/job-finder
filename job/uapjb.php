<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applied Jobs</title>
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
</head>
<body style="background-color:rgb(253,245,230);">
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
    <div class="regform">
        <center>
            <h1>Your Applied Jobs</h1>
        </center>

        <?php
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
            $jobid = isset($_GET['jobid']) ? $_GET['jobid'] : '';
if (!empty($jobid)) {
    $jobQuery = "SELECT * FROM jobs WHERE jobid = '$jobid'";
    $jobResult = $conn->query($jobQuery);
    if ($jobResult->num_rows > 0) {
        $jobRow = $jobResult->fetch_assoc();
    }
}
            $sql = "SELECT * FROM enrollments WHERE uid = '$uid'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<hr>";
                echo "<center><h2>Your Applied Jobs</h2></center>";
                echo "<table border='1' style='width:80%; margin: 20px auto; text-align:center;'>";
                echo "<tr><th>Company</th><th>Actions</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['jobid'] . "</td>";
                    echo "<td><a href='unenroll.php?jobid=" . $row['jobid'] . "'>Cancel Enrollment</a></td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "You have not applied to any jobs yet.";
            }

            $conn->close();
        } else {
            echo "You are not logged in.";
        }
        ?>

    </div>
</body>
</html>
