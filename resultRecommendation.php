<?php
include $_SERVER['DOCUMENT_ROOT'].'/timetabling/connectionHost.php';
  session_start();
if(isset($_SESSION['STUEMAIL'])){

$id= $_SESSION['STUID'];
$sqlone = "SELECT *
		   FROM student
		   WHERE stuID=$id";//the query for get all data in customer
		   
		   $hasil = mysql_query($sqlone);
		   
$row_kira = mysql_num_rows($hasil);
if($hasil=="")
		echo "SQL error:".mysql_error();
	else
		$papar = mysql_fetch_array($hasil);
		
		
		$sql2 = "SELECT max(date_end) as last_day,week FROM COURSE WHERE stuID=$id GROUP BY week HAVING max(date_end)";

$result = mysql_query($sql2);

?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
    background-color:#FADBD8;
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
    width: 50%;
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Result</title>
</head>


<body>
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

<center>

  <table id="t01"  bordercolor="#000000">


     <tr bgcolor="#9C640C" >
    <th width="20%" bordercolor="#000000">WEEK</th>  
   <center> <th width="35%" bordercolor="#000000">DATE (yyyy-mm-dd)</th>  
    <th width="20%" bordercolor="#000000">DAY</th>  
    <th width="20%" bordercolor="#000000">TIME</th>  
    <th width="20%" bordercolor="#000000">SCHEDULE</th>
  </tr>
     <?php  

 while($row = mysql_fetch_array($result)) {
	if(date('N', strtotime($row['last_day'])) > 5)
	echo "";
	else {
			?>
    
			<tr bgcolor="#ECBE22" bordercolor="#000000">
  			<td><?php echo  $row['week'] ?></td><td><?php echo date('Y-m-d', strtotime($row['last_day'])) ?></td> <td><?php 
			echo date('l', strtotime($row['last_day'])) ?><td><?php echo date('H:i', strtotime($row['last_day'])) ?></td>
             <td align="center"><a href="showSchedule.php?page=<?php echo 1;?>"><i><img src="train.png" style="width:80px;height:40px"></i></a></td></tr>
  			
            <?php }
			} ?>
  
    &nbsp;
    &nbsp;
    &nbsp;
</center>
</body>
<body> 
</body>


</td></tr>
</table>
</html>
