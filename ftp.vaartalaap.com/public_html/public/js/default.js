function check_screen() { $(window).innerWidth() <= 600 ? ($(".modal-content1").css("width", "100%"), $(".modal-content").css("width", "100%"), $(".content").css("padding", "0px"), $(".postForm1").css("width", "100%"), $(".postForm1").css("margin", "5px auto")) : ($(".modal-content1").css("width", "600px"), $(".modal-content").css("width", "300px"), $(".postForm1").css("margin", "90px auto"), $(".postForm1").css("width", "550px"), $(".content").css("padding", "10px 20px 10px 20px")) } function go(e) { alert(e) } function modal() { for (var e = [], t = 0; t < arguments.length; ++t)e[t] = arguments[t]; var n = e[0]; if (e[1]) { e[1]; $(".modal-content").css("margin", "10px auto") } var o = document.getElementById("myModal2"), l = document.getElementById("mymodalc"), s = document.getElementById("close2"); o.style.display = "block", l.innerHTML = n, s ? s.onclick = function () { (o = document.getElementById("myModal2")).style.display = "none" } : (s = document.getElementById("close2")).onclick = function () { o.style.display = "none" }, window.onclick = function (e) { e.target == o && (o.style.display = "none") } } function getCaret(e) { if (e.selectionStart) return e.selectionStart; if (document.selection) { e.focus(); var t = document.selection.createRange(); if (null == t) return 0; var n = e.createTextRange(), o = n.duplicate(); return n.moveToBookmark(t.getBookmark()), o.setEndPoint("EndToStart", n), o.text.length } return 0 } function showResult(e) { $("#livesearch").text(e) } function send_request(e) { $.post(url_vrt + "profile/send_request", { data: e }, function (e) { $("#add_user").html("Request Sent"), $("#vaarta_rel").append('<button onclick="cancel()" id="cr_cancel">Cancel Request</button>') }) } function follow_user(e) { jQuery.ajax({ type: "POST", url: url_vrt + "profile/follow/slsfjshsfhdfhsdfhsohughreuhsvsgbskfhnjsdfhdajhadlfhadfoiwfsnvskvbjshdsijf", data: { uid: e }, dataType: "text", success: function (e) { $("#follow").html("Following") } }) } function unfollow_user(e) { jQuery.ajax({ type: "POST", url: url_vrt + "profile/follow/slsfjshsfhdfhsdfhsohughreuhsvsgbskfhnjsdfhdajhadlfhadfoiwfsnvskvbjshdsijf", data: { un_id: e }, dataType: "text", success: function (e) { $("#follow").html("Follow") } }) } function setTitle(e) { document.title = e } $(document).ready(function () { check_screen(); $(window).resize(function (e) { check_screen() }); var e = document.getElementById("myModal"), t = document.getElementById("myBtn"), n = document.getElementById("close1"); t && (t.onclick = function () { e.style.display = "block" }), n && (n.onclick = function () { e.style.display = "none" }), window.onclick = function (t) { t.target == e && (e.style.display = "none") }, window.onbeforeunload = function () { alert("Are you sure?") }; var o = 0; $(window).scroll(function (e) { var t = $(this).scrollTop(); Math.abs(o - t) <= 20 || (t > o ? ($("#search_box") && $("#search_box").hide()) : ($("#search_box") && $("#search_box").show()), o = t) }), $(".header20").hover(function () { $("#search_box").show() }) }); var url_vrt = "https://vaartalaap.com/";
var user_logged = "";
var id_record = new Array(); var counter = 0; var obj = new Array(); var obj_user = new Array();
var the_new_crid = "now"; var lastScrollTop = 0; var lastScrollHeight = 0;

var img = document.createElement('img');


