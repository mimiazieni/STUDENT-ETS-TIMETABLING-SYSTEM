<?php
	include("connectionHost.php");
	session_start();
if(isset($_SESSION['STUEMAIL'])){
	$id= $_SESSION['STUID'];
	
	date_default_timezone_set("Asia/Kuala_Lumpur");
	//display your profile immediately after login
                $sql = "SELECT * FROM student WHERE stuID='$id'";
                $query = mysql_query($sql) or die ("Error:".mysql_error());
                $row = mysql_num_rows($query);
                if($row!=0)
                {
                	$r = mysql_fetch_assoc($query);
					
  ?>
  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta charset="utf-8">
  <link rel="stylesheet" href="js/jquery-ui.min.css">
  <script src="js/jquery-1.12.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({ minDate:0});
    $( "#format" ).change(function() {
      $( "#datepicker" ).datepicker("option", "dateFormat", $( this ).val());
    });
  });
  </script>
<head>
<style>

body 
{
		 background-image:url(bg2.jpg);
		 background-repeat:no-repeat;
		 background-attachment:fixed;
		 background-position:top;
		 background-size:1600px 900px;
		 padding:0px;


}
/*plusize title*/
h1 
{
    height: 140px;
    width: 1335px;
	border-bottom: 15px solid #F90;
    background-color: #0CF;
	font-family: "arial";
	font-size: 70px;

}

ul 
{
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #0CF;
	font-color:black;
}

li 
{
    float: left;
}

li a 
{
    display: block;
    color: black;
    text-align: center;
    padding: 14px 16px;
	font-family: "arial";
	font-size: 20px;
    text-decoration: none;
	border-right: 5px solid #F90;
}

li a:hover:not(.active) 
{
    background-color: #F90;
}

.active 
{
    background-color: #F90;
	border-right: 5px solid #0CF;
}
/*pictures baju kurung*/
img 
{
    border-radius: 50%;
	border: 5px solid #0CF;
	-webkit-transition: width 2s, height 4s; 
    transition: width 2s, height 4s;
}
img:hover 
{
    width: 300px;
    height: 300px;
}

/*pictures fb and instagram*/
#navlist {
    position: relative;
}

#navlist li 
{
	margin: 10;
	padding: 10;
	list-style: none;
	position: absolute;
	top: 10px;
}

#navlist li, #navlist a 
{
    height: 44px;
    /*display: block;*/
}

