
<script>
var image=document.getElementsByClassName("img_slide");
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
   },3000);
	}
    }
    
    function count(p){
	if(p<image.length){
		
	         $("#show_img").fadeOut(500,function(){
				 $("#show_img").html("<img src='"+image[p].src+"'/>");
		     $("#show_img").fadeIn(1000);
		});
				
   
	}else{
		i=-1;
	}
    }
</script>

<div class='content2' style="clear:both;overflow:hidden;border-bottom:.1px solid #efe4e4;">
<button id="myBtn" style="border:none;">Sign in</button>
 <button id="myBtn">Games</button> <button id="myBtn">Videos</button></div>
 
 <div class="container" id="holder">
  <div class="row">

  <div class="col-sm-6" id="slider_part" >
  <center>
	 <div id="show_img" style="padding:2px; margin-top:60px;"></div></center>
<div style="overflow:hidden;margin:0 60px">
<img src="<?php echo URL;?>public/slider/slide1_.jpg" class="img_slide" id="img1" style="display:none;"/>
<img src="<?php echo URL;?>public/slider/slide2_.jpg" class="img_slide" id="img2" style="display:none;"/>
<img src="<?php echo URL;?>public/slider/slide3_.jpg" class="img_slide" id="img3" style="display:none;"/>
<img src="<?php echo URL;?>public/slider/slide4_.jpg" class="img_slide" id="img4" style="display:none;"/>
<img src="<?php echo URL;?>public/slider/slide5_.jpg" class="img_slide" id="img5" style="display:none;"/>
</div>
</div>
  <div class="col-sm-6">
<div class="content1" >

 <div id="signup_circle"  >
		
			<img style="width:50%;margin:0px 25%;"src="<?php echo URL;?>public/images/vaarta_logo_large_orange.png">
			
          <label style="text-shadow:none;font-family:sans-serif;font-weight:normal;font-size:15px;margin:0px 40%;">Sign Up</label>
		   	   <form id="register" name="register" action="#" onsubmit="<?php echo URL;?>index/sign_up" method="POST" style="margin-top:10px;" rel="<?php echo URL;?>index/sign_check">
		      <p><input id="fn" type="text" name="fname" size="25"  placeholder="First Name" required /></p>
			  <p><input id="ln" type="text" name="lname" size="25"  placeholder="Last Name" required /></p>
                          
							<p><input id="un" type="text" name="username" size="25"  placeholder="User Name" required /></p>
                         
			
               <p> <input id="em" type="email" name="email" size="25"  placeholder="Enter your email" required /></p>
                                		
			
			<input type="password" id="pswd"name="password" size="25" placeholder="Enter your password" required /></p>
			   
	
						<p><select  class="country" name="country"id="country" required style="margin:0px 10%;padding:3px;width:80%;height:40px; " >
						<option value=""  >Select Country</option>
