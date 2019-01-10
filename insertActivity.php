<?php
session_start();
/* include db connection file */
include("connectionHost.php");

//to get customer's email & ic
	if(isset($_SESSION['STUEMAIL']))
	{
		$id= $_SESSION['STUID'];
		$sqlone = "SELECT *
		   	FROM student
		   	WHERE stuID=$id";//the query for get all data in customer
		   
		   	$hasil = mysql_query($sqlone);
	
		if(isset($_POST['submit2']))
		{
		/* capture values from HTML form */
			$update3 = $_POST['update2'];
			$title3 = $_POST['title'];
			$DATEPICK = $_POST['date1'];
			$day = DateTime::createFromFormat('m/d/Y',$DATEPICK)->format('l');;
			$start_time = $_POST['timeStart'];
			$end_time = $_POST['timeEnd'];
			$mydate = DateTime::createFromFormat('m/d/Y',$DATEPICK)->format('Y-m-d');
			date_default_timezone_set("Asia/Kuala_Lumpur");
			$today = date("y/m/d");
	
			$sql2 = "SELECT * FROM SEMESTER WHERE status = 1";
			$result = mysql_query($sql2);
			$value = mysql_fetch_object($result);
			$startDate = $value->start_date;
			$endDate = $value->end_date;
			$endDate = strtotime($endDate);
			$counter = 0;
			for($i = strtotime($day, strtotime($startDate)); $i <= $endDate; $i = strtotime('+1 week', $i))
			{	
				if($i >= strtotime($value->sem_break_start) && $i <= strtotime($value->sem_break_end))
				{
				
				?>
				<script language="javascript"> 
				alert("The date you entered is mid semester break from 5-11-2018 until 11-11-2018!");
				window.location="homeafter.php";
				</script>
				<?php 
				}	
				else
				{
					$counter++;
					if($mydate == date('Y-m-d', $i) )
					{
						$timeStart3 = date('Y-m-d', $i)." ".$start_time;
						$timeEnd3 = date('Y-m-d', $i)." ".$end_time;
					
						$sql2 = "INSERT INTO course
						(stuID,update1, title1, day1,date_start,date_end,week)
						VALUES ('" . $id . "','" . $update3 . "','" . $title3 . "', '" . $day . "',  '" . $timeStart3. "', 
						 '" . $timeEnd3. "','" . $counter . "')";
						mysql_query($sql2) or die ("Error: " . mysql_error());	
				?>
	 
						<script language="javascript"> 
						alert("Successfully insert new activity!");window.location="studentTimetable.php";
						</script>
                <?php
				}
		}
}
	}}h
?>

