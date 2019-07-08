
var img = document.createElement('img'); var user_pro; //   var pageURL = $(location). attr("href");  user_pro=pageURL.replace(url_vrt,""); user_pro=user_pro.replace("/","");
var post_id = 'nothing';
var no_more_get = 0;


$(document).ready(function () {
    user_pro = user.user_profile;
    //get other info
    get_info(user.id);
    //create the principal info
    create_info(user.user_profile, user.id, user.profile_image, user.firstName, user.lastName, user.bio, user.country);


    //Calling for the news data
    $(window).scroll(function () {
        var height = $(window).height();
        if ($(window).scrollTop() == $(document).height() - height) {

            get_more(post_id);
        }
    });

    //-------------------------------------------user news	
    if (post_id == 'nothing') {
        get_more(post_id);
    }
    //friends details 

    /*
    $.post(url_vrt + 'profile/friends_of_pro/', { 'profile_data': user.user_profile }, function (o) {

        if (user_logged == user_pro) {
            $('#add_user').remove();
        }
        if (o.includes(user_logged)) {
            $('#add_user').html('Unpick');

        } else {
            $.post(url_vrt + 'profile/check_relation', { 'data': user_pro },
                function (o) {
                    if (o == user_logged) {
                        $('#add_user').html('Request Sent');
                        $('#vaarta_rel').append('<button onclick="cancel()" id="cr_cancel">Cancel Request</button>');
                    } else if (o == user_pro) {
                        $('#add_user').html('Accept Request');
                        $('#vaarta_rel').append('<button onclick="cancel()" id="cr_cancel">Cancel Request</button>');
                    }
                });
        }

        if (o != "") {


            for (var i = 0; i < o.length; i++) {

                if (i == 15) {
                    break;
                } else {
                    if (o[i] != "") {

                        profile_pic_check(o[i], "", "");
                    }
                }
            }
        } else {
            $('#frenz').append('<div id="error"><label style="color:#999;">Seems like you don\'t have friends. </label></div>');
        }
    }, 'json');

    */


    //followers details 
    /*
    $.post(url_vrt + 'profile/followers_of_pro/', { 'profile_data': user.user_profile }, function (o) {
        for (var i = 0; i < o.length; i++) {
            if (i == 15) {
                break;
            } else {
                profile_pic_check(o[i].followed_by, "", 1);
            }
        }

    }, 'json');
    */




    //user Images Data
    /* $.post(url_vrt + 'profile/image_data/', { 'profile_data': user.user_profile }, function (o) {
         if (o != "") {
             for (var i = 0; i < o.length; i++) {
                 check_file_pro(o[i].post_image, '');
             }
         } else {
             $("#image_data").unbind().append('<div id="error"><label style="color:#999;">Seems like you don\'t have photos. </label></div>');
         }
     }, 'json');
 */




});
//alert();	  


function changeprofileimage() {


    var formData = new FormData(document.querySelector('#profile_file'));

    $.ajax({
        url: url_vrt + 'profile/update__profile_image/ajdfhadjfhadhflakjflkajflkadjfadlkfjadadfaldfdalfjadkfjadklfjadlkfjakldjkljdkas',
        type: 'POST',
        data: formData,
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: false,
        error: function () { },
        success: function (data_pic) {
            data_pic = url_vrt + "public/userdata/profile_pics/" + data_pic;
            $('#profile_img_pro').attr('src', data_pic);
            $('#show_img').attr('src', data_pic);
        }




    });

}


//check if file image exist
//alert(user.firstName);
function create_info(user_profile, id, profile_image, firstName, lastName, bio, country) {
    if (user_profile) {



        if (user_profile == user_logged) {
            margin = 0;
            $('.gal_name_pro').prepend('<a id="edit" href="' + url_vrt + 'settings" style="">Edit Info</button>');
        }

        $('#profile_img_pro').attr('src', profile_image);


    } else {
        alert(user.user_profile);
    }

}






function info_up(update_the_info) {
    if (update_the_info == 'f_n') {
        sirname = $('#update_i_l_n').val();

    } else {
        sirname = "";
    }
    this_value = $('#update_i_' + update_the_info).val();
    $.ajax({
        type: "POST",
        url: "profile/update_data_of_info/" + update_the_info + "",
        data: {
            'data': this_value,
            'data_sir': sirname
        },
        cache: false,
        success: function (html) {

        }
    });
}


function remove_image() {
    $.ajax({
        url: url_vrt + 'profile/remove__profile_image/ajdfhadjfhadhflakjflkajflkadjfadlkfjadadfaldfdalfjadkfjadklfjadlkfjakldjkljdkas',
        type: 'POST',
        error: function () {

        },
        success: function () {
            remove_pic = url_vrt + "public/images/default-pic.png";
            //alert(remove_pic);
            $('#profile_img_pro').attr('src', remove_pic);
            $('#show_img').attr('src', remove_pic);
        }
    });
}

