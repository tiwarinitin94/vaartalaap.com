var pic=url_vrt+"public/images/default-pic.png",firstName="",lastName="",bio="",country="";


function check_pswd(){
	if($('#oldie').val()==""){
		modal("<label id='heading2' style='padding:5px;text-align:center;'>Please fill the old password field.</label>")
	}else{
		paswd=$('#oldie').val()
		$.post("settings/checkPassword/",{pswd:paswd},function (o){alert(o);});
	}
}
function loadSetting(e){	
  console.log(e);
	if(e=="profile_set"){
	
		$('li').removeClass();
		$('#profile_set').addClass('active');
		loadProfileSet();
	}else if(e=="pswd_set"){
		
		$('li').removeClass();
		$('#pswd_set').addClass('active');
		loadPswdSet();
	}else if('#ac_set'){
	
		$('li').removeClass();
		$('#ac_set').addClass('active');
		loadAcSet();
	}else{
		alert("Do not try to be idiot :P ");
	}
}

function loadProfileSet(){
	
	loadProfileVal();
	
	
	
	updat_info_user='<center><form id="profile_file" action="" method="POST" enctype="multipart/form-data" style="margin:0px auto;">'+
               "<img src='"+pic+"' id='show_img' width='150' height='150' style='border-radius:50%;' /><br><br>"+
               '<input type="file" name="profilepic" id="uploading_image" accept="image/*" style="background-color:#fff;"/><br><br>'+			  
             '  <input type="submit" id="edit_submit" value="Change Image" ></input> '+
                  ' </form><button onclick="remove_image()" id="edit" style="padding-left:20px;text-align:center;float:none;outline:none;">Remove Image</button><br><hr><br>'+
				  '<input type="text" id="update_i_f_n" value="'+firstName+'" placeholder="First Name"></input> <input type="text" id="update_i_l_n" value="'+lastName+'" placeholder="Last Name"></input><br><button onclick="info_up('+"'f_n'"+')"style="border:.1px solid #999;padding:6px; margin-left:5px;background:#efefef;cursor:pointer;outline:none;">Update Name</button><hr> '+
				  '<input type="text"  id="update_i_tag" value="'+bio+'" placeholder="Tag Line"></input><br><br><button style="border:.1px solid #999;padding:6px; background:#efefef;cursor:pointer;outline:none;" onclick="info_up('+"'tag'"+')">Write Tag line</button><hr> <br>'+
				  '<input type="text"  id="update_i_ct" value="'+country+'" placeholder="In the world you Live"></input><br><button style="border:.1px solid #999;padding:6px; margin-left:5px;background:#efefef;cursor:pointer;outline:none;" onclick="info_up('+"'ct'"+')">Update Country</button></center>';
	
	$('#set_content').html(updat_info_user);
	
	
	  $('#profile_file').submit(function(e){
	  
e.preventDefault();
	$.ajax({
    url: url_vrt+'profile/update__profile_image/ajdfhadjfhadhflakjflkajflkadjfadlkfjadadfaldfdalfjadkfjadklfjadlkfjakldjkljdkas',
    type: 'POST',
	data:new FormData(this),
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,	
    error: function()
    {
      
    },
    success: function(data_pic)
    {   
		data_pic=url_vrt+"public/userdata/profile_pics/"+data_pic;
		$('#profile_img_pro').attr('src',data_pic);
		$('#show_img').attr('src',data_pic);
    }
	});
	
	return false;
   }); 
	  
}

function loadProfileVal(){
	$.post(url_vrt+'gallery_area/get_user_firstname/',{data_val:'lkfjkfakdfafjkajfkadjkajfajdfakdfadjfajnjasdhjsdjkasjdkashdlkasdjkasdjaskjaskldjksjd',other_u:user_logged},function(o){for(var i=0; i<o.length;i++){
		pic=o[i].profile_pic;
		
		if(pic!="")$('#show_img').attr('src',url_vrt+"public/userdata/profile_pics/"+pic);
		 if(o[i].first_name!=""){
			 $('#update_i_f_n').attr('value',o[i].first_name);
		 }
		 if(o[i].last_name!=""){
			 $('#update_i_l_n').attr('value',o[i].last_name);
		 }
		 if(o[i].bio!=""){
			  $('#update_i_tag').attr('value',o[i].bio);
		 }
		 if(o[i].country!=""){
			 $('#update_i_ct').attr('value',o[i].country);
		 }
		}//loop ends
		
	},'json' );
}

function loadPswdSet(){
	
	
	var update_pswd="<center>"+
	"<div id='set_content'><div  id='heading2'>Enter old Password</div><br><div id='showing_old_warning' style='font-size:12px;font-family:verdana;'>Please enter old password first</div><br><input type='password' id='oldie' placeholder='Enter old password'/><br><br><button id='check_pswd' onclick='check_pswd()'>Check</button><br><br><div id='heading2'>Enter new password</div><br><form method='post' > <input type='password' placeholder='Enter new password' disabled /><br><br><input type='password' placeholder='confirm password' disabled /><br><br><button>Change Password</button></form> </div>"+
	"</center>";
	$('#set_content').html(update_pswd);
}


function loadAcSet(){
	
}


function info_up(update_the_info){
	 if(update_the_info=='f_n'){
				   sirname=$('#update_i_l_n').val();
				   
	   }else{
		   sirname="";
	   }
	this_value=$('#update_i_'+update_the_info).val();
		$.ajax({type: "POST",
	url: "profile/update_data_of_info/"+update_the_info+"",
	data:{'data':this_value,
	     'data_sir':sirname},
cache: false,
success: function(html){

}
	});
}	


function remove_image(){
	$.ajax({
    url: url_vrt+'profile/remove__profile_image/ajdfhadjfhadhflakjflkajflkadjfadlkfjadadfaldfdalfjadkfjadklfjadlkfjakldjkljdkas',
    type: 'POST',
	error: function()
    {
      
    },
    success: function()
	{  
	   remove_pic=url_vrt+"public/images/default-pic.png";
	   //alert(remove_pic);
	$('#profile_img_pro').attr('src',remove_pic);
		$('#show_img').attr('src',remove_pic);
    }
	});
}
	