<?php
session_start();
include 'dbconfig.php';
//$conn = new mysqli("localhost","root","root","complaint_nitc17");
include('connection.php');
echo "connected";
        $username = $_POST['username'];
        $password = $_POST['password'];
        $newpassword = $_POST['newpassword'];
        $confirmnewpassword = $_POST['confirmnewpassword'];
        $result = mysql_query("SELECT password FROM student WHERE rollno='$username'");
        if(!$result)
        {
        echo "The username you entered does not exist";
        }
        else if($password!= mysql_result($result, 0))
        {
        echo "You entered an incorrect password";
        }
        if($newpassword==$confirmnewpassword)
        $sql=mysql_query("UPDATE student SET password='$newpassword' where 

 rollno='$username'");
        if($sql)
        {
        echo "Congratulations You have successfully changed your password";
        }
       else
        {
       echo "Passwords do not match";
       }
      ?>