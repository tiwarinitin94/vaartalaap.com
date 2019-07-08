//data fetching
var  post_id="nothing";var check_function=0;var pageURL = $(location). attr("href");url_page=pageURL.replace(url_vrt,"");if(url_page="gallery_area/"){slash="/";}else{slash=""; }var img = document.createElement('img');
var no_more_get=0;
var the_max_width_of_div=100;		 //console.log(the_max_width_of_div);
 
if(check_function<1){
$(document).off().ready(function(){
	  
	  check_screen();
	  
	  //Check width of screen 
	  $(window).resize(function(e){
	   check_screen();
	  });
	
	  var pic; var data_pic; var count=1; 
	  
	  //calling more
	  
	  
$(window).scroll(function(){
				  var height=$(window).height();
if ($(window).scrollTop() == $(document).height() - height ){
	
get_more(post_id);
}
});
	 
		  
		  //-------------------------------------------user news	
	      if(post_id=='nothing'){
		 get_more(post_id);
		  } 
		   

});


function check_screen(){  //Check width of screen 
	  if($(window).innerWidth() <= 490)  {
        //...
	//	console.log("width is 500");
	     $('.content').css('padding','0px');
		$('.postForm1').css('width','100%');
		$('.postForm1').css('margin','5px auto');
		$('.header20').css('position','initial');
		
    } else {
		$('.postForm1').css('margin','90px auto');
        $('.postForm1').css('width','550px');
		$('.content').css('padding','10px 20px 10px 20px');
		$('.header20').css('position','fixed');
    }
}

var count=0;var special_count=0;
  /* Function to preview image after validation//$(document).ready(function() {	$("#file").change(function() {	i=this.files.length-1;var file= this.files[i];var imagefile = file.type;var match= ["image/jpeg","image/png","image/jpg"];if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){  $('#image_preview'+i+'').append(' <input type="file" id="file'+count+'" name="pic" accept="image/*" style="visibility: hidden;background-color:transparent;"  />');$('#image_preview'+i+'').append("<a href='#' onclick='call_click("+count+");' value='url()' ><img id='previewing"+preview_count+"' src='"+url_vrt+"public/images/noimage.png'/></a>");$('#previewing').attr('src',url_vrt+'public/images/noimage.png');$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");return false;}else{	var reader = new FileReader();reader.onload = imageIsLoaded;reader.readAsDataURL(this.files[i]);}});*///});

function this_check_image(count_file,value){
	if(value){
	//	alert("true"+count);
	}else{
	$("#file"+count_file+"").change(function() {
		i=this.files.length-1;
//	alert(count_file);
var file= this.files[i];
	
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];

if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
   
   // $('#stick_post').append(' <input type="file" id="file'+count+'" name="pic'+count+'" accept="image/*" style="visibility: hidden;background-color:transparent;"  />');
	//$('#image_preview'+i+'').append("<div style='overflow:hidden;width:100px;height:80px;float:left;margin-left:10px;'><a href='#' onclick='call_click("+count+");' value='url()' ><img id='previewing"+preview_count+"' src='"+url_vrt+"public/images/noimage.png'/></a></div>");
 
$('#previewing'+count_file).attr('src',url_vrt+'public/images/noimage.png');
$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span></p>");
return false;
	 
}
else
{
	var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[i]);
}

	});
	}
}


/* 
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[i]);
 */

var img_wdth="width";
var img_height;

