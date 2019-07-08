<?php

?>
<script>
$(document).ready(function(){
var stillAlive = setInterval(function () {
          $.post("<?php echo URL; ?>gallery_area/get_online",{data:'tiwarinitin94'},function(o){//alert(o);
		  });
		 
		  
}, 6000);

$("#file_chat").change(function() {
	$(".msg_chat_class").submit();
});
});

</script>
<div class="chatbox" >
<div id="chat_id" style="clear:both; overflow:hidden;">
<span  style="cursor:pointer;float:left;font-weight:bold;">
<img src="http://localhost/Vaarta(official)/public/images/back.png" width="30"/>
</span></div>
<div  style="overflow-y:scroll; overflow-x:hidden;height:75%;" id="msg_chat">
</div>
<form id="uploadimage" class="msg_chat_class" rel="<?php echo URL; ?>message/send_the_problem_out" 
width="100%"action="" method="post" style="border-top:.1px solid #000;"enctype="multipart/form-data" >

 <div class="row">
   <div class="col-sm-11" >
<input type="text" id="msginput_chat" name="msginput"  placeholder="Write reply"  style="font-size:12px;border:none;outline:0px;"/></div>
<div class="col-sm-1">
 <img src="<?php echo URL; ?>public/images/camera.png" onclick="document.getElementById('file_chat').click(); return false;" onclick="togglepost()"title="Upload image"style="float:left;position:relative;height:20px; width:20px;cursor:pointer;"/>

</div>
 <div class="col-sm-12">

<input type="file" name="file" id="file_chat" accept="image/*" style="visibility: hidden;background-color:transparent;" />
</div>
</div>
</form>
 </div>

<div style="width:100%;bottom:0px;position:fixed;background:#fafafa;z-index:4;-moz-box-shadow:0px 4px 4px rgba(90,90,90,.2), 0px -4px 4px rgba(90,90,90,.2);box-shadow:0px 4px 4px rgba(90,90,90,.2), 0px -4px 4px rgba(90,90,90,.2);">
<div style="width:100%; ">
<center id="bottom_menu">
<a href="<?php echo URL . "message"; ?>" title="Message"> <img src="<?php echo URL; ?>public/images/msg.png" style="width:50px;padding:10px; "/></a>
<a href="<?php echo URL . "settings"; ?>" title="Settings"><img src="<?php echo URL; ?>public/images/new_set.png" style="width:50px;padding:10px; "/></a>
<a href="<?php echo URL . "news"; ?>" title="Notification"><img src="<?php echo URL; ?>public/images/news.png" style="width:50px; padding:10px;"/></a>
<a href="<?php echo URL . "requests"; ?>" title="Requests"><img src="<?php echo URL; ?>public/images/frenz.png" style="width:50px;padding:10px; "/></a>
<a href="<?php echo URL . "message"; ?>"><img src="<?php echo URL; ?>public/images/msg.png" style="width:50px;padding:10px; "/></a>
</center>
</div>
</div>

<div id='this_counter_for_cr_id' class="hide_stuff" ></div><div class="hide_stuff" id='this_counter_for_cid' ></div>


