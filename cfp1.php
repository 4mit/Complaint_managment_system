	<?php 
	//$conn = mysqli_connect("localhost","root","root","complaint_nitc17") or die("data base not connected");
	include('connection.php');

		$nm=$_POST['name'];
		$em=$_POST['email'];
		$sql_query="select * from caretaker where tid='$nm' and email='$em'";
		$r=$conn->query($sql_query);
		$result=mysqli_fetch_assoc($r);
		//echo $un."mayank";
		if(mysqli_num_rows($r)>0)
		{
					echo '<script type=text/javascript> alert("Your password is '.$result['password'].' !!!")</script>';
						header("Refresh : 0; URL=index.html");
					//echo "update_password_sucessfully";
		}
					else
					{
						echo '<script type=text/javascript> alert("invalid details try again!!!")</script>';
						header("Refresh : 0; URL=index.html");
						//echo "Query not execute";
					}




	?>