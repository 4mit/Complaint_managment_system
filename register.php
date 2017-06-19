<?php

//$conn = mysqli_connect("localhost","root","root","complaint_nitc17") or die("data base not connected");
include('connection.php');

$rollno = $_POST['rollno'];
$name = $_POST['name'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$hostel =$_POST['hostel'];
$course =$_POST['course'];
if($password==$cpassword)
{
		$sql="select * from student where rollno='$rollno'";
		$res=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($res);
	//	echo $count;

			//echo $password;
		//echo $cpassword;
		//echo$rollno;
		//echo$name;
		if($count>0)
		{
			echo '<script type=text/javascript> alert("you are already registered!!!!!......login Now.");
			location.href="index.html";</script>';
		}else{

			$sql1="insert into student (rollno,name,contact,email,hostel,course,password,active) values('$rollno','$name','$contact','$email','$hostel','$course','$password','n')";
			if (mysqli_query($conn,$sql1)) 
			{
				echo '<script type=text/javascript> alert("Registered successfully!!!!!......login Now.")</script>';
				$header ="From : CMSNITC17<cmsnitc17@gmail.com>";
				$email=$_POST['email'];
				$msg = "<a href=\"https://ajayram017.000webhostapp.com/active.php?usercode=".$_POST['email']."\">Activate Now</a>";
				mail($email,$header,$msg);            
	                    //mail();
				header("Refresh : 0; URL=index.html");

			}
	     }
	}else{
		echo '<script type=text/javascript> alert("Password not matched !!!!!......login Now.")</script>';
		header("Refresh : 0; URL=index.html");
	}



	
	
	?>