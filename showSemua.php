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
    width: 70%;
	
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

 <center> SUMMARY ACTIVITY </center>
    <table id="t01" bordercolor="#000000"  align="center">
     <tr bgcolor="#9C640C" >
    <th width="10%" bordercolor="#000000">DAY</th>
    <th width="12%">COURSE/ACTIVITY</th> 
    <th width="25%">ACTIVITY NAME</th>
    <th width="20%">TIME IN</th>
    <th width="20%">TIME OUT</th>
    <th width="10%">UPDATE</th>
    <th width="10%">DELETE</th>
  </tr>
      <?php 
	 // $id1=$_GET['CourseNo'];
	   $sqlone2 = "SELECT
     DISTINCT day1, title1,update1,stuID,SUBSTRING(date_start,11,17) as date_start,SUBSTRING(date_end,11,17)as date_end,CourseNo
FROM course WHERE update1 = 'ACTIVITY'";
		   
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
    <td><?php echo $papar2['day1']; ?></td>
    <td><?php echo $papar2['update1']; ?></td>
     <td><?php echo $papar2['title1']; ?></td>
   <td><?php echo $papar2['date_start']; ?></td>
     <td><?php echo $papar2['date_end']; ?></td>
    <td align="center"><a href="updateActivity.php?CourseNo=<?php echo $papar2['CourseNo'] ;?>"><i><img src="img_kemaskini.png"></i></a>
    <td align="center"><a href="deleteActivity.php?CourseNo=<?php echo $papar2['CourseNo'] ;?>"><i><img src="img_cancel.png" style="width:25px;height:25px"></i></a></td></tr>

  
<?php 
} }
?>
</table>
    <form method="post" action="">
 <center> SUMMARY COURSE </center>
    <table id="t01" bordercolor="#000000"  align="center">
     <tr bgcolor="#9C640C" >
    <th width="10%" bordercolor="#000000">DAY</th>
    <th width="12%">COURSE/ACTIVITY</th> 
    <th width="25%">COURSE CODE</th>
    <th width="20%">TIME IN</th>
    <th width="20%">TIME OUT</th>
    <th width="10%">UPDATE</th>
    <th width="10%">DELETE</th>
  </tr>
      <?php 
	 // $id1=$_GET['CourseNo'];
	   $sqlone2 = "SELECT
     DISTINCT day1, title1,update1,stuID,SUBSTRING(date_start,11,17) as date_start,SUBSTRING(date_end,11,17)as date_end,CourseNo
FROM course WHERE update1 = 'COURSE'
AND week = '1'";
		   
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
    <td><?php echo $papar2['day1']; ?></td>
    <td><?php echo $papar2['update1']; ?></td>
     <td><?php echo $papar2['title1']; ?></td>
   <td><?php echo $papar2['date_start']; ?></td>
     <td><?php echo $papar2['date_end']; ?></td>
    <td align="center"><a href="showAllCourseUpdate.php?CourseNo=<?php echo $papar2['CourseNo'] ;?>"><i><img src="img_kemaskini.png"></i></a>
    <td align="center"><a href="deleteCourse.php?CourseNo=<?php echo $papar2['CourseNo'] ;?>"><i><img src="img_cancel.png" style="width:25px;height:25px"></i></a></td></tr>

  
<?php 
} }
?>
</table> 

</body>
</td></tr>
</table></form><center> <table>
    		<tr>
					<td colspan="2" align="center"><div align="center"><div align="center" ><a href="studentTimetable.php">
					<button class="button" name="submit1" type="Submit" id="submit1"><strong>BACK</strong></button></a>
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
				window.location="studentTimetable.php" 
            </script>
        <center>
        </html>
		<?php
	}?>

<?php
	}}}
	?>