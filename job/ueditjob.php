<?php

    $db_user = "root";
    $db_password = "";
    $db_name = "addemp";

    $conn = new mysqli("localhost", $db_user, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_GET['uid'])) {

    $empid = mysqli_real_escape_string($conn, $_GET['uid']);
    $sql = "SELECT * FROM udet WHERE uid = '$uid'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();


        $uname = $row['uname'];
        $email = $row['email'];
        $qua = $row['qua'];
        $gender = $row['gender'];
        $dateofbirth = $row['dob'];
        $age = $row['age'];
        $address = $row['address'];
        $phno = $row['phno'];
        $exp = $row['exp'];
        $field = $row['field'];

    } else {
        echo "No employee found with the provided id.";
    }
} else {
    echo "No id parameter provided.";
}

if(isset($_POST['update'])) {

        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $qua = $_POST['qua'];
        $gender = $_POST['gender'];
        $dateofbirth = $_POST['dob'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $phno = $_POST['phno'];
        $exp = $_POST['exp'];
        $field = $_POST['field'];

    $update_sql = "UPDATE udet SET uname = '$uname', email = '$qua', company = '$qua', gender = '$gender', dob = '$dob', age='$age', address='$address',phno='$phno',exp='$exp',field='$field' WHERE uid='$uid'";

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
    <h2>Edit Employee Details</h2>
    <form method="POST" action="">
        User Name : <input type="text" name="uname" id="uname"value="<?php echo $uname; ?>">
            <br><br>
            User Email : <input type="email" name="email" id="email" placeholder="abc@email.com"value="<?php echo $email; ?>">
            <br><br>
            Qualification : <input type="text" name="qua" id="qua"value="<?php echo $qua; ?>">
            <br><br>
            Gender :
            <br> <select name="gender" id="gender" value="<?php echo $gender; ?>">
                <option disabled selected>gender</option>
                <option >Male</option>
                <option >Female</option>
            </select>
            <br><br>
            DOB : 
            <br><input type="date" name="dob" id="dob"value="<?php echo $dob; ?>">
            <br><br>
            Age : 
            <br><input type="number" id="age" name="age"value="<?php echo $age; ?>">
            <br><br>
            Address : <input type="text" name="address" id="address"value="<?php echo $address; ?>">
            <br><br>
            Phone Number : <input type="number" name="phno" id="phno" placeholder="xxx xxx xxxx"value="<?php echo $phno; ?>">
            <br><br>
            Experience: <input type="text" name="exp" id="exp"value="<?php echo $exp; ?>">
<br><br>
            Field : <br><input type="text" name="field" id="field"value="<?php echo $field; ?>">
<br><br>
        <input type="submit" name="update" value="Update Employee">
    </form>
    </div>
</body>
</html>
