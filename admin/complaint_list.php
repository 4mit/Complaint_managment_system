<?php
session_start();
if(!isset($_SESSION['userMail'])){
    header('location:login.php');
}

 //$conn  = new mysqli('localhost','root','root','complaint_nitc17');
 include('../connection.php');


function show_forward_form(){
    echo '<form action="index.php" method="GET" > 
                <table class="table">                 
                    <tr>
                      <td>Forward To </td>
                      <td><input class="form-control" type="text" name="email" placeholder="Enter Email Addredd to foreward to "></td>
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
    <title>Welcome Admin</title>
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
<script>
function myFunction() {
    window.print();
}
</script>
        <!-- /. NAV SIDE  -->
        
                    
                           
                 
            <div class="row">         
                <div class="col-md-12 col-sm-12 col-xs-12">                     
                    <div class="panel panel-default">
                        
                                            
                                    <?php
                                        if(isset($_GET['listall']))
                                        {

                                            $listAll = "SELECT * FROM `complaint` WHERE 1";
                                            $result = $conn->query($listAll);

                                              if($result->num_rows>0){
                                                echo '<div class="panel-heading">
                            <h2 align="center">List All Complaints</h2> 
                        </div>

                        <div class="panel-body">

                            <div class="" id="listAll">';

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
                                                         // echo  '<td><a href="index.php?forwardId='.$temp['cid'].'">Forward</a></td>'; 
                                                        //echo  '<td><a href="index.php?deleteId='.$temp['cid'].'">Delete </a></td><tr>'; 

                                                    }
                                                    echo '</table>';

                                                       


                                                  } else{


                                                echo 'No Complaint is found ';
                                              }  

                                        }



                                    ?>
                             


  <center><button onclick="myFunction()">Export</button>
          <a href="index.php?listall"><input type="button" value="Back" /></a></center>

    <script src="assets/js/jquery-1.10.2.js"></script>  
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>

    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>