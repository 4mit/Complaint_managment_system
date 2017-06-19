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
                <a class="navbar-brand" href="index.html" style="background-color:black;">Welcome <?php echo $_SESSION['userMail'];?></a> 
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
                        <a  href="../createcomplaint.html" id="createAll"><i class="fa fa-desktop fa-2x"></i>Create a Complaint</a>
                    </li>
                    <li>
                        <a  href="index.php?listall" id="listAll"><i class="fa fa-desktop fa-2x"></i>List All Complaints</a>
                    </li>

                    <li>
                         <a  href="index.php?approvedall" id="approvedAll"><i class="fa fa-desktop fa-2x"></i>Approved Complaints</a>
                    </li>
                    <li>
                        <a  href="index.php?discardall" id="discardAll"><i class="fa fa-desktop fa-2x"></i>Discard Complaints</a>
                    </li>
                     <li>
                        <a  href="index.php?pendingall" id="pendingAll"><i class="fa fa-desktop fa-2x"></i>Pending Complaints</a>
                    </li>

                    <li>
                         <a  href="../changepassnew.html" id="All"><i class="fa fa-desktop fa-2x"></i>Change Password</a>
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
  
    <script src="assets/js/jquery-1.10.2.js"></script>  
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>

    <script src="assets/js/custom.js"></script>
    
   
</body>
<?php
}
?>
</html>
