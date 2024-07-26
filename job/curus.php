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
    <div class="regform">
        <center>
            <h1>My Details</h1>
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

            $sql = "SELECT * FROM udet WHERE uid = '$uid'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<form >";
                echo "<center>";
                echo "<table style='background-color:beige;padding:20px;border-radius:20px;border:3px solid rgb(50,20,20);'>";
                echo "<tr><th style='background-color:rgb(255,222,173);padding:15px;'>User ID</th><td style='border:none; background-color:bisque;'>" . $row['uid'] . "</td></tr>";
                echo "<tr><th style='background-color:rgb(255,222,173);padding:15px;'>User Name</th><td style='border:none; background-color:bisque;'>" . $row['uname'] . "</td></tr>";
                echo "<tr><th style='background-color:rgb(255,222,173);padding:15px;'>Email</th><td style='border:none; background-color:bisque;'>" . $row['email'] . "</td></tr>";
                echo "<tr><th style='background-color:rgb(255,222,173);padding:15px;'>Qualification</th><td style='border:none; background-color:bisque;'>" . $row['qua'] . "</td></tr>";
                echo "<tr><th style='background-color:rgb(255,222,173);padding:15px;'>Years of experience</th><td style='border:none; background-color:bisque;'>" . $row['exp'] . "</td></tr>";
                echo "<tr><th style='background-color:rgb(255,222,173);padding:15px;'>Field</th><td style='border:none; background-color:bisque;'>" . $row['field'] . "</td></tr>";
                echo "<tr><th style='background-color:rgb(255,222,173);padding:15px;'>Gender</th><td style='border:none; background-color:bisque;'>" . $row['gender'] . "</td></tr>";
                echo "<tr><th style='background-color:rgb(255,222,173);padding:15px;'>Date of birth</th><td style='border:none; background-color:bisque;'>" . $row['dob'] . "</td></tr>";
                echo "<tr><th style='background-color:rgb(255,222,173);padding:15px;'>Age</th><td style='border:none; background-color:bisque;'>" . $row['age'] . "</td></tr>";
                echo "<tr><th style='background-color:rgb(255,222,173);padding:15px;'>Address</th><td style='border:none; background-color:bisque;'>" . $row['address'] . "</td></tr>";
                echo "<tr><th style='background-color:rgb(255,222,173);padding:15px;'>Phone number</th><td style='border:none; background-color:bisque;'>" . $row['phno'] . "</td></tr>";
                echo "</table>";
                echo "<button onclick='printDetails()'>Print Details</button>";
                echo "</center>";
                echo "</form>";
            } else {
                echo "No details found for the current employer.";
            }

            $conn->close();
        } else {
            echo "You are not logged in as an employer.";
        }
        ?>
        <script>
            function printDetails() {
                window.print();
            }
        </script>
    </div>
</body>
</html>
