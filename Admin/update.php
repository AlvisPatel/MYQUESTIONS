<?php  
	require_once('../config.php');

	if(isset($_SESSION['u_email']))
	{
		header("location:index.php");
	}
	if(isset($_POST['btn_sub']))
	{
		$u_id=$_SESSION['u_id'];
		$u_name=$_POST['u_name'];	
		$u_email=$_POST['u_email'];
		$u_password=$_POST['u_password'];
		$u_description=$_POST['u_description'];
		$u_DOB=$_POST['u_DOB'];
        $u_designation=$_POST['u_designation'];
        $u_contry=$_POST['u_contry'];
        $u_state=$_POST['u_state'];

        $str="update users_details set u_name='$u_name' where u_id=$u_id" ;
        $result = mysqli_query($con,$str);
        header("location:profile.php");
	}
?>