function getchatsession() {
    $.post(url_vrt + "message/update_chat_session", function (o) {


        for (i = 0; i < o.length; i++) {
            alert(o[i]);
        }
    }, 'json');


}
function savechat(update_cid) {
    $.post(url_vrt + "message/save_chat_session", { c_id: update_cid }, function (o) {
        //alert(o)
    });

}
$(document).ready(function () {


    $('form').submit(function () {
        var $form = $(this);
        var id = $form.attr('id');
        $(this).append("<input name='csrf_val' type='hidden' style='display:hidden;'/>");

    });



    if (user_logged != "") {
        // getchatsession();
    }

    $('#msg_chat').scroll(function (event) {

        msgarea = document.getElementById("msg_chat");
        var st = $(this).scrollTop();
        if (st == msgarea.scrollHeight) {

            setInterval(function () { fetch_message($('#this_counter_for_cid').html(), '', $('#msg_chat')); }, 4500);

        } else if (st == lastScrollTop) {
            if ($('#this_counter_for_cr_id').html() != "Nothing") {
                fetch_cid = $('#this_counter_for_cid').html();
                fetch_message(fetch_cid, the_new_crid, $('#msg_chat'));
            } else {

            }
        }
    });


    $(".msg_chat_class").submit(function (e) {
        var i = $(".msg_chat_class").attr("rel"); return current_cid = "thissdlfhdgjhasbgadbgbdfdahgljadfhadjfhadjfhdfhdsajfhjdfhdljfhdlasfhldfjadjfafjadfj" + $("#this_counter_for_cid").html(), e.preventDefault(), $.ajax({ url: i + "/" + current_cid, type: "POST", data: new FormData(this), contentType: !1, async: !1, cache: !1, processData: !1, success: function (e) { fetch_message($("#this_counter_for_cid").html(), "", $('#msg_chat')), $("#msginput").val(""), $("#msginput_chat").val(""), document.getElementById("file_chat").value = "", document.getElementById("file").value = "" } })
    });
});
function chatRun() { var attrVal = $('#send_msg').attr("rel"); if (attrVal.trim() !== "no Message") { savechat(attrVal); if ($('.chatbox').css('display') == "none") { fetch_message(attrVal, "", $('#msg_chat')) } $('.chatbox').toggle(); $('#this_counter_for_cid').html(attrVal); } else { $('#msg_chat').html('<center style="color:#999; padding:20px;background:#fbfbfb; font-size:12px;">No Messages to show....</center>'); $('.chatbox').toggle(); } }

