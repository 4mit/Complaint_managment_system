<?php
//$conn = mysqli_connect("localhost","root","root","complaint_nitc17") or die("data base not connected");
include('connection.php');

	$sid = $_POST['sid'];
	$SEmail = $_POST['SEmail'];
	$type = $_POST['type'];
	$Cby = $_POST['Cby'];
	$description = $_POST['description'];
	/*$sql="select rollno from student where rollno='$sid'";
	//$res=mysqli_query($conn,$sql);
	//$count=mysqli_num_rows($res);
	//echo $count;
	//if($password==$cpassword)
	//{
		//echo $password;
	//echo $cpassword;
	//echo$rollno;
	//echo$name;
   //if($count>0)
    //{
    	echo '<script type=text/javascript> alert("you are valid Student!!!!!......Proceed Now")</script>';
         // header("Refresh : 0; URL=index.html");
    }
    else{
*/
       $sql1="insert into complaint (cid,description,type,sid,SEmail,status,Cby) values('12121','$description','$type','$sid','$SEmail','1','$Cby')";
       $res=mysqli_query($conn,$sql1);
	   if ($res) 
	   {
       echo '<script type=text/javascript> alert("Registered successfully!!!!!......login Now.")</script>';
       header("Refresh : 0; URL=index.html");
		}
     else{
     	echo "invalid try again";
         }
     





    
	
	
?>

