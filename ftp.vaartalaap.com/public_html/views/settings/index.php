<?php 
if(isset($_GET['check'])){
	$check=$_GET['check'];
	?><script>$(document).ready(function(){loadSetting("<?php echo $check;?>");});</script>
	
	<?php
}else{
	?>
<script>$(document).ready(function(){loadProfileSet();});</script>
<?php
}
?>

<div class="content">
<div id="wrapper" style="margin-top:100px; padding-bottom:10%;">

  <div class="row" style="background:#fff;border:.1px solid #efefef;">
  <div class="col-sm-4" style="padding:10px;">
   <ul class="nav nav-pills nav-stacked">
  <li class="active" id="profile_set"><a href="?check=profile_set">Edit Profile</a></li>
 
  <li id="pswd_set"><a href="?check=pswd_set">Change password</a></li>
  <li id="ac_set"><a href="?check=ac_set">Account Settings</a></li>
 
</ul>
  </div>
  <div class="col-sm-8" style="padding:10px;border-left:.1px solid #efefef;">

   <div class="panel panel-default">
   
  <div class="panel-heading" id="set_head">Profile Settings</div>
  
  <div class="panel-body" id="set_content">
 
  </div>

</div>
  
  </div>

</div>
</div>
<div style="display:none;">