function fetch_message(e, t, m_ele) { new Image; "now" == t ? (fetch_cr_id = $("#this_counter_for_cr_id").html(), $.post(url_vrt + "message/get_the_anonymous_activity_that_is_going_out_there", { the_new_crid: fetch_cr_id, cid: e }, function (e) { for ($("#this_counter_for_cr_id").html(""), e.sort(function (e, i) { return i.cr_id - e.cr_id }), i = 0; i < e.length; i++)$("#this_counter_for_cr_id").html(e[e.length - 1].cr_id), "Nothing" != e[i].pics ? (pic_sent = url_vrt + "public/userdata/data_pics/" + e[i].pics, img.src = pic_sent, img_wdth = img.width, img_height = img.height, img_wdth > 200 ? (img__wdth = 200, img_height = img_height / img_wdth * img__wdth) : img__wdth = img_wdth, pic_sent = '<img src="' + url_vrt + "public/userdata/data_pics/" + e[i].pics + '" height="' + img_height + '" width="' + img__wdth + '"/>') : pic_sent = "", "Nothing" == e[0].Nothing ? (m_ele.prepend('<center style="color:#999; padding:20px;background:#fbfbfb; font-size:12px;">No Messages to show....</center>'), $("#this_counter_for_cr_id").html("Nothing")) : e[i].username == user_logged ? ("" != e[i].reply && m_ele.prepend('<div class="msgc" style="margin-bottom: 30px;"> <div class="msg msgfrom">' + e[i].reply + '</div><div class="msgarr msgarrfrom"></div><div class="msgsentby msgsentbyfrom">' + e[i].username + "</div> </div>"), "Nothing" != e[i].pics && m_ele.prepend('<div class="msgc" style="margin-bottom: 30px;"><div class="msg msgfrom" style="padding:0px;background:transparent;">' + pic_sent + '</div><div class="msgarr msgarrfrom"></div><div class="msgsentby msgsentbyfrom">' + e[i].username + "</div> </div>")) : ("" != e[i].reply && m_ele.prepend('<div class="msgc"> <div class="msg">' + e[i].reply + '</div></div><div class="msgarr"></div><div class="msgsentby">' + e[i].username + "</div>"), "Nothing" != e[i].pics && m_ele.prepend('<div class="msgc"> <div class="msg" style="padding:0px;background:transparent;">' + pic_sent + '</div></div><div class="msgarr"></div><div class="msgsentby">' + e[i].username + "</div>")); msgarea = document.getElementById(m_ele.attr('id')); var t = msgarea.scrollHeight; if (t > lastScrollHeight) { var s = t - lastScrollHeight; msgarea.scrollTop = s, lastScrollHeight = t } }, "json")) : $.post(url_vrt + "message/get_the_anonymous_activity_that_is_going_out_there", { cid: e }, function (e) { for (e.sort(function (e, i) { return e.cr_id - i.cr_id }), $("#msg_data").html(""), $("#this_counter_for_cr_id").html(""), i = 0; i < e.length; i++)"Nothing" != e[i].pics ? (pic_sent = url_vrt + "public/userdata/data_pics/" + e[i].pics, img.src = pic_sent, img_wdth = img.width, img_height = img.height, img_wdth > 200 ? (img__wdth = 200, img_height = img_height / img_wdth * img__wdth) : img__wdth = img_wdth, pic_sent = '<img src="' + url_vrt + "public/userdata/data_pics/" + e[i].pics + '" height="' + img_height + '" width="' + img__wdth + '"/>') : pic_sent = "", $("#this_counter_for_cr_id").html(e[0].cr_id), e[i].username == user_logged ? ("" != e[i].reply && m_ele.append('<div class="msgc" style="margin-bottom: 30px;"> <div class="msg msgfrom">' + e[i].reply + '</div><div class="msgarr msgarrfrom"></div><div class="msgsentby msgsentbyfrom">' + e[i].username + "</div> </div>"), "Nothing" != e[i].pics && m_ele.append('<div class="msgc" style="margin-bottom: 30px;"><div class="msg msgfrom" style="padding:0px;background:transparent;">' + pic_sent + '</div><div class="msgarr msgarrfrom"></div><div class="msgsentby msgsentbyfrom">' + e[i].username + "</div> </div>")) : ("" != e[i].reply && m_ele.append('<div class="msgc"> <div class="msg">' + e[i].reply + '</div></div><div class="msgarr"></div><div class="msgsentby">' + e[i].username + "</div>"), "Nothing" != e[i].pics && m_ele.append('<div class="msgc"> <div class="msg" style="background:transparent;padding:0px;">' + pic_sent + '</div></div><div class="msgarr"></div><div class="msgsentby">' + e[i].username + "</div>")); msgarea = document.getElementById(m_ele.attr('id')), msgarea.scrollTop = msgarea.scrollHeight, lastScrollHeight = msgarea.scrollHeight }, "json"); }


function htmlEndode(value) {
    val = $("<textarea/>").html(value).html();

    return val;
}


function htmlDecode(value) {
    val = $("<textarea/>").html(value).val();

    return val;
}







window.smoothScroll = function (target) {
    var scrollContainer = target;
    do { //find scroll container
        scrollContainer = scrollContainer.parentNode;
        if (!scrollContainer) return;
        scrollContainer.scrollTop += 1;
    } while (scrollContainer.scrollTop == 0);

    var targetY = 0;
    do { //find the top of target relatively to the container
        if (target == scrollContainer) break;
        targetY += target.offsetTop;
    } while (target = target.offsetParent);

    scroll = function (c, a, b, i) {
        i++; if (i > 30) return;
        c.scrollTop = a + (b - a) / 30 * i;
        setTimeout(function () { scroll(c, a, b, i); }, 20);
    }
    // start scrolling
    scroll(scrollContainer, scrollContainer.scrollTop, targetY, 0);
}





























var post_id = "nothing"; var check_function = 0;
var the_max_width_of_div = 100;
//gallery area begin

