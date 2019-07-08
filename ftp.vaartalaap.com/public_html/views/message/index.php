<style>#msg_data::-webkit-scrollbar,#msg_div::-webkit-scrollbar {width: 8px;}::-webkit-scrollbar-track {background-color: #eaeaea; border-left: 1px solid #ccc;}#msg_data::-webkit-scrollbar-thumb ,#msg_div::-webkit-scrollbar-thumb { background-color: #ccc;}#msg_data::-webkit-scrollbar-thumb:hover,#msg_div::-webkit-scrollbar-thumb:hover { background-color: #0084ff;}</style>

<div class="container">
 <div class="row"  style="margin-top:90px;">
 <div class="col-sm-3">
<div id='msg_div'>
</div>
</div>
<div class="col-sm-8">
<div id="msg_data" class="msg_d" style=" padding-top:80px;overflow-y:scroll;" >
</div>

<br>
<script>// Function to preview image after validation
$(function() {$("#file").change(function() {$("#message").empty(); // To remove the previous error message
var file = this.files[0];var imagefile = file.type;var match= ["image/jpeg","image/png","image/jpg","image/gif"];if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])||(imagefile==match[3])))
{$('#previewing').attr('src','noimage.png');$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false;}else{var reader = new FileReader();reader.onload = imageIsLoaded;reader.readAsDataURL(this.files[0]);}});});function imageIsLoaded(e){$("#file").css("color","green");
$('#image_preview').css("display", "block");$('#previewing').attr('src', e.target.result);$('#previewing').attr('width', '150px');$('#previewing').attr('height', '100px');};</script>
<form class="msg_d"id="uploadimage" rel="<?php echo URL;?>message/send_the_problem_out" action="" method="post" enctype="multipart/form-data" class="msg_d" style="height:auto;overflow-y:hidden;display:none;">

 <div class="row">
   <div class="col-sm-8">
<textarea  id="msginput" name="msginput"  placeholder="Press reply button to send message" ></textarea></div><div class="col-sm-4">
 <img src="<?php echo URL;?>public/images/camera.png" onclick="document.getElementById('file').click(); return false;" onclick="togglepost()"title="Upload image"style="float:left;position:relative;height:30px; width:30px;cursor:pointer;margin-left:5px;"/>
 <input type="submit"  style="float:left; position:relative;border:.1px solid #efefef;margin-left:10px; box-shadow:none; background-color:#fbfbfb; padding:10px;"value="Reply" class="submit" />
</div>
 <div class="col-sm-12">
<center> <div id="image_preview" style="display:none;"><img id="previewing" src="img/noimage.png" /></div></center>
<input type="file" name="file" id="file" accept="image/*" style="visibility: hidden;background-color:transparent;" />
</div>'
</div>
</form>

</div></div></div>
<div id='this_counter_for_cr_id' class="hide_stuff" ></div><div class="hide_stuff" id='this_counter_for_cid' ></div>

<!------------------




	