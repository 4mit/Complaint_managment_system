<?php
//$conn = mysqli_connect("localhost","root","root","complaint_nitc17") or die("data base not connected");
include('connection.php');

	$rollno = $_POST['rollno'];
	$name = $_POST['name'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword1'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$hostel =$_POST['hostel'];
	$course =$_POST['course'];
	$sql="select rollno from student where rollno='$rollno'";
	$res=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($res);
	//echo $count;
	if($password==$cpassword)
	{
		//echo $password;
	//echo $cpassword;
	//echo$rollno;
	//echo$name;
   if($count>0)
    {
    	echo '<script type=text/javascript> alert("you are already registered!!!!!......login Now.")</script>';
          header("Refresh : 0; URL=index.html");
    }
    else{

    	  $sql1="insert into student (rollno,name,password,contact,email,hostel,course) values('$rollno','$name','$password','$contact','$email','$hostel','$course')";
	   if ($conn->query($sql1) === TRUE) 
	   {
       echo '<script type=text/javascript> alert("Registered successfully!!!!!......login Now.")</script>';
       header("Refresh : 0; URL=index.html");
}
     }
     } 



else{
echo '<script type=text/javascript> alert("Password not matched !!!!!......login Now.")</script>';
         header("Refresh : 0; URL=index.html");
}


    
	
	
?>

