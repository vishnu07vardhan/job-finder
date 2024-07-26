<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Add employer</title>
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
            <h1>Add Employee Details</h1>
        </center>
        <form method="POST">
            Employee ID : <input type="text" name="empid" id="empid">
            <br><br>
            Employee Name : <input type="text" name="empname" id="empname">
            <br><br>
            Employee Email : <input type="email" name="email" id="email" placeholder="abc@email.com">
            <br><br>
            Company : 
            <br><select name="company" id="company">
                <option disabled selected>Selec company</option>
                <option >Meta</option>
                <option >Apple</option>
                <option >Samsung</option>
                <option >Accenture</option>
                <option >Amazon</option>
                <option >Tech Mahindra</option>
                <option >TCS</option>
                <option >Infosys</option>
            </select>
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
            Password : <input type="password" name="pwd" id="pwd">
            <br><br>
            <center>
                <button>Submit</button>
            </center>
        
        </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['empid'], $_POST['empname'], $_POST['email'], $_POST['company'], $_POST['gender'], $_POST['dob'], $_POST['age'], $_POST['address'], $_POST['phno'], $_POST['pwd'])) {
     
        $db_user = "root";
        $db_password = "";
        $db_name = "addemp";

        $conn = new mysqli("localhost", $db_user, $db_password, $db_name);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

       
        $empid = $_POST['empid'];
        $empname = $_POST['empname'];
        $email = $_POST['email'];
        $company = $_POST['company'];
        $gender = $_POST['gender'];
        $dateofbirth = $_POST['dob'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $phno = $_POST['phno'];
        $password = $_POST['pwd'];

        $sql = "INSERT INTO employee_details (empid, empname, email, company, gender, dob, age, address, phno, password) 
                VALUES ('$empid', '$empname', '$email', '$company', '$gender', '$dateofbirth', '$age', '$address', '$phno', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
     
        echo "Please fill out all required fields.";
    }
}
?>

