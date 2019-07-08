$(document).ready(function(){ $("input").prop('required',true);$('#register').submit(function(){
var user=$("#un").val();var email=$("#em").val();var pswd=$("#pswd").val();var url=$(this).attr('rel'); var url2=$(this).attr('action');
 var data2=$(this).serialize();$.ajax({type: "POST",data:{'user':user, 'email':email, 'pswd':pswd},url:url, success: function(data){ if ($.trim(data) === "") {
					$.post( url2, data2, function(o){ modal("<div id='error' ><label style='font-size:18px;color:rgba(10,110,210,1);'>Thank you for Sign up, You are welcome to Vaarta</label> <br><br>Now please click on the link we have emailed to confirm the Login or <a href='"+url_vrt+"login'>direct login</a> from here.</div>");
			  }); return false; }else{  if($.trim(data)=="Username already taken"){//alert("red");
										$('#un').css('background-color','#ffaaaa');}else if($.trim(data)=="Email already in use."){ $('#em').css('background-color','#ffaaaa');
									}modal("<div id='error' ><label style='font-size:18px;color:rgba(10,110,210,1);'>"+data+"</div>");
							   } } }); return false;  });
	    $('#logged_in').submit(function(){var user_login=$("#u_l").val(); // alert(user_login);
			var password_login=$("#p_l").val(); var url2=$(this).attr('action');var data2=$(this).serialize();$.post(url2,data2,function(data){
							    if (data.trim()=="login_failed") {
                                var modal_new = document.getElementById('myModal');
									 modal_new.style.display = "none";
								    modal("<div id='error' ><label style='font-size:18px;color:rgba(10,110,210,1);'>User Does not Exist.</label></div>");
								  return false;
							   }else if(data.trim()=="login_pswd"){
								    var modal_new = document.getElementById('myModal');
									 modal_new.style.display = "none";
								  modal("<div id='error' ><label style='font-size:18px;color:rgba(10,110,210,1);'>wrong password</label></div>");
							 return false;
							   }else{
								location.href =url_vrt+'gallery_area';  
							   }
							 
						   });
						     return false;
							   });
	 });	
