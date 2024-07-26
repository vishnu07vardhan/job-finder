<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['uid'])) {
    $jobid = $_POST['jobid'];
    $uid = $_POST['uid'];

    $target_dir = "resumes/";
    $target_file = $target_dir . basename($_FILES["resume"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["resume"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if ($fileType != "pdf" && $fileType != "doc" && $fileType != "docx") {
        echo "Sorry, only PDF, DOC, and DOCX files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";

    } else {
        if (move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file)) {
 
            $db_user = "root";
            $db_password = "";
            $db_name = "addemp";
            
            $conn = new mysqli("localhost", $db_user, $db_password, $db_name);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO enrollments (jobid, uid, resume_path) VALUES ('$jobid', '$uid', '$target_file')";
            if ($conn->query($sql) === TRUE) {
                echo "Application submitted successfully.";
                header("Location: uapjb.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    header("Location: ulogged.php");
    exit();
}
?>