/*dropdown button*/
li a, .dropbtn 
{
    display: inline-block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn 
{
    background-color: #0CF;
}

li.dropdown 
{
    display: inline-block;
}

.dropdown-content 
{
    display: none;
    position: absolute;
    background-color: #0CF;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a 
{
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #0CF}

.dropdown:hover .dropdown-content 
{
    display: block;
}

* {
    box-sizing: border-box;
}

.select{
    height:100px;
    overflow:scroll;
}

header {
  width: 100%;
  height: 48px;
  background-color: #ddd;
}

ol {
  list-style: none;
}
th, td {
    padding: 15px;
    text-align: center;
	
}
table#t01 {
    width: 50%;
	
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Timetable</title>


<?php $id= $_SESSION['STUID'];
$sqlone = "SELECT *
		   FROM student
		   WHERE stuID=$id";
	   
		   $rs = mysql_query ($sqlone);

if($rs == false)
	echo "SQL ERROR : Query cannot be executed";
else
{
	while($papar=mysql_fetch_array($rs))
	{
		$e = $papar['stuID'];
		?>
        
<center><h1>STUDENT - ETS TIMETABLE</h1></center>

<ul>
  <b><li><a href="homeafter.php">Home</a></li></b>
 <b><li><a href="etsSchedule.php?page=<?php echo 1;?>">ETS Schedule</a></li></b>
  <b><li><a href="studentTimetable.php">Student Timetable</a></li></b>
  <b><li><a href="resultRecommendation.php">Result Recommendation</a></li></b>
 
	 <li style="float:right">
       	<b>Hi, <?php echo $papar['stuName']; ?>&nbsp;&nbsp;<?php }?>
    <a class="active" href="signout.php">Logout</a></li>
</ul>
</head>

<center>

    &nbsp;
    &nbsp;
    &nbsp;
</center>
</body>
<body>
    <form method="post" action="">
    <table id="t01" bordercolor="#000000"  align="center">
     <tr bgcolor="#9C640C" >
    <th width="10%" bordercolor="#000000">DAY</th>
    <th width="12%">COURSE/ACTIVITY</th> 
    <th width="25%">TITLE</th>
    <th width="20%">TIME IN</th>
    <th width="20%">TIME OUT</th>
  </tr>
      <?php 
	  $id1=$_GET['CourseNo'];
	   $sqlone2 = "SELECT
     DISTINCT day1, title1,update1,stuID, SUBSTRING(date_start,1,10) as dateOnly,SUBSTRING(date_start,11,17) as timeOnly,SUBSTRING(date_end,11,17)as date_end_time,CourseNo,date_start, date_end, SUBSTRING(date_start,1,10) as date_end_date
FROM
     course
WHERE CourseNo ='$id1'
ORDER BY 
     CASE
          WHEN day1 = 'Monday' THEN 1
          WHEN day1 = 'Tuesday' THEN 2
          WHEN day1 = 'Wednesday' THEN 3
          WHEN day1 = 'Thursday' THEN 4
          WHEN day1 = 'Friday' THEN 5
          WHEN day1 = 'Saturday' THEN 6
          WHEN day1 = 'Sunday' THEN 7
     END ASC";
		   
		   $hasil2 = mysql_query($sqlone2);
		   
		$row_kira2 = mysql_num_rows($hasil2);
		if($hasil2=="")
		echo "SQL error:".mysql_error();
		else
	{
		while($papar2=mysql_fetch_array($hasil2))
		{
			$e1 = $papar2['stuID'];
			
			?>
 
  <tr bgcolor="#ECBE22" bordercolor="#000000">
    <td> <select name="day1">
     <option value="<?php echo $papar2['day1'];?>"> <?php echo $papar2['day1'];?> </option>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
        <option value="Sunday">Sunday</option>
      </select></td>
      
    <td><?php echo $papar2['update1']; ?></td>
    
    <td><input type="text" name="title1" value="<?php echo $papar2['title1'];?>" required/> </td>
     
    <td><select name="date_start">
    	 <option  value="<?php echo $papar2['dateOnly'];echo $papar2['timeOnly'];?>"><?php echo $papar2['timeOnly'];?> </option>
         <option value="<?php echo $papar2['dateOnly'];?> 08:00:00">08:00:00</option>
         <option value="<?php echo $papar2['dateOnly'];?> 09:00:00">09:00:00</option>
         <option value="<?php echo $papar2['dateOnly'];?> 10:00:00">10:00:00</option>
         <option value="<?php echo $papar2['dateOnly'];?> 11:00:00">11:00:00</option>
         <option value="<?php echo $papar2['dateOnly'];?> 12:00:00">12:00:00</option>
         <option value="<?php echo $papar2['dateOnly'];?> 13:00:00">13:00:00</option>
         <option value="<?php echo $papar2['dateOnly'];?> 14:00:00">14:00:00</option>
         <option value="<?php echo $papar2['dateOnly'];?> 15:00:00">15:00:00</option>
         <option value="<?php echo $papar2['dateOnly'];?> 16:00:00">16:00:00</option>
         <option value="<?php echo $papar2['dateOnly'];?> 17:00:00">17:00:00</option>
         <option value="<?php echo $papar2['dateOnly'];?> 18:00:00">18:00:00</option>
       </select> </td>
       
     <td><select name="date_end" >
     	 <option value="<?php echo $papar2['date_end_date'];echo $papar2['date_end_time'];?> "><?php echo $papar2['date_end_time']; ?> </option>
         <option value="<?php echo $papar2['date_end_date'];?> 08:00:00">08:00:00</option>
         <option value="<?php echo $papar2['date_end_date'];?> 09:00:00">09:00:00</option>
         <option value="<?php echo $papar2['date_end_date'];?> 10:00:00">10:00:00</option>
         <option value="<?php echo $papar2['date_end_date'];?> 11:00:00">11:00:00</option>
         <option value="<?php echo $papar2['date_end_date'];?> 12:00:00">12:00:00</option>
         <option value="<?php echo $papar2['date_end_date'];?> 13:00:00">13:00:00</option>
         <option value="<?php echo $papar2['date_end_date'];?> 14:00:00">14:00:00</option>
         <option value="<?php echo $papar2['date_end_date'];?> 15:00:00">15:00:00</option>
         <option value="<?php echo $papar2['date_end_date'];?> 16:00:00">16:00:00</option>
         <option value="<?php echo $papar2['date_end_date'];?> 17:00:00">17:00:00</option>
         <option value="<?php echo $papar2['date_end_date'];?> 18:00:00">18:00:00</option>
       </select> </td>
  </tr>

  

</table> 
 <center> <table>
    		<tr>
					<td colspan="2" align="center"><div align="center">
					<button class="button" name="submit1" type="Submit" id="submit1"><strong>BACK</strong></button>
					<button class="button" name="submit2" type="Submit" id="submit2"><strong>UPDATE</strong></button>
            	</td>
			</tr>
    	</table>


</body>
</td></tr>
</table></form>
</html>
 <?php 
    if(isset($_POST["submit1"]))
	{	?>
		<html>
        <center>
			<script language="javascript"> 
				window.location="showAllCourseUpdate.php?CourseNo=<?php echo $id1; ?>" 
            </script>
        <center>
        </html>
		<?php
	}?>
    
	<?php

	if(isset($_POST["submit2"]))
	{
		$title1 = $_POST['title1'];
		$date_start = $_POST['date_start'];
		$date_end = $_POST['date_end'];
		//$timeStart3 = date('Y-m-d', 2018-10-10)." ".$date_start1;
		//$timeEnd3 = date('Y-m-d', $2018-10-10)." ".$date_end1;
		$day1 = $_POST['day1'];
		$nextLimit = $id1 + 13;
		
		$sql1="UPDATE course SET day1='$day1' where CourseNo between '$id1' and '$nextLimit'";
		$hasil1=mysql_query($sql1);

		if($hasil1==false)
			echo "SQL error:".mysql_error();
		else
		{
			?>
			<center>
				<script language="javascript"> 
					alert("Successfully update!");window.location="showAllCourseUpdate.php?CourseNo=<?php echo $id1; ?>" 
  	    		</script>
			</center><?php
		}
		
		$sql2="UPDATE course SET title1 ='$title1' WHERE CourseNo between '$id1' and '$nextLimit'";
		$hasil2=mysql_query($sql2);

		if($hasil2==false)
			echo "SQL error:".mysql_error();
		else
		{
			?>  
           	<center>
				<script language="javascript"> 
					alert("Successfully update!");window.location="showAllCourseUpdate.php?CourseNo=<?php echo $id1; ?>" 
  	    		</script>
			</center><?php
		}
	
		$sql3="UPDATE course SET date_start = '$date_start' WHERE CourseNo = '$id1'";
		$hasil3=mysql_query($sql3);

		if($hasil3==false)
			echo "SQL error:".mysql_error();
		else
		{
			?>  
           	<center>
				<script language="javascript"> 
					alert("Successfully update!");window.location="showAllCourseUpdate.php?CourseNo=<?php echo $id1; ?>" 
  	    		</script>
			</center><?php
		}
		
		$sql4="UPDATE course SET date_end = '$date_end' WHERE CourseNo = '$id1'";
		$hasil4=mysql_query($sql4);

		if($hasil4==false)
			echo "SQL error:".mysql_error();
		else
		{
			?>  
           	<center>
				<script language="javascript"> 
					alert("Successfully update!");window.location="showAllCourseUpdate.php?CourseNo=<?php echo $id1; ?>" 
  	    		</script>
			</center><?php
		}
		?> 
<?php
	}}}}}}
?>