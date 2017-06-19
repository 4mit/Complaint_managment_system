<?php
$conn = new mysqli("localhost","root","root","complaint_nitc17");
	
if($_POST)
{
	
	echo 'hello';
	/*$fn = mysqli_real_escape_string($conn,$_POST['fn']);
	$ln = mysqli_real_escape_string($conn,$_POST['ln']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$add1 = mysqli_real_escape_string($conn,$_POST['add1']);
	$add2 = mysqli_real_escape_string($conn,$_POST['add2']);
	$phone = mysqli_real_escape_string($conn,$_POST['phone']);

	
	if(preg_match("/[a-zA-Z]{3,50}/",$fn) && preg_match("/[a-zA-Z]{3,50}/",$ln) )
	{
		if(preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/", $email))
		{
			if(preg_match("/[789]\d{9}/",$phone))
			{
				
				$search  = "select email FROM users WHERE email='$email'";
				$execute_search=$conn->query($search);
				$search_result = mysqli_num_rows($execute_search);
				
				if($search_result>0){
					
					echo "<script>alert('Cant Procced Email Already registered')</script>";
					die();
				
				}else{

					$sql = "insert into `users` values('$fn','$ln','$email','$add1','$add2','$phone')";													
					$q2=$conn->query($sql);
					if($q2){
							echo '<script>alert("Thank You For registration ...!")</script>'; 
					
					}else{
							echo '<script>alert("Cant  registration ...!")</script>';  					 
					}					
				}	
			}
			else{ 
				
				echo "Please Check Contact Number "; 
				die();	
			}	 //email done 			
		}else{
			
			echo "Error In Email Address";
			die();
			
		}//checking contact done 
	} //checking name Done 
	else{ echo "Please Check Name";}	
}	
*/
}
?>

