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


       
<!--        <h1>Search Results !!</h1>
        
        <fieldset>
          <legend align="center"><span class="number">1</span>Your Search Information</legend>
    -->      
   <?php
//$conn = mysqli_connect("localhost","root","root","complaint_nitc17") or die("data base not connected");
include('connection.php');

   
    $cid = $_POST['cid'];
    
    $sql="select * from complaint where cid='$cid' " ;
    $res=mysqli_query($conn,$sql);
    $n=mysqli_num_rows($res);
//echo "out".$n;
if($n>0)
{
    while($row=mysqli_fetch_assoc($res))
    {
        echo "<script type=text/javascript> alert('Complaint Status is ".$row['status']." !!');
        document.location.href='index.html';</script>";
//echo "if".$n;
    
    
//     echo $row['status'];
   
    }
}
else
{
echo '<script type=text/javascript> alert("Wrong Details entered !!......Try Again.");
        document.location.href="index.html";</script>';
  //   echo "else".$n;
}
?>
                    
                        
        </fieldset>
      </form>
      
    </body>
</html>


