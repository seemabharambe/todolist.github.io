<?php

include('config.php');
session_start();
//echo $_SESSION['uname'];
if(!isset($_SESSION['uname']))						//for unauthorised user,if session is created then delete this session, and try to login.it will rediredted to index.php.
{
	header('location:index.php');
}


	$conn=mysqli_connect($servername,$username,$password,$dbname);
	$id=$_SESSION['userid'];  //session created
		if($conn)
			{
				$sql="select * from task where uid='$id'";    //session display particlur record of particulaar user
				$res=mysqli_query($conn,$sql);
			//	echo $res; recorable error
			
				$n=mysqli_num_rows($res);
			//	if($n>0)
				if($n==0)	
				{
					/*while($row=mysqli_fetch_assoc($res))
					{
						print_r($row);
						print("<br>");
					}
					*/
				echo"No records display";
				}
				else
				{
					echo"";
				}
			}
		else
		{
			echo"Failed to connect";
		}




?>



<html>
<head><title>DASHBOARD</title>
<style>
h2{
	text-align:center;
	font-size:bold;
	text-transform:uppercase;
	padding:26px;
}
.a1{
		float:right;
		background-color:blue;
		
}

.a2{
	font-size:bold;

}


</style>

</head>

<body>

	<h2>DASHBOARD</h2><br><br>
	<button class="a1" ><a href="Logout.php">Logout</a></button>
	<button class="a2"><h3><a href="form1.php" target="_blank">Add tasks</a></h3></button>
	
	<table border=1 align="center" width="50%" text="center">
		<tr>
			<th>Title</th>
			<th>Details</th>
			<th>Date</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	
				<?php
					while($row=mysqli_fetch_assoc($res))
					{
				
				?>
				
					<tr>
							<td><?Php  echo $row['title'];?></td>
	
							<td><?Php  echo $row['details'];?></td>
							
							<td><?Php  echo $row['date'];?></td>
							
							<td><a href="edit.php?tid=<?php echo $row['id']?>">edit</a></td>
							
							<td><a href="delete.php?tid=<?php echo $row['id']?>">Delete</a></td>
							
					</tr>
					
			<?php
				
					
					
					}
			
			?>
	</table>

	
</body>
</html>
		
	