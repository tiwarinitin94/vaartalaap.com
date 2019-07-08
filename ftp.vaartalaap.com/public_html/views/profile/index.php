<?php 
if (isset($this->data_profile)) {
  if ($this->data_profile['profile_pic'] == "") {
    $profile_ = URL . "public/images/default-pic.png";
  } else {
    $profile_ = URL . "public/userdata/profile_pics/" . $this->data_profile['profile_pic'];
  }

} else {
  echo "<script>alert('Something went terribly wrong');</script>";
  die();
}

$user_data = new user();





?><script>


  var user={user_profile:"<?php echo $this->data_profile['username']; ?>",
            id:"<?php echo $this->data_profile['id']; ?>",
            profile_image:"<?php echo $profile_; ?>",
            firstName:"<?php echo $this->data_profile['first_name']; ?>",
            lastName:"<?php echo $this->data_profile['last_name']; ?>",
            bio:"<?php echo $this->data_profile['bio']; ?>",
            country:"<?php echo $this->data_profile['country']; ?>"
          };
user_follow=<?php $user_data->followers_of_pro($this->data_profile['id']); ?>;
user_following=<?php $user_data->followings_of_pro($this->data_profile['id']); ?>;
image_data=<?php $user_data->image_data($this->data_profile['username']); ?> ;
check_if_follow="<?php $user_data->check_follow($this->data_profile['id']); ?>" ;

 

$(document).ready(function(){

 

for (var i = 0; i <user_follow.length; i++) {
            if (i == 15) {
                break;
            } else {
                profile_pic_check(user_follow[i].followed_by, "followers");
                profile_pic_check(user_follow[i].followed_by, "all_followers_im");
            }
  }

for (var i = 0; i <user_following.length; i++) {
            if (i == 15) {
                break;
            } else {
                profile_pic_check(user_following[i].followed_to, "following");
                profile_pic_check(user_following[i].followed_to, "all_following_im");
            }
  }




for (var i = 0; i < image_data.length; i++) {
    src_image = '' + url_vrt + 'public/userdata/media_blog/' +image_data[i].src;
     img=new Image();
     img2=new Image();
     if(i<13){
     img.src=src_image;
     img.style.width="60px";
     img.style.padding="5px";
     }
     img2.src=src_image;
     img2.style.width="80px";
     img2.style.padding="5px";
    
    $("#image_data").append(img);
    $('#all_media_im').append(img2);
  }


  if(check_if_follow.trim()=="yes"){
   $("#follow").html("Following");  
}else{ 
   $("#follow").html("Follow");
}




  $('#vaarta').click(function(){
       if($('#vaarta_rel').height()){
           $('#vaarta_rel').css('height','0px');
            $('#vaarta_rel').css('padding','0px');
         }else{
            $('#vaarta_rel').css('height','auto');
             $('#vaarta_rel').css('padding','10px 0px');
         }
      }); 
      $('#add_user').click(function(){ 
          if($('#add_user').html()=="Pick User"){
             /*If send request*/send_request(user_pro);
           }else if($('#add_user').html()=="Unpick"){
               /*If cancel request*/console.log("Unpick the user");
              }
            });  
  


     $("#follow").mouseover(function() {
       if ($("#follow").html() == "Following") 
       {
           $("#follow").html("Unfollow");
        }
      if ($("#follow").html() == "Follow")
       {
         $("#follow").html("Follow User");
        }
      });
   
      $("#follow").mouseout(function() {
          if ($("#follow").html() == "Unfollow")
           {
              $("#follow").html("Following");
            }
            if ($("#follow").html() == "Follow User") {
              $("#follow").html("Follow");
            }
          });


          $('#follow').click(function(){  
            var text_c = $('#follow').html();
            if(text_c === "Follow User"){
              follow_user(user.id);
            }else if(text_c === "Unfollow"){
              unfollow_user(user.id);
            } 
           });
           

            $.post(url_vrt+'profile/get_cid_from_user/',
            {pr_id:user.id},
            function(o){
              $('#send_msg').attr('rel',o);
            });


});





function fetch_for_profile(fetch){
  /*
  if(fetch=="all_friends"){	
    $(document).ready(function(){ 
      $.post(url_vrt+'profile/friends_of_pro/',
      {profile_data:user.user_profile},
      function(o){	if(o!="")
        {
          for(var i=0; i<o.length;i++){
            if(i==15){ 
                break;
               }else{
                  if(o[i]!=""){	
                    modal('<div id="this_will_show_image"></div>'); 
                    profile_pic_check(o[i], "all","");
                  }
                }
              }
            }else{
              modal('<div id="error"><label style="color:#999;">Seems like you don\'t have friends. </label></div>');
            }
           },'json');
          });	
	}else{	
    $(document).ready(function(){$.post(url_vrt+'profile/image_data/',{
      data:'all',profile_data:user.user_profile
    },function(o){ 
       if(o!=""){
         for(var i=0; i<o.length;i++){
            modal('<div id="this_will_show_image_data"></div>');
             check_file_pro(o[i].post_image,"all");
             }
             }else{ 
               $("#image_data").unbind().html('<div id="error"><label style="color:#999;">Seems like you don\'t have photos. </label></div>'); 
              }
            }
         ,'json');
       });
    }
    */
}



 function cancel(){
             $.post(url_vrt+'profile/cancel_request'
             ,{ 'data':user_pro},
             function(o){
               $('#add_user').html('Pick User'); 
               $("#cr_cancel").remove();
              });
            }
            setTitle(""+user.firstName+"");

	 </script>
