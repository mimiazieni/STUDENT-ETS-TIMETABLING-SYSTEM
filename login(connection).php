<?php
session_start();
/* include db connection file */
include("connectionHost.php");

if(isset($_POST['submit1']))
{
	/* capture values from HTML form */
	$email = $_POST['stuEmail'];
	$password1 = $_POST['password'];

	$sql = "SELECT * FROM student 
	WHERE stuEmail = '$email' AND 
	password = '$password1'";	
	$query = mysql_query($sql) or die("Error:" . mysql_error());
	$row = mysql_num_rows($query);
		
	if($row == 0)
	{
		header("Location: login.php?log=fail");	
	}
	else
	{
		$r = mysql_fetch_assoc($query);					
		$_SESSION['LEVEL'] = 1;
		$_SESSION['STUEMAIL'] = $r['stuEmail'];
		$_SESSION['STUID']= $r['stuID'];?>
	
		 <center>
	<script language="javascript"> 
		alert("Successfully login! This session available date from 3/9/2018 - 16/12/2018 except for 5/11/2018 - 11/11/2018 for mid semester break.");window.location="homeafter.php";
    </script> 
</center><?php
	}
	
}
?>
