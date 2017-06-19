<?php
//$conn = mysqli_connect("localhost","root","root","complaint_nitc17") or die("data base not connected");
include('connection.php');
	$sid = $_POST['sid'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$description = $_POST['description'];
	//echo $sid.$name.$email.$description;
    

    $sql="select rollno from student where rollno='$sid' and email='$email'";
	$res=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($res);
	//echo $count;
	//if($password==$cpassword)
	//{
		//echo $password;
	//echo $cpassword;
	//echo$rollno;
	//echo$name;
   if($count>0)
    {
    //	echo '<script type=text/javascript> alert("you are already registered!!!!!......login Now.")</script>';
       //  header("Refresh : 0; URL=index.html");
   // }



    			$fid= rand(1,10000);

		  $sql1="insert into feedback (sid,name,email,description,fid) values ('$sid','$name','$email','$description',$fid)";
	   if ($conn->query($sql1) === TRUE) 
	   {

        //echo '<script type=text/javascript> alert("Thank You For Your Feedback")</script>';
        		/*  $sql1=" SELECT fid from feedback where email like '".$email."'";
        		    $result = $conn->query($sql1);
        		  if ($result)
        		  {
        		  

        		  $row=$result->fetch_assoc();
        		  $x=$row['fid'];*/
        echo '<script type=text/javascript> alert("Thank You For Your Feedback .Your Feedback Id is '.$fid.'")</script>';
        header("Refresh : 0; URL=index.html");
       }   
      
    }

else{
echo '<script type=text/javascript> alert("Invaild User !!!!!......login Now.")</script>';
         header("Refresh : 0; URL=index.html");
} 

		
?>