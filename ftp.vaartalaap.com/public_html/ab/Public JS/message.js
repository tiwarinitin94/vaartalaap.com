 var id_record = new Array(); var counter=0; var obj=new Array(); var obj_user=new Array();
 var the_new_crid="now"; var lastScrollTop = 0;	var lastScrollHeight=0;
 //id_r for cr_id conversation_r 
 //obj for c_id conversation
 //obj_user for user dta
 var img = document.createElement('img');
  /*img.onload = function(){
            //   console.log(this.width);
                    }*/
 $(document).ready(function(){    
	 
	 $.get('message/get_u_data/'+user_logged+'',function(o){
		
		 if(o[0].response== 'getout'){
			 $('#msg_div').append('<div id="error"><label style="color:#999;">Seems like you don\'t have any messages at all. </label></div>');
		 }else{
		
				   for(i=0;i<o.length;i++){
		
		         pattern_getter(o[i].c_id,o);
				 
		 	  }
	     
		 }
	 },'json');

	

	 $('#msg_data').scroll(function(event){
		 msgarea=document.getElementById("msg_data");
		    var st = $(this).scrollTop();
		   if (st == msgarea.scrollHeight){
			   setInterval(function(){  fetch_message($('#this_counter_for_cid').html(),''); }, 4500);
   
   }else if(st==lastScrollTop) {
	    if($('#this_counter_for_cr_id').html()!="Nothing"){
	   fetch_cid=$('#this_counter_for_cid').html();
         fetch_message(fetch_cid,the_new_crid);
   }else {
	  
	   }
   }
	 });
	 



	
$('#uploadimage').submit(function(e){    //send message
	  var url2=$('#uploadimage').attr('rel');
	current_cid="thissdlfhdgjhasbgadbgbdfdahgljadfhadjfhadjfhdfhdsajfhjdfhdljfhdlasfhldfjadjfafjadfj"+$('#this_counter_for_cid').html();  
   e.preventDefault();
	$.ajax({
    url: url2+'/'+current_cid, // Url to which the request is send
     type: "POST",             // Type of request to be send, called as method
	data:new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)  
    contentType: false,       // The content type used when sending data to the server.
    async: false,      
    cache: false,             // To unable request pages to be cached
     processData:false,        // To send DOMDocument or non processed data file it is set to false

success: function(data)   // A function to be called if request succeeds
{

         fetch_message($('#this_counter_for_cid').html(),'');
		 $('#msginput').val("");
		  var file= document.getElementById("file");
		  file.value="";
		 $('#image_preview').html('');

}

});
//setTimeout(2000);
 return false;
	  });
	  
	  
	
 });

 
 function pattern_getter(c_id,length_of){
	
	  $.post('message/get_pattern/',{'c_id':c_id},function(o){ 
		                              id_record.push(o[0].cr_id);
									  
									  counter++;
			 if(counter==length_of.length){
										   id_record.sort(function(a,b){
				                         return b-a;
			                                 });
			  counter=0;
			  call_create();
		  }
									  
	  	  },'json');
		 
 }
 
 function call_create(){
	 for(x=0;x<id_record.length;x++){
		 create_user_list(id_record[x],x,id_record.length);
	 }
	 
 }

 
 function create_user_list(cr_id,x,max){
	 //console.log(cr_id+"->"+x);
       $.post('message/create_user_data/IDIOTS_CHECK_THIS_OUT_FOR_Create'+x,{'cr_id':cr_id},function(o){
		  			 obj.push(o);
					 // console.log(o);
             		counter++;
                if(counter==max){
					counter=0;
					 call_obj();					 
				}					
			
			
	   },'json');
 
 }
 
 function call_obj(){
	 obj.sort(function(a,b){
		return a.oid-b.oid;
	 });
	for(i=0;i<obj.length;i++){
	
	//console.log(obj[i].oid+"->"+obj[i].cid);
	create_the_div(obj[i].cid,i,obj.length,obj[i].user_id_fk,obj[i].user_read);
	 
	}
	
	
	//console.log(obj);
 }
 function create_the_div(k,x,max,user_id_fk,user_read){
  // console.log(user_id_fk+"->"+user_read);
	 $.post('message/create_the_div/IDIOTS_CHECK_THIS_OUT_FOR_Create'+x,{'c_id':k,'user_id_fk':user_id_fk,'user_read':user_read},function(o){
		  obj_user.push(o);
		  //console.log(o);
		   counter++;
		   if(counter==max){
			counter=0;
		call_obj2();
		   }
		//call_obj2();
	   },'json');
 }
 
 
 function call_obj2(){
	obj_user.sort(function(a,b){
		return a.x-b.x;
	 });
	for(i=0;i<obj_user.length;i++){	
	if(obj_user[i].user_id_fk!=u_l_id && obj_user[i].user_read=='no' ){
		//console.log(obj_user[i].user_id_fk+'->if-> '+user_logged );
		color_new='5px 0px 6px 0px #777';
	}else{
		//console.log(obj_user[i].user_id_fk+'->else-> '+user_logged );
		color_new="none";
	}
	$('#msg_div').append('<div id="'+obj_user[i].user_name+'_'+obj_user[i].u_id+'" onclick="find_message('+obj_user[i].c_id+');"style="cursor:pointer;clear:both;overflow:hidden;margin-top:2px;cursor:pointer;box-shadow:'+color_new+';border-bottom:.1px solid #efefef;"></div>');
	profile_pic_check(obj_user[i].user_name,obj_user[i].u_id);
	
	}
	
//console.log(obj_user);
 }
 
 
 
 
 
