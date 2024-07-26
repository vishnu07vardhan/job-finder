<?php

    $db_user = "root";
    $db_password = "";
    $db_name = "addemp";

    $conn = new mysqli("localhost", $db_user, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_GET['jobid'])) {

    $jobid = mysqli_real_escape_string($conn, $_GET['jobid']);
    $sql = "SELECT * FROM jobs WHERE jobid = '$jobid'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $company = $row['company'];
        $job_type = $row['job_type'];
        $branch = $row['branch'];
        $description = $row['description'];
        $salary = $row['salary'];
        $jexp = $row['jexp'];
        $jfield = $row['jfield'];
    } else {
        echo "No job found with the provided jobid.";
    }
} else {
    echo "No jobid parameter provided.";
}

if(isset($_POST['update'])) {

    $updated_company = $_POST['company'];
    $updated_job_type = $_POST['job_type'];
    $updated_branch = $_POST['branch'];
    $updated_description = $_POST['description'];
    $updated_salary = $_POST['salary'];
    $updated_jexp = $_POST['jexp'];
    $updated_jfield = $_POST['jfield'];

    $update_sql = "UPDATE jobs SET company='$updated_company', job_type='$updated_job_type', branch='$updated_branch', description='$updated_description', salary='$updated_salary', jexp='$updated_jexp', jfield='$updated_jfield' WHERE jobid='$jobid'";

    if ($conn->query($update_sql) === TRUE) {
        echo "Job details updated successfully.";

        header("Location: viewemployee.php");
        exit();
    } else {
        echo "Error updating job details: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job</title>
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
        <div class="regform" >
    <h2>Edit Job Details</h2>
    <form method="POST" action="">
        <label for="company">Company:</label><br>
        <input type="text" id="company" name="company" value="<?php echo $company; ?>"><br>
        
        <label for="job_type">Job Type:</label><br>
        <input type="text" id="job_type" name="job_type" value="<?php echo $job_type; ?>"><br>
        
        <label for="branch">Branch:</label><br>
        <input type="text" id="branch" name="branch" value="<?php echo $branch; ?>"><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"><?php echo $description; ?></textarea><br>
        
        <label for="salary">Salary:</label><br>
        <input type="text" id="salary" name="salary" value="<?php echo $salary; ?>"><br>
        
        <label for="jexp">Experience:</label><br>
        <input type="text" id="jexp" name="jexp" value="<?php echo $jexp; ?>"><br>
        
        <label for="jfield">Field:</label><br>
        <input type="text" id="jfield" name="jfield" value="<?php echo $jfield; ?>"><br>
        
        <input type="submit" name="update" value="Update Job">
    </form>
    </div>
</body>
</html>
