<?php
$conn = new mysqli('localhost','m150034ca','m150034ca','db_m150034ca');
if($_POST['fetchdata'])
{

	$sql = "SELECT * FROM `employee` WHERE 1";
	$result  = $conn->query($sql);
	if($result->num_rows>0)
	{
		

		echo '<table class="table table-striped table-bordered table-hover">
	            <thead>
	                <tr>
	                    <th>ID</th>
	                    <th>NAME</th>
	                    <th>LAST NAME </th>
	                    <th>EMAIL</th>
	                    <th>PASSWORD</th>   
	                </tr>
	            </thead><tbody>';
		while($r =$result->fetch_assoc())
		{
	            echo '<tr>
	                    <td>'.$r['id'].'</td>
	                    <td>'.$r['name'].'</td>
	                    <td>'.$r['lastname'].'</td>
	                    <td>'.$r['email'].'</td>
	                    <td>'.$r['pass'].'</td>   
	                  </tr>';
		}
		echo '</tbody></table>';
	}else{
		echo 'NO RESULT FOUND ...';
	}
}
?>