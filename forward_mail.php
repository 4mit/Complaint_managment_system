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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Forget password !!</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/textt.css">
    </head>
    <body>
    <style>
body{
   background-image:url(images/img-1.jpg);
}
.star{
  color:red;
}

</style>

      <form action="forward_mail.php" method="post">
      
        <h1>Student Forget password !!</h1>
        
        <fieldset>
          <legend><span class="number">1</span>Your basic information</legend>
                
          <label for="name">Enter Your Email::</label>
          <input type="email" id="email" name="email" required>
                
                                             
        </fieldset>
        <button type="submit">Recover Your Password</button>
      </form>
      
    </body>
</html>
</body>
</html>