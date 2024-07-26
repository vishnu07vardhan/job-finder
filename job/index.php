<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Finder</title>
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <style>
        .cont {
            position: absolute;
            top:30%;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background-color: #edf2f6;
            padding: 20px;
        }
        
        .job-tile {
            border: 2px solid #ccc;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .job-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .job-company {
            font-size: 16px;
            margin-bottom: 5px;
        }
        
        .job-description {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }
        
        .job-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .job-enroll-link {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 16px;
            text-decoration: none;
        }
        
        .job-enroll-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="top" >
        <p class="heading">Job Finder</p>
        
    </div>
    <div class="navbar" style="border:none;">
        <a href="index.php" class="ah" style="margin-left:150px;">HOME</a>
        <a href="about.php" class="ah">ABOUT US</a>
        <a href="admin.php" class="ah">ADMIN</a>
        <a href="employer.php" class=ah>EMPLOYER</a>
        <a href="user.php" class="ah">USER</a>
    </div>
    <div class="cont">
        <center>
            <h1>Welcome to Job Finder</h1>
        </center>

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
                echo "<div class='job-tiles'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='job-tile'>";
                    echo "<div class='job-title'>" . $row['job_type'] . "</div>";
                    echo "<div class='job-company'>" . $row['company'] . "</div>";
                    echo "<div class='job-description'>" . $row['description'] . "</div>";
                    echo "<div class='job-details'>";
                    echo "<div>Salary: " . $row['salary'] . "</div>";
                    echo "<div>Experience: " . $row['jexp'] . "</div>";
                    echo "<div>Field: " . $row['jfield'] . "</div>";
                    echo "<a class='job-enroll-link' href='enrollment.php?company=" . $row['company'] . "'>Enroll</a>";
                    echo "</div>"; 
                    echo "</div>"; 
                }
                echo "</div>"; 
            } else {
            echo "No jobs available at the moment.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
