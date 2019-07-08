$(document).ready(function (){
	   
	              $.post('requests/get_the_request',{'user':user_logged},function(o){
					  
					 if(o[0].value!="No"){  for(i=0;i<o.length;i++){$('#my_requests').append('<div  style="cursor:pointer;clear:both;overflow:hidden;margin-top:2px;cursor:pointer;border-bottom:.1px solid #efefef;" id="'+o[i].user_from+''+$.md5(o[i].id)+'"><div style="width:100px;float:right;"><button id="vaarta" onclick="accept('+"'"+o[i].user_from+"'"+','+o[i].id+')" style="padding:5px 12px;">Accept</button><button onclick="decline('+"'"+o[i].user_from+"'"+','+o[i].id+')" onmouseover="style='+"'background:#fff;padding:5px 12px;'"+'" onmouseout="style='+"'background:#FD0053;padding:5px 12px;'"+'" id="vaarta" style="background:#FD0053;padding:5px 12px;">Decline</button></div></div><br>');
					  profile_pic_check(o[i].user_from,o[i].id);} }else{$('#my_requests').append("<div id='error'>No Friend requests</div>"); }  },'json');});

					  function accept(user_from,id){
	  $.post('requests/accept_it',{'user':user_from},function(o){
		  if(o.trim()=="No"){
			  $('#'+user_from+''+$.md5(id)).html("<div id='error'>"+user_from+" is now your friend</div>");
			setTimeout(30000);
			//$('#'+user_from+''+$.md5(id)).hide();
			  
		  }else{
			  modal("<div id='error'>"+o+"</div>")
		  }
	  });
	  
}
function decline(user_from,id){
	  $.post('requests/decline_it',{'user':user_from},function(o){
		 $('#'+user_from+''+$.md5(id)).hide();
		 
	  });
}

function profile_pic_check(added_by,id){
	
	$.ajax({
    url: url_vrt+'profile/get_user_friends_data',
    type: 'POST',
	data:{added_by},
    error: function()
    {
      
    },
    success: function(data_pic)
    {   
	//<a href='"+url_vrt+added_by+"' style='cursor:pointer;'>
		 
		if(data_pic.trim()==""){
			$('#'+added_by+''+$.md5(id)+'').append("<img height='60' width='60'style='cursor:pointer;padding:5px;border-radius:50%;float:left;'title='"+added_by+"' src='"+url_vrt+"public/images/default-pic.png'/><label style='cursor:pointer;padding:20px 10px;float:left;'>"+added_by+"</label>");
		}else{
			$('#'+added_by+''+$.md5(id)+'').append("<img height='60' width='60'style='cursor:pointer;padding:5px;border-radius:50%;float:left;' title='"+added_by+"' src='"+url_vrt+"public/userdata/profile_pics/"+data_pic+"'/><label style='cursor:pointer;padding:20px 10px;float:left;' >"+added_by+"</label>");
		} 
    }
});
}