//------------------------------------data fetching
function get_more(post_id_f) {
    // alert(id); 
    if (no_more_get != 1) {
        $.post('' + url_vrt + 'gallery_area/get_user_news/helloalkddaklfjakldjaksdjaakdjdakljdkjdksjkjakjdksjdakjssjdksdjsa', { 'last_id': post_id_f }, function (o) {
           
            if (o == "") {
                no_more_get = 1;
                $('#newsfeed_home_friends').off().append('<div id="error"><label style="color:#999;">Seems like you have came to an end. </label></div>');
            } else {
                for (var i = 0; i < o.length; i++) {
                    data_pic_value(o[i].post_id, o[i].added_by, o[i].date_added, o[i].body, o[i].user_posted_to, o[i].if_shared, 0, o[i].first_name, o[i].last_name, o[i].username, o[i].profile_pic);

                    if (i == o.length - 1) {
                        post_id = o[i].post_id;
                        //alert(post_id);
                    }
                }
            }
        }, 'json');
    }
}






var data_pic;
//-----------------------------------------image creating
function data_pic_value(id, added_by, date_added, body, user_posted_to, if_shared, show, fname, lname, uname, p_pic) {
    post_id = "newsfeed_home_friends";
    if (show == 1) {
        post_id = "shared" + id;
    }

    prpic = url_vrt + "public/images/default-pic.png"

    if (p_pic != null || p_pic != "") {
        prpic = url_vrt + "public/userdata/profile_pics/" + p_pic;
    }




    uid = $.md5(id);
    check_likes(id);
    if (body == '' + added_by + ' has changed profile pic') {
        body_profile = '<a href="' + url_vrt + '/' + added_by + '">' + added_by + '</a> has changed profile pic';
        body = "";

    } else {
        body_profile = "";
    }


    if (if_shared) {
        body = "<div> This post is shared</div>";

    } //else {



    if (document.getElementById("post-image" + id + "") == null) {
        
        $('#' + post_id).append("<div class='status' id='status"
            + id +
            "'><div id='post-head' style='border-bottom:.1px solid #efefef;'><div id='post-image"
            +
            "' class='post-image_work'><img src ='" + prpic + "' /></div><div class='posted_by'><a href='" + url_vrt + uname + "'>"
            + fname + ' ' + lname +
            "</a></div><button id='del_but"
            + id +
            "' class='del'>x</button></div><div id='profile_changed' style='background-color:#fbfbfb;color:#888;text-align:center;'>"
            + body_profile +
            "</div><div id='status1'><label class='post_style_cl' id = 'post_style"
            + id +
            "' >"
            + body +
            "</label><div id='new_img"
            + id +
            "' style='overflow:hidden;clear:both;'></div></div><div class='active_buttons'><button style='outline:none;color:#999;' id='comments"
            + id +
            "' ><img src='"
            + url_vrt +
            "public/images/cmmnts.png'/>Comments</button><button id='like_"
            + id +
            "' style='outline:none;'><img src='"
            + url_vrt +
            "public/images/lift1.png'/>Lift up</button><button id='dislike_"
            + id +
            "' style='outline: none; color: rgb(153, 153, 153);' ><img src='"
            + url_vrt +
            "public/images/liftd1.png'/>Lift down</button><button style='outline: none; color: rgb(153, 153, 153);' id='share"
            + id +
            "' ><img src='"
            + url_vrt +
            "public/images/stick.png' />Re-Stick </button><div id='post_poularity' ><div id='likes_det"
            + id +
            "' style='background-color:#1486E0;float:left;position:relative;height:3px;cursor:pointer;font-size:3px;' title='likes'>likes</div><div id='dislikes_det"
            + id +
            "' title='dislikes' style='cursor:pointer;height:3px;background-color:#D22142;float:left;position:relative;'></div></div><div id='toggleComment"
            + id +
            "'class='toggleComment' style=''></div></div>");






        if (body.trim() == "") {

            $('#post_style' + id + '').css('display', 'none');

        }

        //------------------------------------------for toggleComment////////////////////------------	
        $('#comments' + id + '').click(function () {
            $('#toggleComment' + id + '').toggle();
        });


        //for button work

        $('#like_' + id + '').click(function () {
            var text_c = $('#like_' + id + '').text();

            if (text_c.trim() === "Lift up") {
                jQuery.ajax({
                    type: "POST",
                    url: "" + url_vrt + "gallery_area/like",
                    data: { uid: "" + id + "" },
                    dataType: "text",
                    success: function (data) {
                        check_likes(id);
                    }
                });
            } else if (text_c.trim() === "Lifted up") {
                jQuery.ajax({
                    type: "POST",
                    url: "" + url_vrt + "gallery_area/like_remove",
                    data: { uid: "" + id + "" },
                    dataType: "text",
                    success: function (data) {
                        check_likes(id);
                    }
                });
            }
        });

        //for button work

        $('#dislike_' + id + '').click(function () {
            var text_c = $('#dislike_' + id + '').text();

            if (text_c.trim() === "Lift down") {
                jQuery.ajax({
                    type: "POST",
                    url: "" + url_vrt + "gallery_area/dislike",
                    data: { uid: "" + id + "" },
                    dataType: "text",
                    success: function (data) {
                        check_likes(id);
                    }
                });
            } else if (text_c.trim() === "Lifted down") {
                jQuery.ajax({
                    type: "POST",
                    url: "" + url_vrt + "gallery_area/dislike_remove",
                    data: { uid: "" + id + "" },
                    dataType: "text",
                    success: function (data) {
                        check_likes(id);
                    }
                });
            }
        });

        //delete sys
        $(document).ready(function () {
            $('#del_but' + id + '').click(function () {
                jQuery.ajax({
                    type: "POST",
                    url: url_vrt + "gallery_area/delete_post",
                    data: { 'id': id },
                    dataType: "text",
                    success: function (data) {

                        modal(data);

                    }
                });

            });


            $('#share' + id + '').click(function () {
                jQuery.ajax({
                    type: "POST",
                    url: "" + url_vrt + "gallery_area/share_post",
                    data: { 'id': id },
                    dataType: "text",
                    success: function (data) {

                        modal(data);

                    }
                });

            });

        });


    }

    // }

}


