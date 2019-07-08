//data fetching
var post_id = "nothing"; var check_function = 0; var pageURL = $(location).attr("href");
url_page = pageURL.replace(url_vrt, ""); if (url_page = "gallery_area/") { slash = "/"; } else { slash = ""; }

var no_more_get = 0;
var the_max_width_of_div = 100;		 //console.log(the_max_width_of_div);

if (check_function < 1) {
    $(document).off().ready(function () {

        check_screen();

        //Check width of screen 
        $(window).resize(function (e) {
            check_screen();
        });

        var pic; var data_pic; var count = 1;

        //calling more


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


    });


    function check_screen() {  //Check width of screen 
        if ($(window).innerWidth() <= 600) {
            //...
            //	console.log("width is 500");

            $('.content').css('padding', '0px');

            $('.postForm1').css('margin', '0px auto');
            $('#user_shortcut').css('display', 'none');

            // $('.header20').css('position', 'initial');

        } else {

            $('.postForm1').css('margin', '0px;');

            $('#user_shortcut').css('display', 'block');

            $('.content').css('padding', '10px 20px 10px 20px');
            $('.header20').css('position', 'fixed');
        }
    }







    //----------------EDITOR-------------------




    function uploadImage(newImage) {

        var file_image = $('#image_file').prop('files')[0];
        var form_data = new FormData();
        form_data.append('image_f', file_image);


        $.ajax({
            url: url_vrt + "gallery_area/addImage_media",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {

                newImage.src = url_vrt + "public/userdata/media_blog/" + data;
                document.getElementById("theWYSIWYG").contentWindow.document.getElementsByTagName("body")[0].appendChild(newImage);

            }
        });
    }









    function addImageToPost() {
        var x = document.getElementsByClassName("selectedImage");


        console.log(x.length);
        for (i = 0; i < x.length; i++) {
            x[i].style.width = '100%';
            console.log("i->" + i);
            document.getElementById("theWYSIWYG").contentWindow.document.body.appendChild(x[i]);
        }
    }





    //submit

    function publishPost() {


        var form_data = new FormData();

        // console.log(htmlEndode(editorTextSet.contentWindow.document.body.innerHTML));
        form_data.append('post', editorTextSet.contentWindow.document.body.innerHTML);


        //Code for submission of post

        $.ajax({
            url: url_vrt + "gallery_area/publishPost",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {

                if (data.trim() == "success") {
                    modal("<div style='width:200px;'>You posted Successfully</div>");
                } else {
                    modal("<div style='width:200px;'>Something is wrong.</div>");
                }


            }
        });




    }







    //---------------------------------------------------Function------------------------------------------------------------//
    //fetch sys




}