function check_file_pro(file, this_check) {




    /*
    k[0] for directory
    k[1] for height
    k[2] for width
    */

    /*
    $.ajax({
        url: 'profile/get_file_existance',
        type: 'POST',
        data: { 'file': file, max_width: '60' },
        error: function () {

        },
        success: function (o) {
            o = o.replace('"', '');
            o = o.trim();
            var k = o.split(",");
            
    if (k[1] > 70) { k[1] = 70; }
    if (this_check) {
        if (k[0] == "cover") {
            src_image = '' + url_vrt + 'public/userdata/cover_pics/' + file;
            document.getElementById('this_will_show_image_data').html = "";
            $("#this_will_show_image_data").unbind().append("<img height='" + k[1] + "' width='" + k[2] + "'style='padding:5px;' src='" + src_image + "'/>");
        } else if (k[0] == "profile") {
            src_image = '' + url_vrt + 'public/userdata/profile_pics/' + file;
            $("#this_will_show_image_data").unbind().append("<img height='" + k[1] + "' width='" + k[2] + "'style='padding:5px;'src='" + src_image + "'/>");
        } else if (k[0] == "data") {
            src_image = '' + url_vrt + 'public/userdata/data_pics/' + file;
            $("#this_will_show_image_data").unbind().append("<img height='" + k[1] + "' width='" + k[2] + "'style='padding:5px;'src='" + src_image + "'/>");
        } else {
            // $("#image_data").unbind().append("Image may be broken or removed");

        }
    } else {
        if (k[0] == "cover") {
            src_image = '' + url_vrt + 'public/userdata/cover_pics/' + file;
            document.getElementById('image_data').html = "";
            $("#image_data").unbind().append("<img height='" + k[1] + "' width='" + k[2] + "'style='padding:5px;' src='" + src_image + "'/>");
        } else if (k[0] == "profile") {
            src_image = '' + url_vrt + 'public/userdata/profile_pics/' + file;
            $("#image_data").unbind().append("<img height='" + k[1] + "' width='" + k[2] + "'style='padding:5px;'src='" + src_image + "'/>");
        } else if (k[0] == "data") {
            src_image = '' + url_vrt + 'public/userdata/data_pics/' + file;
            $("#image_data").unbind().append("<img height='" + k[1] + "' width='" + k[2] + "'style='padding:5px;'src='" + src_image + "'/>");
        } else {
            // $("#image_data").unbind().append("Image may be broken or removed");

        }
    }
}
    }, 'json');
    */
}
//-------------------------------------friend pics
function profile_pic_check(added_by, id_name) {

    $.ajax({
        url: url_vrt + 'profile/get_user_friends_data',
        type: 'POST',
        data: { 'added_by': added_by },
        error: function () {

        },
        success: function (data_pic) {
            if (data_pic.trim() == "") {
                $('#' + id_name).append("<a href='" + url_vrt + added_by + "' style='cursor:pointer;'><img height='60' width='60'style='padding:5px;border-radius:50%;'title='" + added_by + "' src='" + url_vrt + "public/images/default-pic.png'/></a>");
            } else {
                $('#' + id_name).append("<a href='" + url_vrt + added_by + "' style='cursor:pointer;'><img height='60' width='60'style='padding:5px;border-radius:50%;' title='" + added_by + "' src='" + url_vrt + "public/userdata/profile_pics/" + data_pic + "'/></a>");
            }

        }
    });
}


