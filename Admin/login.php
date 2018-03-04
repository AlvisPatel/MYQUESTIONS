<?php
	session_start();
	require_once('../config.php');
	if(isset($_SESSION['a_email']))
	{
	    header("location:index.php");
	}
	if(isset($_POST['btnSub']))
	{
		$a_email=$_POST['a_email'];
		$pwd=$_POST['pwd'];

		$str="Select u.* from users u,users_details d where u.u_email='$a_email' and u.u_password='$pwd' and u.u_id = d.u_id and d.u_type='admin' ;";
		$result=mysqli_query($con,$str) or die("Email or Password is wrong...!!!");
		// $rowCount=mysqli_num_rows($result);
		if(mysqli_num_rows($result)==1)
		{
			$row=mysqli_fetch_array($result);

			$_SESSION['a_id']=$row['u_id'];
			$_SESSION['a_email']=$row['u_email'];
			$_SESSION['pwd']=$row['u_password'];
			header("location:index.php");
		}
		else
		{
			echo"<script> alert('Email or Password is wrong...!!!')</script>";
		}
	}
?>

<html>
	<head>
			<meta charset="utf-8">
			<title>MyQuestions</title>
	</head>

	<body>
	    <center>
	    	<div><h2> Login </h2></div>
	    		<form action="" method="post">
				<table>
	            	<tr>
	                	<td>Enter the email :- </td>
	                    <td><input type="text" name="a_email"></td>
	                </tr>
	                <tr>
	                	<td>Enter the password :- </td>
	                    <td><input type="password" name="pwd"></td>
	                </tr>
	                <tr><td></td></tr>
	                <tr><td></td></tr>
	                <tr><td></td></tr>
	                <tr>
	                	<td align="right"><input type="submit" value="submit" name="btnSub" ></td>
	                    <td><input type="reset" value="Reset" name="btnReset" ></td>
	                </tr>
	            </table>
	        </form>
		</div>
	    </center>
	    </div>
	</body>
</html>
