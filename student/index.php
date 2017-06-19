<?php
session_start();
if(!isset($_SESSION['userMail'])){
    header('location:student/login.php');
}
else
{
    $userMail=$_SESSION['userMail'];
 //$conn  = new mysqli('localhost','root','root','complaint_nitc17');
include('../connection.php');
        //$sql_query="select Cby from complaint where SEmail ='".$_SESSION['userMail']."'";
      //  $r=mysqli_query($conn,$sql_query);
       // $result=mysqli_fetch_assoc($r);
       // $_SESSION['ajay']=$result['Cby'];

function show_forward_form(){
    echo '<form action="index.php" method="GET" > 
                <table class="table">                 
                    <tr>
                      <td>Forward To </td>
                      <td><input class="form-control" type="text" name="email" placeholder="Enter Email Address to forward to "></td>
                    </tr>
                    
                     <tr>
                      <td ></td>
                      <td><button type="submit" class="btn btn-danger"  name="forwardd" >Forward Now </button></td>
                    </tr>       
              </table>
          <form>';

}

?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome Student</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<style>
    .navbar{background-color: black;}
    .navbar-header{background-color:black;}
    .nav li{background-color:black;}
</style>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html" style="background-color:black;font-size:26px;"><i class="fa fa-user-circle" aria-hidden="true">&nbsp;</i><?php echo $_SESSION['userMail'];?></a> 
            </div>

        <div style="color: white;
            padding: 15px 50px 5px 50px;
            float: right;
            font-size: 16px;">
        <div id="txt" style="color:white;">
            
        </div><a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        
        </nav>   

        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				               
                    <li>
                        
                        <a id="create" data-toggle="modal" data-target="#myModalc"><i class="fa fa-desktop fa-2x"></i>Create Complaint</a>
                    </li>

                    <li>
                        <a  href="index.php?listall" id="listAll"><i class="fa fa-desktop fa-2x"></i>List All Complaints</a>
                    </li>

                    <li>
                         <a  href="index.php?approvedall" id="approvedAll"><i class="fa fa-desktop fa-2x"></i>Approved Complaints</a>
                    </li>
                    <li>
                        <a  href="index.php?discardall" id="discardAll"><i class="fa fa-desktop fa-2x"></i>Discarded Complaints</a>
                    </li>
                     <li>
                        <a  href="index.php?pendingall" id="pendingAll"><i class="fa fa-desktop fa-2x"></i>Pending Complaints</a>
                    </li>

                   <li>
                        
                        <a id="careAll" data-toggle="modal" data-target="#myModala"><i class="fa fa-desktop fa-2x"></i>change password</a>
                    </li>


                </ul>
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                    
                           
                 
            <div class="row">         
                <div class="col-md-12 col-sm-12 col-xs-12">                     
                    <div class="panel panel-default">
                        

                       
                                    <?php
                                        if(isset($_GET['listall']))
                                        {
                                            $listAll = "SELECT * FROM complaint WHERE sid='$userMail'";
                                           // $listAll = "SELECT * FROM `complaint` WHERE 1";
                                            $result = $conn->query($listAll);

                                              if($result->num_rows>0){
                                                echo' 
                                                <div class="panel-heading">
                            <h2 align="center">List All Complaints</h2> 
                        </div><div class="panel-body">

                            <div class="" id="lisAll">
                                            ';

                                                     echo '<table class="table ">';
                                                    echo '<tr><th>CID</th>
                                                            <th>Description</th>
                                                            <th>Type</th>
                                                            <th>SID</th>
                                                            <th>Student Email</th>
                                                            <th>Status</th>
                                                            <th>Complaint By</th>
                                                           <tr>';

                                                               
                                                    while($temp = $result->fetch_assoc()){
                                                         echo  '<tr><td>'.$temp['cid'].'</td>';                                                                
                                                        echo  '<td>'.$temp['description'].'</td>'; 

                                                        echo  '<td>'.$temp['type'].'</td>'; 
                                                        echo  '<td>'.$temp['sid'].'</td>'; 
                                                        echo  '<td>'.$temp['SEmail'].'</td>'; 
                                                        echo  '<td>'.$temp['status'].'</td>'; 
                                                        echo  '<td>'.$temp['Cby'].'</td>'; 
                                                          /*echo  '<td><a href="index.php?forwardId='.$temp['cid'].'">Forward</a></td>'; 
                                                        echo  '<td><a href="index.php?deleteId='.$temp['cid'].'">Delete </a></td><tr>'; */

                                                    }
                                                    echo '</table>';

                                                       


                                                  } else{


                                                echo 'No Complaint is found ';
                                              }  

                                        }



                                    ?>
                             
<!--Approved Complaint starts here-->
 <div id="page-wrapper1" >
            <div id="page-inner1">
         
                 
                           
                 
            <div class="row1">         
                <div class="col-md-12 col-sm-12 col-xs-121">                     
                    <div class="panel panel-default1">
                        

                        
                                            
                                    <?php
                                        if(isset($_GET['approvedall']))
                                        {

                                            $approvedAll = "SELECT * FROM complaint WHERE sid='$userMail' and status='approved'";
                                            $result = $conn->query($approvedAll);

                                              if($result->num_rows>0){
                                                echo'<div class="panel-heading1">
                            <h2 align="center">Approved Complaints </h2> 
                        </div>
                                                <div class="panel-body1">

                            <div class="" id="approvedAll">';

                                                     echo '<table class="table ">';
                                                    echo '<tr><th>CID</th>
                                                            <th>Description</th>
                                                            <th>Type</th>
                                                            <th>SID</th>
                                                            <th>Student Email</th>
                                                            <th>Status</th>
                                                            <th>Complaint By</th>
                                                            <tr>';

                                                               
                                                    while($temp = $result->fetch_assoc()){
                                                         echo  '<tr><td>'.$temp['cid'].'</td>';                                                                
                                                        echo  '<td>'.$temp['description'].'</td>'; 

                                                        echo  '<td>'.$temp['type'].'</td>'; 
                                                        echo  '<td>'.$temp['sid'].'</td>'; 
                                                        echo  '<td>'.$temp['SEmail'].'</td>'; 
                                                        echo  '<td>'.$temp['status'].'</td>'; 
                                                        echo  '<td>'.$temp['Cby'].'</td>'; 
                                                          /*echo  '<td><a href="index.php?forwardId='.$temp['cid'].'">Forward</a></td>'; 
                                                        echo  '<td><a href="index.php?deleteId='.$temp['cid'].'">Delete </a></td><tr>'; */

                                                    }
                                                    echo '</table>';

                                                       


                                                  } else{


                                                echo 'No Complaint is found ';
                                              }  

                                        }



                                    ?>
 

<!--ends here-->


<!--Discard Complaint starts here-->
 <div id="page-wrapper2" >
            <div id="page-inner2">
         
                                 
                 
            <div class="row2">         
                <div class="col-md-12 col-sm-12 col-xs-122">                     
                    <div class="panel panel-default2">
                        
                                            
                                    <?php
                                        if(isset($_GET['discardall']))
                                        {

                                            $discardAll = "SELECT * FROM complaint WHERE sid='$userMail' and status='discarded'";
                                            $result = $conn->query($discardAll);

                                              if($result->num_rows>0){
                                                echo'<div class="panel-heading2">
                            <h2 align="center">Discard Complaints </h2> 
                        </div>

                        <div class="panel-body2">

                            <div class="" id="discardAll">';

                                                     echo '<table class="table ">';
                                                    echo '<tr><th>CID</th>
                                                            <th>Description</th>
                                                            <th>Type</th>
                                                            <th>SID</th>
                                                            <th>Student Email</th>
                                                            <th>Status</th>
                                                            <th>Complaint By</th>
                                                            <tr>';

                                                               
                                                    while($temp = $result->fetch_assoc()){
                                                         echo  '<tr><td>'.$temp['cid'].'</td>';                                                                
                                                        echo  '<td>'.$temp['description'].'</td>'; 

                                                        echo  '<td>'.$temp['type'].'</td>'; 
                                                        echo  '<td>'.$temp['sid'].'</td>'; 
                                                        echo  '<td>'.$temp['SEmail'].'</td>'; 
                                                        echo  '<td>'.$temp['status'].'</td>'; 
                                                        echo  '<td>'.$temp['Cby'].'</td>'; 
                                                         /* echo  '<td>
                                                         <a href="index.php?forwardId='.$temp['cid'].'">Forward</a></td>';
                                                        echo  '<td><a href="index.php?deleteId='.$temp['cid'].'">Delete </a></td><tr>'; */

                                                    }
                                                    echo '</table>';

                                                       


                                                  } else{


                                                echo 'No Complaint is found ';
                                              }  

                                        }



                                    ?>





<!--ends here-->

<!--Pending Complaint starts here-->
 <div id="page-wrapper3" >
            <div id="page-inner3">
         
                 
                         
                 
            <div class="row3">         
                <div class="col-md-12 col-sm-12 col-xs-123">                     
                    <div class="panel panel-default3">
                       
                                            
                                    <?php
                                        if(isset($_GET['pendingall']))
                                        {

                                            $pendingAll = "SELECT * FROM complaint WHERE sid='$userMail' and status='pending'";
                                            $result = $conn->query($pendingAll);

                                              if($result->num_rows>0){
                                                echo' <div class="panel-heading3">
                            <h2 align="center">Pending Complaints </h2> 
                        </div>

                        <div class="panel-body3">

                            <div class="" id="pendingAll">';

                                                     echo '<table class="table ">';
                                                    echo '<tr><th>CID</th>
                                                            <th>Description</th>
                                                            <th>Type</th>
                                                            <th>SID</th>
                                                            <th>Student Email</th>
                                                            <th>Status</th>
                                                            <th>Complaint By</th>
                                                            <tr>';

                                                               
                                                    while($temp = $result->fetch_assoc()){
                                                         echo  '<tr><td>'.$temp['cid'].'</td>';                                                                
                                                        echo  '<td>'.$temp['description'].'</td>'; 

                                                        echo  '<td>'.$temp['type'].'</td>'; 
                                                        echo  '<td>'.$temp['sid'].'</td>'; 
                                                        echo  '<td>'.$temp['SEmail'].'</td>'; 
                                                        echo  '<td>'.$temp['status'].'</td>'; 
                                                        echo  '<td>'.$temp['Cby'].'</td>'; 
                                                        /*  echo  '<td><a href="index.php?forwardId='.$temp['cid'].'">Forward</a></td>'; 
                                                        echo  '<td><a href="index.php?deleteId='.$temp['cid'].'">Delete </a></td><tr>'; */

                                                    }
                                                    echo '</table>';

                                                       


                                                  } else{


                                                echo 'No Complaint is found ';
                                              }  

                                        }



                                    ?>





<!--ends here-->




                                   <?php
                                    

                                    if(isset($_GET['deleteId']))
                                    {

                                        $temp = "DELETE FROM `complaint` WHERE `cid` = '".$_GET['deleteId']."'";
                                        if($conn->query($temp))
                                        {

                                              echo '<h2 align="center">Complaint Deleted Succesully </h2>';  
                                        }   
                                        else{

                                                echo '<h2 align ="center">Error While Deleting  </h2>';   
                                        }
                                        
                                            
                                    }



                                    if(isset($_GET['forwardId']))
                                    {

                                        show_forward_form();
                                            
                                    }

                                    //call Send Mail Function 

                                    if(isset($_GET['forwardd']))
                                    {

                                       // echo 'Send Mail is working Properly '; OK
                                        $getEmail = $_GET['email'];
                                        require 'sendMail/PHPMailerAutoload.php';
                                        $mail = new PHPMailer;                              
                                        $mail->isSMTP();                                      
                                        $mail->Host = 'smtp.gmail.com';   
                                        $mail->SMTPAuth = true;                               
                                        $mail->Username = 'YOUR EMAIL ADDRESS HERE ';              
                                        $mail->Password = 'YOUR PASSSWORD HERE ';                        
                                        $mail->SMTPSecure = 'ssl';                            
                                        $mail->Port = 465;                                    
                                        $mail->addAddress( $getEmail, 'SENDER NAME HERE ');
                                        $mail->isHTML(true);                               
                                        $mail->Subject = 'SOME TEXT HERE ';
                                        $mail->Body    = 'BODY HERE E';
                                        $mail->AltBody = 'ALTERNATE TEXT HERE';
                                        if(!$mail->send()) {
                                            echo 'Message could not be sent.';
                                            echo 'Mailer Error: ' . $mail->ErrorInfo;
                                        } else {
                                            echo '<h1>Message has not been sent</h1>';
                                            header('Location:inedx.php?SendMailDone=yes');
                                        }
                                            //Send Mail Ends Here
                                    }



                                    if(isset($_GET['SendMailDone']))
                                    {

                                        if($_GET['SendMailDone'] == 'yes'){

                                               echo '<div class="alert alert-success alert-dismissable">Forward mail Done SuccessFully </div>'; 
                                        }else{

                                                echo '<div class="alert alert-danger alert-dismissable">Invalied Trial ...  </div>'; 
                                        }

                                    }
                                    ?>     
                            </div>

                        </div>
                     
                    </div>            
                </div>
                
            </div>
                
              
    </div>
            </div>
        </div>
  <!-- Modal -->
  <div class="modal fade" id="myModala" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 align="center">Change Your Password !</h3>
        </div>
        <div class="modal-body">
          <form action="../changepassnew.php" method="post">
      
        
        
        <fieldset>
          <!--<legend><span class="number">1</span>Your Basic Information</legend>-->
            <!--<label for="userName">Roll No:</label>
          <input type="text" id="userName" name="userName"class="form-control" required>-->
          <label for="currentPassword">Old Password:</label>
          <input type="password" id="currentPassword" name="currentPassword"class="form-control"required>
          <label for="newPassword">New Password:</label>
          <input type="password" id="newPassword" name="newPassword"class="form-control">
          <label for="confirmPassword">Confirm Password :</label>
          <input type="password" id="confirmPassword" name="confirmPassword"class="form-control"required>
                                      
                        
        </fieldset>
        
        <button type="submit" name="submit"class="btn btn-danger">Change Your Password</button>
      </form>
        </div>
        
      </div>
      
    </div>
  </div>

<!-- Modal -->
  <div class="modal fade" id="myModalc" id="create" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h3 align="center">Complaint Registration Form !</h3>
        </div>
        <div class="modal-body">
           <form action="../createcomplaintt.php" method="POST">
      
        
        
        <fieldset>
        
           <!-- <label for="rollno">Student ID:</label>
          <input type="text" id="sid" name="sid"
class="form-control" pattern="[a-zA-Z][0-9][0-9][0-9][0-9][0-9][0-9][a-zA-Z]{2}" required="">-->
          <label for="Cby">Name:</label>
          <input type="text" id="Cby" name="Cby"
class="form-control" required="">
          <label for="name">Email:</label>
          <input type="email" id="email" name="email"
class="form-control" required="">
          
          <label for="type"
>Complaint Type:</label>
           <select id="type" name="type"
class="form-control" required="">
          
          <option value="Hostel">Hostel</option>
            <option value="Mess">Mess</option>
            <option value="Acedemic">Acedemics</option>
            <option value="Others">Others</option>
        </select>
                                  
          <!--<input type="date" id="date" name="date"
class="form-control" required="">-->
     <br>     <label for="description">Description:</label>
          <input type="text" id="description" name="description" required=""
class="form-control">
          
      
        </fieldset>
        <button type="submit"class="btn btn-danger">Complaint Now</button>
      </form>
        </div>
        
      </div>
      
    </div>
  </div>



    <script src="assets/js/jquery-1.10.2.js"></script>  
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>

   
    
   
</body>
<?php
}
?>
</html>