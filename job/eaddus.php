<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user</title>
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
        <<a href="emppage.php" class="ah" style = "margin-left:500px;">EMPLOYER PROFILE</a>
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
        <div class="regform">
        <center>
            <h1>Add User Details</h1>
        </center>
        <form method="POST">
            User Name : <input type="text" name="uname" id="uname">
            <br><br>
            User Email : <input type="email" name="email" id="email" placeholder="abc@email.com">
            <br><br>
            Qualification : <input type="text" name="qua" id="qua">
            <br><br>
            Gender :
            <br> <select name="gender" id="gender">
                <option disabled selected>gender</option>
                <option >Male</option>
                <option >Female</option>
            </select>
            <br><br>
            DOB : 
            <br><input type="date" name="dob" id="dob">
            <br><br>
            Age : 
            <br><input type="number" id="age" name="age">
            <br><br>
            Address : <input type="text" name="address" id="address">
            <br><br>
            Phone Number : <input type="number" name="phno" id="phno" placeholder="xxx xxx xxxx">
            <br><br>
            UserID : <input type="text" name="uid" id="uid">
            <br><br>
            Experience : <input type="text" name="exp" id="exp">
            <br><br>
            Field : <input type="text" name="field" id="field">
            <br><br>
            Password : <input type="password" name="pwd" id="pwd">
            <br><br>
            <center>
                <button>Submit</button>
            </center>
        
        </form></div>
</body>
</html>

<?php
session_start();

// Check if the employer is not logged in
if (!isset($_SESSION['empid'])) {
    header("Location: elogin.php"); // Redirect to employer login page
    exit; // Stop further execution
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are provided
    if (isset($_POST['uid'], $_POST['uname'], $_POST['email'], $_POST['gender'], $_POST['dob'], $_POST['age'], $_POST['address'], $_POST['phno'], $_POST['pwd'])) {
        $db_user = "root";
        $db_password = "";
        $db_name = "addemp";

        $conn = new mysqli("localhost", $db_user, $db_password, $db_name);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve form data
        $uid = $_POST['uid'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $qua = isset($_POST['qua']) ? $_POST['qua'] : ""; // Check if qualification is provided
        $gender = $_POST['gender'];
        $dateofbirth = $_POST['dob'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $phno = $_POST['phno'];
        $exp = $_POST['exp'];
        $field = $_POST['field'];
        $password = $_POST['pwd'];


        // Check if the user with the provided UserID already exists
        $check_query = "SELECT * FROM udet WHERE uid = '$uid'";
        $result = $conn->query($check_query);

        if ($result->num_rows > 0) {
            echo "User with the provided UserID already exists. Please choose a different UserID.";
        } else {
            // Insert new user details into the database
            $insert_query = "INSERT INTO udet (uname, email, qua, gender, dob, age, address, phno, password, uid) 
                             VALUES ('$uname', '$email', '$qua', '$gender', '$dateofbirth', '$age', '$address', '$phno', '$password', '$uid')";

            if ($conn->query($insert_query) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $insert_query . "<br>" . $conn->error;
            }
        }

        $conn->close();
    } else {
        echo "Please fill out all required fields.";
    }
}
?>
