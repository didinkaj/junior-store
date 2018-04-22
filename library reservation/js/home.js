$(document).ready(function(){
	
	//initial
	$('#mainCont').load('includes/home/history.php')	;
		
	//handle menu clicks
	$('ul#nav li a').click(function(){
		var page = $(this).attr('href');
		$('#mainCont').load('includes/home/'+ page +'.php');
		return false;
	});
});