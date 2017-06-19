	<?php 
	$conn = mysqli_connect("localhost","root","root","complaint_nitc17") or die("data base not connected");
	
		if(isset($_POST['submit']))
		{
		$un=$_POST['userName'];
		$cp=$_POST['currentPassword'];
		$np=$_POST['newPassword'];
		$cfp=$_POST['confirmPassword'];
		$sql_query="select * from student where rollno='$un'";
		$r=mysqli_query($conn,$sql_query);
		$result=mysqli_fetch_assoc($r);
		if($np==$cfp)
		{
			//echo $un."mayank";
		if(mysqli_num_rows($r)>0)
		{
			if($result["password"]==$cp)
			{
					$update_password="UPDATE student SET password='$np' WHERE rollno='$un'";
					if(mysqli_query($conn,$update_password))
					{
						echo '<script type=text/javascript> alert("Password Updated Sucessfully!!!")</script>';
						header("Refresh : 0; URL=index.html");
					//echo "update_password_sucessfully";
					}
					else
					{
						echo '<script type=text/javascript> alert("Error While Updating!!!")</script>';
						header("Refresh : 0; URL=sforget.html");
						//echo "Query not execute";
					}
			}
			else
			{
				echo '<script type=text/javascript> alert("Current Password Not Correct!!!")</script>';
				header("Refresh : 0; URL=sforget.html");
				//echo "Sorry !!! YOUR CURRENT PASSWORD IS NOT MATCH WITH DATA BASE";
			}
		}
		}
	
	
	else
	{
		echo '<script type=text/javascript> alert("New Password & confirmPassword  Not Matched!!!")</script>';
		header("Refresh : 0; URL=sforget.html");
		//echo "CONFORM PASSWORD OT MATCHED";
	}
}
	?>