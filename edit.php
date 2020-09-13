<?php

include('config.php');
session_start();

if(!isset($_SESSION['uname']))
{
	header('location:index.php');
}





$uid=$_GET['tid'];
//echo $uid; return boolean value record number



$conn=mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
	//echo"success";
	$sql="select * from task where id='$uid'";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($res);
	//print_r($row);
	
}

else
{
	echo"fail to connect";
}

?>





<html>
	<head>
			<title>Edit info</title>
			<link rel="stylesheet" type="text/css" href="style.css"> 
	</head>
	
	<body>
		<form method="POST" >
			<div>
			<table style="color:pink" "padding:px">
				<tr>
					<td>Title</td>
					<td><input type="text" name="t" value="<?php echo $row['title']?>"></td>
					
				</tr>
				
				<tr>
					<td>Details</td>
					<td><input type="text" name="det" value="<?php echo $row['details']?>"></td>
					
				</tr>
				
				<tr>
					<td>Date</td>
					<td><input type="date" name="dat" value="<?php echo $row['date']?>"></td>
					
				</tr>
				
				<tr>
					<td><input type="submit" name="send" value="UPDATE"></td>
					
				</tr>
			</table>
		</div>
				</form>
	</body>
</html>



<?php


if(isset($_POST['send']))
{
	$ntitle=$_POST['t'];
	$ndetail=$_POST['det'];
	$ndate=$_POST['dat'];
	
	if($conn)
	{
		//echo"connection successful";
		/*
		
		syantax
		*/
		
		
		$sql="update task set title='$ntitle',details='$ndetail',date='$ndate' where id='$uid'";
		
		$res=mysqli_query($conn,$sql);
		
		if($res)
		{
			header('Location:dashboard.php');
			
		}
		
		else
		{
		echo"Unable to update";	
		}
		
	}
	else
	{

	echo"connection failed!";	
	
	}
}
?>