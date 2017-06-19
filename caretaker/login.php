<?php

   // $conn = new mysqli('localhost','root','root','complaint_nitc17');
    include('../connection.php');
    if(isset($_POST['caretaker_login']))
    {
        $mail = trim($_POST['email']);
        $pass = trim($_POST['password']);

       // echo $mail;
        //echo $pass;
        $sql = "SELECT `email` FROM `caretaker` WHERE `email`='$mail' AND `password`='$pass'";

        $result = $conn->query($sql);

        echo $result->num_rows;
        if($result->num_rows>0)
        {
            session_start();
            $_SESSION['userMail'] = $mail;
            $_SESSION['userPass'] = $pass;
            header('location:index.php?loginDone');

        }else{

            echo '<script type=text/javascript> alert(" Invalid caretaker !!!!!..Try Again")</script>';
          header("Refresh : 0; URL=../index.html");
           // echo '<a href="../index.html">Back to home page </a>';  



            //echo 'No result Found ...';
            //echo '<a href="../index.html">Back to home page </a>';        
        }
    }
?>
