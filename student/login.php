<?php

    //$conn = new mysqli('localhost','root','root','complaint_nitc17');
    include('../connection.php');
    if(isset($_POST['student_login']))
    {
        $mail = trim($_POST['rollno']);
        $pass = trim($_POST['password']);

       // echo $mail;
        //echo $pass;
        $sql = "SELECT `rollno` FROM `student` WHERE `rollno`='$mail' AND `password`='$pass' and `active`='y'";

        $result = $conn->query($sql);

        echo $result->num_rows;
        if($result->num_rows>0)
        {
            session_start();
            $_SESSION['userMail'] = $mail;
            $_SESSION['userPass'] = $pass;
            header('location:index.php?loginDone');

        }else{

            echo '<script type=text/javascript> alert(" Register and activate your account before login :(")</script>';
          header("Refresh : 0; URL=../index.html");
           // echo '<a href="../index.html">Back to home page </a>';  



            //echo 'No result Found ...';
            //echo '<a href="../index.html">Back to home page </a>';        
        }
    }
?>