<option value="AF">Afghanistan</option>
<option value="AX">Åland Islands</option>
<option value="AL">Albania</option>
<option value="DZ">Algeria</option>
<option value="AS">American Samoa</option>
<option value="AD">Andorra</option>
<option value="AO">Angola</option>
<option value="AI">Anguilla</option>
<option value="AQ">Antarctica</option>
<option value="AG">Antigua and Barbuda</option>
<option value="AR">Argentina</option>
<option value="AM">Armenia</option>
<option value="AW">Aruba</option>
<option value="AU">Australia</option>
<option value="AT">Austria</option>
<option value="AZ">Azerbaijan</option>
<option value="BS">Bahamas</option>
<option value="BH">Bahrain</option>
<option value="BD">Bangladesh</option>
<option value="BB">Barbados</option>
<option value="BY">Belarus</option>
<option value="BE">Belgium</option>
<option value="BZ">Belize</option>
<option value="BJ">Benin</option>
<option value="BM">Bermuda</option>
<option value="BT">Bhutan</option>
<option value="BO">Bolivia, Plurinational State of</option>
<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
<option value="BA">Bosnia and Herzegovina</option>
<option value="BW">Botswana</option>
<option value="BV">Bouvet Island</option>
<option value="BR">Brazil</option>
<option value="IO">British Indian Ocean Territory</option>
<option value="BN">Brunei Darussalam</option>
<option value="BG">Bulgaria</option>
<option value="BF">Burkina Faso</option>
<option value="BI">Burundi</option>
<option value="KH">Cambodia</option>
<option value="CM">Cameroon</option>
<option value="CA">Canada</option>
<option value="CV">Cape Verde</option>
<option value="KY">Cayman Islands</option>
<option value="CF">Central African Republic</option>
<option value="TD">Chad</option>
<option value="CL">Chile</option>
<option value="CN">China</option>
<option value="CX">Christmas Island</option>
<option value="CC">Cocos (Keeling) Islands</option>
<option value="CO">Colombia</option>
<option value="KM">Comoros</option>
<option value="CG">Congo</option>
<option value="CD">Congo, the Democratic Republic of the</option>
<option value="CK">Cook Islands</option>
<option value="CR">Costa Rica</option>
<option value="CI">Côte d&#8217;Ivoire</option>
<option value="HR">Croatia</option>
<option value="CU">Cuba</option>
<option value="CW">Curaçao</option>
<option value="CY">Cyprus</option>
<option value="CZ">Czech Republic</option>
<option value="DK">Denmark</option>
<option value="DJ">Djibouti</option>
<option value="DM">Dominica</option>
<option value="DO">Dominican Republic</option>
<option value="EC">Ecuador</option>
<option value="EG">Egypt</option>
<option value="SV">El Salvador</option>
<option value="GQ">Equatorial Guinea</option>
<option value="ER">Eritrea</option>
<option value="EE">Estonia</option>
<option value="ET">Ethiopia</option>
<option value="FK">Falkland Islands (Malvinas)</option>
<option value="FO">Faroe Islands</option>
<option value="FJ">Fiji</option>
<option value="FI">Finland</option>
<option value="FR">France</option>
<option value="GF">French Guiana</option>
<option value="PF">French Polynesia</option>
<option value="TF">French Southern Territories</option>
<option value="GA">Gabon</option>
<option value="GM">Gambia</option>
<option value="GE">Georgia</option>
<option value="DE">Germany</option>
<option value="GH">Ghana</option>
<option value="GI">Gibraltar</option>
<option value="GR">Greece</option>
<option value="GL">Greenland</option>
<option value="GD">Grenada</option>
<option value="GP">Guadeloupe</option>
<option value="GU">Guam</option>
<option value="GT">Guatemala</option>
<option value="GG">Guernsey</option>
<option value="GN">Guinea</option>
<option value="GW">Guinea-Bissau</option>
<option value="GY">Guyana</option>
<option value="HT">Haiti</option>
<option value="HM">Heard Island and McDonald Islands</option>
<option value="VA">Holy See (Vatican City State)</option>
<option value="HN">Honduras</option>
<option value="HK">Hong Kong</option>
<option value="HU">Hungary</option>
<option value="IS">Iceland</option>
<option value="IN">India</option>
<option value="ID">Indonesia</option>
<option value="IR">Iran, Islamic Republic of</option>
<option value="IQ">Iraq</option>
<option value="IE">Ireland</option>
<option value="IM">Isle of Man</option>
<option value="IL">Israel</option>
<option value="IT">Italy</option>
<option value="JM">Jamaica</option>
<option value="JP">Japan</option>
<option value="JE">Jersey</option>
<option value="JO">Jordan</option>
<option value="KZ">Kazakhstan</option>
<option value="KE">Kenya</option>
<option value="KI">Kiribati</option>
<option value="KP">Korea, Democratic People&#8217;s Republic of</option>
<option value="KR">Korea, Republic of</option>
<option value="KW">Kuwait</option>
<option value="KG">Kyrgyzstan</option>
<option value="LA">Lao People&#8217;s Democratic Republic</option>
<option value="LV">Latvia</option>
<option value="LB">Lebanon</option>
<option value="LS">Lesotho</option>
<option value="LR">Liberia</option>
<option value="LY">Libya</option>
<option value="LI">Liechtenstein</option>
<option value="LT">Lithuania</option>
<option value="LU">Luxembourg</option>
<option value="MO">Macao</option>
<option value="MK">Macedonia, the former Yugoslav Republic of</option>
<option value="MG">Madagascar</option>
<option value="MW">Malawi</option>
<option value="MY">Malaysia</option>
<option value="MV">Maldives</option>
<option value="ML">Mali</option>
<option value="MT">Malta</option>
<option value="MH">Marshall Islands</option>
<option value="MQ">Martinique</option>
<option value="MR">Mauritania</option>
<option value="MU">Mauritius</option>
<option value="YT">Mayotte</option>
<option value="MX">Mexico</option>
<option value="FM">Micronesia, Federated States of</option>
<option value="MD">Moldova, Republic of</option>
<option value="MC">Monaco</option>
<option value="MN">Mongolia</option>
<option value="ME">Montenegro</option>
<option value="MS">Montserrat</option>
<option value="MA">Morocco</option>
<option value="MZ">Mozambique</option>
<option value="MM">Myanmar</option>
<option value="NA">Namibia</option>
<option value="NR">Nauru</option>
<option value="NP">Nepal</option>
<option value="NL">Netherlands</option>
<option value="NC">New Caledonia</option>
<option value="NZ">New Zealand</option>
<option value="NI">Nicaragua</option>
<option value="NE">Niger</option>
<option value="NG">Nigeria</option>
<option value="NU">Niue</option>
<option value="NF">Norfolk Island</option>
<option value="MP">Northern Mariana Islands</option>
<option value="NO">Norway</option>
<option value="OM">Oman</option>
<option value="PK">Pakistan</option>
<option value="PW">Palau</option>
<option value="PS">Palestinian Territory, Occupied</option>
<option value="PA">Panama</option>
<option value="PG">Papua New Guinea</option>
<option value="PY">Paraguay</option>
<option value="PE">Peru</option>
<option value="PH">Philippines</option>
<option value="PN">Pitcairn</option>
<option value="PL">Poland</option>
<option value="PT">Portugal</option>
<option value="PR">Puerto Rico</option>
<option value="QA">Qatar</option>
<option value="RE">Réunion</option>
<option value="RO">Romania</option>
<option value="RU">Russian Federation</option>
<option value="RW">Rwanda</option>
<option value="BL">Saint Barthélemy</option>
<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
<option value="KN">Saint Kitts and Nevis</option>
<option value="LC">Saint Lucia</option>
<option value="MF">Saint Martin (French part)</option>
<option value="PM">Saint Pierre and Miquelon</option>
<option value="VC">Saint Vincent and the Grenadines</option>
<option value="WS">Samoa</option>
<option value="SM">San Marino</option>
<option value="ST">Sao Tome and Principe</option>
<option value="SA">Saudi Arabia</option>
<option value="SN">Senegal</option>
<option value="RS">Serbia</option>
<option value="SC">Seychelles</option>
<option value="SL">Sierra Leone</option>
<option value="SG">Singapore</option>
<option value="SX">Sint Maarten (Dutch part)</option>
<option value="SK">Slovakia</option>
<option value="SI">Slovenia</option>
<option value="SB">Solomon Islands</option>
<option value="SO">Somalia</option>
<option value="ZA">South Africa</option>
<option value="GS">South Georgia and the South Sandwich Islands</option>
<option value="SS">South Sudan</option>
<option value="ES">Spain</option>
<option value="LK">Sri Lanka</option>
<option value="SD">Sudan</option>
<option value="SR">Suriname</option>
<option value="SJ">Svalbard and Jan Mayen</option>
<option value="SZ">Swaziland</option>
<option value="SE">Sweden</option>
<option value="CH">Switzerland</option>
<option value="SY">Syrian Arab Republic</option>
<option value="TW">Taiwan, Province of China</option>
<option value="TJ">Tajikistan</option>
<option value="TZ">Tanzania, United Republic of</option>
<option value="TH">Thailand</option>
<option value="TL">Timor-Leste</option>
<option value="TG">Togo</option>
<option value="TK">Tokelau</option>
<option value="TO">Tonga</option>
<option value="TT">Trinidad and Tobago</option>
<option value="TN">Tunisia</option>
<option value="TR">Turkey</option>
<option value="TM">Turkmenistan</option>
<option value="TC">Turks and Caicos Islands</option>
<option value="TV">Tuvalu</option>
<option value="UG">Uganda</option>
<option value="UA">Ukraine</option>
<option value="AE">United Arab Emirates</option>
<option value="GB">United Kingdom</option>
<option value="US">United States</option>
<option value="UM">United States Minor Outlying Islands</option>
<option value="UY">Uruguay</option>
<option value="UZ">Uzbekistan</option>
<option value="VU">Vanuatu</option>
<option value="VE">Venezuela, Bolivarian Republic of</option>
<option value="VN">Viet Nam</option>
<option value="VG">Virgin Islands, British</option>
<option value="VI">Virgin Islands, U.S.</option>
<option value="WF">Wallis and Futuna</option>
<option value="EH">Western Sahara</option>
<option value="YE">Yemen</option>
<option value="ZM">Zambia</option>
<option value="ZW">Zimbabwe</option>
</select  required></p>	
<center> Female<input type="radio" name="gender" value="female" style="width:20px;">
                                                    Male<input type="radio" name="gender" value="male" style="width:20px;"> Other<input type="radio" name="gender" value="other" style="width:20px;"><br>
          <label id="labelTerms"> Do you agree to the terms and conditions of using our services? <input type="text" value="off"name="terms_" id="terms_" required />
		 </label	>
			<input type="submit" name="reg" value="Sign Up" style="margin-top:10px;"/></center>
			  </form></div>
	<!-------Sign up Circle ended-------->		
         
	
   
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="text-align:center;">
     
        <span class="close" id="close1"style="float:right;">X</span>
          
	       
			<label style="padding:10px;font-family:helvetica;font-size:15px;">If already a member sign in</label>
		   <form action="<?php echo URL;?>login/run" id="logged_in" method="POST" style="padding:20px;">
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

	</div>	 </div>