<div class="content">
<div id="wrapper" style="margin-top:90px; padding-bottom:10%;background:#ffffff;">


<div id="pro_intro_pro" >
<div class="row">
 <div class="col-sm-4">
   <img id='profile_img_pro' src='<?php echo URL; ?>public/images/default-pic.png' title="" style='margin:0 auto;padding:10px;' width='200px'  ></img>
   </div>
    <div class="col-sm-8">
   <div class='gal_name_pro' style=' padding:10px;'>
      <label style="font-size:20px;"><?php echo $this->data_profile['first_name'] . ' ' . $this->data_profile['last_name']; ?> </label><br>
      <label id='un' ><a href=' <?php echo URL . $this->data_profile['username']; ?>'> <?php echo $this->data_profile['username']; ?> </a></label>
      <br><label style="font-size:15px;font-weight:normal;"> <?php echo $this->data_profile['bio']; ?> </label>
      <br> <?php echo $this->data_profile['country']; ?> <br>
     
   <button id="vaarta">Start Vaarta <label style="margin-top:-10px; outline:none;float:right;padding:5px;">&#8964;</label></button>
   <div id="vaarta_rel"><button onclick="chatRun()" id="send_msg">Send Message</button><button id="follow">Follow</button><button id="add_user">Pick User</button></div>
   </div>
   </div><!----col ended---->
    
   </div><!---row ended---->
   </div><!--pro intro pro ended-->




  <div class="row">
   <div class="col-sm-4">
   <div class="left_pro"style="max-width:600px;">
   <br>



<!---<div id='frenz'> 
<button id="edit" onclick="fetch_for_profile('all_friends')">See All</button>
<label id='heading' >Frenz</label>
<br><br>
</div> ---->
         
<div >
<button id="edit" onclick="fetch_for_profile('all_image')">See All</button>
<label id='heading' >Photos </label>
<div id="image_data"></div>

</div>
<br>
<div id='followers'>
<button id="edit" onclick="fetch_for_profile('all_follower')">See All</button>
<label id='heading' >Followers</label><br><br>

</div>

</div>
</div>
 <div class="col-sm-8">

 <script>
 $('#valueSave').addClass('not_active_url');

 function changeactiveclass(essence){
   active_class_id=$('.active_tab').attr('id');
   if(essence.className !='active_tab'){
     document.getElementById(""+active_class_id+"").className='passive_tab';

     essence.className='active_tab';
   }

 }

 </script>
 <style>
 .nav_buttons{
  width:100%;
 }

 #nav_button{
   width:20%;
   border:.1px solid #efefef;
   float:left;
   text-align:center;
   padding:5px;
   background:#ffffff;
   cursor:pointer;
 }
.passive_tab{
  display:none;
}
 .active_tab{
   display:block;
 }
 #headActive{
   background:#ef6c00;
   padding:10px;
   color:#ffffff;
   text-align:center;
   border:.1px solid #efefef;
 }
 </style>
<div class="content3" style="max-width:600px;">
<div class="nav_buttons" >
<div id="nav_button" onclick="changeactiveclass(document.getElementById('profile_content'))">Profile</div>
<div id="nav_button" onclick="changeactiveclass(document.getElementById('all_followers'))">Followers </div>
<div id="nav_button" onclick="changeactiveclass(document.getElementById('all_following'))">Following</div>
<div id="nav_button" onclick="changeactiveclass(document.getElementById('all_media'))">Media</div>
<div id="nav_button" onclick="changeactiveclass(document.getElementById('all_post'))">Posts</div>
</div>

<!---nav button ended---->

<!---Content from Profile--->
<div  id="profile_content" class="active_tab">
<div id="info_pro">
</div>
<div id="info_pro_hobby">
</div>
<div id="info_pro_style">
</div>
<div id="info_pro_sign">
<div class='gal_name'style='float:none;font-size:13px;text-shadow:none;'>
<img id='sign_image'src='<?php echo URL; ?>public/images/vaarta2.png' style="width:100%;"/>
</div>

</div>

</div>
<!-----Profile Content Ended--->
<!---Content from Followers--->
<div  id="all_followers" class="passive_tab">
<div id="headActive">Followers</div>
<div id="all_followers_im"></div>


</div>
<!-----Followers Content Ended--->

<!---Content from Following--->

<div  id="all_following" class="passive_tab">
<div id="headActive">Following</div>
<div id="all_following_im"></div>

</div>

<!-----Following Content Ended--->

<!---Content from media--->

<div  id="all_media" class="passive_tab">
<div id="headActive">Media</div>
<div id="all_media_im"></div>

</div>

<!-----media Content Ended--->

<!---Content from post--->

<div  id="all_post" class="passive_tab">
<div id="headActive">Post</div>
<div id="newsfeed_home_friends"></div>

</div>

<!-----post Content Ended--->



</div><!---Content3 ended------>

</div><!---Col ended------>
</div>
</div>
</div>
<div style="display:none;">