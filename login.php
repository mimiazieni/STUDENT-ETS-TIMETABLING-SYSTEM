<?php
session_start();
if(isset($_SESSION['STUEMAIL']) && ($_SESSION['LEVEL'] == 1))
{ 
	$INDEX = $_SESSION['STUEMAIL'];
	header("Location: login.php?log=1");
}
else
{
	$test = $_GET["log"];
	if($test == "fail")
	{
		echo "<script language='javascript'>
				alert('Wrong email/password!');
			</script>";
	}
	else if($test == "first")
	{
		echo "<script language='javascript'>
				alert('Sign up success!. Your email is your username. Please login to continue!');
			</script>";
	}
?>

<!DOCTYPE html>
<html lang"en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="signUp.css" />
    <script src="signUp.js"></script>
  </head>
 
  <body background="bg5.jpg">
<div class="cont_principal">
 </br> </br> </br> </br> </br> </br> 
  <center><h1><font color="#F90" > LOGIN now !</font></h1> </center>
  <div class="cont_centrar">
  <div class="cont_login">
    <form name="form1" action="login(connection).php" method="POST">
  	
    <div class="cont_tabs_login">
      <ul class='ul_tabs'>
        <li class="active"><a href="#" onclick="sign_in()">LOGIN</a>
        <span class="linea_bajo_nom"></span>
        </li>
        <li><a href="signUp.php" onclick="sign_up()">SIGN UP</a><span class="linea_bajo_nom"></span>
        </li>
      </ul>
      </div>
  <div class="cont_text_inputs">

    
    <input type="text" class="input_form_sign d_block  active_inp" placeholder="EMAIL" name="stuEmail" />

    <input type="password" class="input_form_sign d_block  active_inp" placeholder="PASSWORD" name="password" />  

    
    <a href="homebefore.php" class="link_forgot_pass d_block" >Back to homepage</a>    
<div class="terms_and_cons d_none">
  
  
    </div>
      </div>
<div class="cont_btn">
     <button class="btn_sign" name="submit1">LOGIN</button>
</div>
      
    </form>
    </div>
    
  </div>
    </body>
   
</html>

</div>
<?php
}

?>
