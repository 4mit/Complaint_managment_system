<?php
//$conn = mysqli_connect("localhost","root","root","complaint_nitc17") or die("data base not connected");
include('connection.php');
	$tid = $_POST['tid'];
	$name = $_POST['name'];
	$ctype = $_POST['ctype'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$password =$_POST['password'];
	$sql="select email from caretaker where email='$email'";
	$res=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($res);
	//echo $count;
		//echo$name;
   if($count>0)
    {
    	echo '<script type=text/javascript> alert("you are already registered!!!!!")</script>';
          header("Refresh : 0; URL=admin/index.php?loginDone");
    }
    else{

    	  $sql1="insert into caretaker (tid,name,ctype,contact,address,email,password) values('$tid','$name','$ctype','$contact','$address','$email','$password')";
	   if ($conn->query($sql1) === TRUE) 
	   {
       echo '<script type=text/javascript> alert("Registered successfully!!!!!......login Now.")</script>';
     header ("Refresh : 0; URL=admin/index.php?loginDone");
}
     }
     






    
	
	
?>

