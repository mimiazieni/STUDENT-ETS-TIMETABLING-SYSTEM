<!DOCTYPE html>
<html lang"en">
  <head>
    <meta charset="utf-8">
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="signUp.css" />
    <script src="signUp.js">
    
    </script>
  </head>
 <body background="bg5.jpg">
 
<div class="cont_principal">
 </br> </br> </br> </br> </br> </br> 
  <center><h1><font color="#F90" > Sign Up now !</font></h1> </center>
  <div class="cont_centrar">
  <div class="cont_login">
    <form name="form1" action="signUp(connection).php" method="POST">
  	
    <div class="cont_tabs_login">
      <ul class='ul_tabs'>
        <li class="active"><a href="#" onclick="sign_up()">SIGN UP</a>
        <span class="linea_bajo_nom"></span>
        </li>
        <li><a href="login.php?log=1" onclick="sign_in()">LOGIN</a><span class="linea_bajo_nom"></span>
        </li>
      </ul>
      </div>
      <?php

	  ?>
  <div class="cont_text_inputs">

     <input type="text" class="input_form_sign d_block  active_inp " placeholder="NAME" name="stuName" pattern="[A-Za-z]{1-30}" title="Name cannot contain number and symbol" required/>
    
    <input type="text" class="input_form_sign d_block  active_inp" placeholder="EMAIL" name="stuEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter valid email" required />
    
    <input type="text" class="input_form_sign d_block  active_inp" placeholder="STUDENT ID" name="stuID" pattern="[0-9]{10}" title="Student ID cannot contain letter or other symbol" required/>

    <input type="password" class="input_form_sign d_block  active_inp" placeholder="PASSWORD" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least  or more characters" required />  
    
    <a href="login.php" class="link_forgot_pass d_block" >Have an account?</a>    
<div class="terms_and_cons d_none">
  
  
    </div>
      </div>
<div class="cont_btn">
     <button class="btn_sign" name="submit1" >SIGN UP</button>
      
      </div>
      
    </form>
    </div>
    
  </div>
    </body>
   
</html>

</div>