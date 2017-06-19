 <html>
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search Results</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css">
       <link rel="stylesheet" href="css/textt.css">
    </head>

    <style>
    .button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;


    </style>
    
    <boby>


       
        <h1>Search Results !!</h1>
        
        <fieldset>
          <legend align="center"><span class="number">1</span>Your Search Information</legend>
          
   <?php
//$conn = mysqli_connect("localhost","root","root","complaint_nitc17") or die("data base not connected");

   session_start();
include('connection.php');

	$cby = $_POST['Cby'];
	$cid = $_POST['cid'];
	
	$sql="select * from complaint where cid='$cid' or Cby='$cby' and type='".$_SESSION['ajay'] ."'" ;
	$res=mysqli_query($conn,$sql);
    $n=mysqli_num_rows($res);
    if($n>0)
    {
?>
	<table align="center" border="1">
	<tr>
	<th>cid</th>
	<th>description</th>
	<th>sid</th>
	<th>type</th>
	<th>date</th>
	<th>Semail</th>
	<th>status</th>
	<th>Cby</th>
	</tr>
<?php
	while($row=mysqli_fetch_assoc($res))
	{
?>
	<tr>
	<td><?php echo $row['cid']; ?></td>
	<td><?php echo $row['description'];?></td>
	<td><?php echo $row['sid'] ?></td>
	<td><?php echo $row['type'] ?></td>
	<td><?php echo $row['date'] ?></td>
	<td><?php echo $row['SEmail'] ?></td>
	<td><?php echo $row['status'] ?></td>
	<td><?php echo $row['Cby'] ?></td></tr>
<?php	
	}
?>
	</table><center>
<a href="caretaker_search_complaints.html" class="button">Search Again!!</a></center>
<?php
}
else
{
echo '<script type=text/javascript> alert("Wrong Details entered !!!!!......Try Again.");
        document.location.href="caretaker/index.php?loginDone";</script>';
     
}
?>
                  
                        
        </fieldset>
      </form>
      
    </body>
</html>


