<?php

// php code to search data in mysql database and set it in input text

if(isset($_POST['search']))
{
    // id to search
    $cid = $_POST['cid'];
    $cby = $_POST['Cby'];
    
    // connect to mysql
    include('../connection.php');
    
    // mysql search query
    $query = "SELECT `cid`, `Cby` FROM `complaint` WHERE `cid` = $cid LIMIT 1";
    
    $result = mysqli_query($connect, $query);
    
    // if id exist 
    // show data in inputs
    if(mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
        $cid = $row['cid'];
        $Cby = $row['Cby'];
       
      }  
    }
    
    // if the id not exist
    // show a message and clear inputs
    else {
        echo "Undifined ID";
           
    }
    
    
    mysqli_free_result($result);
    mysqli_close($connect);
    
}

// in the first time inputs are empty
else{
    $cid = "";
    $Cby = "";
    
}


?>