<?php
include('config.php');
session_start();
?>

<html>

<head>

	<title>Login</title>
	
	<style>
	body {
		font-family: Arial, Helvetica, sans-serif;
		}
		
		form {
			border: 3px solid #f1f1f1;
			}

	input[type=text], input[type=password] {
				width: 50%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				box-sizing: border-box;
}


	.div1{
		text-align:center;
		margin:24px 0 12px;
		width:40%;
		border-radius:50%;
	}
	
	div2{
		padding:16px;
	}
	
	</style>
</head>

<body>
	<h2><b>Login Form</b></h2>
	<form method="POST">
	
	<div class="div1">
	<img src="photo/log.png" alt="User">
	</div>
	
	
	<div class="div2">
	<label>Username</label><br><br>
	<input type="text" name="user" placeholder="Enter Username" required><br><br>
	
	<label>Password</label><br><br>
	<input type="password" name="pass" placeholder="Enter Password" required><br><br>
	
	
	<input type="submit" name="send"  value="Login"><br><br>
	
	New User? <a href="register.php" >Register</a><br><br>
	
	</div>
</form>
</bodY>
</html>


<?php
if(isset($_POST['send']))
{
	$u=$_POST['user'];
	$p=$_POST['pass'];
	
	$conn=mysqli_connect($servername,$username,$password,$dbname);
	
	if($conn)
	{

	$sql="select * from nuser where username='$u' && password='$p'";
		$res=mysqli_query($conn,$sql);
		$num=mysqli_num_rows($res);
		
		
		//accessing uid from the user table
		
		$row=mysqli_fetch_assoc($res);
		$uid=$row['uid'];
	
if($num)
		{
			$_SESSION['uname']=$u;                		//session created
			$_SESSION['userid']=$uid;					//session created
			
			header('Location:dashboard.php');
		}
		else
		{
		 echo"Invalid	username	and password";
		}  
	}
	else
	{
		echo"connection failed";
	}
	
	
	
}
?>