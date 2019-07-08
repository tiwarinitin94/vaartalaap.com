<?php

class gallery_area_model extends Models
{
       public function __construct()
       {
              parent::__construct();

       }



       public function addImage_media()
       {
              $username = Session::get('user');
              $id = Session::get('id');

              $path = "/public/userdata/media_blog/";

              if (isset($_FILES['image_f'])) {
                     if (((@$_FILES["image_f"]["type"] == "image/jpeg") || (@$_FILES["image_f"]["type"] == "image/png") || (@$_FILES["image_f"]["type"] == "image/gif") || (@$_FILES["image_f"]["type"] == "image/jpg") || (@$_FILES["image_f"]["type"] == "image/png")) && (@$_FILES["image_f"]["size"] < 5048576)) {
                            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                            $rand_dir_name = substr(str_shuffle($chars), 0, 15);
                            if (!mkdir(".$path$rand_dir_name")) {
                                   echo "Cannot make directory";
                            }

                            if (file_exists(".$path$rand_dir_name/" . @$_FILES["image_f"]["name"])) {
                                   echo @$_FILES["image_f"]["name"] . " Already exists";
                            } else {
                                   $temp = explode(".", $_FILES["image_f"]["name"]);

                                   $newfilename = round(microtime(true)) . '.' . end($temp);

                                   move_uploaded_file(@$_FILES["image_f"]["tmp_name"], ".$path$rand_dir_name/" . $newfilename);
                                   $profile_pic_name = @$newfilename;

                                   $date_added = date("Y-m-d H:i:s");  // Date on added


                                   $insert = $this->db->insert("post_media_src (src,user_added,add_date)", "('$rand_dir_name/$profile_pic_name','$username','$date_added')");

                                   echo $rand_dir_name . '/' . $profile_pic_name;
                            }
                     } else {
                            echo "Invailid File! Your image must be no larger than 5MB and it must be either a .jpg, .jpeg, .png or .gif";
                     }
              } else {
                     Bootstrap::error();
              }
       }




       public function publishPost()
       {
              $db = new database();
              $user = Session::get('id');
              $last_id = "";
              $date_added = date("Y-m-d H:i:s");// Date on added
              $added_by = $user;   // added By
              $user_posted_to = $user;  // added to
              $time = time();

              if (isset($_POST['post'])) {
                     $post = $_POST['post'];
              } else {
                     $post = "";
              }



              $insert1 = $db->insert("posts (body,date_added,added_by,user_posted_to)", "('$post','$date_added','$added_by','$user_posted_to')");
              $last_id = $db->lastInsertId();

              if ($insert1) {
                     echo "success";
              } else {
                     echo "problem";
              }

       }





}



?>