function profile_pic_check(added_by,id){
	
	$.ajax({
    url: url_vrt+'profile/get_user_friends_data',
    type: 'POST',
	data:{'added_by':added_by},
    error: function()
    {
      
    },
    success: function(data_pic)
    {   
	//<a href='"+url_vrt+added_by+"' style='cursor:pointer;'>
		 
		if(data_pic.trim()==""){
			$('#'+added_by+'_'+id+'').append("<img height='60' width='60'style='cursor:pointer;padding:5px;border-radius:50%;float:left;'title='"+added_by+"' src='"+url_vrt+"public/images/default-pic.png'/><label style='cursor:pointer;padding:20px 10px;float:left;'>"+added_by+"</label>");
		}else{
			$('#'+added_by+'_'+id+'').append("<img height='60' width='60'style='cursor:pointer;padding:5px;border-radius:50%;float:left;' title='"+added_by+"' src='"+url_vrt+"public/userdata/profile_pics/"+data_pic+"'/><label style='cursor:pointer;padding:20px 10px;float:left;' >"+added_by+"</label>");
		} 
    }
});
}

function find_message(c_id){
		 move();
	   fetch_message(c_id,'');
       $('#this_counter_for_cid').html("");
	   $('#this_counter_for_cid').html(c_id);
}

