<?php

    $conn = new mysqli('localhost','root','root','complaint_nitc17');
    if(isset($_POST['student_login']))
    {
        $roll = trim($_POST['rollno']);
        $pass = trim($_POST['password']);

        echo $roll;
        echo $pass;
        $sql = "SELECT `rollno` FROM `student` WHERE `rollno`='$roll' AND `password`='$pass'";

        $result = $conn->query($sql);

        echo $result->num_rows;
        if($result->num_rows>0)
        {
            session_start();
            $_SESSION['userMail'] = $roll;
            $_SESSION['userPass'] = $pass;
            header('location:index.php?loginDone');

        }else{

            echo 'No result Found ...';
            echo '<a href="../index.html">Back to home page </a>';        
        }
    }
?>
