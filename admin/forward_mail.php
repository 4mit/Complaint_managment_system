<?php
  $mail = @$_GET['mail'];
if(isset($_POST['send']))
{
  $header ="From : CMSNITC17<cmsnitc17@gmail.com>";
  $email=$_POST['email'];
  $msg = $_POST['msg'];
  if(mail($email,$header,$msg))
  {
  echo "<script>alert('email sent')</script>";
  echo "<script>window.open('index.php','_self')</script>";
  }
else {
  echo "<script>alert('email not sent check some errors here')</script>";
  
  }
}
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<form action="forward_mail.php" method="post">
<table border="5" class="table">
        <tbody><tr>
          <td colspan="2" align="center"><h3>Email Confirmation Form !</h3></td>
        </tr>
	
	<tr>
          <td>Email</td>   
          <td><input type="text" class="form-control" value='<?php echo $mail ?>' readonly />
          </td>
        </tr>
        
	<tr>
          <td>To:</td>   
          <td><input type="email" class="form-control" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
          </td>
        </tr> 
	<tr>
          <td>Message:</td>   
          <td><textarea cols="20" row="20" name="msg" required></textarea>
          </td>
        </tr>
       
	 <tr>
          <td colspan="2">
            <div class="text-center"><button class="btn btn-danger" name="send" value="send mail" type="submit">Send Mail</button>
            <a href="index.php"><input type="button" class="btn btn-danger" value="Back" /></a>
            </div>
          </td>
        </tr>
     </tbody>
</table>
</form>
</body>
</html>