//If Image is Loaded
	
	 function imageIsLoaded(e) {
	//	 alert("this->"+count);
//if it is first file	 
$("#file").css("color","green");
$('#image_preview').css("display", "block");

     if(special_count>0){
		// alert("Here this will change");
		 i=special_count-1;
	 }else{
element=document.getElementsByClassName("new_img");
i=element.length-1;
	 }
$('#previewing'+i+'').attr('src', e.target.result);

var image = new Image();
    image.src = e.target.result;
 image.onload = function() {
	 img_wdth=this.width;
	 img_height=this.height;
	 
	// alert(img_height+","+img_wdth);
	  if(img_wdth>160){
         img__wdth=160;
        img_height=(img_height/img_wdth)*img__wdth;
		
		 $('#previewing'+i+'').attr('width',img__wdth );
     $('#previewing'+i+'').attr('height',img_height);
		 
} 
    	count=i+1;
		if(special_count<=0){
			$('#stick_post').prepend(' <input type="file" id="file'+count+'"  name="pic'+count+'" accept="image/*" style="display:none;background-color:transparent;"  />');
$('#image_preview').append("<div style='overflow:hidden;width:100px;height:80px;float:left;margin-left:10px;margin-top:5px;'><a href='#' onclick='call_click("+count+");' value='url()' ><img class='new_img' rel='"+count+"' id='previewing"+count+"' src='"+url_vrt+"public/images/noimage.png'/></a></div>");
	
		}else{
		special_count=0;	
		}
		
		}
		
 }


function call_click(count){
	new_count=count+1;
		if(document.getElementById('file'+new_count) != null){
		special_count=$('#previewing'+new_count).attr('rel');
		
	
	//alert("this count is ->"+count+"This is special count->"+special_count);
	document.getElementById('file'+count+'').click(); this_check_image(count,true);return false;
}else{
document.getElementById('file'+count+'').click(); this_check_image(count,false);return false;
}
}

	
function togglepost(){$("#image_preview").toggle(); }	


//submit
var value;
$(document).ready(function(){
 
 $('#stick_post').on('submit',function(e){
	  var url2=$('#stick_post').attr('rel');
	  alert($('#post').val());
	  mypost=linkify($('#post').val());
	  $('#post').val(mypost);
	//  console.log(mypost);
	  //alert(mypost);
   e.preventDefault();
	$.ajax({
    url: url2, // Url to which the request is send
     type: "POST",             // Type of request to be send, called as method
	data:new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)  
    contentType: false,       // The content type used when sending data to the server.
    async: false,      
    cache: false,             // To unable request pages to be cached
     processData:false,        // To send DOMDocument or non processed data file it is set to false

success: function(data)   // A function to be called if request succeeds
{

alert(data);

}

});
//setTimeout(2000);
 return false;
	  });
	  
	
	  
	  
	  });	



//---------------------------------------------------Function------------------------------------------------------------//
//fetch sys

//------------------------------------data fetching
function get_more(post_id_f){	
  // alert(id); 
  if(no_more_get!=1){
		  $.post(''+url_vrt+'gallery_area/get_user_news/helloalkddaklfjakldjaksdjaakdjdakljdkjdksjkjakjdksjdakjssjdksdjsa',{'last_id':post_id_f},function(o){
			  if(o==""){
				  no_more_get=1;
				  $('#newsfeed_home_friends').off().append('<div id="error"><label style="color:#999;">Seems like you have came to an end. </label></div>');
			  }else{
			  for(var i=0; i<o.length;i++){
				    	data_pic_value(o[i].id,o[i].added_by,o[i].date_added,o[i].body,o[i].post_image,o[i].user_posted_to,o[i].if_shared);
							
							if(i==o.length-1){
								post_id=o[i].id;
								//alert(post_id);
							}
							}
			  }
		   },'json');
  }
}



