$(document).ready(function(){$("input").prop("required",!0),$("#register").submit(function(){var e=$("#un").val(),r=$("#em").val(),a=$("#pswd").val(),l=$(this).attr("rel"),o=$(this).attr("onsubmit"),i=$(this).serialize();return $.ajax({type:"POST",data:{user:e,email:r,pswd:a},url:l,success:function(e){if(""===$.trim(e))return $.post(o,i,function(e){modal("<div id='error' ><label style='font-size:18px;color:rgba(10,110,210,1);'>Thank you for Sign up, You are welcome to Vaarta</label> <br><br>Now please click on the link we have emailed to confirm the Login or <a href='"+url_vrt+"login'>direct login from here.</a> </div>")}),!1;"Username already taken"==$.trim(e)?$("#un").css("background-color","#ffaaaa"):"Email already in use."==$.trim(e)&&$("#em").css("background-color","#ffaaaa"),modal("<div id='error' ><label style='font-size:18px;color:rgba(10,110,210,1);'>"+e+"</div>")}}),!1}),$("#logged_in").submit(function(){$("#u_l").val(),$("#p_l").val();var e=$(this).attr("action"),r=$(this).serialize();return $.post(e,r,function(e){if("login_failed"==e.trim())return(r=document.getElementById("myModal")).style.display="none",modal("<div id='error' ><label style='font-size:18px;color:rgba(10,110,210,1);'>User Does not Exist.</label></div>"),!1;if("login_pswd"==e.trim()){var r=document.getElementById("myModal");return r.style.display="none",modal("<div id='error' ><label style='font-size:18px;color:rgba(10,110,210,1);'>wrong password</label></div>"),!1}location.href=url_vrt+"gallery_area"}),!1})});