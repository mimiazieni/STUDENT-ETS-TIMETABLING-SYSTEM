<?php
$test = $_GET["status"];
if($test == "fail1")
{?>
	<script language='javascript'>
		alert('User already exist!');window.location="signUp.php";
	</script>
    <?php
}
else if($test == "fail2")
{?>
	<script language='javascript'>
		alert('User already exist!');window.location="signUp.php";
	</script>
    <?php
}
else if($test == "success")
{?>
	<center><script language="javascript"> alert("User registration success!");window.location="login.php?log=1";
	</script></center>
    <?php
}

include $_SERVER['DOCUMENT_ROOT'].'/timetabling/connectionHost.php';
if(isset($_POST['submit1']))
{
	/* capture values from HTML form */
	$name = $_POST['stuName'];
	$email = $_POST['stuEmail'];
	$id = $_POST['stuID'];
	$password1 = $_POST['password'];
	
	$sql2 = "SELECT stuID FROM student
			WHERE stuID = '".$id."'";
	$query2 = mysql_query($sql2) or die ("Error: " . mysql_error());
	$row2 = mysql_num_rows($query2);
	
	if($row2 != 0)
	{
		header("Location: signUp(connection).php?status=fail1");
	}
	else
	{
		$test = true;
		
		//Check for duplicate userName
		$sql2 = "SELECT stuEmail FROM student
				 WHERE stuEmail = '".$email."'";
		$query2 = mysql_query($sql2) or die ("Error:" . mysql_error());
		$row2 = mysql_num_rows($query2);
		if($row2 != 0)
		{
			$test = false;
			header("Location: signUp(connection).php?status=fail2");
		}		
		else if($row2 == 0 && $test == true)
		{
			/* execute SQL INSERT command */
			$sql3 = "INSERT INTO student(stuName, stuEmail, stuID, password) 
			VALUES ('" . $name . "', '" . $email . "',  '" . $id . "','" . $password1 . "')";
			
			header("Location: signUp(connection).php?status=success");
			mysql_query($sql3) or die ("Error: ".mysql_error());
		}
	}
}
?>
