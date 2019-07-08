<?php Session::init(); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html lang="en-US"><html><head><meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:site_name" content="Vaarta"/><meta name="keyword" content="Vaarta, Conversation, Social, Media, news, Chatting, groups, pages, account, people, places"/>
<meta name="description" content="Creativity exist within you, You know what to do,Create an account, Connect with your friends, Explore your status, Have some fun, Share photos videos, staus update and more"/> <meta name="author" content="NITIN TIWARI" /> <meta name="Date modified" content="1/04/2016"/>  <meta name="Owner" content="Nitin Tiwari"/>
  <meta name="Designer" content="Nitin Tiwari"/>  <meta name="reach" content="global"><meta name="Content-Language" content="english and hindi">
<meta name="rating" content="general"><title> Vaarta</title>
 <?php 
$logged = "";
$logged = Session::get('loggedin');
$user = Session::get('user');
$user_id = Session::get('id');
?>

<link href="<?php echo URL; ?>public/images/vaarta_ico.ico" rel="icon" type="image/x-icon" />
<link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css"/>

<link rel="stylesheet" href="<?php echo URL; ?>public/css/mobile.css"/>

<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-1.14.2.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.expandable.js"></script>
<?php if ($logged) {
	?>
	<script>/*window.csrf = { csrf_token: '<?php echo Session::get('token_csrf') ?>' };$.ajaxSetup({data: window.csrf});*/</script>
	<?php

} ?>
<script type="text/javascript" src="<?php echo URL; ?>public/js/default.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/encrypt.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>

 <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css"/>
<?php
if (isset($this->js)) {
	foreach ($this->js as $js) {
		echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
	}
}
   
   //&#8592;
?></head><body><div id="myModal2" class="modal2"> <div class="modal-content"><div style="clear:both; overflow:hidden;"><span  id="close2" style="cursor:pointer;float:left;font-weight:bold;"><img src="<?php echo URL; ?>public/images/back.png" width="30"/></span></div><div id="mymodalc"></div></div></div>



<?php if (!isset($this->main)) { ?>
<div class="header20"style=" z-index:2;width:100%;">
<div id="wrapper">


  <div id="search_box">
 <form action="search.php" autocomplete="off" id="search" onkeyup="showResult(this.value)" >
 
		   <input type="text" name="q"  placeholder="Search Vaarta"value="Search Vaarta" onclick="value=''" onkeyup="showResult(this.value)"/>
		    <div id="livesearch" style="position:absolute;"></div>
		   </form></div>
 


 <div id="header_vrt"> 
			
	
<?php if ($logged == false) {// If not Logged in 
	?> 
 <a href="<?php echo URL; ?>gallery_area/" title="Home" /><img src="<?php echo URL; ?>public/images/home_vrt.png" height="30" width="30"/></a>
 <a href="<?php echo URL; ?>about" title="About Vaarta" >About</a>
 <a href="<?php echo URL; ?>login">Login</a>
 <a href="" title="Games" ><img src="<?php echo URL; ?>public/images/game_vrt.png" height="30" width="30"/></a><a href="" title="Videos" ><img src="<?php echo URL; ?>public/images/video_vrt.png" height="30" width="30"/></a>
 <?php 
} else {      // If Logged in 
	?>  <a href="<?php echo URL; ?>gallery_area/" title="Home" /><img src="<?php echo URL; ?>public/images/home_vrt.png" height="30" width="30"/></a>
		           
<a href="<?php echo URL . $user; ?>" id="user_full" style="padding-left:5px;" ><img src="<?php echo URL; ?>public/images/prfile_vrt.png" height="30" width="30"/></a>
		 <!----  <a href="" title="Games" ><img src="<?php echo URL; ?>public/images/game_vrt.png" height="30" width="30"/></a><a href="" title="Videos" ><img src="<?php echo URL; ?>public/images/video_vrt.png" height="30" width="30"/></a>--->
            <a href="<?php echo URL; ?>gallery_area/logout"><img src="<?php echo URL; ?>public/images/logout_vrt.png" height="30" width="30"/></a>
			<?php 
	}

	?>
			
   </div>
  

   
   </div>
   
   </div>
   
   <?php 
	}

	?>



<?php if ($logged) { ?>
<script>var user_logged="<?php echo $user; ?>";$("textarea").expandable();var u_l_id=<?php echo $user_id; ?>; </script>
<?php 
} ?>