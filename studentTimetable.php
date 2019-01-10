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

.main {
    width: 50%;
	height: 70%;
	float: left;
	border-style: transparent;
	padding: 15px;
	background-color:#FADBD8

}

.menu {
    width: 50%;
	height: 70%;
    float: right;
	border-style: none none none solid;
    padding: 15px;
		background-color:#FADBD8

}

.footer {
	  width: 100%;
    color:black;
    clear:both;
    text-align:center;
    padding:50px;	 	 
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
    text-align: left;
}
table#t01 {
    width: 70%;
	text-align:center;
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
       <center>
       <?php $sqlone2 = "SELECT week
FROM course
WHERE STUID=$id
GROUP BY week";
		   
		   $hasil2 = mysql_query($sqlone2);
		   
		$row_kira2 = mysql_num_rows($hasil2);
		if($hasil2=="")
		echo "SQL error:".mysql_error();
		else
	{
		while($papar2=mysql_fetch_array($hasil2))
		{?>

    <table id="t01" bordercolor="#000000" width="500">
  WEEK <?php echo $papar2['week'];?>
   <tr bgcolor="#9C640C" >
    <th width="10%" bordercolor="#000000">DAY</th>
    <th width="15%">COURSE/ACTIVITY</th> 
    <th width="25%">TITLE</th>
    <th width="15%">TIME IN</th>
    <th width="15%">TIME OUT</th>
    <th width="10%">UPDATE</th>
    <th width="10%">DELETE</th>
  </tr>     
       <?php  
			$sql2 = "select * from course where STUID=$id and week = ".$papar2['week'];
			$hasil3 = mysql_query($sql2);
			while($papar3=mysql_fetch_array($hasil3))
			{
				
		
			?>   



 
  <tr bgcolor="#ECBE22" bordercolor="#000000">
    <td align="center" > <?php echo $papar3['day1']; ?></td>
    <td align="center" ><?php echo $papar3['update1']; ?></td>
    <td align="center" ><?php echo $papar3['title1']; ?></td>
   <td align="center" ><?php echo $papar3['date_start']; ?></td>
   <td align="center" ><?php echo $papar3['date_end']; ?></td>
    <td align="center"><a href="showSemua.php?CourseNo=<?php echo $papar3['CourseNo'] ;?>"><i><img src="img_kemaskini.png"></i></a>
    <td align="center"><a href="showSemua.php?CourseNo=<?php echo $papar3['CourseNo'] ;?>"><i><img src="img_cancel.png" style="width:25px;height:25px"></i></a></td></tr>
  
<?php }
		}
	}

}
?>


</table> 

 
</div>
</table> 
<?php
} 
?>
 


</body>
</td></tr><?php 
} 
?>
</table>
</html>