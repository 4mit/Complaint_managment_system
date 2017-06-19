<?php

$conn = mysqli_connect("localhost","id1382631_cmsnitc17","rootroot","id1382631_cmsnitc17");
if(isset($_GET['usercode'])){

	$sql="UPDATE `student` SET `active` = 'y' WHERE `student`.`email` ='".$_GET['usercode']."'";
	$res=mysqli_query($conn,$sql);
	if($res){

		header("Location:active.php?activated");	
	}

}

if(isset($_GET['activated'])){
	echo '<script type=text/javascript> alert("Activation Successful!!!")</script>';
						header("Refresh : 0; URL=https://ajayram017.000webhostapp.com/index.html");
}
else{
	echo 'Cant Login ...:(';
}