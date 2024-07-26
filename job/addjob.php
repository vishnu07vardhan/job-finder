<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Job</title>
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
    <div class="regform">
        <center>
            <h1>Add Job</h1>
        </center>
        <?php
        session_start();
        if (isset($_SESSION['email'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $db_user = "root";
                $db_password = "";
                $db_name = "addemp";

                $conn = new mysqli("localhost", $db_user, $db_password, $db_name);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $company = $_POST['company'];
                $jobid = $_POST['jobid'];

                $jobType = $_POST['job_type'];
                $description = $_POST['description'];
                $branch = $_POST['branch'];
                $salary = $_POST['salary'];
                $jfield = $_POST['jfield'];
                $jexp = $_POST['jexp'];
                $sql = "INSERT INTO jobs (company, job_type, description ,branch, salary, jexp, jfield,jobid) VALUES ('$company', '$jobType', '$description', '$branch', '$salary', '$jexp', '$jfield','$jobid')";

                if ($conn->query($sql) === TRUE) {
                    echo "Job added successfully!";
                } else {
                    echo "Error adding job: " . $conn->error;
                }

                $conn->close();
            }
        } else {
            echo "You are not logged in as an admin.";
        }
        ?>
        <form action="addjob.php" method="POST" >
            <label for="company">Company:</label>
            <input type="text" name="company" required><br><br>

            <label for="jobid">Job ID :</label>
            <input type="text" name="jobid" required><br><br>

            <label for="job_type">Job Type:</label>
            <input type="text" name="job_type" required><br><br>

            <label for="branch">Branch:</label><br>
            <input type="text" name="branch" required><br><br>

            <label for="description">Job Description:</label><br>
            <textarea name="description" rows="5" style="width:900px;" required></textarea><br>
<br>
            <label for="salary">Salary:</label><br>
            <input type="text" name="salary" required><br><br>

            <label for="jexp">Experience required:</label><br>
            <input type="text" name="jexp" required><br><br>
            
            <label for="jfield">Field</label><br>
            <input type="text" name="jfield" required><br><br>

            <input type="submit" value="Add Job" >
        </form>

       
    </div>
</body>
</html>