var data_pic;
//-----------------------------------------image creating
 function data_pic_value(id,added_by,date_added,body,post_image,user_posted_to,if_shared){ 
   		 profile_pic_check(added_by,id);
			  if(post_image!='Nothing'){
					check_file(post_image.trim(),id);
						}
				uid=$.md5(id);
				check_likes(id);
				if(body==''+added_by+' has changed profile pic'){
					body_profile='<a href="'+url_vrt+'/'+added_by+'">'+added_by+'</a> has changed profile pic';
					body="";
					
				}else{
					body_profile="";
				}
				if(document.getElementById("post-image"+id+"")==null){
					
	$('#newsfeed_home_friends').off().append("<div class='status' id='status"+id+"'><div id='post-head'><div id='post-image"+id+"' class='post-image_work'></div><div class='posted_by'><a href='#'>"+added_by+"</a></div><button id='del_but"+id+"' class='del'>x</button></div><div id='profile_changed' style='background-color:#fbfbfb;color:#888;text-align:center;'>"+body_profile+"</div><div id='status1'><label id='post_style"+id+"'  style='word-wrap:break-word;overflow:hidden;font-weight:normal;font-family:helvetica;font-size:15px;text-shadow:none;padding:10px 5px;' >"+body+"</label><div id='new_img"+id+"' style='overflow:hidden;clear:both;'></div></div><div class='active_buttons'><button style='outline:none;color:#999;' id='comments"+id+"' ><img src='"+url_vrt+"public/images/cmmnts.png'/>Comments</button><button id='like_"+id+"' style='outline:none;'><img src='"+url_vrt+"public/images/lift1.png'/>Lift up</button><button id='dislike_"+id+"' style='outline: none; color: rgb(153, 153, 153);' ><img src='"+url_vrt+"public/images/liftd1.png'/>Lift down</button><button style='outline: none; color: rgb(153, 153, 153);' id='share"+id+"' ><img src='"+url_vrt+"public/images/stick.png' />Re-Stick </button><div id='post_poularity' ><div id='likes_det"+id+"' style='background-color:#1486E0;float:left;position:relative;height:3px;cursor:pointer;font-size:3px;' title='likes'>likes</div><div id='dislikes_det"+id+"' title='dislikes' style='cursor:pointer;height:3px;background-color:#D22142;float:left;position:relative;'></div></div><div id='toggleComment"+id+"'class='toggleComment' style=''></div></div>");
			 
	
				if(body.trim()==""){
						
						$('#post_style'+id+'').css('display','none');
						
					}
				
//------------------------------------------for toggleComment////////////////////------------	
    $('#comments'+id+'').click(function(){
		$('#toggleComment'+id+'').toggle();
	});		
			
				
	//for button work
	
	 $('#like_'+id+'').click(function(){
						    var text_c = $('#like_'+id+'').text();
							
							if(text_c.trim() === "Lift up"){
						   jQuery.ajax({
							   type: "POST",
							   url: ""+url_vrt+"gallery_area/like",
							   data: {uid:""+id+""},
							   dataType: "text",
							   success: function(data){	
							                check_likes(id);
							       }
							   });
							}else if(text_c.trim() === "Lifted up"){
								 jQuery.ajax({
							   type: "POST",
							   url: ""+url_vrt+"gallery_area/like_remove",
							   data: {uid:""+id+""},
							   dataType: "text",
							   success: function(data){	
							 	  check_likes(id);
							       }
							   });
							}
							    });

		//for button work
	
	 $('#dislike_'+id+'').click(function(){
						    var text_c = $('#dislike_'+id+'').text();
							
							if(text_c.trim() === "Lift down"){
						   jQuery.ajax({
							   type: "POST",
							   url: ""+url_vrt+"gallery_area/dislike",
							   data: {uid:""+id+""},
							   dataType: "text",
							   success: function(data){	
							                  check_likes(id);
							       }
							   });
							}else if(text_c.trim() === "Lifted down"){
								 jQuery.ajax({
							   type: "POST",
							   url: ""+url_vrt+"gallery_area/dislike_remove",
							   data: {uid:""+id+""},
							   dataType: "text",
							   success: function(data){	
							 	  check_likes(id);
							       }
							   });
							}
							    });
								
				//delete sys
            $(document).ready(function(){
	                        $('#del_but'+id+'').click(function(){
	                          jQuery.ajax({
		                        type: "POST",
							   url: url_vrt+"gallery_area/delete_post",
							   data:{'id':id},
							   dataType: "text",
							   success: function(data){	
							   
							       modal(data); 
                                    								   
							       }
							   });
							   
							   });
							   
							   
							$('#share'+id+'').click(function(){
	                          jQuery.ajax({
		                        type: "POST",
							   url: ""+url_vrt+"gallery_area/share_post",
							   data:{'id':id},
							   dataType: "text",
							   success: function(data){	
							   
							       modal(data); 
                                    								   
							       }
							   });
							 
							   });   
							   
                    });					
				
 		
				}			
				
				}
				
	
