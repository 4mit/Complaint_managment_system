<?php
//$conn = new mysqli("localhost","root","root","complaint_nitc17");
	include('connection.php');
if(isset($_POST['Savefeedback']))
{
		
	$roll 	= mysqli_real_escape_string($conn,$_POST['roll']);
	$fn 	= mysqli_real_escape_string($conn,$_POST['firsename']);
	$desc 	= mysqli_real_escape_string($conn,$_POST['desc']);
	$email 	= mysqli_real_escape_string($conn,$_POST['email']);			
	
	$search  = "select `rollno` FROM `student` WHERE rollno='$roll' AND email='$email'";

	$execute_search=$conn->query($search);
	$search_result = mysqli_num_rows($execute_search);
	
	if($search_result>0)
	{		

		$saveFeedback ="INSERT INTO `feedback` VALUES (NULL,'$roll','$fn','$desc','$email','o')";
		if($conn->query($saveFeedback))
		{
			echo 'Thank You for your feedback.';
		}else{
			echo 'Cant execute query';
		}		
		
		/*$stmt = $conn->prepare("INSERT INTO `feedback` (`fid`, `sid`, `name`, `description`, `email`, `status`) VALUES ('334', 'm150479ca', 'game google', 'google', 'amitamora@gmail.com', 'o')");
		//$stmt = $conn->prepare("INSERT INTO `feedback` (`fid`, `sid`, `name`, `description`, `email`,`status`) VALUES (:fid, :sid, :name, :description, :email, :status)");
		$fid ='NULL';
		$status ='o';
		$stmt->bindParam(':fid', $fid);
		$stmt->bindParam(':sid', $roll);
		$stmt->bindParam(':name', $fn);
		$stmt->bindParam(':description', $desc);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':status', $status);
		
		if($stmt->execute())
		{
				echo "Your Feedback is important , Thank You For feedback ...!"; 
		
		}else{
				echo '<script>alert("Cant  registration ...!")</script>';  					 
		}*/
	}else{

		echo "Your Roll Number is not registered Please contact to Admin";
							
	}	
}
?>