function yes(del_id, for_share) {
    //	alert(for_share);
    if (for_share != "") {
        jQuery.ajax({
            type: "POST",
            url: url_vrt + "gallery_area/share_post",
            data: { 'del_id': del_id },
            dataType: "text",
            success: function (data) {

                modal(data);

            }
        });
    } else {
        jQuery.ajax({
            type: "POST",
            url: url_vrt + "gallery_area/delete_post",
            data: { 'del_id': del_id },
            dataType: "text",
            success: function (data) {
                $('#status' + del_id).hide();
                modal(data);

            }
        });
    }
}

function no() { var modal = document.getElementById('myModal2'); modal.style.display = "none"; }

function profile_pic_check(added_by, id) {
    $.ajax({
        url: '' + url_vrt + 'gallery_area/get_user_friends_data',
        type: 'POST',
        data: { 'added_by': added_by },
        error: function () {

        },
        success: function (data_pic) {
            if (data_pic.trim() == "") {
                try {
                    if (document.getElementById('post-image' + id + '').innerHTML.trim() == "") {
                        $('#post-image' + id + '').off().append("<img height='30' width='30'style='  box-shadow:0px 1px 2px 0px #999;border:.1px solid #efefef;border-radius:50%;' src='" + url_vrt + "public/images/default-pic.png'/>");
                    }

                } catch (error) {
                    console.log(error);

                }


            } else {

                try {
                    if (document.getElementById('post-image' + id + '').innerHTML.trim() == "") {
                        $('#post-image' + id + '').off().append("<img height='30' width='30'style='  box-shadow:0px 1px 2px 0px #999;border:.1px solid #efefef;border-radius:50%;' src='" + url_vrt + "public/userdata/profile_pics/" + data_pic + "'/>");
                    }

                } catch (error) {
                    console.log(error);

                }


            }
        }
    });
}
function check_file(file, id) {

    $.ajax({
        url: '' + url_vrt + 'gallery_area/get_file_existance',
        type: 'POST',
        data: { 'file': file, max_width: the_max_width_of_div },
        error: function () {

        },
        success: function (o) {
            o = o.replace('"', '');
            o = o.trim();
            var k = o.split(",");
            /*
            k[0] for directory
            k[1] for height
            k[2] for width
            */


            document.getElementById("new_img" + id + "").html = ""

            if (k[0] == "cover") {
                src_image = '' + url_vrt + 'public/userdata/cover_pics/' + file;
                if (document.getElementById("new_img" + id + "").innerHTML.trim() == "") {
                    $("#new_img" + id + "").off().append("<img id='img" + id + "' height='" + k[1] + "%'  style=' width:100%;' src='" + src_image + "'/>");
                }
            } else if (k[0] == "profile") {
                src_image = '' + url_vrt + 'public/userdata/profile_pics/' + file;
                if (document.getElementById("new_img" + id + "").innerHTML.trim() == "") {
                    $("#new_img" + id + "").off().append("<img id='img" + id + "' height='" + k[1] + "%'  style=' width:100%;' src='" + src_image + "'/>");
                }
            } else if (k[0] == "data") {
                src_image = '' + url_vrt + 'public/userdata/data_pics/' + file;
                if (document.getElementById("new_img" + id + "").innerHTML.trim() == "") {
                    $("#new_img" + id + "").off().append("<img id='img" + id + "' height='" + k[1] + "%' style=' width:100%;' src='" + src_image + "'/>");
                }
            } else {
                src_image = '' + url_vrt + 'public/userdata/cover_pics/' + file;
                if (document.getElementById("new_img" + id + "").innerHTML.trim() == "") {
                    $("#new_img" + id + "").off().append("Image may be broken or removed");
                }

            }
            get_album(id);
        }
    }, 'json');
}



