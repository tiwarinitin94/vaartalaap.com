$(document).ready(function(){
	var modal = document.getElementById('myModal');
	var btn = document.getElementById("myBtn");
var span = document.getElementById("close1");
if(btn){btn.onclick = function() { modal.style.display = "block";}}if(span){span.onclick = function() {
    modal.style.display = "none";
}
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

window.onbeforeunload = function() {
    alert("Are you sure?");
 };
 
 
 var lastScrollTop = 0, delta = 20;
 $(window).scroll(function(event){
   var st = $(this).scrollTop();

    //console.log(st);
   
   if(Math.abs(lastScrollTop - st) <= delta)
      return;

   if (st > lastScrollTop){
       // downscroll code
      // $("#header").css({top:'-120px'})
      // .hover(function(){$("#header").css({top: '0px'})})
	  if($('#search_box')){
	    $('#search_box').hide();
	  }
   } else {
      // upscroll code
     // $("#header").css({top:'0px'});
	 if($('#search_box')){
	    $('#search_box').show();
	  }
   }
   lastScrollTop = st;
});
 
 $('.header20').hover(function(){
   $('#search_box').show();
	
 });
 
});

function go(a){
	alert(a);
}

function modal(){
	var args = [];
  for (var i = 0; i < arguments.length; ++i) args[i] = arguments[i];
  
  
		var content=args[0];
		if(args[1]){
		var margin=args[1];
		$('.modal-content').css('margin','10px auto');
		}
  
	var modal = document.getElementById('myModal2');
	var mymodalc=document.getElementById('mymodalc');
	var span2 = document.getElementById("close2");	
	 modal.style.display = "block";
	mymodalc.innerHTML=content;
	if(span2){
      span2.onclick= function() {
		  modal=document.getElementById('myModal2');
    modal.style.display = "none";
} 
	}else{
		span2=document.getElementById("close2");
		 span2.onclick = function() {
    modal.style.display = "none";
}
	}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
	
}
var url_vrt="http://localhost/Vaarta(official)/";


//public functions
function getCaret(el) { 
        if (el.selectionStart) { 
            return el.selectionStart; 
        }
        else if (document.selection) { 
            el.focus(); 

            var r = document.selection.createRange(); 
            if (r == null) { 
                return 0; 
            } 

            var re = el.createTextRange(), 
            rc = re.duplicate(); 
            re.moveToBookmark(r.getBookmark()); 
            rc.setEndPoint('EndToStart', re); 

            return rc.text.length; 
        }  
        return 0; 
    }

function showResult(query){
	if(query){$('#livesearch').html(query);}else{
		$('#livesearch').html(query);
	}
}


function send_request(user_pro){
	$.post(url_vrt+'profile/send_request',{'data':user_pro},function(o){$('#add_user').html('Request Sent');$('#vaarta_rel').append('<button onclick="cancel()" id="cr_cancel">Cancel Request</button>');});
}

function follow_user(user_to_f){
	 jQuery.ajax({
							   type: "POST",
							   url:url_vrt+'profile/follow/slsfjshsfhdfhsdfhsohughreuhsvsgbskfhnjsdfhdajhadlfhadfoiwfsnvskvbjshdsijf',
							   data: {'uid':user_to_f},
							   dataType: "text",
							   success: function(data){	
							        
								 $("#follow").html("Following");
                          
							       }
							   });
}

function unfollow_user(user_to_uf){
	jQuery.ajax({ type: "POST",	 url: url_vrt+'profile/follow/slsfjshsfhdfhsdfhsohughreuhsvsgbskfhnjsdfhdajhadlfhadfoiwfsnvskvbjshdsijf',
							   data: {'un_id':user_to_uf},
							   dataType: "text",
							   success: function(data){	
							  $("#follow").html("Follow");
							  
							       } });}function setTitle(theTitle){document.title=theTitle;}