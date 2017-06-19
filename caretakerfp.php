<?php 
	//$conn = mysqli_connect("localhost","root","root","complaint_nitc17") or die("data base not connected");
	include('connection.php');

		$nm=$_POST['name'];
		$rl=$_POST['rollno'];
		$em=$_POST['email'];
		$sql_query="select * from student where rollno='$rl' and email='$em'";
		$r=$conn->query($sql_query);
		$result=mysqli_fetch_assoc($r);
		//echo $un."mayank";
		if(mysqli_num_rows($r)>0)
		{
			$header = "From: <CMSNITC17@gmail.com>";
			$pass=$result['password'];
			if(mail($em,$header,"Your Login password: ".$pass))
			{
				echo '<script> alert("Your password is Sent to your Email please check Email !!!")</script>';
				echo "<script>window.open('index.html','_self')</script>";
			}
			else{
				echo "<script> alert('some error is occured !!!')</script>";
			}

					//echo '<script type=text/javascript> alert("Your password is '.$pass.' !!!")</script>';
						echo "<script>window.open('index.html','_self')</script>";
					//echo "update_password_sucessfully";
		}
					else
					{
						echo '<script type=text/javascript> alert("Invalid details try again !!")</script>';
						echo "<script>window.open('index.html','_self')</script>";
						//echo "Query not execute";
					}




	?>