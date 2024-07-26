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
    <div class="content">
       <center>
        <form action="admin.php" method="POST">
            <h1>Administration Login</h1>
            <br>
            <table >
                <tr>
                    <td style="border:none;"><h3>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h3></td>
                    <td style="border:none;"><input type= "email" name="email" id="email" required></td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td style="border:none;"><h3>Password : </h3></td>
                    <td style="border:none;"><input type="password" name="password" id="password" required></td>
                </tr>
            </table>
            <br>
            <br>
            <center>
                <button>Sign in</button>
            </center>
        </form>
       </center>
    </div>
    
</body>
</html>

<?php
session_start();
$user = "root";
$pwd = "";
$db = "addemp";
$con = mysqli_connect("localhost", $user, $pwd, $db) or die(mysql_error());

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password) && !is_numeric($email)) {
        $query = "SELECT * FROM admins WHERE email ='$email' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] == $password) {
                    $_SESSION['email'] = $user_data['email'];
                    header("Location: adminlogin.php");
                    die;
                }
            }
        }
        echo "<script type='text/javascript'> alert('wrong username or password')</script>";
    } else {
        echo "<script type='text/javascript'> alert('wrong username or password')</script>";
    }
}

?>
