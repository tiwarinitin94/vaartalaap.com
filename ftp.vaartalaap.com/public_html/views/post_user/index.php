<?php
$user_data = new user();
$post_id = "";
if (isset($_GET['post_id'])) {
  $post_id = $_GET['post_id'];

  echo "Meee" . $user_data->check_if_post_exist($post_id);
  if ($user_data->check_if_post_exist($post_id) < 1) {

    Bootstrap::error();
    exit();

  }
} else {
  Bootstrap::error();
  exit();
}


?>



<script>
var data=<?php $user_data->get_specific_post($post_id) ?>;
$(document).ready(function(){
    if(data.length>0){
 // console.log(data[0].added_by);
   data_pic_value(data[0].id, data[0].added_by, data[0].date_added, data[0].body, data[0].user_posted_to, data[0].if_shared);
  
}
});

</script>

<style>

</style>

<div class="content"  >
<div id="wrapper"style="margin:100px auto; ">

<div id="newsfeed_home_friends"></div>

  
    
  </div>
</div>
