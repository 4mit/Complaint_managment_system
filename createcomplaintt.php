<?php
//$conn = mysqli_connect("localhost","root","root","complaint_nitc17") or die("data base not connected");
include('connection.php');
session_start();
	$sid = $_SESSION['userMail'];
	$email = $_POST['email'];
	$ctype = $_POST['type'];
	$cby = $_POST['Cby'];
	//$date = $_POST['date'];
	$description = $_POST['description'];
//	$res=mysqli_query($conn,$sql);
//	$count=mysqli_num_rows($res);
	//echo $count;
		//echo$name;
    	$sql1="insert into complaint (description,sid,type,SEmail,Cby) values('$description','$sid','$ctype','$email','$cby')";
		if ($conn->query($sql1) === TRUE) 
		{
    	echo '<script type=text/javascript> alert("Complaint Registered successfully!!!!!")</script>';
    	}

	else
	{
		echo '<script type=text/javascript> alert("Error While Registering!!!!!......login Now.")</script>';
	}
    	$sql= "select cid from complaint";
    	$res=mysqli_query($conn,$sql);
 //   	$row=mysqli_fetch_assoc($res);
		$count=mysqli_num_rows($res);
		$i=1;
		$var_cid="";
		while($row=mysqli_fetch_assoc($res))
		{
				if($i==$count){
				$var_cid=$row['cid'];}
				$i+=1;

		}
		//echo $i."<br>".$count;
    	echo "<script type=text/javascript> alert('Thank You For Complaint  .Your Complaint no is ".$var_cid."')</script>";
        
  header ("Refresh : 0; URL=student/index.php?loginDone");

?>

