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
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
body 
{
		 background-image:url(bgm3.jpg);
		 background-repeat:no-repeat;
		 background-attachment:fixed;
		 background-position:top;
		 background-size:1600px 900px;
		 padding:0px;


}
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
    padding:50px;	background-color:#FADBD8	 
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
    width: 100%;
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
</head>



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
            
    
<center><div class="main">
<form name="form1" action="insertActivity.php" method="POST">
	<h2>Insert New Activity here</h2>
      <p>&nbsp;</p>
    <table width="430" height="118">
    <input name="update2" type="hidden" value="ACTIVITY"/>
  
    		<tr>
  				<td width="500" align="center"><div align="left"><strong>&nbsp;ACTIVITY</strong></div></td>
  				<td><input name="title" type="text" required/></td>
  			</tr>
       
             <tr>
            	<td width="150" align="center"><div align="left"><strong>&nbsp;DATE</strong></div></td>
            	<td><input type="text" id="datepicker" size="30" class="form-control" name="date1" placeholder="Enter Date" 
                value=""></td>
            </tr>
            <tr>
  				<td width="250" align="center"><div align="left"><strong>&nbsp;TIME START</strong></div></td>
  				<td> <select name="timeStart">
         <option value="8:00">8:00</option>
         <option value="9:00">9:00</option>
         <option value="10:00">10:00</option>
         <option value="11:00">11:00</option>
         <option value="12:00">12:00</option>
         <option value="13:00">13:00</option>
         <option value="14:00">14:00</option>
         <option value="15:00">15:00</option>
         <option value="16:00">16:00</option>
         <option value="17:00">17:00</option>
         <option value="18:00">18:00</option>
       </select></td></tr>
  		
<tr>
      <td width="150" align="center"><div align="left"><strong>&nbsp;TIME END</strong></div></td>
  				<td><select name="timeEnd">
           <option value="8:00">8:00</option>
           <option value="9:00">9:00</option>
           <option value="10:00">10:00</option>
           <option value="11:00">11:00</option>
           <option value="12:00">12:00</option>
           <option value="13:00">13:00</option>
           <option value="14:00">14:00</option>
           <option value="15:00">15:00</option>
           <option value="16:00">16:00</option>
           <option value="17:00">17:00</option>
           <option value="18:00">18:00</option>
         </select></td></tr>
         <td><input name="week" type="hidden" /></td>


<tr><td colspan="2"><div align="center"><input type="submit" name="submit2" value="ADD"> &nbsp;
    <button type="reset" value="cancel">RESET</button></td></tr>
</table>
  </form>
</div>

    
<center><div class="menu">
<form name="form1" action="insertCourse.php" method="POST">
	<h2>Insert New Course here</h2>
    <br>
    <table width="430" height="118">
     <input name="update1" type="hidden" value="COURSE"/>
  			
			<tr>
  				<td width="150" align="center"><div align="left"><strong>&nbsp;COURSE CODE</strong></div></td>
  				<td><input name="title1" type="text" required/></td>
  			</tr>
            <tr>
  				<td width="150" align="center"><div align="left"><strong>&nbsp;DAY</strong></div></td>
  				<td> <select name="day1">
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
        <option value="Sunday">Sunday</option>
      </select></td>
  			</tr>
        
            <tr>
  				<td width="250" align="center"><div align="left"><strong>&nbsp;TIME START</strong></div></td>
  				<td> <select name="timeStart1">
         <option value="8:00">8:00</option>
         <option value="9:00">9:00</option>
         <option value="10:00">10:00</option>
         <option value="11:00">11:00</option>
         <option value="12:00">12:00</option>
         <option value="13:00">13:00</option>
         <option value="14:00">14:00</option>
         <option value="15:00">15:00</option>
         <option value="16:00">16:00</option>
         <option value="17:00">17:00</option>
         <option value="18:00">18:00</option>
       </select></td></tr>
  		
<tr>
      <td width="150" align="center"><div align="left"><strong>&nbsp;TIME END</strong></div></td>
  				<td><select name="timeEnd1">
           <option value="8:00">8:00</option>
           <option value="9:00">9:00</option>
           <option value="10:00">10:00</option>
           <option value="11:00">11:00</option>
           <option value="12:00">12:00</option>
           <option value="13:00">13:00</option>
           <option value="14:00">14:00</option>
           <option value="15:00">15:00</option>
           <option value="16:00">16:00</option>
           <option value="17:00">17:00</option>
           <option value="18:00">18:00</option>
         </select></td></tr>


      
  				<td><input name="week1" type="hidden" /></td>
    </p>
<tr><td colspan="2"><div align="center"><input type="submit" name="submit22" value="ADD"> &nbsp;
    <button type="reset" value="cancel">RESET</button></td></tr>
</table>
    </form></div>


<center>

    &nbsp;
    &nbsp;
    &nbsp;
</center>
</body>

<?php 
} }}
?>
</td></tr>
</table>
</html>