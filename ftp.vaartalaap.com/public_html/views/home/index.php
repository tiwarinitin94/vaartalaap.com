
<script>

/*var image=document.getElementsByClassName("img_slide");
$(document).ready(function(){
	 output_time();
	
});
i=0;

    function output_time() {
count(i);
i++;
    if(i<image.length){
    setInterval(function(){
   count(i);
	i++;
   },4000);
	}
    }
    
    function count(p){
	if(p<image.length){
		
	         $("#show_img").fadeOut(500,function(){
				 $("#show_img").html("<img style='width:100%;height:600px;'src='"+image[p].src+"'/>");
		     $("#show_img").fadeIn(1000);
		});
				
   
	}else{
		i=-1;
	}
    }*/
</script>

<div class='content2' style="clear:both;overflow:hidden;">
<button id="myBtn">Sign in</button>
<!-- <button id="myBtn">Games</button> -->
<!-- <button id="myBtn">Videos</button>-->
</div>
 
 <!---
<div style="overflow:hidden;margin:0 60px">
<img src="<?php echo URL; ?>public/slider/slide1.jpg" class="img_slide" id="img1" style="display:none;"/>
<img src="<?php echo URL; ?>public/slider/slide2.jpg" class="img_slide" id="img2" style="display:none;"/>
<img src="<?php echo URL; ?>public/slider/slide3.jpg" class="img_slide" id="img3" style="display:none;"/>
<img src="<?php echo URL; ?>public/slider/slide4.jpg" class="img_slide" id="img4" style="display:none;"/>
<img src="<?php echo URL; ?>public/slider/slide5.jpg" class="img_slide" id="img5" style="display:none;"/>
</div>

 --->
 
 
 
 
<div class="content1"  >


   
<img src="<?php echo URL; ?>public/slider/slide5.jpg" class="img_slide" id="img5" style="display:none;"/>
 <div id="signup_circle">
		
			<img style="width:50%;margin:0px 20%;"src='<?php echo URL; ?>public/images/vaarta.png'>
			
          <label style="text-shadow:none;font-family:sans-serif;font-weight:normal;font-size:15px;margin:0px 40%;">Sign Up</label>
		   	   <form id="register" name="register" action="#" onsubmit="<?php echo URL; ?>home/sign_up" method="POST"  rel="<?php echo URL; ?>home/sign_check" style="margin-top:10px;" >
		      <p><input id="fn" type="text" name="fname" size="25"  placeholder="First Name" required /></p>
			  <p><input id="ln" type="text" name="lname" size="25"  placeholder="Last Name" required /></p>
                          
							<p><input id="un" type="text" name="username" size="25"  placeholder="User Name" required /></p>
                         
			
               <p> <input id="em" type="email" name="email" size="25"  placeholder="Enter your email" required /></p>
                                		
			
			<input type="password" id="pswd"name="password" size="25" placeholder="Enter your password" required /></p>
			   
	<center>
Female<input type="radio" name="gender" value="female" style="width:20px;">
                                                    Male<input type="radio" name="gender" value="male" style="width:20px;"> Other<input type="radio" name="gender" value="other" style="width:20px;"><br>
          <label id="labelTerms"> Do you agree to the terms and conditions of using our services? <input type="text" value="off"name="terms_" id="terms_" required />
		 </label	>
			<input type="submit" name="reg" value="Sign Up" style="margin-top:10px;"/>
			
			</center>
			  </form></div>
	<!-------Sign up Circle ended-------->		
         
	
   
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="width:200px;" >
     
        <span class="close" id="close1"style="float:right;">X</span>
          
	       
			<label style="padding:5px 25px;font-family:helvetica;font-size:15px;">If already a member sign in</label>
		   <form action="<?php echo URL; ?>login/run" id="logged_in" method="POST" style="padding:5px 20px;">
		    <input type="text" name="user_login" id='u_l' autofocus placeholder="Username or em@il Id"/><p/>
			  <span><input type="password" name="password_login" id='p_l' placeholder="Password"/><p/></span>
			  <input type="submit" name="login" value="Sign In" style="margin-left:5px;width:195px;border-radius:0px;box-shadow:none;border:.5px solid #fff;background-color:#ef6c00;color:#fff; padding:8px;"/>
		   </form>
		   <a href="forgot.php" style="text-decoration:none;font-size:10px;margin-left:20px;">Forgot password ?</a>
		 
             
     </div>

</div> 
<div id="myModal2" class="modal2">
  <div class="modal-content">
     <span class="close" style="float:right;">X</span>
	 <div  id="mymodalc"></div>
</div>
</div>
</div><!---content1 ended----->

	 </div>