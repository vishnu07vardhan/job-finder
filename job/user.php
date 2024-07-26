<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Signup</title>
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
            <a href="index.php" class="ah" style="margin-left:150px;">HOME</a>
            <a href="about.php" class="ah">ABOUT US</a>
            <a href="admin.php" class="ah">ADMIN</a>
            <a href="employer.php" class=ah>EMPLOYER</a>
            <a href="user.php" class="ah">USER</a>
    </div>
    <div class="regform" style="left:250px;">
        <center>
            <h1>User Signup</h1>
        </center>
        <form method="POST">
            User Name : <input type="text" name="uname" id="uname">
            <br><br>
            User Email : <input type="email" name="email" id="email" placeholder="abc@email.com" required>
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
            Field : <br><input type="text" name="field" id="field">
<br><br>
            Password : <br><input type="password" name="pwd" id="pwd" required>
            <br><br>
            <center>
                <button>Submit</button>
            </center>
        
        </form>

        <p style="font-size:20px;font-family: Verdana, Geneva, Tahoma, sans-serif;padding-left:300px;">Already have an account?  <a href="ulogin.php" style="text-decoration: none;">Login Here</a></p>
    </div>

</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['uid'], $_POST['uname'], $_POST['email'], $_POST['gender'], $_POST['dob'], $_POST['age'], $_POST['address'], $_POST['phno'], $_POST['exp'],$_POST['field'],$_POST['pwd'])) {
     
        $db_user = "root";
        $db_password = "";
        $db_name = "addemp";

        $conn = new mysqli("localhost", $db_user, $db_password, $db_name);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $uid = $_POST['uid'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $qua = $_POST['qua'];
        $gender = $_POST['gender'];
        $dateofbirth = $_POST['dob'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $phno = $_POST['phno'];
        $password = $_POST['pwd'];
        $uid = $_POST['uid'];
        $exp = $_POST['exp'];
        $field = $_POST['field'];
        


        $check_query = "SELECT * FROM udet WHERE uid = '$uid'";
        $result = $conn->query($check_query);

        if ($result->num_rows > 0) {
            echo "User with the provided UserID already exists. Please choose a different UserID.";
        } else {
            
            $insert_query = "INSERT INTO udet (uname, email, qua, gender, dob, age, address, phno, password, uid, exp, field) VALUES ('$uname', '$email', '$qua', '$gender', '$dateofbirth', '$age', '$address', '$phno', '$password', '$uid' ,'$exp','$field')";

            if ($conn->query($insert_query) === TRUE) {
                echo "New record created successfully";
                header("Location: ulogin.php");
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