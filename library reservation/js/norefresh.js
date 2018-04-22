$(document).ready(function(){
	
	//initial
	$('#mainCont').load('includes/home/home.php')	;
		
	//handle menu clicks
	$('ul#nav li a').click(function(){
		var page = $(this).attr('href');
		$('#mainCont').load('includes/'+ page +'.php');
		return false;
	});
});