function fetch_message(c_id,the_new_crid){
	var image=new Image();
	if(the_new_crid=="now"){//if scroller at top
		//alert("It will Work now");
		fetch_cr_id=$('#this_counter_for_cr_id').html();
		
	$.post(url_vrt+'message/get_the_anonymous_activity_that_is_going_out_there',{'the_new_crid':fetch_cr_id,'cid':c_id},function(data){
		$('#this_counter_for_cr_id').html("");
		 data.sort(function(b,a){
				return a.cr_id-b.cr_id;
			});
		//	console.log(data);
		 for(i=0;i<data.length;i++){
			$('#this_counter_for_cr_id').html(data[data.length-1].cr_id);
		
			if(data[i].pics!='Nothing'){
				pic_sent=url_vrt+'public/userdata/data_pics/'+data[i].pics;
				img.src=pic_sent;
				img_wdth=img.width;
				img_height=img.height;
				 if(img_wdth>200){
               img__wdth=200;
                img_height=(img_height/img_wdth)*img__wdth;
				 }else{
					 img__wdth=img_wdth;
					
				 }
				pic_sent='<img src="'+url_vrt+'public/userdata/data_pics/'+data[i].pics+'" height="'+img_height+'" width="'+img__wdth+'"/>';
			}else{
				pic_sent="";
			}
			
			
			
			 if(data[0].Nothing=="Nothing"){
				// alert(data[0].Nothing)
				$('#msg_data').prepend('<center style="color:#999; padding:20px;background:#fbfbfb; font-size:12px;">No More Messages....</center>');
				 $('#this_counter_for_cr_id').html("Nothing");
			 }else{
				 
			//console.log(data[0].username);
				if(data[i].username==user_logged){
				
				if(data[i].reply!=""){
				$('#msg_data').prepend('<div class="msgc" style="margin-bottom: 30px;"> <div class="msg msgfrom">'+data[i].reply+'</div><div class="msgarr msgarrfrom"></div><div class="msgsentby msgsentbyfrom">'+data[i].username+'</div> </div>');
				}
				if(data[i].pics!='Nothing'){
				$('#msg_data').prepend('<div class="msgc" style="margin-bottom: 30px;"><div class="msg msgfrom" style="padding:0px;background:transparent;">'+pic_sent+'</div><div class="msgarr msgarrfrom"></div><div class="msgsentby msgsentbyfrom">'+data[i].username+'</div> </div>');
				}
			}else {
				if(data[i].reply!=""){
			$('#msg_data').prepend('<div class="msgc"> <div class="msg">'+data[i].reply+'</div></div><div class="msgarr"></div><div class="msgsentby">'+data[i].username+'</div>');
				}
				if(data[i].pics!='Nothing'){
				$('#msg_data').prepend('<div class="msgc"> <div class="msg" style="padding:0px;background:transparent;">'+pic_sent+'</div></div><div class="msgarr"></div><div class="msgsentby">'+data[i].username+'</div>');
				
				}
			}
		
		 }
		 }
		 msgarea=document.getElementById("msg_data");
	var scrollHeight_dta=msgarea.scrollHeight;
		
		 if(scrollHeight_dta>lastScrollHeight){
			 var new_scroll=scrollHeight_dta-lastScrollHeight;
			 msgarea.scrollTop=new_scroll;
			 lastScrollHeight=scrollHeight_dta;
		 }
	
	},'json');
	}else{    //if its just opened
	 $.post(url_vrt+'message/get_the_anonymous_activity_that_is_going_out_there',{'cid':c_id},function(data){
		 
		
		 data.sort(function(a,b){
				return a.cr_id-b.cr_id;
			});
			 
		
			 $('#msg_data').html("");
			$('#this_counter_for_cr_id').html("");
		 for(i=0;i<data.length;i++){
			 
			 if(data[i].pics!='Nothing'){
				pic_sent=url_vrt+'public/userdata/data_pics/'+data[i].pics;
				img.src=pic_sent;
				img_wdth=img.width;
				img_height=img.height;
				 if(img_wdth>200){
         img__wdth=200;
        img_height=(img_height/img_wdth)*img__wdth;
				 }else{
					 img__wdth=img_wdth;
					
				 }
				pic_sent='<img src="'+url_vrt+'public/userdata/data_pics/'+data[i].pics+'" height="'+img_height+'" width="'+img__wdth+'"/>';
			}else{
				pic_sent="";
			}
			$('#this_counter_for_cr_id').html(data[0].cr_id);
			
			if(data[i].username==user_logged){
				
				if(data[i].reply!=""){
				$('#msg_data').append('<div class="msgc" style="margin-bottom: 30px;"> <div class="msg msgfrom">'+data[i].reply+'</div><div class="msgarr msgarrfrom"></div><div class="msgsentby msgsentbyfrom">'+data[i].username+'</div> </div>');
				}
				if(data[i].pics!='Nothing'){
				$('#msg_data').append('<div class="msgc" style="margin-bottom: 30px;"><div class="msg msgfrom" style="padding:0px;background:transparent;">'+pic_sent+'</div><div class="msgarr msgarrfrom"></div><div class="msgsentby msgsentbyfrom">'+data[i].username+'</div> </div>');
				}
			}else {
				if(data[i].reply!=""){
			$('#msg_data').append('<div class="msgc"> <div class="msg">'+data[i].reply+'</div></div><div class="msgarr"></div><div class="msgsentby">'+data[i].username+'</div>');
				}
				if(data[i].pics!='Nothing'){
				$('#msg_data').append('<div class="msgc"> <div class="msg" style="background:transparent;padding:0px;">'+pic_sent+'</div></div><div class="msgarr"></div><div class="msgsentby">'+data[i].username+'</div>');
				
				}
			}
			 
	} 
	msgarea=document.getElementById("msg_data");
		msgarea.scrollTop = msgarea.scrollHeight;
		lastScrollHeight=msgarea.scrollHeight;
	 },'json');
	}
}


function move(){
	   //$('#msg_data').attr('float','left');
	  
	   $('#msg_data').show();
	   $('#uploadimage').show();
	   
	  // $('#msg_div').css('width','200px');
	 //  $('#msg_div').css('float','left');
	   
     //  $('.head').animate({width:'900px'},400);
	  
		
		 
}


