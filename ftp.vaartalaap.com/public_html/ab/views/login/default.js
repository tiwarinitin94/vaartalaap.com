$(document).ready(function(){
		
     $("input").prop('required',true);
	   
	   
	 
	    $('#register').submit(function(){
			var user=$("#un").val(); 
			var email=$("#em").val();
            var email2=$("#em2").val();			
            var pswd=$("#pswd").val();			
            var pswd2=$("#pswd2").val();			
		   var url=$(this).attr('rel');
		     var url2=$(this).attr('action');
			 var data2=$(this).serialize();
		  	   $.ajax({   type: "POST",
			               data:{user,
						   email,
						   email2,
						   pswd,
						   pswd2},url,
						   success: function(data){
							   if ($.trim(data) === "") {
					$.post(
			          url2,
			         data2,
			    function(o){
				     modal("<div id='error' ><label style='font-size:18px;color:rgba(10,110,210,1);'>Thank you for Sign up, You are welcome to Vaarta</label> <br><br>Now please click on the link we have emailed to confirm the Login or <a href='"+url_vrt+"login'>direct login</a> from here.</div>");
			  });  
		  return false;
		               }else{
								   modal("<div id='error' ><label style='font-size:18px;color:rgba(10,110,210,1);'>"+data+"</div>");
							   }
									 
                                         }
                              });	
			   															 
		  return false;
	   });
	   
	   
	    $('#logged_in').submit(function(){
		 var user_login=$("#u_l").val(); 
			var password_login=$("#p_l").val();
			 var url2=$(this).attr('action');
			 var data2=$(this).serialize();
			   $.post(url2,data2,function(data){
							    if (data=="login_failed") {
								    alert("wrong password");
								   return false;
							   }else{
								location.href =url_vrt+'gallery_area';  
							   }
							 
						   });
						     return false;
							   });
	 });	
