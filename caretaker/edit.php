<?php
	include('../connection.php');
 
	if( isset($_POST['edit']) )
	{
		$c_id = $_POST['hidden_cid'];
		$stats= $_POST['select_status'];
		$res= mysqli_query($conn,"update complaint set status='$stats' WHERE cid='$c_id'");
		//echo $c_id."<br>".$stats;
		echo '<script type=text/javascript> alert("Status Updated Successfully !!!!!")</script>';
		 header("Refresh : 0; URL=index.php?listall");
	}
 
	if( isset($_POST['status']) )
	{
		$status = $_POST['status'];
		$cid  	 = $_POST['cid'];
		$sql     = "UPDATE complaint SET status='$status' WHERE cid='$cid'";
		$res 	 = mysql_query($sql) 
        or die("Could not update".mysql_error());
		
	}
 
?>
