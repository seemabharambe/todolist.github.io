<?php
include('config.php');

session_start();

if(!isset($_SESSION['uname']))
{
	header('location:index.php');
}



$id=$_GET['tid'];


//echo $id;



//using GET method ,from url we retrive the value that is id.

//id of row 




$conn=mysqli_connect($servername,$username,$password,$dbname);



/*

check connection is successful or not,first check it ,then writ down query

insert $res value 0 or 1

update $res -bunch of rrecords//boolean value

delete boolean value return $res

if($conn)
{
	echo "connection suceessfull...";
}
else
{
	echo"Connection failed";
}
*/


if($conn)
	
	{
		$sql="delete from task where id='$id'";
		$res=mysqli_query($conn,$sql);
		
		if($res)
		{
			header('Location:dashboard.php');
			
		}
		
		else
		{
			echo"Unable to delete record";
		}
	}

else
	{
			echo"connection failed";
	}



?>