function yes(del_id,for_share){
//	alert(for_share);
	if(for_share!=""){
		jQuery.ajax({ 
            		type: "POST",
				    url: url_vrt+"gallery_area/share_post",
					data: {'id':id},
					dataType: "text",
					success: function(data){	
							    
							   modal(data); 
                                    								   
							       }
							   });
	}else{
	jQuery.ajax({  type: "POST",
							   url: url_vrt+"gallery_area/delete_post",
							   data: {'del_id':del_id},
							   dataType: "text",
							   success: function(data){	
							     $('#status'+del_id).hide();
							       modal(data); 
                                    								   
							       }
							   });
}
 }	
function no(){ var modal = document.getElementById('myModal2');modal.style.display = "none";}	

function profile_pic_check(added_by,id){
	$.ajax({
    url: ''+url_vrt+'gallery_area/get_user_friends_data',
    type: 'POST',
	data:{'added_by':added_by},
    error: function()
    {
      
    },
    success: function(data_pic)
    {
		if(data_pic.trim()==""){
			if(document.getElementById('post-image'+id+'').innerHTML.trim()==""){
			$('#post-image'+id+'').off().append("<img height='30' width='30'style='  box-shadow:0px 1px 2px 0px #999;border:.1px solid #efefef;border-radius:50%;' src='"+url_vrt+"public/images/default-pic.png'/>");
			}
		
		}else{
			
			if(document.getElementById('post-image'+id+'').innerHTML.trim()==""){
			$('#post-image'+id+'').off().append("<img height='30' width='30'style='  box-shadow:0px 1px 2px 0px #999;border:.1px solid #efefef;border-radius:50%;' src='"+url_vrt+"public/userdata/profile_pics/"+data_pic+"'/>");
			}
		}  
    }
});
}
function check_file(file,id){
 	
	$.ajax({
    url: ''+url_vrt+'gallery_area/get_file_existance',
    type: 'POST',
	data:{'file':file,max_width:the_max_width_of_div},
    error: function()
    {
       
    },
    success: function(o)
    {
		o=o.replace('"','');
		o=o.trim();
			var k=o.split(",");
			/*
			k[0] for directory
			k[1] for height
			k[2] for width
			*/
			
			
			 document.getElementById("new_img"+id+"").html=""
			 
		if(k[0]=="cover"){			
			 src_image=''+url_vrt+'public/userdata/cover_pics/'+file;
			  if(document.getElementById("new_img"+id+"").innerHTML.trim()==""){
            $("#new_img"+id+"").off().append("<img id='img"+id+"' height='"+k[1]+"%'  style=' width:100%;' src='"+src_image+"'/>");
			  }
		}else if(k[0]=="profile"){
			 src_image=''+url_vrt+'public/userdata/profile_pics/'+file;
			 if(document.getElementById("new_img"+id+"").innerHTML.trim()==""){
      $("#new_img"+id+"").off().append("<img id='img"+id+"' height='"+k[1]+"%'  style=' width:100%;' src='"+src_image+"'/>");
			 }
		}else if(k[0]=="data"){		
	   src_image=''+url_vrt+'public/userdata/data_pics/'+file;
	   if(document.getElementById("new_img"+id+"").innerHTML.trim()==""){
      $("#new_img"+id+"").off().append("<img id='img"+id+"' height='"+k[1]+"%' style=' width:100%;' src='"+src_image+"'/>");
	   }
		}else{
			 src_image=''+url_vrt+'public/userdata/cover_pics/'+file;
			 if(document.getElementById("new_img"+id+"").innerHTML.trim()==""){
      $("#new_img"+id+"").off().append("Image may be broken or removed");
			 }
			
		}  
		 get_album(id);	
    }
},'json');	
}




