
<?php
$of = new otherfunctions();


?>
<script>

</script>
<style>
.not_active_url{
	pointer-events:none;
	background:#afafaf;
}
#textEditor{
	border:.1px solid #efefef;
	margin:0 auto;
	width:100%;
	height:auto;
	background:#ffffff;
	overflow:hidden;
	padding:5px 0px;
	
}
#theRibbon{
	
	border-bottom:none;
	padding:10px;
	color:#000000;
	border-radius:8px 8px 0px 0px;
	
}

#richTextArea{
	border:.1px solid #9f9f9f;
	min-height:100px;
	width:100%;
}

#theWYSIWYG{
	height:100%;
	width:100%;
	
}

#theRibbon button,#editURL{
	
	color:#9f9f9f;
	border:none;
	outline:none;
	background-color:transparent;
	cursor:pointer;
	
}
#theRibbon button:hover,#editURL:hover{
	background-color:#bfbfbf;
	transition:all .3 ease in out;
	color:#ffffff;
}

input[type="color"]{
	border:none;
	outline:none;
	background-color:transparent;
}
#fontChanger,#fontSizeChanger{
	width:auto;
}
</style>

<script>



       window.addEventListener("load",	function () {
		   
			 var editor=theWYSIWYG.document;

			 editorTextSet=document.getElementById("theWYSIWYG");  //Editor

			 titleTextSet=document.getElementById("title");  //Title Editor

			 urlTextSet=document.getElementById("url");    //Url Editor



			 
			 
			 
			 
			


			 


             //For instant value of editor
			editorTextSet.contentWindow.document.body.onkeyup=function(event) {

				//console.log(event.target.innerHTML);

				$('.not_active_url').removeClass('not_active_url');
								
				//$('#saved').addClass('active');
				$('#valueSave').html("Save");

				savedPost=0;
				
				

			};

			var timer = null;

			editorTextSet.contentWindow.document.body.onkeydown=function(event) {
											
				clearTimeout(timer);
                timer = setTimeout(doStuff, 5000);

			//	resizeIFrameToFitContent( editorTextSet );
          
		  /*
			divHeight=document.getElementById('richTextArea').body.offsetHeight;
			editorHeight=editorTextSet.offsetHeight;

			console.log("Div "+divHeight);
			console.log("Editor "+editorHeight);

			*/

			$('#theWYSIWYG').height($('iframe').contents().height());
			//xconsole.log($('iframe').contents().height())
				  
				
				
			
			};




			 editor.designMode="on";

			 boldButton.addEventListener("click",function(){
				   editor.execCommand("Bold",false,null);
			 },false);

			 italicButton.addEventListener("click",function(){
				 editor.execCommand("Italic",false,null);
			},false);

			supButton.addEventListener("click",function(){
				 editor.execCommand("Superscript",false,null);
			},false);

			subButton.addEventListener("click",function(){
				 editor.execCommand("Subscript",false,null);
			},false);

			

			orderedListButton.addEventListener("click",function(){
				editor.execCommand("InsertOrderedList",false,null); 
			},false);

			unorderedListButton.addEventListener("click",function(){
				editor.execCommand("InsertUnorderedList",false,null); 
			},false);

			



			linkButton.addEventListener("click",function(event){
				var url=prompt("Enter a Url","http://");
				 editor.execCommand("CreateLink",false,url);
			},false);

			unlinkButton.addEventListener("click",function(event){
				 editor.execCommand("UnLink",false,null);
			},false);

			

			image_file.addEventListener("change",function(event){



				if (this.files && this.files[0]) {
					 var img = document.querySelector('img');  // $('img')[0]
					 img.src = URL.createObjectURL(this.files[0]); // set src to file url
					 
					 var newImage = document.createElement("img");
					 newImage.src = img.src;
					 newImage.style.width="100%";
					 
					 uploadImage(newImage);

					 // img.onload = imageIsLoaded; // optional onload event listener
			    }

			},false);

			

			 


     },false);
     

function doStuff(){
	//Save this as draft
}




function toggleEditor(){

  //console.log(url_vrt+'views/gallery_area/editor.html');
 
   //$('.content').load( url_vrt+'views/gallery_area/editor.html');

    $('#poster').toggle();

    $('#textEditor').toggle();

   
   /* $.ajax({
        type: "GET",
        url: url_vrt+'views/gallery_area/editor.html',
        data: { },
        success: function(data){
            $('.content').prepend(data);
        }
    });
*/


}
 
</script>


<div class="content" style="overflow:hidden;" >

<div id="wrapper" style="margin:100px auto; 	">


<div class="row">
   <div class="col-sm-3">


<div id="user_shortcut" >
<div>
<img style="width:100%;"src="<?php echo $of->getuserprofilepic(); ?>"/></div>
<div style="padding:10px;"> <?php echo $of->getuserfullname(); ?></div>
</div>
</div>

 <div class="col-sm-9">


<div class="postForm1" > 


<!-----editor on ---->


<div id="textEditor" style='display:none;'>
<div style='float:right;color:#bebebe;cursor:pointer;padding:10px;' onclick="toggleEditor()">X</div>
 <div id="error" style="display:none;"></div>
       <div id="theRibbon" >
	      <button id="boldButton" title="Bold"><b>B</b></button>
		  <button id="italicButton" title="Italic"><em>I</em></button>
		  <button id="supButton" title="Superscript">X<sup>2</sup></button>
		  <button id="subButton" title="Subscript">X<sub>2</sub></button>
		  
		  <button id="orderedListButton" title="Number List">(i)</button>
		  <button id="unorderedListButton" title="Bulleted List">&bull;</button>

		   <button id="linkButton" title="Link Button">Link</button>

		   <button id="unlinkButton" title="Unlink Button">Unlink</button>

		 

		   <button id="insertImage" onclick="document.getElementById('image_file').click();"name="insertImage" title="Insert Image"><img style="margin-bottom:2px;width:20px;padding:1px;height:20px;"src="<?php echo URL; ?>public/images/img.png"  /> </button>
		   <input type="file" name="image_file" id="image_file" accept="image/*" style="display:none" />

		   

		  
		  
		  </div>
       <div id="richTextArea">
	  
	      <iframe id="theWYSIWYG" name="theWYSIWYG" frameborder="0">
		     
		  </iframe>
		  
	   </div>
	   <button onclick="publishPost()"style='margin:5px;background-color:#ef6c00;color:#ffffff;border:none;border-radius:3px;padding:5px;'>Submit</button> 
   </div>













<!---editor ends--------->





  <div id="poster" onclick="toggleEditor()">
  <div style="background-color:#fff;overflow:hidden; color:#888;border:.1px solid #efefef;
  padding:10px;margin: 0px auto; text-align:center;"> What are you going to create today?... 
  <img src="<?php echo URL; ?>public/images/camera.png" title="Post what you want"
  style="cursor:pointer;height:30px; margin:0px auto;width:30px;"/>

 </div><!---poster ends---->

  </div>
  
  <div id="message"></div><!--For showing error Messages--->
  
   <div id="newsfeed_home_friends"><!--For Showing News Feed--->

   </div><!--Feed Ended--->
</div>

</div>
  
 
  
</div>
</div>


 