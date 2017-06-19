<?php

    //$conn = new mysqli('localhost','root','root','complaint_nitc17');
include('../connection.php');
    if(isset($_POST['admin_login']))
    {
        $mail = trim($_POST['email']);
        $pass = trim($_POST['passwd']);

        echo $mail;
        echo $pass;
        $sql = "SELECT `email` FROM `admin` WHERE `email`='$mail' AND `pass`='$pass'";

        $result = $conn->query($sql);

        echo $result->num_rows;
        if($result->num_rows>0)
        {
            session_start();
            $_SESSION['userMail'] = $mail;
            $_SESSION['userPass'] = $pass;
            header('location:index.php?loginDone');

        }else{

            echo 'No result Found ...';
            echo '<a href="../index.html">Back to home page </a>';        
        }
    }
?>
