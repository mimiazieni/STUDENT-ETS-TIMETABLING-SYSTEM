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
		if(isset($_POST['submit22']))
		{
					/* capture values from HTML form */
			$update3 = $_POST['update1'];
			$title3 = $_POST['title1'];
			$day = $_POST['day1'];
			$start_time = $_POST['timeStart1'];
			$end_time = $_POST['timeEnd1'];
				
			$sql2 = "SELECT * FROM SEMESTER WHERE status = 1";
					
			$result = mysql_query($sql2);
			$value = mysql_fetch_object($result);
			$papar=mysql_fetch_array($result);

			$startDate = $value->start_date;
			$endDate = $value->end_date;
			$endDate = strtotime($endDate);
			$counter = 1;
				for($i = strtotime($day, strtotime($startDate)); $i <= $endDate; $i = strtotime('+1 week', $i))
					{
						
						if($i >= strtotime($value->sem_break_start) && $i <= strtotime($value->sem_break_end))
						{
							echo "";
						}
						
						else 
							{
								?>
							 <?php	
							
							$timeStart3 = date('Y-m-d', $i)." ".$start_time;
							$timeEnd3 = date('Y-m-d', $i)." ".$end_time;
							$query=mysql_query("select * from course where update1 = 'COURSE' and day1='".$day."'
							and date_start='".$timeStart3."' and date_end='".$timeEnd3."' ") or die(mysql_error());
							$duplicate=mysql_num_rows($query);
							 if($duplicate==0)
								{
							 $query1=mysql_query("INSERT INTO course
						(stuID,update1, title1, day1,date_start,date_end,week)
						VALUES ('" . $id . "','" . $update3 . "','" . $title3 . "', '" . $day . "',  '" . $timeStart3. "', 
						 '" . $timeEnd3. "','" . $counter++ . "')") or die(mysql_error());
							?>
					 
						<script language="javascript"> 
							alert("Successfully insert new course!");window.location="studentTimetable.php";
						</script>
					<?php
								}
							
							else
							{
					 ?>
					 
						<script language="javascript"> 
							alert("Day and Time is not available!");window.location="homeafter.php";
						</script>
					<?php


							}
							}
					}
		}
	}

		
?>
