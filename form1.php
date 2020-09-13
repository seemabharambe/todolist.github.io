	
	
<?php
include('config.php');
session_start();

if(!isset($_SESSION['uname']))
{
	header('location:index.php');
}






if(isset($_POST['send']))
{
	$t=$_POST['t'];
	$det=$_POST['det'];
	$dat=$_POST['dat'];
	$userid=$_SESSION['userid'];
// $userid is varible ,we can take ANYNAME ,$_SESSION['userid'] is session name	
	
	/*
	PHP to DBMS
	
	1.Establish connection between PHP and DBMS
	2.Write sql query for the operations.
		insert ,delete,select,update
		insert into tablename(col1,col2,....coln)values(value1,value2.....value3);
	
	3.Execute the query.
	
	*/
	
	/*
	there is interface between dbms and php
	
	mysqli-interface.
	
	function to connect PHP to DBMS:
	
	$conn=$mysqli_connect(servername,username,password,databasename);
	e
	
	$conn-using this object we can store the value,and fire the query
	*/
	
	$conn=mysqli_connect($servername,$username,$password,$dbname);

			if($conn)
			{
				//After established successful connection ,try to inert value
				//echo"connection successful";
				$sql="insert into task(uid,title,details,date)values('$userid','$t','$det','$dat')";
				
				$res=mysqli_query($conn,$sql);
				
				if($res)
				{
					//echo"Record inserted successfultt";
					header('Location:dashboard.php');
				}
				else
				{
					echo"Failed to insert record";
				}
			
				
			}															
			/*$res=sql when values inserted sql returnrns 1 value means record */
		   /*inserted successfully. instead of value we take if else loop for not showing boolean value.*/
			else
			{
				echo"connection failed";
			}
		
		
		
}
?>




<!DOCTYPE html>
<html>
	<head>
			<title>TODO-LIST</title>
			<link rel="stylesheet" type="text/css" href="style.css"> 
	</head>
	
	<body>
	
		<form method="POST" >
			<div>
			<table style="color:black" "padding=10px">
				<tr>
					<td>Title</td>
					<td><input type="text" name="t" required></td>
					
				</tr>
				
				<tr>
					<td>Details</td>
					<td><input type="text" name="det" required></td>
					
				</tr>
				
				<tr>
					<td>Date</td>
					<td><input type="date" name="dat" required></td>
					
				</tr>
				
				<tr>
					<td><input type="submit" name="send" value="SAVE"></td>
					
				</tr>
			</table>
		</div>
				</form>
	</body>
</html>