//-----------------------------------------------------user profile data fetch	------------------------------------------	 	
function get_info(id) {
    $.post(url_vrt + 'profile/get_user_info/', { 'the_user_id': id }, function (o) {
        if (user_logged == user_pro) {
            var button_q = " <button id='edit' onclick='run(" + '"q"' + ")' >Edit</button>",
                button_h = "<button id='edit' onclick='run(" + '"h"' + ")' >Edit</button>",
                button_w = "<button id='edit' onclick='run(" + '"w"' + ")' >Edit</button>",
                button_said = " <button id='edit' onclick='run(" + '"said"' + ")' style='font-size:10px;float:right;'>Edit</button>";
            fav_quote = "Enter what you follow.";
            hobby = "Write what you Like to do.";
            said_by = "said by whom?";
            about_you = "Describe yourself";
            sign = url_vrt + "public/images/vaarta2.png";
        } else {
            fav_quote = user_pro + " Follow Nothing.";
            hobby = user_pro + " likes nothing.";
            said_by = user_pro + ".......";
            about_you = "About " + user_pro;
            sign = url_vrt + "public/images/vaarta2.png";
            var button_q = "", button_h = "", button_w = "", button_said = "";

        }
        if (o) {
            new_height = 'auto'; new_width = "auto";
            for (var i = 0; i < o.length; i++) {
                if (o[i].signature == null) {
                    sign = url_vrt + "public/images/vaarta2.png";

                } else {
                    sign = url_vrt + "public/userdata/data_pics/" + o[i].signature;
                }
                var imagg = document.createElement('img');
                imagg.src = sign;

                img_wdth = imagg.width;




                if (o[i].fav_quote != null) {
                    fav_quote = o[i].fav_quote;
                }
                if (o[i].hobby != null) {
                    hobby = o[i].hobby
                }
                if (o[i].said_by != null) {
                    said_by = o[i].said_by
                }
                if (o[i].about_you) {
                    about_you = o[i].about_you;
                }

                $('#info_pro').append("<div class='gal_name'style='float:none;font-size:13px;text-shadow:none;'><label id='heading'>Fav Quote</label>" + button_q + "<br><br><form class='edit_hide' id='editbox_q' style='display:none;'><textarea id='input_val_q' style='width:350px;height:50px;' onchange='update(" + '"q"' + ")'  autofocus></textarea></form><div id='material_q' class='textBox_show'>" + fav_quote + "</div> <br/>" + button_said + "<form class='edit_hide' id='editbox_said' style='display:none;'><textarea id='input_val_said' cols='5' rows='2' style='width:200px;height:10px;float:right;' onchange='update(" + '"said"' + ")' autofocus></textarea></form><div id='material_said' class='textBox_show' style='float:right; font-style:italic;color:#777;'>" + said_by + "</div></div><br>");
                $('#info_pro_hobby').append(" <div class='gal_name'style='float:none;font-size:13px;text-shadow:none;'><label id='heading'>Hobby</label>" + button_h + "<br><br><form class='edit_hide' id='editbox_h' style='display:none;'><textarea id='input_val_h'style='width:350px;height:50px;' onchange='update(" + '"h"' + ")' autofocus></textarea></form><div id='material_h' class='textBox_show'>" + hobby + "</div></div><br>");
                $('#info_pro_style').append(" <div class='gal_name'style='float:none;font-size:13px;text-shadow:none;'><label id='heading'>Who am I?</label>" + button_w + "<br><br><form class='edit_hide' id='editbox_w' style='display:none;'><textarea id='input_val_w'style='width:350px;height:50px;' onchange='update(" + '"w"' + ")' autofocus></textarea></form><div id='material_w' class='textBox_show'>" + about_you + "</div></div><br>");
                $('#sign_image').attr('src', sign);
            }
        } else {
            $('#info_pro').append("<div class='gal_name'style='float:none;font-size:13px;text-shadow:none;'><label id='heading'>Fav Quote</label>" + button_q + "<br><br><form id='editbox_q' class='edit_hide'style='display:none;'><textarea id='input_val_q'style='width:350px;height:50px;' onchange='update(" + '"q"' + ")'  autofocus></textarea></form><div class='textBox_show' id='material_q' >" + fav_quote + "</div><br>" + button_said + "<form id='editbox_said' class='edit_hide' style='display:none;'><textarea id='input_val_said' cols='5' rows='2' style='width:200px;height:10px;float:right;' onchange='update(" + '"said"' + ")' autofocus></textarea></form><div id='material_said'style='float:right; font-style:italic;color:#777;' class='textBox_show'>" + said_by + "</div></div><br>");
            $('#info_pro_hobby').append(" <div class='gal_name'style='float:none;font-size:13px;text-shadow:none;'><label id='heading'>Hobby</label>" + button_h + "<br><br><form id='editbox_h' class='edit_hide'style='display:none;'><textarea id='input_val_h'style='width:350px;height:50px;' onchange='update(" + '"h"' + ")' autofocus></textarea></form><div id='material_h' class='textBox_show'>" + hobby + "</div></div><br>");
            $('#info_pro_style').append(" <div class='gal_name'style='float:none;font-size:13px;text-shadow:none;'><label id='heading'>Who am I?</label>" + button_w + "<br><br><form id='editbox_w'class='edit_hide' style='display:none;'><textarea id='input_val_w'style='width:350px;height:50px;' onchange='update(" + '"w"' + ")' autofocus></textarea></form><div id='material_w'  class='textBox_show'>" + about_you + "</div></div><br>");

        }

        $(document).mousedown(function (e) { var container = $(".edit_hide"); if (container.has(e.target).length === 0) { $('.edit_hide').hide(); $('.textBox_show').show(); } });
    }, 'json');

}



function update(hint) {
    update_val = $('#input_val_' + hint + '').val(); $.ajax({
        type: "POST", url: "profile/update_data/" + hint + "", data: { data: update_val },
        cache: false, success: function (html) { $('#material_' + hint + '').html(update_val); }
    });
}
function run(hint) {
    $('#editbox_' + hint + '').show(); $('#material_' + hint + '').hide(); var data = $('#material_' + hint + '').html(); $('#input_val_' + hint + '').html(data); $('#input_val_' + hint + '').focus(); $('#input_val_' + hint + '').expandable();
    $('#input_val_' + hint + '').keyup(function (e) {
        if (e.keyCode == 13) { var curr = getCaret(this); var val = $(this).val(); var end = val.length; $(this).val(val.substr(0, curr) + '<br>' + val.substr(curr, end)); }
    });

}




