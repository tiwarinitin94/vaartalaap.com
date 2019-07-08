$(document).ready(function(){

 $('#bug_submit').submit(function(e){
	 e.preventDefault();
	 $.post(url_vrt+'about/submit_bug',function (o){
		 alert(o);
	 });
 });

});