<?php
include('config.php');



?>





<!DOCTYPE html>
<html>

<head>

	<title>Foreign Key2</title>
	
	<style>
	
	body {
		font-family: Arial, Helvetica, sans-serif;
		}
		
		
		form {
			border: 3px solid #f1f1f1;
			
			}
		
		
		div{
			padding:16px;
		}
		
		
		input[type="text"],input[type="password"]{

		display:inline-block;
			box-sizing:border-box;
		}
	</style>
</head>

<body>
<h2><b>Registration form</b></h2>

	<form method="POST" ">
	
	<div>
	
	<label>Name</label><br><br>
	<input type="text" name="name" placeholder="Enter Name" required><br><br>
	
	
	<label>Contact Number</label><br><br>
	<input type="number" name="mno" placeholder="Enter Contact Number" required><br><br>
	
	
	<label>Username(Email-Id)</label><br><br>
	<input type="email" name="email" placeholder="Enter Email address" required><br><br>
	
	
	<label>Password</label><br><br>
	<input type="password" name="pass" placeholder="Enter Password" required><br><br>
	
	
	
	<input type="submit" name="send"  value="Register"><br><br>
	
	</div>
	</form>

</body>
</html>

<?php

if(isset($_POST['send']))
{
		$n=	$_POST['name'];
		$m=$_POST['mno'];
	$uname=$_POST['email'];
		$p=$_POST['pass'];



$conn=mysqli_connect($servername,$username,$password,$dbname);


	if($conn)
	{
		/*
		
		$sql="insert into nuser(name,username,password,mno)values('$n','$uname','$p','$m')";
	$res=mysqli_query($conn,$sql);
	if($res)
	{
										//echo"User created successfully";
										//echo"<script> alert('	usercreated successfull')</script>";
			header('Location:index.php');
	}
	else
	{
		echo"failed to create user";
	}
	
	
	if($res)
	{
		
	}
		*/
		//CHECKING USERNAME IS ALREADY EXISTS OR NOT
		
	$sqlchk="select * from nuser where username='$uname'";
	$reschk=mysqli_query($conn,$sqlchk);
	$nchk=mysqli_num_rows($reschk);

	//echo$nchk;   RETURNS 1 IF ALREADY USER EXISTS
	
	
		if($nchk==0)
		{
			$sql="insert into nuser(name,username,password,mno)values('$n','$uname','$p','$m')";
			$res=mysqli_query($conn,$sql);
				if($res)
				{
					echo"User created	successfully";
				}
				
				else
				{
					echo"failed to create";
				}
		}
		
	else
	
				{
					echo"Username already exists";
				}
		}
	
	else
	{
		echo"connection failed";
	}
}


?>