function check_likes(id) {
    //fetch if user liked
    //console.log("Check Likes")
    jQuery.ajax({
        type: "POST",
        url: "" + url_vrt + "gallery_area/fetch_like",
        data: { uid: "" + id + "" },
        dataType: "text",
        success: function (data) {

            if (data.trim() == "yes") {
                $("#like_" + id + "").css('color', '#008efd');
                $("#like_" + id + "").html("<img src='" + url_vrt + "public/images/lift2.png' style='color:;'/>Lifted up");
            } else {
                $("#like_" + id + "").css('color', '#999');
                $("#like_" + id + "").html("<img src='" + url_vrt + "public/images/lift1.png' style='color:#efefef;'/>Lift up");
            }
        }
    });


    //Fetch all likes					
    jQuery.ajax({
        type: "POST",
        url: "" + url_vrt + "gallery_area/fetch_like_all",
        data: { uid: "" + id + "" },
        dataType: "text",
        success: function (data) {

            check_dislike(id, data.trim());
        }
    });


}

function check_dislike(id, numOfLike) {
    //check if user disliked
    jQuery.ajax({
        type: "POST",
        url: "" + url_vrt + "gallery_area/fetch_dislike",
        data: { uid: "" + id + "" },
        dataType: "text",
        success: function (data) {
            if (data.trim() === "yes") {
                $("#dislike_" + id + "").css('color', '#c80017');
                $("#dislike_" + id + "").html("<img src='" + url_vrt + "public/images/liftd2.png'/>Lifted down");
            } else {
                $("#dislike_" + id + "").css('color', '#999');
                $("#dislike_" + id + "").html("<img src='" + url_vrt + "public/images/liftd1.png'/>Lift down");
            }
        }
    });


    //fetch all dislike	   
    jQuery.ajax({
        type: "POST",
        url: "" + url_vrt + "gallery_area/fetch_dislike_all",
        data: { uid: "" + id + "" },
        dataType: "text",
        success: function (numOfDislike) {
            sumTotal = +numOfDislike + +numOfLike;
            widthOfLike = (+numOfLike / +sumTotal) * +the_max_width_of_div;
            widthOfDislike = (numOfDislike / sumTotal) * the_max_width_of_div;
            if (!widthOfLike) { widthOfLike = "0"; }
            if (!widthOfDislike) { widthOfDislike = "0"; }// console.log("Like=> "+numOfLike+" dislike->"+numOfDislike+" sum=> "+sumTotal+"with like=>"+widthOfLike);
            $('#likes_det' + id).css("width", widthOfLike + "%"); $('#likes_det' + id).attr("title", numOfLike + ' Lift Ups'); $('#dislikes_det' + id).css("width", widthOfDislike + "%"); $('#dislikes_det' + id).attr("title", numOfDislike + ' Lift Downs');
        }
    });


}