//for getting album of user if available
function get_album(id){
	$.post(''+url_vrt+'gallery_area/get_album',{'id':id},function(o){
		if(document.getElementById("new_album"+id+"")==null){
		//	alert("null");
		
		div_width=(100/o.length);
		//console.log(div_width+" "+o.length);
      $("#new_img"+id+"").off().append("<div id='new_album"+id+"' style='width:100%;margin-top:1px;'></div>");
	  for(i=0;i<o.length;i++){
		img.src=o[i].img; 
        img_wdth=img.width;
		//console.log(img.width);
				img_height=img.height;
				 if(img_wdth>200){
               img__wdth=200;
                img_height=(img_height/img_wdth)*img__wdth;
				 }else{
					 img__wdth=img_wdth;
					
				 }
             $('#new_album'+id+'').append("<img id='img"+id+"'  width='"+div_width+"%'  src='"+url_vrt+"public/userdata/data_pics/"+o[i].img+"'/>");				 
	  }
	 // "<img id='img"+id+"' height='"+k[1]+"' width='"+k[2]+"' src='"+src_image+"'/>");
	   }
	},'json');
}


function check_likes(id){
	//fetch if user liked
jQuery.ajax({
							   type: "POST",
							   url: ""+url_vrt+"gallery_area/fetch_like",
							   data: {uid:""+id+""},
							   dataType: "text",
							   success: function(data){	
							        if(data.trim()=="yes"){
										$( "#like_"+id+"" ).css('color','#008efd');
							      $( "#like_"+id+"" ).html("<img src='"+url_vrt+"public/images/lift2.png' style='color:;'/>Lifted up");
									}else{
										$( "#like_"+id+"" ).css('color','#999');
										   $( "#like_"+id+"" ).html("<img src='"+url_vrt+"public/images/lift1.png' style='color:#efefef;'/>Lift up");
                                       }
							       }
			 });
					

//Fetch all likes					
			jQuery.ajax({
							   type: "POST",
							   url: ""+url_vrt+"gallery_area/fetch_like_all",
							   data: {uid:""+id+""},
							   dataType: "text",
							   success: function(data){
                                 								   
							     check_dislike(id,data.trim());	
							       }
							   });
							   
    
}

function check_dislike(id,numOfLike){
	//check if user disliked
jQuery.ajax({
							   type: "POST",
							   url: ""+url_vrt+"gallery_area/fetch_dislike",
							   data: {uid:""+id+""},
							   dataType: "text",
							   success: function(data){	
							     if(data.trim()==="yes"){
									$( "#dislike_"+id+"" ).css('color','#c80017');
							      $( "#dislike_"+id+"" ).html("<img src='"+url_vrt+"public/images/liftd2.png'/>Lifted down");
									}else{
										$( "#dislike_"+id+"" ).css('color','#999');
										   $( "#dislike_"+id+"" ).html("<img src='"+url_vrt+"public/images/liftd1.png'/>Lift down");
									}
							       }
							   });
							   
							   
						//fetch all dislike	   
							   jQuery.ajax({
							   type: "POST",
							   url: ""+url_vrt+"gallery_area/fetch_dislike_all",
							   data: {uid:""+id+""},
							   dataType: "text",
							   success: function(numOfDislike){	
							         sumTotal=+numOfDislike + +numOfLike;
									 widthOfLike=(+numOfLike / +sumTotal)* +the_max_width_of_div;
									 widthOfDislike=(numOfDislike/sumTotal)*the_max_width_of_div;
									 if(!widthOfLike){ widthOfLike="0"; }
									 if(!widthOfDislike){widthOfDislike="0";}// console.log("Like=> "+numOfLike+" dislike->"+numOfDislike+" sum=> "+sumTotal+"with like=>"+widthOfLike);
                  $('#likes_det'+id).css("width",widthOfLike+"%"); $('#likes_det'+id).attr("title",numOfLike+' Lift Ups');$('#dislikes_det'+id).css("width",widthOfDislike+"%"); $('#dislikes_det'+id).attr("title",numOfDislike+' Lift Downs');
							       }
							   });
							   
    	
}


}